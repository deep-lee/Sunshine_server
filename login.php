<?php
/**
 * Created by PhpStorm.
 * User: Deep
 * Date: 16/3/8
 * Time: 下午8:57
 */

include 'conn.php';
include 'My.php';

if (isset($_POST["username"]) && isset($_POST["password"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql_login = "
        SELECT * FROM User WHERE username = '$username' AND password = '$password'
    ";

    $result_login = mysql_query($sql_login);
    if ($result_login == false) {
        MyError(101, 201);
    }

    // 用户名或密码不正确
    if (mysql_num_rows($result_login) == 0) {
        MyError(102, 201);
    }

    $row = mysql_fetch_assoc($result_login);
    MySuccess($row, 200);

} else {
    MyError(100, 201);
}