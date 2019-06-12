<?php
namespace Inc\interfacess;

interface sendRequest{

    public function sendRequestJson($requst);
    public function decodeJson();
    public function response();
    public function encodeJson();
    public function read();
    public function create();

}









?>