<?php
/**
 * Created by PhpStorm.
 * User: Deep
 * Date: 6/13/16
 * Time: 11:26 PM
 */

include 'conn.php';
include 'My.php';

$per_page = 10;

// 判断用户是都点赞了项目
if (isset($_POST["user_id"]) && isset($_POST["row"])) {

    $user_id = $_POST["user_id"];
    $row = $_POST["row"];

    $sql = "
        SELECT * FROM Donation WHERE user_id = $user_id ORDER BY create_time DESC LIMIT $row, $per_page
    ";

    $result = mysql_query($sql);

    if ($result == false) {
        MyError(101, 201);
    }


    $data = array();
    $n = 0;

    if (mysql_num_rows($result) != 0) {

        while($row = mysql_fetch_assoc($result)) {

            $project_id = $row["project_id"];

            $sql_project = "
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
                WHERE User.id = Project.launcher_id AND Project.id = $project_id
            ";

            $result_project = mysql_query($sql_project);
            if ($result_project == false) {
                MyError(101, 201);
            }

            if (mysql_num_rows($result_project) == 0) {
                MySuccess($data, 200);
            }

            $row_project = mysql_fetch_assoc($result_project);
            $row_project["amount"] = $row["amount"];
            $row_project["application"] = $row["application"];

            $data[$n++] = $row_project;
        }

        MySuccess($data, 200);

    } else {                // 返回为空
        MySuccess($data, 200);
    }

} else {
    MyError(100, 201);
}