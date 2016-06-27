<?php
/**
 * Created by PhpStorm.
 * User: Deep
 * Date: 16/6/28
 * Time: 上午3:16
 */

include 'conn.php';
include 'My.php';

if (isset($_POST["user_id"])) {

    $user_id = $_POST["user_id"];

    $sql_delete = "
        DELETE FROM PushClient WHERE userId = $user_id
    ";

    $result_delete = mysql_query($sql_delete);

    if ($result_delete == false) {
        MyError(101, 201);
    }

    MySuccess("", 200);

} else {
    MyError(100, 201);
}