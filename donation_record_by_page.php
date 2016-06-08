<?php
/**
 * Created by PhpStorm.
 * User: Deep
 * Date: 6/6/16
 * Time: 11:50 PM
 */

/*
 * 分页加载捐款记录
 */

include 'conn.php';
include 'My.php';

if (isset($_POST["lastId"]) || isset($_POST["project_id"])) {

    $lastId = $_POST["lastId"];
    $project_id = $_POST["project_id"];

    $sql = "
    SELECT * FROM User, Donation WHERE User.id = Donation.user_id AND Donation.project_id = $project_id AND Donation.id < $lastId ORDER BY Donation.create_time DESC LIMIT 10
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