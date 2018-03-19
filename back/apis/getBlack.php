<?php

require $_SERVER["DOCUMENT_ROOT"].'/huoxiuapi/User.Service.php';

$u = new User();
$arr = $u->getBlack();
echo json_encode($arr);