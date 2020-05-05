<?php
$connection = new PDO('mysql:host=localhost;port=3306,dbname=saludo', 'root', 'Admin12345');
$connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
#Ponemos atributos para controlar errores y excepciones 
?>
