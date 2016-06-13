<?php
/**
 * Created by PhpStorm.
 * User: Deep
 * Date: 6/13/16
 * Time: 11:26 PM
 */

include 'conn.php';
include 'My.php';

// 判断用户是都点赞了项目
if (isset($_POST["user_id"])) {

    $user_id = $_POST["user_id"];
    

} else {
    MyError(100, 201);
}