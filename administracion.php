<?php

require 'auth.php';
require 'backend/db.php';

$sqlClientes = "SELECT id_customer, nombre FROM customers ORDER BY nombre";
$resultadoClientes = $conn->query($sqlClientes);
$clientes = [];
while ($c = $resultadoClientes->fetch_assoc()) {
    $clientes[] = $c;
}

?>
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
        <!-- script the bootstrp -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="scripts/edit-customer.js" defer></script>
    <script src="scripts/ver_reservas.js" defer></script>
    <script src="scripts/edit-sesionprivada.js" defer></script>
    <script src="scripts/edit-taller.js" defer></script>

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
                        <span class="text-light small">PAOLA GUZMAN - Psicóloga Social</span>
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
                                <li><a class="dropdown-item" href="sesiongrupal.html">Sesion Grupal</a></li>
                                <li><a class="dropdown-item" href="talleres.html">Talleres</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="logout.php" class="btn btn-outline-success ms-lg-3">
                                <i class="bi bi-box-arrow-in-right"></i> Logout
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- creando el nuevo contenido -->
    <main class="py-5">

        <div class="container administracion-container">
            <h1 class="fw-bold mb-3 text-center admin-title">Administracion</h1>
            <!-- tabla de clientes -->
            <section class="mb-5 section-customer">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3 class="fw-bold">Clientes</h3>
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAgregarCliente">
                        + Agregar cliente
                    </button>
                </div>
                <div class="table-responsive border rounded p-3 shadow-sm bg-light">
                    <?php include 'backend/list_customers.php'; ?>
                </div>

            </section>
            <!-- tabla de sesiones privadas -->
            <section class="mb-5 section-private">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3 class="fw-bold">Sesiones Privadas</h3>
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAgregarSesionPrivada">
                        + Agregar Sesion Privada
                    </button>
                </div>
                <div class="table-responsive border rounded p-3 shadow-sm bg-white">
                    <?php include 'backend/list_private_sessions.php'; ?>
                </div>
            </section>

            <!-- tabla de sesiones grupales -->
            <section class="mb-5 section-group">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3 class="fw-bold">Sesion Grupal</h3>
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAgregarSesionGrupal">
                        + Agregar Sesion Grupal
                    </button>
                </div>
                <div class="table-responsive border rounded p-3 shadow-sm bg-white">
                    <?php include 'backend/list_group_sessions.php'; ?>
                </div>

            </section>

            <!-- tabla de talleres 01/13/2025-->
            <section class="mb-5 section-talleres">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3 class="fw-bold">Talleres</h3>
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAgregarTaller">
                        + Agregar Taller
                    </button>
                </div>
                <div class="table-responsive border rounded p-3 shadow-sm bg-white">
                    <?php include 'backend/list_talleres.php'; ?>
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

    <!-- Modal editar sesion privada -->

    <div class="modal fade" id="modalEditarSesion" tabindex="-1" aria-labelledby="modalEditarSesionLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditarSesionLabel">Editar Sesion Privada</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <form action="backend/update_sesionprivate.php" method="post">
                        <input type="hidden" name="id_sesion" id="sesion-id">
                        <div class="mb-3">
                            <label class="form-label">Cliente</label>
                            <input type="text" name="nombre" id="sesion-cliente" class="form-control" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Fecha</label>
                            <input type="date" name="fecha" id="sesion-fecha" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Hora</label>
                            <input type="time" name="hora" id="sesion-hora" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Estado</label>
                            <select name="estado" id="sesion_estado" class="form-select">
                                <option value="pendiente">Pendiente</option>
                                <option value="confirmada">Confirmada</option>
                                <option value="cancelada">Cancelada</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Comentario</label>
                            <textarea name="comentario" id="sesion-comentario" class="form-control" rows="3"></textarea>
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

    <!-- Modal Reservas -->
    <div class="modal fade" id="modalReservas" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Reservas de <span id="nombre-cliente" class="fw-bold"></span></h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body" id="reservas-content">
                    <!-- Aquí se cargará el contenido dinámicamente -->
                    <div class="text-center py-4">
                        <div class="spinner-border text-primary"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--modal agregar sesion privada  12/18/2025-->
    <div class="modal fade" id="modalAgregarSesionPrivada" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAgregarSesionPrivada">Agregar Sesion Privada</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <form action="backend/add_sesionprivate.php" method="post">
                        <div class="mb-3">
                            <label class="form-label">Cliente</label>

                            <!--muestra agregar sesion privada de un cliente que ya existe en la base de datos 12/18/2025-->
                            <select name="id_customer" class="form-select" required>
                                <?php foreach ($clientes as $c): ?>
                                    <option value="<?= $c['id_customer'] ?>">
                                        <?= htmlspecialchars($c['nombre']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Fecha</label>
                            <input type="date" name="fecha" id="add_fecha_ps" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Hora</label>
                            <input type="time" name="hora" id="add_hora_ps" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Estado</label>
                            <select name="estado" id="add_sesion_estado" class="form-select">
                                <option value="pendiente">Pendiente</option>
                                <option value="confirmada">Confirmada</option>
                                <option value="cancelada">Cancelada</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Comentario</label>
                            <textarea name="comentario" id="add_sesion-comentario" class="form-control" rows="3"></textarea>
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
    <!--modal agregar sesion grupal  12/24/2025-->
    <div class="modal fade" id="modalAgregarSesionGrupal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAgregarSesionGrupal">Agregar Sesion Grupal</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <form action="backend/add_sesiongrupal.php" method="post">
                        <div class="mb-3">
                            <label class="form-label">Titulo</label>
                            <input type="text" name="group-titulo" class="form-control" required>
                            <!--muestra crear sesion grupal  12/24/2025-->

                        </div>
                        <div class="mb-3">
                            <label class="form-label">Descripcion</label>
                            <textarea name="group-descripcion" class="form-control" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Fecha</label>
                            <input type="date" name="group-fecha" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Hora</label>
                            <input type="time" name="group-hora" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Modalidad</label>
                            <select name="group-modalidad" class="form-select">
                                <option value="online" selected>Online</option>
                                <option value="presencial">Presencial</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Lugar</label>
                            <input type="text" name="group-lugar" class="form-control" placeholder="(opcional)"></input>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Cupo</label>
                            <input type="number" name="group-cupo" min="1" max="10" value="10" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Estado</label>
                            <select name="group-estado" class="form-select">
                                <option value="activa" selected>Activa</option>
                                <option value="completa">Completa</option>
                                <option value="finalizado">Finalizado</option>
                            </select>
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

    <!--modal agregar Taller  01/13/2026-->
    <div class="modal fade" id="modalAgregarTaller" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAgregarTallerLabel">Agregar Taller</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <form action="backend/add_taller.php" method="post">
                        <div class="mb-3">
                            <label class="form-label">Título del Taller</label>
                            <input type="text" name="taller-titulo" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Descripción</label>
                            <textarea name="taller-descripcion" class="form-control" rows="3" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Fecha</label>
                            <input type="date" name="taller-fecha" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Hora</label>
                            <input type="time" name="taller-hora" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Modalidad</label>
                            <select name="taller-modalidad" class="form-select">
                                <option value="online" selected>Online</option>
                                <option value="presencial">Presencial</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Lugar</label>
                            <input type="text" name="taller-lugar" class="form-control" placeholder="(opcional)">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Cupo Máximo</label>
                            <input type="number" name="taller-cupo" min="1" max="50" value="10" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Estado</label>
                            <select name="taller-estado" class="form-select">
                                <option value="activo" selected>Activo</option>
                                <option value="completo">Completo</option>
                                <option value="finalizado">Finalizado</option>
                            </select>
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

    <!-- Modal editar Taller  01/13/2026 -->
    <div class="modal fade" id="modalEditarTaller" tabindex="-1" aria-labelledby="modalEditarTallerLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditarTallerLabel">Editar Taller</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <form action="backend/update_taller.php" method="post">
                        <input type="hidden" name="id_taller" id="taller-id">

                        <div class="mb-3">
                            <label class="form-label">Título</label>
                            <input type="text" name="taller-titulo" id="taller-titulo" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Descripción</label>
                            <textarea name="taller-descripcion" id="taller-descripcion" class="form-control" rows="3" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Fecha</label>
                            <input type="date" name="taller-fecha" id="taller-fecha" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Hora</label>
                            <input type="time" name="taller-hora" id="taller-hora" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Modalidad</label>
                            <select name="taller-modalidad" id="taller-modalidad" class="form-select">
                                <option value="online">Online</option>
                                <option value="presencial">Presencial</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Lugar</label>
                            <input type="text" name="taller-lugar" id="taller-lugar" class="form-control" placeholder="(opcional)">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Cupo</label>
                            <input type="number" name="taller-cupo" id="taller-cupo" min="1" max="50" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Estado</label>
                            <select name="taller-estado" id="taller-estado" class="form-select">
                                <option value="activo">Activo</option>
                                <option value="completo">Completo</option>
                                <option value="finalizado">Finalizado</option>
                            </select>
                        </div>

                        <div class="text-end">
                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancelar</button>
                            <button class="btn btn-primary" type="submit">Guardar Cambios</button>
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

    <!-- Toast de edicion Cliente-->
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

    <!-- Toast de eliminacion cliente -->
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


    <!-- Toast de error cliente-->
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

</body>

</html>