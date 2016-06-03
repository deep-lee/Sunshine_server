<?php
/**
 * Created by PhpStorm.
 * User: Joseph
 * Date: 16/6/3
 * Time: 上午9:56
 */

/*
 * 新加身份认证请求
 * 参数：
 * user_id 用户id
 * photo_address 身份证照片地址
 */

include 'conn.php';
include 'My.php';

if (isset($_POST["user_id"]) && isset($_POST["photo_address"])) {
    $user_id = $_POST["user_id"];
    $photo_address = $_POST["photo_address"];

    $sql = "
        INSERT INTO Authentication 
    ";

} else {
    MyError(100, 201);
}
