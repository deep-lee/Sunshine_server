<?php
/**
 * Created by PhpStorm.
 * User: Deep
 * Date: 16/4/28
 * Time: 上午12:43
 */

require 'conn.php';
include 'My.php';

if(isset($_POST["id"])) {

    $id = $_POST["id"];
    $sql = "
        UPDATE Company SET hits = hits + 1 WHERE id = $id
    ";

    mysql_query($sql);
    MySuccess("", 200);
} else {
    MyError(100, 201);
}