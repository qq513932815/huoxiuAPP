<?php

require $_SERVER["DOCUMENT_ROOT"].'/huoxiuapi/User.Service.php';
$username = $_POST["username"];
$password = $_POST["password"];
$role = $_POST["role"];//管理员权限1

//$username = "root";
//$password = "root";
//$role = 0;


//判断用户是否按规矩输入

$u = new User();
$r = $u->login($username, $password, $role);

if(count($r)==0){
    echo "0";
}else{
    echo json_encode($r);
}
//session_start();