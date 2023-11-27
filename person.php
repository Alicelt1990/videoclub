<?php
    require_once "dbConnection.php";
    class Person
    {

        public static function showInsert()
        {
            View::display("insertPersonForm");
        }

        public static function insertPerson()
        {
            include "views/header.html";
            $db = connect();
            $name = $_REQUEST["nombre"];
            $surname = $_REQUEST["apellidos"];
            $country = $_REQUEST["pais"];

            $sqlQuery = "INSERT INTO personas(nombre, apellidos, pais) VALUES ('$name', '$surname', '$country')";
            $result=$db->query($sqlQuery);

            if ($result) {
                echo "Datos insertados con éxito<br/>";
            }
            else{
                echo "Ha ocurrido un error insertando los datos<br/>";
            }
            $db->close();
            echo "<a href='index.php?do=main'>Volver</a>";
            include "views/footer.html";
        }

        public static function searchPerson()
        {
            include "views/header.html";
            $db = connect();
            $nombre = $_REQUEST["nombre"];
            $query = "SELECT * FROM personas WHERE nombre LIKE '%$nombre%'";
            $result = $db->query($query);

            echo '<table>';
            echo '<tr><th>Código de persona</th><th>Nombre</th><th>Apellidos</th><th>País</th></tr>';
            while($row = $result->fetch_object()){
                echo"<tr><td>$row->cod_persona</td><td>$row->nombre</td><td>$row->apellidos</td><td>$row->pais</td></tr>";
            }
            echo '</table>';
            $db->close();
            echo "<a href='index.php?do=main'>Volver</a>";
            include "views/footer.html";
        }

        public static function deletePerson()
        {
            include "views/header.html";
            $db = connect();
            $counter = 0;
            for($i = 0; $i < count($_REQUEST) - 1; $i++){
                if(isSet($_REQUEST["person$counter"])) {
                    $personId = $_REQUEST["person$counter"];
                    $query = "DELETE FROM personas WHERE cod_persona = '$personId'";
                    $result = $db->query($query);
                    if($db->query($query)) {
                        echo "<p>Persona con el código $personId eliminada con éxito</p>";
                    } else{
                        echo "<p class=\"error_message\">Ha ocurrido un error que ha impedido eliminar la persona $personId</p>";
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

        public static function modifyPerson()
        {
            include "views/header.html";
            $nombre = $_REQUEST["nombre"];
            $apellidos = $_REQUEST["apellidos"];
            $pais = $_REQUEST["pais"];
            $id = $_REQUEST["cod_persona"];

            $db = connect();
            $query = "UPDATE personas
                      SET nombre='$nombre',
                          apellidos='$apellidos',
                          pais='$pais'
                      WHERE cod_persona = '$id'";
            $result = $db->query($query);
            if($result) {
                echo "<p>Persona con el código $id modificada con éxito</p>";
            } else{
                echo "<p class=\"error_message\">Ha ocurrido un error que ha impedido modificar la persona con el código $id</p>";
            }
            $db->close();

            echo "<a href='index.php?do=main'>Volver</a>";
            include "views/footer.html";
        }
    }

