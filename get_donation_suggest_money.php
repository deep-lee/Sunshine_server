<?php
/**
 * Created by PhpStorm.
 * User: Deep
 * Date: 6/9/16
 * Time: 8:33 PM
 */

include 'conn.php';
include 'My.php';

$sql = "
    SELECT * FROM DonationSuggestionMoney;
";

$result = mysql_query($sql);

if ($result == false) {
    MyError(101, 201);
}

$n = 0;
while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
    $arr[$n++] = $row;
}

MySuccess($arr, 200);