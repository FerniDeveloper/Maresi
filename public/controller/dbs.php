<?php
include('../db/dss.php');
$db = conecta();
$d = date("h:i:sa");
$st = 203;
$output = '';
$tag = $_POST['tag'];
$tipo = $_POST['tipo'];
$server = $_POST['server'];
$name = $_POST['name'];
$user = $_POST['user'];
$pass = $_POST['pass'];
$update = $_POST['update'];

if($update == ""){
	$sql= put("dbconn", "tag, server, name, user, pass, tipo","'".$tag."','".$server."','".$name."','".$user."','".$pass."','".$tipo."'");
	$st = 200;
}else{
	$sql= updt("dbconn", "tag = '".$tag."', tipo = '".$tipo."', server = '".$server."', name = '".$name."', user = '".$user."', pass = '".$pass."'","id = '".$update."'");
	$st = 202;
}

$sql="select * from dbconn order by tag";
$result = $db->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
  	$id = $row['id'];
    $tagOut = $row['tag'];
    $tipoOut = $row['tipo'];
    $serverOut = $row['server'];
    $nameOut = $row['name'];
    $userOut = $row['user'];
  	$passOut = $row['pass'];
  $output .= '
    <tr id="'.$id.'">
      <td>'.$tagOut.'</td>
      <td>'.$tipoOut.'</td>
      <td>'.$serverOut.'</td>
      <td>'.$nameOut.'</td>
      <td>'.$userOut.'</td>
      <td><a href="javascript:void(0)" data-toggle="modal" data-target="#modal" type="button" onclick="dataModalDB(\''.$id.'\',\''.$tagOut.'\',\''.$tipoOut.'\',\''.$serverOut.'\',\''.$nameOut.'\',\''.$userOut.'\',\''.$passOut.'\')"><i class="icon-copy fa fa-pencil-square-o" aria-hidden="true"></i></a> | <a href="javascript:void(0)" onclick="delDB(\''.$id.'\')"><i class="icon-copy fa fa-trash-o" aria-hidden="true"></i></a> </td>
    </tr>
    ';
  }
}

echo json_encode(array("statusCode"=>$st,"data1"=>$output));
?>