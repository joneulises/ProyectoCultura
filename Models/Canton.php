<?php 

class Canton{
     private $id_canton;
     private $nombre_canton;


     public function SearchAllCantones(){
         $ic = new Connection();
         $sql ="SELECT * FROM tb_cantones";
         $mostrar = $ic->db->prepare($sql);
         $mostrar->execute();
         $objetoretornadoCanton = $mostrar->FetchALL(PDO::FETCH_OBJ);
         return $objetoretornadoCanton;
     }
     
}




?>