<?php
// Incluir el archivo de conexión a la base de datos
include 'conexion.php';

// Verificar si se han enviado los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Inicializar variables para almacenar los criterios de filtrado
    $idHerramienta = $_POST['idHerramienta'] ?? '';
    $idEmpleado = $_POST['idEmpleado'] ?? '';
    $fecha = $_POST['fecha'] ?? '';

    // Preparar la consulta base
    $sql = "SELECT * FROM entradas WHERE 1";

    // Aplicar filtros según los criterios ingresados
    if (!empty($idHerramienta)) {
        $sql .= " AND IdHerramienta = '$idHerramienta'";
    }
    if (!empty($idEmpleado)) {
        $sql .= " AND IdEmpleado = '$idEmpleado'";
    }
    if (!empty($fecha)) {
        $sql .= " AND Fecha = '$fecha'";
    }

    // Ejecutar la consulta
    $result = $conn->query($sql);

    // Verificar si se encontraron registros
    if ($result) {
        if ($result->num_rows > 0) {
            // Mostrar los registros en la tabla
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["IdHerramienta"] . "</td>";
                echo "<td>" . obtenerNombreHerramienta($row["IdHerramienta"], $conn) . "</td>";
                echo "<td>" . $row["IdEmpleado"] . "</td>";
                echo "<td>" . date("h:i A", strtotime($row["Hora"])) . "</td>"; // Formato de hora
                echo "<td>" . date("d/m/Y", strtotime($row["Fecha"])) . "</td>"; // Formato de fecha
                echo "</tr>";
            }
        } else {
            // Si no se encontraron registros, mostrar un mensaje
            echo "<tr><td colspan='5'>No se encontraron registros que coincidan con los criterios de búsqueda.</td></tr>";
        }
    } else {
        // Si ocurre un error en la consulta, mostrar un mensaje de error
        echo "<tr><td colspan='5'>Error al obtener los registros filtrados.</td></tr>";
    }
} else {
    // Si se intenta acceder directamente a este archivo sin enviar los datos del formulario, redireccionar al formulario de historialEntradaPag.php
    header("Location: ../historialEntradaPag.php");
    exit();
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
