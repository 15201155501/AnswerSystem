<!DOCTYPE html>
<html>
<head>
	<title>考试系统</title>
	<meta charset=utf-8>
</head>
<body>
<center><h1>历史试卷</h1></center>
<p>一、单选题</p>
<ol style="list-style:none;">
@foreach($arr as $key => $val)
	@if($val['tid'] == 0)
		<font><b>{{$key+1}}.&nbsp;&nbsp;&nbsp;</b></font>{{$val['question']}}（）
		@if(isset($val['is']))
			<li><span color='red'>√</span></br>&nbsp;&nbsp; <font color="red">正确答案:{{$val['answer']}}</font>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<!-- <input type="radio" name="error_{{$val['qid']}}" value="{{$val['qid']}}">我要报错 --></li>
		@else
			<li><span color='red'>×</span></br>&nbsp;&nbsp; <font color="red">正确答案:{{$val['answer']}}</font>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<!-- <input type="radio" name="error_{{$val['qid']}}" value="{{$val['qid']}}">我要报错 --></li>
		@endif
	</ol>
		<ol style="list-style:none;">
		@foreach($val['options'] as $k => $v)
			<li><input type="radio" name="{{$val['qid']}}" disabled
				<?php if(isset($val['commit']) && $val['commit'] == $k) echo 'checked';?>>
			 &nbsp;&nbsp;{{$v}}</li>
		@endforeach
		
	@endif
@endforeach
<p>二、多选题</p>
@foreach($arr as $key => $val)
	@if($val['tid'] == 1)
		<font><b>{{$key+1}}.&nbsp;&nbsp;&nbsp;</b></font>{{$val['question']}}（）
		@if(isset($val['is']))
			<li><span color='red'>√</span></br>&nbsp;&nbsp; <font color="red">正确答案:{{$val['answer']}}</font>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<!-- <input type="radio" name="error_{{$val['qid']}}" value="{{$val['qid']}}">我要报错 --></li>
		@else
			<li><span color='red'>×</span></br>&nbsp;&nbsp; <font color="red">正确答案:{{$val['answer']}}</font>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<!-- <input type="radio" name="error_{{$val['qid']}}" value="{{$val['qid']}}">我要报错 --></li>
		@endif
	</ol>
		<ol style="list-style:none;">
		@foreach($val['options'] as $k => $v)
			<li><input type="checkbox" name="{{$val['qid']}}" disabled
				<?php 
					if (isset($val['commit'])){
						foreach ($val['commit'] as $kCom => $vCom) {
							if ($vCom == $k) {
								echo 'checked';
							}
						}
					}
				?>>
			 &nbsp;&nbsp;{{$v}}</li>
		@endforeach
		
	@endif
@endforeach

<p>三、判断题</p>
@foreach($arr as $key => $val)
	@if($val['tid'] == 2)
		<font><b>{{$key+1}}.&nbsp;&nbsp;&nbsp;</b></font>{{$val['question']}}（）
		@if(isset($val['is']))
			<li><span color='red'>√</span></br>&nbsp;&nbsp; <font color="red">正确答案:{{$val['answer']}}</font>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<!-- <input type="radio" name="error_{{$val['qid']}}" value="{{$val['qid']}}">我要报错 --></li>
		@else
			<li><span color='red'>×</span></br>&nbsp;&nbsp; <font color="red">正确答案:{{$val['answer']}}</font>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<!-- <input type="radio" name="error_{{$val['qid']}}" value="{{$val['qid']}}">我要报错 --></li>
		@endif
	</ol>
		<ol style="list-style:none;">
			<input type="radio" disabled
				<?php 
					if(isset($val['commit'])){
						if ($val['commit'] == 'a') {
							echo 'checked';
						}
					}
				?>
			>对
			<input type="radio" disabled
				<?php 
					if(isset($val['commit'])){
						if ($val['commit'] == 'b') {
							echo 'checked';
						}
					}
				?>
			>错 <br/>
	@endif
@endforeach
</ol>
</body>
<script src="Home/js/jquery.js"></script>
<script>
	$('#dosubmit').click(function(){
		//接值
		data = $('#myForm').serialize();
		$.get('checkExam',data,function(msg){
			console.log(msg);
		});
	});
	
</script>
</html>