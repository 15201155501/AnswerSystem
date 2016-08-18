
<div class="navbar-header pull-left">
					<a href="#" class="navbar-brand">
						<small>
							<i class="icon-leaf"></i>
							答题系统
						</small>
					</a><!-- /.brand -->
				</div><!-- /.navbar-header -->
<div class="navbar-header pull-right" role="navigation">
					
					<ul class="nav ace-nav">
						<li class="grey">
							
							
						</li>

						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="Admin/assets/avatars/user.jpg" alt="Jason's Photo" />
								<span class="user-info">
									<small>欢迎光临,</small>
									<font color="red">{{$header}}</font>
								</span>

								<i class="icon-caret-down"></i>
							</a>

							<ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="#">
										<i class="icon-cog"></i>
										设置
									</a>
								</li>

								<li>
									<a href="#">
										<i class="icon-user"></i>
										个人资料
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="loginout">
										<i class="icon-off"></i>
										退出
									</a>
								</li>
							</ul>
						</li>
					</ul><!-- /.ace-nav -->

				</div>
				<script src='jquery.js'></script>
				<script>
				     function luck(){
				     	$.get('luckto',{"luck":1},function(){
				     		window.location.href="luck";
				     	});
				     }
				</script>