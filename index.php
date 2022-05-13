<?php
define("CONTROL",1);
require "helpers/jwt.php";

$payload = array(
    "userId" => 1,
    "time"   => 123,
    "ip"     => "192.168.1.1"
);
$jwt = JWT::encode($payload);

$jwtDecode = JWT::decode($jwt);

require "helpers/messages/response.php";
require "config/config.php";


$controller = strtolower(@$_GET["c"]);
$method     = strtolower(@$_GET["m"]);
$param      = strtolower(@$_GET["p"]);



switch ($controller){
    case "users":
        users($method,$param);
        break;
    case "sign":
        sign($method,$param);
        break;
    case "login":
        login($method,$param);
        break;
    case "topic":
        topic($method,$param);
        break;
    default:
        die("default case");
}

function users($method,$param=-1){
    require "controllers/users.php";
    $users = new Users();

    switch ($method){
        case "getuser":
            $users->getUser($param);
            break;
        case "adduser":
            $users->addUser();
            break;
        default:
            die("missing method");
    }
}


function sign($method,$param=-1){
    require "controllers/sign.php";
    $sing = new Sign();

    switch ($method){
        case "register":
            $sing->register();
            break;
        case "activation":
            $sing->activation($param);
            break;
        default:
            die("missing method");
    }
}

function login($method,$param=-1){
    require "controllers/login.php";
    $login = new Login();

    switch ($method){
        case "login":
            $login->login();
            break;
        default:
            die("missing method");
    }
}

function topic($method,$param=-1){
    require "controllers/topic.php";
    $topic = new Topic();

    switch ($method){
        case "add":
            $topic->add();
            break;
        default:
            die("missing method");
    }
}


?>