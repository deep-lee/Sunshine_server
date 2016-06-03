<?php
/**
 * Created by PhpStorm.
 * User: Deep
 * Date: 16/4/27
 * Time: 下午11:34
 */
require 'conn.php';
include 'My.php';

$randNum = rand(10000, 100000);

$filename = date('YmdHis') . '_' . $randNum . '_logo' .'.jpg';

$result = file_put_contents( 'company_images/'.$filename, file_get_contents('php://input') );

if (!$result) {
    MyError(101, 201);
} else {
    $output = array('data'=>'company_images/'.$filename, 'info'=> 1, 'code'=>200);
    $data = 'company_images/'.$filename;
    MySuccess($data, 200);
}