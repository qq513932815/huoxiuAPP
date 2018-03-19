<?php
require $_SERVER["DOCUMENT_ROOT"].'/huoxiuapi/Video.Service.php';
require $_SERVER["DOCUMENT_ROOT"].'/huoxiuapi/ipConfig.php';

$pagesize = 7;
$v = new Video();
//$page = $_POST["page"];
$page = 1;
$start = ($page-1)*$pagesize;

$sql = "SELECT COUNT(videoid) num FROM videos";
$allvideo_num = $v->getRow($sql)["num"];

$sql = "SELECT v.*,u.username,u.thumbnail FROM `videos` v 
        LEFT JOIN users u ON u.userid = v.userid 
        WHERE garbage = 0
        ORDER BY publictime DESC
        LIMIT $start,$pagesize";
$arr = $v->getQuery($sql);

if($arr){
    $new = [];
foreach ($arr as $key=>$value){
    $value["picUrl"] = 'http://'.$ip.'/huoxiuapi/_doc/upload/index/'.$value["headphoto"];
    $value["width"] = getimagesize($value["picUrl"])[0];
    $value["height"] = getimagesize($value["picUrl"])[1];
    $value["thumbnail"] = 'http://'.$ip.'/huoxiuapi/_doc/upload/face/'.$value["thumbnail"];
    $value["videoid"] = $value["videoid"];
    $value["videourl"] = 'http://'.$ip.'/huoxiuapi/_doc/upload/video/'.$value["videourl"];
    $value["username"] = $value["username"];
    $value["headphoto"] = 'http://'.$ip.'/huoxiuapi/_doc/upload/index/'.$value["headphoto"];
    $new_arr[] = $value;
}
echo json_encode($new_arr,JSON_UNESCAPED_UNICODE);
}else{
    echo '2';
}
