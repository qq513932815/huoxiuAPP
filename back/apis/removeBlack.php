<?php

require $_SERVER["DOCUMENT_ROOT"].'/huoxiuapi/Relation.Service.php';

$userid = $_POST["userid"];
$whoid = $_POST["whoid"];

$r = new Relation();
echo $r->removeBlack($userid,$whoid);//成功返回1，失败返回0