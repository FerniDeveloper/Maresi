<?php
if(isset($_GET['sku'])){
    $sku = $_GET['sku'];
}else{
    ?>
    <script type="text/javascript">window.location.href = '404';</script>
    <?php
}
$sql="SELECT prds.*, marcas.marca AS marcaT, lineas.linea AS lineaT, categorias.categoria AS categoriaT FROM prds JOIN marcas ON marcas.id = prds.marca JOIN lineas ON lineas.id = prds.linea JOIN categorias ON categorias.id = prds.categoria where sku = '".$sku."'";
$tagss = "";
$tagsseo = "";
$activo = "";
$descripss = "";
$result = $db->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
  $tagss = $row['tags'];
  $marcaT = $row['marcaT'];
$lineaT = $row['lineaT'];
$categoriaT = $row['categoriaT'];
  $tagsseo = $row['tagsseo'];
  $activo = $row['activo'];
  $descripss = $row['descrip'];
  $precioss = $row['precio'];
  $ofertass = $row['oferta'];
  $marcass = $row['marca'];
  $modeloss = $row['modelo'];
  $det1 = $row['det1'];
  $det2 = $row['det2'];
  $det3 = $row['det3'];
  $det4 = $row['det4'];
  $tf1 = $row['tf1'];
  $df1 = $row['df1'];
  $tf2 = $row['tf2'];
  $df2 = $row['df2'];
  $tf3 = $row['tf3'];
  $df3 = $row['df3'];
  $linea = $row['linea'];
}
if($ofertass == '0')
  $precioss = $precioss;
else
  $precioss = $ofertass;
}
$tagsjson = str_replace(","," |",$tagsseo);
if($activo == '0'){
?>
  <script type="text/javascript">window.location.href="404";</script>
<?php
}


function bolder($word){
    $word = str_replace("<br />",":",$word);
    $inArrays = explode(":", $word);
    $word = "";
    foreach ($inArrays as $key => $value) {
        if ($key%2==0) {
            $word .= "<b>".$value."</b>:";
        }else{
            $word .= $value."<br>";
        }
    }
    //$word = implode(":", $inArrays);
    return $word;
}
?>