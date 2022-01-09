<?php

header('Content-type: application/json; charset=UTF-8');

$response = array();

include("conexion.php");
$con=conectar();



$id_horario=$_POST['delete'];



$sql="DELETE FROM tb_horarios  WHERE id_horario='$id_horario'";
$query=mysqli_query($con,$sql);

if($query){

$response['status'] = 'success';
$response['message'] = 'Registro eliminado correctamente...';
} else {

$response['status'] = 'error';
$response['message'] = 'No se puede eliminar el registro ...';

}
echo json_encode($response);


?>





