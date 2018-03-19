<?php

require $_SERVER["DOCUMENT_ROOT"].'/huoxiuapi/Relation.Service.php';
$r = new Relation();
$userid = $_POST["userid"];
$state = $_POST["state"];

$sql = "SELECT r.id,r.userid zhu,r.whoid,r.state,u.username,u.nickname,u.mark,u.thumbnail FROM `relation` r
LEFT JOIN users u ON u.userid = r.whoid 
WHERE r.userid = {$userid} AND r.state = {$state}";
$arr = $r->getQuery($sql);
//$data = ["userid"=>21,"whoid"=>22,"state"=>1];
echo json_encode($arr,JSON_UNESCAPED_UNICODE);