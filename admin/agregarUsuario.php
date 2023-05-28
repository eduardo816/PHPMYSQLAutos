<?php
include 'php/conexionAutos.php';
//antes validar si el nombreColaborador y us_colaborador existen en la base de datos para agregarlos
$nombreColaborador=$_POST['nombreColaborador'];
$us_colaborador=$_POST['us_colaborador'];
$us_contra=password_hash($_POST['us_contra'],PASSWORD_DEFAULT);

$instruccion="INSERT INTO usuarios (idUser, Nombre, usuario, pass) VALUES (NULL, '$nombreColaborador', '$us_colaborador', '$us_contra')";

mysqli_query($conexionB, $instruccion);

header("location: index.php");

?>