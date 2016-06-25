<?php
/**
 * Created by PhpStorm.
 * User: Deep
 * Date: 16/6/25
 * Time: 下午9:43
 */
include 'conn.php';
include 'My.php';

if (isset($_POST["user_id"])) {

    $user_id = $_POST["user_id"];
    $sql = "
        SELECT * FROM Company_verify WHERE user_id = $user_id AND verify_type = 0 AND status = 0
    ";

    $result = mysql_query($sql);

    if ($result == false) {
        MyError(101, 201);
    }

    if (mysql_num_rows($result) == 0) {
        // 没有待审核的新加的公司信息
        MySuccess("0", 200);
    }

    MySuccess("1", 200);

} else {
    MyError(100, 201);
}
