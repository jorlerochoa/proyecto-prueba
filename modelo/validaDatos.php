<?php
include '../modelo/cliente.php';

validaDatos();

function validaDatos(){

  if(isset($_POST['cliente_documento']) && isset($_POST['cliente_nombre']) && isset($_POST['cliente_apellido'])
     && isset($_POST['ciudad_id'])  && isset($_POST['cliente_user']) && isset($_POST['cliente_password'])){

    $documento=trim($_POST['cliente_documento']);
    $nombre=trim($_POST['cliente_nombre']);
    $apellido=trim($_POST['cliente_apellido']);
    $ciudad=trim($_POST['ciudad_id']);
    $user=trim($_POST['cliente_user']);
    $email=trim($_POST['cliente_email']);
    $password=trim($_POST['cliente_password']);
    registrarCliente($documento,$nombre,$apellido,$email,$ciudad,$user,$password);
  }
}
function   registrarCliente($documento,$nombre,$apellido,$email,$ciudad,$user,$password){
 
  $cliente =new Cliente();
  $cliente->setClienteDocumento($documento);
  $cliente->setClienteNombre($nombre);
  $cliente->setClienteApellido($apellido);
  $cliente->setClienteEmail($email);
  $cliente->setCiudadId($ciudad);
  $cliente->setClienteUser($user);
  $cliente->setClientePassword($password);
  $cliente->save();

}

?>
