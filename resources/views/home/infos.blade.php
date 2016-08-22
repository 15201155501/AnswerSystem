<!doctype html>
<html lang="zh">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>个人信息</title>
	<link rel="stylesheet" type="text/css" href="Home/css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="Home/css/styles.css">
	<!--[if IE]>
		<script src="http://libs.useso.com/js/html5shiv/3.7/html5shiv.min.js"></script>
	<![endif]-->
</head>
<body>
	<aside class="profile-card">
	    <header>
	        <!-- here’s the avatar -->
	        <a href="#">
	            <img src="{{$info['stu_img']}}" width="100" height="100px" />
	        </a>
	        <!-- the username -->
	        <h1>{{$info['stu_name']}}</h1>
	        <h2>{{$info['lname']}}</h2>
	    </header>
	    <div class="profile-bio">
	        <p>Even when everything is perfect, you can always make it better. Break barriers in your head, create something crazy and don't forget Code is Poetry...</p>
	    </div>
	    <!-- some social links to show off -->
	    <ul class="profile-social-links">
	        <!-- <li>
	            <a href="#">
	                <svg viewBox="0 0 24 24">
	                    <path fill="#3b5998" d="M17,2V2H17V6H15C14.31,6 14,6.81 14,7.5V10H14L17,10V14H14V22H10V14H7V10H10V6A4,4 0 0,1 14,2H17Z" />
	                </svg>
	            </a>
	        </li> -->
	        
	    </ul>
	</aside>
</body>
</html>