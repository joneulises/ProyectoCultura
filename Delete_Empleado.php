
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



$dui_empleado=$_POST['delete'];



$sql="DELETE FROM tb_empleados  WHERE dui_empleado='$dui_empleado'";
$query=mysqli_query($con,$sql);

 //consulta para insertar a la tabla bitacora
     
 $sql2 = "INSERT INTO tb_bitacora (evento_bitacora,tabla_bitacora,fecha_bitacora,accion_bitacora,usuario_bitacora) values('Se ha eliminado un registro','tb_empleados','$fechaActual',concat('Registro Eliminado ','$dui_empleado'),'$_var')";
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



