<?php

namespace App\Http\Controllers\Admin;

use DB, Redirect, Input, Response, Request,Session;

use App\Http\Controllers\Controller;
use JohnLui\AliyunOSS\AliyunOSS;

//设置编码格式
header('content-type:text/html;charset=utf-8');
class TestController extends Controller{

    //添加试卷
    public function generate_add()
    {
        $xue_data = DB::table('label')->where('pid',0)->get();
        // print_r($xue_data);die;
        return view('admin/generate_add')->with('xue_data',$xue_data);
    }
    //检测试卷名是否唯一
    public function check_test(){
        $em_name = Request::get('em_name');
        $res = DB::table('exam')->where(['em_name'=>$em_name])->first();
        if(!empty($res)){
            echo 1;
        }else{
            echo 0;
        }
    }
    //无限极分类
    public function select()
    {
        $id = Request::get('pid');
        $zhuan_arr = DB::table('label')->where('pid',$id)->get();
        return json_encode($zhuan_arr);
    }
    //试卷列表
    public function generate_list()
    {
        $test_data = DB::table('exam')
        ->join('label','label.lid','=','exam.em_major')
        ->get();
        //print_r($test_data);die;
        return view('admin/generate_list')->with('data',$test_data);
    }
    //删除
    public function test_del()
    {
        $em_id = Request::get('id');
        $res = DB::table('exam')->where('em_id',$em_id)->delete();
        if($res){
            return redirect('generate_list');
        }else{
            echo "<scirpt>alert('删除失败');location.href='generate_list';</script>";
        }
    }
    public function generate_addPro()
    {
        $test_data = Request::all();
        unset($test_data['_token']);
        // print_r($test_data);die;
        $res = DB::table('exam')->insert($test_data);
        if($res){
            echo "<script>alert('添加成功');location.href='generate_add';</script>";
        }else{
            echo "<script>alert('添加失败');location.href='generate_add';</script>";
        }
    }
    public function generate_testAdd()
    {
        $data['xue_data'] = DB::table('label')->where('pid',0)->get();
        $data['em_name'] = DB::table('exam')->where('em_info',null)->get();
        // print_r($data['em_name']);die;
        return view('admin/generate_testAdd')->with('data',$data);
    }
    public function generate_testList()
    {
    	$gen_data = DB::table('exam')
        ->join('label','label.lid','=','exam.em_major')
        ->get();
        return view('admin/generate_testList')->with('data',$gen_data);
    }
	//生成试卷
	public function generate_test()
	{
        $test_data = Request::all();
        // print_r($test_data);die;
        unset($test_data['_token']);
        if($test_data['test_str'] == 0){
            $dan_num = 20;
            $duo_num = 10;
            $pan_num = 10;
            $test_str = '单选题：20（道），多选题：10（道），判断题：10（道）';
        }else if($test_data['test_str'] == 1){
        	$dan_num = 18;
            $duo_num = 12;
            $pan_num = 10;
            $test_str = '单选题：18（道），多选题：12（道），判断题：10（道）';
        }else{
        	$dan_num = 15;
            $duo_num = 15;
            $pan_num = 10;
            $test_str = '单选题：15（道），多选题：15（道），判断题：10（道）';
        }
		$dan = DB::table('questions')->where('tid',0)->get();
		//print_r($dan);die;
		//print_r($dan_id);
		$d_id = array_rand($dan,$dan_num);
		//$topic = array();
		foreach ($d_id as $k => $v) {
			foreach ($dan as $key => $value) {
				if($key == $v){
					$topic_dan[] = $value;
				}
			}
		}
		$duo = DB::table('questions')->where('tid',1)->get();
		//print_r($duo);die;
		//print_r($duo_id);
		$f_id = array_rand($duo,$duo_num);
		$topic = array();
		foreach ($f_id as $k => $v) {
			foreach ($duo as $key => $value) {
				if($key == $v){
					$topic_duo[] = $value;
				}
			}
		}

		$pan = DB::table('questions')->where('tid',2)->get();
		//print_r($pan);die;
		//print_r($pan_id);
		$p_id = array_rand($pan,$pan_num);
		$topic = array();
		foreach ($p_id as $k => $v) {
			foreach ($pan as $key => $value) {
				if($key == $v){
					$topic_pan[] = $value;
				}
			}
		}
		$arr_db = array_merge($topic_dan,$topic_duo,$topic_pan);
		//print_r($topic);die;
		//$arr_db = DB::select('select * from questions limit 10');
		//print_r($arr_db);die;
		foreach ($arr_db as $key_db => $v_db) {
			$str = file_get_contents($v_db['tid'].'.js');
			if(!empty($str)){
				$json_arr = explode(' ', $str);
				foreach ($json_arr as $key => $v) {
					$data = json_decode($v, true);
					if (!empty($data)) {
						foreach ($data as $keys => $vs) {
							if ($v_db['qid'] == $keys) {
								foreach ($vs as $keyes => $value) {
									if ($keyes == '0') {
										$keyes = 'A';
									}elseif ($keyes == '1') {
										$keyes = 'B';
									}elseif ($keyes == '2') {
										$keyes = 'C';
									}elseif ($keyes == '3') {
										$keyes = 'D';
									}
									$arr_db[$key_db]['options'][$keyes] = $value;
								}
							}
						}
					}
				}
			}

		}
		//print_r($arr_db);die;

        $em_info = json_encode($arr_db);
        //echo $em_info;die;
        $upt_data = [
			'em_info' => $em_info,
			'test_str' => $test_str,
			'em_major' => $test_data['lid']
		];
        $res = DB::table('exam')->where('em_id',$test_data['em_id'])->update($upt_data);
        if($res){
            echo "<script>alert('分配成功');location.href='generate_testAdd';</script>";
        }else{
            echo "<script>alert('分配失败请重新分配');location.href='generate_testAdd';</script>";
        }
		// ob_start();
		// include('test/test.php');
		// $str = ob_get_clean();
		// echo $str;die;
		// $filename = time();
		// file_put_contents('test/'.$filename, $str);
	}
	public function aa()
	{
		DB::table('questions')->where('tid','0')->update(['qus_title'=>'今天你吃饭了么？']);
		DB::table('questions')->where('tid','1')->update(['qus_title'=>'php是世界上最好的语言吗？']);
		DB::table('questions')->where('tid','2')->update(['qus_title'=>'今天你睡觉了么？']);
	}

	public function uploadYun()
	{
		// 构建 OSSClient 对象
		// 三个参数：服务器地址、阿里云提供的AccessKeyId、AccessKeySecret
		$oss = AliyunOSS::boot('http://www.renhaifeng.applinzi.com',  '1zkwnkjxk2', '1xwhyi5mly3wmw5lwl5lmkik4xyz15ly23lw02ww ');

		$bucketName = 'laravel';
		// 设置 Bucket
		$oss = $oss->setBucket($bucketName);
		//var_dump($oss);die;
		// 上传一个文件（示例文件为 public 目录下的 robots.txt）
		// 两个参数：资源名称、文件路径
		$oss->uploadFile('robots.txt', public_path('robots.txt'));
		echo 1;die;
		// 从服务器获取这个资源的 URL 并打印
		// 两个参数：资源名称、过期时间
		echo $oss->getUrl('robots.txt', new DateTime("+1 day"));

	}
}
