<?php
require $_SERVER["DOCUMENT_ROOT"].'/huoxiuapi/Video.Service.php';
require $_SERVER["DOCUMENT_ROOT"].'/huoxiuapi/ipConfig.php';

$videoid = $_POST["videoid"];
$state = "shares";

$a = new Video();
echo $a->add($videoid,$state);//成功返回1，失败返回0