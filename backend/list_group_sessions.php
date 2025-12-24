<?php
require "db.php";

$sql = "
    SELECT 
        sg.id_grupal,
        sg.titulo,
        sg.descripcion,
        sg.fecha,
        sg.hora,
        sg.modalidad,
        sg.lugar,
        sg.cupo,
        sg.estado,
        GROUP_CONCAT(c.nombre SEPARATOR ', ' ) AS clientes
    FROM sesiones_grupales sg 
    LEFT JOIN inscripciones_grupales ig ON sg.id_grupal=ig.id_grupal
    LEFT JOIN customers c ON ig.id_customer = c.id_customer
    GROUP BY sg.id_grupal
    ORDER BY sg.fecha DESC, sg.hora DESC
";

$resultado = $conn->query($sql);
?>

<table class="table table-striped table-bordered table-sm align-middle">
    <thead class="table-light">
        <tr>
            <th>ID Sesion</th>
            <th>Titulo</th>
            <th>Cliente</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Modalidad</th>
            <th>Estado</th>
        </tr>
    </thead>
    <tbody>

        <?php if ($resultado->num_rows > 0): ?>
            <?php while ($row = $resultado->fetch_assoc()): ?>

                <tr class="fila-sesion_grupal"
                    data-id="<?= $row['id_grupal'] ?>"
                    data-titulo="<?= htmlspecialchars($row['titulo']) ?>"
                    data-fecha="<?= $row['fecha'] ?>"
                    data-hora="<?= $row['hora'] ?>"
                    data-modalidad="<?= $row['modalidad'] ?>"
                    data-estado="<?= $row['estado'] ?>">

                    <td><?= $row['id_grupal'] ?></td>
                    <td>
                        <strong><?= htmlspecialchars($row['titulo']) ?></strong>
                        <?php if (!empty($row['descripcion'])): ?>
                            <div class="small text-muted">
                                <?= htmlspecialchars($row['descripcion']) ?>
                            </div>
                        <?php endif; ?>
                    </td>

                    <td><?= $row['clientes'] ? htmlspecialchars($row['clientes']) : '<span class="text-muted">Sin Inscriptos</span>' ?></td>
                    <td><?= $row['fecha'] ?></td>
                    <td><?= $row['hora'] ?></td>
                    <td>
                        <span class="badge <?= $row['modalidad'] === 'online' ? 'bg-primary' : 'bg-secondary' ?>">
                            <?= $row['modalidad'] ?>
                        </span>
                    </td>
                    <td>
                        <?php
                        $estado = $row['estado'];
                        $badgeClass =
                            $estado === 'activa' ? 'bg-success'
                            : ($estado === 'completa' ? 'bg-danger' : 'bg-warning');
                        ?>
                        <span class="badge <?= $badgeClass ?>">
                            <?= $estado ?>
                        </span>
                    </td>
                </tr>

            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="6" class="text-center text-muted">
                    No hay sesiones grupales registradas.
                </td>
            </tr>
        <?php endif; ?>

    </tbody>
</table>