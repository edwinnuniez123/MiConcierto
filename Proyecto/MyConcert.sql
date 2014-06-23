CREATE DATABASE IF NOT EXISTS myconcert;
USE myconcert;

CREATE TABLE usuario
(idusuario INT PRIMARY KEY AUTO_INCREMENT,
usuario VARCHAR(100) NOT NULL,
contrasenia VARCHAR(100) NOT NULL,
nombre VARCHAR(100) NOT NULL,
correo VARCHAR(100) NOT NULL );

CREATE TABLE artista
(idartista INT PRIMARY KEY AUTO_INCREMENT,
nombreartista VARCHAR(100) NOT NULL,
origen VARCHAR(100) DEFAULT "UNKNOWN");

CREATE TABLE tour
(idtour INT PRIMARY KEY AUTO_INCREMENT,
idartista INT NOT NULL,
nombretour VARCHAR(100) NOT NULL);

CREATE TABLE evento
(idevento INT PRIMARY KEY AUTO_INCREMENT,
idtour INT NOT NULL,
venue VARCHAR(100) NOT NULL,
fecha VARCHAR(100) NOT NULL);

CREATE TABLE eventosPorUsuario
(ideventoPorUsuario INT PRIMARY KEY AUTO_INCREMENT,
idevento INT NOT NULL,
idusuario INT NOT NULL);

CREATE TABLE fotosPorEventoPorUsuario
(idfotosPorEventoPorUsuario INT PRIMARY KEY AUTO_INCREMENT,
ideventoPorUsuario INT NOT NULL,
foto INT NOT NULL);

CREATE TABLE comentariosPorEventoPorUsuario
(idcomentarioPorEventoPorUsuario INT PRIMARY KEY AUTO_INCREMENT,
ideventoPorUsuario INT NOT NULL,
idusuario INT NOT NULL,
comentario VARCHAR(100) NOT NULL);
