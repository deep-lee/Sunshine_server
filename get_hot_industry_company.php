<?php
/**
 * Created by PhpStorm.
 * User: Deep
 * Date: 16/5/1
 * Time: 下午8:09
 */

include 'conn.php';
include 'My.php';

if (isset($_POST["industry"])) {

    $industry = $_POST["industry"];

    $sql = "
        SELECT * FROM Company WHERE industry = $industry ORDER BY hits DESC LIMIT 10
    ";

    $result = mysql_query($sql);
    if ($result == false) {
        MyError(101, 201);
    }

    $n = 0;

    while($row = mysql_fetch_assoc($result)) {
        $data[$n++] = $row;
    }

    MySuccess($data, 200);

} else {
    MyError(100, 201);
}