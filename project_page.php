<?php
/**
 * Created by PhpStorm.
 * User: Joseph
 * Date: 16/4/10
 * Time: 下午10:14
 */

// 分页加载project
include 'conn.php';
include 'My.php';

if (isset($_POST["lastId"]) && isset($_POST["project_type"])) {

    $lastId = $_POST["lastId"];
    $project_type = $_POST["project_type"];

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
        WHERE User.id = Project.launcher_id AND Project.id < $lastId AND Project.left_time > 0 AND project_type = $project_type
        ORDER BY create_time
        DESC
        LIMIT 10
    ";

    $result = mysql_query($sql);

    if ($result == false) {
        MyError(101, 201);
    }
    $arr = array();
    $n = 0;
    while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
        $project_id = $row['id'];
        $sql_for_fav_num = "
        SELECT count(*) AS fav_num FROM Favorite WHERE project_id = $project_id
    ";
        $result_for_fav_num = mysql_query($sql_for_fav_num);
        $row_for_fav_num = mysql_fetch_assoc($result_for_fav_num);
        $row['favorite'] = $row_for_fav_num['fav_num'];
        $arr[$n++] = $row;
    }

    MySuccess($arr, 200);

} else {
    MyError(100, 201);
}