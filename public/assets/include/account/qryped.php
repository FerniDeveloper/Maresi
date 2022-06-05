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
    }
    if($ext == "#")
        $ext = "";
    if($inte == "-")
        $inte = "";
    if($edo == ", ")
        $edo = "";
    if($cp == "C.P. ")
        $cp = "";
    $direccion = $calle . " " . $ext . $inte;
    $munedo = $municipio . $edo;
}
?>