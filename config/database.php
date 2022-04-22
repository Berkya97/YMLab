<?php
if(!defined("CONTROL"))die("access denied");


class Database{

    const SERVERNAME = "localhost";
    const USERNAME = "root";
    const PASSWORD = "";
    public $db;

    function __construct() {
        $this->db = new mysqli("localhost", "root", "","ym");
        if ($this->db->connect_error) {
           Response::response(Status::SERVER_ERR,"Connection failed: " . $this->db->connect_error);
        }
    }

    function close(){
        $this->db->close();
    }

}