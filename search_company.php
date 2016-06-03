<?php
/**
 * Created by PhpStorm.
 * User: Deep
 * Date: 16/3/19
 * Time: 上午3:10
 */

include 'conn.php';
include 'My.php';

if(isset($_POST["search_text"])) {

    $search_text = $_POST["search_text"];

    $sql_search = "
        SELECT Company.id, Company.user_id, Company.company_name, Company.address_longitude, Company.address_latitude,
        Company.business_scope, Company.industry, Company.show_photo,
         Company.introduction, Company.contact, Company.create_time, Company.update_time, User.name FROM Company, User
          WHERE (User.id = Company.user_id) AND (Company.company_name LIKE '%$search_text%' OR
          Company.business_scope LIKE '%$search_text%' OR Company.introduction LIKE '%$search_text%'
          OR Company.contact LIKE '%$search_text%' OR User.name LIKE '%$search_text%'
          OR User.address LIKE '%$search_text%' OR User.service_team LIKE '%$search_text%')
    ";

    $result_search = mysql_query($sql_search);
    if($result_search == false) {
        MyError(101, 201);
    }

    $n = 0;
    while($row = mysql_fetch_assoc($result_search)) {
        $data[$n++] = $row;
    }

    MySuccess($data, 200);

} else {
    MyError(100 ,201);
}