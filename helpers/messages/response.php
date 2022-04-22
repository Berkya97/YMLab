<?php
if(!defined("CONTROL"))die("access denied");

require "status.php";
require "messages.php";

class Response {

    public static function response($status, $message , $data = -1){

        if($data == -1){
            $arr = array("status" => $status , "message" => $message);
            echo json_encode($arr);
            exit();
        }else{
            $arr = array("status" => $status , "message" => $message, "data" => $data);
            echo json_encode($arr);
            exit();
        }
    }

}

?>

