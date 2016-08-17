<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;

use Excel,DB;

use App\Http\Controllers\Controller;

class ExcelController extends Controller
{
	/**
	 * Excel导入
	 * @return [type] [description]
	 */
    public function import(){
	    $filePath = "D:/aa.xlsx";
	    Excel::load($filePath, function($reader) {
	    	//将导入excel的转化为数组
	        $reader = $reader->getSheet(0);  
        	$res = $reader->toArray();
        	unset($res[0]); 
	        //print_r($res);die;
	        //定义一个空数组
	        $arr = array();
	        //处理入库数组
	        foreach ($res as $k => $v) {
	        	$arr = array(
	        			'stu_name' => $v[0],
	        			'stu_pwd' => $v[1],
	        			'stu_email' => $v[2],
	        			'stu_img' => $v[3],
	        		);

	        	//DB::table('students')->insert($arr);
	        }
	        print_r($arr);
	    });
	}
}
