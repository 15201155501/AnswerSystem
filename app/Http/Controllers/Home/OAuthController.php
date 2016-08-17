<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Model\ExamModel;
use Illuminate\Support\Facades\Auth;
use Request,Session,DB;

class OAuthController extends Controller
{
	//登陆
	public function QQlogin()
	{
		require_once ('Connect2.1/qqConnectAPI.php');
		//访问qq登陆页面
		$oauth = new \Oauth();
		$oauth -> qq_login();
	}

	public function OAuthQQ()
	{
		require_once ('Connect2.1/qqConnectAPI.php');

		Request::get('code');

		//使用code获取access_token
		$oauth = new \Oauth();
		$access_token = $oauth -> qq_callback();

		//获取open_id
		$openid = $oauth -> get_openid();

		if (empty($info = DB::table('students')->where('open_id','=',$openid)->first())){
			$username = 'QQ_用户'.time();
			$res = DB::table('students')->insert(['open_id'=>$openid,'stu_name'=>$username]);
			if ($res){
				Session::put('u_id',$openid);
				Session::put('username',$username);
				return redirect('index');
			}
		}else{
			Session::put('u_id',$info['open_id']);
			Session::put('username',$info['stu_name']);
			return redirect('index');
		}
	}
}