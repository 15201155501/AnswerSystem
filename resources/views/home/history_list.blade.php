<!DOCTYPE html>
<html>
<head>
    <title>考试系统</title>
    <base href="Home/lib"/>
    <link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
    <link href="css/style.css" type="text/css" rel="stylesheet" media="all">
    <link href="css/table.css" type="text/css" rel="stylesheet" media="all">
    <!--web-font-->
    <link href='http://fonts.useso.com/css?family=Marvel:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.useso.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <!--//web-font-->
    <!-- Custom Theme files -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Plot Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- //Custom Theme files -->
    <!-- js -->
    <script src="js/jquery-1.11.1.min.js"></script>
    <!-- //js -->
    <!-- start-smoth-scrolling-->
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event){
                event.preventDefault();
                $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
            });
        });
    </script>
    <!--//end-smoth-scrolling-->
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <!--side-bar-->
    @include('home.lefts')
    <!--//side-bar-->
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main about-main">
            <div class="contact">
                <h3>历史试卷</h3>
                <div class="map">
                    <table class="list_table" width="100%" border="2" cellspacing="0" cellpadding="0">
                        <tr>
                            <th>试卷名称</th>
                            <th>考试时间</th>
                            <th>考试成绩</th>
                            <th>操作</th>
                        </tr>
                        @foreach($arr as $v)
                            <tr>
                                <td>测试数据</td>

                                <td>{{date('Y-m-d H:i:s',$v['addtime'])}}</td>

                                <td>{{$v['point']}}</td>

                                <td>
                                    <a href="historyInfo?id={{$v['his_id']}}">查看试卷</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="footer">
                <p>Copyright &copy; 2016.Company name All rights reserved.More Templates <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a></p>
            </div>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/bootstrap.js"> </script>
</body>
</html>