<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Salidas de Herramientas</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {

            $('#id_herramienta').on('input', function() {
                var idHerramienta = $(this).val();
                $.ajax({
                    url: 'php/obtener_nombre_herramienta.php',
                    type: 'GET',
                    data: {idHerramienta: idHerramienta},
                    success: function(data) {
                        $('#nombre').val(data);
                    },
                    error: function() {
                        $('#nombre').val('Nombre no encontrado');
                    }
                });
            });

            $('#id_empleado').on('input', function() {
                var idEmpleado = $(this).val();
                $.ajax({
                    url: 'php/obtener_nombre_empleado.php',
                    type: 'GET',
                    data: {idEmpleado: idEmpleado},
                    success: function(data) {
                        $('#nombre_empleado').val(data);
                    },
                    error: function() {
                        $('#nombre_empleado').val('Nombre no encontrado');
                    }
                });
            });

        });
    </script>
</head>
<body>
    <header class="bg-dark text-white py-4">
        <div class="container">
            <h1 class="text-center">Registro de Salidas de Herramientas</h1>
            <a href="index.php" class="btn btn-light">Volver al Inicio</a>
        </div>
    </header>
    
    <main class="mt-4">
        <div class="container">
            <!-- Formulario para registrar la salida de una herramienta -->
            <h2 class="mb-4">Registrar Salida de Herramienta
                <button class="btn btn-link" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSalidaHerramientas" aria-expanded="false" aria-controls="collapseSalidaHerramientas">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1.646 1.646a.5.5 0 0 1 .708 0L8 7.293l5.646-5.647a.5.5 0 1 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                    </svg>
                </button>
            </h2>
        <div class="collapse" id="collapseSalidaHerramientas">    
            <form action="php/procesar_salida.php" method="POST" class="mb-4">
                <div class="mb-3">
                    <label for="id_herramienta" class="form-label">ID de la Herramienta:</label>
                    <input type="text" class="form-control" id="id_herramienta" name="id_herramienta" required>
                </div>
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre de la Herramienta:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required readonly>
                </div>
                <div class="mb-3">
                    <label for="cantidad" class="form-label">Cantidad:</label>
                    <input type="number" class="form-control" id="cantidad" name="cantidad" required min="1">
                </div>
                <div class="mb-3">
                    <label for="id_empleado" class="form-label">ID del Empleado:</label>
                    <input type="text" class="form-control" id="id_empleado" name="id_empleado" required>
                </div>
                <div class="mb-3">
                    <label for="nombre_empleado" class="form-label"> Nombre del Empleado: </label>
                    <input type="text" class="form-control" id="nombre_empleado" name="nombre_empleado" required readonly>
                </div>
                <div class="mb-3">
                    <label for="hora" class="form-label">Hora:</label>
                    <input type="text" class="form-control" id="hora" name="hora" required readonly>
                </div>
                <div class="mb-3">
                    <label for="fecha" class="form-label">Fecha:</label>
                    <input type="text" class="form-control" id="fecha" name="fecha" required readonly>
                </div>
                <!-- Campos ocultos para la hora y la fecha -->
                <input type="hidden" id="hora_hidden" name="hora" value="">
                <input type="hidden" id="fecha_hidden" name="fecha" value="">
                
                <button type="submit" class="btn btn-primary">Registrar Salida</button>
            </form>
        </div>

        <script>
        // Al cargar la página, obtener la fecha y hora actual y colocarla en el formulario
        window.onload = function() {
            var inputHora = document.getElementById("hora");
            var inputFecha = document.getElementById("fecha");
            inputHora.value = obtenerHoraActual();
            inputFecha.value = obtenerFechaActual();
        // Establecer los valores de hora y fecha en campos ocultos
        document.getElementById("hora_hidden").value = inputHora.value;
        document.getElementById("fecha_hidden").value = inputFecha.value;
            };
        </script>

            <!-- Historial de Salidas -->
            <h2 class="mt-4">Historial de Salidas <a href="historialSalidaPag.php" class="btn btn-primary">Ver Historial Completo</a></h2>
            <div class ="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID Herramienta</th>
                        <th>Nombre de la Herramienta</th>
                        <th>Cantidad</th>
                        <th>ID Empleado</th>
                        <th>Nombre del Empleado</th>
                        <th>Hora</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody id="historialSalidas">

                    <?php include 'php/historialSalida.php'; ?>
                </tbody>
            </table>
        </div>
    </main>

    <script src="js/bootstrap.min.js"></script>
    <script src="js/comportamientotablas.js"></script>
    <script src="js/registroFecha.js"></script>
</body>
<footer class="bg-dark text-white py-3 mt-4">
        <div class="container">
            <p class="text-center">&copy; <?php echo date ("Y"); ?> Sistema de Gestión de Herramientas</p>
        </div>
    </footer>

    
</html>
