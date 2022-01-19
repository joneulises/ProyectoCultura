<?php 
    include("conexion.php");
    $con=conectar();

$id=$_GET['id'];

$sql="SELECT * FROM tb_talleres WHERE id_taller='$id'";
$query=mysqli_query($con,$sql);

$row=mysqli_fetch_array($query);
?>


<!DOCTYPE html>
<html lang="en">






<!--_______________******************* HEAD**********_________________________________________________________________________________________________________________________-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Casa de la Cultura San Vicente</title>
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
<!--_______________*******************FIN HEAD**********_________________________________________________________________________________________________________________________-->



<!--_______________******************* BODY**********_________________________________________________________________________________________________________________________-->
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
    
        

        <!--***********aqui el buscar campana y icono persona************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="menu_secretaria.html" class="brand-logo">
                <img class="logo-abbr" src="./images/img_casacultura/logo.png" alt="" width="100" height="75">

                <h4 class="text-light font-weight-bold mb-0">Casa de la cultura</h4>
               <!-- <img class="logo-compact" src="./images/logo-text.png" alt="">
                <img class="brand-title" src="./images/logo-text.png" alt="">-->
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--********aqui el buscar campana y icono persona**************************
            Nav header end
        ***********************************-->


        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        





                        <h4 class="text-dark font-weight-bold mb-0">Perfil Secretaria</h4>
            

                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                  <li class="nav-item dropdown">
                    <a class="nav-link text-dark dropdown-toggle" href="#" id="navbarDropdown" role="button"
                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <img src="./images/img_casacultura/Mperfil.jfif" width="75" height="75" class="img-fluid rounded-circle avatar mr-2"
                      alt="https://generated.photos/" />
                    Karla Romero
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="#">Mi perfil</a>
                      
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Cerrar sesión</a>
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
                    <li class="nav-label first">Menu Secretaria</li>



                    <!--Boton de Lista de asistencia desplegable-->

                     <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="icon ion-md-woman"></i><span class="nav-text">Empleados</span></a>
                        <ul aria-expanded="false">
                            <li><a href="#">Registrar Empleado</a></li>
                            <li><a href="#">Ver Empleado</a></li>
                        </ul>
                    </li>

                    <!--Boton de Lista de asistencia desplegable-->

                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="icon ion-md-man"></i><span class="nav-text">Talleristas</span></a>
                        <ul aria-expanded="false">
                            <li><a href="#">Registrar Tallerista</a></li>
                            <li><a href="#">Ver Tallerista</a></li>
                        </ul>
                    </li>

                    <!--Boton de Lista de asistencia desplegable-->

                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="icon ion-md-person"></i><span class="nav-text">Usuarios</span></a>
                        <ul aria-expanded="false">
                            <li><a href="#">Ver Usuarios</a></li>
                        </ul>
                    </li>

                    <!--Boton de Lista de asistencia desplegable-->

                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="icon ion-md-apps"></i><span class="nav-text">Asistencias</span></a>
                        <ul aria-expanded="false">
                            <li><a href="#">Ver Asistencias</a></li>
                        </ul>
                    </li>

                    <!--Boton de Lista de alumnos desplegable-->

                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="icon ion-md-people"></i><span class="nav-text">Alumnos</span></a>
                        <ul aria-expanded="false">
                            <li><a href="#">Ver Alumnos</a></li>
                        </ul>
                    </li>

                    <!--Boton de Talleres desplegable-->

                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="icon ion-md-brush"></i><span class="nav-text">Talleres</span></a>
                        <ul aria-expanded="false">
                            <li><a href="./formRegistrarTaller.php">Registrar Taller</a></li>
                            <li><a href="./prueba.php">Ver Taller</a></li>
                        </ul>
                    </li>

                    <!--Boton de Donaciones desplegable-->

                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="icon ion-md-cash"></i><span class="nav-text">Donaciones</span></a>
                        <ul aria-expanded="false">
                            <li><a href="#">Registrar Donación</a></li>
                            <li><a href="#">Ver Donaciones</a></li>
                        </ul>
                    </li>

                    <!--Boton de Eventos desplegable-->
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="icon ion-md-paper"></i><span class="nav-text">Eventos</span></a>
                        <ul aria-expanded="false">
                            <li><a href="#">Registrar Evento</a></li>
                            <li><a href="#">Ver eventos</a></li>
                        </ul>
                    </li>

                    <!--Boton de Salas desplegable-->

                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="icon ion-md-easel"></i><span class="nav-text">Salas</span></a>
                        <ul aria-expanded="false">
                            <li><a href="./formSalas.php">Registrar Sala</a></li>
                            <li><a href="#">Ver salas</a></li>
                        </ul>
                    </li>

                    <!--Boton de Lista de asistencia desplegable-->

                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="icon ion-md-time"></i><span class="nav-text">Vitacoras</span></a>
                        <ul aria-expanded="false">
                            <li><a href="#">Ver Vitacoras</a></li>
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

                                        </div>  <!--Termina item-info-->

                                    </div>  <!--Termina item-content colBottomMargin-->

                                </div>  <!--Termina col-sm-10-->

                                <div class="col-md-12">

                                    <!--COMIENZA FORMULARIO____________________*****************************************************************___________ -->

                                    <form class="popup-form" action="update.php" method="POST" id="contactForm" name="contactform" data-toggle="validator">
                                        <div class="row">
                                            <div id="msgContactSubmit" class="hidden"></div>   <!--ver si es necesario-->

                                            <!--Comienza el bloque de inputs-->

                                            <input type="hidden" name="id_taller" value="<?php echo $row['id_taller']  ?>">

                                            <div class="col-md-6 col-sm-4 col-xs-4">
                                                          <h6 class="m-1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nombre de taller</h6>
                                                      <div class="form-group col-sm-6 col-lg-12">
                                                          <div class="help-block with-errors"></div>
                                                          
                                                          <input type="text" class="form-control" name="nombre_taller" placeholder="Nombre del Taller" value="<?php echo $row['nombre_taller']  ?>"> 
                                                          <div class="input-group-icon"><i class="fa fa-pencil"></i></div>
                                                          </div>
                                                          </div>
                                                          <!-- end form-group nombre de taller -->


                                                          <div class="col-md-6 col-sm-4 col-xs-4">
                                                          
                                                          <h6 class="m-1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Seleccione tipo de taller</h6>                                                      
                                                          <div class="form-group col-sm-6 col-lg-12">
                                                              
                                                              <div class="help-block with-errors"></div>
                                                              
                                                              <select id="" name="tipo_taller" class="form-control" required>
                                                                  <option selected disabled value="opcion"><?php echo $row['tipo_taller']  ?></option>
                                                                  <option value="Vocacional">Vocacional</option>
                                                                  <option value="Pintura">Pintura</option>
                                                                  <option value="Artesanias">Artesanias</option>
                                                                  <option value="Musica">Musica</option>
                                                              </select>
                                                              <div class="input-group-icon"><i class="fa fa-indent"></i></div>
                                                              </div>
                                                              </div><!-- end form-group tipo de taller -->
    
    
    
    
                                                              <div class="col-md-6 col-sm-4 col-xs-4">
                                                              
                                                          <h6 class="m-1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fecha de inicio de taller</h6>
                                                              
                                                              
                                                          <div class="form-group col-sm-6 col-lg-12">
                                                              <div class="help-block with-errors "></div>
                                                              
                                                                  
                                                              <input type="date" name="fecha_inicio_taller" placeholder="Fecha de inicio" class="form-control" value="<?php echo $row['fecha_inicio_taller']  ?>" >
                                                              <div class="input-group-icon"><i class="fa fa-calendar"></i></div> 
                                                                </div>
                                                          </div><!-- end form-group finicio de taller -->
    
    
    
                                                          <div class="col-md-6 col-sm-4 col-xs-4">
                                                              
                                                              <h6 class="m-1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Duración de taller</h6>
                                                             
                                                              <div class="form-group col-sm-6 col-lg-12">
                                                                  <div class="help-block with-errors"></div>
                                                                  <input type="text" name="duracion_taller" placeholder="Numero de meses" class="form-control" value="<?php echo $row['duracion_taller']  ?>">
                                                                  <div class="input-group-icon"><i class="fa fa-clock-o"></i></div> 
                                                                  </div>
                                                              </div><!-- end form-group duracion de taller -->
    
    
    
                                                            
    
    
                                                          <div class=" col-md-6 col-sm-4 col-xs-4 ">
                                                              
                                                          <h6 class="m-1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Descripcion de taller</h6>
                                                              
                                                              
                                                          <div class="form-group col-sm-6 col-lg-12">
                                                              <div class="help-block with-errors"></div>
                                                              <textarea rows="2" name="descripcion_taller" placeholder="Describe el taller" class="form-control" required data-error="Descripcion de taller"><?php echo $row['descripcion_taller']  ?></textarea>
                                                              <div class="textarea input-group-icon"><i class="fa fa-pencil"></i></div>
                                                              </div>
                                                          </div><!-- end form-group descripcion del taller -->




                                                          <div class="form-group last col-sm-12">
                                                          <button type="submit" name="btnregistrar" class="btn btn-custom" class="fa fa-save" value="Actualizar"></em> Modificar</button>
                                                             <!-- <button type="submit" name="btnregistrar" id="submit" class="btn btn-custom"><em class="fa fa-save"></em> Registrar</button>  -->
                                                              <button type="btn__reset" id="reset" class="btn btn-custom"><em class="fa fa-ban"></em><a href="prueba.php"></a> Cancelar</button>
                                                      
                                                          </div><!-- end form-group -->	                           
                             


                                                            <!-- <input type="submit" class="btn btn-primary btn-block" value="Actualizar">  -->
    


                                                          <!--Termina el bloque de inputs-->

                                        </div>  <!--Termina row dentro del formulario-->

                                    </form>  <!--Termina form-->

                                    <!--TERMINA FORMULARIO_______________*****************-->


                                </div> <!--Termina col-md-12 antes de entrar al formulario-->

                                </div>  <!--Termina row-->

                            </div>  <!--Termina item-wrap-->

                        </div>  <!--Termina col-sm-12-->

                    </div>  <!--Termina tab-content-->

                <!--</div>   row-->

            </div>  <!--Termina conteiner-->

            </div>  <!--Termina content-body-->

        </div>  <!--Termina content-->
          
  
     
  
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
          integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
          crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
          integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
          crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
          integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
          crossorigin="anonymous"></script>
          <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>
          <script>
              var ctx = document.getElementById('myChart').getContext('2d');
              var myChart = new Chart(ctx, { 
                  type: 'bar',
                  data: {
                      labels: ['Feb 2020', 'Mar 2020', 'Abr 2020', 'May 2020'],
                      datasets: [{
                          label: 'Nuevos usuarios',
                          data: [50, 100, 150, 200],
                          backgroundColor: [
                              '#12C9E5',  
                              '#12C9E5',
                              '#12C9E5',
                              '#111B54'
                          ],
                          maxBarThickness: 30,
                          maxBarLength: 2
                      }]
                  },
                  options: {
                      scales: {
                          yAxes: [{
                              ticks: {
                                  beginAtZero: true
                              }
                          }]
                      }
                  }
              });
              </script>
        <!--**********************************
            Content body end
        ***********************************-->





        <!--**********************************
            Footer start
        ***********************************-->
      <!--  <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="#" target="_blank">Quixkit</a> 2019</p>
                <p>Distributed by <a href="https://themewagon.com/" target="_blank">Themewagon</a></p> 
            </div>
        </div>-->
        <!--**********************************
            Footer end
        ***********************************-->

    </div>
     <!--**********************************
        Main wrapper END
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
     <!-- Ionic icons -->
     <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">


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
<!--_______________*******************FIN BODY**********_________________________________________________________________________________________________________________________-->




</html>