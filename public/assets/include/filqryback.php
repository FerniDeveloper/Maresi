<?php
$marcasarr = array();
$coloresarr = array();
$cond = "";

$sql = "select prds.* from prds JOIN marcas ON marcas.id = prds.marca JOIN lineas ON lineas.id = prds.linea JOIN categorias ON categorias.id = prds.categoria where activo = '1' ";
$valsm = "";
$valsc = "";
if(isset($_GET['m'])){
  foreach($_GET['m'] as $key => $value)
  {
    $valsm .= "'".$value."',";
  }
  $valsm = rtrim($valsm,",");
  $valsm = str_replace("[]", "", $valsm);
}

if(isset($_GET['c'])){
  foreach($_GET['c'] as $key => $value)
  {
    $valsc .= "'".$value."',";
  }
  $valsc = rtrim($valsc,",");
  $valsc = str_replace("[]", "", $valsc);
} 

if(isset($_GET['s'])){
  $busq = $_GET['s'];
  $bs = "";

  $busqaplit = explode(" ", $busq);
  foreach ($busqaplit as $key => $value) {
    //$bs .= "or descrip like '%".$value."%' ";
  }
  $sql.=" and (tags like '%".$busq."%' or lineas.linea = '".$busq."' or marcas.marca = '".$busq."' or categorias.categoria = '".$busq."' or sku like '%".$busq."%' ".$bs." ) ";

  if(isset($_GET['m']) && isset($_GET['c']) ){
    $cond .= " and marcas.marca in (".$valsm.") and color in (".$valsc.") ";
    $sql .= $cond;
  }
  else if(isset($_GET['c'])){
    $cond .= " and color in (".$valsc.") ";
    $sql .= $cond;
  }
  else if(isset($_GET['m'])){
    $cond .= " and marcas.marca in (".$valsm.") ";
    $sql .= $cond;
  }
}
else{

  if(isset($_GET['m']) && isset($_GET['c']) ){
    $cond .= " and marcas.marca in (".$valsm.") and color in (".$valsc.") ";
    $sql .= $cond;
  }
  else if(isset($_GET['c'])){
    $cond .= " and color in (".$valsc.") ";
    $sql .= $cond;
  }
  else if(isset($_GET['m'])){
    $cond .= " and marcas.marca in (".$valsm.") ";
    $sql .= $cond;
  }
}
?>