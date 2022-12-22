<?php

require "method.php";
$testing = new Testing('',$conn);

$request_method = $_SERVER["REQUEST_METHOD"];

switch ($request_method) {
    case 'GET':
        $testing->media();
        break;
    
    default:
        header("HTTP/1.0 405 Method Not Allowed");
        break;
}