<?php
require "db.php";

$titulo=$_POST['titulo'];
$descripcion=$_POST['descripcion'];
$fecha=$_POST['fecha'];
$hora=$_POST['hora'];
$modalidad=$_POST['modalidad'];
$lugar=$_POST['lugar'];
$cupo=intval($_POST['cupo']);
$estado=$_POST['estado'];

$sql="INSERT INTO sesiones_grupales (titulo,descripcion,fecha,hora,modalidad,lugar,cupo,estado) VALUES(?,?,?,?,?,?,?,?)";
$stmt=$conn->prepare($sql);
$stmt->bind_param('ssssssis',$titulo, $descripcion,$fecha,$hora,$modalidad,$lugar,$cupo,$estado);
$stmt->execute();
header("Location: ../administracion.php?ok=1");
exit;
