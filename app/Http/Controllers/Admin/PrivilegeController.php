<?php

namespace App\Http\Controllers\Admin;

use DB, Redirect, Input, Response, Request,Session;

use App\Http\Controllers\Controller;

use app\privilege;

class PrivilegeController extends Controller
{
	/**
	 * 权限表单
	 * @author jnn <15210121352@163.com>
	 * @version 0.0.1
	 */
	public function index()
	{
		$data = isset($_GET) ? $_GET  : '';
                if($data){
                        //unset($data['_token']);
                        //print_r($data);die;
                        $arr = DB::table('privilege')->where('pri_name',$data['pri_name'])->get();
                        //dd($arr);
                        if(empty($arr)){
                                DB::table('privilege')->insert($data);
                                echo 1;die;
                        }else{
                                echo 0;die;
                        }
                }else{
                        $model=new \App\PrivilegeModel();
                        $data = $model->lst();
                        //print_r($data);die;
                        return view('admin/privilege_add')->with('data',$data);
                }
	}

	/**
	 * 权限列表
	 * @author jnn <15210121352@163.com>
	 * @version 0.0.1
	 * @return $privilege_data [description]
	 */
	public function privilege_list()
	{
		$model=new \App\PrivilegeModel();
        $privilege_data = $model->lst();
        return view('admin/privilege_list')->with('arr',$privilege_data);
	}

	/**
	 * 权限分配
	 * @author jnn <15210121352@163.com>
	 * @version 0.0.1
	 * @return $data [description]
	 */
	public function role_privilege()
	{
		$data['role'] = DB::table('role')->where('role_id','!=',0)->get();
        $model=new \App\PrivilegeModel();
        $data['privilege'] = $model->lst();
        return view('admin/role_privilege')->with('data',$data);
	}

	public function privilegeTaskpro()
	{
		$role_id = $_GET['role_id'];
        $pri_id = $_GET['pri_id'];
        $arr = DB::table('role_privilege')->where('role_id',$role_id)->get();
        //print_r($pri_id);die;
        foreach($arr as $k =>$v){
                foreach($pri_id as $kk => $vv){
                        //echo $v['role_id'];die;
                        if($v['pri_id'] == $vv){
                                //echo 111;die;
                                DB::table('role_privilege')->where('role_id','=',$role_id)->delete();
                        }
                }
        }
        //print_r($role_id);die;
        foreach($pri_id as $k => $v){
                $data = [
                        'role_id' => $role_id,
                        'pri_id' => $v
                ];
                DB::table('role_privilege')->insert($data);
        }
        echo 0;
	}

	public function privilegeChecked()
    {
            $role_id = $_GET['role_id'];
            $arr = DB::table('role_privilege')->where('role_id','=',$role_id)->get();
            // print_r($res);die;
            for($i=0;$i<count($arr);$i++){
                $new_arr[] = $arr[$i]['pri_id'];
            }
            //print_r($new_arr);die;
            // print_r($data['new_arr']);die;
            $data['role'] = DB::table('role')->where('role_id','!=',0)->get();
            $model=new \App\PrivilegeModel();
            $data['privilege'] = $model->lst();
            return view('Admin/priChecked')->with('data',$data)->with('new_arr',$new_arr);
    }
	
	

}