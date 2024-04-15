<?php
// Incluir el archivo de conexión a la base de datos
include 'php/conexion.php';

// Consulta SQL para obtener los datos de los trabajadores
$sql = "SELECT * FROM trabajadores";
$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Trabajadores</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header class="bg-dark text-white py-4">
        <div class="container">
            <h1 class="text-center">Lista de Trabajadores</h1>
            <a href="index.php" class="btn btn-light">Volver al Inicio</a>
        </div>
    </header>

    <main class="mt-5">
        <div class="container">
            <!-- Botones para agregar un nuevo trabajador, editar y eliminar un trabajador -->
            <div class="row mb-4">
                <div class="col-sm-6">
                    <button class="btn btn-primary" onclick="mostrarFormulario()">Agregar Trabajador</button>
                </div>
                <div class="col-sm-6" hidden>
                    <button class="btn btn-primary float-end" onclick="mostrarFormularioEditar()" hidden>Editar Trabajador</button>
                </div>
                
            </div>

                <div>
                    <button class="btn btn-primary float-end" onclick="mostrarFormularioEliminar()">Eliminar Trabajador</button>
                </div>

            <!-- Formulario para agregar un nuevo trabajador -->
            <div id="formularioAgregar" style="display: none;">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title text-center">Agregar Trabajador</h3>
                        <form action="php/procesar_agregar_trabajador.php" method="POST">
                            <div class="mb-3">
                                <label for="id" class="form-label">ID:</label>
                                <input type="text" class="form-control" id="form_id" name="id" required>
                            </div>
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre:</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                            </div>
                            <div class="mb-3">
                                <label for="apellido" class="form-label">Apellido:</label>
                                <input type="text" class="form-control" id="apellido" name="apellido" required>
                            </div>
                            <div class="mb-3">
                                <label for="puesto" class="form-label">Puesto:</label>
                                <input type="text" class="form-control" id="puesto" name="puesto" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Agregar Trabajador</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Formulario para editar un trabajador -->


<script>
    // Función para cargar los datos del trabajador seleccionado
    function cargarDatosTrabajador() {
        var id_trabajador = document.getElementById("id_trabajador").value;
        // Realizar una solicitud AJAX para obtener los datos del trabajador
        // Aquí debes escribir tu lógica para obtener los datos del trabajador con el id_trabajador seleccionado
        // Luego, actualizar los campos del formulario con los datos obtenidos
        // Por ahora, simplemente establecemos los valores de los campos como vacíos
        document.getElementById("form_nombre").value = "";
        document.getElementById("form_apellido").value = "";
        document.getElementById("form_puesto").value = "";
        document.getElementById("form_id_empleado").value = id_trabajador;
    }
</script>


<!-- Formulario para eliminar un trabajador -->
<div id="formularioEliminar" style="display: none;">
    <div class="card">
        <div class="card-body">
            <h3 class="card-title text-center">Eliminar Trabajador</h3>
            <form action="php/procesar_eliminar_trabajador.php" method="POST">
                <div class="mb-3">
                    <label for="id_trabajadorEliminar">Selecciona un trabajador:</label>
                    <select class="form-select" id="id_trabajadorEliminar" onchange="cargarDatosTrabajadorEliminar()">
                        <option value="">Selecciona un trabajador</option>
                        <?php
                        // Mostrar opciones para cada trabajador
                        if ($resultado->num_rows > 0) {
                            while ($fila = $resultado->fetch_assoc()) {
                                echo "<option value='" . $fila['id_empleado'] . "'>" . $fila['nombre'] . " " . $fila['apellido'] . "</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
                <!-- Campo para mostrar el ID del empleado seleccionado -->
                <div class="mb-3">
                    <label for="id_empleado">ID de Empleado:</label>
                    <input type="text" class="form-control" id="form_id_empleado" name="id_empleado" readonly>
                </div>
                <button type="submit" class="btn btn-primary">Eliminar trabajador</button>
            </form>
        </div>
    </div>
</div>

<script>
    // Función para cargar los datos del trabajador seleccionado para eliminar
    function cargarDatosTrabajadorEliminar() {
        var id_trabajadorEliminar = document.getElementById("id_trabajadorEliminar").value;
        // Actualizar el valor del campo ID de Empleado con el valor seleccionado
        document.getElementById("form_id_empleado").value = id_trabajadorEliminar;
    }
</script>



<div id="formularioeditar" style="display: none;">
    <div class="card">
        <div class="card-body">
            <h3 class="card-title text-center">Editar Trabajador</h3>
            <form action="php/procesar_editar_trabajador.php" method="POST">
                <div class="mb-3">
                    <label for="id_trabajador">Selecciona un trabajador:</label>
                    <select class="form-select" id="id_trabajador" onchange="cargarDatosTrabajador()">
                        <option value="">Selecciona un trabajador</option>
                        <?php
                        // Mostrar opciones para cada trabajador
                        if ($resultado->num_rows > 0) {
                            while ($fila = $resultado->fetch_assoc()) {
                                echo "<option value='" . $fila['id_empleado'] . "'>" . $fila['nombre'] . " " . $fila['apellido'] . "</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
                <!-- Campos para editar los datos del trabajador -->
                <div class="mb-3">
                    <label for="id_empleado">ID de Empleado:</label>
                <input type="text"  class ="form-control" id="form_id_empleado" name="id_empleado" readonly>
                </div>
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" id="form_nombre" name="nombre">
                </div>
                <div class="mb-3">
                    <label for="apellido" class="form-label">Apellido:</label>
                    <input type="text" class="form-control" id="form_apellido" name="apellido">
                </div>
                <div class="mb-3">
                    <label for="puesto" class="form-label">Puesto:</label>
                    <input type="text" class="form-control" id="form_puesto" name="puesto">
                </div>
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </form>
        </div>
    </div>
</div>





</main>

            <script>
                // Función para mostrar el formulario de agregar trabajador
                function mostrarFormulario() {
                    var formularioAgregar = document.getElementById("formularioAgregar");
                    formularioAgregar.style.display = formularioAgregar.style.display === "none" ? "block" : "none";
                }

                // Función para mostrar el formulario de editar trabajador
                function mostrarFormularioEditar() {
                    var formularioEditar = document.getElementById("formularioeditar");
                    formularioEditar.style.display = formularioEditar.style.display === "none" ? "block" : "none";
                }
            </script>

            <script>
                // Funcioón para mostrar el formulario de eliminar trabajador
                function mostrarFormularioEliminar() {
                    
                    var formularioEliminarar = document.getElementById("formularioEliminar");
                    formularioEliminar.style.display = formularioEliminar.style.display === "none" ? "block" : "none";
                }
            </script>

            

<main>
            <!-- Tabla de trabajadores -->
        <h2 class="mt-4">Trabajadores</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID del empleado</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Puesto</th>
                    </tr>
                </thead>
                <tbody>
                <?php include 'php/mostrar_trabajadores.php'; ?>
                </tbody>
            </table>
    </main>

        </body>
        <footer class="bg-dark text-white py-3 mt-4">
            <div class="container">
                <p class="text-center">&copy; <?php echo date("Y"); ?> Sistema de Gestión de Herramientas</p>
            </div>
        </footer>
        <script src="js/bootstrap.bundle.min.js"></script>
</html>
