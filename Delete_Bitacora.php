<?php

header('Content-type: application/json; charset=UTF-8');

$response = array();

include("conexion.php");
$con=conectar();



$id_bitacora=$_POST['delete'];



$sql="DELETE FROM tb_bitacora  WHERE id_bitacora='$id_bitacora'";
$query=mysqli_query($con,$sql);

if($query){

$response['status'] = 'success';
$response['message'] = 'Registro eliminado correctamente...';
} else {

$response['status'] = 'error';
$response['message'] = 'No se puede eliminar el registro ...';

}
echo json_encode($response);

//Header("Location: Ver_Tallerista.php");

?>



