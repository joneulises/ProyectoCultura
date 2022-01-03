<?php

    include("conexion.php");
    $con=conectar();

$id_horario=$_GET['id'];




$sql="DELETE FROM tb_horarios  WHERE id_horario='$id_horario'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: Ver_Horario.php");
    }
?>
