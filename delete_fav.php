<?php
/**
 * Created by PhpStorm.
 * User: Deep
 * Date: 6/8/16
 * Time: 8:24 PM
 */

/*
 * 取消点赞
 */


include 'conn.php';
include 'My.php';

if (isset($_POST["user_id"]) && isset($_POST["project_id"])) {

    $user_id = $_POST["user_id"];
    $project_id = $_POST["project_id"];

    $sql = "
        DELETE FROM Favorite WHERE user_id = $user_id AND project_id = $project_id
    ";

    $result = mysql_query($sql);
    if ($result == false) {
        MyError(101, 201);
    }

    MySuccess("", 200);

} else {
    MyError(100, 201);
}