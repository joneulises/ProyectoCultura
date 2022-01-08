<?php
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
      $passw = $row['pass'];
      $tipo = $row['tipo'];
      $dui_tallerista= $row['dui_tallerista'];
      $correo= $row['correo'];
      $estado = $row['estado'];
     
      
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
                                        <h2 class="item-title text-center">Modificar Usuario</h2>

                                    </div>
                                    <!--Termina item-info-->

                                </div>
                                <!--Termina item-content colBottomMargin-->

                            </div>
                            <!--Termina col-sm-10-->

                            <div class="col-md-12">

                                <!--COMIENZA FORMULARIO____________________*****************************************************************___________ -->

                                <form class="popup-form" action="Update_Tallerista.php?dui=<?php echo $_GET['dui']; ?>" method="POST"  id="contactForm" name="contactform" data-toggle="validator">
                                    <div class="row">
                                        <div id="msgContactSubmit" class="hidden"></div>

                                        <div class="col-md-12">
                                            <label class="control-label">Tipo</label>
                                            <div class="form-group">
                                                <select name="tipo" id="tipo" class="form-control">
                                                <option  selected><?php echo $row['tipo']  ?></option>
                                                    <option value="ad">Administrador</option>
                                                    <option value="em">Empleado</option>
                                                    <option value="ta">Tallerista</option>

                                                </select>
                                                <div class="input-group-icon"><i class="fa fa-indent"></i></div>
                                            </div>
                                        </div>

                                        <!--<div class="row form-group">-->
                                        <div class="col-md-6">
                                            <label class="control-label">Empleado</label>
                                            <div class="form-group">
                                                <select name="duiempleado" id="empleado" class="form-control" disabled>

                                                <option  selected><?php echo $row['dui_empleado']  ?></option>

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

                                                <option  selected><?php echo $row['dui_tallerista']  ?></option>

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

                                        <div class="col-md-6">
                                            <label>Contraseña</label>
                                            <div class="form-group">
                                                <input type="password" autocomplete="off" name="contraseña1" id="pass1" class="form-control" value="<?php echo $passw; ?>"/>
                                                <div class="textarea input-group-icon"><i class="fa fa-key"></i></div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label>Confirmar Contraseña</label>
                                            <div class="form-group">
                                                <input type="password" autocomplete="off" name="contraseña2" id="pass2"  onChange="checkPasswordMatch();" class="form-control" value="<?php echo $passw; ?>" />
                                                <div class="textarea input-group-icon"><i class="fa fa-key"></i></div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="registrationFormAlert" id="mostrarAlerta">
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
    $("#mostrarAlerta").html("Contraseña no coinciden!").addClass('text-danger').removeClass('text-success');
    $("#guardar_r").prop("disabled", true);
    
    }else{
        $("#mostrarAlerta").html("Contraseña correctas!.").addClass('text-success').removeClass('text-danger');
        $("#guardar_r").prop("disabled", false);
    
    }
}

</script>


<?php
//TODO EL CODIGO PARA GUARDAR
if (isset($_POST['registrar'])) {


    $user = $_POST['usuario'];
    $pass = $_POST['contraseña2'];
    $tipo = $_POST['tipo'];
    $dui_empleado = $_POST['duiempleado'];
    $dui_tallerista = $_POST['duitallerista'];
    $correo = $_POST['correo'];
    $estado = 'activo';
    //PARA ENCRIPTAR LA CONTRASEÑA
    $clave =  password_hash($_POST["contraseña2"], PASSWORD_DEFAULT) ;

    $sql = "SELECT *  FROM tb_usuario where user=$user";
    $validacion = mysqli_query($con, $sql);

    $correo_va = "SELECT *  FROM tb_usuario where correo=$correo";
    $validacion_co = mysqli_query($con, $correo_va);

    if (mysqli_num_rows($validacion) > 0) {
        echo '<script>
        Swal.fire("usuario ya existe");
        </script>';
    } /*else if(mysqli_num_rows($validacion_co) > 0) {
        echo '<script>
        Swal.fire("correo ya existe");
        </script>';
    }*/ else {

        if ($tipo === "ad" || $tipo === "em") {

            $query = "INSERT INTO tb_usuario(user, pass,tipo,dui_empleado,correo,estado) VALUES ('$user','$clave','$tipo','$dui_empleado','$correo','$estado')";
            $resultado = mysqli_query($conex, $query);
        } else {

            $query = "INSERT INTO tb_usuario(user, pass,tipo,dui_tallerista,correo,estado) VALUES ('$user','$clave','$tipo','$dui_tallerista','$correo','$estado')";
            $resultado = mysqli_query($conex, $query);
        }

        if ($resultado) {
            // die("Este DUI ya está siendo ocupado!");
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