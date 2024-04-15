<?php
// Incluir el archivo de conexión a la base de datos
include 'conexion.php';

// Consulta para obtener los últimos 10 registros de salida de herramientas
$sql = "SELECT * FROM salidas ORDER BY Fecha DESC, Hora DESC LIMIT 10";
$result = $conn->query($sql);

// Verificar si se encontraron registros
if ($result) {
    if ($result->num_rows > 0) {
        // Mostrar los registros en la tabla
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["IdHerramienta"] . "</td>";
            echo "<td>" . obtenerNombreHerramienta($row["IdHerramienta"], $conn) . "</td>";
            echo "<td>" . $row["Cantidad"] . "</td>";
            echo "<td>" . $row["IdEmpleado"] . "</td>";
            echo "<td>" . $row["NombreEmpleado"] . "</td>";
            echo "<td>" . date("h:i A", strtotime($row["Hora"])) . "</td>"; // Formato de hora
            echo "<td>" . date("d/m/Y", strtotime($row["Fecha"])) . "</td>"; // Formato de fecha
            echo "</tr>";
        }
    } else {
        // Si no se encontraron registros, mostrar un mensaje
        echo "<tr><td colspan='6'>No se encontraron registros de salida.</td></tr>";
    }
} else {
    // Si ocurre un error en la consulta, mostrar un mensaje de error
    echo "<tr><td colspan='6'>Error al obtener los registros de salida.</td></tr>";
}

// Cerrar la conexión a la base de datos
$conn->close();

// Función para obtener el nombre de la herramienta
function obtenerNombreHerramienta($idHerramienta, $conn) {
    $sql = "SELECT NombreHerramienta FROM herramientas WHERE IdHerramienta = '$idHerramienta'";
    $result = $conn->query($sql);
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row["NombreHerramienta"];
    } else {
        return "Nombre no encontrado";
    }
}
?>
