<?php
    include 'php/conexionAutos.php';
     $codigo=$_GET['codVehiculo'];
     $instruccion="SELECT * FROM vehiculos WHERE correlativo=$codigo";
     $resultado=mysqli_query($conexionB,$instruccion);

     $marca="";
     $linea="";
     $tipo="";
     $transmision="";
     $modelo="";
     $km="";
     $traccion="";
     $combustible="";
     $color="";
     $precio="";
     $aniosMinimoCredito="";
     $mensualidadAprox="";
     $cantidad_puertas="";

     while ($r=mysqli_fetch_assoc($resultado)) {
        $marca=$r['marca'];
        $linea=$r['linea'];
        $tipo=$r['tipo'];
        $transmision=$r['transmision'];
        $modelo=$r['modelo'];
        $km=$r['km'];
        $traccion=$r['traccion'];
        $combustible=$r['combustible'];
        $color=$r['color'];
        $precio=$r['precio'];
        $aniosMinimoCredito=$r['aniosMinimoCredito'];
        $mensualidadAprox=$r['mensualidadAprox'];
        $cantidad_puertas=$r['cantidad_puertas'];
     }
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
  <br><br><br>
  <center>
    <div class="col-sm-8 bg-info contenido ">
    <br>
    <h1 class="modal-title fs-5" id="editaModalLabel">Registro de Vehículos</h1>
                <!-- el enctype prepara el formulario recibir documentos -->
              <form action="actualizarVehiculo.php" method="post" enctype="multipart/form-data">
                  <input type="hidden" value="<?php echo $codigo;?>" name="codigoVehiculo">
                    <div class="mb-2">
                      <select class="form-control form-control-sm" name="marcaAuto" id=""  >
                      <?php
                        $instruccion="SELECT * FROM marcas";
                        $resultado=mysqli_query($conexionB,$instruccion);
                        while ($r=mysqli_fetch_assoc($resultado)) {
                          if ($r['id_marcar']==$marca) {
                            echo " <option value='".$r['id_marcar']."' selected>".$r['marca']."</option>";
                              }else{
                                echo " <option value='".$r['id_marcar']."'>".$r['marca']."</option>";
                              }
                              }
                        ?>
                      </select>
                    </div> 
                    <div class="mb-2">
                       <input type="text" name="lineaAuto" id="" class="form-control form-control-sm" placeholder="linea" value="<?php echo $linea;?>" required>
                    </div>
                    <div class="mb-2">
                      <select class="form-control form-control-sm" name="tipoAuto" id=""  reqired>
                        <?php
                           $instruccion="SELECT * FROM tipo_vehiculo";
                           $resultado=mysqli_query($conexionB,$instruccion);
                           while ($r=mysqli_fetch_assoc($resultado)) {
                            if ($r['id_tipo']==$tipo) {
                           echo " <option value='".$r['id_tipo']."' selected>".$r['tipo']."</option>";
                          }else{
                            echo " <option value='".$r['id_tipo']."' selected>".$r['tipo']."</option>";
                          }
                        }
                        ?>
                      </select>
                    </div> 
                    <div class="mb-2">
                      <select class="form-control form-control-sm" name="transmisionAuto" id=""  required>
                        <?php
                        $instruccion="SELECT * FROM transmision";
                        $resultado=mysqli_query($conexionB,$instruccion);
                        while ($r=mysqli_fetch_assoc($resultado)) {
                          if ($r['id_transmicion']==$transmision) {
                            echo " <option value='".$r['id_transmicion']."' selected>".$r['transmision']."</option>";
                          }else {
                            echo " <option value='".$r['id_transmicion']."'>".$r['transmision']."</option>";
                          }
                        }
                        ?>
                      </select>
                    </div> 
                    <div class="mb-2">
                       <input type="text" name="modeloAuto" id="" class="form-control form-control-sm" placeholder="Modelo" value="<?php echo $modelo;?>"  required>
                    </div>
                    <div class="mb-2">
                       <input type="text" name="kmAuto" id="" class="form-control form-control-sm" placeholder="Km" value="<?php echo $km;?>" required>
                    </div>
                    <div class="mb-2">
                      <select class="form-control form-control-sm" name="traccionAuto" id=""  >
                        <?php
                            $instruccion="SELECT * FROM traccion";
                            $resultado=mysqli_query($conexionB,$instruccion);
                            while ($r=mysqli_fetch_assoc($resultado)) {
                              if ($r['id_traccion']==$traccion) {
                                 echo " <option value='".$r['id_traccion']."' selected>".$r['traccion']."</option>";
                                }else {
                                  echo " <option value='".$r['id_traccion']."'>".$r['traccion']."</option>";
                                }
                              }
                       ?>
                      </select>
                    </div> 
                    <div class="mb-2">
                      <select class="form-control form-control-sm" name="combustibleAuto" id=""  >
                        <?php
                             $instruccion="SELECT * FROM combustible";
                             $resultado=mysqli_query($conexionB,$instruccion);
                             while ($r=mysqli_fetch_assoc($resultado)) {
                              if ($r['id_combustible']==$combustible) {
                             echo " <option value='".$r['id_combustible']."' selected>".$r['combustible']."</option>";
                            }else {
                              echo " <option value='".$r['id_combustible']."'>".$r['combustible']."</option>";
                            }
                          }
                        ?>
                      </select>
                    </div> 
                    <div class="mb-2">
                      <select class="form-control form-control-sm" name="colorAuto" id=""  >
                        <?php
                            $instruccion="SELECT * FROM colores";
                            $resultado=mysqli_query($conexionB,$instruccion);
                            while ($r=mysqli_fetch_assoc($resultado)) {
                              if ($r['id_colo']==$color) {
                            echo " <option value='".$r['id_color']."' selected>".$r['color']."</option>";
                          }else {
                            echo " <option value='".$r['id_color']."' selected>".$r['color']."</option>";
                          }
                          }
                        ?>
                      </select>
                    </div> 
                    <div class="mb-2">
                       <input type="text" name="precioAuto" id="precioAuto" class="form-control form-control-sm" value="<?php echo $precio;?>" placeholder="Precio"  required>
                    </div>
                    <div class="mb-2">
                       <input type="text" name="añoCreditoAuto" id="cantidadaños" class="form-control form-control-sm" value="<?php echo $aniosMinimoCredito;?>" placeholder="Años Mínimo Crédito"  required>
                    </div>
                    <div class="mb-2 " >
                      <center> <a  href="#" onclick="calcularMensualidad()"><i class="bi bil bi-calculator-fill" ></i></a></center>
                    </div>
                    <script>
                      function calcularMensualidad(){
                        let cantidad=document.getElementById("cantidadaños").value;
                        let interes=Number(cantidad)*8;
                        let interesMonetario=(interes/100)*Number(document.getElementById("precioAuto").value);
                        let valorFinal=interesMonetario+Number(document.getElementById("precioAuto").value);
                        let meses=Number(document.getElementById("cantidadaños").value)*12;
                        let mensualidad=valorFinal/meses;
                        document.getElementById("mensualidadRecomendada").value=mensualidad;
                        return mensualidad;
                      }
                    </script>
                    <div class="mb-2">
                       <input type="text" name="mensualidadAuto" id="mensualidadRecomendada" value="" class="form-control form-control-sm" value="<?php echo $mensualidadAprox;?>" placeholder="Mensualidad Recomendada"  required>
                    </div>
                    <div class="mb-2">
                       <input type="text" name="cantidadPuertasdAuto" id="" class="form-control form-control-sm" value="<?php echo $cantidad_puertas;?>" placeholder="Cantidad de Puertas"  required>
                    </div>
                    <div class="mb-2">
                       
                          <div class="col">
                            <!-- el atributo multiple es para adjuntar varias fotos -->
                            <input type="file" name="fotos[]" multiple="">
                           
                          </div>
                          <div class="col">
                            <p>No se ha seleccionado ningun archivo</p>
                          </div>
                          <div class="col">
                          <button type="submit" class="btn btn-danger ms-1"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
                          </div>
                        
                    </div>                 
                </form>
        <br>
    </div>
  </center>
</div>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>


