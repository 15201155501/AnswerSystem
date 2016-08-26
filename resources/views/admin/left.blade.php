<div class="sidebar" id="sidebar">
					<script type="text/javascript">
						try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
					</script>

					<div class="sidebar-shortcuts" id="sidebar-shortcuts">
						<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
							<button class="btn btn-success">
								<i class="icon-signal"></i>
							</button>

							<button class="btn btn-info">
								<i class="icon-pencil"></i>
							</button>

							<button class="btn btn-warning">
								<i class="icon-group"></i>
							</button>

							<button class="btn btn-danger">
								<i class="icon-cogs"></i>
							</button>
						</div>

						<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
							<span class="btn btn-success"></span>

							<span class="btn btn-info"></span>

							<span class="btn btn-warning"></span>

							<span class="btn btn-danger"></span>
						</div>
					</div><!-- #sidebar-shortcuts -->

					<ul class="nav nav-list">
						<li>
							<a href="javascript:0;">
								<i class="icon-text-width"></i>
								<span class="menu-text"> 答题系统 </span>
							</a>
						</li> 

						@foreach($main as  $v)

						<li>
							<a href="#" class="dropdown-toggle">
								<i class="icon-desktop"></i>
								@if($v['pri_fid'] == 0 )
								<span class="menu-text"> {{ $v['pri_name'] }} </span>
								<b class="arrow icon-angle-down"></b>
								@endif

							</a>
							<ul class="submenu">
							@foreach($v['son'] as  $val)
								<li>
									<a href="{{ $val['pri_route'] }}">
										<i class="icon-double-angle-right"></i>
										{{ $val['pri_name'] }}
									</a>
								</li>
							@endforeach
							</ul>
						</li>
						@endforeach
					</ul>
						</li>

						
					</ul><!-- /.nav-list -->

					<div class="sidebar-collapse" id="sidebar-collapse">
						<i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
					</div>

					<script type="text/javascript">
						try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
					</script>
					<script>
					// alert(1);
					var pathname = window.location.pathname;
					// alert(pathname);
					pathname = pathname.substr(1);
					// alert(pathname);
					$("li a").each(function() {

					var href = $(this).attr("href");
					// alert(href);
					if(pathname == href){

					$(this).parent().parent().parent().addClass("active");

					$(this).parent().addClass("active");

					}
					});

					</script>

				</div>
