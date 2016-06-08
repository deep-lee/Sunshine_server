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

if (isset($_POST["lastId"]) || isset($_POST["project_id"])) {

    $lastId = $_POST["lastId"];
    $project_id = $_POST["project_id"];

    $sql = "
    SELECT * FROM User, Withdraw WHERE User.id = Withdraw.user_id AND Withdraw.project_id = $project_id AND Withdraw.id < $lastId ORDER BY Withdraw.create_time DESC LIMIT 10
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