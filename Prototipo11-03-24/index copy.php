<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - Sistema de Gestión de Herramientas</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header class="bg-dark text-white py-4">
        <div class="container">
            <h1 class="text-center">Sistema de Gestión de Herramientas</h1>
        </div>
    </header>
    
    <main class="mt-4">
        <div class="container">
            <!-- Sección de Historial General -->
            <h2>Historial General</h2>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tipo</th>
                            <th>ID Herramienta</th>
                            <th>Nombre Herramienta</th>
                            <th>ID Empleado</th>
                            <th>Hora</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php include 'php/historialIndex.php'; ?>
                    </tbody>
                </table>
            </div>

            <!-- Formulario de Filtrado -->
            <h2 class="mt-4">Filtrar Historial
                <button class="btn btn-link" type="button" data-bs-toggle="collapse" data-bs-target="#filtroForm" aria-expanded="false" aria-controls="filtroForm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1.646 1.646a.5.5 0 0 1 .708 0L8 7.293l5.646-5.647a.5.5 0 1 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                    </svg>
                </button>
            </h2>
            <div class="collapse" id="filtroForm">
                <form action="" method="POST">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="idHerramienta">ID de Herramienta:</label>
                            <input type="text" class="form-control" id="idHerramienta" name="idHerramienta">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="idEmpleado">ID de Empleado:</label>
                            <input type="text" class="form-control" id="idEmpleado" name="idEmpleado">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="fecha">Fecha:</label>
                            <input type="date" class="form-control" id="fecha" name="fecha">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Filtrar</button>
                </form>
            </div>

            <!-- Resultados del Filtrado -->
            <h2 class="mt-4">Resultados del Filtrado</h2>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tipo</th>
                            <th>ID Herramienta</th>
                            <th>Nombre Herramienta</th>
                            <th>ID Empleado</th>
                            <th>Hora</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            include 'php/filtrarHistorialIndex.php';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <footer class="bg-dark text-white py-3 mt-4">
        <div class="container">
            <p class="text-center">&copy; <?php echo date("Y"); ?> Sistema de Gestión de Herramientas</p>
        </div>
    </footer>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
