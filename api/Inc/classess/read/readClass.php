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



    public function sendRequestJson($requestt){
       $this->request = $requestt ;
    }



    public function decodeJson(){
        $this->jsonDecode = json_decode($this->request);
     
      
    }

    public function read(){
        $ar['users'] = array();
        $email  = trim($this->jsonDecode->email);  
        $passwords  = trim($this->jsonDecode->password); 
        $password = base64_encode($passwords);
        $data = $this->pdo->query("SELECT * FROM users where email='$email' and password ='$password' ")->fetchAll();

        foreach($data as $row):

            $items = array(
                'id' => $row['id'],
                'name' => $row['name'],
                'email' => $row['email'],
                'phone' =>  $row['phone'],
                'country' => $row['country'],
                'area' => $row['area'],
                'company' => $row['company'],
                'numcompany' => $row['numcompany']
                
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