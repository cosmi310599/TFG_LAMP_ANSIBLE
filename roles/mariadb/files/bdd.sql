DROP DATABASE IF EXISTS incidencias;

CREATE DATABASE incidencias;

USE incidencias;

CREATE TABLE info(
 Correo     VARCHAR(30)     NOT NULL,
 Num_equipo   INT  UNSIGNED NOT NULL,

CONSTRAINT pk_Correo PRIMARY KEY (Correo)
);

CREATE TABLE datos(
 CodIncidencia    SMALLINT(6)   AUTO_INCREMENT,
 Correo     VARCHAR(30)     NOT NULL,
 Departamento       VARCHAR(10)     NOT NULL,
 Asunto     VARCHAR(15)     NOT NULL,
 Descripcion        VARCHAR(150)        NOT NULL,

CONSTRAINT pk_CodIncidencia PRIMARY KEY (CodIncidencia),
CONSTRAINT fk_Correo FOREIGN KEY (Correo) REFERENCES info (Correo)
);

INSERT INTO info(Correo, Num_equipo) VALUES('oscar.soto.martin@gmail.com', 1234);