<?php
require "db.php";


$id=intval($_POST['id_sesion']);
$fecha=$_POST['fecha'];
$hora=$_POST['hora'];
$estado=$_POST['estado'];
$comentario=$_POST['comentario'];

$sql="UPDATE sesiones_privadas SET fecha=?, hora=?, estado=?, comentario=? WHERE id_sesion=?";
$stmt=$conn->prepare($sql);
$stmt->bind_param('ssssi', $fecha,$hora,$estado,$comentario,$id);
$stmt->execute();
header("Location: ../administracion.php?updated=1");
exit;

