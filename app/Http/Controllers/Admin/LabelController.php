<?php 
namespace App\Http\Controllers\Admin;

use DB, Redirect, Input, Response, Request,Session;

use App\Http\Controllers\Controller;
use App\Models\Questions;
use App\Models\Label;
use App\Models\lib;

class LabelController extends Controller
{

	/**
	 * 标签管理
	 * @return [type] [description]
	 */
	public function index()
	{
		$label = new Label;
		$lib = new Lib;
		//数据添加
		if (Request::input('act') == 'add') {
			$arr = Request::all();
			unset($arr['_token'], $arr['act']);

			//调用 label 的 add方法
			if ($label->add($arr)) {
				return redirect('label');
			}
		}

		//展示表单添加页面
		else {
			$arr = DB::table('label')->get();

			//调用lib 的 recursion方法
			$data = $lib -> recursion($arr);
			return view('admin/label', ['arr' => $data]);
		}
	}

	/**
	 * 标签列表
	 * @return [type] [description]
	 */
	public function listLabel()
	{
		$label = new Label;
		$questions = new Questions;
		$lib = new Lib;

		//标签修改
		if (Request::input('act') == 'checkSave') {
			$arrFFrom = Request::all();
			unset($arrFFrom['act']);
			$boolFLabel = $label->updates($arrFFrom['lid'], $arrFFrom);
			if ($boolFLabel) {
				return 'true';
			} else {
				return 'false';
			}
		} 

		//标签删除
		if (Request::input('act') == 'checkDel') {
			$lid = Request::input('lid');

			//判断改标签下是否关联题库
			$countFquestion = $questions->count($lid);
			if ($countFLabel > 0){
				return 'false';
			} else {
				if ($label->del($lid)) {
					return 'true';
				}
			}
		}

		//根据 lid 删除 questions 表的数据
		if (Request::input('act') == 'labelDelOk') {
			$id = Request::input('lid');
			return $questions->del($id);
		}

		//标签页面展示
		else {
			$arrFLabel = $label->select();
			$arrFLib = $lib->recursion($arrFLabel);
			return view('admin/listLabel', ['arr' => $arrFLib]);
		}
	}

}
?>