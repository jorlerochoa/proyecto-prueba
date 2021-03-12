<?php
include 'conexion.php';
/**
 *
 */
class RegistroDatos extends Conexion
{

    public function InsertDatos($documento,$nombre,$apellido,$email,$ciudad,$user,$password){

      $insert= "insert into cliente values(default,$documento,'$nombre','$apellido','$email',$ciudad,'$user',md5('$password'))";

      $result=$this->conexion->query($insert);
      if($result){
          return true;
      }
    }
 }

?>
