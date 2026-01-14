<?php
require '../auth.php';
require '../backend/db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $titulo = trim($_POST['taller-titulo']);
    $descripcion = trim($_POST['taller-descripcion']);
    $fecha = $_POST['taller-fecha'];
    $hora = $_POST['taller-hora'];
    $modalidad = $_POST['taller-modalidad'];
    $lugar = $_POST['taller-lugar'] ?? null;
    $cupo = (int)$_POST['taller-cupo'];
    $estado = $_POST['taller-estado'];

    $stmt = $conn->prepare("INSERT INTO talleres (titulo, descripcion, fecha, hora, modalidad, lugar, cupo, estado) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssis", $titulo, $descripcion, $fecha, $hora, $modalidad, $lugar, $cupo, $estado);

    if ($stmt->execute()) {
        header("Location: ../administracion.php?ok=1");
    } else {
        echo "Error al guardar el taller: " . $conn->error;
    }
    $stmt->close();
    $conn->close();
}
?>
