<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\FileGetContentsModel;
use App\Models\QuestionModel;
use JohnLui\AliyunOSS\AliyunOSS;
use DB,Session,DateTime;

class ExamModel extends Model
{
    /**
     * 查询考试列表
     * @author spc <15201155501@163.com>
     * @version 0.1
     * @return $arr 考试列表数据
     */
    public function getExamList(){
        //获取登陆学生的id
        $stu_id = Session::get('u_id');
        //echo $stu_id;die;
        //判断此用户是否qq用户
        if (!is_numeric($stu_id)) {
            echo "<script> var s = window.confirm('请先完整您的信息');if (s) {
                location.href='QQinfo';}else{history.go(-1)}</script>";exit();
        }

        //获取登陆学生的信息
        $info = DB::table('students')->select('c_id')->where('stu_id',$stu_id)->first();

        $c_id = $info['c_id'];
        //echo $c_id;die;
        $em_major = DB::table('label')->select('pid')->where('lid',$c_id)->first();
        //print_r($em_major);die;
        //echo $em_major['pid'];die;
        $exam = DB::table('exam')->where('em_major',$em_major['pid'])->get();

        return $exam;
    }
    
    /**
     * 查询试卷信息
     * @author spc <15201155501@163.com>
     * @version 0.1
     * @return $arr 考试信息
     */
    public function getExamInfo($id){
        return DB::table('exam')->where('em_id',$id)->first();
    }

    /**
     * 获取试卷
     * @author spc <15201155501@163.com>
     * @version 0.1
     * @return $arr 试卷
     */
    public function getTest($data)
    {
        // print_r($data);die;
        $data = json_decode($data,true);
        //dd($data);
        // print_r($data);die;
        //定义个空数组，存取打乱后的试卷信息
        $arr = array();
        $arrNum = array('A', 'B', 'C', 'D', 'E', 'F', 'G');
        foreach ($data as $key => $val) {
            $arr[$key]['answer'] = $val['answer'];
            $arr[$key]['tid'] = $val['tid'];
            $arr[$key]['qid'] = $val['qid'];
            $arr[$key]['options'] = $this->array_shuffle($val['options']);

            //取出试题标题
            $question = $val['options']['question'];
            unset($arr[$key]['options']['question']);

            $num = 0;
            if ($arr[$key]['tid'] == '0' || $arr[$key]['tid'] == '1') {
                foreach ($arr[$key]['options'] as $keyOptions => $valOptions) {
                    // echo $arrNum[$num].$valOptions."<br/>";
                    // print_r($arr[$key]['options'][$keyOptions]);
                    $arr[$key]['options'][$keyOptions] = $arrNum[$num]."&nbsp;&nbsp;&nbsp;&nbsp;".$valOptions;
                    $num++;
                }
            }
            $arr[$key]['question'] = $question;
        }
        // dd($arr);
        return $arr;
    }

    /**
     * 获取学生考试成绩
     * @author spc <15201155501@163.com>
     * @version 0.1
     * @param $data [array] 考试数据
     * @return $point [str] 学生成绩
     */
    public function getPoint($data){
        $dan = array();
        $check = array();
        $pan = array();

        //遍历查询题型,取出单选，多选，判断题
        foreach ($data as $k => $v){
            if(is_array($v)){
                $key = substr($k,3);
                $check[$key] = strtolower(implode(',', $v));
                $arrCommit[$key] = $v;
            }elseif(is_numeric($v)){
                if ($v=='1'){
                    $val = 'a';
                }elseif($v=='0'){
                    $val = 'b';
                }
                $key = substr($k,3);
                $pan[$key] = strtolower($val); 
                $arrCommit[$key] = strtolower($val); 
            }else{
                $key = substr($k,3);
                $dan[$key] = strtolower($v);
                $arrCommit[$key] = strtolower($v); 
            }
        }

        /**
         * 设置每个题型的分数
         * 测试数据为单选2.5
         * 多选是3分
         * 判断是2分
         */

        //每道题的详细信息
        $dan_arr_isOk = $this->get_true_num($dan);
        $check_arr_isOk = $this->get_true_num($check);
        $pan_arr_isOk = $this->get_true_num($pan);
        //返回分数
        $point = $dan_arr_isOk['num']*2.5+$check_arr_isOk['num']*2.5+$pan_arr_isOk['num']*2.5;
        unset($dan_arr_isOk['num'], $check_arr_isOk['num'], $pan_arr_isOk['num']);

        $arr = array();
        $arr = array_merge($dan_arr_isOk, $check_arr_isOk, $pan_arr_isOk);
        
        //从题库中获取相应题
        $arr_tid = array('0' => 0, '1' => 1, '2' => 2);
        // $id = Session::get('examId');
        // $info = $this -> getExamInfo($id);
        // $arr_json = json_decode($info['em_info'], true);
        $u_id = Session::get('u_id');
        $jsonFile = file_get_contents('test\student'.$u_id.'.php');
        $arrFile = json_decode($jsonFile, true);

        //判断每道答题是否正确
        ksort($arrCommit);
        foreach ($arrFile as $keyFile => $valFile) {
            foreach ($arrCommit as $keyCommit => $valCommit) {
                if ($valFile['qid'] == $keyCommit) {
                    if ($valFile['tid'] == 0) {
                        if ($valFile['answer'] == $valCommit) {
                            $arrFile[$keyFile]['is'] = '1';
                        }
                    }
                    if ($valFile['tid'] == 1) {
                        asort($valCommit);//die;
                        $answerImplode = implode(',', $valCommit); 
                        if ($valFile['answer'] == $answerImplode) {
                            $arrFile[$keyFile]['is'] = '1';
                        }
                    }
                    if ($valFile['tid'] == 2) {
                        if ($valFile['answer'] == $valCommit) {
                            $arrFile[$keyFile]['is'] = '1';
                        }
                    }
                    $arrFile[$keyFile]['commit'] = $arrCommit[$keyCommit];
                }
            }
        }

        //对正确答案进行排序
        foreach ($arrFile as $keyFiles => $valFiles) {
            if ($valFiles['tid'] == 0) {
                foreach($valFiles['options'] as $keyOp => $valOp) {
                    if ($valFiles['answer'] == $keyOp) {
                        $str = substr($valOp,0,1);
                        $arrFile[$keyFiles]['answer'] = $str;
                    }
                }
            }
            if ($valFiles['tid'] == 1) {
                $arrAnswer = explode(',', $valFiles['answer']);
                foreach($valFiles['options'] as $keyOp => $valOp) {
                    foreach ($arrAnswer as $keyAns => $valAns) {
                        if ($valAns == $keyOp) {
                            $str = substr($valOp,0,1);
                            $arrAnswer[$keyAns] = $str;
                            
                        }
                    }
                }
                asort($arrAnswer);
                $arrFile[$keyFiles]['answer'] = implode(',', $arrAnswer);
            }
            if ($valFiles['tid'] == 2) {
                if ($valFiles['answer'] == 'a') {
                    $arrFile[$keyFiles]['answer'] = '对';
                } else {
                    $arrFile[$keyFiles]['answer'] = '错';
                }
            }   
        }


        //生成静态页面
        $history =  view('home.history')->with('arr', $arrFile)->__toString();

        //设置历史文件名
        $filename = 'history/history_'.time().'.html';
        file_put_contents($filename, $history);
        $history_url = $this->OssUpload($filename,'http://oss-cn-shanghai.aliyuncs.com','vutnm1b0GLYzs31A', 'uE9oAabWF7Bw2ePksjyCkYNaiuLmr2');

        //历史试卷信息入库
        $data = array(
            'u_id' => Session::get('u_id'),
            'history_url' => $history_url,
            'his_name' => Session::get('em_name'),
            'point' => $point,
            'addtime' => time(),
            'ali_url' => $filename
        );

        $res = DB::table('history')->insert($data);

        return $point;
    }

    /**
     * 获取正确答案的个数
     * @anthor spc <15201155501@163.com>
     * @version 0.1
     * @param $lecture [array] 题型
     * @return $num [int] 正确个数
     */
    function get_true_num($lecture){
        $id = array_keys($lecture);
        //定义一个数字
        $num = 0;
        //查询正确答案
        for($i = 0; $i < count($id); $i++){
            $l_id = $id[$i];
            $result = DB::table('questions')->where('qid',$l_id)->first();
            $arr[] = $result['answer'];

            //答题正确的个数
            //判断该题是否正确
            if ($result['answer']==$lecture[$l_id]){
                $num++;
                $arr_isOk[$i]['is'] = 1;                       //是否正确
                $arr_isOk[$i]['qid'] = $l_id;                  //题型id
                $arr_isOk[$i]['answer'] = $result['answer'];   //正确答案
                $arr_isOk[$i]['tid'] = $result['tid'];         //题型id
                $arr_isOk[$i]['commit'] = $lecture[$l_id];     //提交答案
            } else {
                $arr_isOk[$i]['is'] = 0;
                $arr_isOk[$i]['qid'] = $l_id;
                $arr_isOk[$i]['answer'] = $result['answer'];
                $arr_isOk[$i]['tid'] = $result['tid'];
                $arr_isOk[$i]['commit'] = $lecture[$l_id];
            }
        }
        $arr_isOk['num'] = $num;
        $json = json_encode($arr_isOk['num']);
        Session::put('history_yes',$json);
        return $arr_isOk;
    }

    /**
     * 上传阿里云
     * @author spc <15201155501@163.com>
     * @version 0.1
     * @var $filename 上传的文件
     * @var $url 阿里云地址
     * @var $AccessKeyId
     * @var $AccessKeySecret
     * @return $url 返回上传成功的地址
     */
    function OssUpload($filename,$url,$AccessKeyId,$AccessKeySecret)
    {
        // 构建 OSSClient 对象
        // 三个参数：服务器地址、阿里云提供的AccessKeyId、AccessKeySecret
        $oss = AliyunOSS::boot($url, $AccessKeyId, $AccessKeySecret);

        // 设置 Bucket
        $oss = $oss->setBucket('aishunshun');

        // 上传一个文件（示例文件为 public 目录下的 robots.txt）
        // 两个参数：资源名称、文件路径
        $oss->uploadFile($filename, public_path($filename));

        // 从服务器获取这个资源的 URL 并打印
        // 两个参数：资源名称、过期时间
        $url = $oss->getUrl($filename, new DateTime("+15 day"));

        return $url;
    }

    /**
     * 将数组打乱
     * @author spc <15201155501@163.com>
     * @version 0.1
     * @param $array 要打乱的数组
     * @return $arr 打乱后的数组
     */
    function array_shuffle($array)
    {
        //不是数组
        if(!is_array($array)) {
            return array();
        }
        //如果为空或者只有1项
        if(($count=count($array))<=1){
            return $array;
        }

        //定义空数组，存储数组中的键
        $keys = array();
        //取出数组中的键
        $keys = array_keys($array);
        shuffle($keys);
        
        //定义一个数组，存储打乱后的数组
        $newArr=array();
        foreach($keys as $v) {
            $newArr[$v] = $array[$v];
        }
        return $newArr;
    }
}
