<?php
include('../db/dss.php');
$db = conecta();
$d = date("h:i:sa");
$st = 203;
$output = '';
$categoria = $_POST['categoria'];
$icon = $_POST['icon'];
$update = $_POST['update'];

if($update == ""){
	$sql= put("categorias", "categoria, icon, elim","'".$categoria."','".$icon."','0'");
	$st = 200;
}else{
	$sql= updt("categorias", "categoria = '".$categoria."', icon = '".$icon."'","id = '".$update."'");
	$st = 202;
}

$sql="select * from categorias WHERE elim = '0' order by categoria";
$result = $db->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
  	$id = $row['id'];
    $categoriaOut = $row['categoria'];
  	$iconOut = $row['icon'];
  $output .= '
    <tr id="'.$id.'">
      <td>'.$categoriaOut.'</td>
      <td><i style="font-size: 2em; " class="dw '.$iconOut.'"></i></td>
      <td><a href="javascript:void(0)" data-toggle="modal" data-target="#modal" type="button" onclick="dataModal(\''.$id.'\',\''.$iconOut.'\',\''.$categoriaOut.'\')"><i class="icon-copy fa fa-pencil-square-o" aria-hidden="true"></i></a> | <a href="javascript:void(0)" onclick="delCat(\''.$id.'\')"><i class="icon-copy fa fa-trash-o" aria-hidden="true"></i></a> </td>
    </tr>
    ';
  }
}

echo json_encode(array("statusCode"=>$st,"data1"=>$output));
?>