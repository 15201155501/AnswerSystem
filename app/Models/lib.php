<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 公共的函数
 */
class lib extends Model
{
	/**
	 * 无限极分类
	 * @param  array  $data  从数据库得到的数据
	 * @param  integer $p_id  每条数据的id
	 * @param  integer $level 每条数据的所属分类等级
	 * @return array         分类完成的数据
	 */
	public function recursion($data, $p_id=0, $level=0)
	{
		//定义一个静态数组
		static $lists = array();

		//递归操作
		foreach ($data as $key => $v) {
			if ($v['pid'] == $p_id) {
				$v['level'] = $level;
				$lists[] = $v;
				$this->recursion($data,$v["lid"],$level+1);
			}
		}
		return $lists;
	} 
}
?>