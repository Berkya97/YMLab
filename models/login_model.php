<?php
if(!defined("CONTROL"))die("access denied");
require "config/database.php";

class mLogin extends Database {

    function __construct() {
        parent::__construct();
    }

    function login($email,$pass){
        $sql = "select count(*) as adet from tbl_users where email='$email' AND password='$pass'";

        $response  = $this->db->query($sql);
        $response =  $response->fetch_assoc();

        if($response["adet"] == 1){
            return true;
        }else{
            return false;
        }
    }


}

?>