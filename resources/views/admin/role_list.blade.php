<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>角色列表</title>
    <meta name="keywords" content="Bootstrap模版,Bootstrap模版下载,Bootstrap教程,Bootstrap中文" />
    <meta name="description" content="站长素材提供Bootstrap模版,Bootstrap教程,Bootstrap中文翻译等相关Bootstrap插件下载" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- basic styles -->
    <link href="Admin/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="Admin/assets/css/font-awesome.min.css" />


    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />

    <!-- ace styles -->

    <link rel="stylesheet" href="Admin/assets/css/ace.min.css" />
    <link rel="stylesheet" href="Admin/assets/css/ace-rtl.min.css" />
    <link rel="stylesheet" href="Admin/assets/css/ace-skins.min.css" />


    <script src="Admin/assets/js/ace-extra.min.js"></script>

   
  </head>

  <body>
    <div class="navbar navbar-default" id="navbar">
      <script type="text/javascript">
        try{ace.settings.check('navbar' , 'fixed')}catch(e){}
      </script>

      <div class="navbar-container" id="navbar-container">
        
        @include('admin.header')
        
      </div><!-- /.container -->
    </div>

    <div class="main-container" id="main-container">
      <script type="text/javascript">
        try{ace.settings.check('main-container' , 'fixed')}catch(e){}
      </script>

      <div class="main-container-inner">
        <a class="menu-toggler" id="menu-toggler" href="#">
          <span class="menu-text"></span>
        </a>

        @include('admin.left')

        <div class="main-content">
          <div class="breadcrumbs" id="breadcrumbs">
            <script type="text/javascript">
              try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
            </script>
        <ul class="breadcrumb">
        <li>
          <i class="icon-home home-icon"></i>
          <a href="#">首页</a>
        </li>
        <li class="active">我的面板》修改密码</li>
      </ul><!-- .breadcrumb -->

      <div class="nav-search" id="nav-search">
        <form class="form-search">
          <span class="input-icon">
            <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
            <i class="icon-search nav-search-icon"></i>
          </span>
        </form>
      </div><!-- #nav-search -->
    </div>
     <div class="page-content"> 
      <div class="page-header"> 
       <h1> 邮箱设置<small> <i class="icon-double-angle-right"></i></small> </h1> 
      </div>


      <!-- /.page-header --> 
      <div class="row"> 
       <div class="col-xs-12"> 
        <!-- PAGE CONTENT BEGINS --> 
        <div class="row"> 
         <div class="col-xs-12"> 
          <div class="table-responsive"> 
          <center>
           <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                        <thead>
                          <tr>
                            <th class="center">
                              <label>
                                <input type="checkbox" class="ace" />
                                <span class="lbl"></span>
                              </label>
                            </th>
                            <th>角色ID</th>
                            <th>角色名称</th>
                            <th>
                              <i class="icon-time bigger-110 hidden-480"></i>
                              管理员操作
                            </th>
                          </tr>
                        </thead>

                        <tbody>
                        @foreach($role_data as $v)
                          <tr>
                            <td class="center">
                              <label>
                                <input type="checkbox" class="ace" />
                                <span class="lbl"></span>
                              </label>
                            </td>
                            <td>
                              <a href="#">{{$v['role_id']}}</a>
                            </td>
                            <td>{{$v['role_name']}}</td>
                            <td>
                                <a href="role_del?id={{$v['role_id']}}">删除</a>| <a href="">修改</a>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
           </center>           
          </div>
          <!-- /.table-responsive --> 
         </div>
         <!-- /span --> 
        </div>
     </div>
     <!-- /.page-content --> 
    </div>
    <!-- /.main-content --> 
    @include('admin.buttom')
    <!-- /#ace-settings-container --> 
   </div>
   <!-- /.main-container-inner --> 
   <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse"> <i class="icon-double-angle-up icon-only bigger-110"></i> </a> 
  </div>
  <!-- /.main-container --> 
 
  <script type="text/javascript">
      window.jQuery || document.write("<script src='Admin/assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
    </script> 

  <script type="text/javascript">
      if("ontouchend" in document) document.write("<script src='Admin/assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
    </script> 
  <script src="Admin/assets/js/bootstrap.min.js"></script> 
  <script src="Admin/assets/js/typeahead-bs2.min.js"></script> 
  <!-- page specific plugin scripts --> 
  <script src="Admin/assets/js/jquery.dataTables.min.js"></script> 
  <script src="Admin/assets/js/jquery.dataTables.bootstrap.js"></script> 
  <!-- ace scripts --> 
  <script src="Admin/assets/js/ace-elements.min.js"></script> 
 
  <!-- inline scripts related to this page --> 
  

  
  <div style="display:none">
  </div>   
 </body>
</html>