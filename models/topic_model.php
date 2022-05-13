<?php
if(!defined("CONTROL"))die("access denied");
require "config/database.php";

class mTopic extends Database {

    private $userId;

    function __construct($userId) {
        parent::__construct();
        $this->userId = $userId;
    }


    function add($title){

        $sql = "INSERT INTO tbl_topic (userId,title)  
                    VALUES ('$this->userId','$title')";

        if($this->db->query($sql)=== TRUE)
            return true;
        else
            return false;
    }

}

?>