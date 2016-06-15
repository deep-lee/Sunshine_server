<?php
/**
 * Created by PhpStorm.
 * User: Deep
 * Date: 6/7/16
 * Time: 4:49 PM
 */

/*
 * 分页加载提款记录
 */

include 'conn.php';
include 'My.php';

$per_page = 10;

if (isset($_POST["user_id"]) || isset($_POST["row"])) {

    $user_id = $_POST["user_id"];
    $row = $_POST["row"];

    $sql = "
        SELECT *
        FROM Withdraw, Project
        WHERE Withdraw.user_id = $user_id AND Withdraw.project_id = Project.id AND Project.launcher_id = $user_id
        ORDER BY Withdraw.create_time
        DESC
        LIMIT $row, $per_page
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