<?php
// Incluir el archivo de conexión a la base de datos
include 'conexion.php';

// Verificar si se ha enviado el parámetro idEmpleado
if (isset($_GET['idEmpleado'])) {
    // Obtener el valor del parámetro idEmpleado
    $idEmpleado = $_GET['idEmpleado'];

    // Consultar la base de datos para obtener el nombre del empleado
    $sql = "SELECT nombre FROM trabajadores WHERE id_empleado = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $idEmpleado);
    $stmt->execute();
    $stmt->bind_result($nombreEmpleado);
    
    // Comprobar si se encontró el nombre del empleado
    if ($stmt->fetch()) {
        // Devolver el nombre del empleado como respuesta
        echo $nombreEmpleado;
    } else {
        // Si no se encontró el nombre del empleado, devolver un mensaje de error
        echo "Empleado no encontrado";
    }

    // Cerrar la consulta y la conexión a la base de datos
    $stmt->close();
    $conn->close();
} else {
    // Si no se ha proporcionado el parámetro idEmpleado, devolver un mensaje de error
    echo "ID de Empleado no proporcionado";
}
?>
