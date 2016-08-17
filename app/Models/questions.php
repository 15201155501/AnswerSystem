<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

/**
 * questions表的相关操作
 */
class questions extends Model
{
	//根据 lid 查询 questions 相关条数
	public function count($id)
	{
		return DB::table('questions')->where('lid', $id)->count();
	}

	//根据 lid 删除 questions 的相关数据
	public function del($id)
	{
		return DB::table('questions')->where('lid', $id)->delete();
	}

	//向 questions 添加多条数据
	public function add($arr)
	{
		DB::table('questions')->insert($arr);
	}

	//查询 questions 最后一条id
	public function lastQid()
	{
		$arr = DB::table('questions')->select('qid')->orderBy('qid', 'desc')->take(1)->first();
		return $arr['qid'];
	}
}