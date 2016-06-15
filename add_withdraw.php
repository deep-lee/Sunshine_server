<?php
/**
 * Created by PhpStorm.
 * User: Deep
 * Date: 16/6/15
 * Time: 下午7:23
 */

include 'conn.php';
include 'My.php';

if (
    isset($_POST["user_id"])
    && isset($_POST["project_id"])
    && isset($_POST["amount"])
    && isset($_POST["application"])
    && isset($_POST["prove"])
    && isset($_POST["contact"])
) {

    $user_id = $_POST["user_id"];
    $project_id = $_POST["project_id"];
    $amount = $_POST["amount"];
    $application = $_POST["application"];
    $prove = $_POST["prove"];
    $contact = $_POST["contact"];

    $sql = "
        INSERT INTO Withdraw (user_id, project_id, amount, application, prove, contact) VALUES ($user_id, $project_id, $amount, '$application', '$prove', '$contact')
    ";

    $result = mysql_query($sql);

    if ($result == false) {
        MyError(101, 201);
    }

    MySuccess("", 200);

} else {
    MyError(100, 201);
}