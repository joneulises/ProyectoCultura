<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title></title> 
	<meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0, minimum-scale=1.0">
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" >
 <link rel="stylesheet" href="estilos.css">
	

</head>  
<body>
    <form class="formulario">
    
    <h1>BIENVENID@</h1>
    <h1>Casa de la Cultura San Vicente</h1>
      
     <div class="contenedor">
       <div class="col-12 user-img" >
            <img src="img/logo.png" th:src="@{img/logo.png}"/>
        </div>
        
        
         <div class="input-contenedor">
         <i class="fas fa-user icon"></i>
         <input type="text" placeholder="Nombre de usuario">
         
         </div>
         
         <div class="input-contenedor">
        <i class="fas fa-key icon"></i>
         <input type="password" placeholder="Contraseña">
         
         </div>
         <button type="submit" class="button"><i class="fas fa-sign-in-alt"></i>  Acceder </button>
        <!-- <input type="submit" value="Ingresar" class="button" >  --> 
        <p><a class="link" href="verificacioncontra.html">¿Olvido la contraseña? </a><p></p>
         <p>¿No tienes una cuenta? <a class="link" href="verificarusuario.html">Registrate </a></p>
     </div>
    </form>
</body>
</html>