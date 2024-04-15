<?php
// Incluir el archivo de conexión a la base de datos
include 'php/conexion.php';

// Consulta para obtener las herramientas existentes
$sql = "SELECT * FROM herramientas";
$result = $conn->query($sql);

// Verificar si se encontraron herramientas
if ($result->num_rows > 0) {
    // Mostrar los registros en la tabla
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["IdHerramienta"] . "</td>";
        echo "<td>" . $row["NombreHerramienta"] . "</td>";
        echo "<td>" . $row["Cantidad"] . "</td>";
        echo "</tr>";
    }
} else {
    // Si no se encontraron herramientas, mostrar un mensaje
    echo "<tr><td colspan='5'>No se encontraron herramientas en el inventario.</td></tr>";
}

// Cerrar la conexión a la base de datos
$conn->close();
?>