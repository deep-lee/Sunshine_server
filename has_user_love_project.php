<?php
/**
 * Created by PhpStorm.
 * User: Deep
 * Date: 6/8/16
 * Time: 7:45 PM
 */

include 'conn.php';
include 'My.php';

// 判断用户是都点赞了项目
if (isset($_POST["user_id"]) && isset($_POST["project_id"])) {

    $user_id = $_POST["user_id"];
    $project_id = $_POST["project_id"];

    $sql = "
        SELECT * FROM Favorite WHERE user_id = $user_id AND project_id = $project_id
    ";

    $result = mysql_query($sql);

    if ($result == false) {
        MyError(101, 201);
    }

    if (mysql_num_rows($result) == 0) {
        // 没有点赞
        MySuccess("0", 200);
    }

    MySuccess("1", 200);

} else {
    MyError(100, 201);
}