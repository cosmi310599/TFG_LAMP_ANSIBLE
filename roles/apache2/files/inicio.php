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
      echo  "<script> alert('No esta registrado, por favor rellene el siguiente formulario'); window.location.href='./registro.php'; </script>";
       // header('Location: ./registro.php');
    }
  }
else{
  //Necesario proque sino redirige en bucle
}
?>
<html>
  <head>
  <meta charset='UTF-8'>
    <title>Inicio sesión</title>
    <link rel="stylesheet" type="text/css" href="CSS/estilo_inicio.css"/>
    <script>
function validarEmail( email ) {
    correo= /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if ( !correo.test(email) )
        alert("Error: La dirección de correo es incorrecta.");
       window.location.href="./inicio.php";
}

</script>
  </head>
  <body>
    <form  method="POST">
      <h1>Inicio sesión</h1>
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
