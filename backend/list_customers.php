<?php
require "db.php";

$sql = "SELECT * FROM customers";

$resultado = $conn->query($sql);
$customers = [];

while ($fila = $resultado->fetch_assoc()) {
    $customers[] = $fila;
}

header("Content-Type: application/json");
echo json_encode($customers);

?>

