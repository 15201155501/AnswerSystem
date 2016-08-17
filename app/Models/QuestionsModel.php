<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\FileGetContentsModel;
use DB,Session;
class QuestionsModel extends Model
{
	/**
	 * 获取试题,返回带有正确答案的试卷信息
	 * @param  [array] $arr [学生提交试卷的内容]
	 * @return [array]      [试卷信息]
	 */
	public function getQuestion($arr)
	{
		$data = array();
		foreach ($arr as $key => $val) {
			$data[] = DB::table('questions')->where('qid', $val['qid'])->select('qid', 'tid')->first();
		}
		$FGCModel = new FileGetContentsModel;
		$accpet = $FGCModel->fileGet($arr);
	}
}