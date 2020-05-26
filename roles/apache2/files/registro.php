<?php
$mi_conexion = mysqli_connect('localhost','admin_1','Admin12345','incidencias',3306);
if (mysqli_connect_errno($mi_conexion)) {
  die("Error en la conexion de base de datos: ".mysqli_connect_error());
}
if (!empty($_POST)){
$correo = $_POST['email'];
$id = $_POST['id_equipo'];

$comprobar= "SELECT Correo FROM info WHERE Correo='".$correo."'";
$resultado = mysqli_query($mi_conexion, $comprobar);

if (mysqli_num_rows($resultado)==0) {
  $insertar = "INSERT INTO info (Correo, Num_equipo) VALUES ('$correo', '$id')";
   if (mysqli_query($mi_conexion,$insertar)){
    echo  "<script> alert('Se ha registrado correctamente'); window.location.href='./inicio.php'; </script>";
           //header('Location: ./inicio.php');
  }else{
         echo "Error" . mysqli_errno($mi_conexion);
  }
} else {
  echo  "<script> alert('El correo ya esta en uso, por favor pruebe con otro o vuelva al inicio para iniciar sesion'); window.location.href='./registro.php'; </script>";
    //header('Location: ./registro.php');
}
}
mysqli_close($mi_conexion);
?>
<html>
  <head>
  <meta charset='UTF-8'>
    <title>Formulario datos</title>
    <link rel="stylesheet" href="CSS/estilo_registro.css"/>
    <script>
function comprobar_email(email) {
    correo= /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if ( !correo.test(email) )
        alert("Error: La dirección de correo es incorrecta.");
       window.location.href="./registro.php";
}
</script>
  </head>
  <body>
    <form method="POST" onsubmit="return comprobar_email(this);">
      <h1>Formulario registo</h1>
      <div class="cont1">
      <hr/>
      <div class="cont2">
       <label for="email"><strong>Correo electronico: </strong></label>
       <input type="text" placeholder="Introduzca email" name="email" required>
       <label for="id_equipo"><strong>ID equipo: </strong></label>
       <input type="text" placeholder="Introduzca número de equipo" name="id_equipo" required maxlength="4">
      </div>
    <button type="submit">Registrar</button>
    <button type="reset">Borrar</button>
    </form>
  </body>
</html>
