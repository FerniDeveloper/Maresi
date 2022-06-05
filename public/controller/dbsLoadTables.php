<?php

include('../db/dbmysql.php');

$st = 201;
$tipo = $_POST['tipo'];
$servername = $_POST['server'];
$database = $_POST['name'];
$username = $_POST['user'];
$password = $_POST['pass'];
$output = '';

$db = myconecta($servername,$database,$username,$password);


if ($db != false) {
    $st = 200;
    $sql="SELECT table_name FROM information_schema.tables WHERE table_schema = '".$database."'";
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $tablaOut = $row['table_name'];
        $output .= '<option value="'.$tablaOut.'">'.$tablaOut.'</option>';
      }
    }

}else{
    $st = 202;
}


//echo "Connected successfully";
echo json_encode(array("statusCode"=>$st,"data"=>$output));
?>