<?php

require $_SERVER["DOCUMENT_ROOT"].'/huoxiuapi/Video.Service.php';

$videoid = $_POST["videoid"];


$u = new Video();
$arr = $u->getComment($videoid);
echo json_encode($arr);