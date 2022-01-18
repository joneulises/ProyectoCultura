<?php


session_start();
if ($_SESSION['empleado'] == '') {
    header("Location:index.php");
}

$_var = $_SESSION['user_name'];
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
                                        <h2 class="item-title text-center">Registro de Evento</h2>

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
                                            <label>Nombre de Evento</label>
                                            <div class="form-group">

                                                <input type="text" autocomplete="off" name="nombre_evento" class="form-control" placeholder="Ingresé su nombre de evento" />
                                                <div class="textarea input-group-icon"><i class="fa fa-pencil"></i></div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label>Fecha de Evento</label>
                                            <div class="form-group">

                                                <input type="date" autocomplete="off" name="fecha_evento" class="form-control" placeholder="Ingresé su fecha de evento" />
                                                <div class="input-group-icon"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label>Hora de Inicio de Evento</label>
                                            <div class="form-group">

                                                <input type="time" autocomplete="off" name="hora_evento" class="form-control" min="07:00" max="18:00" />
                                                <div class="input-group-icon"><i class="fa fa-clock-o"></i></div>
                                            </div>
                                        </div>



                                        <!--<div class="row form-group">-->
                                        <div class="col-md-6">
                                            <label class="control-label">Lugar de evento</label>
                                            <div class="form-group">
                                                <select name="lugar_evento" class="form-control">

                                                    <option required>Seleccioné un localidad</option>

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
                                            <label>Dirección de Evento</label>
                                            <div class="form-group">
                                                <textarea rows="3" name="direccion_evento" placeholder="Escribe la direccion del evento" class="form-control" required data-error="Comentarios"></textarea>
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
    


    $nombre_evento = $_POST['nombre_evento'];
  
    $fecha_evento = $_POST['fecha_evento'];

    $hora_evento = $_POST['hora_evento'];

    $direccion_evento = $_POST['direccion_evento'];

    $lugar_evento = $_POST['lugar_evento'];
    
    $query = "INSERT INTO tb_eventos(nombre_evento, fecha_evento, hora_evento, direccion_evento, id_canton) VALUES ('$nombre_evento','$fecha_evento','$hora_evento','$direccion_evento','$lugar_evento')";
    $resultado = mysqli_query($conex,$query);

    //consulta para insertar a la tabla bitacora
     
    $query2 = "INSERT INTO tb_bitacora (evento_bitacora,tabla_bitacora,fecha_bitacora,accion_bitacora,usuario_bitacora) values('Se ha insertado un registro','tb_eventos','$fechaActual','$nombre_evento','$_var')";
    mysqli_query($conex, $query2);
    

    echo '<script>
    Swal({
     title: "Registro",
     text: "Guardado!",
     type: "success",
     confirmButtonText: "Aceptar",
     closeOnConfirm: false
     }).then(function(result){
        if(result.value){                   
         window.location = "Ver_evento.php";
        }
     });
    </script>';
    }
         
 
 
 //FIN DE CODIGO PARA GUARDAR
 
 //plantilla fin
 include_once("./Plantilla/fin.php");
 ?>