<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$cpGlobal = array("CHI", "PSL");
$_SESSION['error'] = "";
//************************************************************************************************************************************
$cfg['lang'] = 'es';
$cfg['collation_connection'] = 'utf8mb4_unicode_ci';


function myconecta($servername,$database,$username,$password){
	$conn = mysqli_connect($servername, $username, $password, $database);
	mysqli_set_charset($conn, "utf8");
	
	if (!$conn) {
		return false;
	}else{

		return $conn;
	}
}



// funcion para insertar o actualizar o borrar registros.
function myput($funcion,$data1,$data2){
	try{
		// INSERT INTO cotiza_web (cliente,email,fecha,pedido) VALUES ('$clent','$email','$fechaH','$chk')
		$sql="set time_zone = '-06:00'" ;
		//echo $sql;
	    $db	= myconecta();
		$q = $db->prepare($sql);
		$q->execute();

		$sql="INSERT INTO ".$funcion." (".$data1.") VALUES (".$data2.")" ;
		//echo $sql;
		$q = $db->prepare($sql);
		$q->execute();
		//*************************************************************************
		$s="SELECT MAX(id) from pedidos";
		//$idT = idTable($s);
	} catch ( Exception $e) {
    	//echo 'Error de myput: ' . $e->getMessage();  
    	$_SESSION['error'] .= "Error de myput "; 
    }
    mysqli_close($db);
	//return $idT;
}// fin de la funcion query

function updt($funcion,$data1,$data2){
	try{
		// INSERT INTO cotiza_web (cliente,email,fecha,pedido) VALUES ('$clent','$email','$fechaH','$chk')
		$sql="UPDATE ".$funcion." SET ".$data1." WHERE ".$data2."" ;
		//echo $sql;
	    $db	= myconecta();
		$q = $db->prepare($sql);
		$q->execute();
		//*************************************************************************
		$s="SELECT IDENT_CURRENT('".$funcion."')";
		//$idT = idTable($s);
	} catch ( Exception $e) {
    	//echo 'Error de myput: ' . $e->getMessage();  
    	$_SESSION['error'] .= "Error de myput "; 
    }
    mysqli_close($db);
	//return $idT;
}// fin de la funcion query


function dlt($funcion,$data2){
	try{
		// INSERT INTO cotiza_web (cliente,email,fecha,pedido) VALUES ('$clent','$email','$fechaH','$chk')
		$sql="DELETE FROM ".$funcion." WHERE ".$data2."" ;
		//echo $sql;
	    $db	= myconecta();
		$q = $db->prepare($sql);
		$q->execute();
		//*************************************************************************
		$s="SELECT IDENT_CURRENT('".$funcion."')";
		//$idT = idTable($s);
	} catch ( Exception $e) {
    	//echo 'Error de myput: ' . $e->getMessage();  
    	$_SESSION['error'] .= "Error de myput "; 
    }
    mysqli_close($db);
	//return $idT;
}// fin de la funcion query


function query($funcion,$data,$condicion){
	try{
		if(empty($condicion)){ $where=''; }else{ $where=' WHERE '.$condicion; }
		//SELECT  [dbo].[RemoverTildes] (Producto)as Producto from vw_productos_todos where
		$sql="SELECT ".$data." as reg FROM ".$funcion." ".$where ;
	    $db	= myconecta();
		$q = $db->prepare($sql);
		$q->execute();
		$dat	=	$q->fetchAll();
		$i=0;
		foreach($dat as $row){ 
			$tot=$row['reg'];
		}
	} catch ( Exception $e) {
    	//echo 'Error de query: ' . $e->getMessage(); 
    	$_SESSION['error'] .= "Error de query ";  
    }
    mysqli_close($db);
    //$tot=$sql;
	return array('var' => $tot);
	
}// fin de la funcion query

?>