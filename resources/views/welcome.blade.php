<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestión Integral de Negocios - IUJO</title>

    <!-- Bootstrap 5 CSS via CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex flex-column min-vh-100">

    <!-- Navegación Superior -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm py-3">
        <div class="container">
            <a class="navbar-brand fw-bold fs-4" href="{{ url('/') }}">
                <i class="bi bi-building me-2"></i> CRM IUJO
            </a>
            
            <div class="d-flex gap-2">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ route('clients.index') }}" class="btn btn-light text-primary fw-bold">
                            <i class="bi bi-speedometer2 me-1"></i> Ir al Sistema
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline-light">Iniciar Sesión</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-light text-primary fw-bold">Registrarse</a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </nav>

    <!-- Hero / Presentación Principal -->
    <div class="container my-auto py-5">
        <div class="row align-items-center g-5">
            <div class="col-lg-7">
                <span class="badge bg-primary-subtle text-primary border border-primary-subtle mb-3 px-3 py-2 rounded-pill fw-semibold">
                    IUJO Extensión Barquisimeto • Algoritmo y Programación II
                </span>
                <h1 class="display-4 fw-bold text-dark mb-3">
                    Gestión Integral de Negocios
                </h1>
                <p class="lead text-muted mb-4">
                    Herramienta tecnológica para la automatización del ciclo de vida comercial, organización de prospectos y optimización de seguimiento de clientes para las empresas de Lara.
                </p>
                
                <div class="d-flex gap-3">
                    @auth
                        <a href="{{ route('clients.index') }}" class="btn btn-primary btn-lg px-4 shadow-sm">
                            <i class="bi bi-people-fill me-2"></i> Ver Cartera de Clientes
                        </a>
                    @else
                        <a href="{{ route('register') }}" class="btn btn-primary btn-lg px-4 shadow-sm">
                            Comenzar Ahora <i class="bi bi-arrow-right ms-2"></i>
                        </a>
                        <a href="{{ route('login') }}" class="btn btn-outline-secondary btn-lg px-4">
                            Ingresar
                        </a>
                    @endauth
                </div>
            </div>

            <!-- Tarjeta Informativa del Proyecto -->
            <col-lg-5>
                <div class="card border-0 shadow-lg rounded-4 p-4 bg-white">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-4">
                            <div class="bg-primary text-white rounded-3 p-3 me-3">
                                <i class="bi bi-award fs-3"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-0">Proyecto Integrador</h5>
                                <small class="text-muted">Secciones A y B • Semestre III</small>
                            </div>
                        </div>

                        <ul class="list-unstyled mb-0">
                            <li class="d-flex align-items-center mb-3">
                                <i class="bi bi-check-circle-fill text-success me-3 fs-5"></i>
                                <span>Cartera de Prospectos y Zonas</span>
                            </li>
                            <li class="d-flex align-items-center mb-3">
                                <i class="bi bi-check-circle-fill text-success me-3 fs-5"></i>
                                <span>Agenda y Bitácora de Seguimiento</span>
                            </li>
                            <li class="d-flex align-items-center mb-3">
                                <i class="bi bi-check-circle-fill text-success me-3 fs-5"></i>
                                <span>Portafolio de Productos por Cliente</span>
                            </li>
                            <li class="d-flex align-items-center">
                                <i class="bi bi-check-circle-fill text-success me-3 fs-5"></i>
                                <span>Reportes PDF y Métricas</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </col-lg-5>
        </div>
    </div>

    <!-- Pie de página -->
    <footer class="bg-white border-top py-3 mt-auto">
        <div class="container text-center text-muted small">
            &copy; {{ date('Y') }} CRM Gestión Integral de Negocios — Instituto Universitario "Jesús Obrero"
        </div>
    </footer>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
