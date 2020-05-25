<?php
$mi_conexion = mysqli_connect('localhost','admin_1','Admin12345','incidencias',3306);
  if (mysqli_connect_errno($mi_conexion)) {
    die("Error en la conexion de base de datos: ".mysqli_connect_error());
}
if (!empty($_POST)){
$correo = $_POST["email"];
  $comprobar="SELECT Correo FROM info WHERE Correo='".$correo."'";
  $resultado = mysqli_query($mi_conexion, $comprobar);

  if (mysqli_num_rows($resultado)==1) {
      header('Location: ./formulario.php?email='.$correo);
  }
  else{
        header('Location: ./registro.php');
    }
  }
else{
  //Redirigir
}
?>
<html>
  <head>
  <meta charset='UTF-8'>
    <title>Inicio sesión</title>
    <link rel="stylesheet" type="text/css" href="CSS/estilo.css">
  </head>
  <body>
    <form class="form2" method="POST">
      <h1>Formulario registro</h1>
      <div class="cont1">
      <hr/>
      <div class="cont2">
       <label for="email"><strong>Correo electronico: </strong></label>
       <input type="text" placeholder="Introduzca email" name="email" required>
    <button type="submit">Acceder</button>
    <button type="reset">Borrar</button>
    </form>
  </body>
</html>
