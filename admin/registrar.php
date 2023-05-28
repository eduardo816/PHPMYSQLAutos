<!DOCTYPE html>
<html>
<head>
	<title>Registro de usuarios</title>
	<link rel="stylesheet" type="text/css" href="css/loginINTECAP.css">
</head>
<body>
<div class="auxLogin">
	<div class="lateralIzquierdo">
		<img src="img/logo-intecap.png">
	</div>
	<div class="lateralDerecho">
		
		
		<form style="width: 100%" action="agregarUsuario.php" method="POST">
		<svg xmlns="http://www.w3.org/2000/svg" class="iconUser centrar h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
  <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z" />
</svg>
			<h2 class="textoPrincipal">Registro</h2>
		
			<div class="auxCampos">
				
				<div class="auxDetampos"></div>
				<div class="auxDetampos">
			<input class="camposIngreso" type="text" name="nombreColaborador" placeholder="Nombre Colaborador...">
					
			<input class="camposIngreso" type="text" name="us_colaborador" placeholder="Usuario...">

			<input class="camposIngreso" type="password" name="us_contra" placeholder="Contraseña...">
		<button class="camposIngreso btnIniciar">
			<svg style="width: 50px;" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
  <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
</svg></button>

			</div>
			<div class="auxDetampos">
					<button class="camposIngreso btnIniciar"></button>
			</div>
			</div>
			
		
		</form>

	</div>

</div>



</body>
</html>

 

