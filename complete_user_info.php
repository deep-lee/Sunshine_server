<?php
/**
 * Created by PhpStorm.
 * User: Deep
 * Date: 16/3/8
 * Time: 下午8:47
 */

include 'conn.php';
include 'My.php';

if ( isset($_POST["userId"]) && isset($_POST["header"]) && isset($_POST["name"])
    && isset($_POST["sex"]) && isset($_POST["address"]) && isset($_POST["contact"]) && isset($_POST["service_team"])) {

    $userId = $_POST["userId"];
    $header = $_POST["header"];
    $name = $_POST["name"];
    $sex = $_POST["sex"];
    $address = $_POST["address"];
    $contact = $_POST["contact"];
    $service_team = $_POST["service_team"];

    $sql_complete_user_info = "
        UPDATE User SET header = '$header', name = '$name', sex = $sex,
        address = '$address', contact = '$contact', service_team = '$service_team' WHERE id = $userId
    ";

    $result_complete_user_info = mysql_query($sql_complete_user_info);
    if ($result_complete_user_info == false) {
        MyError(101, 201);
    }

    $sql_query_user_info = "
        SELECT * FROM User WHERE id = $userId
    ";

    $result_query_user_info = mysql_query($sql_query_user_info);
    if ($result_query_user_info == false) {
        MyError(101, 201);
    }

    $row = mysql_fetch_assoc($result_query_user_info);
    MySuccess($row, 200);

} else {
    MyError(100, 201);
}