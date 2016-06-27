<?php
/**
 * Created by PhpStorm.
 * User: Deep
 * Date: 16/6/28
 * Time: 上午2:51
 */
include 'conn.php';
include 'My.php';

if (isset($_POST["user_id"]) && isset($_POST["client_id"])) {

    $user_id = $_POST["user_id"];
    $client_id = $_POST["client_id"];

    // 1. 首先检查数据库里面是不是有对应的用户id与client id
    $sql_delete = "
        DELETE FROM PushClient WHERE userId = $user_id
    ";

    $result_delete = mysql_query($sql_delete);

    if ($result_delete == false) {
        MyError(101, 201);
    }

    $sql_insert = "
        INSERT INTO PushClient(userId, clientId) VALUES ($user_id, '$client_id')
    ";

    $result_insert = mysql_query($sql_insert);

    if ($result_insert == false) {
        MyError(101, 201);
    }

    MySuccess("", 200);

} else {
    MyError(100, 201);
}
