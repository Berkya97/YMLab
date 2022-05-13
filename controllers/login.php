<?php
if(!defined("CONTROL"))die("access denied");
if(defined("LOGIN")) return; define("USERS",1);


class Login{

    private $mLogin;
    function __construct() {
        require "models/login_model.php";
        $this->mLogin = new mLogin();
    }

    //Giriş yapma
    function login(){


        if(JWT::isLogin())
            die("OK");
        else
            die("NOT LOGIN");


        $email = trim(@$_POST["email"]);
        $pass  = trim(@$_POST["pass"]);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            Response::response(Status::BAD_REQUEST, SignMessages::invalidEmail);
        }

        if(trim($pass) == ""){
            Response::response(Status::BAD_REQUEST, LoginMessages::ERR_PASS);
        }

        $pass = md5($pass);

        $userId = $this->mLogin->login($email,$pass);
        if($userId){
            JWT::start($userId);
            Response::response(Status::OK, LoginMessages::success);
        }
        else
            Response::response(Status::SERVER_ERR, LoginMessages::ERR_PASS);

    }

    function asd(){
        die("asd çağrıldı");
    }




}

?>