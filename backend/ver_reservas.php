<?php
require "db.php";

$id = intval($_POST['id_customer']);

// ---------------- SESIONES PRIVADAS ----------------
$q1 = $conn->prepare("
    SELECT fecha, hora, estado, comentario
    FROM sesiones_privadas 
    WHERE id_customer = ?
");
$q1->bind_param("i", $id);
$q1->execute();
$privadas = $q1->get_result();

// ---------------- SESIONES GRUPALES ----------------
$q2 = $conn->prepare("
    SELECT g.titulo, g.fecha, g.hora, g.modalidad, g.estado
    FROM inscripciones_grupales ig
    JOIN sesiones_grupales g ON ig.id_grupal = g.id_grupal
    WHERE ig.id_customer = ?
");
$q2->bind_param("i", $id);
$q2->execute();
$grupales = $q2->get_result();

// ---------------- TALLERES ----------------
$q3 = $conn->prepare("
    SELECT t.titulo, t.fecha, t.hora, t.modalidad, t.duracion, t.precio, t.estado
    FROM inscripciones_talleres it
    JOIN talleres t ON it.id_taller = t.id_taller
    WHERE it.id_customer = ?
");
$q3->bind_param("i", $id);
$q3->execute();
$talleres = $q3->get_result();

ob_start();
?>

<h5 class="text-primary">Sesiones Privadas</h5>
<?php if ($privadas->num_rows > 0): ?>
    <table class="table table-sm table-striped">
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Estado</th>
                <th>Comentario</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($p = $privadas->fetch_assoc()): ?>
                <tr>
                    <td><?= $p['fecha'] ?></td>
                    <td><?= $p['hora'] ?></td>
                    <td><?= $p['estado'] ?></td>
                    <td><?= htmlspecialchars($p['comentario']) ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No tiene sesiones privadas.</p>
<?php endif; ?>


<h5 class="text-info mt-4">Sesiones Grupales</h5>
<?php if ($grupales->num_rows > 0): ?>
    <table class="table table-sm table-striped">
        <thead>
            <tr>
                <th>Título</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Modalidad</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($g = $grupales->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($g['titulo']) ?></td>
                    <td><?= $g['fecha'] ?></td>
                    <td><?= $g['hora'] ?></td>
                    <td><?= $g['modalidad'] ?></td>
                    <td><?= $g['estado'] ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No tiene sesiones grupales.</p>
<?php endif; ?>


<h5 class="text-warning mt-4">Talleres</h5>
<?php if ($talleres->num_rows > 0): ?>
    <table class="table table-sm table-striped">
        <thead>
            <tr>
                <th>Título</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Modalidad</th>
                <th>Duración</th>
                <th>Precio</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($t = $talleres->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($t['titulo']) ?></td>
                    <td><?= $t['fecha'] ?></td>
                    <td><?= $t['hora'] ?></td>
                    <td><?= $t['modalidad'] ?></td>
                    <td><?= $t['duracion'] ?></td>
                    <td>$<?= $t['precio'] ?></td>
                    <td><?= $t['estado'] ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No está inscrito en talleres.</p>
<?php endif; ?>

<?php
echo ob_get_clean();
