<?php
/**
 * Created by PhpStorm.
 * User: Deep
 * Date: 16/3/8
 * Time: 下午8:00
 */

include 'conn.php';
include 'My.php';

$default_header = "http://182.92.158.167/Sunshine_server/headers/20160611091819_27020.jpg";
if(isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["create_time"]) && isset($_POST["user_type"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];
    $create_time = $_POST["create_time"];
    $user_type = $_POST["user_type"];

    // 首先检查用户是否已经注册过了
    $sql_check_exists = "
        SELECT id FROM User WHERE username = '$username'
    ";

    $result_check_exists = mysql_query($sql_check_exists);
    if ($result_check_exists == false) {
        MyError(101, 201);
    }

    // 已经注册了
    if (mysql_num_rows($result_check_exists) > 0) {
        MyError(102, 201);
    }

    // 没有注册
    // 插入数据库
    $sql_insert = "
        INSERT INTO User(username, password, header, user_type, create_time) VALUES ('$username', '$password', '$default_header', $user_type, '$create_time')
    ";

    $result_insert = mysql_query($sql_insert);
    if ($result_insert == false) {
        MyError(101, 201);
    }

    MySuccess("", 200);

} else {
    MyError(100, 201);
}