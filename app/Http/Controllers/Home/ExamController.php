<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\ExamModel;
use Request,Session,DB;
header('content-type:text/html;charset=utf-8');
class ExamController extends Controller
{
    /**
     * 开始考试-列表页
     * @author spc <15201155501@163.com>
     * @version 0.1
     * @return \Illuminate\Http\Response
     */
    public function examList(){
        //实例化model
        $model = new ExamModel();
        $arr['examList'] = $model -> getExamList();
        return view('home.exam',$arr);
    }

    /**
     * 开始考试-进行考试
     * @author spc <15201155501@163.com>
     * @version 0.1
     * @param $id [int] 试卷的id
     */
    public function startExam(){
        //接收试卷id
        $id = Request::get('id');
        Session::put('examId', $id);
        //查询试卷信息
        $model = new ExamModel();
        $info = $model -> getExamInfo($id);

        // dd($info);die;
        Session::put('em_id', $info['em_id']);
        Session::put('em_name', $info['em_name']);
        //处理时间戳
        $nowtime = time();
        $start_time = strtotime($info['start_time']);
        $end_time = strtotime($info['end_time']);

        //判断是否在考试时间内
        if ($nowtime<$start_time){
            echo "<script>alert('考试还未开始');location.href='examList';</script>";
            exit();
        }elseif ($nowtime>$end_time || DB::table('students_exam')->where('stu_id',Session::get('u_id'))->where('em_id',$info['em_id'])->first()){
            echo "<script>alert('你已经考过试了');location.href='examList';</script>";
            exit();
        }

        //print_r($info['em_info']);die;
        //正常考试时间，获取考试内容，生成考试试卷
        $arr = $model -> getTest($info['em_info']);
        // print_r($arr);die;
        $u_id = Session::get('u_id');
        $arr_json = json_encode($arr);
        file_put_contents('test\student'.$u_id.'.php', $arr_json);
        include('test/test.php');


        //ob_start(); //打开输出缓冲区
        //echo file_get_contents('test/exam_2.html');
        //header('location:test/exam_2.html');
        //$content = ob_get_contents(); //取得php页面输出的全部内容
    }

    /**
     * 检查试卷
     * @author spc <15201155501@163.com>
     * @version 0.1
     * @$data [array] 考试的数据
     */
    public function checkExam(){
        //接收考试数据
        $data = Request::all();
        // print_r($data);die;
        //实例化model
        $model = new ExamModel();

        //获取学生成绩
        $point = $model -> getPoint($data);

        echo $point;
    }

    /**
     * 历史试卷列表
     * @author spc <15201155501@163.com>
     * @version 0.1
     * @return url 历史试卷的文件
     */
    public function historyExam(){
        //获取登陆的id
        $u_id = Session::get('u_id');

        $data['arr'] = DB::table('history')->where('u_id',$u_id)->get();
        // dd($data);
        return view('home.history_list',$data);

    }

    /**
     * 查看历史试卷
     * @author spc <15201155501@163.com>
     * @version 0.1
     */
    public function historyInfo(){
        //接收请求数据
        $id = Request::get('id');

        $arr = DB::table('history')
        ->join('exam','history.his_name','=','exam.em_name')
        ->where('his_id',$id)->first();
        //处理时间戳
        $nowtime = time();
        $end_time = strtotime($arr['end_time']);
        //判断是否在考试时间内
        if ($nowtime<$end_time){
            echo "<script>alert('考试还未结束，不能查看历史试卷');location.href='examList';</script>";
            exit();
        }

        //获取文件地址
        $url = $arr['history_url'];
        if($url){
            //查看试卷
            echo file_get_contents($url);
        }else{
            //查看试卷
            echo file_get_contents($arr['ali_url']);
        }
    }
}
