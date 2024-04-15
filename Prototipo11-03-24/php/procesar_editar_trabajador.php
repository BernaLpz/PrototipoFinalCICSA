<?php
// Incluir el archivo de conexión a la base de datos
include 'conexion.php';

// Verificar si se enviaron datos desde el formulario de edición
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir los datos del formulario
    $id_empleado = $_POST['id_empleado'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $puesto = $_POST['puesto'];

    // Comprobar y construir la consulta SQL de actualización
    $sql = "UPDATE trabajadores SET";
    $updates = array();
    if (!empty($nombre)) {
        $updates[] = "nombre='$nombre'";
    }
    if (!empty($apellido)) {
        $updates[] = "apellido='$apellido'";
    }
    if (!empty($puesto)) {
        $updates[] = "puesto='$puesto'";
    }
    // Siempre permitir la actualización del ID del empleado si se proporciona
    if (!empty($id_empleado)) {
        $updates[] = "id_empleado='$id_empleado'";
    }
    // Comprobar si se van a realizar actualizaciones
    if (!empty($updates)) {
        $sql .= " " . implode(", ", $updates);
        $sql .= " WHERE id_empleado='$id_empleado'";
        // Ejecutar la consulta solo si hay actualizaciones que realizar
        if ($conn->query($sql) === TRUE) {
            // Redireccionar a la página de lista de trabajadores
            header("Location: ../lista_trabajadores.php");
        } else {
            echo "Error al actualizar el trabajador: " . $conn->error;
        }
    } else {
        // No hay campos para actualizar, redirigir de vuelta a la página de lista de trabajadores
        header("Location: ../lista_trabajadores.php");
    }
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
