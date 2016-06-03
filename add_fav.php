<?php
/**
 * Created by PhpStorm.
 * User: Deep
 * Date: 16/3/9
 * Time: 上午12:18
 */

include 'conn.php';
include 'My.php';

if (isset($_POST["user_id"]) && isset($_POST["project_id"])) {

    $user_id = $_POST["user_id"];
    $project_id = $_POST["project_id"];

    // 首先检查是否已经点过赞了
    $sql_check_exists = "
        SELECT * FROM Favorite WHERE user_id = $user_id AND project_id = $project_id
    ";

    $result_for_check = mysql_query($sql_check_exists);
    if ($result_for_check == false) {
        MyError(1011, 201);
    }

    // 已经点赞过了
    if (mysql_num_rows($result_for_check) > 0) {
        MyError(102, 201);
    }

    // 没有点赞过，就更新数据库
    $sql_insert = "
        INSERT INTO Favorite (user_id, project_id) VALUES ($user_id, $project_id)
    ";

    $result_insert = mysql_query($sql_insert);
    if ($result_insert == false) {
        MyError(1012, 201);
    }

    MySuccess("", 200);

} else {
    MyError(100, 201);
}