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
                                        <h2 class="item-title text-center">Registro de Taller</h2>

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
                                            <label>Nombre de Taller</label>
                                            <div class="form-group">

                                                <input type="text" autocomplete="off" name="nombre_taller" class="form-control" placeholder="Nombre del taller" />
                                                <div class="textarea input-group-icon"><i class="fa fa-pencil"></i></div>
                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                            <label class="control-label">Tipo de Taller</label>
                                            <div class="form-group">
                                                <select name="tipo_taller" class="form-control">

                                                    <option required>-Seleccioné tipo de taller-</option>
                                                    <option value="Vocacional">-Vocacional-</option>
                                                                  <option value="Pintura">-Pintura-</option>
                                                                  <option value="Artesanias">-Artesanias-</option>
                                                                  <option value="Musica">-Musica-</option>

                                                </select>
                                                <div class="input-group-icon"><i class="fa fa-indent"></i></div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label>Fecha de Inicio de Taller</label>
                                            <div class="form-group">

                                                <input type="date" autocomplete="off" name="fecha_inicio_taller" class="form-control" placeholder="Ingresé su fecha de evento" />
                                                <div class="input-group-icon"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label>Duracion de Taller</label>
                                            <div class="form-group">

                                                <input type="text" autocomplete="off" name="duracion_taller" class="form-control" placeholder="Duracion en meses" />
                                                <div class="textarea input-group-icon"><i class="fa fa-clock-o"></i></div>
                                            </div>
                                        </div>

                                                         
                                        



                                        <div class="form-group col-sm-12">
                                            <label>Descripcion de Taller</label>
                                            <div class="form-group">
                                                <textarea rows="3" name="descripcion_taller" placeholder="Escribe la descripción del taller" class="form-control" required data-error="Comentarios"></textarea>
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
    


    $nombre_taller = $_POST['nombre_taller'];
  
    $tipo_taller = $_POST['tipo_taller'];

    $fecha_inicio_taller = $_POST['fecha_inicio_taller'];

    $duracion_taller = $_POST['duracion_taller'];

    $descripcion_taller = $_POST['descripcion_taller'];
    
    $query = "INSERT INTO tb_talleres(nombre_taller, descripcion_taller, tipo_taller, fecha_inicio_taller, duracion_taller) VALUES ('$nombre_taller','$descripcion_taller','$tipo_taller','$fecha_inicio_taller','$duracion_taller')";
    $resultado = mysqli_query($conex,$query);

    //consulta para insertar a la tabla bitacora
     
    $query2 = "INSERT INTO tb_bitacora (evento_bitacora,tabla_bitacora,fecha_bitacora,accion_bitacora,usuario_bitacora) values('Se ha insertado un registro','tb_talleres','$fechaActual','$nombre_taller','$_var')";
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
         window.location = "Ver_Taller.php";
        }
     });
    </script>';
    }
         
 
 
 //FIN DE CODIGO PARA GUARDAR
 
 //plantilla fin
 include_once("./Plantilla/fin.php");
 ?>