<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\FileGetContentsModel;
use App\Models\QuestionModel;
use JohnLui\AliyunOSS\AliyunOSS;
use DB,Session;
class OssModel extends Model
{
	public function getOssUrl($tid)
	{
		return DB::table('oss_file_url')->select('url', 'over_time')->where('file_name', $tid.".js")->first();
	}

	/**
	 * 上传到oss
	 * @param  string  $file_name 文件名称
	 * @return array   $arrCallback   返回url,过期时间
	 */
	public function oss($file_name)
	{
		// echo file_get_contents('http://aishunshun.oss-cn-shanghai.aliyuncs.com/1.js?OSSAccessKeyId=vutnm1b0GLYzs31A&Signature=9tWuA7BIh54E8X%2FmuVAUZkXxYrM%3D&Expires=1470553466');
		// 构建 OSSClient 对象
		// 三个参数：服务器地址、阿里云提供的AccessKeyId、AccessKeySecret
		$oss = AliyunOSS::boot('http://oss-cn-shanghai.aliyuncs.com',  'vutnm1b0GLYzs31A', 'uE9oAabWF7Bw2ePksjyCkYNaiuLmr2' );

		// 设置 Bucket
		$bucketName = 'aishunshun';
		$oss = $oss->setBucket($bucketName);

		// 上传一个文件（示例文件为 public 目录下的 1.js）
		// 两个参数：资源名称、文件路径
		$oss->uploadFile($file_name, public_path($file_name));

		// 从服务器获取这个资源的 URL 并打印
		// 两个参数：资源名称、过期时间
		$url = $oss->getUrl($file_name, new DateTime("+15 day"));
		$arrCallback = array();
		$arrCallback['url'] = $url;
		$time = ((array)new DateTime("+15 day"));		//过期时间
		$arrCallback['over_time'] = $time['date'];
		return $arrCallback;
	}
}