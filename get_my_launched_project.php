<?php
/**
 * Created by PhpStorm.
 * User: Deep
 * Date: 6/14/16
 * Time: 10:39 PM
 */

include 'conn.php';
include 'My.php';

$per_page = 10;

// 判断用户是都点赞了项目
if (isset($_POST["user_id"]) && isset($_POST["row"])) {

    $user_id = $_POST["user_id"];
    $row = $_POST["row"];

    $sql = "
        SELECT Project.id,
        Project.title,
        Project.time,
        Project.launcher_id,
        Project.favorite,
        Project.cover_image,
        Project.details_page,
        Project.project_type,
        Project.fundraising_amount,
        Project.has_raised_amount,
        Project.withdraw_amount,
        Project.apply_for_other,
        Project.aided_person_id_num,
        Project.aided_person_id_card_photo,
        Project.left_time,
        Project.sponsorship_company_id,
        Project.create_time,
        User.name,
        User.header
        FROM Project, User
        WHERE User.id = Project.launcher_id AND Project.launcher_id = $user_id
        ORDER BY create_time
        DESC
        LIMIT $row, $per_page
    ";

    $result = mysql_query($sql);

    if ($result == false) {
        MyError(101, 201);
    }

    $data = array();
    $n = 0;

    while ($row = mysql_fetch_assoc($result)) {
        $data[$n++] = $row;
    }

    MySuccess($data, 200);

} else {
    MyError(100, 201);
}