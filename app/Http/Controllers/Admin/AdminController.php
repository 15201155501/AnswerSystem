<?php

namespace App\Http\Controllers\Admin;

use DB, Redirect, Input, Response, Request,Session;

use App\Http\Controllers\Controller;

class AdminController extends Controller{
	/**
	 * 后台首页
	 */
	public function index()
	{
		return view('admin/index');
	}

}