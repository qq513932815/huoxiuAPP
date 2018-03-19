<?php
    include '../ipConfig.php';
?>
<!doctype html>
<html lang="en" class="fullscreen-bg">

    <head>
        <title>火秀小视频后台管理系统-登录</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <!-- VENDOR CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/vendor/linearicons/style.css">
        <!-- MAIN CSS -->
        <link rel="stylesheet" href="assets/css/main.css">
        <!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
        <link rel="stylesheet" href="assets/css/demo.css">
        
        <!-- ICONS -->
        <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
        <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
        <script src="assets/vendor/jquery/jquery.min.js" type="text/javascript"></script>
        <script>
            $(function() {
                $("#login").click(function() {
                    //获取输入
                    var username = $("#signin-email").val();
                    var password = $("#signin-password").val();
                    var role = 1;
                    
                    //加验证
                    
                    $.post('http://<?php echo $ip; ?>/huoxiuapi/apis/login.php',{
                        username:username,
                        password:password,
                        role:role
                    },
                    function(data){
                        if(data==""){
                            alert("用户名或密码错误！");
                        }else{
                            location.href = "default.php";
                        }
                    },'jsonp');

                });
            })
        </script>
    </head>

    <body>
        <!-- WRAPPER -->
        <div id="wrapper">
            <div class="vertical-align-wrap">
                <div class="vertical-align-middle">
                    <div class="auth-box ">
                        <div class="left">
                            <div class="content" style="width: 98%;">
                                <div class="header">
                                    <div class="logo text-center"><img src="assets/img/logo-dark.png" alt="Klorofil Logo"></div>
                                    <p class="lead">登录你的帐号</p>
                                </div>
                                <form class="form-auth-small" action="index.php">
                                    <div class="form-group">
                                        <label for="signin-email" class="control-label sr-only">Email</label>
                                        <input type="text" class="form-control" id="signin-email" placeholder="用户名">
                                    </div>
                                    <div class="form-group">
                                        <label for="signin-password" class="control-label sr-only">Password</label>
                                        <input type="password" class="form-control" id="signin-password" placeholder="密码">
                                    </div>
                                    <div class="form-group clearfix">
                                        <label class="fancy-checkbox element-left">
                                            <input type="checkbox">
                                            <span>记住我</span>
                                        </label>
                                    </div>
                                    <button id="login" type="button" class="btn btn-primary btn-lg btn-block">登录</button>
                                    <div class="bottom">
                                        <span class="helper-text"><i class="fa fa-lock"></i> <a href="#">忘记密码?</a></span>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="right">
                            <div class="overlay"></div>
                            <div class="content text">
                                <h1 class="heading">Free Bootstrap dashboard template</h1>
                                <p>Power By LXT</p>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END WRAPPER -->
    </body>

</html>
