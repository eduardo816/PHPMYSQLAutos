<?php
$server = "localhost";
$usuario ="root";
$contra="";
$db="autos";

//$conexionA = mysqli_connect($server,$usuario,$contra,$db);
$conexionB = new mysqli($server,$usuario,$contra,$db);
if ($conexionB ->connect_errno) {
   echo "Fallo la conexion".$conexionB ->connect_errno;
}
?>
