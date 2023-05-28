<?php


include 'php/conexionAutos.php';


$marcaAuto=$_POST['marcaAuto'];
$lineaAuto=$_POST['lineaAuto'];
$tipoAuto=$_POST['tipoAuto'];
$transmisionAuto=$_POST['transmisionAuto'];
$modeloAuto=$_POST['modeloAuto'];
$kmAuto=$_POST['kmAuto'];
$traccion=$_POST['traccionAuto'];
$combustibleAuto=$_POST['combustibleAuto'];
$colorAuto=$_POST['colorAuto'];
$precioAuto=$_POST['precioAuto'];
$añoCreditoAuto=$_POST['añoCreditoAuto'];
$mensualidadAuto=$_POST['mensualidadAuto'];
$cantidadPuertasdAuto=$_POST['cantidadPuertasdAuto'];

$instruccion="INSERT INTO vehiculos (correlativo, marca, linea, tipo, transmision, modelo, km, traccion, combustible, color, precio, aniosMinimoCredito, mensualidadAprox, cantidad_puertas) VALUES (NULL, '$marcaAuto', '$lineaAuto', '$tipoAuto','$transmisionAuto', '$modeloAuto', '$kmAuto','$traccion', '$combustibleAuto', '$colorAuto','$precioAuto', '$añoCreditoAuto', '$mensualidadAuto',  '$cantidadPuertasdAuto' )";
mysqli_query($conexionB,$instruccion);

$codigoVehiculo=mysqli_insert_id($conexionB);

echo "Este es el codigo del".$codigoVehiculo." vehicul";

//verificar el espacio en el servidor de TIPO FILES...
//lo realizaremos por medio de un ciclo FOREACH....
foreach($_FILES["fotos"]["tmp_name"] as $key=> $tmp_name){
    //RECOPILANDO NOMBRE ORIGINAL DE LA FOTO....
    $nombreImagen=$_FILES["fotos"]["name"][$key];
    //recopilando ubicacion actua-temporal de la foto.
    $ubicacion=$_FILES["fotos"]["tmp_name"][$key];
    //preparando ruta de salida....
    $directorio="img/fotosPrueba/";
    //procedemos a verificar que este el directorio...
    //NEGAMOS LA EXPRESION FILEEXIST.....PARA EVITAR DEJAR VACIO LA PARTE AFIRMATIVA DEL IF....
    if (!file_exists($directorio)) {
         //si no existe procedemos a crearlo....
         mkdir($directorio,0777)or die("No logramos crear carpeta");
    } 

    //LUEGO DE VERIFICAR A ESTE PUNTO YA DEBE EXISTIR LA CARPETA....
    //procedemos a abrirla...
    $dir=opendir($directorio);
    //construyendo la ruta final de la imagen
    $ubicacionFinal=$directorio.$nombreImagen;
    //procedemos a mover la foto al servidor....
    
    //validamos con if que mueva la foto....
    if (move_uploaded_file($ubicacion,$ubicacionFinal)) {
        echo"se movio con exito";
        include 'php/conexionAutos.php';
        $instruccion="INSERT INTO fotos_autos (correlativo, id_vehiculo, ubicacion) VALUES (NULL, '$codigoVehiculo', '$ubicacionFinal');";
       mysqli_query($conexionB,$instruccion);

    } else {
        echo"ERROR, INTENTE DE NUEVO";
    }
    closedir($dir);
}


header('Location: principal.php');

?>