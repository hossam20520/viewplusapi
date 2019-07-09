<?php
namespace Inc\classess\create;
use Inc\interfacess\sendRequest;
use Inc\connection\connect;
header("Content-Type: application/json; charset=UTF-8");
// header('Content-Type: application/json');
class createClass implements sendRequest{

     private static $_instance; //The single instance
     private $request;
     private $jsonDecode;
     private $pdo = null;
     private $data = null;
     private $json = null;
     private $statues;
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
           $this->jsonDecode = json_decode($this->request );
        

    }

    public function create(){
        
        // echo $this->jsonDecode;
      
       
     
       
        
     // print_r($this->jsonDecode->name);
        $ar['callback'] = array();

        $name = $this->jsonDecode->name;
       // print_r(  $this->jsonDecode);
          
        $email = trim($this->jsonDecode->email); 
        $phone = trim($this->jsonDecode->phone); 
        $country = trim($this->jsonDecode->country); 
        $area = trim($this->jsonDecode->area); 
        $password = trim($this->jsonDecode->password);
        $company = trim($this->jsonDecode->company);
        $numcompany= trim($this->jsonDecode->numcompany);
        $type = trim($this->jsonDecode->type);
        $sql = "INSERT INTO users (name , email , phone, country , area , password , company , numcompany , type ) values(?, ? , ? , ? , ? , ? , ? , ? , ? )";
        if(!empty($sql)):
       $this->statues = "success";
        else:
         $this->statues = "fail";
        endif;
        $statment = $this->pdo->prepare($sql);
        $statment->execute([$name , $email , $phone , $country , $area , $password , $company , $numcompany ,  $type ]);

        $id =  $this->pdo->lastInsertId();

      //   $product = trim($this->jsonDecode->product);  
     
        $ar['callback'] = array(
    "statues" => $this->statues,
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