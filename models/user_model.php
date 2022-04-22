<?php
if(!defined("CONTROL"))die("access denied");
require "config/database.php";

class mUser extends Database {

    function __construct() {
        parent::__construct();
    }

    function isRegisteredEmail($email){
        $sql = "select count(*) as adet from tbl_users where email='".$email."'";
        $response  = $this->db->query($sql);
        $response =  $response->fetch_assoc();
        if($response["adet"] != 0)
            return true;
        else
            return false;
    }

    function getUser($userId){


    }



}

?>