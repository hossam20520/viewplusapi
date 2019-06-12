<?php
namespace Inc\classess\create;
use Inc\interfacess\sendRequest;
use Inc\connection\connect;

// header('Content-Type: application/json');
class createClass implements sendRequest{

     private static $_instance; //The single instance
     private $request;
     private $jsonDecode = "fff";
     private $pdo = null;
     private $data = null;
     private $json = null;
     private function  __constructor(){ } 


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



    public function sendRequestJson($requestt){
       $this->request = $requestt;
      
      
    }



    public function decodeJson(){
    //    json_decode($this->request);
         $this->jsonDecode = json_encode($this->request );
         echo  $this->jsonDecode;

    }

    public function create(){
        
        // echo $this->jsonDecode;
      
        $js = json_decode($this->request , JSON_PRETTY_PRINT);
     
       
        
     // print_r($this->jsonDecode->name);
        $ar['callback'] = array();

        $name = trim($this->jsonDecode->name);
       // print_r(  $this->jsonDecode);
        $email = trim($this->jsonDecode->email); 
        $phone = trim($this->jsonDecode->phone); 
        $country = trim($this->jsonDecode->country); 
        $area = trim($this->jsonDecode->area); 
        $password = trim($this->jsonDecode->password);
        $company = trim($this->jsonDecode->company);
        $numcompany= trim($this->jsonDecode->numcompany);
        $sql = "INSERT INTO users (name , email , phone, country , area , password , company , numcompany ) values(?, ? , ? , ? , ? , ? , ? , ? )";
        $statment = $this->pdo->prepare($sql);
        $statment->execute([$name , $email , $phone , $country , $area , $password , $company , $numcompany ]);

        $id =  self::$pdo->lastInsertId();

        $product = trim($this->jsonDecode->product);  
     
        $ar['callback'] = array(
    "statues" => "success",
        "id"     =>  $id );
     

       $this->data = $ar;
       
     }

     public function read(){

     }

    public function encodeJson(){
       $this->json = json_encode($this->data);

    }

    public function response(){
        echo $this->json;
       
    }


}










?>