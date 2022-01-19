<?php
session_start();
if($_SESSION['empleado'] ==''){
    header("Location:index.php");
}

$_var=$_SESSION['user_name'];
$fechaActual = date('Y-m-d H:i:s');

header('Content-type: application/json; charset=UTF-8');

$response = array();

include("conexion.php");
$con=conectar();



$id_taller=$_POST['delete'];



$sql="DELETE FROM tb_talleres  WHERE id_taller='$id_taller'";
$query=mysqli_query($con,$sql);

//consulta para insertar a la tabla bitacora
     
$sql2 = "INSERT INTO tb_bitacora (evento_bitacora,tabla_bitacora,fecha_bitacora,accion_bitacora,usuario_bitacora) values('Se ha eliminado un registro','tb_talleres','$fechaActual',concat('Registro Eliminado ','$id_taller'),'$_var')";
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

