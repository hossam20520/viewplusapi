<?php
require_once("../vendor/autoload.php");
use Inc\classess\create\createClass;

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
// header("Content-Type': 'application/x-www-form-urlencoded");



$post = file_get_contents('php://input');
//  echo $post;
// $EN = json_decode($post);


// echo $EN->name;
//  echo json_decode($post);
 
//  $postdatax = json_decode( ,TRUE);
//  echo $postdatax->name;
// print_r(file_get_contents('php://input'));

//  $namee = trim($postdatax->name);
 
// echo $namee;

// echo $postdata;
$read = createClass::getInstanceApi();
$read->setConnection();
$read->sendRequestJson($post);
$read->decodeJson();
$read->create();
$read->encodeJson();
$read->response();


?>