<?php

namespace App\Http\Controllers\Admin;

use DB, Redirect, Input, Response, Request,Session;

use App\Http\Controllers\Controller;

class OwnerController extends Controller{
	/**
	 * 管理员表单
	 * @author jnn <15210121352@163.com>
	 * @version 0.0.1
	 */
	public function index()
	{
		return view('admin/owner_add');
	}

	/**
	 * 管理员添加
	 * @author jnn <15210121352@163.com>
	 * @version 0.0.1
	 */
	public function owner_pro()
	{
		//接值
		$owner_data=Request::all();
		unset($owner_data['_token']);
		$owner_data['password']=md5($owner_data['password']);
		$owner_re=DB::table('owner')->insert($owner_data);
		if($owner_re){
			echo "<script>alert('添加成功');location.href='owner_list';</script>";
		}else{
			echo "<script>alert('添加失败');location.href='owner_add';</script>";
		}
	}

	/**
	 * 管理员列表
	 * @author jnn <15210121352@163.com>
	 * @version 0.0.1
	 * @return  get_owner
	 */
	public function owner_list()
	{
		$get_owner=DB::table('owner')->get();
		return view('admin/owner_list')->with('arr',$get_owner);
	}

	/**
	 * 管理员删除
	 * @author jnn <15210121352@163.com>
	 * @version 0.0.1
	 */
	public function owner_del()	
	{
		//接值
		$id=Request::get('id');
		$res=DB::table('owner')->where('id',$id)->delete();
		if($res){
			echo "<script>alert('删除成功');location.href='owner_list';</script>";
		}else{
			echo "<script>alert('删除失败');location.href='owner_list';</script>";
		}
	}
}