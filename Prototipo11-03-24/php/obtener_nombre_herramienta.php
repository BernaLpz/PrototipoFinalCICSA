<?php
// Incluir el archivo de conexión a la base de datos
include 'conexion.php';

// Verificar si se ha enviado el parámetro idHerramienta
if (isset($_GET['idHerramienta'])) {
    // Obtener el valor del parámetro idHerramienta
    $idHerramienta = $_GET['idHerramienta'];

    // Consultar la base de datos para obtener el nombre de la herramienta
    $sql = "SELECT NombreHerramienta FROM herramientas WHERE IdHerramienta = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $idHerramienta);
    $stmt->execute();
    $stmt->bind_result($nombreHerramienta);
    
    // Comprobar si se encontró el nombre de la herramienta
    if ($stmt->fetch()) {
        // Devolver el nombre de la herramienta como respuesta
        echo $nombreHerramienta;
    } else {
        // Si no se encontró el nombre de la herramienta, devolver un mensaje de error
        echo "Herramienta no encontrada";
    }

    // Cerrar la consulta y la conexión a la base de datos
    $stmt->close();
    $conn->close();
} else {
    // Si no se ha proporcionado el parámetro idHerramienta, devolver un mensaje de error
    echo "ID de herramienta no proporcionada";
}
?>
