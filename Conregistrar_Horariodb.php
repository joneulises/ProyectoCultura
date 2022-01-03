<?php  

include("con_db.php");

  

if (isset($_POST['registrar'])){
  
 
   $dia = $_POST['dia'];
   $hora_inicio = $_POST['hora_inicio'];
   $hora_fin = $_POST['hora_fin'];
   $idsala = $_POST['idsala'];
   $idtaller = $_POST['idtaller'];
   $idtallerista = $_POST['idtallerista'];
  

  $query = "INSERT INTO tb_horarios(dia, hora_inicio, hora_fin, id_sala, id_taller, id_tallerista) VALUES ('$dia','$hora_inicio','$hora_fin','$idsala','$idtaller','$idtallerista')";
   $resultado = mysqli_query($conex,$query);
   
   if(!$resultado){
           die("Complete los campos");
       }
        /*echo "<script> swal({
         title: '¡ERROR!',
         text: 'Esto es un mensaje de error',
         type: 'error',
       });</script>";*/
       
        // echo "registro Guardado";
     header("Location: Ver_Horario.php");
        
  

      }



    





  /*  echo $dia ;
    echo $hora_inicio;
   echo $hora_fin;
   echo  $idsala;
   echo  $idtaller ;
   echo  $idtallerista;*/




?>










 