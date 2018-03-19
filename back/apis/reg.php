<?php

require $_SERVER["DOCUMENT_ROOT"].'/huoxiuapi/User.Service.php';

$username = $_POST["username"];
$password = $_POST["password"];

$v = new User();
$data = ["username"=>"$username","nickname"=>"$username","password"=>"$password","thumbnail"=>"1.jpg","mark"=>"$username","regtime"=> time()];
echo $v->Insert($data);