<div class="navbar">
        <div class="navbar-inner">
                <ul class="nav pull-right">
                    <li id="fat-menu" class="dropdown">
                        <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-user"></i> <?php echo Session::get('username'); ?>
                            <i class="icon-caret-down"></i>
                        </a>

                        <ul class="dropdown-menu">
                            <li><a tabindex="-1" href="myself">个人信息</a></li>
                            <li class="divider"></li>
                            <li class="divider visible-phone"></li>
                            <li><a tabindex="-1" href="logout">退出登陆</a></li>
                        </ul>
                    </li>
                    
                </ul>
                <a class="brand" href="index"><span class="first">Jiang</span> <span class="second">答题系统</span></a>
        </div>
    </div>