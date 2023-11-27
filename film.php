<?php
require "dbConnection.php";
class Film
{
    public static function showInsert()
    {
        View::display("insertFilmForm");
    }
    public static function insertarPeli()
    {
        include "views/header.html";
        $db = connect();

        $titulo = $_REQUEST["titulo"];
        $genero = $_REQUEST["genero"];
        $pais = $_REQUEST["pais"];
        $anio = $_REQUEST["anio"];
        $cod_persona = $_REQUEST['cod_persona'];

        $getMaxIdQuery = 'SELECT MAX(cod_pelicula) as maxId FROM peliculas';
        $result = $db->query($getMaxIdQuery);
        $resultObj = $result->fetch_object();
        $cod_pelicula = $resultObj->maxId;

        $insertFilmQuery = "INSERT INTO peliculas(titulo, genero, pais, anyo) VALUES ('$titulo', '$genero', '$pais', '$anio')";
        $result=$db->query($insertFilmQuery);

        if ($result) {
            echo "Datos insertados con éxito<br/>";
            echo "<a href='index.php?do=main'>Volver</a>";
        }
        else{
            echo "<p class=\"error_message\">Ha ocurrido un error insertando los datos<p/>";
            echo "<a href='index.php'>Volver</a>";
        }

        $cod_pelicula++;
        $insertActuanQuery = "INSERT INTO actuan(cod_pelicula, cod_persona) VALUES('$cod_pelicula', '$cod_persona')";
        $result=$db->query($insertActuanQuery);
        if ($result) {
            echo "Datos insertados con éxito<br/>";
            echo "<a href='index.php?do=main'>Volver</a>";
        }
        else{
            echo "<p class=\"error_message\">Ha ocurrido un error insertando los datos<p/>";
            echo "<a href='index.php'>Volver</a>";
        }

        $db->close();
        include "views/footer.html";
    }

    private static function getSearchResult($dbConnection){
        $searchStr = $_REQUEST["searchStr"];
        if (isSet($_REQUEST["byPerson"])) {
            $searchByPerson = $_REQUEST["byPerson"];
        } else{
            $searchByPerson = false;
        }

        if ($searchByPerson) {
            $query = "SELECT peliculas.cod_pelicula,
                             peliculas.titulo,
                             peliculas.genero,
                             peliculas.pais,
                             peliculas.anyo
                      FROM peliculas
                      INNER JOIN actuan ON peliculas.cod_pelicula = actuan.cod_pelicula
                      INNER JOIN personas ON nombre LIKE '%$searchStr%'
                          AND actuan.cod_persona = personas.cod_persona";
        }
        else{
            $query = "SELECT * FROM peliculas WHERE titulo LIKE '%$searchStr%'
                          OR genero = '%$searchStr%'
                          OR pais = '%$searchStr%'";
        }
        return $dbConnection->query($query);

    }

    public static function searchFilm()
    {
        include "views/header.html";
        $db = connect();
        $result = self::getSearchResult($db);

        // Mostrar las películas
        echo '<table>';
        echo '<tr><th>Código de película</th><th>Título</th><th>Género</th><th>País</th><th>Año</th></tr>';
        while($row = $result->fetch_object()){
            echo "<tr><td>$row->cod_pelicula</td><td>$row->titulo</td><td>$row->genero</td><td>$row->pais</td><td>$row->anyo</td></tr>";
        }
        echo '</table>';
        $db->close();
        echo "<a href='index.php?do=main'>Volver</a>";
        include "views/footer.html";
    }

    public static function deleteFilm()
    {
        include "views/header.html";
        $db = connect();
        $counter = 0;
        for($i = 0; $i < count($_REQUEST) - 1; $i++){
            if(isSet($_REQUEST["film$counter"])) {
                $filmId = $_REQUEST["film$counter"];
                $query = "DELETE FROM peliculas WHERE cod_pelicula = '$filmId'";
                $result = $db->query($query);
                if($db->query($query)) {
                    echo "<p>Película con el código $filmId eliminada con éxito</p>";
                } else{
                    echo "<p class=\"error_message\">Ha ocurrido un error que ha impedido eliminar la película $title</p>";
                }
            } else{
                $i--;
            }
            $counter++;
        }
        $db->close();
        echo "<a href='index.php?do=main'>Volver</a>";
        include "views/footer.html";
    }

    public static function modifyFilm()
    {
        include "views/header.html";
        $titulo = $_REQUEST["titulo"];
        $genero = $_REQUEST["genero"];
        $pais = $_REQUEST["pais"];
        $anyo = $_REQUEST["anyo"];
        $id = $_REQUEST["id_pelicula"];

        $db = connect();
        $query = "UPDATE peliculas
                  SET titulo='$titulo',
                      genero='$genero',
                      pais='$pais',
                      anyo='$anyo'
                  WHERE cod_pelicula = '$id'";
        $result = $db->query($query);
        if($result) {
            echo "<p>Película con el código $id modificada con éxito</p>";
        } else{
            echo "<p class=\"error_message\">Ha ocurrido un error que ha impedido modificar la película $title</p>";
        }
        $db->close();

        echo "<a href='index.php?do=main'>Volver</a>";
        include "views/footer.html";
    }
}