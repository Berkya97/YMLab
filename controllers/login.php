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
        $email = trim(@$_POST["email"]);
        $pass  = trim(@$_POST["pass"]);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            Response::response(Status::BAD_REQUEST, SignMessages::invalidEmail);
        }

        $pass = md5($pass);

        if($this->mLogin->login($email,$pass)){
            setcookie("email",$email);
            setcookie("password",$pass);
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