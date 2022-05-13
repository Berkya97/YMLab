<?php
if(!defined("CONTROL"))die("access denied");
if(defined("LOGIN")) return; define("USERS",1);


class Topic{

    private $mTopic;
    private $userId;

    function __construct() {
        require "models/topic_model.php";
        $this->userId = JWT::isLogin();
        $this->mTopic = new mTopic($this->userId);
    }

    function add(){

        $title = trim(@$_POST["title"]);


        if(empty(trim($title))){
            Response::response(Status::BAD_REQUEST, TopicMessages::emptyVal);
        }

        if($this->mTopic->add($title)){
            Response::response(Status::OK, LoginMessages::success);
        }
        else
            Response::response(Status::SERVER_ERR, SystemMessages::unknown);

    }

    function asd(){
        die("asd çağrıldı");
    }




}

?>