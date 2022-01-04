<?php
include("con_db.php");
$con = conectar();


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
                                            <h2 class="item-title text-center">Registro de Tallerista</h2>

                                        </div>
                                        <!--Termina item-info-->

                                    </div>
                                    <!--Termina item-content colBottomMargin-->

                                </div>
                                <!--Termina col-sm-10-->

                                <div class="col-md-12">

                                    <!--COMIENZA FORMULARIO____________________*****************************************************************___________ -->

                                    <form class="popup-form" action="Conregistrar_Talleristadb.php" method="POST" id="contactForm" name="contactform" data-toggle="validator">
                                        <div class="row">
                                            <div id="msgContactSubmit" class="hidden"></div>

                                            <div class="col-md-6">
                                                <label>Nombre</label>
                                                <div class="form-group">

                                                    <input type="text" autocomplete="off" name="nombre" class="form-control" required placeholder="Ingresé su nombre" />
                                                    <div class="textarea input-group-icon"><i class="fa fa-pencil"></i></div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label>Apellidos</label>
                                                <div class="form-group">
                                                    <input type="text" autocomplete="off" name="apellido" class="form-control" required placeholder="Ingresé sus apellidos" />
                                                    <div class="textarea input-group-icon"><i class="fa fa-pencil"></i></div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label>DUI</label>
                                                <div class="form-group">
                                                    <input type="text" autocomplete="off" name="dui" class="form-control" pattern="^[0-9]{8}-[0-9]{1}$" required placeholder="00000000-0" size="10" maxlength="10" />
                                                    <div class="input-group-icon"><i class="fa fa-address-card"></i></div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="control-label">Genero</label>
                                                <div class="form-group">
                                                    <select name="sexo_tallerista" class="form-control">
                                                        <option selected>Seleccioné...</option>
                                                        <option value="F">Femenino</option>
                                                        <option value="M">Masculino</option>
                                                    </select>
                                                    <div class="input-group-icon"><i class="fa fa-indent"></i></div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label>Fecha nácimiento</label>
                                                <div class="form-group">

                                                    <input type="date" autocomplete="off" name="fecha_n" class="form-control" required placeholder="Ingresé su fecha" />
                                                    <div class="input-group-icon"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label>Fecha Contrato</label>
                                                <div class="form-group">
                                                    <input type="date" autocomplete="off" name="fecha_c" class="form-control" required placeholder="Ingrese su fecha" />
                                                    <div class="input-group-icon"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label>Teléfono</label>
                                                <div class="form-group">
                                                    <input name="telefono" type="text" autocomplete="off" class="form-control" pattern="^[0-9]{4}-[0-9]{4}$" placeholder="0000-0000" size="9" maxlength="9">
                                                    <div class="input-group-icon"><i class="fa fa-phone"></i></div>
                                                </div>
                                            </div>

                                            <!--<div class="row form-group">-->
                                            <div class="col-md-6">
                                                <label class="control-label">Cantón de procedencia</label>
                                                <div class="form-group">
                                                    <select name="idcanton" class="form-control">

                                                        <option required>Seleccioné un cantón</option>

                                                        <?php
                                                        $sql = "SELECT *  FROM tb_cantones";
                                                        $query = mysqli_query($con, $sql);


                                                        while ($row = mysqli_fetch_array($query)) {
                                                        ?>
                                                            <option value="<?php echo $row['id_canton'] ?>"> <?php echo $row['nombre_canton'] ?> </option>
                                                        <?php
                                                        }
                                                        ?>


                                                    </select>
                                                    <div class="input-group-icon"><i class="fa fa-indent"></i></div>
                                                </div>
                                            </div>



                                            <div class="form-group col-sm-12">
                                                <label>Dirección</label>
                                                <div class="form-group">
                                                    <textarea rows="3" name="direccion" placeholder="Escribe tu dirección aquí*" class="form-control" required data-error="Comentarios"></textarea>
                                                    <div class="textarea input-group-icon"><i class="fa fa-pencil"></i></div>
                                                </div><!-- end form-group -->

                                                <div class="form-group last col-sm-12">
                                                    <input type="submit" name="registrar" value="Guardar" class="btn btn-custom" class="fa fa-save">
                                                    <!--	<button type="submit" id="submit" class="btn btn-custom"><em class="fa fa-save"></em> Registrar</button>-->
                                                    <button type="reset" id="reset" class="btn btn-custom"><em class="fa fa-ban"></em>Cancelar</a></button>

                                                </div><!-- end form-group -->



                                                <div class="clearfix"></div>
                                            </div><!-- end row -->



                                    </form><!-- end form -->


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


<?php include_once("./Plantilla/footer.php");


//plantilla fin
include_once("./Plantilla/fin.php");
//seccion de registro
include_once("Conregistrar_Talleristadb.php");
//seccion de registro
?>

