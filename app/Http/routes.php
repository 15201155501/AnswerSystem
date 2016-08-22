<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
	// Route::group(["prefix" => "admin", 'middleware' => 'admin'], function() { });
	// Route::get('/', function () {
	//     return view('welcome');
	// });

	/**
	 * 前台路由
	 */
	Route::get('QQlogin','Home\OAuthController@QQlogin');//QQ登录
	Route::get('OAuthQQ','Home\OAuthController@OAuthQQ');//登陆-
	Route::get('/','Home\LoginsController@index');//登陆
	Route::get('login_pro','Home\LoginsController@login_pro');//登陆-验证
	Route::get('logout','Home\LoginsController@logout');//登陆-验证
	
	//前台路由组
	Route::group(["prefix" => "/"], function() {
		Route::get('index','Home\HomeController@index');//前台首页

		//开始考试
		Route::get('examList','Home\ExamController@examList');//开始考试-列表页
		Route::get('startExam','Home\ExamController@startExam');//开始考试-进行考试
		Route::get('checkExam','Home\ExamController@checkExam');//开始考试-进行考试
		
		//历史试卷
		Route::get('historyExam','Home\ExamController@historyExam');//历史试卷-列表
		Route::get('historyInfo','Home\ExamController@historyInfo');//历史试卷-详情
		
		//个人信息
		Route::get('myself','Home\MyController@myInfo');//个人信息
	});


	/**
	 * 后台路由
	 */
	Route::get('login','Admin\LoginController@index');//登陆
	Route::get('login_submit','Admin\LoginController@login_submit');
	Route::get('loginout','Admin\LoginController@loginout');//退出
	

//后台路由组
Route::group(['middleware'=>'Permission'],function(){

	//后台
	Route::get('admina','Admin\AdminController@index');//主页
	Route::get('b','Admin\bController@index');//主页

	//题库管理
	Route::match(['get', 'post'], 'uploadFile','Admin\UploadFileController@index');//题库上传
	//Route::match(['get', 'post'], 'fileList','Admin\fileListController@index');		//题库列表
	
	//标签管理
	Route::match(['get', 'post'], 'label','Admin\LabelController@index');//标签添加
	Route::match(['get', 'post'], 'listLabel','Admin\LabelController@listLabel');//标签管理

	Route::get('owner_add','Admin\OwnerController@index');//管理员添加
	Route::post('owner_pro','Admin\OwnerController@owner_pro');
	Route::get('owner_list','Admin\OwnerController@owner_list');//列表
	Route::get('owner_del','Admin\OwnerController@owner_del');//删除
	
	Route::get('role_add','Admin\RoleController@index');//角色添加
	Route::get('role_pro','Admin\RoleController@role_pro');
	Route::get('role_list','Admin\RoleController@role_list');

	Route::get('user_role','Admin\RoleController@user_role');//角色分配
	Route::get('roleTaskpro','Admin\RoleController@roleTaskpro');

	Route::get('privilege_add','Admin\PrivilegeController@index');//权限添加
	Route::get('privilege_list','Admin\PrivilegeController@privilege_list');//权限列表
	Route::get('role_privilege','Admin\PrivilegeController@role_privilege');//权限分配
	Route::get('privilegeTaskpro','Admin\PrivilegeController@privilegeTaskpro');
	Route::get('privilegeChecked','Admin\PrivilegeController@privilegeChecked');//权限默认选中

	Route::get('student_add','Admin\StudentController@index');//学生添加
	Route::post('student_pro','Admin\StudentController@student_pro');
	Route::get('stu_excel','Admin\ExcelController@import');//批量添加
	Route::get('student_list','Admin\StudentController@student_list');//学生列表
	
	Route::get('exam_pri_add','Admin\ExamPriController@index');//试卷权限添加

	Route::get('generate_add','Admin\TestController@generate_add');//添加考题
	Route::get('select','Admin\TestController@select');//无限极分类
	Route::get('check_test','Admin\TestController@check_test');
	Route::post('generate_addPro','Admin\TestController@generate_addPro');
	Route::post('generate_test','Admin\TestController@generate_test');//生成试卷
	Route::get('generate_testAdd','Admin\TestController@generate_testAdd');//添加题库
	Route::get('generate_testList','Admin\TestController@generate_testList');//题库列表
	Route::get('generate_list','Admin\TestController@generate_list');
	Route::get('test_del','Admin\TestController@test_del');
	Route::get('generate_testPro','Admin\TestController@generate_testPro');//生成试卷

	Route::get('historyList','Admin\HistoryController@lists');//成绩查看
});