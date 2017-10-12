<?php
/**
 * Created by PhpStorm.
 * User: Pavlo
 * Date: 12-Oct-17
 * Time: 09:51 AM
 * Connect to database
 */

$dblocation = "127.0.0.1";
$dbname = "myshop";
$dbuser = "root";
$dbpasswd = "";

//db connect
$db = mysqli_connect($dblocation, $dbuser, $dbpasswd);

if (!$db){
    echo "Access error to MySql";
    exit();
}
//sets the default encoding for the current connection
mysqli_set_charset($db,'utf8');

if (!mysqli_select_db($db, $dbname)){
    echo "Access error to the database : {$dbname}";
    exit();
}