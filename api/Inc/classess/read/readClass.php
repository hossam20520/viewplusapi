<?php
namespace Inc\classess\read;
use Inc\interfacess\sendRequest;
use Inc\connection\connect;
use PDO;


class readClass implements sendRequest {
    private static $_instance; //The single instance
    private $request = null;
    private $jsonDecode  = null;
     private $pdo = null;
     private $data = null;
     private $json = null;

     private function  __constructor(){
      
     }


     public function setConnection(){
        connect::getInstance();
        $this->pdo = connect::getConnection();  
     }
     


    public static function getInstanceApi() {
		if(!self::$_instance) { // If no instance then make one
			self::$_instance = new self();
        }
      
		return self::$_instance;
    }



    public function sendRequestJson($request){
       $this->request = $request ;
    }



    public function decodeJson(){
        $this->jsonDecode = json_decode($this->request);
         
      
    }

    public function read(){
        $ar['users'] = array();
        $product = trim($this->jsonDecode->product);  
        $data = $this->pdo->query("SELECT * FROM register")->fetchAll();

        foreach($data as $row):

            $items = array(
                'name' => $row['name'],
                'email' => $row['email']
             );


       array_push($ar['users'] , $items);
        endforeach;

       $this->data = $ar;

     }

     public function create(){ }

    public function encodeJson(){
       $this->json = json_encode($this->data);

    }

    public function response(){
        echo $this->json;
       
    }

    
   



  


}













?>