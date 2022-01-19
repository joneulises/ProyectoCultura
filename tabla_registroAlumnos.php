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

<link rel="stylesheet" href="assets/contact-form/css/contact-form.css">
</head>

<body>
    <header>
        <h2 class="text-center text-light">Casa de la cultura</h2>
        <h2 class="text-center text-light">Listado de Alumnos</h2>
    </header>
    <div style="height:50px"></div>
     <button  class="btn btn-custom"><a href="menu_administrador.php" style="color:#f8f9fa;">Volver a Menu</a></button>



    <!--Ejemplo tabla con DataTables-->
  
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th style="color: white;">ID</th>
                                <th style="color: white;">Nombre</th>
                                <th style="color: white;">Apellido</th>
                                <th style="color: white;">Fecha Nacimiento</th>
                                <th style="color: white;">Sexo</th>
                                <th style="color: white;">Direccion</th>
                                <th style="color: white;">Canton</th>
                                <th style="color: white;">Editar</th>
                                <!--<th style="color: white;">Eliminar</th>-->
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                                         $sql="SELECT
                                         tb_alumnos.nombre_alumno,
                                         tb_alumnos.apellido_alumno,
                                         tb_alumnos.id_alumno,
                                         tb_alumnos.fecha_nacimiento_alumno,
                                         tb_alumnos.sexo_alumno,
                                         tb_alumnos.id_canton,
                                         tb_alumnos.direccion_alumno,
                                         tb_cantones.nombre_canton
                                         FROM
                                         tb_alumnos
                                         INNER JOIN tb_cantones ON tb_alumnos.id_canton = tb_cantones.id_canton
                                         GROUP BY direccion_alumno";
                                         $query=mysqli_query($con,$sql);
                                     
                                        
                                            while($row=mysqli_fetch_array($query)){
                                        ?>
                                            <tr style="color: black;">
                                                <td><?php  echo $row['id_alumno']?></td>
                                                <td><?php  echo $row['nombre_alumno']?></td>
                                                <td><?php  echo $row['apellido_alumno']?></td>
                                                <td><?php  echo $row['fecha_nacimiento_alumno']?></td> 
                                                <td><?php  echo $row['sexo_alumno']?></td>
                                                <td><?php  echo $row['direccion_alumno']?></td> 
                                                <td><?php  echo $row['nombre_canton']?></td> 

                                                <td><a href="actualizar_registro_Alumnos.php?id=<?php echo $row['id_alumno'] ?>" class="btn btn-info">Editar</a></td>
                                                <!--<td><a href="delete.php?id=<?php echo $row['id_alumno'] ?>" class="btn btn-danger">Eliminar</a></td>     -->                                   
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


</body>

</html>

