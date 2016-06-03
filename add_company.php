<?php
/**
 * Created by PhpStorm.
 * User: Deep
 * Date: 16/3/8
 * Time: 下午11:28
 */

include 'conn.php';
include 'My.php';

if (isset($_POST["user_id"]) && isset($_POST["company_name"]) && isset($_POST["address_longitude"]) && isset($_POST["address_latitude"])
    && isset($_POST["business_scope"]) && isset($_POST["industry"]) && isset($_POST["show_photo"]) && isset($_POST["create_time"])
    && isset($_POST["introduction"]) && isset($_POST["contact"]) && isset($_POST["company_logo"])) {

    $user_id = $_POST["user_id"];
    $company_name = $_POST["company_name"];
    $address_longitude = $_POST["address_longitude"];
    $address_latitude = $_POST["address_latitude"];
    $business_scope = $_POST["business_scope"];
    $industry = $_POST["industry"];
    $show_photo = $_POST["show_photo"];
    $create_time = $_POST["create_time"];
    $introduction = $_POST["introduction"];
    $contact = $_POST["contact"];
    $company_logo = $_POST["company_logo"];

    $sql_insert = "
        INSERT INTO Company (user_id, company_name, address_longitude, address_latitude, business_scope, industry,
        show_photo, company_logo, introduction, contact,create_time )
        VALUES ($user_id, '$company_name', '$address_longitude', '$address_latitude', '$business_scope', $industry, '$show_photo',
                '$company_logo', '$introduction', '$contact', '$create_time')
    ";

    $result_insert = mysql_query($sql_insert);
    if ($result_insert == false) {
        MyError(101, 201);
    }

    MySuccess("", 200);

} else {
    MyError(100, 201);
}