<?php
define("CONTROL",1);

require "helpers/response.php";

$controller = strtolower(@$_GET["c"]);
$method     = strtolower(@$_GET["m"]);
$param      = strtolower(@$_GET["p"]);



switch ($controller){
    case "users":
        users($method,$param);
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


?>