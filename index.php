<?php
  	include 'admin/php/conexionAutos.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Galería vehiculos</title>
	 <!-- Customize CSS -->
	 <link rel="stylesheet" type="text/css" href="css/vehiculo.css">
  <!-- cdn icnonos-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<div class="container">
	<div class="encabezado">
	
	<img class="icoPrincipal centerI" src="img/logo-intecap.png">

<h2 class="textoPrincipal">Predio Chapín</h2>
<a href="./admin/index.php"><h3 >Iniciar Sesion</h3></a>
</div>

<div></div>

</div>
<div class="row">
<div class="contenedorI">
	
	<?php
        $instruccion="SELECT * FROM vehiculos";
        $resultado=mysqli_query($conexionB,$instruccion);
        $codVehiculo="";
		$codMarca="";
        while ($r=mysqli_fetch_assoc($resultado)) {
            $codVehiculo=$r['correlativo'];
			$codMarca=$r['marca'];
			$instruccionF="SELECT * FROM fotos_autos  where id_vehiculo='$codVehiculo'";
        	$resultadoF=mysqli_query($conexionB,$instruccionF);
			$instruccionM="SELECT * FROM marcas  where id_marcar='$codMarca'";
        	$resultadoM=mysqli_query($conexionB,$instruccionM);
			$id_pintados=array();
			while ($rF=mysqli_fetch_assoc($resultadoF)) {
				$rM=mysqli_fetch_assoc($resultadoM);
				$id_actual=$rF['id_vehiculo'];
				
				if (in_array($id_actual,$id_pintados)) {
					continue;
				}
				$id_pintados[]=$id_actual;
				echo "<div class='col-12'><a href='visualizaVehiculo.php?codVehiculo=".$r['correlativo']."'><img class='imgCarI' src='./admin/".$rF['ubicacion']."'><h4>".$rM['marca']."</h4><h5>".$r['linea']."</h5><h5>".$r['modelo']."</h5></a></div>";
            
            }

		}
    ?>
	
		
	</div>
</div>

	</div>


 <!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>