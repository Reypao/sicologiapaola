<?php
require '../auth.php';
require '../backend/db.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $stmt = $conn->prepare("DELETE FROM talleres WHERE id_taller = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: ../administracion.php?deleted=1");
    } else {
        echo "Error al eliminar el taller: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
