<?php
/**
 * Created by PhpStorm.
 * User: Deep
 * Date: 16/3/17
 * Time: 下午3:31
 */

require 'conn.php';
include 'My.php';

//if (isset($_POST["num_of_images"])) {
//
//    $num_of_images = (int)$_POST["num_of_images"];
//    for ($i = 0; $i < $num_of_images; $i++) {
//        if ($_FILES['$i']["error"] > 0)
//        {
//            MyError(101, 201);
//        } else {
//            $randNum = rand(10000, 100000);
//
//            $filename = date('YmdHis') . '_' . $randNum . '.jpg';
//
//            if(move_uploaded_file($_FILES['$i']["tmp_name"], "./company_images/" . $filename)) {
//                $data .= "http://182.92.158.167/Sunshine_server/company_images/" . $filename . ";";
//            } else {
//                MyError(102, 201);
//            }
//        }
//    }
//
//    MySuccess($data, 200);
//
//} else {
//    MyError(100, 201);
//}

/*
 * image_type
 * 0 => company_images/ 公司展示照片
 * 1 => authentication_images/ 身份认证照片
 */

$index = 0;

$image_dir =  "company_images/";

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






