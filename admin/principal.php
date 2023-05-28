<?php
  include 'php/conexionAutos.php';
  //colocar este fragmento de codigo en cada archivo cuando se guarda algo se continua con la sesion
  //continuar sesion
	session_start();
// verificar si el usuario esta validado o activo
  if(!isset($_SESSION['usuarioValidado'])){
    header('location: index.php');
    die();
  }
  //cerrar sesion
    
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
<div class="container-fluid">
    <div class="encabezado">
    <img class="icoPrincipal" src="img/logo-intecap.png">

      <h2 class="textoPrincipal">Galería de vehiculos</h2>
      <a href="#" data-toggle="modal" data-target="#agregarVehiculoModal" >
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 btnMenu">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
      </a>

      <a href="cerrarSesion.php">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 btnMenu">
        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
        </svg>
      </a>
    </div>

    <h2 class="textoAuxiliar">Bienvenido <?php  echo  $_SESSION['nombreCompleto'] ?> </h2>
    <!-- TABLE -->
    <div class="row">
        <script>
          function mostrarModal(){
          var respuesta=confirm("¿Desea realmente borrar el registro?");
          if (respuesta==true) {
             return true;
            } else {
              return false;
            }
          }
        </script>
      <div class="col-sm-12">
    
        <div class="container-fluid">
          
          <table class="table">
            <thead class="thead bg-primary">
              <tr>
                <th>Marca</th>
                <th>Línea</th>
                <th>Modelo</th>
                <th>Color</th>
                <th>Eliminar</th>
                <th>Editar</th>
              </tr>
            </thead>
            <tbody  class="table-warning" >
              <?php
                $instruccion="SELECT * FROM vehiculos";
                $resultado=mysqli_query($conexionB,$instruccion);
  
                while ($r=mysqli_fetch_assoc($resultado)) {
                  echo "<tr><td>".$r['marca']."</td><td>".$r['linea']."</td><td>".$r['modelo']."</td><td>".$r['color']."</td><td><a class='text-danger' onclick='return mostrarModal()' href='borrarVehiculo.php?codVehiculo=".$r['correlativo']."'><i class='bi bi-trash'></i></a></td><td><a class='text-success' href='formActualizarVehiculo.php?codVehiculo=".$r['correlativo']."'><i class='bi bi-pencil-fill'></i></a></td></tr>";
                }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="agregarVehiculoModal" tabindex="-1" aria-labelledby="editaModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editaModalLabel">Registro de Vehículos</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <!-- el enctype prepara el formulario recibir documentos -->
              <form action="registrarVehiculo.php" method="POST" enctype="multipart/form-data">
                  <input type="hidden" id="id" name="id">
                    <div class="mb-2">
                      <select class="form-control form-control-sm" name="marcaAuto" id=""  required>
                        <?php
                        $instruccion="SELECT * FROM marcas";
                        $resultado=mysqli_query($conexionB,$instruccion);
                        while ($r=mysqli_fetch_assoc($resultado)) {
                        echo " <option value='".$r['id_marcar']."'>".$r['marca']."</option>";}
                        ?>
                      </select>
                    </div> 
                    <div class="mb-2">
                       <input type="text" name="lineaAuto" id="" class="form-control form-control-sm" placeholder="linea"  required>
                    </div>
                    <div class="mb-2">
                      <select class="form-control form-control-sm" name="tipoAuto" id=""  required>
                        <?php
                        $instruccion="SELECT * FROM tipo_vehiculo";
                        $resultado=mysqli_query($conexionB,$instruccion);
                        while ($r=mysqli_fetch_assoc($resultado)) {
                        echo " <option value='".$r['id_tipo']."'>".$r['tipo']."</option>";}
                        ?>
                      </select>
                    </div> 
                    <div class="mb-2">
                      <select class="form-control form-control-sm" name="transmisionAuto" id=""  required>
                        <?php
                        $instruccion="SELECT * FROM transmision";
                        $resultado=mysqli_query($conexionB,$instruccion);
                        while ($r=mysqli_fetch_assoc($resultado)) {
                        echo " <option value='".$r['id_transmicion']."'>".$r['transmision']."</option>";}
                        ?>
                      </select>
                    </div> 
                    <div class="mb-2">
                       <input type="text" name="modeloAuto" id="" class="form-control form-control-sm" placeholder="Modelo"  required>
                    </div>
                    <div class="mb-2">
                       <input type="text" name="kmAuto" id="" class="form-control form-control-sm" placeholder="Km"  required>
                    </div>
                    <div class="mb-2">
                      <select class="form-control form-control-sm" name="traccionAuto" id=""  required>
                        <?php
                        $instruccion="SELECT * FROM traccion";
                        $resultado=mysqli_query($conexionB,$instruccion);
                        while ($r=mysqli_fetch_assoc($resultado)) {
                        echo " <option value='".$r['id_traccion']."'>".$r['traccion']."</option>";}
                        ?>
                      </select>
                    </div> 
                    <div class="mb-2">
                      <select class="form-control form-control-sm" name="combustibleAuto" id=""  required>
                        <?php
                        $instruccion="SELECT * FROM combustible";
                        $resultado=mysqli_query($conexionB,$instruccion);
                        while ($r=mysqli_fetch_assoc($resultado)) {
                        echo " <option value='".$r['id_combustible']."'>".$r['combustible']."</option>";}
                        ?>
                      </select>
                    </div> 
                    <div class="mb-2">
                      <select class="form-control form-control-sm" name="colorAuto" id=""  required>
                        <?php
                        $instruccion="SELECT * FROM colores";
                        $resultado=mysqli_query($conexionB,$instruccion);
                        while ($r=mysqli_fetch_assoc($resultado)) {
                        echo " <option value='".$r['id_color']."'>".$r['color']."</option>";}
                        ?>
                      </select>
                    </div> 
                    <div class="mb-2">
                       <input type="text" name="precioAuto" id="precioAuto" class="form-control form-control-sm" placeholder="Precio"  required>
                    </div>
                    <div class="mb-2">
                       <input type="text" name="añoCreditoAuto" id="cantidadaños" class="form-control form-control-sm" placeholder="Años Mínimo Crédito"  required>
                    </div>
                    <div class="mb-2 " >
                      <center> <a  href="#" onclick="calcularMensualidad()"><i class="bi bil bi-calculator-fill" ></i></a></center>
                    </div>
                    <script>
                      function calcularMensualidad(){
                        let cantidad=document.getElementById("cantidadaños").value;
                        let interes=Number(cantidad)*8;
                        let interesMonetario=(interes/100)*Number(document.getElementById("precioAuto").value);
                        console.log(interes);
                        let valorFinal=interesMonetario+Number(document.getElementById("precioAuto").value);
                        let meses=Number(document.getElementById("cantidadaños").value)*12;
                        let mensualidad=valorFinal/meses;
                        document.getElementById("mensualidadRecomendada").value=mensualidad;
                        return mensualidad;
                      }
                    </script>
                    <div class="mb-2">
                       <input type="text" name="mensualidadAuto" id="mensualidadRecomendada" value="" class="form-control form-control-sm" placeholder="Mensualidad Recomendada"  required>
                    </div>
                    <div class="mb-2">
                       <input type="text" name="cantidadPuertasdAuto" id="" class="form-control form-control-sm" placeholder="Cantidad de Puertas"  required>
                    </div>
                    <div class="mb-2">
                       
                          <div class="col">
                            <!-- el atributo multiple es para adjuntar varias fotos -->
                            <input type="file" name="fotos[]" multiple="">
                            <p>No se ha seleccionado ningun archivo</p>
                            <button type="submit" class="btn btn-primary ms-1"> Guardar</button>
                          </div>
                    </div>                 
                </form>
            </div>

        </div>
    </div>
    <!-- END Modal -->

    
</div>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>