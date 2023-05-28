<?php

if ($_SERVER["REQUEST_METHOD"]=="POST") {
	include 'php/conexionAutos.php';

	$us_colaborador=$_POST['us_colaborador'];
    $us_contra=$_POST['us_contra'];

	$instruccion="SELECT *FROM usuarios WHERE usuario='$us_colaborador'";

	$resultado=mysqli_query($conexionB,$instruccion);

	$contador=mysqli_num_rows($resultado);
//validar si existe una resultado que coincida con el nombre de usuario
	if ($contador==1) {
		$r=mysqli_fetch_array($resultado,MYSQLI_ASSOC);
 //validar si el pass es correcto con el usuario validado
		if (password_verify($us_contra,$r['pass'])) {
			session_start();
//crear supervariables a la cuales se puede acceder desde cualquier archivo php siempre que la variable sesion este iniciada
			$_SESSION['usuarioValidado']=$us_colaborador; 
			$_SESSION['nombreCompleto']=$r['Nombre'];
			header("location: principal.php");

		}
	}

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Administración Vehiculos</title>
	<link rel="stylesheet" type="text/css" href="css/loginINTECAP.css">
	
  <!-- cdn icnonos-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div class="auxLogin">
	<div class="lateralIzquierdo">
		<img src="img/logo-intecap.png"> <br><br>
		
	</div>
	<div class="lateralDerecho">
	<a href="../index.php"><h3 class="textAuxiliar" >Regresar al menu principal</h3></a>
		
		<form style="width: 100%" action="" method="POST">
			<svg xmlns="http://www.w3.org/2000/svg" class="iconUser centrar h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
  <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
</svg>
				<h2 class="textoPrincipal">Credenciales</h2>
		
			<div class="auxCampos">
				
				<div class="auxDetampos"></div>
				<div class="auxDetampos">
					
			<input class="camposIngreso" type="text" name="us_colaborador" placeholder="Usuario...">

			<input class="camposIngreso" type="password" name="us_contra" placeholder="Contraseña...">
<a href="registrar.php">
			<svg style="width: 50px;" xmlns="http://www.w3.org/2000/svg" class="iconUser centrar h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
  <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z" />
</svg>
			</a>

			</div>
			<div class="auxDetampos">
					<button class="camposIngreso btnIniciar"><svg style="width: 50px;" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
  <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd" />
</svg>
</button>
			</div>
			</div>
			
		
		</form>

	</div>

</div>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</body>
</html>

 

