<?php
session_start();
if($_SESSION['empleado'] ==''){
    header("Location:index.php");
}

$_var=$_SESSION['user_name'];
date_default_timezone_set('America/El_Salvador');
$fechaActual = date('Y-m-d H:i:s');
include("conexion.php");
$con = conectar();

if (isset($_GET['dui'])) {
    $dui = $_GET['dui'];

    $sql = "SELECT * FROM tb_empleados WHERE dui_empleado='$dui'";
    $resultado = mysqli_query($con, $sql);
    if (mysqli_num_rows($resultado) == 1) {
        //   echo 'ya estoy modifiacndo';
        $row = mysqli_fetch_array($resultado);
        $duit = $row['dui_empleado'];
        $nombret = $row['nombre_empleado'];
        $apellidot = $row['apellido_empleado'];
        $sexot = $row['sexo_empleado'];
        $f_n = $row['fecha_nacimiento_empleado'];
        $f_c = $row['fecha_contrato_empleado'];
        $direc = $row['direccion_empleado'];
        $idcanton = $row['id_canton'];
        $telefono = $row['telefono'];
    }
}


include_once("./Plantilla/cabezera.php");
include_once("./Plantilla/menuAdministrador.php");

?>

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
                                        <h2 class="item-title text-center">Modificar Talllerista</h2>

                                    </div>
                                    <!--Termina item-info-->

                                </div>
                                <!--Termina item-content colBottomMargin-->

                            </div>
                            <!--Termina col-sm-10-->

                            <div class="col-md-12">

                                <!--COMIENZA FORMULARIO____________________*****************************************************************___________ -->

                                <form class="popup-form" action="" method="POST" id="contactForm" name="contactform" data-toggle="validator">
                                    <div class="row">
                                        <div id="msgContactSubmit" class="hidden"></div>

                                        <input type="hidden" name="dui_tallerista" value="<?php echo $duit;  ?>">
                                        <div class="col-md-6">
                                            <label>Nombre</label>
                                            <div class="form-group">

                                                <input type="text" autocomplete="off" name="nombre" class="form-control" required placeholder="Ingrese su nombre" value="<?php echo $nombret; ?>" />
                                                <div class="textarea input-group-icon"><i class="fa fa-pencil"></i></div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label>Apellidos</label>
                                            <div class="form-group">
                                                <input type="text" autocomplete="off" name="apellido" class="form-control" required placeholder="Ingrese sus apellidos" value="<?php echo $apellidot; ?>" />
                                                <div class="textarea input-group-icon"><i class="fa fa-pencil"></i></div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label>DUI</label>
                                            <div class="form-group">
                                                <input type="text" autocomplete="off" name="dui" class="form-control" pattern="^[0-9]{8}-[0-9]{1}$" required placeholder="00000000-0" size="10" maxlength="10" value="<?php echo $duit; ?>" disabled />
                                                <div class="input-group-icon"><i class="fa fa-address-card"></i></div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="control-label">Genero</label>
                                            <div class="form-group">
                                                <select name="sexo_tallerista" class="form-control">
                                                    <option selected><?php echo $row['sexo_empleado']  ?></option>
                                                    <option value="F">Femenino</option>
                                                    <option value="M">Masculino</option>
                                                </select>
                                                <div class="input-group-icon"><i class="fa fa-indent"></i></div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label>Fecha nácimiento</label>
                                            <div class="form-group">

                                                <input type="date" autocomplete="off" name="fecha_n" class="form-control" required placeholder="Ingrese su fecha" value="<?php echo $f_n; ?>" />
                                                <div class="input-group-icon"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label>Fecha Contrato</label>
                                            <div class="form-group">
                                                <input type="date" autocomplete="off" name="fecha_c" class="form-control" required placeholder="Ingrese su fecha" value="<?php echo $f_c; ?>" />
                                                <div class="input-group-icon"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label>Teléfono</label>
                                            <div class="form-group">
                                                <input name="telefono" autocomplete="off" type="text" class="form-control" pattern="^[0-9]{4}-[0-9]{4}$" placeholder="0000-0000" size="9" maxlength="9" value="<?php echo $telefono; ?>">
                                                <div class="input-group-icon"><i class="fa fa-phone"></i></div>
                                            </div>
                                        </div>

                                        <!--<div class="row form-group">-->
                                        <div class="col-md-6">
                                            <label class="control-label">Canton de procedencia</label>
                                            <div class="form-group">
                                                <select name="idcanton" class="form-control">

                                                    <option><?php echo $idcanton; ?> </option>

                                                    <?php
                                                    $sql = "SELECT *  FROM tb_cantones";
                                                    $query = mysqli_query($con, $sql);


                                                    while ($row = mysqli_fetch_array($query)) {
                                                    ?>
                                                        <option value="<?php echo $row['id_canton'] ?>"> <?php echo $row['nombre_canton'] ?> </option>
                                                    <?php
                                                    }
                                                    ?>


                                                </select>
                                                <div class="input-group-icon"><i class="fa fa-indent"></i></div>
                                            </div>
                                        </div>






                                        <div class="form-group col-sm-12">
                                            <label>Dirección</label>
                                            <div class="form-group">
                                                <textarea rows="3" name="direccion" placeholder="Escribe tu dirección aquí*" class="form-control" required data-error="Comentarios"> <?php echo $direc; ?> </textarea>
                                                <div class="textarea input-group-icon"><i class="fa fa-pencil"></i></div>
                                            </div>
                                            <!--end form-group -->

                                            <div class="form-group last col-sm-12">
                                                <input type="submit" name="update" value="Actualizar" class="btn btn-custom" class="fa fa-save">
                                                <!--	<button type="submit" id="submit" class="btn btn-custom"><em class="fa fa-save"></em> Registrar</button>-->
                                                <!-- <button type="reset" id="reset" class="btn btn-custom"><em class="fa fa-ban"></em>Cancelar</a></button> -->
                                                <a href="./Ver_Empleado.php" class="btn btn-custom">
                                                    <h6> Cancelar </h6>
                                                </a>
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

//TODO EL CODIGO PARA ACTUALIZAR

if (isset($_POST['update'])) {
    // $dui = $_GET['dui'];

    $nombret  = $_POST['nombre'];
    $apellidot = $_POST['apellido'];
    $sexot = $_POST['sexo_tallerista'];
    $f_n = $_POST['fecha_n'];
    $f_c = $_POST['fecha_c'];
    $direc = $_POST['direccion'];
    $idcanton = $_POST['idcanton'];
    $telefono = $_POST['telefono'];
    $dui = $_POST['dui_tallerista'];


    $sql = "UPDATE tb_empleados SET dui_empleado ='$dui',nombre_empleado ='$nombret',apellido_empleado ='$apellidot',sexo_empleado ='$sexot' ,fecha_nacimiento_empleado ='$f_n' ,fecha_contrato_empleado ='$f_c' ,direccion_empleado ='$direc',id_canton ='$idcanton',telefono ='$telefono' WHERE dui_empleado='$dui'";
    $resutado = mysqli_query($con, $sql);
    //consulta para insertar a la tabla bitacora
    $query2 = "INSERT INTO tb_bitacora (evento_bitacora,tabla_bitacora,fecha_bitacora,accion_bitacora,usuario_bitacora) values('Se ha modificado un registro','tb_empleados','$fechaActual',concat('Registro Actualizado a','$nombret'),'$_var')";
    mysqli_query($con, $query2);
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
         window.location = "Ver_Empleado.php";
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