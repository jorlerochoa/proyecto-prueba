<?php
include 'cliente.php';
/**
 *En esta clase extiende de la clase cliente y estan todas las funciones requeridas para las operaciones con un objeto cliente
 */

class Datos extends Cliente
{

  public function traerDatos()
  {
    parent::__construct();
    if(isset($_POST['consulta']) && $_POST['consulta']!=0){
      $documento=$_POST['consulta'];
    }
    else{
      $documento='';
    }
    echo $this->retrieveByDocument($documento);
  }

  public function ValidaLogin(){

    $arrayCredenciales=explode("-", $_POST['credenciales']);

    $arrayDatos = $this->loginCliente($arrayCredenciales);

    if(is_null($arrayDatos['id'])){
        echo " Por favor Revise los datos ingresados";
    }else{
      session_start();
      $_SESSION['cliente_id']=$arrayDatos['id'];
      $_SESSION['cliente_documento']=$arrayDatos['documento'];
      echo "<script>alert('BIENVENIDO');
              window.location='../vista/consulta.php'</script>";
    }
  }
  public function datosSelect()
    {
      return $this->selectCiudad();
  }
}

$datos= new Datos();

if(isset($_POST['credenciales'])){
    $datos->ValidaLogin();
}
elseif(isset($_POST['consulta'])){
    $datos->traerDatos();
}
?>
