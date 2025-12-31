<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login Administración</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap");
    * {
      margin: 0;
      padding: 0;
      font-family: "Poppins", sans-serif;
      box-sizing: border-box;
    }

    body {
      display: flex;
      justify-content: center;
      align-items: center;
      background: #1a2805ff;
      min-height: 100vh;
      overflow: hidden;
    }

    .container {
      position: absolute;
      width: 256px;
      height: 256px;
      display: flex;
      justify-content: center;
      align-items: center;
      z-index: 0;
    }

    .container span {
      position: absolute;
      left: 0;
      width: 32px;
      height: 6px;
      background: #2c4766;
      border-radius: 8px;
      transform-origin: 128px;
      transform: scale(2.2) rotate(calc(var(--i) * (360deg / 50)));
      animation: animateBlink 3s linear infinite;
      animation-delay: calc(var(--i) * (3s / 50));
    }

    @keyframes animateBlink {
      0% {
        background: rgba(45, 200, 37, 1);
      }
      25% {
        background: #2c4766;
      }
    }

    .login-box {
      position: relative;
      z-index: 1;
      background: #1f293a;
      padding: 40px;
      border-radius: 12px;
      box-shadow: 0 0 20px rgba(157, 154, 15, 0.4);
      width: 100%;
      max-width: 400px;
    }

    .login-box h2 {
      color: rgba(77, 186, 38, 1);
      text-align: center;
      margin-bottom: 30px;
    }

    .form-control {
      background-color: transparent;
      border: 2px solid #2c4766;
      color: #fff;
      border-radius: 40px;
      padding-left: 20px;
    }

    .form-control:focus {
      border-color: rgba(28, 124, 70, 1);
      box-shadow: none;
      color: #fff;
      background-color: transparent;
    }

    label {
      color: #fff;
      margin-bottom: 5px;
    }

    .btn-custom {
      background: rgba(143, 233, 146, 1);
      color: #1f293a;
      font-weight: 600;
      border-radius: 45px;
    }

    .alert {
      margin-top: 15px;
      font-size: 0.9rem;
    }

    .text-light a {
      color: rgba(77, 186, 38, 1);
      text-decoration: none;
    }

    .text-light a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

  <div class="container">
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

      <div class="text-center mt-3 text-light">
        <a href="#">¿Olvidaste tu contraseña?</a>
      </div>

    </form>
  </div>

</body>
</html>
