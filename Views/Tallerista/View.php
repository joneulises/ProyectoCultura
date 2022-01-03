
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="#" />  
    <title>Casa de la cultura</title>
      
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../Views/Tallerista/Table/bootstrap/css/bootstrap.min.css">
    <!-- CSS personalizado --> 
    <link rel="stylesheet" href="../Views/Tallerista/Table/main.css">  

      
    <!--datables CSS básico-->
   <link rel="stylesheet" type="text/css" href="../Views/Tallerista/Table/datatables/datatables.min.css"/>
    <!--datables estilo bootstrap 4 CSS-->  
    <link rel="stylesheet"  type="text/css" href="../Views/Tallerista/Table/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
           
    <!--font awesome con CDN-->  
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">  
      
  </head>
    
  <body> 
     <header>
         <h2 class="text-center text-light">Casa de la cultura</h2>
         <h2 class="text-center text-light">Listado de Talleristas</h2>
    </header>   
    <div style="height:50px"></div>
     
    <!--Ejemplo tabla con DataTables-->
    <div class="container">
    <a href="http://localhost/siawget/Controllers/TalleristasController.php?action=insert" ><h4>Nuevo Tallerista </h4></a>

        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">        
                        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Dui</th>
                                    <th>Nombre</th>                             
                                    <th>Apellidos</th>
                                    <th>Fecha Nacimiento</th>
                                    <th>Fecha Contrato</th>
                                    <th>Dirección</th>
                                    <th>Editar</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                              <!--Mostrando todos los registros-->
                              <?php
  
  foreach ($objetoretornadotalleristas as $p) {?>

  <tr>
      <td> <?php echo $p->dui_tallerista ?></td>
      <td> <?php echo $p->nombre_tallerista ?></td>
      <td> <?php echo $p->apellido_tallerista ?></td>
      <td> <?php echo $p->fecha_nacimiento_tallerista ?></td>
      <td> <?php echo $p->fecha_contrato_tallerista ?></td>
      <td> <?php echo $p->direccion_tallerista ?></td>
      <td> <!-- Button editar -->
       <button type="button" class="btn btn-success editbtn" data-bs-toggle="modal" data-bs-target="#editar">
       Editar
      </button></td>
      <td> <!-- Button eliminar -->
       <a href="?action=eliminar&dui=<?php echo $p->dui_tallerista;?>" class="btn btn-danger">Eliminar</a>
       </td>
      

  </tr>

<?php  }
  ?>

  
  

  
         
                        </tbody>        
                       </table>                  
                    </div>
                </div>
        </div>  
    </div>    
     
    <!-- jQuery, Popper.js, Bootstrap JS -->
    <script src="../Views/Tallerista/Table/jquery/jquery-3.3.1.min.js"></script>
    <script src="../Views/Tallerista/Table/popper/popper.min.js"></script>
    <script src="../Views/Tallerista/Table/bootstrap/js/bootstrap.min.js"></script>
      
    <!-- datatables JS -->
    <script type="text/javascript" src="../Views/Tallerista/Table/datatables/datatables.min.js"></script>    
     
    <!-- para usar botones en datatables JS -->  
    <script src="../Views/Tallerista/Table/datatables/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>  
    <script src="../Views/Tallerista/Table/datatables/JSZip-2.5.0/jszip.min.js"></script>    
    <script src="../Views/Tallerista/Table/datatables/pdfmake-0.1.36/pdfmake.min.js"></script>    
    <script src="../Views/Tallerista/Table/datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
    <script src="../Views/Tallerista/Table/datatables/Buttons-1.5.6/js/buttons.html5.min.js"></script>
     
    <!-- código JS propìo-->    
    <script type="text/javascript" src="../Views/Tallerista/Table/main.js"></script>  
    
    
  </body>
</html>
