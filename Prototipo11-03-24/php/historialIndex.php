<?php
// Incluir el archivo de conexión a la base de datos
include 'conexion.php';

// Realizar la consulta para obtener el historial general de entradas y salidas
$sql = "SELECT * FROM historial ORDER BY Fecha DESC"; // Ajusta esta consulta según tu estructura de base de datos
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Imprimir los datos del historial en la tabla
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['ID'] . "</td>";
        echo "<td>" . $row['Tipo'] . "</td>";
        echo "<td>" . $row['ID_Herramienta'] . "</td>";
        echo "<td>" . $row['Nombre_Herramienta'] . "</td>";
        echo "<td>" . $row['ID_Empleado'] . "</td>";
        echo "<td>" . $row['Hora'] . "</td>";
        echo "<td>" . $row['Fecha'] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='7'>No hay entradas ni salidas en el historial.</td></tr>";
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
