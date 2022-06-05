<?php
include('../db/dss.php');
$db = conecta();
$d = date("h:i:sa");
$st = 203;
$output = '';
$datab = $_POST['datab'];
$categoria = $_POST['categoria'];
$consulta = $_POST['consulta'];
$tabla = $_POST['tabla'];
$columnas = $_POST['columnas'];
$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];

$consulta = "SELECT ".$columnas." FROM ".$tabla;

	$sql= put("reportes", "titulo, descripcion, consulta, conexion, categoria","'".$titulo."','".$descripcion."','".$consulta."','".$datab."','".$categoria."'");
	$st = 200;

echo json_encode(array("statusCode"=>$st));
?>