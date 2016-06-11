<?php
/**
 * Created by PhpStorm.
 * User: Deep
 * Date: 16/3/18
 * Time: 上午10:22
 */

include 'conn.php';
include 'My.php';

if (isset($_POST["company_id"]) && isset($_POST["company_name"]) && isset($_POST["address_longitude"]) && isset($_POST["address_latitude"]) && isset($_POST["address_position"])
    && isset($_POST["business_scope"]) && isset($_POST["industry"]) && isset($_POST["show_photo"]) && isset($_POST["introduction"])
    && isset($_POST["contact"]) && isset($_POST["company_logo"])) {

    $company_id = $_POST["company_id"];
    $company_name = $_POST["company_name"];
    $address_longitude = $_POST["address_longitude"];
    $address_latitude = $_POST["address_latitude"];
    $address_position = $_POST["address_position"];
    $business_scope = $_POST["business_scope"];
    $industry = $_POST["industry"];
    $show_photo = $_POST["show_photo"];
    $introduction = $_POST["introduction"];
    $contact = $_POST["contact"];
    $company_logo = $_POST["company_logo"];

    $sql_update = "
        UPDATE Company SET  company_name = '$company_name', address_longitude = '$address_longitude', address_latitude = '$address_latitude', address_position = '$address_position',
        business_scope = '$business_scope', industry = $industry, show_photo = '$show_photo', introduction = '$introduction',
        contact = '$contact', company_logo = '$company_logo' WHERE id = $company_id
    ";

    $result_update = mysql_query($sql_update);
    if ($result_update == false) {
        MyError(101, 201);
    }

    MySuccess("", 200);

} else {
    MyError(100 ,201);
}