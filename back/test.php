<?php
    include 'ipConfig.php';
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    </head>
    <body>
        <h1>接口测试页面</h1>
        <a href="#" onclick="login()">登录</a>
        <a href="#" onclick="insertVideo()">添加视频</a>
        <a href="#" onclick="getVideo()">获取视频</a>
        <a href="#" onclick="getRelation()">获取关系</a>
        
        
        
        
        <script type="text/javascript">
                function login(){
                    $.post('http://<?php echo $ip; ?>/huoxiuapi/apis/login.php',{username:'admin',password:'admin'},function(data){
                        console.log(data);
                    });
                }
                
                function insertVideo(){
                    $.post('http://<?php echo $ip; ?>/huoxiuapi/apis/insertVideo.php',{},function(data){
                        console.log(data);
                    });
                }
                
                function getVideo(){
                    $.post('http://<?php echo $ip; ?>/huoxiuapi/apis/getVideos.php',{},function(data){
                        console.log(data);
                    });
                }
                
                function getRelation(){
                    $.post('http://<?php echo $ip; ?>/huoxiuapi/apis/getRelation.php?userid=21&state=1',{},function(data){
                        console.log(data);
                    });
                }
        </script>
    </body>
</html>
