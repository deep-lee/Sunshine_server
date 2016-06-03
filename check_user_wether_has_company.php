<?php
/**
 * Created by PhpStorm.
 * User: Deep
 * Date: 16/3/19
 * Time: 下午2:50
 */

include 'conn.php';
include 'My.php';

if(isset($_POST["user_id"])) {

    $user_id = $_POST["user_id"];

    $sql_check = "
        SELECT * FROM Company WHERE user_id = $user_id
    ";

    $result_check = mysql_query($sql_check);
    if($result_check == false) {
        MyError(101, 201);
    }

    if(mysql_num_rows($result_check) == 0) {
        MySuccess("0", 200);
    } else {
        MySuccess("1", 200);
    }

} else {
    MyError(100 ,201);
}