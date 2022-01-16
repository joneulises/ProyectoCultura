<?php

session_start();
if($_SESSION['empleado'] ==''){
    header("Location:index.php");
}
$_var=$_SESSION['user_name'];
$fechaActual = date('Y-m-d H:i:s');

include("con_db.php");
$con = conectar();

if(isset($_GET['dui'])){
    $dui=$_GET['dui'];

    $sql = "SELECT * FROM tb_usuario WHERE dui_tallerista='$dui'";
    $resultado = mysqli_query($con, $sql);
    if(mysqli_num_rows($resultado) == 1){
      //   echo 'ya estoy modifiacndo';
      $row = mysqli_fetch_array($resultado);
      $user = $row['user'];
      $dui_tallerista= $row['dui_tallerista'];
      $correo= $row['correo'];
      
    }


    


}



include_once("./Plantilla/cabezera.php");
include_once("./Plantilla/menuAdministrador.php");
?>

<style>
.text-success {
    color: #28a745;
}
.text-danger {
    color: #dc3545;
}

</style>

<!--**********************************
            Content body start
        ***********************************-->
<div id="content" class="bg-grey w-100">
    <div class="content-body">


        <div class="container">
            <!-- <div class="row">-->
            <div class="tab-content">
                <div class="col-sm-12">
                    <div class="item-wrap">
                        <div class="row">

                            <div class="col-sm-10">
                                <div class="item-content colBottomMargin">
                                    <div class="item-info">
                                        <h2 class="item-title text-center">Modificar Usuario Tallerista</h2>

                                    </div>
                                    <!--Termina item-info-->

                                </div>
                                <!--Termina item-content colBottomMargin-->

                            </div>
                            <!--Termina col-sm-10-->

                            <div class="col-md-12">

                                <!--COMIENZA FORMULARIO____________________*****************************************************************___________ -->

                                <form class="popup-form" action="" method="POST"  id="contactForm" name="contactform" data-toggle="validator">
                                    <div class="row">
                                        <div id="msgContactSubmit" class="hidden"></div>
                                       
                                          <input type="hidden" name="dui_tallerista" value="<?php echo $dui_tallerista;  ?>">

                                        <div class="col-md-6">
                                            <label>Nombre de usuario</label>
                                            <div class="form-group">

                                                <input type="text" autocomplete="off" name="usuario" class="form-control" placeholder="usuario"  value="<?php echo $user; ?>" />
                                                <div class="textarea input-group-icon"><i class="fa fa-pencil"></i></div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label>Correo electrónico</label>
                                            <div class="form-group">

                                                <input type="email" autocomplete="off" name="correo" class="form-control" pattern=".+@gmail\.com" value="<?php echo $correo; ?>"/>
                                                <div class="textarea input-group-icon"><i class="fa fa-envelope-o"></i></div>
                                            </div>
                                        </div>

                                       


                                        <div class="form-group last col-sm-12">
                                        <input type="submit" name="update" value="Actualizar" class="btn btn-custom" class="fa fa-save">
                                            <!--	<button type="submit" id="submit" class="btn btn-custom"><em class="fa fa-save"></em> Registrar</button>-->
                                            <button type="reset" id="reset" class="btn btn-custom"><em class="fa fa-ban"></em>Cancelar</a></button>

                                        </div><!-- end form-group -->



                                        <div class="clearfix"></div>
                                    </div><!-- end row -->



                                </form><!-- end form -->


                                <!--TERMINA FORMULARIO_______________*****************-->


                            </div>
                            <!--Termina col-md-12 antes de entrar al formulario-->

                        </div>
                        <!--Termina row-->

                    </div>
                    <!--Termina item-wrap-->

                </div>
                <!--Termina col-sm-12-->

            </div>
            <!--Termina tab-content-->

            <!--</div>   row-->

        </div>
        <!--Termina conteiner-->

    </div>
    <!--Termina content-body-->

</div>
<!--Termina content-->

<!--**********************************
            Content body end
        ***********************************-->



<?php


include_once("./Plantilla/footer.php");
include_once("./Plantilla/seccionScript.php");
?>


<?php
//TODO EL CODIGO PARA ACTUALIZAR
if (isset($_POST['update'])) {
    
    $user = $_POST['usuario'];
    $correo = $_POST['correo'];
    $dui = $_POST['dui_tallerista'];
    

    $sql = "UPDATE tb_usuario SET user ='$user',correo ='$correo' WHERE dui_tallerista='$dui'";
    $resutado = mysqli_query($con, $sql);

    //consulta para insertar a la tabla bitacora
    $sql2 = "INSERT INTO tb_bitacora (evento_bitacora,tabla_bitacora,fecha_bitacora,accion_bitacora,usuario_bitacora) values('Se ha modificado un registro','tb_usuario','$fechaActual',concat('Registro Actualizado a','$user'),'$_var')";
    mysqli_query($con, $sql2);
    if ($resultado) {
        // die("Este DUI ya está siendo ocupado!");
        echo '<script>
    Swal({
     title: "Actualizado",
     text: "Registro actualizado correctamente!",
     type: "success",
     confirmButtonText: "Aceptar",
     closeOnConfirm: false
     }).then(function(result){
        if(result.value){                   
         window.location = "Ver_usuario.php";
        }
     });
    </script>';
    }


    //header("Location: Ver_Tallerista.php");
}
//FIN DE CODIGO PARA ACTUALIZAR

//plantilla fin
include_once("./Plantilla/fin.php");
?>