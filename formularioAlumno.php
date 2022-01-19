<!--Bloque de sentencia php para realizar la conexion a la tabla-->

<?php
include("con_db.php");
$con = conectar();

date_default_timezone_set('America/El_Salvador');
$fechaActual = date('Y-m-d H:i:s');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Casa de la Cultura San Vicente </title>

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <link rel="stylesheet" href="./vendor/owl-carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="./vendor/owl-carousel/css/owl.theme.default.min.css">
    <link href="./vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="estilos.css">
    <link rel="stylesheet" href="../vendor/sweetalert2/dist/sweetalert2.min.css">
<!-- Estilos -->
    <meta charset="utf-8">
	<meta content="IE=edge" http-equiv="X-UA-Compatible">
	<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1" />
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>Inicio</title>
	<!-- set your website meta description and keywords -->
	<meta name="description" content="Add your business website description here">
	<meta name="keywords" content="Add your business website keywords here">
	<!-- Bootstrap Stylesheets -->

	<!-- Font Awesome Stylesheets -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Template Main Stylesheets -->
	<link rel="stylesheet" href="css/menu.css">
	<link rel="stylesheet" href="css/carrusel.css">
	<link rel="stylesheet" href="css/fontello.css">
	<link rel="stylesheet" href="css/contact-form.css" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Raleway:400,600" rel="stylesheet">






    <!-- Bootstrap Stylesheets CSS PARA FORMULARIOS-->
    <link rel="stylesheet" href="./assets/contact-form/css/contact-form.css">
    <!--Font Awesome Stylesheets-->
    <link rel="stylesheet" href="./assets/contact-form/css/font-awesome.min.css">
    <!-- Template Main Stylesheets -->
    <link rel="stylesheet" href="./assets/contact-form/css/bootstrap.min.css" type="text/css">
    <!-- Ionic icons -->
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./vendor/sweetalert2/dist/sweetalert2.min.css">
</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>



        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->

        <div class="navegacion">
		<nav id="navigation-container">
			<img style="align-content: center;" class="logo" src="img/Proyecto - Drawing 2450649906371411432.png">
			<a style="color: orange;" class="logo-letra">Casa de la Cultura de San Vicente</a>
			<ul>
				<li><a href="index.php">Inicio <span class="icon icon-up-dir"></span></a></li>
			
			</ul>
		</nav>
	</div>

        <!--**********************************
            Nav header end
        ***********************************-->



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
                                                <h2 class="item-title text-center">Registro de Alumno</h2>

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
                                                <!--ver si es necesario-->

                                                <!--Comienza el bloque de inputs-->

                                                <div class="col-md-6 col-sm-4 col-xs-4">
                                                    <label class="label">Ingrese su nombre*</label>
                                                    <div class="form-group col-sm-6 col-lg-12">
                                                        <div class="help-block with-errors"></div>
                                                        <input name="nombre" id="nombre" class="form-control" type="text" required data-error="Por favor ingrese su nombre">
                                                        <div class="input-group-icon"><i class="fa fa-pencil"></i></div>
                                                    </div>
                                                </div><!-- end form-group -->

                                                <div class="col-md-6 col-sm-4 col-xs-4">
                                                    <label class="label">Ingrese su apellido*</label>
                                                    <div class="form-group col-sm-6 col-lg-12">
                                                        <div class="help-block with-errors"></div>
                                                        <input name="apellido" id="apellido" class="form-control" type="text" required data-error="Por favor ingrese su apellido">
                                                        <div class="input-group-icon"><i class="fa fa-pencil"></i></div>
                                                    </div>
                                                </div><!-- end form-group -->


                                                <div class="col-md-6 col-sm-4 col-xs-4">
                                                    <label class="label">Seleccione su municipio</label>
                                                    <div class="form-group col-sm-6 col-lg-12">
                                                        <div class="help-block with-errors"></div>
                                                        <select name="municipio" id="municipio" class="form-control" type="text" required data-error="Por favor selecciones su municipio">

                                                            <!-- Spinner de la tabla-->

                                                            <?php
                                                            $sql = "SELECT *  FROM tb_municipios";
                                                            $query = mysqli_query($con, $sql);

                                                            while ($row = mysqli_fetch_array($query)) {
                                                            ?>
                                                                <option value="<?php echo $row['id_municipio'] ?>"> <?php echo $row['nombre_municipio'] ?> </option>
                                                            <?php
                                                            }
                                                            ?>




                                                        </select>
                                                        <div class="input-group-icon"><i class="fa fa-map-signs"></i></div>
                                                    </div>
                                                </div><!-- end form-group -->


                                                <div class="col-md-6 col-sm-4 col-xs-4">
                                                    <label class="label">Seleccione su fecha de nacimiento*</label>
                                                    <div class="form-group col-sm-6 col-lg-12">
                                                        <div class="help-block with-errors"></div>
                                                        <input name="fechanac" id="fechanac" class="form-control" type="date" required data-error="Por favor ingrese su fecha de nacimiento">
                                                        <div class="input-group-icon"><i class="fa fa-calendar"></i></div>
                                                    </div>
                                                </div><!-- end form-group -->


                                                <div class="col-md-6 col-sm-4 col-xs-4">
                                                    <label class="label">Seleccione su cantón o deje seleccionado "zona
                                                        urbana"</label>
                                                    <div class="form-group col-sm-6 col-lg-12">
                                                        <div class="help-block with-errors"></div>
                                                        <select name="canton" id="canton" class="form-control" type="text" data-error="Por favor seleccione el cantón">

                                                            <!--Spinner de datos  -->

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
                                                        <div class="input-group-icon"><i class="fa fa-map-pin"></i></div>
                                                    </div>
                                                </div><!-- end form-group -->

                                                <div class="col-md-6 col-sm-4 col-xs-4">
                                                    <label class="label">Seleccione su sexo</label>
                                                    <div class="form-group col-sm-6 col-lg-12">
                                                        <div class="help-block with-errors"></div>
                                                        <select name="sexo" id="sexo" class="form-control" required data-error="Por favor seleccione su sexo">
                                                            <option value="Masculino">Masculino</option>
                                                            <option value="Femenino">Femenino</option>
                                                        </select>
                                                        <div class="input-group-icon"><i class="fa fa-venus-mars"></i></div>
                                                    </div>
                                                </div><!-- end form-group -->

                                                <div class="col-md-6 col-sm-4 col-xs-4">
                                                    <label class="label">Ingrese su dirección*</label>
                                                    <div class="form-group col-sm-6 col-lg-12">
                                                        <div class="help-block with-errors"></div>
                                                        <input name="direccion" id="direccion" class="form-control" type="text" required data-error="Por favor ingrese su Dirección">
                                                        <div class="input-group-icon"><i class="fa fa-street-view"></i>
                                                        </div>
                                                    </div>
                                                </div><!-- end form-group -->

                                                <div class="col-md-6 col-sm-4 col-xs-4">
                                                    <label class="label">Ingrese su numero de teléfono*</label>
                                                    <div class="form-group col-sm-6 col-lg-12">
                                                        <div class="help-block with-errors"></div>
                                                        <input name="phone" id="phone" class="form-control" type="phone" required data-error="Por favor ingrese su teléfono">
                                                        <div class="input-group-icon"><i class="fa fa-phone"></i></div>
                                                    </div>
                                                </div><!-- end form-group -->

                                                <div class="col-md-6 col-sm-4 col-xs-4">
                                                    <label class="label">Seleccione el taller</label>
                                                    <div class="form-group col-sm-6 col-lg-12">
                                                        <div class="help-block with-errors"></div>
                                                        <select name="taller" id="taller" class="form-control" required data-error="Por favor ingresa el taller">

                                                            <!-- Spinner de la tabla Taller-->
                                                            <?php
                                                            $sql = "SELECT *  FROM tb_talleres";
                                                            $query = mysqli_query($con, $sql);

                                                            while ($row = mysqli_fetch_array($query)) {
                                                            ?>
                                                                <option value="<?php echo $row['id_taller'] ?>"> <?php echo $row['nombre_taller'] ?> </option>
                                                            <?php
                                                            }
                                                            ?>



                                                        </select>
                                                        <div class="input-group-icon"><i class="fa fa-graduation-cap"></i>
                                                        </div>
                                                    </div>
                                                </div><!-- end form-group -->


                                                <div class="col-sm-12">
                                                    <div class="item-content colBottomMargin">
                                                        <div class="item-info">
                                                            <h4 style="color:#304f6f ;">Datos de su responsable</h4>
                                                        </div>
                                                        <!--End item-info -->
                                                    </div>
                                                    <!--End item-content -->
                                                </div><!-- end form-group -->



                                                <div class="col-md-6 col-sm-4 col-xs-4">
                                                    <label class="label">Ingrese el nombre de su persona
                                                        responsable*</label>
                                                    <div class="form-group col-sm-6 col-lg-12">
                                                        <div class="help-block with-errors"></div>
                                                        <input name="nombre_res" class="form-control" type="text" required data-error="Por favor ingrese el nombre de su persona responsable">
                                                        <div class="input-group-icon"><i class="fa fa-pencil-square-o"></i>
                                                        </div>
                                                    </div>
                                                </div><!-- end form-group -->


                                                <div class="col-md-6 col-sm-4 col-xs-4">
                                                    <label class="label">Ingrese el teléfono de su persona
                                                        reponsable*</label>
                                                    <div class="form-group col-sm-6 col-lg-12">
                                                        <div class="help-block with-errors"></div>
                                                        <input name="telefono_res" id="telefono_res" class="form-control" type="phone" required data-error="Por favor ingrese el teléfono de su persona responsable">
                                                        <div class="input-group-icon"><i class="fa fa-phone"></i></div>
                                                    </div>
                                                </div><!-- end form-group -->
                                                <div class="col-md-6 col-sm-4 col-xs-4">
                                                    <label class="label">Ingrese el apellido de su persona
                                                        responsable*</label>
                                                    <div class="form-group col-sm-6 col-lg-12">
                                                        <div class="help-block with-errors"></div>
                                                        <input name="apellido_res" class="form-control" type="text" required data-error="Por favor ingrese el apellido de su persona responsable">
                                                        <div class="input-group-icon"><i class="fa fa-pencil"></i></div>
                                                    </div>
                                                </div><!-- end form-group -->

                                                <div class="col-md-6 col-sm-4 col-xs-4">
                                                    <label class="label">Ingrese el parentesco con su persona
                                                        responsable*</label>
                                                    <div class="form-group col-sm-6 col-lg-12">
                                                        <div class="help-block with-errors"></div>
                                                        <input name="parentesco" class="form-control" type="text" required data-error="Por favor ingrese el parentesco con su persona responsable">
                                                        <div class="input-group-icon"><i class="fa fa-sitemap"></i></div>
                                                    </div>
                                                </div><!-- end form-group -->

                                                <hr style="width:100%;">
                                                <div style="padding: 15px;">
                                                    <h6>El llenado de este formulario es para contar con
                                                        información básica del alumno inscrito, para efectos de hacer constar
                                                        el desarrollo del taller y para ubicar al alumno en caso de ser
                                                        necesario para la institución.</h6>
                                                    <hr style="width:100%;">
                                                    <div>
                                                        <input type="checkbox">
                                                        <h6>Me comprometo a no faltar a mis clases, a menos que sea por
                                                            una
                                                            emergencia, pues comprendo que pierdo la oportunidad de
                                                            aprender
                                                            yademas entiendo el esfuerzo de La Casa de La Cultura de San
                                                            Vicente en cubrirlosgastos del tallerista con los limitados
                                                            fondos de su presupuestoasignado.</h6>
                                                    </div>
                                                </div>


                                                <div class="form-group last col-sm-12">
                                                    <button type="submit" name="btnregistrar" class="btn btn-custom" class="fa fa-save"></em> Registrar</button>
                                                    <!-- <button type="submit" name="btnregistrar" id="submit" class="btn btn-custom"><em class="fa fa-save"></em> Registrar</button>  -->
                                                    <button type="btn__reset" id="reset" class="btn btn-custom"><em class="fa fa-ban"></em> Cancelar</button>

                                                </div><!-- end form-group -->



                                                <!--Termina el bloque de inputs-->

                                            </div>
                                            <!--Termina row dentro del formulario-->
                                        </form>
                                        <!--Termina form-->

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
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">

                <p>Copyright © Designed &amp; Developed by <a href="#" target="_blank">UES FMP</a> 2021</p>
                <!--<p>Distributed by <a href="https://themewagon.com/" target="_blank">Themewagon</a></p> -->
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="./vendor/global/global.min.js"></script>
    <script src="./js/quixnav-init.js"></script>
    <script src="./js/custom.min.js"></script>


    <!-- Vectormap -->
    <script src="./vendor/raphael/raphael.min.js"></script>
    <script src="./vendor/morris/morris.min.js"></script>


    <script src="./vendor/circle-progress/circle-progress.min.js"></script>
    <script src="./vendor/chart.js/Chart.bundle.min.js"></script>

    <script src="./vendor/gaugeJS/dist/gauge.min.js"></script>

    <!--  flot-chart js -->
    <script src="./vendor/flot/jquery.flot.js"></script>
    <script src="./vendor/flot/jquery.flot.resize.js"></script>

    <!-- Owl Carousel -->
    <script src="./vendor/owl-carousel/js/owl.carousel.min.js"></script>

    <!-- Counter Up -->
    <script src="./vendor/jqvmap/js/jquery.vmap.min.js"></script>
    <script src="./vendor/jqvmap/js/jquery.vmap.usa.js"></script>
    <script src="./vendor/jquery.counterup/jquery.counterup.min.js"></script>


    <script src="./js/dashboard/dashboard-1.js"></script>
    <script src="./vendor/sweetalert2/dist/sweetalert2.min.js"></script>

    <?php


        $usuarios = isset($usuarios) ? $usuarios : array();
        $numero_aleatorio = mt_rand(0, 9999);
        while (strlen($numero_aleatorio) < 4) {
            $numero_aleatorio = "0" . $numero_aleatorio;
        }


        if (isset($_POST['btnregistrar'])) {

            //Datos de Responsable 
            $nombre_res = trim($_POST['nombre_res']);
            $ape_res =  trim($_POST['apellido_res']);
            $parentesco =  trim($_POST['parentesco']);
            $numero_res = trim($_POST['telefono_res']);
            //Datos de Alumno 

            $nombre_alumno = trim($_POST['nombre']);
            $apellido_alumno = trim($_POST['apellido']);
            $fecha_alumno = $_REQUEST['fechanac'];
            $municipio_alumno = trim($_POST['municipio']);
            $sexo_alumno = trim($_POST['sexo']);
            $zona_alumno = trim($_POST['canton']);
            $canton_alumno = trim($_POST['canton']);
            $direccion_alumno = trim($_POST['direccion']);
            $telefono_alumno = trim($_POST['phone']);
            $taller_alumno = trim($_POST['taller']);


            $sqltabla1 = "INSERT INTO `tb_responsable`(`id_responsable`,`nombre_responsable`, `apellido_responsable`, `parentesco`, telefono) VALUES ('$numero_aleatorio','$nombre_res','$ape_res','$parentesco','$numero_res')";
            $resultado = mysqli_query($conex, $sqltabla1);

            if ($resultado == 1) {

                $sqltabla2 = "INSERT INTO `tb_alumnos`(`id_alumno`,`nombre_alumno`, `apellido_alumno`, `fecha_nacimiento_alumno`, `sexo_alumno`, `zona_alumno`, `id_canton`, `direccion_alumno`, id_responsablre, telefono, taller_alumno) VALUES ('$numero_aleatorio','$nombre_alumno','$apellido_alumno','$fecha_alumno','$sexo_alumno','$zona_alumno','$canton_alumno','$direccion_alumno','$numero_aleatorio','$telefono_alumno','$taller_alumno')";
                $resul = mysqli_query($conex, $sqltabla2);

                $query2 = "INSERT INTO tb_inscripciones (fecha_inscripcion, id_alumno, id_taller, comentarios_inscripcion) values('$fechaActual','$numero_aleatorio', '$taller_alumno','Ninguno')";
                mysqli_query($conex, $query2);

                $extraerID= "SELECT * FROM `tb_alumnos` WHERE id_alumno='$numero_aleatorio' ";
                $query22 = mysqli_query($con, $extraerID);
                while ($e = mysqli_fetch_array($query22)) {
                    $a=$e['id_alumno'];

                }



                echo '<script>
                Swal({
                 title: "Registro",
                 text: "Guardado!",
                 type: "success",
                 confirmButtonText: "Aceptar",
                 closeOnConfirm: false
                 }).then(function(result){
                    if(result.value){                   
                     window.location = "comprobante.php?co='.$a.'";
                    }
                 });
                </script>';


            }
        }

        ?>


    <?php
 // include("conregistrar_Alumnobd.php");

    ?>

</body>

</html>