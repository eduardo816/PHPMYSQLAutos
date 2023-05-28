<?php
include 'php/conexionAutos.php';

$codigo=$_GET['codVehiculo'];

$instruccion="DELETE FROM vehiculos WHERE vehiculos.correlativo=$codigo";

$resultado=mysqli_query($conexionB,$instruccion);


header('Location: principal.php');

?>