<?php
require $_SERVER["DOCUMENT_ROOT"].'/huoxiuapi/Video.Service.php';

$videoid = $_POST["videoid"];
$state = "likes";

$a = new Video();
echo $a->add($videoid,$state);//成功返回1，失败返回0