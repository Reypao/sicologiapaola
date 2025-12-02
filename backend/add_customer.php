<?php
require "db.php";

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];

$sql = "INSERT INTO customers(nombre,email,telefono) VALUES ('$nombre','$email','$telefono')";

if($conn->query($sql) === TRUE){
    header("Location: ../administracion.php?ok=1");
    exit;
}