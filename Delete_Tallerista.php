
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



$dui_tallerista=$_POST['delete'];



$sql="DELETE FROM tb_talleristas  WHERE dui_tallerista='$dui_tallerista'";
$query=mysqli_query($con,$sql);

 //consulta para insertar a la tabla bitacora
     
 $sql2 = "INSERT INTO tb_bitacora (evento_bitacora,tabla_bitacora,fecha_bitacora,accion_bitacora,usuario_bitacora) values('Se ha eliminado un registro','tb_talleristas','$fechaActual',concat('Registro Eliminado ','$dui_tallerista'),'$_var')";
 mysqli_query($con, $sql2);
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



