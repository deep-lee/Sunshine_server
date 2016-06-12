<?php
/**
 * Created by PhpStorm.
 * User: Deep
 * Date: 6/12/16
 * Time: 2:36 PM
 */

include 'conn.php';
include 'My.php';

if (isset($_POST["search"])) {
    $search = $_POST["search"];
    $sql = "
        SELECT * FROM Company WHERE company_name LIKE '%$search%' ORDER BY update_time DESC
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