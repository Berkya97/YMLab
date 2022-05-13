<?php
if(!defined("CONTROL"))die("access denied");
require "config/database.php";

class mLogin extends Database {

    function __construct() {
        parent::__construct();
    }

    function login($email,$pass){
        $sql = "select id from tbl_users where email='$email' AND password='$pass'";

        $response  = $this->db->query($sql);
        $response =  $response->fetch_all();


        if(count($response) == 1){
            return $response[0][0];
        }else{
            return 0;
        }
    }


}

?>