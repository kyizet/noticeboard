<?php

$root = $_SERVER['DOCUMENT_ROOT'];
include($root . "/noticeboard/database/DB.php");
class User
{
    private $name;
    private $username;
    private $password;
    public function __construct($name, $username, $password)
    {
        $this->name = $name;
        $this->username = $username;
        $this->password = $password;
    }

    function getData($req)
    {
        if($req==="name"){
            return $this->name;
        } elseif($req==="username"){
            return $this->username;
        } elseif($req==="password"){
            return $this->password;
        }
    }

    function add()
    {
        global $connection;
        $sql = "insert into users (name, username, password)
        values ('$this->name', '$this->username', '$this->password');";
        mysqli_query($connection, $sql);
    }
    function update($name, $username, $password)
    {
        global $connection;
        $sql = "update users
                set name = '$name',
                    username = '$username',
                    password = '$password'
                where username = '$this->username';";
        mysqli_query($connection, $sql);
        $this->name = $name;
        $this->username = $username;
        $this->password = $password;
    }
}
