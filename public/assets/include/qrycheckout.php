<?php
$nom = "";
$ape = "";
$email = "";
$tel = "";
$calle = "";
$ext = "";
$inte = "";
$cp = "";
$municipio = "";
$colonia = "";
$ciudad = "";
$edo = "";

$fac_razonsocial = "";
$fac_rfc = "";
$fac_usocfdi = "";
$fac_calle = "";
$fac_ext = "";
$fac_inte = "";
$fac_colonia = "";
$fac_poblacion = "";
$fac_ciudad = "";
$fac_cp = "";
$fac_edo = "";
if(isset($_SESSION['VSPCOMP'])){
  $sql="SELECT * FROM uss where cliente = '".$_SESSION['VSPCOMP']['cliente']."' and email = '".$_SESSION['VSPCOMP']['email']."'";

  $result = $db->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $nom = $row['nombre'];
      $ape = $row['ape'];
      $email = $row['email'];
      $tel = $row['tel'];
      $calle = $row['calle'];
      $ext =  $row['ext'];
      $inte = $row['inte'];
      $cp = $row['cp'];
      $municipio = $row['municipio'];
      $colonia = $row['colonia'];
      $ciudad = $row['ciudad'];
      $edo = $row['edo'];
      
      $fac_razonsocial = $row['fac_razonsocial'];
      $fac_rfc = $row['fac_rfc'];
      $fac_usocfdi = $row['fac_usocfdi'];
      $fac_calle = $row['fac_calle'];
      $fac_ext = $row['fac_ext'];
      $fac_inte = $row['fac_inte'];
      $fac_colonia = $row['fac_colonia'];
      $fac_poblacion = $row['fac_poblacion'];
      $fac_ciudad = $row['fac_ciudad'];
      $fac_cp = $row['fac_cp'];
      $fac_edo = $row['fac_edo'];
    }
  }
}

?>