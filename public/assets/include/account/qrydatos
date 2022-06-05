<?php
$sql="SELECT * FROM uss where cliente = '".$_SESSION['VSPCOMP']['cliente']."' and email = '".$_SESSION['VSPCOMP']['email']."'";
$result = $db->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
  $nom = $row['nombre'];
  $ape = $row['ape'];
  $email = $row['email'];
  $tel = $row['tel'];
  $calle = $row['calle'];
  $ext = "#" . $row['ext'];
  $inte = "-" . $row['inte'];
  $cp = "C.P. " . $row['cp'];
  $municipio = $row['municipio'];
  $ciudad = $row['ciudad'];
  $edo = ", " . $row['edo'];

  $fac_razonsocial = "<strong>Raz&oacute;n Social:</strong> " . $row['fac_razonsocial'];
  $fac_rfc = "<strong>RFC:</strong> " . $row['fac_rfc'];
  $fac_calle = $row['fac_calle'];
  $fac_ext = "#" . $row['fac_ext'];
  $fac_inte = "-" . $row['fac_inte'];
  $fac_cp = "C.P. " . $row['fac_cp'];
  $fac_municipio = $row['fac_poblacion'];
  $fac_ciudad = $row['fac_ciudad'];
  $fac_edo = ", " . $row['fac_edo'];
}

if($ext == "#")
  $ext = "";
if($inte == "-")
  $inte = "";
if($edo == ", ")
  $edo = "";
if($cp == "C.P. ")
  $cp = "";

if($fac_ext == "#")
  $fac_ext = "";
if($fac_inte == "-")
  $fac_inte = "";
if($fac_edo == ", ")
  $fac_edo = "";
if($fac_cp == "C.P. ")
  $fac_cp = "";

$direccion = $calle . " " . $ext . $inte;
$munedo = $municipio . $edo;

$fac_direccion = $fac_calle . " " . $fac_ext . $fac_inte;
$fac_munedo = $fac_municipio . $fac_edo;
}
?>