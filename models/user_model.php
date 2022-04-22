<?php
if(!defined("CONTROL"))die("access denied");
require "config/database.php";

class mUser extends Database {

    function __construct() {
        parent::__construct();
    }


    function addUser($data){

        $sql = "INSERT INTO tbl_users (email,password)  
                    VALUES ( '".$data['email']."', '".$data['pass1']."' )";

        $this->db->query($sql);

        $this->close();
    }

    function getUser($userId){


    }



}

?>