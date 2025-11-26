<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "paola_webpage";

$conn = new mysqli($host,$user,$pass,$db);

if ($conn->connect_error) {
    die("conexion ha fallado" . $conn->connect_error);

}

$conn->set_charset("utf8mb4");  
?>


