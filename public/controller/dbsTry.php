<?php

$st = 202;
$tipo = $_POST['tipo'];
$servername = $_POST['server'];
$database = $_POST['name'];
$username = $_POST['user'];
$password = $_POST['pass'];

// Create connection
$conn = @mysqli_connect($servername, $username, $password, $database);
@mysqli_set_charset($conn, "utf8");
//mysqli_query("SET SESSION time_zone = '+6:00'"); 
//qry("SET timezone = '+6:00'"); 

// Check connection
if (!$conn) {

    //die("Connection failed: " . mysqli_connect_error());
    $st = 201;
}else{
    $st = 200;
}

//echo "Connected successfully";
echo json_encode(array("statusCode"=>$st));
?>