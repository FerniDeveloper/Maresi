<?php
/* PAGINACION */
//$conn  =  mysqli_connect( '67.225.227.200:3306', 'vspcompu_com', 'g[WzAL2EA2YA', 'vspcompu_ecommerce' );
$conn  =  mysqli_connect( $servername, $username, $password, $database );
$limit = ( isset( $_GET['limit'] ) ) ? $_GET['limit'] : 15;
$order = ( isset( $_GET['o'] ) ) ? $_GET['o'] : 'def';
$page  = ( isset( $_GET['page'] ) ) ? $_GET['page'] : 1;
$links = ( isset( $_GET['links'] ) ) ? $_GET['links'] : 7;

$Paginator  = new Paginator( $db, $sql );

$results    = $Paginator->getData( $limit, $page, $order );
unset($results->data[0]);
mysqli_close($conn);

$marcasjson = json_encode($marcasarr);
$coloresjson = json_encode($coloresarr);

$getarr = json_encode($_GET);

if(isset($_GET['s']) || isset($_GET['m']) || isset($_GET['c']) ){
  ?>
    <script type="text/javascript"> 
      var vars =  JSON.parse('<?=$getarr;?>'); 
      var mmaarrccaass =  JSON.parse('<?=$marcasjson;?>'); 
      var ccoolloorreess =  JSON.parse('<?=$coloresjson;?>'); 
      loadmarcas(mmaarrccaass, vars); 
      loadcolors(ccoolloorreess, vars); 
      loadorden(vars); 
      loadlimit(vars); 
    </script>
  <?php
}

/* FIN PAGINACION*/
?>