<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Request,DB,Session;

class MyController extends Controller
{
    /**
     * 个人信息
     * @author spc <15201155501@163.com>
     * @version 0.1
     * @return \Illuminate\Http\Response
     */
    public function MyInfo()
    {
        //获取登陆用户id
        $u_id = Session::get('u_id');

        if (is_numeric($u_id)){
            //通过id查询个人信息
            $data['info'] = DB::table('students')->where('stu_id',$u_id)->first();
        }else{
            $data['info'] = DB::table('students')->where('open_id',$u_id)->first();
        }


        return view('home.info',$data);

    }
}
