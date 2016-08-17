<?php

namespace App\Http\Controllers\Admin;

use DB, Redirect, Input, Response, Request,Session;

use App\Http\Controllers\Controller;

class ExamPriControllerController extends Controller{
	/**
	 * 试卷权限添加表单
	 * @author jnn <15210121352@163.com>
	 * @version 0.0.1
	 */
	public function index()
	{
		return view('admin/exam_pri_add');
	}

}