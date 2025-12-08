<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paola Guzman - Psicologa Social</title>
    <!-- Meta Open Graph posicionamiento y contenido en redes sociales-->
    <meta property="og:title" content="Paola Guzman - Psicologa Social y Terapeuta Femenina">
    <meta property="og:description" content="Descubre los talleres, sesiones privadas y podcasts de Paola Guzmán. Bienestar emocional, autocuidado y salud mental femenina.">
    <meta property="og:image" content="https://psicologiapaola.netlify.app/images/paolaWeb2.jpg">
    <meta property="og:url" content="https://psicologiapaola.netlify.app/index.html">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="en_US">
    <!-- Meta SEO para posicionamiento en motores de busqueda-->
    <meta name="description" content="Sitio oficial de Paola Guzmán, Psicóloga Social. Explora sus talleres, sesiones grupales y podcasts sobre salud emocional y bienestar.">
    <meta name="keywords" content="Psicologia Social, Bienestar, salud mental, talleres, sesiones, Paola Guzmán, Terapia, Autoestima, Ansiedad, Salud mental Femenina">
    <meta name="author" content="Paola Guzmán">
    <meta name="robots" content="index, follow">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Beth+Ellen&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="icon" type="image/jpg" href="images/PsicologiaPao-icon.jpg">
    <script src="scripts/edit-customer.js" defer></script>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light border-bottom sticky-top barra-nav">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand d-flex align-items-center gap-3" href="index.html">
                    <img src="images/PsicologiaPao-icon.jpg" alt="Logo" class="rounded-circle logo">
                    <div class="d-flex flex-column lh-sm">
                        <span class="fw-bold">CHW - Terapeuta Femenina</span>
                        <span class="text-muted small">PAOLA GUZMAN - Psicóloga Social</span>
                    </div>
                </a>
                <div id="mainNav" class="collapse navbar-collapse">
                    <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-3">
                        <li class="nav-item"><a class="nav-link active" href="index.html">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="sobremi.html">Sobre Mi</a></li>
                        <li class="nav-item"><a class="nav-link" href="podcast.html">Podcast</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="menuPaola"
                                role="button" aria-expanded="false">
                                Trabaja con Paola
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="menuPaola">
                                <li><a class="dropdown-item" href="sesionprivada.html">Sesion Privada</a></li>
                                <li><a class="dropdown-item" href="sesiongrupal.html">Session Grupal</a></li>
                                <li><a class="dropdown-item" href="talleres.html">Talleres</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- creando el nuevo contenido -->
    <main class="py-5">
        <div class="container">
            <h1 class="fw-bold mb-3 text-center admin-title">Administracion</h1>
            <section class="mb-5 section-customer">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3 class="fw-bold">Clientes</h3>
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAgregarCliente">
                        + Agregar cliente
                    </button>
                </div>
                <div class="table-responsive border rounded p-3 shadow-sm bg-white">
                    <?php include 'backend/list_customers.php'; ?>
                </div>

            </section>
        </div>
    </main>
    <footer class="border-top py-3 footer'bg">
        <div
            class="container d-flex flex-column flex-md-row align-items-center justify-content-between text-white footer-container">

            <!-- Left: Logo + Brand -->
            <a class="navbar-brand d-flex align-items-center gap-2 mb-3 mb-md-0" href="#">
                <img src="images/PsicologiaPao-icon.jpg" alt="Logo" class="rounded-circle"
                    style="width:40px; height:40px;">
                <div class="d-flex flex-column lh-sm">
                    <span class="fw-bold">CHW - Terapeuta Femenina</span>
                    <span class="small">PAOLA GUZMAN - Psicóloga Social</span>
                </div>
            </a>

            <!-- Middle: Links -->
            <div class="small mb-3 mb-md-0 text-white">
                © 2025 Paola Guzmán &nbsp; | &nbsp;
                <a href="#" class="text-decoration-none text-white">Privacy</a> &nbsp; | &nbsp;
                <a href="#" class="text-decoration-none text-white">Terms</a> &nbsp; | &nbsp;
                <a href="#" class="text-decoration-none text-white">Disclaimer</a> &nbsp; | &nbsp;
                <a href="#" class="text-decoration-none text-white">Contact</a> &nbsp; | &nbsp;
                <a href="#" class="text-decoration-none text-white">Website Credits</a>
            </div>

            <!-- Right: Social icons -->
            <div class="d-flex gap-2">
                <a href="#"
                    class="btn btn-outline-warning btn-md rounded-circle d-flex align-items-center justify-content-center social-facebook"
                    style="width:50px; height:50px;">
                    <i class="bi bi-facebook fs-1"></i>
                </a>
                <a href="#"
                    class="btn btn-outline-warning btn-md rounded-circle d-flex align-items-center justify-content-center social-instagram"
                    style="width:50px; height:50px;">
                    <i class="bi bi-instagram fs-1"></i>
                </a>
                <a href="#"
                    class="btn btn-outline-warning btn-md rounded-circle d-flex align-items-center justify-content-center social-instagram"
                    style="width:50px; height:50px;">
                    <i class="bi bi-tiktok fs-1"></i>
                </a>
            </div>

        </div>
    </footer>
    <!--modal agregar Cliente  -->
    <div class="modal fade" id="modalAgregarCliente" tabindex="-1" aria-labelledby="modalAgregarClinteLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAgregarClienteLabel">Agregar Cliente</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <form action="backend/add_customer.php" method="post">
                        <div class="mb-3">
                            <label class="form-label">Nombre</label>
                            <input type="text" name="nombre" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Telefono</label>
                            <input type="tel" name="telefono" class="form-control">
                        </div>
                        <div class="text-end">
                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancelar</button>
                            <button class="btn btn-primary" type="submit">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--modal editar Cliente  -->
    <div class="modal fade" id="modalEditarCliente" tabindex="-1" aria-labelledby="modalEditarClinteLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditarClienteLabel">Editar Cliente</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <form action="backend/update_customer.php" method="post">
                        <input type="hidden" name="id_customer" id="edit-id">
                        <div class="mb-3">
                            <label class="form-label">Nombre</label>
                            <input type="text" name="nombre" id="edit-nombre" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" id="edit-email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Telefono</label>
                            <input type="tel" name="telefono" id="edit-telefono" class="form-control">
                        </div>
                        <div class="text-end">
                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancelar</button>
                            <button class="btn btn-primary" type="submit">Guardar Cambio</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Toast de confirmación agregar clientes -->
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 9999;">
        <div id="toastClienteOk" class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    ✔ Cliente agregado con éxito.
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        </div>
    </div>

    <?php if (isset($_GET['ok'])): ?>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var toastElement = document.getElementById('toastClienteOk');
                var toast = new bootstrap.Toast(toastElement, {
                    delay: 2500
                });
                toast.show();
            });
        </script>
    <?php endif; ?>

    <!-- Toast de edicion -->
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 9999;">
        <div id="toastClienteEditado" class="toast align-items-center text-white bg-warning border-0" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    ✔ Cliente editado con éxito.
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        </div>
    </div>

    <?php if (isset($_GET['updated'])): ?>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var toastElement = document.getElementById('toastClienteEditado');
                var toast = new bootstrap.Toast(toastElement, {
                    delay: 2500
                });
                toast.show();
            });
        </script>
    <?php endif; ?>

    <!-- Toast de eliminacion -->
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 9999;">
        <div id="toastClienteEliminado" class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    ✔ Cliente eliminado con éxito.
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        </div>
    </div>

    <?php if (isset($_GET['deleted']) && $_GET['deleted'] == 1): ?>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var toastElement = document.getElementById('toastClienteEliminado');
                var toast = new bootstrap.Toast(toastElement, {
                    delay: 3500
                });
                toast.show();
            });
        </script>
    <?php endif; ?>


    <!-- Toast de error e-->
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 9999;">
        <div id="toastErrorFK" class="toast align-items-center text-white bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    ✔ No se puede eliminar Cliente porque tiene sesiones asociadas.
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        </div>
    </div>

    <?php if (isset($_GET['error']) && $_GET['error'] === 'foreignkey'): ?>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var toastElement = document.getElementById('toastErrorFK');
                var toast = new bootstrap.Toast(toastElement, {
                    delay: 3500
                });
                toast.show();
            });
        </script>
    <?php endif; ?>

    <!-- script the bootstrp -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>