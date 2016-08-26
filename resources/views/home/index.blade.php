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
    *{padding:0;margin:0;list-style-type:none;}
    a,img{border:0;}
    body{font:12px/180% Arial, Helvetica, sans-serif, "新宋体";}
    /* demo */
    /*五张图片在缩略图时所显示的位置动*/
    #demo li:nth-of-type(1) img{ transform: translate(-210px);}
    #demo li:nth-of-type(2) img{ transform: translate(-180px);}
    #demo li:nth-of-type(3) img{ transform: translate(-380px);}
    #demo li:nth-of-type(4) img{ transform: translate(-450px);}
    #demo li:nth-of-type(5) img{ transform: translate(-320px);}
    #demo{width:1160px;height:512px;margin:60px auto 0 auto;}
    #demo img{width: 820px; height: 512px; max-width: 820px;}
    #demo li{float:left;position:relative;width:82px;height:100%;overflow:hidden;cursor:pointer; transition:0.5s; transform-origin:bottom;filter:alpha(opacity=50);opacity:0.5;}
    #demo li img{transition:1.2s;}
    #demo li a{display:block;}
    #demo li div{position:absolute;bottom:0;left:0;width:100%;background:#000;line-height:32px;filter:alpha(opacity=70);opacity:0.7;text-indent:2em;}
    #demo li div a{color:#FFF;text-decoration:none;}
    #demo li div a:hover{color:#F00;text-decoration:none;}
    #demo li.active{cursor:pointer; transform:scale(1.02,1.08); z-index:3;width:820px;filter:alpha(opacity=100);opacity:1;}
    #demo li.active img{transform:translate(0px);}
    #demo li:nth-of-type(1){transform-origin:bottom left;}
    #demo li:nth-of-type(5){transform-origin:bottom right;}
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
    
    @include('home/header')
    
    @include('home/lefts')
    <div class="snow-container"></div>

    <div class="content">
      <ul id="demo">
        <li class="active">
          <a href="examList"><img src="Home/images/1.jpg"  /></a>
          <div><a href="examList">你敢戳我吗</a></div>
        </li>
        <li>
          <a href="javascript:void(0);"><img src="Home/images/2.jpg"  /></a>
          <div><a href="javascript:void(0);">坟头倒比馒头大</a></div>
        </li>
        <li>
          <a href="javascript:void(0);"><img src="Home/images/3.jpg"  /></a>
          <div><a href="javascript:void(0);">宝塔镇河妖</a></div>
        </li>
        <li>
          <a href="javascript:void(0);"><img src="Home/images/4.jpg"  /></a>
          <div><a href="javascript:void(0);">静倚半山雪</a></div>
        </li>
        <li>
          <a href="javascript:void(0);"><img src="Home/images/5.jpg"  /></a>
          <div><a href="javascript:void(0);">独钓一江秋</a></div>
        </li>
      </ul>
</div>
            @include('home/buttom') 
                    
            </div>
        </div>
    </div>
    

    <script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="http://itbyc.com/templets/yang/js/snow.js"></script>
    <style type="text/css">.snow-container{position:fixed;top:0;left:0;width:100%;height:100%;pointer-events:none;z-index:100001;}</style>
    <script src="Home/lib/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" src="Home/lib/jquery.indexSlidePattern.js"></script>
    <script type="text/javascript">
        $("[rel=tooltip]").tooltip();
        $(function() {
            $('.demo-cancel-click').click(function(){return false;});
        });
    </script>
    <script language="javascript">
      $(document).ready(function(e){
          var opt = {
          "speed" : "fast"    , //变换速度,三速度可slow,normal,fast;
          "by"  : "mouseover"   , //触发事件,click或者mouseover;
          "auto"  : true    , //是否自动播放;
          "sec" : 3000      //自动播放间隔;
          };
            $("#demo").IMGDEMO(opt);    
      });
    </script>

  </body>
</html>


