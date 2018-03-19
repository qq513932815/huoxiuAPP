<?php
header("content-type:text/html;charset=utf-8");

require './Video.Service.php';
//require './User.Service.php';

//$u = new User("users");
//$user = ["username"=>"aaa","password"=>"bbb"];
//echo $u->Insert($user);

//$arr = $u->getAll();
//print_r($arr);

$v = new Video();
$video = ["title"=>"title","content"=>"content"];
echo $v->Insert($video);