<?php
// Incluir el archivo de conexión a la base de datos
include 'php/conexion.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de Salida de Herramientas</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header class="bg-dark text-white py-4">
        <div class="container">
            <h1 class="text-center">Historial de Salidas de Herramientas</h1>
            <a href="salidas.php" class="btn btn-light">Volver a Salidas</a>
        </div>
    </header>
    
    <main class="mt-4">
        <div class="container">
            

            

            <!-- Tabla de historial de salidas -->
            <h2 class="mt-4">Historial de Salidas
                <!-- Botón para abrir el formulario de filtro -->
            <button  onclick="mostrarFormularioFiltro()">
                <img src="sources/iconos/filtro.png" alt="Filtro" style="width: 20px; height: 20px;">
            </button>
            </h2>
            <!-- Formulario de filtro (colapsado por defecto) -->
            <div class="collapse" id="filtroForm">
                <form onsubmit="return filtrarHistorial()" method="POST">
                    <!-- Campos de filtro -->
                    <div class="mb-3">
                        <label for="idHerramienta">ID de Herramienta:</label>
                        <input type="text" class="form-control" id="idHerramienta" name="idHerramienta">
                    </div>
                    <div class="mb-3">
                        <label for="idEmpleado">ID de Empleado:</label>
                        <input type="text" class="form-control" id="idEmpleado" name="idEmpleado">
                    </div>
                    <div class="mb-3">
                        <label for="fecha">Fecha de Registro:</label>
                        <input type="date" class="form-control" id="fecha" name="fecha">
                    </div>

                    <!-- Botón de filtrado sin redirección -->
                    <button type="submit" class="btn btn-primary">Filtrar</button>
                </form>
            </div>

            <script>
                function mostrarFormularioFiltro() {
                    var filtroForm = document.getElementById("filtroForm");
                    if (filtroForm.classList.contains("show")) {
                        filtroForm.classList.remove("show");
                    } else {
                        filtroForm.classList.add("show");
                    }
                }

                function filtrarHistorial() {
                    // Obtener los datos del formulario
                    var idHerramienta = document.getElementById("idHerramienta").value;
                    var idEmpleado = document.getElementById("idEmpleado").value;
                    var fecha = document.getElementById("fecha").value;

                    // Realizar la solicitud AJAX para filtrar el historial
                    var xhr = new XMLHttpRequest();
                    xhr.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            // Actualizar la tabla con los resultados filtrados
                            document.getElementById("historialSalidas").innerHTML = this.responseText;
                        }
                    };
                    xhr.open("POST", "php/filtrarHistorialSalida.php", true);
                    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    xhr.send("idHerramienta=" + idHerramienta + "&idEmpleado=" + idEmpleado + "&fecha=" + fecha);

                    // Evitar el envío del formulario y la recarga de la página
                    return false;
                }
            </script>
            <div class="table-responsive">
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
