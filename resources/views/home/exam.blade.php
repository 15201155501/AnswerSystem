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
  <body class="body"> 
  <!--<![endif]-->
  

    @include('home.header')
    @include('home.lefts')
    
    <div class="content">

                    
<div class="header">
  <h1 class="page-title">每日必考</h1>
  <div class="btn-group">
  </div>
</div>
<div class="well">
    <table class="table">
      <thead>
        <tr>
          <th>试卷名称</th>
          <th>是否开放</th>
          <th>开始时间</th>
          <th>结束时间</th>
          <th>考试操作</th>
        </tr>
      </thead>
      <tbody>
        @foreach($examList as $v)
          <tr>
            <td>{{$v['em_name']}}</td>
            <td>
              @if($v['is_open'] == 1)
              开放
              @else
              不开放
              @endif
            </td>
            <td>{{$v['start_time']}}</td>
            <td>{{$v['end_time']}}</td>
            <td>
                <a href="startExam?id={{$v['em_id']}}"><i class="icon-pencil"></i>开始考试</a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
</div>
                    
            </div>
        </div>
    </div>
  </body>
    <script src="Home/lib/bootstrap/js/bootstrap.js"></script>
</html>


