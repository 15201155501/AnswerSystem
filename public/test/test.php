<!DOCTYPE html>
<html>
<head>
	<title>考试系统</title>
	<meta charset=utf-8>
</head>
<body>
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
<?php echo date('Y-m-d H:i:s');?>
<center><button id="dosubmit"><font  style="font-size:30px;">提交试卷</font></button>&nbsp;<button><font  style="font-size:30px;">检测登陆</font></button></center>
</body>
<script src="Home/lib/jquery.js"></script>
<script>	
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
    // jump(10);

	function dosubmit() {
		//接值
		data = $('#myForm').serialize();
		//alert(data);
		$.get('checkExam',data,function(msg){
			// console.log(msg)
			alert('你的考试成绩为：'+msg);
		});
	}
	//禁止用F5键
	
</script>

</html>
