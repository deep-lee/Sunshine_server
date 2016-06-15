<?php
/**
 * Created by PhpStorm.
 * User: Deep
 * Date: 16/6/15
 * Time: 下午7:38
 */

require 'conn.php';
include 'My.php';

$index = 0;

$image_dir =  "withdraw_images/";

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