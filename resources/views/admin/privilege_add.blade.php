<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>权限管理</title>
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

    <!--[if lte IE 8]>
      <link rel="stylesheet" href="Admin/assets/css/ace-ie.min.css" />
    <![endif]-->

    <!-- inline styles related to this page -->

    <!-- ace settings handler -->

    <script src="Admin/assets/js/ace-extra.min.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!--[if lt IE 9]>
    <script src="Admin/assets/js/html5shiv.js"></script>
    <script src="Admin/assets/js/respond.min.js"></script>
    <![endif]-->
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
        <li class="active">权限管理》权限添加</li>
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
       <h1> 添加试卷<small> <i class="icon-double-angle-right"></i></small> </h1>
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
              <td align="center">权限管理</td>
              <td>
              
              </td>
            </tr>
            <tr>
              <td align="center">权限名称</td>
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
        <!-- /row -->
        <div class="hr hr-18 dotted hr-double"></div>
        <div class="hr hr-18 dotted hr-double"></div>
        </td>
             </tr>
            </tbody>
           </table>
          </div>
         </div>
        </div>
        <div id="modal-table" class="modal fade" tabindex="-1">
         <div class="modal-dialog">
          <div class="modal-content">
           <div class="modal-header no-padding">
            <div class="table-header">
             <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> <span class="white">&times;</span> </button> Results for &quot;Latest Registered Domains
            </div>
           </div>
           <div class="modal-body no-padding">
           </div>
           <div class="modal-footer no-margin-top">
            <button class="btn btn-sm btn-danger pull-left" data-dismiss="modal"> <i class="icon-remove"></i> Close </button>
            <ul class="pagination pull-right no-margin">
             <li class="prev disabled"> <a href="#"> <i class="icon-double-angle-left"></i> </a> </li>
             <li class="active"> <a href="#">1</a> </li>
             <li> <a href="#">2</a> </li>
             <li> <a href="#">3</a> </li>
             <li class="next"> <a href="#"> <i class="icon-double-angle-right"></i> </a> </li>
            </ul>
           </div>
          </div>
          <!-- /.modal-content -->
         </div>
         <!-- /.modal-dialog -->
        </div>
        <!-- PAGE CONTENT ENDS -->
       </div>
       <!-- /.col -->
      </div>
      <!-- /.row -->
     </div>
     <!-- /.page-content -->
    </div>
    <!-- /.main-content -->
    <div class="ace-settings-container" id="ace-settings-container">
     <div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
      <i class="icon-cog bigger-150"></i>
     </div>
     <div class="ace-settings-box" id="ace-settings-box">
      <div>
       <div class="pull-left">
        <select id="skin-colorpicker" class="hide"> <option data-skin="default" value="#438EB9">#438EB9</option> <option data-skin="skin-1" value="#222A2D">#222A2D</option> <option data-skin="skin-2" value="#C6487E">#C6487E</option> <option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option> </select>
       </div>
       <span>&nbsp; Choose Skin</span>
      </div>
      <div>
       <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-navbar" />
       <label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
      </div>
      <div>
       <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-sidebar" />
       <label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
      </div>
      <div>
       <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-breadcrumbs" />
       <label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
      </div>
      <div>
       <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" />
       <label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
      </div>
      <div>
       <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-add-container" />
       <label class="lbl" for="ace-settings-add-container"> Inside <b>.container</b> </label>
      </div>
     </div>
    </div>
    <!-- /#ace-settings-container -->
   </div>
   <!-- /.main-container-inner -->
   <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse"> <i class="icon-double-angle-up icon-only bigger-110"></i> </a>
  </div>
  <!-- /.main-container -->
  <!-- basic scripts -->
  <!--[if !IE]> -->
  <!-- <![endif]-->
  <!--[if IE]>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<![endif]-->
  <!--[if !IE]> -->
  <script type="text/javascript">
      window.jQuery || document.write("<script src='Admin/assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
    </script>
  <!-- <![endif]-->
  <!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='Admin/assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]-->
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
  <script src="Admin/assets/js/ace.min.js"></script>
  <!-- inline scripts related to this page -->
  <script type="text/javascript">
      jQuery(function($) {
        var oTable1 = $('#sample-table-2').dataTable( {
        "aoColumns": [
            { "bSortable": false },
            null, null,null, null, null,
          { "bSortable": false }
        ] } );


        $('table th input:checkbox').on('click' , function(){
          var that = this;
          $(this).closest('table').find('tr > td:first-child input:checkbox')
          .each(function(){
            this.checked = that.checked;
            $(this).closest('tr').toggleClass('selected');
          });

        });
        $('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
        function tooltip_placement(context, source) {
          var $source = $(source);
          var $parent = $source.closest('table')
          var off1 = $parent.offset();
          var w1 = $parent.width();

          var off2 = $source.offset();
          var w2 = $source.width();

          if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
          return 'left';
        }
      })
    </script>

    <script>

</script>

<script type="text/javascript">
      $('input[id=lefile]').change(function() {
      $('#photoCover').val($(this).val());
      });
</script>
  <div style="display:none">
  </div>
 </body>
</html>
<script src="jquery.js"></script>
 <script type="text/javascript">
    $("#sub").click(function(){
      var pri_name = $("#pri_name").val();
      var pri_fid = $("#pri_fid").val();
      var pri_route = $("#pri_route").val();
      if(pri_name == '' || pri_route == ''){
        alert('权限名称和路由名称都必须填写。');
      }else{
        $.get('privilege_add',{'pri_name':pri_name,'pri_fid':pri_fid,'pri_route':pri_route},function(msg){
          if (msg==1) {
            alert('权限添加完成');
          }else{
            alert('该权限已存在，请重新添加。');
          }
        });
      }

    });
    </script>

