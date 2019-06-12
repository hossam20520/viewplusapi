<?php

namespace Inc\connection;
use PDO;

class connect{
    private $_connection;
    public $instancex;
	private static $_instance; //The single instance
	private $_host = "127.0.0.1";
	private $_username = "root";
	private $_password = "hossam";
    private $_database = "viewplus";
    private $charset = 'utf8';
    public static $_pdo;
   private $option = [
       PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
       PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
       PDO::ATTR_EMULATE_PREPARES => false,
   ];

  
   
    private function __construct() {


    $con = "mysql:host=$this->_host;dbname=$this->_database;charset=$this->charset";
try{
    $pdo = new PDO($con,$this->_username, $this->_password, $this->option);
       self::$_pdo = $pdo;
}catch (\PDOException $e){
throw new \PDOException($e>getMessage(), (int) $e->getCod());
}
    }
    
    public static function getInstance() {
		if(!self::$_instance) { // If no instance then make one
			self::$_instance = new self();
		}
		return self::$_instance;
    }
    

    private function __clone() {

     }
	// Get mysqli connection
	public static function getConnection() {
		return self::$_pdo;
	}



    
}



?>