<?php 
	require_once('modelo/api.php');

	header("HTTP/1.1 200");
	header('Content-Type: application/json; charset=UTF-8');
	header('Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS');

	$metodo =  $_SERVER['REQUEST_METHOD'];

	$api = new api($metodo);
	$api->call();

?>