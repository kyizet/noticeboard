<?php

session_start();
$root = $_SERVER['DOCUMENT_ROOT'];
include($root . "/noticeboard/database/DB.php");

$id = $_SESSION['uid'];
if(!empty($_POST)){
    $isActive = $_POST['isActive'];
    if($isActive==1){
        $sql = "update users
                set isActive = 0
                where id='$id';";
    } else {
        $sql = "update users
                set isActive = 1
                where id='$id';";
    }
    mysqli_query($connection, $sql) or die(mysqli_error($connection));
}
header("Location: http://localhost/noticeboard/admin/pages/notices.php?uid=" . $id);