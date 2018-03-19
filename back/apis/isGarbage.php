<?php

require $_SERVER["DOCUMENT_ROOT"].'/huoxiuapi/Video.Service.php';

$u = new Video();
$num = 0;

$arr = $u->Garbage($num);
echo json_encode($arr);