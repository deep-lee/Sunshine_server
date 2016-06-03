<?php
/**
 * Created by PhpStorm.
 * User: Deep
 * Date: 16/3/8
 * Time: 下午11:14
 */
include 'conn.php';
include 'My.php';

if (isset($_POST["title"]) && isset($_POST["time"]) && isset($_POST["launcher_id"]) && isset($_POST["cover_image"]) &&
    isset($_POST["details_page"])) {

    $title = $_POST["title"];
    $time = $_POST["time"];
    $launcher_id = $_POST["launcher_id"];
    $cover_image = $_POST["cover_image"];
    $details_page = $_POST["details_page"];

    // 将活动详情写入到文件中
    // 生成html文件
    $randNum = rand(10000, 100000);

    // 生成文件名
    $filename = date('YmdHis') . '_' . $randNum . '.html';

    $encoding = mb_detect_encoding($details_page, array('GB2312','GBK','UTF-16','UCS-2','UTF-8','BIG5','ASCII'));

    if ($encoding != false) {
        if (mb_detect_encoding($details_page) != 'UTF-8'){
            $details_page = iconv($encoding, 'UTF-8', $details_page);
        }
    }else{
        $details_page = mb_convert_encoding ( $details_page, 'UTF-8','Unicode');
    }

    // 将内容写入到文件中
    $my_file = fopen('activity_details/'.$filename, "w") or MyError(102, 201);
    fwrite($my_file, $details_page);
    // 关闭文件
    fclose($my_file);

    $page = "http://182.92.158.167/Sunshine_server/activity_details/" . $filename;

    $sql_insert = "
        INSERT INTO Project(title, time, launcher_id, cover_image, details_page) VALUES ('$title', '$time',
        $launcher_id, '$cover_image', '$page')
    ";

    $result_insert = mysql_query($sql_insert);
    if ($result_insert == false) {
        MyError(101, 201);
    }

    MySuccess("", 200);

} else {
    MyError(100, 201);
}