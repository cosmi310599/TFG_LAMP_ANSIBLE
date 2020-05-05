<?php
require_once "conexion.php";
?>
<html>
<head></head><body>
<?php
echo('<table align="center" border="solid 1px">'."\n");
echo "<th>Mensaje</th>";
$consulta = $pdo->query("SELECT mensaje FROM saludo");
while ( $fila = $consulta->fetch(PDO::FETCH_ASSOC) ) { #PDO::FETCH_ASOC --> llamamos a este tributo para asociar clave valor
  echo "<tr><td>";
  echo ($fila['mensaje']);
  echo "</td></tr>\n";
}
?>
</table>
</body>
</html>
 