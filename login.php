<?php
    class Login
    {
        public static function mostrarFormLogin()
        {
                View::display("loginForm");
        }

        public static function procesarFormLogin()
        {
            include "views/header.html";
            $usuario = $_REQUEST["user"];
            $pass = $_REQUEST["pass"];
            $db = new mysqli('localhost', 'root', '', 'videoclub');
            if($db->connect_error) {
                die("Error en la conexion : ".$db->connect_error);
            }
            $sql = "SELECT usuario FROM usuarios WHERE usuario = '$usuario' AND pass = '$pass'";
            $result_user = $db->query($sql);
            if ($result_user->num_rows > 0) {
                    return true;
            }
            else {
                echo '<p class="error_message">El nombre de usuario o la contraseña no existe</p>';
                echo "<a href='index.php'>Atrás</a>";
            }
            include "views/footer.html";
        }
    }

