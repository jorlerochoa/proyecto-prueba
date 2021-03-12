<?php
include '../modelo/datos.php';
$datos= new Datos();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Datos Registro</title>
    <link rel="stylesheet" type="text/css" href="estilos_index.css">
  </head>
  <body>
    <h1>Registro Clientes</h1>
    <div class="formulario">
        <h2>Datos</h2>
      <form class="" action="../modelo/validaDatos.php" method="post">
        <div style="display:none;" id="validadocumento_oculto"><p class="mensaje">El campo documento debe ser numerico</p></div>
        <input type="text" class="control_input" name="cliente_documento" id="cliente_documento" placeholder="Ingrese su cedula" value="" required onblur="compruebaDocumento()">
        <input type="text" class="control_input" name="cliente_nombre" id="cliente_nombre" placeholder="Ingrese su nombre" value="" required>
        <input type="text" class="control_input" name="cliente_apellido" id="cliente_apellido" placeholder="Ingrese su apellido" value="">
        <select name="ciudad_id" class="control_input">
            <option value="" selected>Seleccione ciudad</option>
            <?php echo $datos->datosSelect();?>
        </select>
        <input type="text" class="control_input" name="cliente_email" id="cliente_email" placeholder="Ingrese su email" value="" required>
        <input type="text" class="control_input" name="cliente_user" id="cliente_user" placeholder="Ingrese su usuario" value="" required>
        <div style="display:none;" id="validaextension_oculto"><p class="mensaje">El password debe tener minimo cuatro caracteres</p></div>

        <input type="password" class="control_input" name="cliente_password" id="cliente_password" placeholder="Ingrese su password" value="" required onblur="compruebaExtencionPassword()">
        <input type="password" class="control_input" name="confirm_password" id="confirm_password" placeholder="Confirme su password" value="" required onblur="compruebaPassword()">
        <div style="display:none;" id="id_oculto"><p class="mensaje">Los valores de password ingresados no coinciden</p></div>
        <input type="submit" class="boton" name="registro" id="registro" value="Registrar">
        <center><p><a href="login.html">Ya esta registrado?</a></p></center>

      </form>

    </div>

  </body>
  <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
  <script type="text/javascript" src="../modelo/recover.js"></script>

</html>
