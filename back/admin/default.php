
<!doctype html>
<html lang="en">
    <head>
        <title>启嘉小视频后台管理系统</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <!-- VENDOR CSS -->
        <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/vendor/linearicons/style.css">
        <link rel="stylesheet" href="assets/vendor/chartist/css/chartist-custom.css">
        <!-- MAIN CSS -->
        <link rel="stylesheet" href="assets/css/main.css">
        <!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
        <link rel="stylesheet" href="assets/css/demo.css">
        <!-- ICONS -->
        <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
        <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
    </head>
    <body>

        <div id="wrapper">
            <nav class="navbar navbar-default navbar-fixed-top">
                <div class="brand">
                    <a href="#"><img src="assets/img/logo-dark.png" alt="Klorofil Logo" class="img-responsive logo"></a>
                </div>
                <div class="container-fluid">
                    <div class="navbar-btn">
                        <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
                    </div>			
                    <div id="navbar-menu">
                        <ul class="nav navbar-nav navbar-right">						
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="assets/img/user.png" class="img-circle" alt="Avatar"> <span>admin</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
                                <ul class="dropdown-menu">				
                                    <li><a id="logout" href="index.php"><i class="lnr lnr-exit"></i> <span >Logout</span></a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div id="sidebar-nav" class="sidebar">
                <div class="sidebar-scroll">
                    <nav>
                        <ul class="nav">
                            <li><a href="count.php"  target="con"><i class="lnr  lnr-cog"></i> <span>账号管理</span></a></li>
                            <li><a href="user.php"  target="con"><i class="lnr  lnr-user"></i> <span>用户管理</span></a></li>						
                            <li>
                                <a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr  lnr-dice"></i> <span>视频管理</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                                <div id="subPages" class="collapse ">
                                    <ul class="nav">
                                        <li><a href="videoInfo.php"  target="con">视频信息</a></li>
                                        <li><a href="videoGarbage.php"  target="con">视频回收站</a></li>								
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- END LEFT SIDEBAR -->
            <!-- MAIN -->
            <div class="main" style="height: 100%;">
                <!-- MAIN CONTENT -->
                <div class="main-content">
                    <div class="container-fluid" style="height: 500px;">					
                        <!-- OVERVIEW -->
                        <iframe src="count.php" frameborder="0" style="width:100%; height:100%" name="con"></iframe>
                    </div>
                </div>
                <!-- END MAIN -->
                <div class="clearfix"></div>
                <footer>
                    <div class="container-fluid">

                    </div>
                </footer>
            </div>
            <!-- END WRAPPER -->
            <!-- Javascript -->
            <script src="assets/vendor/jquery/jquery.min.js"></script>
            <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
            <script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
            <script src="assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
            <script src="assets/vendor/chartist/js/chartist.min.js"></script>
            <script src="assets/scripts/klorofil-common.js"></script>
            <script>
                $("#logout").click(function() {
                    $.post("logout.php", {},
                            function(data) {
                                window.location.reload();
                            },
                            "text");
                })
            </script>
        </div>
    </body>

</html>
