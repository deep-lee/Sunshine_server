<?php
/**
 * Created by PhpStorm.
 * User: Joseph
 * Date: 16/4/25
 * Time: 下午12:06
 */
require 'conn.php';
include 'My.php';

$randNum = rand(10000, 100000);
$server_address_dir = "http://182.92.158.167/Sunshine_server/";

$filename = date('YmdHis') . '_' . $randNum . '.jpg';

$result = file_put_contents( 'activity_images/'.$filename, file_get_contents('php://input') );

if (!$result) {
    MyError(101, 201);
} else {
    $data = $server_address_dir . 'activity_images/'.$filename;
    MySuccess($data, 200);
}
