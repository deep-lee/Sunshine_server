<?php
/**
 * Created by PhpStorm.
 * User: Deep
 * Date: 16/4/30
 * Time: 下午11:53
 */

include 'conn.php';
include 'My.php';

$sql = "
    SELECT * FROM Company ORDER BY hits DESC LIMIT 8
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