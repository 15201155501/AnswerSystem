<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>��̨��ҳ</title>
    <meta name="keywords" content="Bootstrapģ��,Bootstrapģ������,Bootstrap�̳�,Bootstrap����" />
    <meta name="description" content="վ���ز��ṩBootstrapģ��,Bootstrap�̳�,Bootstrap���ķ�������Bootstrap�������" />
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
          <a href="#">��ҳ</a>
        </li>
        <li class="active">�ҵ���塷�޸�����</li>
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
       <h1> ��������<small> <i class="icon-double-angle-right"></i></small> </h1> 
      </div>

  <script src="../jedate/jedate.js"></script>
  <script src="../jedate/jedate.min.js"></script>
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
                            <th>��վ����</th>
                            <th>��վ����</th>
                            <th>ͼƬLOGO</th>
                            <th class="hidden-480">��������</th>

                            <th>
                              <i class="icon-time bigger-110 hidden-480"></i>
                              ����Ա����
                            </th>
                          </tr>
                        </thead>

                        <tbody>
                        @foreach($arr as $key => $v)
                          <tr id="tr_{{$v['linkid']}}">
                            <td class="center">
                              <label>
                                <input type="checkbox" class="ace" />
                                <span class="lbl"></span>
                              </label>
                            </td>
                            <td>
                              <a href="#">{{$v['name']}}</a>
                            </td>
                            <td>{{$v['url']}}</td>
                            <td class="hidden-480">
                              <img src="{{$v['logo']}}" alt="" width="50px">
                            </td>
                            <td>logo����</td>
                            <td>
                              <div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
                                <a href="{{url('admin/linkUpdate')}}?id={{$v['linkid']}}"><button class="btn btn-xs btn-info">
                                  <i class="icon-edit bigger-120"></i>
                                </button></a>

                                <a href="javascript:del({{$v['linkid']}})"><button class="btn btn-xs btn-danger">
                                  <i class="icon-trash bigger-120"></i>
                                </button></a>
                              </div>
                              <div class="visible-xs visible-sm hidden-md hidden-lg">
                                <div class="inline position-relative">
                                  <button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-cog icon-only bigger-110"></i>
                                  </button>

                                  <ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">
                                    <li>
                                      <a href="#" class="tooltip-info" data-rel="tooltip" title="View">
                                        <span class="blue">
                                          <i class="icon-zoom-in bigger-120"></i>
                                        </span>
                                      </a>
                                    </li>

                                    <li>
                                      <a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
                                        <span class="green">
                                          <i class="icon-edit bigger-120"></i>
                                        </span>
                                      </a>
                                    </li>

                                    <li>
                                      <a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
                                        <span class="red">
                                          <i class="icon-trash bigger-120"></i>
                                        </span>
                                      </a>
                                    </li>
                                  </ul>
                                </div>
                              </div>
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
      window.jQuery || document.write("<script src='../assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
    </script> 
  <!-- <![endif]--> 
  <!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='../assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]--> 
  <script type="text/javascript">
      if("ontouchend" in document) document.write("<script src='../assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
    </script> 
  <script src="../assets/js/bootstrap.min.js"></script> 
  <script src="../assets/js/typeahead-bs2.min.js"></script> 
  <!-- page specific plugin scripts --> 
  <script src="../assets/js/jquery.dataTables.min.js"></script> 
  <script src="../assets/js/jquery.dataTables.bootstrap.js"></script> 
  <!-- ace scripts --> 
  <script src="../assets/js/ace-elements.min.js"></script> 
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
                    document.getElementById('list').innerHTML='�û�����ȷ';
                    document.getElementById('list').style.color='green';
                    return true;
                }else{
                    document.getElementById('list').innerHTML='��ĸ�����֡��»�����ɣ���ĸ��ͷ��4-16λ';
                    document.getElementById('list').style.color='red';
                    return false;
                }
            }
            else{
                document.getElementById('list').innerHTML='�Ѵ��ڸ��û�������������';
                document.getElementById('list').style.color='red';
                return false;
            }
        })
        
    }
    function fun1(){
        var password = document.getElementById('password').value;
        var reg=/^[a-z | A-Z]\w{5,15}$/;
        if(reg.test(password)){
            document.getElementById('list1').innerHTML='������ȷ';
            document.getElementById('list1').style.color='green';

            return true;
        }else{
            document.getElementById('list1').innerHTML='6-16λ�ַ�����ĸ��ͷ';
            document.getElementById('list1').style.color='red';
            return false;
        }
    }
    function fun2(){
        var mobile_phone = document.getElementById('mobile_phone').value;
        $.get("{{url('register_shu')}}",{'email':mobile_phone},function(e){
            if(e==0){
                var reg=/^\d{11}$/;
                if(reg.test(mobile_phone)){
                    document.getElementById('list2').innerHTML='�ֻ�����ȷ';
                    document.getElementById('list2').style.color='green';
                    return true;
                }else{
                    document.getElementById('list2').innerHTML='������11λ����';
                    document.getElementById('list2').style.color='red';
                    return false;
                }
            }else{
                document.getElementById('list2').innerHTML='���ֻ��Ѿ�ע����˺�';
                document.getElementById('list2').style.color='red';
                return false;
            }
        })
    }
    function fun3(){
        var id_card = document.getElementById('id_card').value;
        $.get("{{url('register_shu')}}",{'id_card':id_card},function(e){
            if(e==0){
                var reg=/^[1-9]{1}[0-9]{14}$|^[1-9]{1}[0-9]{16}([0-9]|[xX])$/;
                if(reg.test(id_card)){
                    document.getElementById('list3').innerHTML='���֤����ȷ';
                    document.getElementById('list3').style.color='green';
                    return true;
                }else{
                    document.getElementById('list3').innerHTML='��������������֤��';
                    document.getElementById('list3').style.color='red';
                    return false;
                }
            }else{
                document.getElementById('list3').innerHTML='�����֤���Ѿ�ע����˺�';
                document.getElementById('list3').style.color='reds';
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
<script type="text/javascript">
      $('input[id=lefile]').change(function() {
      $('#photoCover').val($(this).val());
      });
</script>
  <div style="display:none">
  </div>   
 </body>
</html>