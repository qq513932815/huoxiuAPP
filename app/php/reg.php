<?php

header("Access-Control-Allow-Origin", "*");
require_once 'mysql.php';

$username = $_POST["username"];
$userpassword = $_POST["userpassword"];

$repeat_select = "SELECT * FROM users WHERE username='$username'";
$repeat_query = mysqli_query($con, $repeat_select);
$repeat_result = mysqli_fetch_assoc($repeat_query);

if (isset($repeat_result)) {
    echo '3'; //用户名重复
} else {
    $users_insert = "INSERT INTO users (username,password) VALUES ('$username','$userpassword')";
    $insert_query = mysqli_query($con, $users_insert);
    
    if (isset($insert_query)) {
        echo '1';
    } else {
        echo '2';
    }
}

