
<?php

include("conexion.php");
$con=conectar();


$dui_tallerista=$_GET['dui'];



$sql="DELETE FROM tb_talleristas  WHERE dui_tallerista='$dui_tallerista'";
$query=mysqli_query($con,$sql);

if(!$query){
   // $_SESSION['message'] = 'Este dui esta siendo utilizado por otra tabla';
   //$_SESSION['message_type'] = 'danger';
   die("Este dui esta siendo utilizado por otra tabla");
}

Header("Location: Ver_Tallerista.php");

?>



