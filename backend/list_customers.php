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
        <th>Acciones</th>
      </tr>
      </thead>
      <tbody>";

while ($row = $resultado->fetch_assoc()) {
  echo "<tr>
          <td>{$row['id_customer']}</td>
          <td>{$row['nombre']}</td>
          <td>{$row['email']}</td>
          <td>{$row['telefono']}</td>
          <td>{$row['fecha_registro']}</td>
          <td>
          <button 
              class='btn btn-sm btn-outline-primary btn-editar'
              data-id='{$row['id_customer']}'
              data-nombre='{$row['nombre']}'
              data-email='{$row['email']}'
              data-telefono='{$row['telefono']}'
              data-bs-toggle='modal'
              data-bs-target='#modalEditarCliente'>
              <i class='bi bi-pencil-square'></i>
          </button>
            
          </td>
        </tr>";
}
echo "</tbody></table>";
