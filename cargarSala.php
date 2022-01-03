<?php

include("conexion.php");
$con=conectar();

$id_sala=$_POST['id_sala'];
$nombre_sala=$_POST['fnombresala'];
$comentario_sala=$_POST['fcomentario_sala'];

$sql="UPDATE tb_salas SET nombre_sala='$nombre_sala', comentario_sala='$comentario_sala' WHERE id_sala='$id_sala'";

$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: tabla_salas.php");
    }
?>