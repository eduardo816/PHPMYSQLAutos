<?php
include 'php/conexionAutos.php';

$marcaAuto=$_POST['marcaAuto'];
$lineaAuto=$_POST['lineaAuto'];
$tipoAuto=$_POST['tipoAuto'];
$transmisionAuto=$_POST['transmisionAuto'];
$modeloAuto=$_POST['modeloAuto'];
$kmAuto=$_POST['kmAuto'];
$traccion=$_POST['traccionAuto'];
$combustibleAuto=$_POST['combustibleAuto'];
$colorAuto=$_POST['colorAuto'];
$precioAuto=$_POST['precioAuto'];
$añoCreditoAuto=$_POST['añoCreditoAuto'];
$mensualidadAuto=$_POST['mensualidadAuto'];
$cantidadPuertasdAuto=$_POST['cantidadPuertasdAuto'];
$codigoVehiculo=$_POST['codigoVehiculo'];

$instruccion="UPDATE vehiculos SET marca = '$marcaAuto', linea = '$lineaAuto', tipo = '$tipoAuto',transmision = '$transmisionAuto', modelo = '$modeloAuto', km = '$kmAuto', traccion = '$traccion', combustible = '$combustibleAuto', color= '$colorAuto', precio = '$precioAuto', aniosMinimoCredito = '$añoCreditoAuto', mensualidadAprox = '$mensualidadAuto', cantidad_puertas = '$cantidadPuertasdAuto' WHERE vehiculos.correlativo = $codigoVehiculo";
mysqli_query($conexionB,$instruccion);

header('Location: principal.php');

?>