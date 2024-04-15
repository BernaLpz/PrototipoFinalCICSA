<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#idHerramientaEliminar').on('input', function() {
                var idHerramienta = $(this).val();
                $.ajax({
                    url: 'php/obtener_nombre_herramienta.php',
                    type: 'GET',
                    data: {idHerramienta: idHerramienta},
                    success: function(data) {
                        $('#nombreHerramientaEliminar').val(data);
                    },
                    error: function() {
                        $('#nombreHerramientaEliminar').val('Nombre no encontrado');
                    }
                });
            });
        });
    </script>
        <script>
            $(document).ready(function() {
                $('#idHerramientaEditar').on('input', function() {
                    var idHerramienta = $(this).val();
                    $.ajax({
                        url: 'php/obtener_nombre_herramienta.php',
                        type: 'GET',
                        data: {idHerramienta: idHerramienta},
                        success: function(data) {
                            $('#nombreHerramientaEditar').val(data);
                        },
                        error: function() {
                            $('#nombreHerramientaEditar').val('Nombre no encontrado');
                        }
                    });
                });
            });
        </script>

</head>
<body>
    <header class="bg-dark text-white py-4">
        <div class="container">
            <h1 class="text-center">Inventario de Herramientas</h1>
            <a href="index.php" class="btn btn-light">Volver al Inicio</a>
        </div>
    </header>
    
    <main class="mt-4">
        <div class="container mt-4">    
            <h2 class="mb-4">Registro de Herramientas
                <button class="btn btn-link" type="button" data-bs-toggle="collapse" data-bs-target="#collapseRegistroHerramientas" aria-expanded="false" aria-controls="collapseRegistroHerramientas">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1.646 1.646a.5.5 0 0 1 .708 0L8 7.293l5.646-5.647a.5.5 0 1 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                    </svg>
                </button>
            </h2>
            <div class="collapse" id="collapseRegistroHerramientas">
                <form action="php/procesar_registro.php" method="POST">
                    <div class="mb-3">
                        <label for="idHerramienta" class="form-label">ID de la Herramienta:</label>
                        <input type="text" class="form-control" id="idHerramienta" name="idHerramienta" required>
                    </div>
                    <div class="mb-3">
                        <label for="nombreHerramienta" class="form-label">Nombre de la Herramienta:</label>
                        <input type="text" class="form-control" id="nombreHerramienta" name="nombreHerramienta" required>
                    </div>
                    <div class="mb-3">
                        <label for="cantidad" class="form-label">Cantidad:</label>
                        <input type="number" class="form-control" id="cantidad" name="cantidad" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Registrar</button>
                </form>
            </div>
        </div>
        <div class="container mt-4">
            <h2 class="mb-4">Editar herramientas existentes
                    <button class="btn btn-link" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEdicionHerramientas" aria-expanded="false" aria-controls="collapseEdicionHerramientas">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1.646 1.646a.5.5 0 0 1 .708 0L8 7.293l5.646-5.647a.5.5 0 1 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                        </svg>
                    </button>
            </h2>
            <div class="collapse" id="collapseEdicionHerramientas">
                <form action="php/procesar_edicion.php" method="POST">
                    <div class="mb-3">
                        <label for="idHerramientaEditar" class="form-label">ID de la Herramienta:</label>
                        <input type="text" class="form-control" id="idHerramientaEditar" name="idHerramientaEditar" required>
                    </div>
                    <div class="mb-3">
                        <label for="nombreHerramientaEditar" class="form-label">Nombre de la Herramienta:</label>
                        <input type="text" class="form-control" id="nombreHerramientaEditar" name="nombreHerramientaEditar" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="nuevaCantidad" class="form-label">Nueva Cantidad:</label>
                        <input type="number" class="form-control" id="nuevaCantidad" name="nuevaCantidad" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Editar Cantidad</button>
                </form>
            </div>
        </div>
            <div class="container mt-4">
                <h2 class="mb-4">Eliminar herramientas
                    <button class="btn btn-link" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEliminacionHerramientas" aria-expanded="false" aria-controls="collapseEliminacionHerramientas">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1.646 1.646a.5.5 0 0 1 .708 0L8 7.293l5.646-5.647a.5.5 0 1 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                        </svg>
                    </button>
                </h2>
                <div class="collapse" id="collapseEliminacionHerramientas">
                    <form action="php/procesar_eliminacion.php" method="POST">
                        <div class="mb-3">
                            <label for="idHerramientaEliminar" class="form-label">ID de la Herramienta:</label>
                            <input type="text" class="form-control" id="idHerramientaEliminar" name="idHerramientaEliminar" required>
                        </div>
                        <div class="mb-3">
                            <label for="nombreHerramientaEliminar" class="form-label">Nombre de la Herramienta:</label>
                            <input type="text" class="form-control" id="nombreHerramientaEliminar" name="nombreHerramientaEliminar" readonly>
                        </div>
                        <button type="submit" class="btn btn-danger">Eliminar Herramienta</button>
                    </form>
                </div>
            </div>
        <!-- Inventario -->
        <h2 class="mt-4">Inventario</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID Herramienta</th>
                        <th>Nombre de la Herramienta</th>
                        <th>Cantidad</th>
                    </tr>
                </thead>
                <tbody>
                <?php include 'php/mostrarInventario.php'; ?>
                </tbody>
            </table>
    </main>

    <footer class="bg-dark text-white py-3 mt-4">
        <div class="container">
            <p class="text-center">&copy; <?php echo date("Y"); ?> Sistema de Gestión de Herramientas</p>
        </div>
    </footer>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
