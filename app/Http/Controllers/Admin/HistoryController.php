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
		if (Request::input('act') == 'mark') {
			$arr = array();
			// print_r(Request::input('his_id'));die;
			$arr = DB::table('history')->select('history_url')->where('his_id', Request::input('his_id'))->first();
			return file_get_contents($arr['history_url']);
		}
		else {
			$history = new History;
			$student = new Student;
			$label = new Label;
			$lib = new Lib;
			$arrFCla = DB::table('label')->get();
			$arrFLibRecursions = $lib->recursion($arrFCla);
			$arr = array();
			foreach ($arrFLibRecursions as $keyFLibRecursion => $valFLibRecursion) {
				if ($valFLibRecursion['level'] == '2' || $valFLibRecursion['level'] == '1') {
					continue;
				}
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
}
