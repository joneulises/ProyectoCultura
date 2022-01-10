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
    <form class="formulario" action="">

        <h1>Verificación Recuperar Contraseña </h1>
        <div class="contenedor">

            <div class="input-contenedor">
                <i class="fas fa-address-card icon"></i>
                <input type="text" name="dui" id="dui" placeholder="Ingresa tu numero de Dui">

            </div>

            <div class="input-contenedor">
                <i class="fas fa-envelope icon"></i>
                <input type="text" name="correo" id="correo" placeholder="Correo Electronico">
            </div>


        </div>
        <input type="button" value="Verificar" id="contra" class="button">
        <p> <a class="link" href="registrarcontra.html"> CANCELAR</a></p>
        </div>
    </form>
    <script src="../tablas_css/jquery/jquery-3.3.1.min.js"></script>
    <script src="../vendor/sweetalert2/dist/sweetalert2.min.js"></script>


    <script>
        //VAMOS ADAR DE ALTA AL USUARIO
        $(document).on('click', '#contra', function(e) {
            //recogemos los datos
            var dui = document.getElementById("dui").value;
            var correo = document.getElementById("correo").value;
            if (dui == '' && correo == '') {
                Swal({
                    title: "Campos vacíos",
                    text: "Verifique los campos",
                    type: "warning",
                    confirmButtonText: "Aceptar",
                    closeOnConfirm: false
                }).then(function(result) {
                    if (result.value) {
                        window.location = "verificacioncontra.php";
                    }
                });

            } else {
                //alert(dui);
                //funcion que elimina
                EnviarCorreo(dui, correo);
            }
            e.preventDefault();
        });
        //FIN ALTA USUARIO EMPLEADO

        function EnviarCorreo(dui, correo) {

            $.ajax({
                    url: '../enviar_correo.php',
                    type: 'POST',
                    data: {
                        du: dui,
                        co: correo
                    },
                    dataType: 'json'
                })
                .done(function(response) {
                    //dibujar la  respuesta
                   
                        Swal({
                        title: "Verifica tu correo!",
                        text: response.message,
                        type: "warning",
                        confirmButtonText: "Aceptar",
                        closeOnConfirm: false
                    }).then(function(result) {
                        if (result.value) {
                            window.location = "logininicio.php";
                        }
                    });

                   
                })
                .fail(function() {
                    swal('Oops...', 'Algo salió mal con ajax !', 'error');
                });

        }
    </script>

</body>



</html>