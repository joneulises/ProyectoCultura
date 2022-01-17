<?php
session_start();
if($_SESSION['empleado'] ==''){
    header("Location:index.php");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Casa de la Cultura </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <link rel="stylesheet" href="./vendor/owl-carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="./vendor/owl-carousel/css/owl.theme.default.min.css">
    <link href="./vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">



    <!-- Bootstrap Stylesheets CSS PARA FORMULARIOS-->
    <link rel="stylesheet" href="./assets/contact-form/css/contact-form.css">
    <!--Font Awesome Stylesheets-->
    <link rel="stylesheet" href="./assets/contact-form/css/font-awesome.min.css">
    <!-- Template Main Stylesheets -->
    <link rel="stylesheet" href="./assets/contact-form/css/bootstrap.min.css" type="text/css">
    <!-- Ionic icons -->
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">



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
        <div class="nav-header">
            
            <a href="menu_administrador.php" class="brand-logo">

                <img src="images/img_casacultura/logo.png" alt="130" width="130" height="130">

                
                <!--  
                    <img class="logo-compact" src="./images/logo-text.png" alt="">
                <img class="brand-title" src="./images/logo-text.png" alt="">   
            -->
            </a>


            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                    <h4 class="text-dark font-weight-bold mb-0">Perfil Administrador</h4>
                        <div class="header-left">
                            
                        </div>

                        <ul class="navbar-nav header-right">
                            
                           <li class="nav-item dropdown">
                                <a class="nav-link text-dark dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="images/img_casacultura/usuario.png" width="60" height="60" class="img-fluid rounded-circle avatar mr-2"
                      alt="https://generated.photos/" />
                                   <?php echo $_SESSION['user_name'];?> 
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Mi perfil</a>

                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="./index.php">Cerrar sesión</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        
        <div class="quixnav">
            <div class="quixnav-scroll">
                <ul class="metismenu" id="menu">

                    <br>
                    <li>
                    <center>
                        <h5 style="color: orange;" >Casa de la cultura</h5>
                    <!--<li style="color: orange;">Casa de la cultura</li>-->
                    </center>
                    </li>


                     <!--Boton de Empleado desplegable-->


                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon ion-md-woman"></i><span class="nav-text">Empleado</span></a>
                        <ul aria-expanded="false">
                             <li><a href="#">Registrar Empleado</a></li>
                            <li><a href="#">Ver Empleado</a></li>
                        </ul>
                    </li>


                     <!--Boton de Registrar Tallerista desplegable-->

                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon ion-md-man"></i><span class="nav-text">Tallerista</span></a>
                        <ul aria-expanded="false">
                        <li><a href="./FormRegistrarTallerista.php">Registrar Tallerista</a></li>
                            <li><a href="./Ver_Tallerista.php">Ver Talleristas</a></li>
                            <li><a href="./FormRegistrarHorario.php">Asignar Horario</a></li>
                            <li><a href="./Ver_Horario.php">Ver Horarios</a></li>
                           
                        </ul>
                    </li>



                     <!--Boton de Usuarios desplegable-->


                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon ion-md-person"></i><span class="nav-text">Usuarios</span></a>
                        <ul aria-expanded="false">
                            <li><a href="./FormRegistrarUsuario.php">Registrar Usuario</a></li>
                            <li><a href="./Ver_usuario.php">Ver Usuarios</a></li>
                            
                        </ul>
                    </li>



                     <!--Boton de Lista de asistenia desplegable-->


                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon ion-md-apps"></i><span class="nav-text">Lista de asistencia</span></a>
                        <ul aria-expanded="false">
                            <li><a href="#">Ver lista de asistencia</a></li>
                        </ul>
                    </li>



                     <!--Boton de Alumnos desplegable-->


                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-single-04"></i><span class="nav-text">Alumnos</span></a>
                        <ul aria-expanded="false">
                            <li><a href="./tabla_registroAlumnos.php">Ver lista de Alumnos</a></li>
                        </ul>
                    </li>



                     <!--Boton de Talleres desplegable-->


                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon ion-md-brush"></i><span class="nav-text">Talleres</span></a>
                        <ul aria-expanded="false">
                            <li><a href="./formTalleres.php">Registrar Taller</a></li>
                            <li><a href="./prueba.php">Ver Taller</a></li>
                        </ul>
                    </li>



                     <!--Boton de Donaciones desplegable-->


                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon ion-md-cash"></i><span class="nav-text">Donaciones</span></a>
                        <ul aria-expanded="false">
                            <li><a href="#">Registrar donación</a></li>
                            <li><a href="#">Ver donaciones</a></li>
                        </ul>
                    </li>



                     <!--Boton de Eventos desplegable-->


                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon ion-md-paper"></i><span class="nav-text">Eventos</span></a>
                        <ul aria-expanded="false">
                            <li><a href="#">Registrar evento</a></li>
                            <li><a href="#">Ver eventos</a></li>
                        </ul>
                    </li>



                     <!--Boton de Salas desplegable-->


                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon ion-md-easel"></i><span class="nav-text">Salas</span></a>
                        <ul aria-expanded="false">
                            <li><a href="formSalas.php">Registrar sala</a></li>
                            <li><a href="tabla_salas.php">Ver salas</a></li>
                        </ul>
                    </li>



                     <!--Boton de Bitacora desplegable-->


                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon ion-md-time"></i><span class="nav-text">Bitacora</span></a>
                        <ul aria-expanded="false">
                        
                            <li><a href="./Ver_Bitacora.php">Ver bitacora</a></li>
                        </ul>
                    </li>

                   
                </ul>
            </div>


        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">

            <img src="./img/torre.jpg" alt="1100" width="1200" height="500">
              
                 
                    
                   
                </div>  <!--termina el container-fluid-->
               

            </div> <!--termina el content body-->
        </div> <!--termina main wraper que esta en el heder -->
        <!--**********************************
            Content body end
        ***********************************-->


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

</body>

</html>