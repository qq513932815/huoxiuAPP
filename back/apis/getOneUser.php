<?php

require $_SERVER["DOCUMENT_ROOT"].'/huoxiuapi/User.Service.php';

$userid = $_POST["userid"];

$u = new User();
$arr = $u->getOneUser($userid);
echo json_encode($arr);