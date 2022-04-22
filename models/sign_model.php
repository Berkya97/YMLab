<?php
if(!defined("CONTROL"))die("access denied");
require "config/database.php";

class mSign extends Database {

    function __construct() {
        parent::__construct();
    }


    function register($data){

        $sql = "INSERT INTO tbl_users (email,password)  
                    VALUES ( '".$data['email']."', '".$data['pass1']."' )";

        if($this->db->query($sql)=== TRUE)
            return true;
        else
            return false;
    }

    function getUser($userId){


    }



}

?>