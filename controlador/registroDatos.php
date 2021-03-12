<?php
include 'conexion.php';
/**
 *En esta clase estan todas los llamados a base de datos requeridos para la aplicacion
 */
class RegistroDatos extends Conexion
{

    public function InsertDatos($documento,$nombre,$apellido,$email,$ciudad,$user,$password){

      $insert= "insert into cliente values(default,$documento,upper('$nombre'),upper('$apellido'),'$email',$ciudad,'$user',md5('$password'))";

      $result=$this->conexion->query($insert);
      if($result){
          return true;
      }
    }
    public function returnDatos($documento){

      $sql="select cliente_id,cliente_documento,cliente_nombre,cliente_apellido,cliente_email,ciu.ciudad_nombre as ciudad
            from cliente cli
            join ciudad ciu on ciu.ciudad_id=cli.id_ciudad
            where cliente_documento like '$documento%'";

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

      return $datos_salida;
    }
    public function Login($arrayCredenciales){

      $md5Pass=md5($arrayCredenciales[1]);
      $usuario=$arrayCredenciales[0];
      $query=$this->conexion->prepare("select cliente_id,cliente_documento from cliente where cliente_user=? and cliente_password=?");
      $query->bind_param("ss",$usuario, $md5Pass);

      $ok=$query->execute();
      $query->bind_result($cliente_id,$cliente_documento);
      $query->fetch();
      $query->close();
      $arrayDatos=array('id'=>$cliente_id,'documento'=>$cliente_documento);
      return $arrayDatos;

    }
    public function selectCiudad(){

      $sql="select ciudad_id,ciudad_nombre from ciudad ";

      $result=$this->conexion->query($sql);

      if($result->num_rows > 0){

        while ($fila=$result->fetch_assoc()) {
            $datos_salida.= "<option value='{$fila['ciudad_id']}'>{$fila['ciudad_nombre']}</option>";
          }
      }
      return $datos_salida;
    }
 }

?>
