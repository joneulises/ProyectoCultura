<?php


    include("conexion.php");
    $con=conectar();

$id_sala=$_GET['id'];



//nfhdhgladfsd



$sql="DELETE FROM tb_salas  WHERE id_sala='$id_sala'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: tabla_salas.php");
    }
?>
