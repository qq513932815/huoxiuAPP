<?php

require $_SERVER["DOCUMENT_ROOT"].'/huoxiuapi/Video.Service.php';

$userid = $_POST["userid"];
//$userid =22;

$u = new Video();
$arr = $u->getUserVideos($userid);
echo json_encode($arr);