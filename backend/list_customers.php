<?php
require "db.php";

$sql = "SELECT * FROM customers";
$resultado = $conn->query($sql);
?>

<table class="table table-striped table-bordered table-hover table-sm">
    <thead class="table-light">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Teléfono</th>
            <th>Fecha de Registro</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>

        <?php while ($row = $resultado->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id_customer'] ?></td>
                <td><?= htmlspecialchars($row['nombre']) ?></td>
                <td><?= htmlspecialchars($row['email']) ?></td>
                <td><?= htmlspecialchars($row['telefono']) ?></td>
                <td><?= $row['fecha_registro'] ?></td>

                <td class="text-center">

                    <!-- Botón editar -->
                    <button
                        type="button"
                        class="btn btn-sm btn-outline-success btn-editar"
                        data-id="<?= $row['id_customer'] ?>"
                        data-nombre="<?= htmlspecialchars($row['nombre']) ?>"
                        data-email="<?= htmlspecialchars($row['email']) ?>"
                        data-telefono="<?= htmlspecialchars($row['telefono']) ?>"
                        data-bs-toggle="modal"
                        data-bs-target="#modalEditarCliente">
                        <i class="bi bi-pencil-square"></i>
                    </button>

                    <!-- Botón eliminar -->
                    <form action="backend/delete_customer.php"
                          method="post"
                          class="d-inline"
                          onsubmit="return confirm('Confirma que deseas eliminar el cliente?');">
                        <input type="hidden" name="id_customer" value="<?= $row['id_customer'] ?>">
                        <button type="submit" class="btn btn-sm btn-outline-danger">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>

                    <!-- Botón ver reservas -->
                    <button
                        type="button"
                        class="btn btn-sm btn-outline-info btn-reservas"
                        data-id="<?= $row['id_customer'] ?>">
                        <i class="bi bi-journal-text"></i>
                    </button>

                </td>
            </tr>
        <?php endwhile; ?>

    </tbody>
</table>