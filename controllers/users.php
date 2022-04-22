<?php
if(!defined("CONTROL"))die("access denied");

class Users{


    function __construct() {
        require "models/user_model.php";
    }

    function addUser(){

        $data = array(
            "email" => trim(@$_POST["email"]),
            "pass1" => trim(@$_POST["pass1"]),
            "pass2" => trim(@$_POST["pass2"]),
        );

        if(strlen($data["pass1"]) < 5 ){
            Response::response(Status::BAD_REQUEST, UserMessages::shortPass);
        }

        if(strlen($data["pass1"]) !=  strlen($data["pass2"])){
            Response::response(Status::BAD_REQUEST, UserMessages::errMatchPass);
        }
        if (!filter_var($data["email"], FILTER_VALIDATE_EMAIL)) {
            Response::response(Status::OK, UserMessages::invalidEmail);
        }

        $data["pass1"] = md5($data["pass1"]);

        $mUser = new mUser();
        $mUser->addUser($data);

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