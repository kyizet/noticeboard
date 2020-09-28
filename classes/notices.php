<?php

$root = $_SERVER['DOCUMENT_ROOT'];
include($root . "/noticeboard/database/DB.php");
class Notice
{
    private $title;
    private $content;
    public function __construct($title, $content)
    {
        $this->title = $title;
        $this->content = $content;
    }

    function getData($req){
        if($req==="title"){
            return $this->title;
        } elseif($req==="content"){
            return $this->content;
        }
    }

    function add($uid){
        global $connection;
        $sql = "insert into notices(title, content, uid) values('$this->title', '$this->content', '$uid');";
        mysqli_query($connection, $sql);
    }

    function update($id, $title, $content){
        global $connection;
        $sql = "update notices
                set title = '$title',
                    content = '$content'
                where id = '$id';";
        mysqli_query($connection, $sql);
        $this->title = $title;
        $this->content = $content;
    }
    
    
}
