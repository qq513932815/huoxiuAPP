<?php

//require $_SERVER["DOCUMENT_ROOT"].'/huoxiuapi/Comment.Service.php';
$subtxt = $_POST["subtxt"];
$userid = $_POST["userid"];
$timestamp = $_POST["timestamp"];
$videoid = $_POST["videoid"];

//echo $subtxt.$userid.$timestamp.$videoid;

//$subtxt = "哈哈哈哈哈哈哈哈";
//$userid = 23;
//$timestamp = 1513196994;
//$videoid = 18;

//$r = new Comment();
$con = mysqli_connect('localhost', 'root', 'root');
    if (!$con) {
        echo 10041;//数据库连接失败
        echo mysqli_errno($con);
    }

    mysqli_set_charset($con, 'utf8');
    mysqli_select_db($con, 'huoxiuapp');
$sql = "INSERT INTO comments (content,publictime,userid,videoid) VALUES ('$subtxt',$timestamp,$userid,$videoid)";
//$data = ["content"=>$subtxt,"publictime"=>$timestamp,"userid"=>$userid,"videoid"=>$videoid];
$query = mysqli_query($con, $sql);
//$result = mysqli_fetch_row($query);
//print_r($r->Insert($data));
echo $query;

