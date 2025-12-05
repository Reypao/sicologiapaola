<?php
require "db.php";


$id = $_POST['id_customer'];

$sql = "DELETE FROM customers WHERE id_customer = '$id'";

try {
    if ($conn->query($sql) === TRUE) {
        header("Location: ../administracion.php?deleted=1");
    } else {
        header("Location: ../administracion.php?error=foreignkey");
    }
} catch (mysqli_sql_exception $e) {
    // Detecta violación de llave foránea
    if ($e->getCode() == 1451) {  
        header("Location: ../administracion.php?error=foreignkey");
        exit;
    }

    header("Location: ../administracion.php?error=1");
}
exit;