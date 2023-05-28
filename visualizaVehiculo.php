<?php
   include 'admin/php/conexionAutos.php';
     

    
/*
     $nombreCat="";
     $descripcionCat="";
     $foto="";

     while ($r=mysqli_fetch_assoc($resultado)) {
        $nombreCat=$r['NombreCategoria'];
        $descripcionCat=$r['Descripcion'];
        $foto=$r['ubicacion'];
     }*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Customize CSS -->
	<link rel="stylesheet" type="text/css" href="css/vehiculo.css">
  <!-- cdn icnonos-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="encabezado">
	        <img class="icoPrincipal centerI" src="img/logo-intecap.png">
            <h2 class="textoPrincipal">Predio Chapín</h2>
            <a href="index.php"><h3 >Regresar al Menu</h3></a>
        </div>
    </div>
    <br><br>
    <div class="row">
      <div class="col-6 ">
       
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
               <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
               <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
               <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
              </ol>
              <div class="carousel-inner">
              <?php
         $codigo=$_GET['codVehiculo'];
     
         $instruccion="SELECT * FROM vehiculos WHERE correlativo=$codigo";
         $resultado=mysqli_query($conexionB,$instruccion);
         $marca="";
         $linea="";
         $tipo="";
         $transmision="";
         $modelo="";
         $kilometraje="";
         $traccion="";
         $combustible="";
         $color="";
         $precio="";
         $color="";
         $ejemplo="";
        while ($r=mysqli_fetch_assoc($resultado)) {
            $marca=$r['marca'];
            $linea=$r['linea'];
            $tipo=$r['tipo'];
            $transmision=$r['transmision'];
            $modelo=$r['modelo'];
            $kilometraje=$r['km'];
            $traccion=$r['traccion'];
            $combustible=$r['combustible'];
            $color=$r['color'];
            $precio=$r['precio'];
            $instruccionF="SELECT * FROM fotos_autos  where id_vehiculo='$codigo'";
            $resultadoF=mysqli_query($conexionB,$instruccionF);
            $instruccionC="SELECT * FROM colores  where id_color='$color'";
            $resultadoC=mysqli_query($conexionB,$instruccionC);
            $primer_div=true;
            while ($rF=mysqli_fetch_assoc($resultadoF)) {
              if ( $primer_div) {
                echo "<div class='carousel-item active'>
              <img class='d-block w-100' src='./admin/".$rF['ubicacion']."' alt='First slide'>
              </div>";
              $primer_div=false;
              }else{
                echo "<div class='carousel-item'>
                <img class='d-block w-100' src='./admin/".$rF['ubicacion']."' alt='First slide'>
                </div>";
              }
           
          }
        }
        ?> 
               
              </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                 <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                 <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
            </div>
        <br><br>
        <div class="row ">
        <?php
        $instruccionF="SELECT * FROM fotos_autos  where id_vehiculo='$codigo'";
        $resultadoF=mysqli_query($conexionB,$instruccionF);
        while ($rF=mysqli_fetch_assoc($resultadoF)) {
            echo "<div class='col-3 '>
            <img class='d-block w-100' src='./admin/".$rF['ubicacion']."' alt='First slide'>
            </div>";
        }
         ?> 
        </div>
      </div>
      <div class="col-1"></div>
      <div class="col-4">
       <div class="row">
       <table class="table">
  <caption>Descripcion Vehiculo</caption>
  <thead>
    <tr class="table-active">
      <th scope="col">Caracteristica</th>
      <th scope="col"></th>
      <th scope="col">Descripcion</th>
    </tr>
  </thead>
  <tbody>
    <tr class="table-primary">
      <td>Marca</td>
      <td></td>
      <td><?php echo $marca?></td>
    </tr>
    <tr>
      <td>Linea</td>
      <td></td>
      <td><?php echo $linea?></td>
    </tr>
    <tr class="table-primary">
      <td>Tipo</td>
      <td></td>
      <td><?php echo $tipo?></td>
    </tr>
    <tr>
      <td>transmision</td>
      <td></td>
      <td><?php echo $transmision?></td>
    </tr>
    <tr class="table-primary">
      <td>Modelo</td>
      <td></td>
      <td><?php echo $modelo?></td>
    </tr>
    <tr>
      <td>Kilometraje</td>
      <td></td>
      <td><?php echo $kilometraje?> km</td>
    </tr>
    <tr class="table-primary">
      <td>Traccion</td>
      <td></td>
      <td><?php echo $traccion?></td>
    </tr>
    <tr>
      <td>Combustible</td>
      <td></td>
      <td><?php echo $combustible?></td>
    </tr>
    <tr class="table-primary">
      <td>Color</td>
      <td></td>
      <td><?php echo $color?></td>
    </tr>
    <tr>
      <td>Precio</td>
      <td></td>
      <td>Q.<?php echo $precio?>.00</td>
    </tr>
  </tbody>
</table>
       </div>
      </div>
    </div>
</div>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
