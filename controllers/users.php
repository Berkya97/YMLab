<?php
if(!defined("CONTROL"))die("access denied");
if(defined("USERS")) return; define("USERS",1);


class Users{


    function __construct() {
        require "models/user_model.php";
        JWT::isLogin();
    }



    function getUser($userId){

        $user = array(
            "userId" => $userId,
            "name"   => "emre can",
            "email"  => "emrecandegis@topkapi.edu.tr"
        );
        $resp = new Response();
        Response::response(Status::OK, UserMessages::getUser,$user);
    }



}

?>