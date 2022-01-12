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
        <h2 class="text-center text-light">Listado de Talleristas</h2>

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
        <a href="http://localhost/ProyectoCultura/menu_administrador.php" class="btn btn-primary">
            <h4> Volver al Menú </h4>
        </a>
        <br>

        <div class="row">
            <div class="col-lg-12">

                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Dui</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Fecha Nácimiento</th>
                                <th>Fecha Contrato</th>
                                <th>Teléfono</th>
                                <th>Dirección</th>
                                <th>Cantón</th>
                                <th>Editar</th>
                                <th>Eliminar</th>


                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT
                                         c.nombre_canton, 
                                         t.dui_tallerista, 
                                         t.nombre_tallerista, 
                                         t.apellido_tallerista, 
                                         DATE_FORMAT(t.fecha_nacimiento_tallerista,'%d/%m/%y') AS fecha_nacimiento_tallerista, 
                                         DATE_FORMAT(t.fecha_contrato_tallerista,'%d/%m/%y') AS fecha_contrato_tallerista, 
                                         t.direccion_tallerista, 
                                         t.telefono
                                     FROM
                                         tb_talleristas AS t
                                         INNER JOIN
                                         tb_cantones AS c
                                         ON 
                                             t.id_canton = c.id_canton";
                            $query = mysqli_query($con, $sql);


                            while ($row = mysqli_fetch_array($query)) {
                            ?>
                                <tr>
                                    <td><?php echo $row['dui_tallerista'] ?></td>
                                    <td><?php echo $row['nombre_tallerista'] ?></td>
                                    <td><?php echo $row['apellido_tallerista'] ?></td>
                                    <td><?php echo $row['fecha_nacimiento_tallerista'] ?></td>
                                    <td><?php echo $row['fecha_contrato_tallerista'] ?></td>
                                    <td><?php echo $row['telefono'] ?></td>
                                    <td><?php echo $row['direccion_tallerista'] ?></td>
                                    <td><?php echo $row['nombre_canton'] ?></td>
                                    <td><a href="FormActualizar_Tallerista.php?dui=<?php echo $row['dui_tallerista'] ?>" class="btn btn-info">Editar</a></td>
                                    <td><a href="javascript:void(0)" class="btn btn-danger" id="delete_dui" data-id="<?php echo $row['dui_tallerista'] ?>">Eliminar</a></td>
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

            $(document).on('click', '#delete_dui', function(e) {
                //recogemos los datos
                var dui = $(this).data('id');
               // alert(dui);
                //funcion que elimina
                Delete(dui);
                e.preventDefault();
            });

        });

        function Delete(dui) {

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
                                url: 'Delete_Tallerista.php',
                                type: 'POST',
                                data: 'delete=' +dui,
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
                                        window.location = "Ver_Tallerista.php";
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