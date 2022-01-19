<?php
include("con_db.php");
$con = conectar();


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
        <h2 class="text-center text-light">Listado de Eventos</h2>
    </header>
    <div style="height:50px"></div>
   
    
    <!--Ejemplo tabla con DataTables-->
    <div class="container">
    <?php if (isset($_SESSION['message'])) { ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <?= $_SESSION['message'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } ?>
        <a href="./menu_administrador.php" class="btn btn-primary">
            <h4> Volver al Menú </h4>
        </a>
        <a href="./FormRegistrarEvento.php" class="btn btn-primary">
            <h4> Nuevo Evento </h4>
        </a>
            <br>
        <a href="./reporte_eventos.php" class="btn btn-info">
        <i class="fa fa-print"></i> 
        </a>
      
        <br>

        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Nombre de Evento</th>
                                <th>Fecha de Evento</th>
                                <th>Hora de Evento</th>
                                <th>Localidad</th>
                                <th>Direccion de evento</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                                
                    
                               
                                
                                
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                                         $sql="SELECT
                                         c.nombre_canton, 
                                         t.id_evento, 
                                         t.nombre_evento,                                          
                                         DATE_FORMAT(t.fecha_evento,'%d/%m/%y') AS fecha_evento,                                         
                                         t.hora_evento,
                                         t.direccion_evento
                                     FROM
                                         tb_eventos AS t
                                         INNER JOIN
                                         tb_cantones AS c
                                         ON 
                                             t.id_canton = c.id_canton ";
                                         $query=mysqli_query($con,$sql);
                                     
                                        
                                            while($row=mysqli_fetch_array($query)){
                                        ?>
                                            <tr>
                                                <td><?php  echo $row['id_evento']?></td>
                                                <td><?php  echo $row['nombre_evento']?></td>
                                                <td><?php  echo $row['fecha_evento']?></td>
                                                <td><?php  echo $row['hora_evento']?></td> 
                                                <td><?php  echo $row['nombre_canton']?></td>
                                                <td><?php  echo $row['direccion_evento']?></td>
                                                     
                                                <td><a href="FormActualizar_Evento.php?id=<?php echo $row['id_evento'] ?>" class="btn btn-info" >Editar</a></td>
                                                <td><a href="javascript:void(0)" class="btn btn-danger" id="delete_id" data-id="<?php echo $row['id_evento'] ?>">Eliminar</a></td>                                      
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

    
    <!-- código JS propìo-->
    <script type="text/javascript" src="tablas_css/tallerista.main.js"></script>

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
                                url: 'Delete_Evento.php',
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
                                        window.location = "Ver_evento.php";
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
