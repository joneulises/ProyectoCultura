<?php

include("conexion.php");
$con=conectar();

if(isset($_POST['update'])) {
    $dui = $_GET['dui'];

    $nombret  = $_POST['nombre'];
    $apellidot = $_POST['apellido'];
    $sexot = $_POST['sexo_tallerista'];
    $f_n = $_POST['fecha_n'];
    $f_c = $_POST['fecha_c'];
    $direc = $_POST['direccion'];
    $idcanton= $_POST['idcanton'];
    $telefono= $_POST['telefono'];

    $sql="UPDATE tb_talleristas SET dui_tallerista ='$dui',nombre_tallerista ='$nombret',apellido_tallerista ='$apellidot',sexo_tallerista ='$sexot' ,fecha_nacimiento_tallerista ='$f_n' ,fecha_contrato_tallerista ='$f_c' ,direccion_tallerista ='$direc',id_canton ='$idcanton',telefono ='$telefono' WHERE dui_tallerista='$dui'";
    mysqli_query($con, $sql);
    header("Location: Ver_Tallerista.php");
} 
?>