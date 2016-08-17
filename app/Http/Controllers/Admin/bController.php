<?php 
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use DateTime,DB;
header('content_type:text/html;charset=utf8');
class bController extends Controller
{

	public function index()
	{
		// $time = new DateTime("+15 day");
		// $url = DB::table('oss_file_url')->select('url')->where('file_name', '0.js')->first();
		// dd($url);
		// dd((array)new DateTime("+15 day"));
		// print_r($time);
		// echo $time -> date;
		// echo date('Y-m-d H:i:s', 1471922605);
		$str = file_get_contents('0.js');
		$json_arr = explode(' ', $str);
		// dd($str);
		$arr = json_decode($str, true);
		foreach ($json_arr as $key => $v) {
			$data = json_decode($v, true);
			if (!empty($data)) {
				foreach ($data as $keys => $vs) {
					if ($vs)
					$arr[$keys] = $vs;
				}
			}
		}
		print_r($arr);
		$arrs = array_column($arr, '1');
		dd($arrs);
		// file_put_contents('a.txt', 'aassssa', FILE_APPEND);
	}
}
?>