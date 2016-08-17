<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\OssModel;
use DB,Session;
class FileGetContentsModel extends Model
{
	/**
	 * 获取相应试题
	 * @return [type] [description]
	 */
	public function fileGet($arr)
	{
		//实例化oss
		$OssModel = new OssModel;

		//循环取出题型id
		foreach ($arr as $key => $val) {
			$arr_tid[] = $val['tid'];
		}

		//调用oss的getOssUrl方法返回url,和过期时间
		foreach ($arr_tid as $key_tid => $val_tid) {
			$arr_callBack = $OssModel->getOssUrl($val_tid);
			$arr_getFile[] = file_get_contents($arr_callBack['url']); //云端获取文件
		}

		return $arr_getFile;
	}
}