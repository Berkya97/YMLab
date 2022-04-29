<?php
if(!defined("CONTROL"))die("access denied");

class Random {
    public static function generate(){
       return md5(time()."-".rand(0,999));
    }
}

?>

