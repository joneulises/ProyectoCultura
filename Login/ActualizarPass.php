<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title></title>
    <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0, minimum-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="estilos.css">
    <link rel="stylesheet" href="../vendor/sweetalert2/dist/sweetalert2.min.css">
    <style>
        .text-success {
            color: #28a745;
        }

        .text-danger {
            color: #dc3545;
        }
    </style>


</head>

<body>
    <form class="formulario" action="" method="POST">

        <h1>Atualización de Contraseña </h1>
        <div class="contenedor">

            <div class="input-contenedor">
                <i class="fas fa-address-card icon"></i>
                <input type="password" name="pass1" id="pass1" placeholder="Ingresa tu nueva contraseña">

            </div>

            <div class="input-contenedor">
                <i class="fas fa-envelope icon"></i>
                <input type="password" name="pass2" id="pass2" onChange="checkPasswordMatch();" placeholder="Repite tu contraseña">
            </div>

            <div class="input-contenedor">
                <div class="registrationFormAlert" id="mostrarAlerta">
                </div>


            </div>
            <input type="submit" name="registrar" value="Actualizar" id="contra" class="button">
            <p> <a class="link" href="ogininicio.php"> CANCELAR</a></p>
        </div>
    </form>
    <script src="../tablas_css/jquery/jquery-3.3.1.min.js"></script>
    <script src="../vendor/sweetalert2/dist/sweetalert2.min.js"></script>
    <script>
        //verificacion de contrasena
        function checkPasswordMatch() {
            var password = $("#pass1").val();
            var confirmPassword = $("#pass2").val();

            if (password != confirmPassword) {
                $("#mostrarAlerta").html("Contraseña no coinciden!").addClass('text-danger').removeClass('text-success');
                $("#contra").prop("disabled", true);

            } else {
                $("#mostrarAlerta").html("Contraseña correctas!.").addClass('text-success').removeClass('text-danger');
                $("#contra").prop("disabled", false);

            }
        }
    </script>


    <?php
    //TODO EL CODIGO PARA GUARDAR
    if (isset($_POST['registrar'])) {
        include_once("../con_db.php");
        $con = conectar();


        $pass = $_POST['pass2'];
        $tipo = $_GET['t'];
        $dui = $_GET['var'];

        //PARA ENCRIPTAR LA CONTRASEÑA
        $clave =  password_hash($_POST["pass2"], PASSWORD_DEFAULT);



        if ($tipo === "ad" || $tipo === "em") {

            $query = "UPDATE tb_usuario SET pass ='$clave' WHERE dui_empleado ='$dui'";
            $resultado = mysqli_query($conex, $query);
        } else {
            $query = "UPDATE tb_usuario SET pass ='$clave' WHERE dui_tallerista ='$dui'";

            $resultado = mysqli_query($conex, $query);
        }

        if ($resultado) {
            // die("Este DUI ya está siendo ocupado!");
            echo '<script>
            Swal({
             title: "Actualización",
             text: "Contraseña actualizada correctamente!",
             type: "success",
             confirmButtonText: "Aceptar",
             closeOnConfirm: false
             }).then(function(result){
                if(result.value){                   
                 window.location = "logininicio.php";
                }
             });
            </script>';
        }

        //fin de probar alertas
    }


    ?>

</body>



</html>