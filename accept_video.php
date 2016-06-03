<?php
/**
 * Created by PhpStorm.
 * User: Deep
 * Date: 16/3/2
 * Time: 下午11:14
 */

require 'conn.php';
include 'My.php';

$randNum = rand(10000, 100000);

$filename = date('YmdHis') . '_' . $randNum . '.mp4';

$result = file_put_contents( 'project_images/'.$filename, file_get_contents('php://input') );

if (!$result) {
    MyError(101, 201);
} else {
    $output = array('data'=>'project_images/'.$filename, 'info'=> 1, 'code'=>200);
    $data = 'project_images/'.$filename;
    MySuccess($data, 200);
}