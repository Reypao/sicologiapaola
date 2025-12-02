<?php
require "db.php";

$id = $_POST['id_customer'];
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];

$sql = "UPDATE customers 
        SET nombre='$nombre', email='$email', telefono='$telefono'
        WHERE id_customer='$id'";

if ($conn->query($sql) === TRUE) {
    header("Location: ../administracion.php?updated=1");
    exit;
} 
?>