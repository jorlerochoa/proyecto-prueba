<?php
include '../controlador/registroDatos.php';
/**
 *
 */
 class Cliente
{
  protected $cliente_id;
  protected $cliente_documento;
  protected $cliente_nombre;
  protected $cliente_apellido;
  protected $cliente_email;
  protected $cliente_user;
  protected $cliente_password;
  protected $ciudad_id;
  protected $registro;

  function __construct()
  {
    $this->registro= new RegistroDatos();
  }
  public function setClienteDocumento($doc){

    $this->cliente_documento=$doc;
  }
  public function getClienteDocumento(){

    return $this->cliente_documento;
  }
  public function setClienteNombre($nombre){

    $this->cliente_nombre=$nombre;
  }
  public function getClienteNombre(){

    return $this->cliente_nombre;
  }
  public function setClienteApellido($apellido){

    $this->cliente_apellido=$apellido;
  }
  public function getClienteApellido(){

    return $this->cliente_apellido;
  }
  public function setClienteEmail($email){

    $this->cliente_email=$email;
  }
  public function getClienteEmail(){

    return $this->cliente_email;
  }
  public function setClienteUser($user){

    $this->cliente_user=$user;
  }
  public function getClienteUser(){

    return $this->cliente_user;
  }
  public function setClientePassword($password){

    $this->cliente_password=$password;
  }
  public function getClientePassword(){

    return $this->cliente_password;
  }


  public function setCiudadId($ciudad){

    $this->ciudad_id=$ciudad;
  }
  public function getCiudadId(){

    return $this->ciudad_id;
  }

  protected function retrieveByDocument($documento){

    return $this->registro->returnDatos($documento);
  }

  protected function loginCliente($arrayCredenciales){

    return $this->registro->Login($arrayCredenciales);
  }

  protected function selectCiudad(){

    return $this->registro->selectCiudad();
  }

  public function save(){

    $sucess=$this->registro->InsertDatos($this->getClienteDocumento(),
                           $this->getClienteNombre(),
                           $this->getClienteApellido(),
                           $this->getClienteEmail(),
                           $this->getCiudadId(),
                           $this->getClienteUser(),
                           $this->getClientePassword()
                           );

    if($sucess){

      echo "<script>alert('El registro ha sido guardado');
              window.location='../vista/index.php'
            </script>";
    }
    else{
      echo "<script>alert('ya existe un registro con el mismo documento o password');
              window.location='../vista/index.php'
            </script>";
    }
  }
}
?>
