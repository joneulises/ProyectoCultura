<?php


session_start();
if ($_SESSION['empleado'] == '') {
    header("Location:index.php");
}

$_var = $_SESSION['user_name'];
date_default_timezone_set('America/El_Salvador');
$fechaActual = date('Y-m-d H:i:s');
//echo $fechaActual;
include("con_db.php");
$con = conectar();



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
                                        <h2 class="item-title text-center">Registro de Donación</h2>

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


                                        <div class="col-md-6">
                                            <label class="control-label">Donante</label>
                                            <div class="form-group">
                                                <select name="dui_donante" class="form-control">

                                                    <option required>Seleccioné el donador</option>
                                                    <?php
                                                        $sql = "SELECT *  FROM tb_donantes";
                                                        $query = mysqli_query($con, $sql);


                                                        while ($row = mysqli_fetch_array($query)) {
                                                        ?>
                                                            <option value="<?php echo $row['dui_donante'] ?>"> <?php echo $row['nombre_donante'] ?>  <?php echo $row['apellido_donante'] ?> </option>
                                                        <?php
                                                        }
                                                        ?>

                                                </select>
                                                <div class="input-group-icon"><i class="fa fa-indent"></i></div>
                                            </div>
                                        </div>



                                        <div class="col-md-6">
                                            <label>Donación</label>
                                            <div class="form-group">

                                                <input type="text" autocomplete="off" name="nombre_donacion" class="form-control" placeholder="Donación" />
                                                <div class="textarea input-group-icon"><i class="fa fa-pencil"></i></div>
                                            </div>
                                        </div>





                                        <div class="col-md-6">
                                            <label>Fecha de Donación</label>
                                            <div class="form-group">

                                                <input type="date" autocomplete="off" name="fecha_donacion" class="form-control" placeholder="Ingresé su fecha" />
                                                <div class="input-group-icon"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>





                                        <!--<div class="row form-group">-->
                                        <div class="col-md-6">
                                            <label class="control-label">DUI de Empleado</label>
                                            <div class="form-group">
                                                <select name="dui_empleado" class="form-control">

                                                    <option required>Seleccioné un Empleado</option>
                                                    <?php
                                                        $sql = "SELECT *  FROM tb_empleados";
                                                        $query = mysqli_query($con, $sql);


                                                        while ($row = mysqli_fetch_array($query)) {
                                                        ?>
                                                            <option value="<?php echo $row['dui_empleado'] ?>"> <?php echo $row['nombre_empleado'] ?> <?php echo $row['apellido_empleado'] ?> </option>
                                                        <?php
                                                        }
                                                        ?>

                                                </select>
                                                <div class="input-group-icon"><i class="fa fa-indent"></i></div>
                                            </div>
                                        </div>



                                        <div class="form-group col-sm-12">

                                            <label>Descripción de Donación</label>
                                            <div class="form-group">
                                                <textarea rows="3" name="descripcion_donacion" placeholder="Describe que tipo de donacion registras*" class="form-control" required data-error="Comentarios"></textarea>
                                                <div class="textarea input-group-icon"><i class="fa fa-pencil"></i></div>
                                            </div><!-- end form-group -->


                                            <div class="form-group last col-sm-12">
                                                <input type="submit" name="registrar" value="Guardar" class="btn btn-custom" class="fa fa-save">
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

//TODO EL CODIGO PARA GUARDAR
if (isset($_POST['registrar'])) {


    $dui_donante = $_POST['dui_donante'];
    

    
    $nombre_donacion = $_POST['nombre_donacion'];
    $fecha_donacion = $_POST['fecha_donacion'];
    $dui_empleado = $_POST['dui_empleado'];
    $descripcion_donacion = $_POST['descripcion_donacion'];

    //$estado='activo';

    $query = "INSERT INTO tb_donaciones(nombre_donacion, descripcion_donacion, fecha_donacion, dui_donante, diu_empleado) VALUES ('$nombre_donacion','$descripcion_donacion','$fecha_donacion','$dui_donante','$dui_empleado')";
    mysqli_query($conex, $query);


  
    //consulta para insertar a la tabla bitacora

    $query3 = "INSERT INTO tb_bitacora (evento_bitacora,tabla_bitacora,fecha_bitacora,accion_bitacora,usuario_bitacora) values('Se ha insertado un registro','tb_donacion','$fechaActual','$nombre_donacion','$_var')";
    mysqli_query($conex, $query3);


    echo '<script>
     Swal({
      title: "Registro",
      text: "Guardado!",
      type: "success",
      confirmButtonText: "Aceptar",
      closeOnConfirm: false
      }).then(function(result){
         if(result.value){                   
          window.location = "Ver_Donacion.php";
         }
      });
     </script>';
}



//FIN DE CODIGO PARA GUARDAR

//plantilla fin
include_once("./Plantilla/fin.php");
?>