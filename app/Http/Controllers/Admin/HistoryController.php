<?php

namespace App\Http\Controllers\Admin;

use DB, Redirect, Input, Response, Request,Session;

use App\Http\Controllers\Controller;
use App\Models\History;
use App\Models\Student;
use App\Models\Label;
use App\Models\Lib;

class HistoryController extends Controller
{
	public function lists()
	{
		$history = new History;
		$student = new Student;
		$label = new Label;
		$lib = new Lib;
		$arrFCla = DB::table('class')->get();
		$arrFLibRecursions = $lib->recursions($arrFCla);
		$arr = array();
		foreach ($arrFLibRecursions as $keyFLibRecursion => $valFLibRecursion) {
			$arr[] = $arrFLibRecursions[$keyFLibRecursion];
		}
		$dataHisShow = $history->show();
		foreach ($dataHisShow['data'] as $keyHisShow => $valHisShow) {
			$dataHisShow['data'][$keyHisShow]['addtime'] = date('Y-m-d H:i:s', $valHisShow['addtime']);
			$dataStuShow = $student->show($valHisShow['u_id']);
			$dataHisShow['data'][$keyHisShow]['stu_name'] = $dataStuShow['stu_name'];
		}

		if(Request::input('search')) {
			return view('admin/tabList', ['arr' => $dataHisShow]);
		} else {
			return view('admin/historyList', ['arr' => $dataHisShow, 'data' => $arr]);
		}
	}
}
