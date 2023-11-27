function connect()
{
    $db = new mysqli("localhost", "root", "", "videoclub");
    if ($db->connect_error) {
        die("Error en la conexion : ".$db->connect_error);
    }
    return $db;
}

