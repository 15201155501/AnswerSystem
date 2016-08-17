<?php

namespace App\Http\Controllers\Admin;

use DB, Redirect, Input, Response, Request,Session;

use App\Http\Controllers\Controller;

use app\ClassModel;

class ClassController extends Controller
{
	/**
	 * 班级表单
	 * @author jnn <15210121352@163.com>
	 * @version 0.0.1
	 */
	public function index()
	{
		$data = isset($_GET) ? $_GET  : '';
                if($data){
                        //unset($data['_token']);
                        //print_r($data);die;
                        $arr = DB::table('class')->where('c_name',$data['c_name'])->get();
                        //dd($arr);
                        //$data['pid'] = $data
                        if(empty($arr)){
                                DB::table('class')->insert($data);
                                echo 1;die;
                        }else{
                                echo 0;die;
                        }
                }else{
                        // $model=new \App\ClassModel();
                        // $data = $model->lst();
                        // print_r($data);die;
                        $data = DB::table('class')->where('pid',0)->get();
                        return view('admin/class_add')->with('data',$data);
                }
	}
	/**
	 * 班级添加
	 * @author jnn <15210121352@163.com>
	 * @version 0.0.1
	 */
	public function select_class()
	{
		$c_id = Request::get('c_id');
		$classname = DB::table('class')->where('pid',$c_id)->get();
		return json_encode($classname);
	}

	/**
	 * 班级列表
	 * @author jnn <15210121352@163.com>
	 * @version 0.0.1
	 * @return $class_data [description]
	 */
	public function class_list()
	{
		$model=new \App\ClassModel();
        $class_data = $model->lst();
        // print_r($class_data);die;
        return view('admin/class_list')->with('arr',$class_data);
	}
}