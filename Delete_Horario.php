<?php

header('Content-type: application/json; charset=UTF-8');

$response = array();

include("conexion.php");
$con=conectar();



$id_horario=$_POST['delete'];



$sql="DELETE FROM tb_horarios  WHERE id_horario='$id_horario'";
$query=mysqli_query($con,$sql);
//consulta para insertar a la tabla bitacora
     
$sql2 = "INSERT INTO tb_bitacora (evento_bitacora,tabla_bitacora,fecha_bitacora,accion_bitacora,usuario_bitacora) values('Se ha eliminado un registro','tb_talleristas','$fechaActual',concat('Registro Eliminado ','$id_horario'),'$_var')";
mysqli_query($con, $sql2);


if($query){

$response['status'] = 'success';
$response['message'] = 'Registro eliminado correctamente...';
} else {

$response['status'] = 'error';
$response['message'] = 'No se puede eliminar el registro ...';

}
echo json_encode($response);


?>





