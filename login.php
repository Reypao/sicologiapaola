<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login administracion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4 shadow" style="width: 350px;">
        <h4 class="text-center mb-3">Login</h4>
        <form method="POST" action="login_process.php">
            <div class="mb-3">
                <label>User</label>
                <input type="text" name="user" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button class="btn btn-primary w-100">Enter</button>
        </form>

        <?php if (isset($_GET['error'])): ?>
            <div class="alert alert-danger mt-3 text-center">
                Usuario o contraseña incorrectos
            </div>
        <?php endif; ?>
        
    </div>
</body>

</html>