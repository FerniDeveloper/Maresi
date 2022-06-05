<?php
$peso = $peso / 1000;

if($peso > 5)
$sobrepeso = true;

if($volumetrico > 5)
$sobrevolumen = true;

if(!$sobrepeso && !$sobrevolumen)
$cobrapeso = true;
else if($sobrepeso && !$sobrevolumen)
$cobrapeso = true;
else if(!$sobrepeso && $sobrevolumen)
$cobravolumen = true;
else if($sobrepeso && $sobrevolumen){
if($volumetrico >= $peso)
  $cobravolumen = true;
else
  $cobrapeso = true;
}

if($cobrapeso)
$costoenvio = ($peso * 165) / 5;

if($cobravolumen)
$costoenvio = ($volumetrico * 165) / 5;

if($costoenvio < 165)
$costoenvio = 165;

if($total >= 2000)
$costoenvio = 0;

$costoenvio = round($costoenvio, 0, PHP_ROUND_HALF_UP);
?>