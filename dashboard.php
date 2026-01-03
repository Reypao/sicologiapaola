<?php
session_start();

// Redirect to login if not authenticated
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

// Logged-in user
$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="card shadow p-4">
            <h2 class="mb-4">Bienvenido, <?= htmlspecialchars($user); ?> 👋</h2>
            <p>Has iniciado sesión correctamente en el panel de administración.</p>
            <a href="logout.php" class="btn btn-danger mt-3">Cerrar sesión</a>
        </div>
    </div>

</body>
</html>
