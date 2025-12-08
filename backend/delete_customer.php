<?php
require "db.php";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$id = $_POST['id_customer'];

try {
    $sql = "DELETE FROM customers WHERE id_customer = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    // Si llegó aquí, se borró correctamente
    header("Location: ../administracion.php?deleted=1");
    exit;

} catch (mysqli_sql_exception $e) {

    // Error 1451 → violación de clave foránea
    if ($e->getCode() == 1451) {
        header("Location: ../administracion.php?error=foreignkey");
        exit;
    }

    // Otro tipo de error
    header("Location: ../administracion.php?error=foreignkey");
    exit;
}
