<?php
if(!defined("CONTROL"))die("access denied");

class Status{
    const OK = 200;
    const NOT_FOUND = 404;
    const BAD_REQUEST = 400;
    const ACCESS_DENIED = 403;
    const SERVER_ERR = 500;
}

?>