<?php
include 'conexion.php';


class Datos extends Conexion
{

  public function traerDatos()
  {
    parent::__construct();
    if(isset($_POST['consulta']) && $_POST['consulta']!=0){
      $nombre=$_POST['consulta'];
    }
    else{
      $nombre='';
    }

    $sql="select cliente_id,cliente_documento,cliente_nombre,cliente_apellido,cliente_email,ciu.ciudad_nombre as ciudad
          from cliente cli
          join ciudad ciu on ciu.ciudad_id=cli.id_ciudad
          where cliente_documento like '$nombre%'";

    $result=$this->conexion->query($sql);

    if($result->num_rows > 0){

      $datos_salida= "<table class='clase_tabla'>
                      <thead>
                        <tr>
                        <th>Cedula</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Mail</th>
                        <th>Ciudad</th>
                        </tr>
                      </thead>  ";

        while ($fila=$result->fetch_assoc()){

          $datos_salida.= "<tr>
                            <td>{$fila['cliente_documento']}</td>
                            <td>{$fila['cliente_nombre']}</td>
                            <td>{$fila['cliente_apellido']}</td>
                            <td>{$fila['cliente_email']}</td>
                            <td>{$fila['ciudad']}</td>
                            </tr>";
        }
        $datos_salida.= "</table";

    }
    else{
      $datos_salida="No hay datos";
    }

    echo $datos_salida;

  }
    public function ValidaLogin(){
      $array=explode("-", $_POST['credenciales']);
      $md5Pass=md5($array[1]);
      $usuario=$array[0];
      $query=$this->conexion->prepare("select cliente_id,cliente_documento from cliente where cliente_user=? and cliente_password=?");
      $query->bind_param("ss",$usuario, $md5Pass);

      $ok=$query->execute();
      $query->bind_result($cliente_id,$cliente_documento);
      $query->fetch();
      $query->close();

      if($cliente_id==0){
          echo " Por favor Revise los datos ingresados";
      }else{
        session_start();
        $_SESSION['cliente_id']=$cliente_id;
        $_SESSION['cliente_documento']=$cliente_documento;
        echo "<script>alert('BIENVENIDO');
                window.location='../vista/consulta.php'</script>";
      }
    }

    public function datosSelect()
    {
      $sql="select ciudad_id,ciudad_nombre from ciudad ";

      $result=$this->conexion->query($sql);

      if($result->num_rows > 0){

        while ($fila=$result->fetch_assoc()) {
            $datos_salida.= "<option value='{$fila['ciudad_id']}'>{$fila['ciudad_nombre']}</option>";
          }
          $datos_salida.= "</table";

      }

      return $datos_salida;
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
