<?php
/**
 * Created by PhpStorm.
 * User: Deep
 * Date: 16/6/17
 * Time: 上午12:08
 */

include 'conn.php';
include 'My.php';

if (isset($_POST["user_id"]) && isset($_POST["password"])) {

    $user_id = $_POST["user_id"];
    $password = $_POST["password"];

    $sql = "
        UPDATE User SET password = '$password' WHERE id = $user_id
    ";

    $result = mysql_query($sql);

    if ($result == false) {
        MyError(101, 201);
    }

    MySuccess("", 200);

} else {
    MyError(100, 201);
}