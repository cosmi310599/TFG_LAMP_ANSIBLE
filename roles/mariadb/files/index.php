<?php
  $mi_conexion = mysqli_connect('localhost','admin_1','Admin12345','tfg',3306);
  if (mysqli_connect_errno($mi_conexion)) {
    die("Error en la conexion de base de datos: ".mysqli_connect_error());
  }
  //EJECUTAR CONSULTA
  $consulta = "SELECT mensaje FROM saludo";
  $resultado = mysqli_query($mi_conexion, $consulta);

   echo "<table align='center' border='solid 1px'>";
    echo "<th style='background-color:#92a8d1'>Mensaje</th>";
    if (mysqli_num_rows($resultado)==0) {
      echo "<tr>";
      echo "<td>No hay resultados</td>";
      echo "</tr>";
    }
    else
     {
      for ($num_filas=0; $num_filas <= mysqli_num_rows($resultado)-1; $num_filas++)
      {
        if(mysqli_data_seek($resultado, $num_filas))
        {
          $registro = mysqli_fetch_row($resultado);
          echo "<tr>";
		      echo "<td>".$registro[0]."</td>";
          echo "</tr>";
        }
      }
    }
  echo "</table>";
  //Liberacion de la memoria estructura (tantas veces como llamdas a query tengamos)
  mysqli_free_result($registro);
  //Desconectar de SGBDD
  mysqli_close($mi_conexion);

