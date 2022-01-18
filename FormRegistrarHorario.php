<?php

session_start();
if($_SESSION['empleado'] ==''){
    header("Location:index.php");
}
$_var=$_SESSION['user_name'];
date_default_timezone_set('America/El_Salvador');
$fechaActual = date('Y-m-d H:i:s');

include("con_db.php");
$con = conectar();


include_once("./Plantilla/cabezera.php");
include_once("./Plantilla/menuAdministrador.php");
?>

    <!--**********************************
            Content body start
        ***********************************-->
    <!--Inicia Formulario-->
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
                                            <h2 class="item-title text-center">Registro de Horario</h2>

                                        </div>  <!--Termina item-info-->

                                    </div>  <!--Termina item-content colBottomMargin-->

                                </div>  <!--Termina col-sm-10-->

                                <div class="col-md-12">

                                    <!--COMIENZA FORMULARIO____________________*****************************************************************___________ -->

          <form class="popup-form"  action=""  method="POST" id="contactForm" name="contactform" data-toggle="validator">
						<div class="row">
						     <div id="msgContactSubmit" class="hidden"></div>


                            <div class="col-md-6">
                            <label class="control-label">Seleccioné el Día</label>
                              <div class="form-group">
                                <select  name="dia" class="form-control" required placeholder="Ingresé su nombre" >
                                     <option value=""></option>
                                    <option value="Lunes" >Lunes</option>
                                    <option value="Martes" >Martes</option>
                                    <option value="Miercoles" >Miercoles</option>
                                    <option value="Jueves" >Jueves</option>
                                    <option value="Viernes" >Viernes</option>
                                    <option value="Sabado" >Sabado</option>
                                    <option value="Domingo" >Domingo</option>
                                </select>    
                                <div class="input-group-icon"><i class="fa fa-indent"></i></div>           
                              </div>
                            </div>

                            <div class="col-md-6">
                            <label>Hora de Inició</label>
                              <div class="form-group">
						
                                <input type="time" autocomplete="off" name="hora_inicio"  class="form-control" min="07:00" max="18:00" />
                                <div class="input-group-icon"><i class="fa fa-clock-o"></i></div> 
                            </div>
                            </div>

                            <div class="col-md-6">
                            <label>Hora de finalización</label>
                              <div class="form-group">
						
                                <input type="time" autocomplete="off" name="hora_fin"  class="form-control" min="07:00" max="18:00" />
                                <div class="input-group-icon"><i class="fa fa-clock-o"></i></div> 
                            </div>
                            </div>

                            
							
				     <!--<div class="row form-group">-->
                         <!--inicion del div-->
                       <div class="col-md-6">
                        <label class="control-label" >Seleccioné la Sala</label>
						<div class="form-group">
                        <select name="idsala"  class="form-control" required placeholder="Ingresé su nombre" >
                       
						<option value=""></option>

                        <?php
                                         $sql="SELECT *  FROM tb_salas";
                                         $query=mysqli_query($con,$sql);
                                     
                                        
                                            while($row=mysqli_fetch_array($query)){
                                        ?>
                                             <option value="<?php  echo $row['id_sala']?>"> <?php  echo $row['nombre_sala']?> </option>
                                        <?php 
                                            }
                                        ?>

                          
                        </select>
						<div class="input-group-icon"><i class="fa fa-indent"></i></div>  
                    </div>
					</div> <!--fin div -->


                     <!--inicion del div-->
                     <div class="col-md-6">
                        <label class="control-label" >Seleccioné el taller</label>
						<div class="form-group">
                        <select name="idtaller"  class="form-control" required placeholder="Ingresé su nombre" >
                       
                        <option value=""  ></option>

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
						<div class="input-group-icon"><i class="fa fa-indent"></i></div>  
                    </div>
					</div> <!--fin div -->
                     <!--inicion del div-->
                     <div class="col-md-6">
                        <label class="control-label" >Seleccioné el tallerista </label>
						<div class="form-group">
                        <select name="idtallerista"  class="form-control" required placeholder="Ingresé su nombre">
                       
						<option value=""></option>

                        <?php
                                         $sql="SELECT dui_tallerista,CONCAT(nombre_tallerista, ' ', apellido_tallerista) AS nombre FROM tb_talleristas";
                                         $query=mysqli_query($con,$sql);
                                     
                                        
                                            while($row=mysqli_fetch_array($query)){
                                        ?>
                                             <option value="<?php  echo $row['dui_tallerista']?>"> <?php  echo $row['nombre']?> </option>
                                        <?php 
                                            }
                                        ?>

                          
                        </select>
						<div class="input-group-icon"><i class="fa fa-indent"></i></div>  
                    </div>
					</div> <!--fin div -->
	
					
													
						  
													
													<div class="form-group last col-sm-12">
                                                    <input type="submit" name="registrar" value="Guardar" class="btn btn-custom" class="fa fa-save">
													<!--	<button type="submit" id="submit" class="btn btn-custom"><em class="fa fa-save"></em> Registrar</button>-->
                                                        <button type="reset" id="reset" class="btn btn-custom"><em class="fa fa-ban"></em>Cancelar</a></button>
													
                                                </div><!-- end form-group -->
                                                    
											
													
													<div class="clearfix"></div>
												</div><!-- end row -->



	                 </form><!-- end form -->
									

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


    <!--Termina Formulario-->

    <!--**********************************
            Content body end
        ***********************************-->


        <?php 
 

 include_once("./Plantilla/footer.php");
 
 include_once("./Plantilla/seccionScript.php");
 
 //TODO EL CODIGO PARA GUARDAR
     if (isset($_POST['registrar'])){
  
   
    $dia = $_POST['dia'];
    $hora_inicio = $_POST['hora_inicio'];
    $hora_fin = $_POST['hora_fin'];
    $idsala = $_POST['idsala'];
    $idtaller = $_POST['idtaller'];
    $idtallerista = $_POST['idtallerista'];
   
 
    $query = "INSERT INTO tb_horarios(dia, hora_inicio, hora_fin, id_sala, id_taller, id_tallerista) VALUES ('$dia','$hora_inicio','$hora_fin','$idsala','$idtaller','$idtallerista')";
    $resultado = mysqli_query($conex,$query);

    //consulta para insertar a la tabla bitacora
     
    $query2 = "INSERT INTO tb_bitacora (evento_bitacora,tabla_bitacora,fecha_bitacora,accion_bitacora,usuario_bitacora) values('Se ha insertado un registro','tb_horarios','$fechaActual','$dia','$_var')";
    mysqli_query($conex, $query2);
    

    echo '<script>
    Swal({
     title: "Registro",
     text: "Guardado!",
     type: "success",
     confirmButtonText: "Aceptar",
     closeOnConfirm: false
     }).then(function(result){
        if(result.value){                   
         window.location = "Ver_Horario.php";
        }
     });
    </script>';
    }
         
 
 
 //FIN DE CODIGO PARA GUARDAR
 
 //plantilla fin
 include_once("./Plantilla/fin.php");
 ?>
