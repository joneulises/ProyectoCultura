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
    
</head>
<script type="text/javascript">
      function ConfirmDelete()
      {
        var respuesta = confirm("Estas seguro que deseas Eliminar el Horario ?");
        if(respuesta == true){
          return true;
        }else{
          return false;
        }
      }
</script>

<body>
    <header>
        <h2 class="text-center text-light">Casa de la cultura</h2>
        <h2 class="text-center text-light">Listado de Horarios</h2>
    </header>
    <div style="height:50px"></div>
   
    <!--Ejemplo tabla con DataTables-->
    <div class="container">
         <a href="http://localhost/VersionDF/menu_administrador.php" class="btn btn-primary"><h4> Volver al Menú </h4></a>
         <a href="http://localhost/VersionDF/FormRegistrarHorario.php" class="btn btn-primary"><h4> Nuevo Horario </h4></a>
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
                                <th>Editar</th>
                                <th>Eliminar</th>
                               
                                
                                
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
                                         INNER JOIN tb_talleristas AS tallerista ON horario.id_tallerista = tallerista.dui_tallerista";
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
                                                <td><a href="FormActualizar_Horario.php?id=<?php echo $row['id_horario'] ?>" class="btn btn-info" >Editar</a></td>
                                                <td><a href="Delete_Horario.php?id=<?php echo $row['id_horario'] ?>" class="btn btn-danger"  onclick="return ConfirmDelete()">Eliminar</a></td> 



                                                

                                             
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
