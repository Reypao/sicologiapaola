<?php
require "db.php";

$sql = "SELECT * FROM customers";

$resultado = $conn->query($sql);

echo "<table class='table table-striped table-bordered table-hoover table-sm'>
      <thead class='table-light'>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Email</th>
        <th>Telefono</th>
        <th>Fecha de Registro</th>
      </tr>
      </thead>
      <tbody>"; 

while ($row=$resultado->fetch_assoc()){
    echo "<tr>
          <td>{$row['id_customer']}</td>
          <td>{$row['nombre']}</td>
          <td>{$row['email']}</td>
          <td>{$row['telefono']}</td>
          <td>{$row['fecha_registro']}</td>
        </tr>";
}
echo "</tbody></table>";
?>