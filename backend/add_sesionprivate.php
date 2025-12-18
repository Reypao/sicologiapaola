<?php
require "db.php";

$id_customer=intval($_POST['id_customer']);
$fecha=$_POST['fecha'];
$hora=$_POST['hora'];
$estado=$_POST['estado'];
$comentario=$_POST['comentario'];

$sql="INSERT INTO sesiones_privadas (id_customer,fecha,hora,estado,comentario) VALUES(?,?,?,?,?)";
$stmt=$conn->prepare($sql);
$stmt->bind_param('issss',$id_customer, $fecha,$hora,$estado,$comentario);
$stmt->execute();
header("Location: ../administracion.php?ok=1");
exit;
