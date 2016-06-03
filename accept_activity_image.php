<?php
/**
 * Created by PhpStorm.
 * User: Deep
 * Date: 16/3/16
 * Time: 上午9:28
 */

require 'conn.php';
include 'My.php';

if ($_FILES["file"]["error"] > 0)
{
    MyError(100, 201);
}
else
{
    $randNum = rand(10000, 100000);

    $filename = date('YmdHis') . '_' . $randNum . '.jpg';

    move_uploaded_file($_FILES["file"]["tmp_name"],
        "activity_images/" . $filename);
    MySuccess("activity_images/" . $filename, 200);
}


