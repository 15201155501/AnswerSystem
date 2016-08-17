<?php 
namespace App\Http\Controllers\Admin;

use DB, Redirect, Input, Response, Request, Session, DateTime, Excel;
use App\Http\Controllers\Controller;
use App\Models\lib;
use App\Models\Label;
use App\Models\Questions;
use JohnLui\AliyunOSS\AliyunOSS;
header('content_type:text/html;charset=utf8');
class UploadFileController extends Controller
{
	/**
	 * 题库上传
	 * 每个文件以题型作为划分,是一个js文件
	 * 每道题对应的键值是数据库对应的qid
	 * 每道题都以空格隔开
	 * 上传到oss
	 * @return [type] [description]
	 */
	public function index()
	{
		//题库上传
		if (Request::input('act') == 'add') {

			//接受表单值
			$arr_file = $_FILES['file'];
			$filePath = $arr_file['tmp_name'];
			//调用Excel类上传文件
		    Excel::load($filePath, function($reader) {
		    	$lid = Request::input('lid');
		    	// dd(Request::all());
		    	//获取Excel内容转换成数组
		        $data = $reader->all();
		        // dd($data);
		        $arr_all = json_decode($data, true);
		        // dd($arr_all);
		        //当前时间
		        date_default_timezone_set('prc');
		        $time = date('Y-m-d H:i:s');

		        //生成文件,入库questions,questions_label
		        $num = '0';
		        $questions = new Questions;
		        $qidFQuestions = $questions->lastQid();
		        // dd($qidFQuestions);
		        foreach ($arr_all as $key_all => $val_all) {
		        	$qidFQuestions ++;
		        	$arr_add[$num]['tid'] = $val_all['tid'];						//题型类型
		        	$arr_add[$num]['answer'] = $val_all['answer'];	
		        	$arr_add[$num]['lid'] = $lid;	
		        	$arr_add[$num]['time'] = $time;			//问题答案
		        	// DB::table('questions')->insertGetId($arr_add);			//入库后获取qid
		        	
		        	//添加questions_label表
	        		// $arr_questionsLabel[$num]['qid'] = $id;						//题id
	        		// $arr_questionsLabel[$num]['lid'] = $lid;				//标签id
	        		$num ++;
		        	$arr_createFile[$val_all['tid']][$qidFQuestions] = $val_all;
		        }
		        // dd($arr_createFile);
		        $questions->add($arr_add);
		        // print_r(DB::table('questions_label')->insert($arr_questionsLabel));die;
		        foreach ($arr_createFile as $key_createFile => $val_createFile) {
		        	foreach ($val_createFile as $k_createFile => $v_createFile) {
		        		if ($key_createFile == 2) {
		        			unset($v_createFile['b'], $v_createFile['c'], $v_createFile['d'], $v_createFile['tid'], $v_createFile['answer']);
		        		} else {
		        			unset($v_createFile['tid'], $v_createFile['answer']);
		        		}
		        		$json_arr[$k_createFile] = $v_createFile;
		        		$json_createFile = json_encode($json_arr);
		        		file_put_contents($key_createFile.".js", $json_createFile." ", FILE_APPEND);
		        		$json_arr = array();
		        	}
		        	$filePathName[$key_createFile] = $key_createFile.".js";
		        }
		        // print_r($arr_createFile);die;

		        //判断该文件是否存在
		        //拼接文件上传到云端
		        //相关信息入库(url,文件名称,过期时间,更新时间)
		        //删除本地文件
		        foreach ($filePathName as $key_filePN => $val_filePN) {
		        	$arr = array();
		        	$arr = DB::table('oss_file_url')->select('url')->where('file_name', $val_filePN)->first();
		        	$url = $arr['url'];
		        	
		        	//文件存在  获取文件  拼接到本地   上传云端
		        	if (!empty($url)) {
		        		$fileGet = file_get_contents($url);
		        		file_put_contents($val_filePN, $fileGet, FILE_APPEND);
		        		$arrCallbackOss = $this -> oss($val_filePN);
		        		$arrCallbackOss['file_name'] = $val_filePN;
		        		$arrCallbackOss['update_time'] = date('Y-m-d H:i:s');
		        		DB::table('oss_file_url')->where('url', $url)->update($arrCallbackOss);
		        	}

		        	//文件不存在   直接上传
		        	else {
		        		$arrCallbackOss = $this -> oss($val_filePN);
		        		$arrCallbackOss['file_name'] = $val_filePN;
		        		$arrCallbackOss['update_time'] = date('Y-m-d H:i:s');
		        		DB::table('oss_file_url')->insert($arrCallbackOss);
		        	}

		        	//删除
		        	// unlink($val_filePN);
		        }
    		});

    		return redirect('uploadFile');
		}

		//题库上传页面展示
		else {
			//实例化model 并调用方法
			$label = new Label;
			$lib = new Lib;
			$arrFLabelSelect = $label->select();
			$arrFLibRecursion = $lib->recursion($arrFLabelSelect);
			return view('admin/uploadFile', ['arr' => $arrFLibRecursion]);
		}
		
	}

	/**
	 * 上传到oss
	 * @param  string  $file_name 文件名称
	 * @return array   $arrCallback   返回url,过期时间
	 */
	public function oss($file_name)
	{
		// echo file_get_contents('http://aishunshun.oss-cn-shanghai.aliyuncs.com/1.js?OSSAccessKeyId=vutnm1b0GLYzs31A&Signature=9tWuA7BIh54E8X%2FmuVAUZkXxYrM%3D&Expires=1470553466');
		// 构建 OSSClient 对象
		// 三个参数：服务器地址、阿里云提供的AccessKeyId、AccessKeySecret
		$oss = AliyunOSS::boot('http://oss-cn-shanghai.aliyuncs.com',  'vutnm1b0GLYzs31A', 'uE9oAabWF7Bw2ePksjyCkYNaiuLmr2' );

		// 设置 Bucket
		$bucketName = 'aishunshun';
		$oss = $oss->setBucket($bucketName);

		// 上传一个文件（示例文件为 public 目录下的 1.js）
		// 两个参数：资源名称、文件路径
		$oss->uploadFile($file_name, public_path($file_name));

		// 从服务器获取这个资源的 URL 并打印
		// 两个参数：资源名称、过期时间
		$url = $oss->getUrl($file_name, new DateTime("+15 day"));
		$arrCallback = array();
		$arrCallback['url'] = $url;
		$time = ((array)new DateTime("+15 day"));		//过期时间
		$arrCallback['over_time'] = $time['date'];
		return $arrCallback;
	}
}
?>