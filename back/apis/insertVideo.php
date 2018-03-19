<?php

require $_SERVER["DOCUMENT_ROOT"].'/huoxiuapi/Video.Service.php';
$content = $_POST["content"];
$headphoto = $_POST["headphoto"];
$videourl = $_POST["videourl"];
$userid = $_POST["userid"];
$publictime = $_POST["publictime"];

$v = new Video();
$data = ["content"=>$content,"headphoto"=>$headphoto,"videourl"=>$videourl,"userid"=>$userid,"publictime"=> $publictime];
//$data = ["content"=>"测试测试","headphoto"=>"dota-1.jpg","videourl"=>"1509974363680.mp4","userid"=>21,"publictime"=> time()];
print_r($v->Insert($data));