<?php

namespace App;

use DB;

use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
	/**
	 * 查询表中所有数据
	 * @author jnn <15210121352@163.com>
	 * @version 0.0.1
	 */
	public function lst(){
		$arr = DB::table('class')->get();
		//print_r($arr);die;
		return $this->list_level($arr,$pid=0,$level=0);
	}
	/**
	 * 递归实现两级分类
	 * @author jnn <15210121352@163.com>
	 * @version 0.0.1 
	 * @return $data [description]
	 */
	public function list_level($arr,$pid=0,$level=0){
		//定义一个静态数组（防止多次实例化）
		static $data = array();
		foreach($arr as $key=>$val){
			if($val['pid']==$pid){
				$val['level'] = $level;
				$data[] = $val;
				$data = $this->list_level($arr,$val['c_id'],$level+1);
			}
		}
		return $data;
	}
}
