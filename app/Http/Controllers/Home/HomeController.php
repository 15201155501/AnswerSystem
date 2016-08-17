<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use DB,Request;


class HomeController extends Controller{
    /**
     * 后台首页
     */
    public function index()
    {
        return view('home/index');
    }

}