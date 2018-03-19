<?php

require $_SERVER["DOCUMENT_ROOT"].'/huoxiuapi/User.Service.php';

$userid = $_POST["userid"];

$r = new User();
echo $r->removeBan($userid);//成功返回1，失败返回0