<?php
if(!defined("CONTROL"))die("access denied");
if(defined("SIGN")) return; define("SIGN",1);

class Sign{

    private $mUser;
    private $mSign;
    function __construct() {
        require "models/sign_model.php";
        require "models/user_model.php";
        $this->mUser = new mUser();
        $this->mSign = new mSign();
    }

    function register(){

        $data = array(
            "email" => trim(@$_POST["email"]),
            "pass1" => trim(@$_POST["pass1"]),
            "pass2" => trim(@$_POST["pass2"]),
        );

        if(strlen($data["pass1"]) < 5 ){
            Response::response(Status::BAD_REQUEST, SignMessages::shortPass);
        }

        if(strlen($data["pass1"]) !=  strlen($data["pass2"])){
            Response::response(Status::BAD_REQUEST, SignMessages::errMatchPass);
        }
        if (!filter_var($data["email"], FILTER_VALIDATE_EMAIL)) {
            Response::response(Status::BAD_REQUEST, SignMessages::invalidEmail);
        }

        $data["pass1"] = md5($data["pass1"]);



        if($this->mUser->isRegisteredEmail($data["email"]))
            Response::response(Status::BAD_REQUEST, SignMessages::usedEmail);

        $time = $this->mSign->isRegisteredEmailInTemp($data["email"]);
        if($time != 0){
            if(time() - $time < Config::RE_REGISTER_CYCLE){
                $time = Config::RE_REGISTER_CYCLE - (time() - $time);
                Response::response(Status::BAD_REQUEST, SignMessages::reRegisterTime . $time );
            }
        }

        if($this->mSign->registerTemp($data))
            Response::response(Status::OK, SignMessages::successTemp);
        else
            Response::response(Status::SERVER_ERR, SystemMessages::unknown);


    }

    function activation($k){
        if($this->mSign->activation($k))
            Response::response(Status::OK, SignMessages::success);
        else
            Response::response(Status::SERVER_ERR, SystemMessages::unknown);
    }

}

?>