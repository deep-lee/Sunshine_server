<?php
/**
 * Created by PhpStorm.
 * User: Deep
 * Date: 6/7/16
 * Time: 6:46 PM
 */

/*
 * 分页加载评论记录
 */

include 'conn.php';
include 'My.php';

if (isset($_POST["lastId"]) || isset($_POST["project_id"])) {

    $lastId = $_POST["lastId"];
    $project_id = $_POST["project_id"];

    $sql = "
    SELECT * FROM User, Comment WHERE User.id = Comment.user_id AND Comment.project_id = $project_id AND Comment.id < $lastId ORDER BY Comment.create_time DESC LIMIT 10
    ";

    $result = mysql_query($sql);

    if ($result == false) {
        MyError(101, 201);
    }
    $arr = array();
    $n = 0;
    while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
        $arr[$n++] = $row;
    }

    MySuccess($arr, 200);

} else {
    MyError(101, 201);
}