<?php

header('Content-type: application/json; charset=UTF-8');

$response = array();

include("conexion.php");
$con=conectar();



$dui_ta=$_POST['delete'];



$sql="UPDATE tb_usuario SET estado ='Inactivo' WHERE dui_tallerista ='$dui_ta'";

$query=mysqli_query($con,$sql);

if($query){

$response['status'] = 'success';
$response['message'] = 'Usuario dado de baja correctamente...';
} else {

$response['status'] = 'error';
$response['message'] = 'No se puede dar de baja...';

}
echo json_encode($response);

//Header("Location: Ver_Tallerista.php");

?>

