<?php
   require '../Models/Tallerista.php';

class TalleristasControlller extends Tallerista {

    public function ViewInsert()
    {
        require '../Models/Canton.php';
        $instanciaCanton = new Canton();
        $objetoretornadoCanton = $instanciaCanton->SearchAllCantones();
        require_once '../Views/Tallerista/Insert.php';
       
        
    }

    public function SaveInfoForModel($dui,$nombre,$apellido,$sexo_tallerista,$fecha_n,$fecha_c,$direccion,$idcanton){
        $this->dui_tallerista=$dui;
        $this->nombre_tallerista=$nombre;
        $this->apellido_tallerista=$apellido;
        $this->sexo_tallerista=$sexo_tallerista;
        $this->fecha_nacimiento_tallerista=$fecha_n;
        $this->fecha_contrato_tallerista=$fecha_c;
        $this->direccion_tallerista=$direccion;
        $this->id_canton=$idcanton;
        $this->InsertTallerista();
        $this->Redirect();


    }

    public function ListView(){
      $objetoretornadotalleristas = $this->SearchAllTalleristas();
      require '../Views/Tallerista/View.php';
    }

    public function Redirect(){
        header ("location: TalleristasController.php?action=view");
    }

    
    public function eliminar(){
      $this->delete($_REQUEST['dui']);
      header ("location: TalleristasController.php?action=view");
    }

}
// resivimos datos
if(isset($_GET['action']) && $_GET['action']=='insert'){
  $instanciatalleristas = new TalleristasControlller();//instanciar el controlador porque esta fuera de la clase
  $instanciatalleristas->ViewInsert();
}

//que no este vacio CON ISSET recicbimos la informacion con la que vamos a trabajar

if(isset($_POST['action']) && $_POST['action']=='insert'){
  $instanciatalleristas = new TalleristasControlller();
   
  $instanciatalleristas->SaveInfoForModel(
    $_POST['dui'],
    $_POST['nombre'],
    $_POST['apellido'],
    $_POST['sexo_tallerista'],
    $_POST['fecha_n'],
    $_POST['fecha_c'],
    $_POST['direccion'],
    $_POST['idcanton']
  
  
  );
    
   
}

if(isset($_GET['action']) && $_GET['action']=='view'){
  $instanciatalleristas = new TalleristasControlller();
  $instanciatalleristas->ListView();
}

///Eliminar Registro

if(isset($_GET['action']) && $_GET['action']=='eliminar'){
  $instanciatalleristas = new TalleristasControlller();
  $instanciatalleristas->eliminar();
}






?>