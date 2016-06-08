<?php
/**
 * Created by PhpStorm.
 * User: Deep
 * Date: 6/9/16
 * Time: 2:12 AM
 */

include 'conn.php';
include 'My.php';

if (isset($_POST["user_id"]) && isset($_POST["project_id"]) && isset($_POST["content"])) {

    $user_id = $_POST["user_id"];
    $project_id = $_POST["project_id"];
    $content = $_POST["content"];
    $create_time = date('YmdHis');
    $sql = "
        INSERT INTO Comment(project_id, user_id, content, create_time) VALUES ($project_id, $user_id, '$content', $create_time)
    ";

    $result = mysql_query($sql);
    if ($result == false) {
        MyError(101, 201);
    }

    MySuccess("", 200);

} else {
    MyError(100, 201);
}