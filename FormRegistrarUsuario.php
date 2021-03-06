<?php

session_start();
if($_SESSION['empleado'] ==''){
    header("Location:index.php");
}
$_var=$_SESSION['user_name'];
$fechaActual = date('Y-m-d H:i:s');


include("con_db.php");
$con = conectar();


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
                                        <h2 class="item-title text-center">Registro de Usuario</h2>

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

                                        <div class="col-md-12">
                                            <label class="control-label">Tipo de Usuario</label>
                                            <div class="form-group">
                                                <select name="tipo" id="tipo" class="form-control">
                                                    <option selected>Seleccion??...</option>
                                                    <option value="ad">Administrador</option>
                                                    <option value="em">Empleado</option>
                                                    <option value="ta">Tallerista</option>

                                                </select>
                                                <div class="input-group-icon"><i class="fa fa-indent"></i></div>
                                            </div>
                                        </div>

                                        <!--<div class="row form-group">-->
                                        <div class="col-md-6">
                                            <label class="control-label">Empleados</label>
                                            <div class="form-group">
                                                <select name="duiempleado" id="empleado" class="form-control" disabled>

                                                    <option required>Seleccion?? el empleado</option>

                                                    <?php
                                                    $sql = "SELECT dui_empleado,CONCAT( nombre_empleado,' ', apellido_empleado ) AS nombre  FROM tb_empleados";
                                                    $query = mysqli_query($con, $sql);


                                                    while ($row = mysqli_fetch_array($query)) {
                                                    ?>
                                                        <option value="<?php echo $row['dui_empleado'] ?>"> <?php echo $row['nombre'] ?> </option>
                                                    <?php
                                                    }
                                                    ?>


                                                </select>
                                                <div class="input-group-icon"><i class="fa fa-indent"></i></div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="control-label">Talleristas</label>
                                            <div class="form-group">
                                                <select name="duitallerista" id="tallerista_id" class="form-control" disabled>

                                                    <option required>Seleccion?? el tallerista</option>

                                                    <?php
                                                    $sql = "SELECT dui_tallerista,CONCAT( nombre_tallerista,' ', apellido_tallerista ) AS nombre  FROM tb_talleristas";
                                                    $query = mysqli_query($con, $sql);


                                                    while ($row = mysqli_fetch_array($query)) {
                                                    ?>
                                                        <option value="<?php echo $row['dui_tallerista'] ?>"> <?php echo $row['nombre'] ?> </option>
                                                    <?php
                                                    }
                                                    ?>


                                                </select>
                                                <div class="input-group-icon"><i class="fa fa-indent"></i></div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label>Nombre de usuario</label>
                                            <div class="form-group">

                                                <input type="text" autocomplete="off" name="usuario" class="form-control" placeholder="usuario" />
                                                <div class="textarea input-group-icon"><i class="fa fa-pencil"></i></div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label>Correo electr??nico</label>
                                            <div class="form-group">

                                                <input type="email" autocomplete="off" name="correo" class="form-control" pattern=".+@gmail\.com" />
                                                <div class="textarea input-group-icon"><i class="fa fa-envelope-o"></i></div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label>Contrase??a</label>
                                            <div class="form-group">
                                                <input type="password" autocomplete="off" name="contrase??a1" id="pass1" class="form-control" />
                                                <div class="textarea input-group-icon"><i class="fa fa-key"></i></div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label>Confirmar Contrase??a</label>
                                            <div class="form-group">
                                                <input type="password" autocomplete="off" name="contrase??a2" id="pass2"  onChange="checkPasswordMatch();" class="form-control" />
                                                <div class="textarea input-group-icon"><i class="fa fa-key"></i></div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="registrationFormAlert" id="mostrarAlerta">
                                        </div>


                                        <div class="form-group last col-sm-12">
                                            <input type="submit" name="registrar" id="guardar_r" value="Guardar"  class="btn btn-custom" class="fa fa-save">
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
<script>
    $("#tipo").change(function() {
        //alert($(this).val());
        if ($(this).val() === "ad") {

            $("#empleado").prop("disabled", false);
            $("#tallerista_id").prop("disabled", true);

        }
        if ($(this).val() === "em") {
            $("#empleado").prop("disabled", false);
            $("#tallerista_id").prop("disabled", true);
        }
        if ($(this).val() === "ta") {
            $("#empleado").prop("disabled", true);
            $("#tallerista_id").prop("disabled", false);
        }
    });

    //verificacion de contrasena
    function checkPasswordMatch() {
    var password = $("#pass1").val();
    var confirmPassword = $("#pass2").val();

    if (password != confirmPassword){
    $("#mostrarAlerta").html("Contrase??a no coinciden!").addClass('text-danger').removeClass('text-success');
    $("#guardar_r").prop("disabled", true);
    
    }else{
        $("#mostrarAlerta").html("Contrase??a correctas!.").addClass('text-success').removeClass('text-danger');
        $("#guardar_r").prop("disabled", false);
    
    }
}

