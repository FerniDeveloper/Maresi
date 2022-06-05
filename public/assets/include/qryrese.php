 <?php
//$sql="select cal.*, cli.nombre, cli.ape, date_format(cal.fecha, '%d/%m/%Y') as fecha2 from calificaciones cal join uss cli on cal.cliente = cli.cliente where articulo = '".$sku."' ";
$sql="select count(*) as total, ifnull(sum(cal),0) as suma from calificaciones where articulo = '".$sku."' and aprobada = 1 ";
$total = ""; 
$result = $db->query($sql);
if ($result->num_rows > 0) { 
  while($row = $result->fetch_assoc()) {
    $total = $row['total'];
    $promedio = $row['suma'];
  }
}

if($total > 0){
  $promedio = $promedio / $total;
}else{
  $promedio = 0;
}

$sql="SELECT cal, count(*) as cuantas FROM calificaciones where aprobada = 1 group by cal";
$cinco = "0"; 
$cuatro = "0"; 
$tres = "0"; 
$dos = "0"; 
$uno = "0"; 

$acinco = "0";
$acuatro = "0";
$atres = "0";
$ados = "0";
$auno = "0";

$result = $db->query($sql);
if ($result->num_rows > 0) { 
  while($row = $result->fetch_assoc()) {
    if ($row['cal'] == '5') { $cinco = $row['cuantas']; }
    if ($row['cal'] == '4') { $cuatro = $row['cuantas']; }
    if ($row['cal'] == '3') { $tres = $row['cuantas']; }
    if ($row['cal'] == '2') { $dos = $row['cuantas']; }
    if ($row['cal'] == '1') { $uno = $row['cuantas']; }
  }
}

if($total > 0){
  $acinco = ($cinco * 100) / $total;  
  $acuatro = ($cuatro * 100) / $total;  
  $atres = ($tres * 100) / $total;  
  $ados = ($dos * 100) / $total;  
  $auno = ($uno * 100) / $total;  
}

?>