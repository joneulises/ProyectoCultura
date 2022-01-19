<?php
session_start();
if($_SESSION['empleado'] ==''){
    header("Location:index.php");
}

$_var=$_SESSION['user_name'];
$fechaActual = date('Y-m-d H:i:s');
include("conexion.php");
$con = conectar();

if (isset($_GET['id'])) {
    $id_taller = $_GET['id'];

    $sql = "SELECT * FROM tb_talleres WHERE id_taller='$id_taller'";
    $resultado = mysqli_query($con, $sql);
    if (mysqli_num_rows($resultado) == 1) {
        //   echo 'ya estoy modifiacndo';
        $row = mysqli_fetch_array($resultado);
        $id_taller = $row['id_taller'];
        $nombre_taller = $row['nombre_taller'];
        $descripcion_taller = $row['descripcion_taller'];
        $tipo_taller = $row['tipo_taller'];
        $fecha_inicio_taller = $row['fecha_inicio_taller'];
        $duracion_taller = $row['duracion_taller'];
        
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
                                        <h2 class="item-title text-center">Modificar Taller</h2>

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

                                        <input type="hidden" name="id_taller" value="<?php echo $id_taller;  ?>">

                                        <div class="col-md-6">
                                            <label>Nombre de Taller</label>
                                            <div class="form-group">

                                                <input type="text" autocomplete="off" name="nombre_taller" class="form-control" placeholder="Nombre del taller" value="<?php echo $nombre_taller; ?>" />
                                                <div class="textarea input-group-icon"><i class="fa fa-pencil"></i></div>
                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                            <label class="control-label">Tipo de Taller</label>
                                            <div class="form-group">
                                                <select name="tipo_taller" class="form-control">

                                                    <option required><?php echo $row['tipo_taller']  ?></option>
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

                                                <input type="date" autocomplete="off" name="fecha_inicio_taller" class="form-control" placeholder="Ingresé su fecha de evento" value="<?php echo $fecha_inicio_taller; ?>" />
                                                <div class="input-group-icon"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label>Duracion de Taller</label>
                                            <div class="form-group">

                                                <input type="text" autocomplete="off" name="duracion_taller" class="form-control" placeholder="Duracion en meses" value="<?php echo $duracion_taller; ?>" />
                                                <div class="textarea input-group-icon"><i class="fa fa-clock-o"></i></div>
                                            </div>
                                        </div>



                                        <div class="form-group col-sm-12">
                                        <label>Descripcion de Taller</label>
                                            <div class="form-group">
                                                <textarea rows="3" name="descripcion_taller" placeholder="Escribe la descripción del taller" class="form-control" required data-error="Comentarios"><?php echo $descripcion_taller; ?></textarea>
                                                <div class="textarea input-group-icon"><i class="fa fa-pencil"></i></div>
                                            </div><!-- end form-group -->
                                            

                                            <div class="form-group last col-sm-12">
                                                <input type="submit" name="update" value="Actualizar" class="btn btn-custom" class="fa fa-save">
                                                <!--	<button type="submit" id="submit" class="btn btn-custom"><em class="fa fa-save"></em> Registrar</button>-->
                                                <!-- <button type="reset" id="reset" class="btn btn-custom"><em class="fa fa-ban"></em>Cancelar</a></button> -->
                                                <a href="./Ver_evento.php" class="btn btn-custom">
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

    $nombre_taller = $_POST['nombre_taller'];
  
    $tipo_taller = $_POST['tipo_taller'];

    $fecha_inicio_taller = $_POST['fecha_inicio_taller'];

    $duracion_taller = $_POST['duracion_taller'];

    $descripcion_taller = $_POST['descripcion_taller'];


    


    $sql="UPDATE tb_talleres SET id_taller='$id_taller',nombre_taller='$nombre_taller',descripcion_taller='$descripcion_taller',tipo_taller='$tipo_taller',fecha_inicio_taller='$fecha_inicio_taller',duracion_taller='$duracion_taller' WHERE id_taller='$id_taller'";
     $resultado = mysqli_query($con, $sql);
    //consulta para insertar a la tabla bitacora
    $query2 = "INSERT INTO tb_bitacora (evento_bitacora,tabla_bitacora,fecha_bitacora,accion_bitacora,usuario_bitacora) values('Se ha modificado un registro','tb_talleristas','$fechaActual',concat('Registro Actualizado a','$nombre_taller'),'$_var')";
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
         window.location = "Ver_Taller.php";
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