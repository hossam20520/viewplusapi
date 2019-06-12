<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Content-Type: application/json');
require_once("../vendor/autoload.php");
use Inc\classess\read\readClass;



$postdata = file_get_contents("php://input");
$read = readClass::getInstanceApi();
$read->setConnection();
$read->sendRequestJson($postdata);
$read->decodeJson();
$read->read();
$read->encodeJson();
$read->response();






?>