<?php
define("CONTROL",1);

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


?>