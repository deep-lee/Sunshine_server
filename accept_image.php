<?php
/**
 * Created by PhpStorm.
 * User: Deep
 * Date: 16/3/2
 * Time: 下午7:38
 */

require 'conn.php';
include 'My.php';

$randNum = rand(10000, 100000);

$file_ext = date('YmdHis') . '_' . $randNum;

$target_path  = "headers/";//接收文件目录
$target_path = $target_path . $file_ext . ".jpg";

if(!move_uploaded_file($_FILES["file"]["tmp_name"], $target_path)) {
    MyError(101, 201);
}
MySuccess($target_path . $filename, 200);
