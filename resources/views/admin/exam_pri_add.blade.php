<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>学生分配试卷权限管理</title>
    <meta name="keywords" content="Bootstrap模版,Bootstrap模版下载,Bootstrap教程,Bootstrap中文" />
    <meta name="description" content="站长素材提供Bootstrap模版,Bootstrap教程,Bootstrap中文翻译等相关Bootstrap插件下载" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- basic styles -->
    <link href="Admin/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="Admin/assets/css/font-awesome.min.css" />

    <!--[if IE 7]>
      <link rel="stylesheet" href="Admin/assets/css/font-awesome-ie7.min.css" />
    <![endif]-->

    <!-- page specific plugin styles -->

    <!-- fonts -->

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
        <li class="active">题库管理》上传题库</li>
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
       <h1> 学生分配试卷权限添加<small> <i class="icon-double-angle-right"></i></small> </h1> 
      </div>

      <!-- /.page-header --> 
      <div class="row"> 
       <div class="col-xs-12"> 
        <!-- PAGE CONTENT BEGINS --> 
        <div class="row"> 
         <div class="col-xs-12"> 
          <div class="table-responsive"> 
          
          <form action="owner_pro" method="post" enctype="multipart/form-data">
          <center>
           <table id="sample-table-1" class="table table-striped table-bordered table-hover"> 
            <tr>
              <td align="center">学生分配试卷权限管理</td>
              <td>
              
              </td>
            </tr>
            <tr>
              <td align="center">学生分配试卷权限名称</td>
              <td>
                  <input type="text" name="pri_name" id="pri_name">
              </td>
            </tr>
            <tr>
              <td align="center">父级权限</td>
              <td>
                  <select name="" id="pri_fid">
                      <option value="0">请选择</option>
                      @foreach($data as $v)
                      <option value="{{ $v['pri_id'] }}" ><?php echo str_repeat('----',$v['level']);?>{{ $v['pri_name'] }}</option>
                      @endforeach
                  </select>
              </td>
            </tr>
            <tr>
              <td align="center">路由名称</td>
              <td>
                  <input type="text" name="pri_route" id="pri_route">
              </td>
            </tr>
            
           
            <tr>
              <td align="right"><input type="reset" class="btn"></td>
              <td align="left">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <input type="hidden" value="add">
                <input type="button" id="sub" class="btn btn-info" value="提交" />
              </td>
            
            </tr>
           </table> 
           </center>
           </form>
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
  <script type="text/javascript">
     
    </script> 


  <div style="display:none">
  </div>   
 </body>
 <script src="jquery.js"></script>
 <script type="text/javascript">
    $("#sub").click(function(){
      var pri_name = $("#pri_name").val();
      var pri_fid = $("#pri_fid").val();
      var pri_route = $("#pri_route").val();
      if(pri_name == '' || pri_route == ''){
        alert('学生分配试卷权限名称和路由名称都必须填写。');
      }else{
        $.get('privilege_add',{'pri_name':pri_name,'pri_fid':pri_fid,'pri_route':pri_route},function(msg){
          if (msg==1) {
            alert('学生分配试卷权限添加完成');
          }else{
            alert('该学生分配试卷权限已存在，请重新添加。');
          }
        });
      }

    });
    </script>

</html>
