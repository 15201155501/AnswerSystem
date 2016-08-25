<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

/**
 * label表的相关操作
 */
class label extends Model
{
	//label添加
	public function add($arr)
	{
		return DB::table('label')->insert($arr);
	}

	//label查询
	public function select()
	{
		return DB::table('label')->get();
	}

	//label修改
	public function updates($lid, $arr)
	{
		return DB::table('label')->where('lid', $lid)->update($arr);
	}

	//根据 id 删除label的数据
	public function del($id)
	{
		return DB::table('label')->where('lid', $id)->delete();
	}

	//查询questions_label 的 lid 个数
	public function QLCount($id){
		
	}
}