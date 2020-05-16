<?php
// Conectar a la bdd
$mi_conexion = mysqli_connect('localhost','admin_1','Admin12345','incidencias',3306);
  if (mysqli_connect_errno($mi_conexion)) {
    die("Error en la conexion de base de datos: ".mysqli_connect_error());
}

//Recogemos la ip con esta funcion
function get_client_ip() {
$ipaddress = '';
if (isset($_SERVER['HTTP_CLIENT_IP']))
    $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
    $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
else if(isset($_SERVER['HTTP_X_FORWARDED']))
    $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
    $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
else if(isset($_SERVER['HTTP_FORWARDED']))
    $ipaddress = $_SERVER['HTTP_FORWARDED'];
else if(isset($_SERVER['REMOTE_ADDR']))
    $ipaddress = $_SERVER['REMOTE_ADDR'];
else
    $ipaddress = 'UNKNOWN';
return $ipaddress;
}
$ip = get_client_ip();

$comprobar="SELECT ip FROM info WHERE ip='".$ip."'";
$resultado = mysqli_query($mi_conexion, $comprobar);

if (mysqli_num_rows($resultado)==0) {

//Traspasamos a variables locales

$nombre = $_POST["nombre_completo"];
$email = $_POST["email"];
$departamento = $_POST["departamento"];
$asunto = $_POST["asunto"];
$incidencia =$_POST["incidencia"];

//Insert SQL

$consulta = "INSERT INTO info
(Nombre,IP,Correo,Departamento,Asunto,Descripcion) VALUES ('$nombre','$ip','$email','$departamento','$asunto','$incidencia')";

    if (mysqli_query($mi_conexion,$consulta)){
	    echo "<hr>";
	    echo "<h1 align='center'>Gracias, pronto atenderemos su solicitud </h1>";
	    echo "</hr>";

    }else{
        echo "Error" . mysqli_errno($mi_conexion);
    }

}else{
    echo "<hr>";
	echo "<h1 align='center'>Hasta que no sea procesada la solicitud anterior, no puede enviar otra </h1>";
	echo "</hr>";
}


?>