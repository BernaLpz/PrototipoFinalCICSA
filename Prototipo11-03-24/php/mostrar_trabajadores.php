<?php
// Incluir el archivo de conexión a la base de datos
include 'php/conexion.php';

// Consulta para obtener las herramientas existentes
$sql = "SELECT * FROM trabajadores";
$result = $conn->query($sql);

// Verificar si se encontraron herramientas
if ($result->num_rows > 0) {
    // Mostrar los registros en la tabla
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id_empleado"] . "</td>";
        echo "<td>" . $row["nombre"] . "</td>";
        echo "<td>" . $row["apellido"] . "</td>";
        echo "<td>" . $row["puesto"] . "</td>";
        echo "</tr>";
    }
} else {
    // Si no se encontraron herramientas, mostrar un mensaje
    echo "<tr><td colspan='5'>No se encontraron trabajadores en la base de datos.</td></tr>";
}

// Cerrar la conexión a la base de datos
$conn->close();
?>