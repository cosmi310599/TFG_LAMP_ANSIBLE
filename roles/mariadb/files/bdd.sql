DROP DATABASE IF EXISTS incidencias;

CREATE DATABASE incidencias;

USE incidencias;

CREATE TABLE info(

 Nombre     VARCHAR(30)     NOT NULL,
 IP       VARCHAR(15)      NOT NULL,
 Correo     VARCHAR(30)     NOT NULL,
 Departamento       VARCHAR(10)     NOT NULL,
 Asunto     VARCHAR(15)     NOT NULL,
 Descripcion        VARCHAR(150)        NOT NULL,

CONSTRAINT pk_IP PRIMARY KEY (IP)
);
