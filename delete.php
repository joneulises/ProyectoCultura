<?php


    include("conexion.php");
    $con=conectar();

$id_taller=$_GET['id'];



//nfhdhgladfsd



$sql="DELETE FROM tb_talleres  WHERE id_taller='$id_taller'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: prueba.php");
    }
?>
