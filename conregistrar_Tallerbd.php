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
     if (strlen($_POST['fduracion'])> 0/*strlen($_POST['fnombretaller']) >= 1 && strlen($_POST['ftipo_taller']) >= 1 && strlen($_POST['finicio']) >= 1 
     && strlen($_POST['fduracion']) >= 1 && strlen($_POST['fselec_tallerista']) >= 1 /*&& strlen($_POST['fselec_horariotallerista']) >= 1 
     && strlen($_POST['fdescripcion_taller']) >= 1*/) {

        $fnombretaller = trim($_POST['fnombretaller']);
        $ftipo_taller = $_REQUEST['ftipo_taller'];
        //convierte varchar a date
       // $oldDate = strtotime($_POST['finicio']);
       // $newDate = date('Y-m-d',$time);
       // echo $newDate;
          $finicio = trim($_POST['finicio']);

      
        $fduracion = trim($_POST['fduracion']);
        //$fselec_tallerista = $_REQUEST['fselec_tallerista'];
        //$ffselec_horariotallerista = trim($_POST['fselec_horariotallerista']);
        $fdescripcion_taller = trim($_POST['fdescripcion_taller']);

        $consulta = "INSERT INTO tb_talleres(nombre_taller, descripcion_taller, tipo_taller, fecha_inicio_taller, duracion_taller) VALUES ('$fnombretaller','$fdescripcion_taller','$ftipo_taller','$finicio','$fduracion')";
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
 }
 
 ?>


