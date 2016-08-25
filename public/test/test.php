<!DOCTYPE html>
<html>
<head>
	<title>考试系统</title>
	<meta charset=utf-8>
	<style>
		body{background:url(Home/images/extra_clean_paper.png);}
		.actGotop{position:fixed; _position:absolute; bottom:100px; right:50px; width:150px; height:195px; display:none;}
		.actGotop a,.actGotop a:link{width:150px; height:195px; display:inline-block; background:url(Home/images/blog7year_gotop.png) no-repeat; _background:url(images/blog7year_gotop.gif) no-repeat; outline:none;}
		.actGotop a:hover{width:150px; height:195px; background:url(Home/images/blog7year_gotopd.gif) no-repeat; outline:none;}
	</style>
</head>
<body onload="RunOnBeforeUnload()">
<center><h1>开始考试</h1></center>
<form id="myForm">
<ol>
<h4>一、单元题</h4>
	<?php foreach($arr as $k => $v){
		if($v['tid'] == 0){ ?>

	 <li><?php echo $v['question']?>（）</br>
	<ol style="list-style:none;">
		<?php foreach($v['options'] as $kk =>$vv){ ?>
			<li>
				<input type="radio" name="dan<?php echo $v['qid'] ?>" value="<?php echo $kk ?>"><?php echo $vv ?>
			</li>
		<?php }?>
	</ol>
	</li>
	<?php } }?>
<h4>二、多选题</h4>
	<?php foreach($arr as $k =>$v){
		if($v['tid'] == 1){ ?>

	 <li><?php echo $v['question']?>（）</br>
	<ol style="list-style:none;">
		<?php foreach($v['options'] as $kk =>$vv){ ?>
			<li><input type="checkbox" name="duo<?php echo $v['qid']?>[]" value="<?php echo $kk ?>"><?php echo $vv ?></li>
		<?php }?>
	</ol>
	</li>
	<?php } }?>
<h4>三、判断题</h4>
	<?php foreach($arr as $k =>$v){
		if($v['tid'] == 2){ ?>

	 <li><?php echo $v['question']?>（）</br>
	<ol style="list-style:none;">
		<?php foreach($v['options'] as $kk =>$vv){ ?>
			<li><input type="radio" name="pan<?php echo $v['qid'] ?>" value="1">&nbsp;&nbsp;对<br><input type="radio" name="pan<?php echo $v['qid'] ?>" value="0">&nbsp;&nbsp;错</li>
		<?php }?>
	</ol>
	</li>
	<?php } }?>
</ol>
</form>
<div class="actGotop"><a href="javascript:;" title="Top"></a></div>
<center><button id="dosubmit"><font  style="font-size:30px;">提交试卷</font></button>&nbsp;<button id="checkcookie"><font  style="font-size:30px;">检测登陆</font></button></center>
</body>
<script src="Home/lib/jquery.js"></script>
<script type="text/javascript">
	$(function(){
		$(window).scroll(function() {
			if($(window).scrollTop() >= 100){
				$('.actGotop').fadeIn(300);
			}else{
				$('.actGotop').fadeOut(300);
			}
		});
		$('.actGotop').click(function(){$('html,body').animate({scrollTop: '0px'}, 800);});
	});
</script>
<script>
	$("#checkcookie").click(function () {
		var cookie = <?php echo Session::get('u_id') ?>;
		if (cookie){
			alert('已经登录');
		}else{
			alert('会话失效了，请重新登录');
			location.href="{{url('/')}}";
		}
	});

    //获取考试结束时间
	var endtime = <?php echo $end_time ?>;
	//console.log(endtime);

	//获取当前时间戳
	var timestamp = String(Date.parse(new Date()));
	var nowtime = timestamp.substring(0,10);
	//console.log(nowtime);

	//算是提交时间
    var examtime = endtime-nowtime;

	//禁止右键菜单查看源码
	$(document).bind("contextmenu",function(e){   
		return false;
	});

	//点击提交按钮，正常提交
	$('#dosubmit').click(function(){
		dosubmit();
	});

	//获取当前时间
	var timestamp=new Date().getTime();
	// alert(timestamp);


	//考试时间到了，自动提交
	function jump(count) {   
        window.setTimeout(function(){   
            count--;   
            if(count > 0) {
                jump(count);   
            } else {   
                dosubmit();
            }   
        }, 1000);   
    }
	jump(examtime);

	function dosubmit() {
		//接值
		data = $('#myForm').serialize();
		//alert(data);
		$.get('checkExam',data,function(msg){
			// console.log(msg)
			if (msg>=60){
				alert('嗯。。。'+msg+'一般般');
			}else if(msg<60){
				alert('渣渣，你的考试成绩为：'+msg);
			}else{
				alert('卧槽。。卧槽。。卧槽：'+msg);
			}
			location.href='examList';
		});
	}
	document.onkeydown = function(event){
		if(event.keyCode == '116'){
			event.keyCode = 0;
		    event.cancelBubble = true;
		    return false;
		}
		if   (event.keyCode==13)   
		{   
			event.keyCode=0;
			event.returnValue = false;
			alert("hhaha");
			window.onbeforeunload = function(){ 
			return '将丢失未保存的数据!'; 
			}
		} 
	}
</script>

</html>
