    DROP DATABASE IF EXISTS videoclub;
    CREATE DATABASE IF NOT EXISTS videoclub;

    USE videoclub;
    CREATE TABLE peliculas(
        cod_pelicula INT PRIMARY KEY AUTO_INCREMENT,
        titulo VARCHAR(100),
        genero VARCHAR(100),
        pais VARCHAR(100),
        anyo INT
    );

    CREATE TABLE personas(
        cod_persona INT PRIMARY KEY AUTO_INCREMENT,
        nombre VARCHAR(100),
        apellidos VARCHAR(150),
        pais VARCHAR(100)
    );

    CREATE TABLE actuan(
        cod_pelicula INT,
        cod_persona INT,
        PRIMARY KEY (cod_pelicula, cod_persona),
        FOREIGN KEY (cod_pelicula) REFERENCES peliculas(cod_pelicula) ON DELETE CASCADE ON UPDATE CASCADE,
        FOREIGN KEY (cod_persona)  REFERENCES personas(cod_persona) ON DELETE CASCADE ON UPDATE CASCADE
    );

    CREATE TABLE usuarios(
        id INT PRIMARY KEY AUTO_INCREMENT,
        usuario VARCHAR(20) UNIQUE,
        pass VARCHAR(50)
    );

