<?php
/**
 * Created by PhpStorm.
 * User: Deep
 * Date: 15/12/19
 * Time: 下午7:43
 */
require 'conn.php';
include 'My.php';

$randNum = rand(10000, 100000);

$filename = date('YmdHis') . '_' . $randNum . '.jpg';

$result = file_put_contents( 'headers/'.$filename, file_get_contents('php://input') );

if (!$result) {
    MyError(101, 201);
} else {
    $output = array('data'=>'headers/'.$filename, 'info'=> 1, 'code'=>200);
    $data = 'headers/'.$filename;
    MySuccess($data, 200);
}