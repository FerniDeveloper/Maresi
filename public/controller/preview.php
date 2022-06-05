<?php

include('../db/dbmysql.php');

$st = 201;
$tipo = $_POST['tipo'];
$servername = $_POST['server'];
$database = $_POST['name'];
$username = $_POST['user'];
$password = $_POST['pass'];
$tabla = $_POST['tabla'];
$columnas = $_POST['columnas'];
$output = '';
$output1 = '';

$db = myconecta($servername,$database,$username,$password);

if ($db != false) {
    $st = 200;
    $columS = explode(",",$columnas);
    $sql="SELECT ".$columnas." FROM ".$tabla;
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $output1 .= '<tr>';
          foreach ($columS as $key => $value) {
            $value1 = $row[$value];
            $output1 .= '<td>'.$value1.'</td>';
          }
        $output1 .= '</tr>';
      }
    }

}else{
    $st = 202;
}
$output1 .= '</tr>';


//echo "Connected successfully";
echo json_encode(array("statusCode"=>$st,"data"=>$output,"data1"=>$output1,"query"=>$sql));
?>