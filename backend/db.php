<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "paola_webpage";

$conn = new mysqli($host,$user,$pass,$db);

if ($conn->connect_error) {
    die("conexion ha fallado" . $conexion->connect_error);

}
    else {
        echo "conectado a la bd paola_webpage";
    }




?>

