<?php

namespace App\Http\Controllers\Admin;

use DB, Redirect, Input, Response, Request,Session;

use App\Http\Controllers\Controller;

class RoleController extends Controller
{
	/**
	 * 角色表单
	 * @author jnn <15210121352@163.com>
	 * @version 0.0.1
	 * @return $role_data [description]
	 */
	public function index()
	{
        return view('admin/role_add');
	}

	/**
	 * 角色添加
	 * @author jnn <15210121352@163.com>
	 * @version 0.0.1
	 */
	public function role_pro()
	{
			$rolename=Request::get('rolename');
		    $data = DB::table('role')->where('role_name',$rolename)->get();
		    if($data){
		            echo 0;die;
		    }else{
		            $re = DB::table('role')->insert(['role_name'=>$rolename]);
		            if(empty($re)){
		                    echo 1;die;
		            }else{
		                    echo 2;die;
		            }
		    }
	}
	
	/**
	 * 角色列表
	 * @author jnn <15210121352@163.com>
	 * @version 0.0.1
	 * @return $role_data [description]
	 */
	public function role_list()
	{
		$role_data = DB::table('role')->get();
		return view('admin/role_list')->with('role_data',$role_data);
	}

	/**
	 * 角色分配页面
	 * @author jnn <15210121352@163.com>
	 * @version 0.0.1
	 * @return  [description]
	 */
	public function user_role()
	{
		$data['owner'] = DB::table('owner')->where('id','!=',0)->get();
        $data['role'] = DB::table('role')->where('role_id','!=',0)->get();
        return view('admin/user_role')->with('data',$data);
	}

	public function roleTaskpro()
	{
		$id = $_GET['id'];
                //echo $id;die;
                $role_id = $_GET['role_id'];
                //print_r($role_id);die;
                $arr = DB::table('owner_role')->where('id',$id)->get();
                //print_r($role_id);die;
                foreach($role_id as $k =>$v){
                        foreach($arr as $kk => $vv){
                                //echo $v['role_id'];die;
                                if($v == $vv['role_id']){
                                        //echo 111;die;
                                        DB::table('owner_role')->where('id','=',$id)->where('role_id','=',$v)->delete();
                                }
                        }
                }
                //print_r($role_id);die;
                foreach($role_id as $k => $v){
                        $data = [
                                'id' => $id,
                                'role_id' => $v
                        ];
                        DB::table('owner_role')->insert($data);
                }
                echo 1;
	}
}