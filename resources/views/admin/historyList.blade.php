<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>管理员列表</title>
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
        <li class="active">我的面板》成绩查看</li>
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
       <h1> 成绩查看<small> <i class="icon-double-angle-right"></i></small> </h1> 
      </div>


      <!-- /.page-header --> 
      <div class="row"> 
       <div class="col-xs-12"> 
        <!-- PAGE CONTENT BEGINS --> 
        <div class="row"> 
         <div class="col-xs-12"> 
          <div class="table-responsive"> 
          <center><table width="100%" height="100px">
            <tr>
              <td>
                {{-- */$i=0;/* --}}
                @foreach($data as $key => $v)
                  @if($v['level'] == '0')
                  {{-- */$i++;/* --}}
                  <input type="radio" name="lock" onclick="unlockSelect({{$v['c_id']}})">
                  <select name="c_id" id="select_{{$v['c_id']}}" onchange="funPage(1)">
                  <option value="{{$v['c_id']}}">{{str_repeat('__', $v['level'])}}{{$v['c_name']}}</option>
                  @else
                  <option value="{{$v['c_id']}}">{{str_repeat('__', $v['level'])}}{{$v['c_name']}}</option>
                  @endif
                  @if($key+1 < count($data))
                    @if($data[$key+1]['level'] == '0')
                      </select>
                    @endif
                  @endif
                  @if($i%8 == 0)
                    </td></tr><tr><td>
                  @endif
                 @endforeach
                 <!-- <input type="radio" name="lock" id="radioInp" onclick="unlockSelect('input')">
                 <input type="text" name="c_name" id="input" disabled onblur="c_nameSearch()"> -->
               </td>
            </tr>
          </table>
          <div id="div1">
           <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                        <thead>
                        
                          <tr>
                            <th class="center">
                              <label>
                                <input type="checkbox" class="ace" />
                                <span class="lbl"></span>
                              </label>
                            </th>
                            <th>学生姓名</th>
                            <th>试卷名称</th>
                            <th>考试成绩</th>
                            <th>试卷提交时间</th>

                            <th>
                              <i class="icon-time bigger-110 hidden-480"></i>
                              
                            </th>
                          </tr>
                        </thead>

                        <tbody>
                        @foreach($arr['data'] as $v)
                          <tr>
                            <td class="center">
                              <label>
                                <input type="checkbox" class="ace" />
                                <span class="lbl"></span>
                              </label>
                            </td>
                            <td>
                              <a href="#">{{$v['stu_name']}}</a>
                            </td>
                            <td>{{$v['his_name']}}</td>
                            <td>{{$v['point']}}</td>
                            <td>{{$v['addtime']}}</td>
                            <td>
                                <button class="btn disabled">考试详细信息</button>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                      <table>
                        <tr>
                          <button class="btn btn-primary" onclick="funPage(1)">首页</button>&nbsp;
                          <button class="btn btn-primary" onclick="funPage({{$arr['prev']}})">上一页</button>&nbsp;
                          <button class="btn btn-primary" onclick="funPage({{$arr['next']}})">下一页</button>&nbsp;
                          <button class="btn btn-primary" onclick="funPage({{$arr['last']}})">尾页</button>&nbsp;
                          <!-- <td><a href="{{url('historyList')}}?page=1">首页</a>
                          <a href="{{url('historyList')}}?page={{$arr['prev']}}">上一页</a>
                          <a href="{{url('historyList')}}?page={{$arr['next']}}">下一页</a>
                          <a href="{{url('historyList')}}?page={{$arr['last']}}">尾页</a></td> -->
                        </tr>
                      </table>
                      </div>
           </center>           
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
    function fun(){
        var username = document.getElementById('username').value;
        $.get("{{url('register_shu')}}",{'username':username},function(e){
            if(e==0){
                var reg =/^[a-zA-z]\w{3,15}$/;
                if (reg.test(username)) {
                    document.getElementById('list').innerHTML='用户名正确';
                    document.getElementById('list').style.color='green';
                    return true;
                }else{
                    document.getElementById('list').innerHTML='字母、数字、下划线组成，字母开头，4-16位';
                    document.getElementById('list').style.color='red';
                    return false;
                }
            }
            else{
                document.getElementById('list').innerHTML='已存在该用户，请重新输入';
                document.getElementById('list').style.color='red';
                return false;
            }
        })
        
    }
    
   
</script>
<script>
   function del(id){
        var url = "{{url('admin/linkShow')}}";
        var data = {id:id, act:'del'};
        var id = '#tr_'+id;
        $.get(url, data, function(e){
          if (e == '1') {
            $(id).remove();
          }
        });
      }
</script>
<script>
  $(function($) {
    $('select').attr('disabled',true);
    $('select').attr('name','');
    $("input[type=radio]:checked").attr('checked',false);
    // $('#select_'+id).attr("disabled",false);
    // $('#select_'+id).attr('name','c_id');
  });
  function unlockSelect(id)
  {
    if (id == 'input') {
      $('#input').attr("disabled",false);
    } else {
      $('#input').attr("disabled",true);
      $('select').attr('disabled',true);
      $('select').attr('name','');
      $('#select_'+id).attr("disabled",false);
      $('#select_'+id).attr('name','c_id');
    }
  }
  function c_nameSearch()
  {
      var search = $("#input").val();
      var url = "{{url('historyList')}}";
      var data = {page:1, c_name:search};
      alert(search)
      $.get(url, data, function(e){
        console.log(e)
        $('#div1').html(e)
      });
  }
  function funPage(page)
  {
    var url = "{{url('historyList')}}";
    if ($('#radioInp').attr('checked') == 'checked') {
      var input = $('#input').val(); 
      var data = {page:page, c_name:input};
      $.get(url, data, function(e){
        console.log(e)
        $('#div1').html(e)
      });
    } else if ($("input[type=radio]").attr('checked') == 'checked') {
      var search = $("select").val();
      var data = {page:page, search:search};
      $.get(url, data, function(e){
        console.log(e)
        $('#div1').html(e)
      });
    } else {
      var data = {page:page};
      $.get(url, data, function(e){
        console.log(e)
      });
    }
    
    
  }
  function funSearch(id)
  {
    var c_id = $('#select_'+id).val();
    var url = "{{url('historyList')}}";
    var data = {act:'search', c_id:id};
    $.get(url, data, function(e) {
      console.log(e)
    })
  }
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