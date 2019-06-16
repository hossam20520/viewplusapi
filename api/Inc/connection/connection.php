<?php
namespace Inc\connection;
use Inc\connection\connect;
class connection{
    private $object = null;

    
 

    public function setConnection($con , $_username , $_password , $_database , $charset){
        connect::setConnection("localhost" , "root" , "" , "inject" , "utf8");
    }
}















?>