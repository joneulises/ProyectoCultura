<?php
 /*$fnombtaller = $_POST['fnombtaller'];
 $ftipo_taller = $_POST['ftipo_taller'];
 $finicio = $_POST['finicio'];
 $fduracion = $_POST['fduracion'];
 $fselec_tallerista = $_POST['fselec_tallerista'];
 $ffselec_horariotallerista = $_POST['fselec_horariotallerista'];
 $fdescripcion_taller = $_POST['fdescripcion_taller'];*/



 include("con_db.php");

 
 
 if (isset($_POST['btnregistrar'])) {
     

        $fnombresala = trim($_POST['fnombresala']);
        $fcomentario_sala = trim($_POST['fcomentario_sala']);

        $consulta = "INSERT INTO `tb_salas`(`nombre_sala`, `comentario_sala`) VALUES ('$fnombresala','$fcomentario_sala')";
        $resultado = mysqli_query($conex,$consulta);   
        
         if ($resultado) {
             ?> 
             <h3 class="ok">¡Se guardo el taller correctamente!</h3>
            <?php
         } else {
             ?> 
             <h3 class="bad">¡Ups ha ocurrido un error!</h3>
            <?php
         }
     }   else {
             ?> 
             <h3 class="bad">¡Por favor complete los campos!</h3>
            <?php
     
 }
 
 ?>


