<?php
/**
 * Created by PhpStorm.
 * User: Deep
 * Date: 16/3/9
 * Time: 上午12:01
 */

include 'conn.php';
include 'My.php';

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $sql = "
        SELECT * FROM Project WHERE id = $id
    ";

    $result = mysql_query($sql);
    if ($result == false) {
        MyError(101, 201);
    }

    $row = mysql_fetch_assoc($result);
    MySuccess($row, 200);

} else {
    MyError(100, 201);
}