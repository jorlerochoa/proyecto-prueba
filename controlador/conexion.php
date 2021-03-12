<?php
include 'configurador.php';

class Conexion{

  protected $conexion;

  public function Conexion(){

    $this->conexion= new mysqli(HOST,USER,PASSWORD,BD);
    if($this->conexion->connect_errno){
      die('conexion fallida');
    }
    else{
      return $this->conexion;
    }
  }
}



 ?>
