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
        <h2 class="text-center text-light">Listado de Usuarios</h2>

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
        <a href="http://localhost/VersionDF/menu_administrador.php" class="btn btn-primary">
            <h4> Volver al Menú </h4>
        </a>
        <br>

        <div class="row">
            <div class="col-lg-12">

                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Empleado</th>
                                <th>Tallerista</th>
                                <th>Usuario</th>
                                <th>Cargo</th>
                                <th>Correo</th>
                                <th>Estado</th>
                                <th>Editar</th>
                                <th>Acciones</th>


                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM tb_usuario";
                            $query = mysqli_query($con, $sql);


                            while ($row = mysqli_fetch_array($query)) {
                            ?>
                                <tr>
                                    <td><?php echo $row['dui_empleado'] ?></td>
                                    <td><?php echo $row['dui_tallerista'] ?></td>
                                    <td><?php echo $row['user'] ?></td>
                                    <td><?php echo $row['tipo'] ?></td>
                                    <td><?php echo $row['correo'] ?></td>
                                    <td><?php echo $row['estado'] ?></td>
                                    <?php
                                    if ($row['tipo'] == 'ad' || $row['tipo'] == 'em') {
                                    ?>
                                        <td><a href="FormActualizar_UsuarioEm.php?dui=<?php echo $row['dui_empleado'] ?>" class="btn btn-info">Editar em</a></td>
                                        <?php
                                        if ($row['estado'] == 'activo') {
                                        ?>
                                            <td><a href="javascript:void(0)" class="btn btn-danger" id="delete_em" data-id="<?php echo $row['dui_empleado'] ?>">dar baja</a></td>
                                        <?php
                                        } else {
                                        ?>
                                            <td><a href="javascript:void(0)" class="btn btn-success" id="alta_em" data-id="<?php echo $row['dui_empleado'] ?>">dar alta</a></td>

                                        <?php
                                        } // else estado empleado
                                    } else {
                                        ?>
                                        <td><a href="FormActualizar_UsuarioTa.php?dui=<?php echo $row['dui_tallerista'] ?>" class="btn btn-info">Editar ta</a></td>
                                        <?php
                                        if ($row['estado'] == 'activo') {
                                        ?>
                                            <td><a href="javascript:void(0)" class="btn btn-danger" id="delete_ta" data-id="<?php echo $row['dui_tallerista'] ?>">dar baja</a></td>
                                        <?php
                                        } else {
                                        ?>
                                            <td><a href="javascript:void(0)" class="btn btn-success" id="alta_ta" data-id="<?php echo $row['dui_tallerista'] ?>">dar alta</a></td>
                                    <?php
                                        } //else estado
                                    } //else  tipo
                                    ?>
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

            $(document).on('click', '#delete_em', function(e) {
                //recogemos los datos
                var dui = $(this).data('id');
                //alert(dui);
                //funcion que elimina
                baja_em(dui);
                e.preventDefault();
            });

            //VAMOS ADAR DE ALTA AL USUARIO
            $(document).on('click', '#alta_em', function(e) {
                //recogemos los datos
                var dui = $(this).data('id');
                //alert(dui);
                //funcion que elimina
                alta_em(dui);
                e.preventDefault();
            });
            //FIN ALTA USUARIO EMPLEADO

        });

        function baja_em(dui) {

            swal({
                title: 'Estas seguro?',
                text: "Dará de Baja al usuario!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si!',
                showLoaderOnConfirm: true,

                preConfirm: function() {
                    return new Promise(function(resolve) {
                        // alert('entre');
                        $.ajax({
                                url: 'BajaUsuarioEm.php',
                                type: 'POST',
                                data: 'delete=' + dui,
                                dataType: 'json'
                            })
                            .done(function(response) {
                                //dibujar la  respuesta
                                Swal({
                                    title: "De Baja!",
                                    text: response.message,
                                    type: "success",
                                    confirmButtonText: "Aceptar",
                                    closeOnConfirm: false
                                }).then(function(result) {
                                    if (result.value) {
                                        window.location = "Ver_usuario.php";
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
        //FUNCION DAR DE ALTA USUARIO
        function alta_em(dui) {

            swal({
                title: 'Estas seguro?',
                text: "Darás de alta al usuario!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si!',
                showLoaderOnConfirm: true,

                preConfirm: function() {
                    return new Promise(function(resolve) {
                        // alert('entre');
                        $.ajax({
                                url: 'AltaUsuarioEm.php',
                                type: 'POST',
                                data: 'delete=' + dui,
                                dataType: 'json'
                            })
                            .done(function(response) {
                                //dibujar la  respuesta
                                Swal({
                                    title: "De Alta!",
                                    text: response.message,
                                    type: "success",
                                    confirmButtonText: "Aceptar",
                                    closeOnConfirm: false
                                }).then(function(result) {
                                    if (result.value) {
                                        window.location = "Ver_usuario.php";
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
        //FUNCION DAR DE BAJA USUARIO
    </script>

 <!--FUNCION PARA TALLERISTA-->

 <script>
        $(document).ready(function() {

            $(document).on('click', '#delete_ta', function(e) {
                //recogemos los datos
                var dui = $(this).data('id');
                //alert(dui);
                //funcion que elimina
                baja_ta(dui);
                e.preventDefault();
            });

            //VAMOS ADAR DE ALTA AL USUARIO
            $(document).on('click', '#alta_ta', function(e) {
                //recogemos los datos
                var dui = $(this).data('id');
                //alert(dui);
                //funcion que elimina
                alta_ta(dui);
                e.preventDefault();
            });
            //FIN ALTA USUARIO TALLERISTA

        });
       //DAR DE BAJA AL USUARIO TALLERISTA
        function baja_ta(dui) {

            swal({
                title: 'Estas seguro?',
                text: "Dará de Baja al usuario!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si!',
                showLoaderOnConfirm: true,

                preConfirm: function() {
                    return new Promise(function(resolve) {
                        // alert('entre');
                        $.ajax({
                                url: 'BajaUsuarioTa.php',
                                type: 'POST',
                                data: 'delete=' + dui,
                                dataType: 'json'
                            })
                            .done(function(response) {
                                //dibujar la  respuesta
                                Swal({
                                    title: "De Baja!",
                                    text: response.message,
                                    type: "success",
                                    confirmButtonText: "Aceptar",
                                    closeOnConfirm: false
                                }).then(function(result) {
                                    if (result.value) {
                                        window.location = "Ver_usuario.php";
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
        //FUNCION DAR DE ALTA USUARIO
        function alta_ta(dui) {

            swal({
                title: 'Estas seguro?',
                text: "Darás de alta al usuario!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si!',
                showLoaderOnConfirm: true,

                preConfirm: function() {
                    return new Promise(function(resolve) {
                        // alert('entre');
                        $.ajax({
                                url: 'AltaUsuarioTa.php',
                                type: 'POST',
                                data: 'delete=' + dui,
                                dataType: 'json'
                            })
                            .done(function(response) {
                                //dibujar la  respuesta
                                Swal({
                                    title: "De Alta!",
                                    text: response.message,
                                    type: "success",
                                    confirmButtonText: "Aceptar",
                                    closeOnConfirm: false
                                }).then(function(result) {
                                    if (result.value) {
                                        window.location = "Ver_usuario.php";
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
        //FUNCION DAR DE BAJA USUARIO
    </script>





</body>

</html>