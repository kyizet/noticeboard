<?php

$root = $_SERVER['DOCUMENT_ROOT'];
include($root . "/noticeboard/classes/users.php");
session_start();

if (empty($_POST['username']) && empty($_POST['password'])) {
    $_SESSION['error'] = "Username and password cannot be empty";
    header("Location: http://localhost/noticeboard/");
} else {
    $sql = "select username,password from users";
    $result = mysqli_query($connection, $sql);
    $flag = false;
    while ($data = mysqli_fetch_assoc($result)) {
        if ($data['username'] === $_POST['username'] && $data['password'] === $_POST['password']) {
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['error'] = "";
            $flag = false;
        break;
        } else {
            $flag = true;
        }
    }
    if($flag){
        $_SESSION['error'] = "Username or password is wrong";
    }
    header("Location: http://localhost/noticeboard/");
}

?>
