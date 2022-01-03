<?php

include("conexion.php");
$con=conectar();

$id_taller=$_POST['id_taller'];
$nombre_taller=$_POST['nombre_taller'];
$descripcion_taller=$_POST['descripcion_taller'];
$tipo_taller=$_POST['tipo_taller'];
$fecha_inicio_taller=$_POST['fecha_inicio_taller'];
$duracion_taller=$_POST['duracion_taller'];

#$cod_estudiante=$_POST['cod_estudiante'];
#$dni=$_POST['dni'];
#$nombres=$_POST['nombres'];
#$apellidos=$_POST['apellidos'];

$sql="UPDATE tb_talleres SET id_taller='$id_taller',nombre_taller='$nombre_taller',descripcion_taller='$descripcion_taller',tipo_taller='$tipo_taller',fecha_inicio_taller='$fecha_inicio_taller',duracion_taller='$duracion_taller' WHERE id_taller='$id_taller'";

$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: prueba.php");
    }
?>