<?php  

include("con_db.php");

  

if (isset($_POST['registrar'])){
  
 
   $dui = $_POST['dui'];
   $nombre = $_POST['nombre'];
   $apellido = $_POST['apellido'];
   $sexo = $_POST['sexo_tallerista'];
   $fecha_n = $_POST['fecha_n'];
   $fecha_c = $_POST['fecha_c'];
   $direccion = $_POST['direccion'];
   $idcanton = $_POST['idcanton'];
   $telefono = $_POST['telefono'];


  $query = "INSERT INTO tb_talleristas(dui_tallerista, nombre_tallerista,apellido_tallerista,sexo_tallerista,fecha_nacimiento_tallerista,fecha_contrato_tallerista,direccion_tallerista,
   id_canton ,telefono) VALUES ('$dui','$nombre','$apellido','$sexo','$fecha_n','$fecha_c','$direccion','$idcanton','$telefono')";
   $resultado = mysqli_query($conex,$query);

   if(!$resultado){
           die("Este DUI ya está siendo ocupado!");
       }
         /* echo "registro Guardado";*/ 
         header("Location: Ver_Tallerista.php");
}

 /* echo $dui ;
    echo $nombre;
   echo $apellido;
   echo  $sexo ;
   echo  $fecha_n ;
   echo  $fecha_c;
   echo  $direccion ;
    echo $idcanton ;*/










?>









 