<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>后台首页</title>
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
        <li class="active">标签管理》标签列表</li>
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
       <h1> 标签列表<small> <i class="icon-double-angle-right"></i></small> </h1> 
      </div>
      <!-- /.page-header --> 
      <div class="row"> 
       <div class="col-xs-12"> 
        <!-- PAGE CONTENT BEGINS --> 
        <div class="row"> 
         <div class="col-xs-12"> 
          <div class="table-responsive"> 
           <table id="sample-table-1" class="table table-striped table-bordered table-hover"> 
            <thead> 
             <tr> 
              <th class="center"> <label> <input type="checkbox" class="ace" /> <span class="lbl"></span> </label> </th> 
              <th>标签id</th> 
              <th>标签名称</th> 
              <th></th> 
             </tr> 
            </thead> 
            <tbody> 
             @foreach($arr as $key => $v)
             <tr id="tr_{{$v['lid']}}"> 
              <td class="center"> <label> <input type="checkbox" class="ace" /><span class="lbl"></span> </label> </td> 
              <td>{{$v['lid']}}</td>
              <td>{{str_repeat('__', $v['level'])}}<input type="text" id="input_{{$v['lid']}}" style="display:none"><span onclick="save({{$v['lid']}})" id="span_{{$v['lid']}}">{{$v['lname']}}</span></td> 
              <td> 
               <div class="visible-md visible-lg hidden-sm hidden-xs btn-group"> 
                <button class="btn btn-xs btn-danger" onclick="label_del({{$v['lid']}})" title="删除"> <i class="icon-trash bigger-120"></i> </button> 
               </div> 
               <div class="visible-xs visible-sm hidden-md hidden-lg"> 
                <div class="inline position-relative"> 
                 <button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown"> <i class="icon-cog icon-only bigger-110"></i> </button> 
                </div> 
               </div> 
              </td> 
             </tr> 
             @endforeach
            </tbody> 
           </table> 
          </div> 

          <!-- 遮罩层 -->
          <!-- <div id="main"><a href="javascript:showBg();">点击这里查看效果</a> -->
            <div id="fullbg"></div>
            <div id="dialog">
            <p class="close"><a href="#" onclick="closeBg();">关闭</a></p>
            <div></div>

            <div class="control-group">
            <label class="control-label bolder blue">Checkbox</label>
            <div class="checkbox">            
            </div>
            <div class="col-md-offset-3">
                <button class="btn btn-info" type="button" onclick = "submit()">
                  <i class="icon-ok bigger-110"></i>
                  提交
                </button>
            </div>

            </div>
          </div> 
          <!-- end遮罩层 -->

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
            <table class="table table-striped table-bordered table-hover no-margin-bottom no-border-top"> 
             <thead> 
              <tr> 
               <th>Domain</th> 
               <th>Price</th> 
               <th>Clicks</th> 
               <th> <i class="icon-time bigger-110"></i> Update </th> 
              </tr> 
             </thead> 
             
            </table> 
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
 <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script> 
  <!-- <![endif]--> 
  <!--[if IE]>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>--> 
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

      function save(id){
            var name = $('#span_'+id).text();
            var input = $('#input_'+id);
            input.show();
            input.focus().val(name);
            $('#span_'+id).hide();
            $('#span_'+id).click(function(){
              return false;
            })
            input.blur(function(){
              var new_name = input.val();
              if ( (new_name != name) && (new_name != '') ) {
                var url = "{{url('listLabel')}}";
                var data = {act:'checkSave', lname:new_name, lid:id}
                $.get(url, data, function(e){
                  console.log(e)
                  if (e == 'false') {
                    alert('改名称已存在');
                    input.hide();
                    $('#span_'+id).show().text(name);
                    input.unbind();
                  } else if (e == 'true') {
                     input.hide();
                     $('#span_'+id).show().text(new_name);
                     input.unbind();
                  }
                })
              } else {
                input.hide();
                $('#span_'+id).show();
              }
            })
          }


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
    <script type="text/javascript">
      //显示灰色 jQuery 遮罩层
      function showBg(id) {
      var bh = $("body").height();
      var bw = $("body").width();   

       //权限分配角色
        var url = "{{url('admin/power_list')}}";
        var data = {act:'power_role', id:id};
        $.get(url,data,function(data){
          if (data == '0') {
            alert('该权限是最高权限，无法修操作');
          } else {
            $("#fullbg").css({
              height:bh,
              width:bw,
              display:"block"
            });  
            $("#dialog").show();
             var str = '';
              for(var i in data) {
                if ( data[i]['checked'] == 'true') {
                  var checked = "checked";
                } else {
                  var checked = "";
                }
                str += "<label>";
                str += "<input value='"+data[i]['role_id']+"' type='checkbox' class='ace'  "+checked+"/>";
                str += "<span class='lbl'>"+data[i]['role_name']+"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>";
                str += "</label>";
                if ((i+1)%4 == '0') {
                  str += "<br/>";
                }
              }
              str += "<input type='hidden' name='label_id' value="+data['id']+">";
              $('.checkbox').html(str);
          }
        },'json');

      }    

      //获取被选中的复选框的值
      function submit()
      {
        var val = [];
        var id = $('input[name=label_id]').val();
        // alert(id)
        // val = $('.checkbox input[type=checkbox]:checked').val();
        $('.checkbox input[type=checkbox]:checked').each(function()
        {
         val.push($(this).val()); 
        });
        // alert(val)
        var url = "{{url('admin/power_list')}}";
        var data =  {act:'role_label_add',role_id:val,id:id};
        // alert(data)
        $.get(url,data,function(e){
          // console.log(e)
          if (e == 'true') {
            alert('操作成功')
          }
        });
      }

      //标签删除
      function label_del(id){
        var data = {act:'labelDel',lid:id};
        var url = "listLabel";
        $.get(url,data,function(e){
          if (e == 'true') {
            $('#tr_'+id).remove();
            alert('删除成功');
          } else {
            if (confirm('该标签拥有关联试题，删除后该标签相对试题一并删除,是否删除')) {
              label_del_ok(id)
            }
          }
        });
      }   

      //删除角色及角色与用户关联表
      function label_del_ok(id){
        var data = {act:'labelDelOk',lid:id};
        var url = "listLabel";
        $.get(url,data,function(e){
          // alert(e)
          $('#tr_'+id).remove();
          alert('删除成功');
        })
      }       

      //关闭灰色 jQuery 遮罩
      function closeBg() {
      $("#fullbg,#dialog").hide();
      }
    </script>
  <div style="display:none">
   <!--<script src="http://v7.cnzz.com/stat.php?id=155540&amp;web_id=155540" language="JavaScript" charset="gb2312"></script>--> 
  </div>   
 </body>
</html>
