    -- Muestra de películas
    INSERT INTO peliculas(titulo, genero, pais, anyo) VALUES ('The Patriot', 'Bélica', 'Estados Unidos', 2000);
    INSERT INTO peliculas(titulo, genero, pais, anyo) VALUES ('V for Vendetta', 'Acción', 'Estados Unidos', 2006);

    -- Muestra de personas
    INSERT INTO personas(nombre, apellidos, pais) VALUES ('Hugo', 'Wallace Weaving', 'Inglaterra');
    INSERT INTO personas(nombre, apellidos, pais) VALUES ('Johanna', 'Wokalek', 'Alemania');
    INSERT INTO personas(nombre, apellidos, pais) VALUES ('John', 'Hurt', 'Inglaterra');
    INSERT INTO personas(nombre, apellidos, pais) VALUES ('Moritz', 'Bleibtreu', 'Alemania');
    INSERT INTO personas(nombre, apellidos, pais) VALUES ('Natalie', 'Portman', 'Israel');
    INSERT INTO personas(nombre, apellidos, pais) VALUES ('Stephen', 'Rea', 'Irlanda');

    -- Muestra de relaciones entre películas y personas
    INSERT INTO actuan(cod_pelicula, cod_persona) VALUES (1, 2);
    INSERT INTO actuan(cod_pelicula, cod_persona) VALUES (1, 4);
    INSERT INTO actuan(cod_pelicula, cod_persona) VALUES (2, 1);
    INSERT INTO actuan(cod_pelicula, cod_persona) VALUES (2, 3);
    INSERT INTO actuan(cod_pelicula, cod_persona) VALUES (2, 5);
    INSERT INTO actuan(cod_pelicula, cod_persona) VALUES (2, 6);

    -- Usuario sin contraseña para realizar pruebas
    INSERT INTO usuarios VALUES (1, '', '');

