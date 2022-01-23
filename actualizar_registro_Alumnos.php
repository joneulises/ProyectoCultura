<?php
session_start();
if($_SESSION['empleado'] ==''){
    header("Location:index.php");
}

$_var=$_SESSION['user_name'];
date_default_timezone_set('America/El_Salvador');
$fechaActual = date('Y-m-d H:i:s');
include("conexion.php");
$con = conectar();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM `tb_alumnos` INNER JOIN tb_responsable ON tb_alumnos.id_responsablre=tb_responsable.id_responsable INNER JOIN tb_cantones ON tb_alumnos.id_canton=tb_cantones.id_canton INNER JOIN tb_municipios ON tb_cantones.id_municipio=tb_municipios.id_municipio  WHERE id_alumno='$id'";
    $resultado = mysqli_query($con, $sql);
        //   echo 'ya estoy modifiacndo';
        $row = mysqli_fetch_array($resultado);
        $idalumno = $row['id_alumno'];
        $nombrealumno = $row['nombre_alumno'];
        $apellidoalumno = $row['apellido_alumno'];
        $f_n = $row['fecha_nacimiento_alumno'];
        $sexoalumno = $row['sexo_alumno'];
        $idcanton = $row['id_canton'];
        $direc = $row['direccion_alumno'];
        $telefono = $row['telefono'];
        $idtaller = $row['taller_alumno'];
        $nombreres = $row['nombre_responsable'];
        $apellidores = $row['apellido_responsable'];
        $parentesco = $row['parentesco'];
        $telefonores = $row['telefono'];
        
    
}


include_once("./Plantilla/cabezera.php");
include_once("./Plantilla/menuAdministrador.php");

