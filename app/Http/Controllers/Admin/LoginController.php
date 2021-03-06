<?php

namespace App\Http\Controllers\Admin;

use DB, Redirect, Input, Response, Request,Session;

use App\Http\Controllers\Controller;

class LoginController extends Controller{
	/**
	 * 后台首页
	 * @author jnn <15210121352@163.com>
	 * @version 0.0.1
	 */
	public function index()
	{
		return view('admin/login');
	}

	/**
	 * 登陆验证
	 * @author jnn <15210121352@163.com>
	 * @version 0.0.1
	 */
	public function login_submit()
	{
		$data['username']=Request::get('username');
		$data['password']=md5(Request::get('password'));
		//print_r($data);die;
		$users = DB::table('owner')->where($data)->first();
			//进行非逻辑判断
			if($users){
				Session::put('username',$data['username']);
				Session::put('id',$users['id']);
				Session::save();
				//$username = Session::get('username');
				echo 1;die;
			} else {
				echo 0;die;
			}
	}
	
	/**
	 * 退出
	 * @author jnn <15210121352@163.com>
	 * @version 0.0.1
	 */
	public function loginout()
	{
		Session::forget('id');
		return view('Admin/login');
	}


}