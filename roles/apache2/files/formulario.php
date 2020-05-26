<?php
// Conexión a la base de datos
$mi_conexion = mysqli_connect('localhost','admin_1','Admin12345','incidencias',3306);
  if (mysqli_connect_errno($mi_conexion)) {
    die("Error en la conexion de base de datos: ".mysqli_connect_error());
}
if (!empty($_POST)){
$correo = $_GET['email'];
$departamento = $_POST["departamento"];
$asunto = $_POST["asunto"];
$incidencia =$_POST["incidencia"];

$consulta = "INSERT INTO datos (Correo,Departamento,Asunto,Descripcion) VALUES ('$correo','$departamento','$asunto','$incidencia')";
    if (mysqli_query($mi_conexion,$consulta)){

      echo  "<script> alert('Gracias, pronto atenderemos su solicitud'); window.location.href='./formulario.php'; </script>";

    }else{

        echo "Error" . mysqli_errno($mi_conexion);
  }
}
else {

//Es necesario este else porque sino redirige en bucle

}
?>
<html>
  <head>
  <meta charset='UTF-8'>
    <title>Formulario datos</title>
    <link rel="stylesheet" type="text/css" href="CSS/estilo_formulario.css">
  </head>
  <body>
    <form method="POST">
      <h1>Formulario incidencias</h1>
      <div class="cont1">
      <hr/>
      <div class="cont2">
        <label class="text" for="departamento"><strong>Departamento: </strong></label>
        <select name="departamento" id="departamento" required>
            <option value="Marketing">Marketing</option>
            <option value="Ventas">Ventas</option>
            <option value="RRHH">RRHH</option>
        </select>
        <br><br>
        <label class="text" for="asunto"><strong>Asunto del mensaje:</strong></label>
        <select name="asunto" id="asunto" required>
            <option value="Incidencia">Incidencia</option>
            <option value="Consulta">Consulta</option>
            <option value="Alta">Sugerencia</option>
            <option value="Otro">Otro</option>
        </select>
        <br><br>
        <label class="text" for="descripcion_incidencia" ><strong>Descripción:</strong></label>
        <br><br>
        <textarea class="textarea" maxlength="150" placeholder="Describa la incidencia" name="incidencia" rows="6" cols="60" id="descripcion_incidencia" required></textarea>
        <br><br>
      </div>
      <button type="submit">Enviar</button>
      <button type="reset">Borrar</button>
    </form>
  </body>
</html>
