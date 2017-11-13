<?php

ob_start();
session_start();
error_reporting(E_ALL);

$servername = "localhost";
$username = "root";
$password = "kd_ricta";
$dbname = "01_ricta_db";

// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "01_ricta_db";


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// CONFIGURE HTTPS //

if($_SERVER['HTTP_HOST'] != 'localhost' && $_SERVER['HTTP_HOST'] != '127.0.0.1'){
    $http = 'https'; 
    if(empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] == "off"){
        $redirect = $http.'://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        header('HTTP/1.1 301 Moved Permanently');
        header('Location: ' . $redirect);
        exit();
    }
}else{
    $http = 'http';
}

define("DN", "$http://{$_SERVER['HTTP_HOST']}/rw/");
define("PL", ".php");

// Load Classes
function __autoload($class){
	$pathArray = explode('\\',$class);
	if(count($pathArray)>1){
		require_once $class . '.php';
	}else{
		require_once 'classes/'.$class . '.php';
	}
}



// echo "Connected successfully";
//mysqli_close($conn);
?>
