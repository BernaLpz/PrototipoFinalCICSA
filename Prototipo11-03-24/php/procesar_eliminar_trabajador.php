<?php
// Incluir el archivo de conexión a la base de datos
include 'conexion.php';

// Verificar si se enviaron datos desde el formulario de eliminación
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir el ID del empleado a eliminar
    $id_empleado = $_POST['id_empleado'];

    // Construir la consulta SQL para eliminar al trabajador
    $sql = "DELETE FROM trabajadores WHERE id_empleado='$id_empleado'";

    // Ejecutar la consulta
    if ($conn->query($sql) === TRUE) {
        // Redireccionar a la página de lista de trabajadores
        header("Location: ../lista_trabajadores.php");
    } else {
        echo "Error al eliminar el trabajador: " . $conn->error;
    }
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
