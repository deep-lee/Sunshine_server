<?php
/**
 * Created by PhpStorm.
 * User: Joseph
 * Date: 16/4/25
 * Time: 下午12:00
 */

require 'conn.php';
include 'My.php';

$randNum = rand(10000, 100000);

$filename = date('YmdHis') . '_' . $randNum . '.mp4';

$result = file_put_contents( 'activity_images/'.$filename, file_get_contents('php://input') );

if (!$result) {
    MyError(101, 201);
} else {
    $output = array('data'=>'activity_images/'.$filename, 'info'=> 1, 'code'=>200);
    $data = 'activity_images/'.$filename;
    MySuccess($data, 200);
}

