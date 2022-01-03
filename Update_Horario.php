<?php

include("conexion.php");
$con=conectar();

if(isset($_POST['update'])) {
    $id = $_GET['id'];

    $dia = $_POST['dia'];
    $hi = $_POST['hora_inicio'];
    $hf = $_POST['hora_fin'];
    $idsala = $_POST['idsala'];
    $idtaller = $_POST['idtaller'];
    $idtallerista = $_POST['idtallerista'];
    

    $sql="UPDATE tb_horarios SET id_horario ='$id',dia ='$dia',hora_inicio ='$hi',hora_fin ='$hf' ,id_sala ='$idsala' ,id_taller ='$idtaller' ,id_tallerista ='$idtallerista' WHERE id_horario ='$id'";
    mysqli_query($con, $sql);
    header("Location: Ver_Horario.php");
} 
?>
