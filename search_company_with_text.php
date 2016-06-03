<?php
/**
 * Created by PhpStorm.
 * User: Deep
 * Date: 16/5/1
 * Time: 下午3:18
 */

include 'conn.php';
include 'My.php';

if (isset($_POST["search"])) {
    $search = $_POST["search"];
    $sql = "
        SELECT * FROM Company WHERE company_name LIKE '%$search%' OR business_scope LIKE '%$search%' ORDER BY update_time DESC
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