<?php

require '../Config/Connection.php';

class Tallerista{

    //propiedades de los datos de la tabla
     protected $dui_tallerista;
     protected $nombre_tallerista;
     protected $apellido_tallerista;
     protected $sexo_tallerista;
     protected $fecha_nacimiento_tallerista;
     protected $fecha_contrato_tallerista;
     protected $direccion_tallerista;
     protected $id_canton;

    protected function InsertTallerista()
    {
        $ic = new Connection();
         $sql = "INSERT INTO tb_talleristas(dui_tallerista, nombre_tallerista,apellido_tallerista,sexo_tallerista,fecha_nacimiento_tallerista,fecha_contrato_tallerista,direccion_tallerista,
         id_canton) VALUES (?,?,?,?,?,?,?,?)" ;
         $insertar = $ic->db->prepare($sql);
         $insertar->bindParam(1,$this->dui_tallerista);
         $insertar->bindParam(2,$this->nombre_tallerista);
         $insertar->bindParam(3,$this->apellido_tallerista);
         $insertar->bindParam(4,$this->sexo_tallerista);
         $insertar->bindParam(5,$this->fecha_nacimiento_tallerista);
         $insertar->bindParam(6,$this->fecha_contrato_tallerista);
         $insertar->bindParam(7,$this->direccion_tallerista);
         $insertar->bindParam(8,$this->id_canton);
         $insertar->execute();

    }

  protected function SearchAllTalleristas(){
    $ic = new Connection();
    $sql="SELECT * ,DATE_FORMAT(fecha_nacimiento_tallerista,'%d/%m/%y') AS fecha_nacimiento_tallerista,DATE_FORMAT(fecha_contrato_tallerista,'%d/%m/%y') AS fecha_contrato_tallerista FROM tb_talleristas";
    $mostrar = $ic->db->prepare($sql);
    $mostrar->execute();
    $objetoretornadotalleristas = $mostrar->fetchAll(PDO::FETCH_OBJ);
    return $objetoretornadotalleristas;
  }

  public function delete($dui){
    $ic = new Connection();
    try{
      $query = "DELETE FROM tb_talleristas WHERE dui_tallerista=?";
      $smt = $ic->db->prepare($query);
      $smt->execute(array($dui));
    }catch(Exception $e){
       die($e->getMessage());
    }
  }
  

}




?>