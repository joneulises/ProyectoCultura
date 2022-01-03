 
 <!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8">
	<meta content="IE=edge" http-equiv="X-UA-Compatible">
	<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1"/>
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	
	<title>Form_Tallerista</title>
	<!-- set your website meta description and keywords -->
	<meta name="description" content="Add your business website description here">
	<meta name="keywords" content="Add your business website keywords here">
	<!-- set your website favicon -->
	<link href="favicon.html" rel="icon">	
	
	<!-- Bootstrap Stylesheets -->
	<link rel="stylesheet" href="../Views/Tallerista/css/bootstrap.min.css">
	<!-- Font Awesome Stylesheets -->
	<link rel="stylesheet" href="../Views/Tallerista/css/font-awesome.min.css">
	<!-- Template Main Stylesheets -->
	<link rel="stylesheet" href="../Views/Tallerista/css/contact-form.css" type="text/css">	
	
</head>

<body>
	
	<section id="contact-form-section" class="form-content-wrap">
		<div class="container">
			<div class="row">
				<div class="tab-content">
					<div class="col-sm-12">
						<div class="item-wrap">
							<div class="row">
								
								<div class="col-sm-12">
									<div class="item-content colBottomMargin">
										<div class="item-info">
											<h2 class="item-title text-center">Registro de tallerista</h2>
											
										</div><!--End item-info -->
										
								   </div><!--End item-content -->
								</div><!--End col -->
								<div class="col-md-12">
								
								
	<form  action="TalleristasController.php"  method="POST" enctype="multipart/form-data" data-toggle="validator" class="popup-form">
						<div class="row">
						<div id="msgContactSubmit" class="hidden"></div>

                         <input type="hidden" name="action" value="insert">
                          <div class="row">

                            <div class="col-md-6">
                            <label>Nombre</label>
                              <div class="form-group">
                                <input type="text" autocomplete="off" name="nombre" id="nombre" class="form-control" required placeholder="Ingrese su nombre"/>
                                <div class="textarea input-group-icon"><i class="fa fa-pencil"></i></div>
                              </div>
                            </div>

                            <div class="col-md-6">
                            <label>Apellidos</label>
                              <div class="form-group">
                                <input type="text" autocomplete="off" name="apellido" id="apellido" class="form-control" required placeholder="Ingrese sus apellidos"/>
                                <div class="textarea input-group-icon"><i class="fa fa-pencil"></i></div>
                              </div>
                            </div>

                            <div class="col-md-6">
                            <label>DUI</label>
                              <div class="form-group"> 
                                <input type="text" autocomplete="off" name="dui" id="dui" class="form-control" required placeholder="00000000-0" size="10" maxlength="10"  />
                                <div class="input-group-icon"><i class="fa fa-address-card"></i></div>
                            </div>
                            </div>

                            <div class="col-md-6">
                            <label class="control-label">Genero</label>
                              <div class="form-group">
                                <select id="sexo_tallerista" name="sexo_tallerista" class="form-control" >
								     <option  selected>Seleccione...</option>
                                    <option value="F" >Femenino</option>
                                    <option value="M" >Masculino</option>
                                </select>    
                                <div class="input-group-icon"><i class="fa fa-indent"></i></div>           
                              </div>
                            </div>

                            <div class="col-md-6">
                            <label>Fecha nacimiento</label>
                              <div class="form-group">
                                <input type="date" autocomplete="off" name="fecha_n" id="fecha_n" class="form-control" required placeholder="Ingrese su fecha"/>
                                <div class="input-group-icon"><i class="fa fa-calendar"></i></div> 
                            </div>
                            </div>

                            <div class="col-md-6">
                            <label>Fecha Contrato</label>
                              <div class="form-group">
                                <input type="date" autocomplete="off" name="fecha_c" id="fecha_c" class="form-control" required placeholder="Ingrese su fecha"/>
                                <div class="input-group-icon"><i class="fa fa-calendar"></i></div> 
                            </div>
                            </div>
							
				<!--<div class="row form-group">-->
                    <div class="col-md-6">
                        <label class="control-label" for="idcanton">Canton de procedencia</label>
						<div class="form-group">
                        <select name="idcanton" id="idcanton" class="form-control">
						<option>Seleccione un canton</option>
                            <?php
  
                            foreach ($objetoretornadoCanton as $p) {?>
      
                            <option value="<?php echo $p->id_canton?>"> <?php echo $p->nombre_canton?> </option>
                    
                          <?php  }
                            ?>
                        </select>
						<div class="input-group-icon"><i class="fa fa-indent"></i></div>  
                    </div>
					</div>
	
					
													
						  <div class="form-group col-sm-12">
                          <label>Dirección</label>
                          <div class="form-group">
						 <textarea rows="3" name="direccion" id="direccion" placeholder="Escribe tu dirección aquí*" class="form-control" required data-error="Comentarios"></textarea>
						 <div class="textarea input-group-icon"><i class="fa fa-pencil"></i></div>
						</div><!-- end form-group -->
													
													<div class="form-group last col-sm-12">
														<button type="submit" id="submit" class="btn btn-custom"><em class="fa fa-save"></em> Registrar</button>
                                                        <button type="reset" id="reset" class="btn btn-custom"><em class="fa fa-ban"></em>Cancelar</a></button>
														<button  class="btn btn-custom"><a href="http://localhost/siawget/menu_administrador.php" style="color:#f8f9fa;">Volver a Menu</a></button>
                                                </div><!-- end form-group -->
                                                    
											
													
													<div class="clearfix"></div>
												</div><!-- end row -->



	</form><!-- end form -->
											
											
									
									
								  
								
								</div>
							</div><!--End row -->
							
						
								
							
							<!-- Popup end -->
							
						</div><!-- end item-wrap -->
					</div><!--End col -->
				</div><!--End tab-content -->
			</div><!--End row -->
		</div><!--End container -->
	</section>
	
	
	
	
	
	
	
	
	
	

	
	<div class="colBottomMargin">
		&nbsp;<div class="colBottomMargin">&nbsp;</div>
	</div>	
	
	<div id="footer" class="footer">
		<div class="container">			
			
			<div class="row">					
				<div class="footer-top col-sm-12">
					<p class="text-center copyright">&copy; Diseño II 2021 <a href="https://www.ues.edu.sv" class="footer-site-link">Universidad de El Salvador</a> todos los derechos reservados. </p>
				</div><!-- end col --> 
			</div><!-- end row -->
			
		</div><!--End container -->
	</div>
	
	<a href="#" class="scrollup"><i class="fa fa-arrow-circle-up"></i></a>
		
	<!-- jQuery Library -->
	<script src="../Views/Tallerista/js/jquery-3.2.1.min.js"></script>	
	<!-- Popper js -->
	<script src="../Views/Tallerista/js/popper.min.js"></script>
	<!-- Bootstrap Js -->
	<script src="../Views/Tallerista/js/bootstrap.min.js"></script>
	<!-- Form Validator -->
	<script src="../Views/Tallerista/js/validator.min.js"></script>
	<!-- Contact Form Js -->
	<script src="../Views/Tallerista/js/contact-form.js"></script>
	
</body>
</html>
  

 