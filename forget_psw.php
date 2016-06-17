<?php
/**
 * Created by PhpStorm.
 * User: Deep
 * Date: 16/6/17
 * Time: 下午3:52
 */

include 'conn.php';
include 'My.php';

if (isset($_POST["username"]) && isset($_POST["password"])) {

    $user_id = $_POST["user_id"];
    $username = $_POST["username"];

    $sql = "
        UPDATE User SET password = '$password' WHERE username = '$username'
    ";

    $result = mysql_query($sql);

    if ($result == false) {
        MyError(101, 201);
    }

    MySuccess("", 200);

} else {
    MyError(100, 201);
}