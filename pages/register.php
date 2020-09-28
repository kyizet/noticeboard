<?php

$root = $_SERVER['DOCUMENT_ROOT'];
include($root . "/noticeboard/classes/users.php");
session_start();

if (empty($_POST['username']) || empty($_POST['password'])) {
    $_SESSION['error'] = "Username and password cannot be empty";
    $flag = false;
    header("Location: http://localhost/noticeboard/");
} else {
    $sql = "select username from users";
    $result = mysqli_query($connection, $sql);
    if (mysqli_fetch_assoc($result) === null) {
        $flag = true;
    }
    $result = mysqli_query($connection, $sql);
    while ($data = mysqli_fetch_assoc($result)) {
        if ($data['username'] === $_POST['username']) {
            $_SESSION['error'] = "Username is already taken!";
            $flag = false;
            header("Location: http://localhost/noticeboard/");
        } else {
            $flag = true;
        }
    }
}

if ($flag) {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user = new User($name, $username, $password);
    $user->add();
    $_SESSION['username'] = $user->$username;
    header("Location: http://localhost/noticeboard/");
}
