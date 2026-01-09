<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login Administración</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="styles/style.css">
  
</head>
<body class="login-body">
  
  <div class="login-container">
    <?php for ($i = 0; $i < 50; $i++): ?>
      <span style="--i: <?= $i; ?>"></span>
    <?php endfor; ?>
  </div>

  <div class="login-box">
    <form method="POST" action="login_process.php">
      <h2>Login</h2>

      <div class="mb-3">
        <label for="user">Usuario</label>
        <input type="text" name="user" id="user" class="form-control" required>
      </div>

      <div class="mb-3">
        <label for="password">Contraseña</label>
        <input type="password" name="password" id="password" class="form-control" required>
      </div>

      <?php if (isset($_GET['error'])): ?>
        <div class="alert alert-danger text-center">
          Usuario o contraseña incorrectos
        </div>
      <?php endif; ?>

      <button type="submit" class="btn btn-custom w-100 mt-3">Entrar</button>
    </form>
  </div>

</body>
</html>
