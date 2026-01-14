<?php
require 'db.php';

// Consulta todos los talleres
$sqlTalleres = "SELECT id_taller, titulo, descripcion, fecha, hora, modalidad, lugar, cupo, estado 
                FROM talleres 
                ORDER BY fecha DESC";
$resultado = $conn->query($sqlTalleres);
?>

<table class="table table-striped align-middle">
  <thead class="table-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Título</th>
      <th scope="col">Descripción</th>
      <th scope="col">Fecha</th>
      <th scope="col">Hora</th>
      <th scope="col">Modalidad</th>
      <th scope="col">Lugar</th>
      <th scope="col">Cupo</th>
      <th scope="col">Estado</th>
      <th scope="col" class="text-center">Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php if ($resultado && $resultado->num_rows > 0): ?>
      <?php while ($t = $resultado->fetch_assoc()): ?>
        <tr>
          <td><?= $t['id_taller'] ?></td>
          <td><?= htmlspecialchars($t['titulo']) ?></td>
          <td><?= htmlspecialchars(substr($t['descripcion'], 0, 50)) ?><?= strlen($t['descripcion']) > 50 ? '...' : '' ?></td>
          <td><?= date("d/m/Y", strtotime($t['fecha'])) ?></td>
          <td><?= substr($t['hora'], 0, 5) ?></td>
          <td><?= ucfirst($t['modalidad']) ?></td>
          <td><?= htmlspecialchars($t['lugar']) ?></td>
          <td><?= $t['cupo'] ?></td>
          <td>
            <?php if ($t['estado'] === 'activo'): ?>
              <span class="badge bg-success">Activo</span>
            <?php elseif ($t['estado'] === 'completo'): ?>
              <span class="badge bg-warning text-dark">Completo</span>
            <?php else: ?>
              <span class="badge bg-secondary">Finalizado</span>
            <?php endif; ?>
          </td>
          <td class="text-center">
            <!-- Botón editar -->
            <button 
              class="btn btn-warning btn-sm btn-editar-taller"
              data-id="<?= $t['id_taller'] ?>"
              data-titulo="<?= htmlspecialchars($t['titulo']) ?>"
              data-descripcion="<?= htmlspecialchars($t['descripcion']) ?>"
              data-fecha="<?= $t['fecha'] ?>"
              data-hora="<?= $t['hora'] ?>"
              data-modalidad="<?= $t['modalidad'] ?>"
              data-lugar="<?= htmlspecialchars($t['lugar']) ?>"
              data-cupo="<?= $t['cupo'] ?>"
              data-estado="<?= $t['estado'] ?>">
              <i class="bi bi-pencil-square"></i> Editar
            </button>

            <!-- Botón eliminar -->
            <a href="backend/delete_taller.php?id=<?= $t['id_taller'] ?>" 
               class="btn btn-danger btn-sm"
               onclick="return confirm('¿Seguro que deseas eliminar este taller?');">
               <i class="bi bi-trash"></i> Eliminar
            </a>
          </td>
        </tr>
      <?php endwhile; ?>
    <?php else: ?>
      <tr>
        <td colspan="10" class="text-center text-muted py-4">No hay talleres registrados.</td>
      </tr>
    <?php endif; ?>
  </tbody>
</table>
