<?php

include("con_db.php");


//$sql="SELECT * FROM tb_cantones WHERE id_canton='$id'";
//$query=mysqli_query($con,$sql);


$usuarios = isset($usuarios) ? $usuarios : array();
$numero_aleatorio = mt_rand(0, 9999);
while (strlen($numero_aleatorio) < 4) {
    $numero_aleatorio = "0" . $numero_aleatorio;
}


if (isset($_POST['btnregistrar'])) {

    //Datos de Responsable 
    $nombre_res = trim($_POST['nombre_res']);
    $ape_res =  trim($_POST['apellido_res']);
    $parentesco =  trim($_POST['parentesco']);
    $numero_res = trim($_POST['telefono_res']);








    //Datos de Alumno 

    $nombre_alumno = trim($_POST['nombre']);
    $apellido_alumno = trim($_POST['apellido']);
    $fecha_alumno = $_REQUEST['fechanac'];
    $municipio_alumno = trim($_POST['municipio']);
    $sexo_alumno = trim($_POST['sexo']);
    $zona_alumno = trim($_POST['canton']);
    $canton_alumno = trim($_POST['canton']);
    $direccion_alumno = trim($_POST['direccion']);
    $telefono_alumno = trim($_POST['phone']);
    $taller_alumno = trim($_POST['taller']);


    //Datos de telefono 
    //El mismo "Telefono de alumno" y "Nombre de alumno" junto con  
    //"Nombre res" y "telefono res"


    echo $nombre_alumno;
    echo $apellido_alumno;
    echo $sexo_alumno;
    echo $zona_alumno;
    echo $nombre_res;
    echo $ape_res;
    echo $parentesco;

    $sqltabla1 = "INSERT INTO `tb_responsable`(`id_responsable`,`nombre_responsable`, `apellido_responsable`, `parentesco`, telefono) VALUES ('$numero_aleatorio','$nombre_res','$ape_res','$parentesco','$numero_res')";
    $resultado = mysqli_query($conex, $sqltabla1);

    if ($resultado == 1) {
?>
        <h3 class="ok">¡Se guardo el Responsable correctamente!</h3>


        <?php

        $sqltabla2 = "INSERT INTO `tb_alumnos`(`id_alumno`,`nombre_alumno`, `apellido_alumno`, `fecha_nacimiento_alumno`, `sexo_alumno`, `zona_alumno`, `id_canton`, `direccion_alumno`, id_responsablre, telefono) VALUES ('$numero_aleatorio','$nombre_alumno','$apellido_alumno','$fecha_alumno','$sexo_alumno','$zona_alumno','$canton_alumno','$direccion_alumno','$numero_aleatorio','$telefono_alumno')";
        $resul = mysqli_query($conex, $sqltabla2);


        if ($resul == 1) {
        ?>
            <h3 class="ok">¡Se guardo el Alumno correctamente!</h3>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
 
    <script>
    window.onload=function(){
                // Una vez cargada la página, el formulario se enviara automáticamente.
		document.forms["miformulario"].submit();
    }
    </script>
</head>
 
<body>

            <form name="miformulario" action="comprobante.php" method="POST">

                <input type="text" name="nombre_res" value= "<?php echo $_POST['nombre_res']?>" >
                <input type="text" name="apellido_res" value= "<?php echo $_POST['apellido_res']?>" >
                <input type="text" name="parentesco" value= "<?php echo $_POST['parentesco']?>" >
                <input type="text" name="telefono_res" value="<?php echo $_POST['telefono_res']?>" >

                <input type="text" name="nombre" value="<?php echo $_POST['nombre']?>" >
                <input type="text" name="apellido" value="<?php echo $_POST['apellido']?>" >
                <input type="text" name="fechanac" value="<?php echo $_POST['fechanac']?>" >
                <input type="text" name="municipio" value="<?php echo $_POST['municipio']?>" >
                <input type="text" name="sexo" value="<?php echo $_POST['sexo']?>" >
                <input type="text" name="canton" value="<?php echo $_POST['canton']?>" >
                <input type="text" name="direccion" value="<?php echo $_POST['direccion']?>" >
                <input type="text" name="phone" value="<?php echo $_POST['phone']?>" >
                <input type="text" name="taller" value="<?php echo $_POST['taller']?>">
                
            </form>
            
            </body>
</html>

        <?php
        
        }
    } else {
        ?>
        <h3 class="bad">¡Ups ha ocurrido un error!</h3>
    <?php
    }
} else {
    ?>
    <h3 class="bad">¡Por favor complete los campos!</h3>
<?php
}

//fin de boton registrar

?>