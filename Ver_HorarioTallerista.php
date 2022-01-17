<?php

session_start();
if($_SESSION['tallerista'] ==''){
    header("Location:index.php");
}
include("con_db.php");
$con = conectar();
$extraer = $_SESSION['tallerista'];




?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="#" />
    <title>Casa de la cultura</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="tablas_css/bootstrap/css/bootstrap.min.css">
    <!-- CSS personalizado -->
    <link rel="stylesheet" href="tablas_css/main.css">


    <!--datables CSS básico-->
    <link rel="stylesheet" type="text/css" href="tablas_css/datatables/datatables.min.css" />
    <!--datables estilo bootstrap 4 CSS-->
    <link rel="stylesheet" type="text/css" href="tablas_css/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">

    <!--font awesome con CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    
    <!--ALERTAS PARA EL SISTEMA-->
    <link rel="stylesheet" href="./vendor/sweetalert2/dist/sweetalert2.min.css">

</head>


<body>
    <header>
        <h2 class="text-center text-light">Casa de la cultura</h2>
        <h2 class="text-center text-light">Listado de Horarios</h2>
    </header>
    <div style="height:50px"></div>
   
    <!--Ejemplo tabla con DataTables-->
    <div class="container">
         <a href="http://localhost/ProyectoCultura/menu_tallerista.php" class="btn btn-primary"><h4> Volver al Menú </h4></a>
         
        <br>

        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Dia</th>
                                <th>Hora de Inició</th>
                                <th>Hora de Finalización</th>
                                <th>Sala</th>
                                <th>Taller</th>
                                <th>Tallerista</th>
                                
                               
                                
                                
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                                         $sql="SELECT
                                         horario.id_horario,
                                         horario.dia,
                                         horario.hora_inicio,
                                         horario.hora_fin,
                                         sala.nombre_sala,
                                         taller.nombre_taller,
                                         CONCAT( nombre_tallerista, ' ', apellido_tallerista ) AS nombre 
                                     FROM
                                         tb_horarios AS horario
                                         INNER JOIN tb_salas AS sala ON horario.id_sala = sala.id_sala
                                         INNER JOIN tb_talleres AS taller ON horario.id_taller = taller.id_taller
                                         INNER JOIN tb_talleristas AS tallerista ON horario.id_tallerista = tallerista.dui_tallerista WHERE id_tallerista='$extraer'";
                                         $query=mysqli_query($con,$sql);
                                     
                                        
                                            while($row=mysqli_fetch_array($query)){
                                        ?>
                                            <tr style="color: black;">
                                                <td><?php  echo $row['id_horario']?></td>
                                                <td><?php  echo $row['dia']?></td>
                                                <td><?php  echo $row['hora_inicio']?></td>
                                                <td><?php  echo $row['hora_fin']?></td> 
                                                <td><?php  echo $row['nombre_sala']?></td>
                                                <td><?php  echo $row['nombre_taller']?></td>  
                                                <td><?php  echo $row['nombre']?></td> 
                                                
                                                 

                                            </tr>
                                        <?php 
                                            }
                                        ?>






                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery, Popper.js, Bootstrap JS -->
    <script src="tablas_css/jquery/jquery-3.3.1.min.js"></script>
    <script src="tablas_css/popper/popper.min.js"></script>
    <script src="tablas_css/bootstrap/js/bootstrap.min.js"></script>

    <!-- datatables JS -->
    <script type="text/javascript" src="tablas_css/datatables/datatables.min.js"></script>

    <!-- para usar botones en datatables JS -->
    <script src="tablas_css/datatables/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="tablas_css/datatables/JSZip-2.5.0/jszip.min.js"></script>
    <script src="tablas_css/datatables/pdfmake-0.1.36/pdfmake.min.js"></script>
    <script src="tablas_css/datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
    <script src="tablas_css/datatables/Buttons-1.5.6/js/buttons.html5.min.js"></script>

    <!-- código JS propìo-->
    <script type="text/javascript" src="tablas_css/main.js"></script>

    <!--PARA LAS ALERTAS-->
    <script src="./vendor/sweetalert2/dist/sweetalert2.min.js"></script>

    <script>
        $(document).ready(function() {

            $(document).on('click', '#delete_id', function(e) {
                //recogemos los datos
                var id = $(this).data('id');
              //  alert(id);
                //funcion que elimina
                Delete(id);
                e.preventDefault();
            });

        });

        function Delete(id) {

            swal({
                title: 'Estas seguro?',
                text: "Se borrará de forma permanente!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, bórralo!',
                showLoaderOnConfirm: true,

                preConfirm: function() {
                    return new Promise(function(resolve) {
                       // alert('entre');
                        $.ajax({
                                url: 'Delete_Horario.php',
                                type: 'POST',
                                data: 'delete=' +id,
                                dataType: 'json'
                            })
                            .done(function(response) {
                                //dibujar la  respuesta
                                Swal({
                                    title: "Eliminado!",
                                    text: response.message,
                                    type: "success",
                                    confirmButtonText: "Aceptar",
                                    closeOnConfirm: false
                                }).then(function(result) {
                                    if (result.value) {
                                        window.location = "Ver_Horario.php";
                                    }
                                });
                            })
                            .fail(function() {
                                swal('Oops...', 'Algo salió mal con ajax !', 'error');
                            });
                    });
                },
                allowOutsideClick: false
            });

        }
    </script>


</body>

</html>
