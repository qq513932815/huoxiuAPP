<?php

require $_SERVER["DOCUMENT_ROOT"].'/huoxiuapi/Video.Service.php';

$videoid = $_POST["videoid"];
$num = $_POST["num"];

$b = new Video();
echo $b->garbageTorF($videoid,$num);//成功返回1，失败返回0