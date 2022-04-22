<?php
if(!defined("CONTROL"))die("access denied");
require "config/database.php";

class mSign extends Database {

    function __construct() {
        parent::__construct();
    }

    function register($data){
        require "helpers/random.php";
        $sql = "INSERT INTO tbl_users (email,password)  
                    VALUES ( '".$data['email']."', '".$data['pass']."')";

        if($this->db->query($sql)=== TRUE)
            return true;
        else
            return false;
    }


    function registerTemp($data){
        require "helpers/random.php";
        $this->deleteUserFromTemp($data["email"]);
        $k = Random::generate();
        $time = time();
        $sql = "INSERT INTO tbl_users_temp (email,password,k,time)  
                    VALUES ( '".$data['email']."', '".$data['pass1']."', '$k', $time )";

        if($this->db->query($sql)=== TRUE)
            return true;
        else
            return false;
    }


    /*
     * Kullanıcı temp tablosunda kayıtlı değilse 0 döndürür
     * Kullanıcı temp tablosunda kayıtlı ise son kaydın zamanını(time değerini) döndürür
     */
    function isRegisteredEmailInTemp($email){
        $sql = "select *  from tbl_users_temp where email='".$email."' ORDER BY id DESC";
        $response  = $this->db->query($sql);
        $response =  $response->fetch_assoc();

        if($response){
            return $response["time"];
        }else{
            return 0;
        }
    }

    function activation($k){
        $sql = "select *  from tbl_users_temp where k='$k'";
        $response  = $this->db->query($sql);
        $response =  $response->fetch_assoc();

        if($response){
            $data = array(
                "email" => $response["email"],
                "pass"  => $response["password"]
            );
            $this->deleteUserFromTemp($data["email"]);
            return $this->register($data);
        }else{
            return false;
        }
    }

    function deleteUserFromTemp($email){
        $sql = "Delete from tbl_users_temp where email='$email'";
        return $this->db->query($sql);
    }



}

?>