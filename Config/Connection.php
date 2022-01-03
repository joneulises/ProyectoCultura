<?php

 class Connection 
{
   
    public $db;
        // Creamos nuestro metodo constructor para iniciar la conexion a la base de Datos!!

    public function __construct(){
    // TRY intentar conectar y en caso de que genere un error no lo muestre en pantalla!!
    try{
        $this->db = new  PDO("mysql:host=localhost;dbname=siawget_db","root","");
     //   echo"<script>alert('La conexion se realzo correctamente')</script>";
    }catch (PDOException $error){
        echo "Error --> : " .$error->getMessage();
      // echo"<script>alert('Ocurrio un error al conectarse')</script>".$error->getMessage();
    }
   
}
 
public function CloseConnection(){
    $this->db=null;
}

    
}

?>