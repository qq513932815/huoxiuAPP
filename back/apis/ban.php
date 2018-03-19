<?php

require $_SERVER["DOCUMENT_ROOT"].'/huoxiuapi/User.Service.php';

$userid = $_POST["userid"];

$b = new User();
echo $b->Ban($userid);//成功返回1，失败返回0