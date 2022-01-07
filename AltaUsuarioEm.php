
<?php

header('Content-type: application/json; charset=UTF-8');

$response = array();

include("conexion.php");
$con=conectar();



$dui_em=$_POST['delete'];



$sql="UPDATE tb_usuario SET estado ='activo' WHERE dui_empleado ='$dui_em'";

$query=mysqli_query($con,$sql);

if($query){

$response['status'] = 'success';
$response['message'] = 'Usuario dado de alta correctamente...';
} else {

$response['status'] = 'error';
$response['message'] = 'No se puede dar de alta...';

}
echo json_encode($response);

//Header("Location: Ver_Tallerista.php");

?>



