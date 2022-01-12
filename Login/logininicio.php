<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title></title>
    <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0, minimum-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="estilos.css">
    <link rel="stylesheet" href="../vendor/sweetalert2/dist/sweetalert2.min.css">


</head>

<body>

    <form class="formulario" action="" method="POST">
        <h1>BIENVENID@</h1>
        <h1>Casa de la Cultura San Vicente</h1>

        <div class="contenedor">


            <div class="col-12 user-img">
                <img src="img/logo.png" th:src="@{img/logo.png}" />
            </div>


            <div class="input-contenedor">
                <i class="fas fa-user icon"></i>
                <input type="text" name="usu" placeholder="Nombre de usuario">

            </div>

            <div class="input-contenedor">
                <i class="fas fa-key icon"></i>
                <input type="password" name="con" placeholder="Contraseña">

            </div>
            <input type="submit" name="acceder" id="guardar_r" value="Acceder" class="button fas fa-sign-in-alt">
            <!-- <input type="submit" value="Ingresar" class="button" >  -->
            <p><a class="link" href="verificacioncontra.php">¿Olvido la contraseña? </a>
            <p></p>
            

        </div>
    </form>
    <script src="../vendor/sweetalert2/dist/sweetalert2.min.js"></script>
    <?php
    session_start();
    include_once("../con_db.php");
    $conn = conectar();

    if (isset($_POST['acceder'])) {

        if (!empty($_POST['usu']) and !empty($_POST['con'])) {

            $usu = $_POST['usu'];
            $con = $_POST['con'];
            //echo $usu;

            $sql = "SELECT * FROM tb_usuario where user='$usu'";
            $query = mysqli_query($conn, $sql);

            if ($query) { //si es exitosa la consulta entrara sino al else donde estara la alerta

                if ($row = mysqli_fetch_array($query)) {
                    $contra = $row['pass'];//contraseña
                    if (password_verify($con, $contra)) { //VERIFICAR EL ENCRIPTADO DE LA CONTRASEÑA

                      if ($row['estado'] == 'activo') {
                            $nombre = $row['user'];
                            $_SESSION['user_name'] = $nombre;
                            $_SESSION['tipo_user'] = $row['tipo'];
                            $_SESSION['empleado'] = $row['dui_empleado'];
                            $_SESSION['tallerista'] = $row['dui_tallerista'];
                            //SI EL QUE INICIA SESION ES UN EMPLEADO
                            if ($row['tipo'] == 'em') {
                                echo '<script>
                         Swal({
                         title: "Bienvenido",
                         text: "Datos de usuario correctos!",
                         type: "success",
                         confirmButtonText: "Aceptar",
                         closeOnConfirm: false
                         }).then(function(result){
                            if(result.value){                   
                             window.location = "../menu_empleado.php";
                            }
                         });
                         </script>';
                            }
                            //FIN DE QUE EL INICIO DE SESION ES EMPLEADO
                            //SI EL QUE INICIA SESION ES UN ADMINISTRADOR
                        
                              if ($row['tipo'] == 'ad') {
                                echo '<script>
                         Swal({
                          title: "Bienvenido",
                         text: "Datos de usuario correctos!",
                         type: "success",
                         confirmButtonText: "Aceptar",
                         closeOnConfirm: false
                         }).then(function(result){
                            if(result.value){                   
                             window.location = "../menu_administrador.php";
                            }
                         });
                         </script>';
                         }
                            //FIN DE QUE EL INICIO DE SESION ES ADMINISTRADOR

                            //SI EL QUE INICIA SESION ES UN TALLERISTA
                          if ($row['tipo'] == 'ta') {
                                echo '<script>
                         Swal({
                         title: "Bienvenido",
                         text: "Datos de usuario correctos!",
                         type: "success",
                         confirmButtonText: "Aceptar",
                         closeOnConfirm: false
                         }).then(function(result){
                            if(result.value){                   
                             window.location = "../menu_tallerista.php";
                            }
                         });
                         </script>';
                            }
                            //FIN DE QUE EL INICIO DE SESION ES UN TALLERISTA

                        }else{
                            echo '<script>
                            Swal({
                             title: "Error",
                             text: "Usuario Inactivo!",
                             type: "warning",
                             confirmButtonText: "Aceptar",
                             closeOnConfirm: false
                             }).then(function(result){
                                if(result.value){                   
                                 window.location = "logininicio.php";
                                }
                             });
                            </script>';
    
                        } //
                    }else{
                        echo '<script>
                        Swal({
                         title: "Error",
                         text: "Contraseña de usuario incorrecta!",
                         type: "warning",
                         confirmButtonText: "Aceptar",
                         closeOnConfirm: false
                         }).then(function(result){
                            if(result.value){                   
                             window.location = "logininicio.php";
                            }
                         });
                        </script>';

                    }//CONTRASENA INCORRECTA
             } else {

                    echo '<script>
                        Swal({
                         title: "Error",
                         text: "Usuario no registrado!",
                         type: "warning",
                         confirmButtonText: "Aceptar",
                         closeOnConfirm: false
                         }).then(function(result){
                            if(result.value){                   
                             window.location = "logininicio.php";
                            }
                         });
                        </script>';
                }
            } else {
                echo '<script>
                Swal({
                 title: "Error",
                 text: "Usuario no registrado o inactivo!",
                 type: "warning",
                 confirmButtonText: "Aceptar",
                 closeOnConfirm: false
                 }).then(function(result){
                    if(result.value){                   
                     window.location = "logininicio.php";
                    }
                 });
                </script>';
            }
        }else{

            echo '<script>
            Swal({
             title: "Error",
             text: "Campos Vacíos!",
             type: "warning",
             confirmButtonText: "Aceptar",
             closeOnConfirm: false
             }).then(function(result){
                if(result.value){                   
                 window.location = "logininicio.php";
                }
             });
            </script>';

        }
    } //if btn
    ?>



</body>

</html>