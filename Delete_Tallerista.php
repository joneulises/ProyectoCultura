
<?php

header('Content-type: application/json; charset=UTF-8');

$response = array();

include("conexion.php");
$con=conectar();



$dui_tallerista=$_POST['delete'];



$sql="DELETE FROM tb_talleristas  WHERE dui_tallerista='$dui_tallerista'";
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



