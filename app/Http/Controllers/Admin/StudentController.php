<?php

namespace App\Http\Controllers\Admin;

use DB, Redirect, Input, Response, Request,Session;

use JohnLui\AliyunOSS\AliyunOSS;

use DateTime;

use App\Http\Controllers\Controller;

class StudentController extends Controller
{
	/**
	 * 学生表单
	 * @author jnn <15210121352@163.com>
	 * @version 0.0.2
	 * @return $class_data [description]
	 */
	public function index()
	{
		$model=new \App\ClassModel();
        $class_data = $model->lst();
        // print_r($class_data);die;
        return view('admin/student_add')->with('arr',$class_data);
	}

	/**
	 * 学生添加
	 * @author jnn <15210121352@163.com>
	 * @version 0.0.2
	 */
	public function student_pro()
	{
        $images=Request::file('stu_img'); 
       	$filedir="upload/stu-img/";
       	$imagesName=$images->getClientOriginalName();
		$extension = $images -> getClientOriginalExtension(); //4、获取上传图片的后缀名
		 $newImagesName=md5(time()).random_int(5,5).".".$extension; //5、重新命名上传文件名字
        $images->move($filedir,$newImagesName); //6、使用move方法移动文件.
		$data=Request::all();
		unset($data['_token']);
		$filename = $filedir.$newImagesName;
		$url=$this->oss($filename,'http://oss-cn-shanghai.aliyuncs.com','vutnm1b0GLYzs31A', 'uE9oAabWF7Bw2ePksjyCkYNaiuLmr2');
		$data['stu_img']=$url;
		$re=DB::table('students')->insert($data);
		if($re){
			echo "<script>alert('上传成功');location.href='student_list';</script>";
		}else{
			echo "<script>alert('上传失败');location.href='student_add';</script>";
		}
		
	}
	public function checkonly()
	{
		$stu_username = Request::get('stu_username');
		$res = DB::table('students')->where('stu_username',$stu_username)->get();
		if(empty($res)){
			return 1;
		}else{
			return 0;
		}
	}
	/**
	 * 学生图片上传云端
	 * @author jnn <15210121352@163.com>
	 * @version 0.0.2
	 * @return $getUrl [description]
	 */
	public function oss($filename,$url,$AccessKeyId,$AccessKeySecret)
	{
		// 构建 OSSClient 对象
		// 三个参数：服务器地址、阿里云提供的AccessKeyId、AccessKeySecret
		$oss = AliyunOSS::boot($url,  $AccessKeyId, $AccessKeySecret);

		// 设置 Bucket
		$oss = $oss->setBucket('aishunshun');

		// 上传一个文件（示例文件为 public 目录下的 robots.txt）
		// 两个参数：资源名称、文件路径
		$oss->uploadFile($filename, public_path($filename));

		// 从服务器获取这个资源的 URL 并打印
		// 两个参数：资源名称、过期时间
		return $oss->getUrl($filename, new DateTime("+15 day"));
	}

	public function student_list()
	{
		$sc_data=DB::table('students')
		->join('label','students.lid','=','label.lid')
		->Paginate(10);
		//print_r($sc_data);die;
        return view('admin/student_list')->with('arr',$sc_data);
	}
	

}