<!-- begin #header -->
<div id="header" class="header navbar-default">
    <!-- begin navbar-header -->
    <div class="navbar-header p-l-10">
        <img src="..\..\assets/img/LOGO ORION.png" alt="" width="125" >
    </div>


    
    <!-- end navbar-header -->
    <!-- begin header-nav -->
    <ul class="navbar-nav navbar-right">
        <li class="navbar-form">
            <form action="" method="POST" name="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Enter keyword">
                    <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                </div>
            </form>
        </li>
        <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="dropdown-toggle f-s-14">
                <i class="fa fa-bell"></i>
                <span class="label">5</span>
            </a>
            <div class="dropdown-menu media-list dropdown-menu-right">
                <div class="dropdown-header">NOTIFICATIONS (5)</div>
                <a href="javascript:;" class="dropdown-item media">
                    <div class="media-left">
                        <i class="fa fa-bug media-object bg-silver-darker"></i>
                    </div>
                    <div class="media-body">
                        <h6 class="media-heading">Server Error Reports <i class="fa fa-exclamation-circle text-danger"></i></h6>
                        <div class="text-muted f-s-10">3 minutes ago</div>
                    </div>
                </a>
                <a href="javascript:;" class="dropdown-item media">
                    <div class="media-left">
                        <img src="..\..\assets\img\user\user-1.jpeg" class="media-object" alt="">
                        <i class="fab fa-facebook-messenger text-blue media-object-icon"></i>
                    </div>
                    <div class="media-body">
                        <h6 class="media-heading">John Smith</h6>
                        <p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
                        <div class="text-muted f-s-10">25 minutes ago</div>
                    </div>
                </a>
                <a href="javascript:;" class="dropdown-item media">
                    <div class="media-left">
                        <img src="..\..\assets\img\user\user-2.jpeg" class="media-object" alt="">
                        <i class="fab fa-facebook-messenger text-blue media-object-icon"></i>
                    </div>
                    <div class="media-body">
                        <h6 class="media-heading">Olivia</h6>
                        <p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
                        <div class="text-muted f-s-10">35 minutes ago</div>
                    </div>
                </a>
                <a href="javascript:;" class="dropdown-item media">
                    <div class="media-left">
                        <i class="fa fa-plus media-object bg-silver-darker"></i>
                    </div>
                    <div class="media-body">
                        <h6 class="media-heading"> New User Registered</h6>
                        <div class="text-muted f-s-10">1 hour ago</div>
                    </div>
                </a>
                <a href="javascript:;" class="dropdown-item media">
                    <div class="media-left">
                        <i class="fa fa-envelope media-object bg-silver-darker"></i>
                        <i class="fab fa-google text-warning media-object-icon f-s-14"></i>
                    </div>
                    <div class="media-body">
                        <h6 class="media-heading"> New Email From John</h6>
                        <div class="text-muted f-s-10">2 hour ago</div>
                    </div>
                </a>
                <div class="dropdown-footer text-center">
                    <a href="javascript:;">View more</a>
                </div>
            </div>
        </li>
        <li class="dropdown navbar-user">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="..\..\assets\img\user\user-13.jpeg" alt=""> 
                <span class="d-none d-md-inline"><?php echo $_SESSION["use_nombre"]; ?></span> <b class="caret"></b>
            </a>
            <div class="dropdown-menu dropdown-menu-right">

                <a href="javascript:;" class="dropdown-item">Editar Perfil</a>
                <a href="javascript:;" class="dropdown-item">Calendar</a>                
                <div class="dropdown-divider"></div>
                <a href="../Logout/logout.php" class="dropdown-item">Cerrar Sesión</a>

            </div>
        </li>
    </ul>
    <!-- end header-nav -->


</div>
<!-- end #header -->