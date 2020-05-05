DROP DATABASE tfg;

CREATE DATABASE tfg;

USE tfg;

CREATE TABLE IF NOT EXISTS saludo (
  mensaje varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
#Dejo por defecto MyISAM porque vamos a usar consultas select, si en algun momento se utiliza la base de datos
#con otros fines cambio al motor de almacenamiento innodb
INSERT INTO saludo (mensaje) VALUES('Hola mundo!');