?>

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
                                        <h2 class="item-title text-center">Modificar Alumno</h2>

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
                                            <div id="msgContactSubmit" class="hidden"></div>   <!--ver si es necesario-->

                                            <!--Comienza el bloque de inputs-->

                                          

                                            <input type="hidden" name="id_alumno" value="<?php echo $id;  ?>">
                                        <div class="col-md-6">
                                            <label>Nombre</label>
                                            <div class="form-group">

                                                <input type="text" autocomplete="off" name="nombre" class="form-control" required placeholder="Ingrese su nombre" value="<?php echo $nombrealumno; ?>" />
                                                <div class="textarea input-group-icon"><i class="fa fa-pencil"></i></div>
                                            </div>
                                        </div>

                                            <div class="col-md-6 col-sm-4 col-xs-4">
												<label class="label">Apellido*</label>
												<div class="form-group col-sm-6 col-lg-12">
													<div class="help-block with-errors"></div>
													<input name="apellido" id="apellido" class="form-control"
														type="text" required data-error="Por favor ingrese su apellido" value="<?php echo $apellidoalumno  ?>" >
													<div class="input-group-icon"><i class="fa fa-pencil"></i></div>
												</div>
											</div><!-- end form-group -->



											<div class="col-md-6 col-sm-4 col-xs-4">
												<label class="label">Fecha de nacimiento*</label>
												<div class="form-group col-sm-6 col-lg-12">
													<div class="help-block with-errors"></div>
													<input name="fechanac" id="fechanac" class="form-control"
														type="date" required
														data-error="Por favor ingrese su fecha de nacimiento" onchange="FormatDateField(this)" value="<?php echo $f_n ?>">
													<div class="input-group-icon"><i class="fa fa-calendar"></i></div>
												</div>
											</div><!-- end form-group -->


                                            <div class="col-md-6 col-sm-4 col-xs-4">
												<label class="label">Canton</label>
												<div class="form-group col-sm-6 col-lg-12">
													<div class="help-block with-errors"></div>
													<select name="canton" id="canton" class="form-control" 
														type="text" data-error="Por favor seleccione el cantón" ?>">
                                                       
                                                        <!--Spinner de datos  -->

                                                        <option><?php echo $idcanton; ?> </option>

                                                        <?php
                                                            $sql="SELECT *  FROM tb_cantones";
                                                            $query=mysqli_query($con,$sql);
                                     
                                                            while($row=mysqli_fetch_array($query)){
                                                        ?>
                                                            <option value="<?php  echo $row['id_canton']?>" <?php  if($row['id_canton'] == $canton){ echo 'selected'; }?>>  </option>
                                                            <?php 
                                                            }
                                                            ?>


                                                    </select>
													<div class="input-group-icon"><i class="fa fa-map-pin"></i></div>
												</div>
											</div><!-- end form-group -->

											<div class="col-md-6 col-sm-4 col-xs-4">
												<label class="label">Sexo</label>
												<div class="form-group col-sm-6 col-lg-12">
													<div class="help-block with-errors"></div>
													<select name="sexo" id="sexo" class="form-control" required
														data-error="Por favor seleccione su sexo" ?>" >
                                                        <option selected><?php echo $sexoalumno  ?></option>
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
													<input name="direccion" id="direccion" class="form-control"
														type="text" required
														data-error="Por favor ingrese su Dirección" value="<?php echo $direc ?>" >
													<div class="input-group-icon"><i class="fa fa-street-view"></i>
													</div>
												</div>
											</div><!-- end form-group -->

											<div class="col-md-6 col-sm-4 col-xs-4">
												<label class="label">Ingrese su numero de teléfono*</label>
												<div class="form-group col-sm-6 col-lg-12">
													<div class="help-block with-errors"></div>
													<input name="phone" id="phone" class="form-control" type="phone"
														required data-error="Por favor ingrese su teléfono" value="<?php echo $telefono ?>">
													<div class="input-group-icon"><i class="fa fa-phone"></i></div>
												</div>
											</div><!-- end form-group -->

											<div class="col-md-6 col-sm-4 col-xs-4">
												<label class="label">Seleccione el taller</label>
												<div class="form-group col-sm-6 col-lg-12">
													<div class="help-block with-errors"></div>
													<select name="taller" id="taller" class="form-control" required
														data-error="Por favor ingresa la direccion del evento">
                                                        
                                                        <!-- Spinner de la tabla Taller--> 
                                                        
                                                        <option><?php echo $idtaller; ?> </option>

                                                        <?php
                                                            $sql="SELECT *  FROM tb_talleres";
                                                            $query=mysqli_query($con,$sql);
                                     
                                                            while($row=mysqli_fetch_array($query)){
                                                        ?>
                                                            <option value="<?php  echo $row['id_taller']?>"> <?php  echo $row['nombre_taller']?> </option>
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
												<label class="label">Nombre de su responsable*</label>
												<div class="form-group col-sm-6 col-lg-12">
													<div class="help-block with-errors"></div>
													<input name="nombre_res" id="nombre_res" class="form-control"
														type="text" required data-error="Por favor ingrese su apellido" value="<?php echo $nombreres  ?>" >
													<div class="input-group-icon"><i class="fa fa-pencil"></i></div>
												</div>
											</div><!-- end form-group -->




                                            <div class="col-md-6 col-sm-4 col-xs-4">
												<label class="label">Ingrese el teléfono de su persona
													reponsable*</label>
												<div class="form-group col-sm-6 col-lg-12">
													<div class="help-block with-errors"></div>
													<input name="telefono_res" id="telefono_res" class="form-control"
														type="phone" required
														data-error="Por favor ingrese el teléfono de su persona responsable" value="<?php echo $telefonores ?>" >
													<div class="input-group-icon"><i class="fa fa-phone"></i></div>
												</div>
											</div><!-- end form-group -->
											<div class="col-md-6 col-sm-4 col-xs-4">
												<label class="label">Ingrese el apellido de su persona
													responsable*</label>
												<div class="form-group col-sm-6 col-lg-12">
													<div class="help-block with-errors"></div>
													<input name="apellido_res" class="form-control"
														type="text" required data-error="Por favor ingrese el apellido de su persona responsable" value="<?php echo $apellidores ?>" >
													<div class="input-group-icon"><i class="fa fa-pencil"></i></div>
												</div>
											</div><!-- end form-group -->

                                            <div class="col-md-6 col-sm-4 col-xs-4">
												<label class="label">Ingrese el parentesco con su persona
													responsable*</label>
												<div class="form-group col-sm-6 col-lg-12">
													<div class="help-block with-errors"></div>
													<input name="parentesco" class="form-control" type="text" required
														data-error="Por favor ingrese el parentesco con su persona responsable" value="<?php echo $parentesco ?>" >
													<div class="input-group-icon"><i class="fa fa-sitemap"></i></div>
												</div>
											</div><!-- end form-group -->
    
                                               
                                                          <div class="form-group last col-sm-12">

                                                          <button type="submit" name="update" class="btn btn-custom" class="fa fa-save"></em> Actualizar</button>
                                                             <!-- <button type="submit" name="btnregistrar" id="submit" class="btn btn-custom"><em class="fa fa-save"></em> Registrar</button>  -->
                                                             <a href="./tabla_registroAlumnos.php" class="btn btn-custom" class="fa fa-save" >
                                                                 <h7> Cancelar </h7>
                                                                 </a>
                                                      
                                                          </div><!-- end form-group -->	     
    


                                                          <!--Termina el bloque de inputs-->

                                        </div>  <!--Termina row dentro del formulario-->

                                    </form>  <!--Termina form-->

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
            Content body end
        ***********************************-->


<?php


include_once("./Plantilla/footer.php");

include_once("./Plantilla/seccionScript.php");

//TODO EL CODIGO PARA ACTUALIZAR

if (isset($_POST['update'])) {
     $id = $_POST['id_alumno'];

    $nombrealumno  = $_POST['nombre'];
    $apellidoalumno = $_POST['apellido'];
    $f_n = $_POST['fechanac'];
    $idcanton = $_POST['canton'];
    $sexoalumno = $_POST['sexo'];
    $direc = $_POST['direccion'];
    $telefono = $_POST['phone'];
    $idtaller=$_POST['taller'];



    $sql = "UPDATE `tb_alumnos` SET `id_alumno`='$id',`nombre_alumno`='$nombrealumno',`apellido_alumno`='$apellidoalumno',`fecha_nacimiento_alumno`='$f_n',`sexo_alumno`='$sexoalumno',`id_canton`='$idcanton',`direccion_alumno`='$direc',`telefono`='$telefono',`taller_alumno`='$idtaller' WHERE id_alumno='$id'";
    $resutado = mysqli_query($con, $sql);
    //consulta para insertar a la tabla bitacora
    $query2 = "INSERT INTO tb_bitacora (evento_bitacora,tabla_bitacora,fecha_bitacora,accion_bitacora,usuario_bitacora) values('Se ha modificado un registro','tb_talleristas','$fechaActual',concat('Registro Actualizado a','$nombret'),'$_var')";
    mysqli_query($con, $query2);
    if ($resultado) {
        // die("Este DUI ya está siendo ocupado!");
        echo '<script>
    Swal({
     title: "Actualizado",
     text: "Registro actualizado correctamente!",
     type: "success",
     confirmButtonText: "Aceptar",
     closeOnConfirm: false
     }).then(function(result){
        if(result.value){                   
         window.location = "tabla_registroAlumnos.php";
        }
     });
    </script>';
    }


    //header("Location: Ver_Tallerista.php");
}

//FIN DE CODIGO PARA ACTUALIZAR

//plantilla fin
include_once("./Plantilla/fin.php");
?>