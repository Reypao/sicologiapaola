<?php
require "db.php";

$sql = "
    SELECT 
        sp.id_sesion,
        c.nombre AS cliente,
        sp.fecha,
        sp.hora,
        sp.estado,
        sp.comentario
    FROM sesiones_privadas sp
    JOIN customers c ON sp.id_customer = c.id_customer
    ORDER BY sp.fecha DESC, sp.hora DESC
";

$resultado = $conn->query($sql);
?>

<table class="table table-striped table-bordered table-sm align-middle">
    <thead class="table-light">
        <tr>
            <th>ID Sesion</th>
            <th>Cliente</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Estado</th>
            <th>Comentario</th>
        </tr>
    </thead>
    <tbody>

        <?php if ($resultado->num_rows > 0): ?>
            <?php while ($row = $resultado->fetch_assoc()): ?>

                <tr>
                    <td><?= $row['id_sesion'] ?></td>
                    <td><?= htmlspecialchars($row['cliente']) ?></td>
                    <td><?= $row['fecha'] ?></td>
                    <td><?= $row['hora'] ?></td>
                    <td>
                        <?php
                        $estado = $row['estado'];
                        $badgeClass =
                            $estado === 'confirmada' ? 'bg-success'
                            : ($estado === 'cancelada' ? 'bg-danger' : 'bg-warning');
                        ?>
                        <span class="badge <?= $badgeClass ?>">
                            <?= $estado ?>
                        </span>
                    </td>
                    <td><?= htmlspecialchars($row['comentario']) ?></td>
                </tr>

            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="6" class="text-center text-muted">
                    No hay sesiones privadas registradas.
                </td>
            </tr>
        <?php endif; ?>

    </tbody>
</table>