<?php  
//ver sesion iniciada
session_start();
//destruye la sesion
session_destroy();

header('location: index.php');
?>