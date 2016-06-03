<?php
/**
 * Created by PhpStorm.
 * User: Deep
 * Date: 16/3/19
 * Time: 上午2:06
 */

include 'conn.php';
include 'My.php';

if(isset($_POST["search_text"])) {

    $search_text = $_POST["search_text"];

    $sql_search = "
        SELECT Project.id, Project.title, Project.time, Project.launcher_id, Project.favorite, Project.cover_image,
                Project.details_page, Project.create_time, User.name FROM Project, User
                 WHERE User.id = Project.launcher_id AND (title LIKE  '%$search_text%' OR details_page LIKE '%$search_text%' OR User.name LIKE '%$search_text%'
                  OR User.address LIKE '%$search_text%' OR User.service_team LIKE '%$search_text%')
    ";

    $result_search = mysql_query($sql_search);
    if($result_search == false) {
        MyError(101, 201);
    }

    $n = 0;
    while($row = mysql_fetch_assoc($result_search)) {
        $project_id = $row['id'];
        $sql_for_fav_num = "
        SELECT count(*) AS fav_num FROM Favorite WHERE project_id = $project_id
    ";
        $result_for_fav_num = mysql_query($sql_for_fav_num);
        $row_for_fav_num = mysql_fetch_assoc($result_for_fav_num);
        $row['favorite'] = $row_for_fav_num['fav_num'];
        $data[$n++] = $row;
    }

    MySuccess($data, 200);

} else {
    MyError(100 ,201);
}