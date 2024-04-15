<?php
// Incluir el archivo de conexión a la base de datos
include 'conexion.php';

// Obtener los parámetros del formulario de filtro
$idHerramienta = $_POST['idHerramienta'];
$idEmpleado = $_POST['idEmpleado'];
$fecha = $_POST['fecha'];

// Construir la consulta SQL basada en los parámetros de filtro
$sql = "SELECT * FROM historial WHERE 1";
if (!empty($idHerramienta)) {
    $sql .= " AND ID_Herramienta = '$idHerramienta'";
}
if (!empty($idEmpleado)) {
    $sql .= " AND ID_Empleado = '$idEmpleado'";
}
if (!empty($fecha)) {
    $sql .= " AND Fecha = '$fecha'";
}
$sql .= " ORDER BY Fecha DESC"; // Ordenar por fecha descendente

// Ejecutar la consulta
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Imprimir los datos del historial filtrado en la tabla
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['ID'] . "</td>";
        echo "<td>" . $row['Tipo'] . "</td>";
        echo "<td>" . $row['ID_Herramienta'] . "</td>";
        echo "<td>" . $row['Nombre_Herramienta'] . "</td>";
        echo "<td>" . $row['ID_Empleado'] . "</td>";
        echo "<td>" . $row['Nombre_Empleado'] . "</td>";
        echo "<td>" . $row['Hora'] . "</td>";
        echo "<td>" . $row['Fecha'] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='7'>No se encontraron resultados para el filtro aplicado.</td></tr>";
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
