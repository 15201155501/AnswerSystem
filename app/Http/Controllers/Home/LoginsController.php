<?php

namespace App\Http\Controllers\Home;

use DB, Redirect, Input, Response, Request,Session;

use App\Http\Controllers\Controller;

class LoginsController extends Controller{
	/**
	 * 前台登陆页
	 * @author spc <15201155501@163.com>
	 * @version 0.2
	 */
	public function index()
	{
		return view('home/sign-in');
	}

	/**
	 * 登陆
	 * @author spc <15201155501@163.com>
	 * @version 0.2
	 */
	public function login_pro()
	{

		$data['stu_name']=Request::get('username');
		$data['stu_pwd']=Request::get('password');
		//print_r($data);die;
		$users = DB::table('students')->where($data)->first();
			//进行非逻辑判断
			if($users){
				Session::put('username',$data['stu_name']);
				Session::put('u_id',$users['stu_id']);
				Session::put('c_id',$users['c_id']);
				Session::save();
				//$username = Session::get('username');
				echo 1;die;
			} else {
				echo 0;die;
			}
	}

	/**
	 * 退出
	 * @author spc <15201155501@163.com>
	 * @version 0.2
	 */
	public function logout()
	{
		Session::flush();
		echo "<script>alert('退出成功');location.href='/';</script>";
	}

}