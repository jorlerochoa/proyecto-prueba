<?php
session_start();
if(!isset($_SESSION['cliente_id'])){
  echo "<script>alert('Por favor inicie sesion');
        window.location='../vista/Login.html'</script>";
}
else{
   ?>
   <!DOCTYPE html>
   <html lang="en" dir="ltr">
     <head>
       <meta charset="utf-8">
       <title>Consulta</title>
       <link rel="stylesheet" type="text/css" href="estilos_consulta.css">
     </head>
     <body>

       <div class="formulario">
       <h2>Consulta Clientes</h2>
       <div class="enlace"><a href="logout.php">Cerrar Sesión</a><img src="apagado.jpg"></div>
       <label for='caja' class="label">Busqueda:</label><br>
           <input type="text" class="control_input" name="text_busqueda" id="text_busqueda" placeholder="Ingrese el Documento" value="" required>
       </div>

       <div id="div_table">
       </div>

       <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
       <script type="text/javascript" src="../modelo/recover.js"></script>
     </body>
   </html>
   <?php
 }
?>
