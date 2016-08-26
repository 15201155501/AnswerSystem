<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>答题系统</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="stylesheet" type="text/css" href="Home/lib/bootstrap/css/bootstrap.css">
    
    <link rel="stylesheet" type="text/css" href="Home/stylesheets/theme.css">
    <link rel="stylesheet" href="Home/lib/font-awesome/css/font-awesome.css">

    <script src="Home/lib/jquery-1.7.2.min.js" type="text/javascript"></script>

    <!-- Demo page code -->

    <style type="text/css">
        body{
            background-color: #000;
        }
        #line-chart {
            height:300px;
            width:800px;
            margin: 0px auto;
            margin-top: 1em;
        }
        .brand { font-family: georgia, serif; }
        .brand .first {
            color: #ccc;
            font-style: italic;
        }
        .brand .second {
            color: #fff;
            font-weight: bold;
        }
    </style>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="../assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
  </head>

  <!--[if lt IE 7 ]> <body class="ie ie6"> <![endif]-->
  <!--[if IE 7 ]> <body class="ie ie7 "> <![endif]-->
  <!--[if IE 8 ]> <body class="ie ie8 "> <![endif]-->
  <!--[if IE 9 ]> <body class="ie ie9 "> <![endif]-->
  <!--[if (gt IE 9)|!(IE)]><!--> 
  <body class=""> 
  <!--<![endif]-->

    <div class="navbar">
        <div class="navbar-inner">
                <ul class="nav pull-right">
                    
                </ul>
                <a class="brand" href="index.html"><span class="first">Jiang</span> <span class="second">答题系统</span></a>
        </div>
    </div>

        <div class="row-fluid">
            <div class="container">
                <div id="particles-js">

                </div>
                <div class="dialog" style="margin-top: -400px;margin-left:400px;position: absolute;">
                    <div>
                        <p><font color="white" size="+2">答题系统</font></p>
                        <div>
                            <label></label>
                            <input type="text" class="span12" required="" id="username">
                            <label><font color="white">密码</font></label>
                            <input type="password" class="span12" required="" id="password">
                            <button class="btn btn-primary pull-right" id="submit">Sign In</button>
                            <label class="remember-me"> <font color="white">使用其他方式登陆</font> <a href="QQlogin"><img src="Home/images/bt_white_24X24.png" alt=""></a></label>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>


    <script>
        $("#submit").click(function(){
            var username=$('#username').val();
            var password=$('#password').val();
            //alert(password);
            $.get('login_pro',{'username':username,'password':password},function(msg){
                // alert(msg);
                if(msg==1){
                    location.href='index';
                }else{
                    alert('用户名或密码错误');
                    location.href='{{url('/')}}';
                }
            })

        });
    </script>


    <script src="Home/lib/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript">
        $("[rel=tooltip]").tooltip();
        $(function() {
            $('.demo-cancel-click').click(function(){return false;});
        });
    </script>
    
  </body>

</html>
<script src="Home/lib/bootstrap/js/particles.js"></script>
<script src="Home/lib/bootstrap/js/app.js"></script>


