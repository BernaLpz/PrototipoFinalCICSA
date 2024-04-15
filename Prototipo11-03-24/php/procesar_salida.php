<?php
// Verificar si se han enviado los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Incluir el archivo de conexión a la base de datos
    include 'conexion.php';

    // Obtener los datos del formulario
    $idHerramienta = trim($_POST['id_herramienta']);
    $nombreHerramienta = trim($_POST['nombre']);
    $idEmpleado = trim($_POST['id_empleado']);
    $nombreEmpleado = trim($_POST['nombre_empleado']);
    $hora = trim($_POST['hora']);
    $fecha = trim($_POST['fecha']);
    $cantidad = trim($_POST['cantidad']);

    // Validar los datos
    if (empty($idHerramienta) || empty($idEmpleado) || empty($nombreEmpleado) || empty($hora) || empty($fecha) || empty($cantidad)) {
        // Si hay campos vacíos, redireccionar de nuevo al formulario con un mensaje de error
        header("Location: ../salidas.php?error=emptyfields");
        exit();
    }

    // Convertir la fecha al formato de la base de datos (YYYY-MM-DD)
    $fechaFormateada = date("Y-m-d", strtotime($fecha));

    // Convertir la hora al formato de la base de datos (HH:MM:SS)
    $horaFormateada = date("H:i:s", strtotime($hora));

    // Verificar si la herramienta existe en el inventario
    $sqlVerificar = "SELECT COUNT(*) as total, Cantidad FROM herramientas WHERE IdHerramienta = ?";
    $stmtVerificar = $conn->prepare($sqlVerificar);
    $stmtVerificar->bind_param("i", $idHerramienta);
    $stmtVerificar->execute();
    $resultVerificar = $stmtVerificar->get_result();
    $rowVerificar = $resultVerificar->fetch_assoc();
    $totalHerramientas = $rowVerificar['total'];

    if ($totalHerramientas == 0) {
        // Si la herramienta no existe en el inventario, mostrar un mensaje de error
        header("Location: ../salidas.php?error=herramientanoencontrada");
        exit();
    }

    // Verificar si hay suficiente cantidad de la herramienta en el inventario
    $cantidadDisponible = $rowVerificar['Cantidad'];
    if ($cantidad > $cantidadDisponible) {
        // No hay suficiente cantidad de la herramienta en el inventario, mostrar mensaje de error
        header("Location: ../salidas.php?error=insufficientquantity");
        exit();
    }

    // Calcular la nueva cantidad en el inventario
    $nuevaCantidad = $cantidadDisponible - $cantidad;

    // Actualizar la cantidad en el inventario
    $sqlActualizar = "UPDATE herramientas SET Cantidad = ? WHERE IdHerramienta = ?";
    $stmtActualizar = $conn->prepare($sqlActualizar);
    $stmtActualizar->bind_param("ii", $nuevaCantidad, $idHerramienta);
    $stmtActualizar->execute();

    // Insertar los datos en la base de datos
    $sql = "INSERT INTO salidas (IdHerramienta, NombreHerramienta, IdEmpleado, NombreEmpleado, Hora, Fecha, Cantidad) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isisssi", $idHerramienta, $nombreHerramienta, $idEmpleado, $nombreEmpleado, $horaFormateada, $fechaFormateada, $cantidad);
    $stmt->execute();
    
    // Redireccionar de nuevo al formulario con un mensaje de éxito
    header("Location: ../salidas.php?success=registroexitoso");
    exit();

    // Cerrar la conexión a la base de datos
    $stmt->close();
    $conn->close();
} else {
    // Si se intenta acceder directamente a este archivo sin enviar los datos del formulario, redireccionar al formulario de salidas
    header("Location: ../salidas.php");
    exit();
}
?>
