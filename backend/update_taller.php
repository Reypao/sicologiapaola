<?php
require '../auth.php';
require '../backend/db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id_taller = $_POST['id_taller'];
    $titulo = trim($_POST['taller-titulo']);
    $descripcion = trim($_POST['taller-descripcion']);
    $fecha = $_POST['taller-fecha'];
    $hora = $_POST['taller-hora'];
    $modalidad = $_POST['taller-modalidad'];
    $lugar = $_POST['taller-lugar'] ?? null;
    $cupo = (int)$_POST['taller-cupo'];
    $estado = $_POST['taller-estado'];

    $stmt = $conn->prepare("UPDATE talleres 
                            SET titulo=?, descripcion=?, fecha=?, hora=?, modalidad=?, lugar=?, cupo=?, estado=? 
                            WHERE id_taller=?");
    $stmt->bind_param("ssssssisi", $titulo, $descripcion, $fecha, $hora, $modalidad, $lugar, $cupo, $estado, $id_taller);

    if ($stmt->execute()) {
        header("Location: ../administracion.php?updated=1");
    } else {
        echo "Error al actualizar el taller: " . $conn->error;
    }
    $stmt->close();
    $conn->close();
}
?>
