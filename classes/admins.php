<?php

$root = $_SERVER['DOCUMENT_ROOT'];
include($root . "/noticeboard/database/DB.php");
class Admin
{
    private $username;
    public function __construct($username)
    {
        $this->username = $username;
    }

    function updatePassword($password)
    {
        global $connection;
        $sql = "update admins
                set password = '$password'
                where username = '$this->username';";
        mysqli_query($connection, $sql);
    }
}
