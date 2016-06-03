<?php
/**
 * Created by PhpStorm.
 * User: Deep
 * Date: 16/3/18
 * Time: 上午9:22
 */

include 'conn.php';
include 'My.php';

if(isset($_POST["user_id"])) {

    $user_id = $_POST["user_id"];

    // 首先判断当前用户有没有添加公司信息
    $sql_check = "
        SELECT * FROM Company WHERE user_id = $user_id
    ";

    $result_check = mysql_query($sql_check);
    if($result_check == false) {
        MyError(101, 201);
    }

    // 判断是否添加了公司信息
    if(mysql_num_rows($result_check) == 0) {
        // 没有添加
        MyError(102, 201);
    }

    // 添加了
    // 获取信息并返回
    $row = mysql_fetch_assoc($result_check);
    MySuccess($row, 200);

} else {
    MyError(100, 201);
}