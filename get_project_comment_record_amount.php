<?php
/**
 * Created by PhpStorm.
 * User: Deep
 * Date: 6/6/16
 * Time: 3:02 PM
 */

include 'conn.php';
include 'My.php';

if (isset($_POST["project_id"])) {

    $project_id = $_POST["project_id"];

    $sql = "
        SELECT COUNT(*) AS record_amount FROM Comment WHERE project_id = $project_id
    ";

    $result = mysql_query($sql);

    if ($result == false) {
        MyError(101, 201);
    }

    $amount_of_record = mysql_fetch_assoc($result)["record_amount"];
    MySuccess($amount_of_record, 200);

} else {
    MyError(100, 201);
}