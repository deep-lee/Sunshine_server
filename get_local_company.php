<?php
/**
 * Created by PhpStorm.
 * User: Deep
 * Date: 16/3/18
 * Time: 下午1:46
 */

include 'conn.php';
include 'My.php';

if(isset($_POST["local_longitude"]) && isset($_POST["local_latitude"]) && isset($_POST["length"])) {

    $local_longitude = $_POST["local_longitude"];
    $local_latitude = $_POST["local_latitude"];
    $length = $_POST["length"];

    $sql_all_company = "
        SELECT Company.id, Company.user_id, Company.company_name, Company.address_longitude, Company.address_latitude,
        Company.business_scope, Company.industry, Company.show_photo,
         Company.introduction, Company.contact, Company.create_time, Company.update_time, Company.company_logo, Company.hits, User.name
         FROM Company, User WHERE User.id = Company.user_id
    ";

    $result_all_company = mysql_query($sql_all_company);
    if($result_all_company == false) {
        MyError(101, 201);
    }

    $n = 0;

    while($row = mysql_fetch_assoc($result_all_company)) {
        // 判断20KM范围内的公司
        if(getDistance($local_latitude, $local_longitude, $row["address_latitude"], $row["address_longitude"]) < $length) {
            $data[$n++] = $row;
        }
    }

    MySuccess($data, 200);

} else {
    MyError(100, 201);
}