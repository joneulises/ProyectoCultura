<?php
require_once("./PHPMailer/clsMailer.php");
header('Content-type: application/json; charset=UTF-8');


$mailSend = new clsMailer();

include("conexion.php");
$con = conectar();

$correo = $_POST['co'];
$response = array();


$sql = "SELECT * FROM tb_usuario  WHERE correo ='$correo'";
$query = mysqli_query($con, $sql);

if (mysqli_num_rows($query) > 0) {

    //como el usuario tiene dos tipos de duis si es tallerita o empleado aremos lo siguiente
    while ($row = mysqli_fetch_array($query)) {
        $tipo=$row['tipo'];
        $tallerista=$row['dui_tallerista'];
        $empleado=$row['dui_empleado'];

    }

    if($tipo=='em' || $tipo=='ad'){
        $bodyHTML = '
    <h2>Recuperación de contraseña</h2>
    <br>
    <h4>Para recuperar tu contraseña ingresa al siguiente enlace</h4>
    <br>
    <h4>https://localhost/ProyectoCultura/Login/ActualizarPass.php?var='.$empleado.'&t='.$tipo.'</h4>

    <br>
    ';

    }else{
        $bodyHTML = '
    <h2>Recuperación de contraseña</h2>
    <br>
    <h4>Para recuperar tu contraseña ingresa al siguiente enlace</h4>
    <br>
    <h4>https://localhost/ProyectoCultura/Login/ActualizarPass.php?var='.$tallerista.'&t=='.$tipo.'</h4>

    <br>
    ';

    }//fin else tipo


    $enviado = $mailSend->metEnviar("Recuperación", "", $correo, "Recuperación de contraseña", $bodyHTML);

    if ($enviado) {
        $response['status'] = 'success';
        $response['message'] = 'Verifica tu correo electrónico para poder seguir con la recuperación de contraseña...';
    } else {
        echo ("No se puede enviar el correo");
    }
} else {
    $response['status'] = 'error';
    $response['message'] = 'Correo no coincide con el registrado...';
}

echo json_encode($response);
