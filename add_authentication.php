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
    $create_time = date('Ymd');

    $sql = "
        INSERT INTO Authentication(user_id, photo_address, create_time) VALUES($user_id, '$photo_address', $create_time)
    ";

    $result = mysql_query($sql);
    if ($result == false) {
        MyError(101, 201);
    }

    // 下面修改用户的认证状态
    $sql_update_authentication_status = "
        UPDATE User SET authentication_status = 1 WHERE id = $user_id
    ";

    $result_update_authentication_status = mysql_query($sql_update_authentication_status);
    if ($result_update_authentication_status == false) {
        MyError(101, 201);
    }

    MySuccess("", 200);

} else {
    MyError(100, 201);
}