</script>


<?php
//TODO EL CODIGO PARA GUARDAR
if (isset($_POST['registrar'])) {


    $user = $_POST['usuario'];
    $pass = $_POST['contrase??a2'];
    $tipo = $_POST['tipo'];
    if(isset($_POST['duiempleado'])){
        $dui_empleado = $_POST['duiempleado'];
    }else{
        $dui_empleado = null;
    }

    if(isset($_POST['duitallerista'])){
        $dui_tallerista = $_POST['duitallerista'];
    }else{
        $dui_tallerista = null;
    }
    
    $correo = $_POST['correo'];
    $estado = 'activo';
    //PARA ENCRIPTAR LA CONTRASE??A
    $clave =  password_hash($_POST["contrase??a2"], PASSWORD_DEFAULT) ;

    $sql = "SELECT *  FROM tb_usuario where user='$user'";
    $validacion = mysqli_query($con, $sql);

    $correo_va = "SELECT *  FROM tb_usuario where correo='$correo'";
     $validacion_co = mysqli_query($con, $correo_va);

    if (mysqli_num_rows($validacion)> 0 ) {
        echo '<script>
        Swal.fire("usuario ya existe");
        </script>';
    } else if(mysqli_num_rows($validacion_co) > 0) {
        echo '<script>
        Swal.fire("correo ya existe");
        </script>';
    } else {

        if ($tipo === "ad" || $tipo === "em") {

            $query = "INSERT INTO tb_usuario(user, pass,tipo,dui_empleado,correo,estado) VALUES ('$user','$clave','$tipo','$dui_empleado','$correo','$estado')";
            $resultado = mysqli_query($conex, $query);
            // consulta para insertar en bitacora
            $query2 = "INSERT INTO tb_bitacora (evento_bitacora,tabla_bitacora,fecha_bitacora,accion_bitacora,usuario_bitacora) values('Se ha insertado un registro','tb_talleristas','$fechaActual','$user','$_var')";
             mysqli_query($conex, $query2);
        } else {

            $query = "INSERT INTO tb_usuario(user, pass,tipo,dui_tallerista,correo,estado) VALUES ('$user','$clave','$tipo','$dui_tallerista','$correo','$estado')";
            $resultado = mysqli_query($conex, $query);

            // consulta para insertar en bitacora
            $query3 = "INSERT INTO tb_bitacora (evento_bitacora,tabla_bitacora,fecha_bitacora,accion_bitacora,usuario_bitacora) values('Se ha insertado un registro','tb_usuario','$fechaActual','$user','$_var')";
             mysqli_query($conex, $query3);
        }

        if ($resultado) {
            // die("Este DUI ya est?? siendo ocupado!");
            echo '<script>
            Swal({
             title: "Registro",
             text: "Guardado!",
             type: "success",
             confirmButtonText: "Aceptar",
             closeOnConfirm: false
             }).then(function(result){
                if(result.value){                   
                 window.location = "Ver_usuario.php";
                }
             });
            </script>';
        }else{
            echo '<script>
            Swal({
             title: "Error",
             text: "Fallo!",
             type: "warning",
             confirmButtonText: "Aceptar",
             closeOnConfirm: false
             }).then(function(result){
                if(result.value){                   
                 window.location = "Ver_usuario.php";
                }
             });
            </script>';
        }

        //probando alertas

        /*echo '<script>
     swal({
           title: "Registro",
           text: "Guardado!",
           type: "success",
           confirmButtonText: "Aceptar",
           closeOnConfirm: false
       },
       function () {
        window.location ="Ver_Tallerista.php";
       });</script>';*/


        //fin de probar alertas
    } //fin else validacion

    /* echo "registro Guardado";*/
    // header("Location: Ver_Tallerista.php");
}

/* echo $dui ;
       echo $nombre;
      echo $apellido;
      echo  $sexo ;
      echo  $fecha_n ;
      echo  $fecha_c;
      echo  $direccion ;
       echo $idcanton ;*/

//FIN DE CODIGO PARA GUARDAR

//plantilla fin
include_once("./Plantilla/fin.php");
?>