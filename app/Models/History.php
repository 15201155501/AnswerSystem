<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use JohnLui\AliyunOSS\AliyunOSS;
use DB,Session,DateTime,Request;
use Label;

class History extends Model
{
	public function show()
	{
		$size = DB::table('history')->count();
		$num = 2;
		$page_size = ceil($size/2);
		$page = Request::input('page') ? Request::input('page') : 1;
		$arr_page['prev'] = $page-1<1 ? 1 : $page-1;
		$arr_page['next'] = $page+1>$page_size ? $page_size : $page+1;
		$arr_page['last'] = $page_size;
		$limit = ($page-1)*$num;
		// if (Request::input('c_name')) {
		// 	$sql = 'select stu_id from students where stu_name like %'.Request::input('c_name').'%';
		// 	var_dump(DB::query($sql));die;
		// 	// DB::table('students')->where('stu_name', Request::input('c_name'))->get();
		// }else
		if (Request::input('search')) {
			$arr_page['data'] = DB::table('history')->where('c_id', Request::input('search'))->orderBy('his_id', 'desc')->skip($limit)->take($num)->get();
		} else {
			$arr_page['data'] = DB::table('history')->orderBy('his_id', 'desc')->skip($limit)->take($num)->get();
		}
		return $arr_page;
	}

	public function member()
	{
		$size = DB::table('members')->count();
		$num = 2;
		$page_size = ceil($size/2);
		$page = Request::input('page') ? Request::input('page') : 1;
		$arr_page['prev'] = $page-1<1 ? 1 : $page-1;
		$arr_page['next'] = $page+1>$page_size ? $page_size : $page+1;
		$arr_page['last'] = $page_size;
		$limit = ($page-1)*$num;
		$arr = DB::table('members')->skip($limit)->take($num)->get();
		if (Request::input('act') == 'ajax') {
			$arr['page'] = $arr_page;
			return json_encode($arr);
		}
	}
}