<?php
/**
 * Created by PhpStorm.
 * User: Deep
 * Date: 6/3/16
 * Time: 12:07 AM
 */
require 'conn.php';
include 'My.php';

/*
 * image_type
 * 0 => company_images/ 公司展示照片
 * 1 => authentication_images/ 身份认证照片
 */

$index = 0;

$image_dir =  "authentication_images/";

while (true) {
    if (isset($_FILES["file$index"]) && !empty($_FILES["file$index"]['name'])) {

        $randNum = rand(10000, 100000);
        $filename = date('YmdHis') . '_' . $randNum . '.jpg';

        move_uploaded_file($_FILES["file$index"]["tmp_name"], $image_dir . $filename);


        $data .= "http://182.92.158.167/Sunshine_server/" . $image_dir . $filename . ";";
        $index++;

    } else {
        break;
    }
}

MySuccess($data, 200);