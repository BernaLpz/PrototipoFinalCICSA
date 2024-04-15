<?php
// Verificar si se han enviado los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Incluir el archivo de conexión a la base de datos
    include 'conexion.php';

    // Obtener los datos del formulario
    $idHerramientaEditar = trim($_POST['idHerramientaEditar']);
    $nuevaCantidad = trim($_POST['nuevaCantidad']);

    // Validar los datos
    if (empty($idHerramientaEditar) || empty($nuevaCantidad)) {
        // Si hay campos vacíos, redireccionar de nuevo al formulario con un mensaje de error
        header("Location: ../inventario.php?error=emptyfields");
        exit();
    }

    // Verificar si la herramienta existe en el inventario
    $sqlVerificar = "SELECT COUNT(*) as total FROM herramientas WHERE IdHerramienta = ?";
    $stmtVerificar = $conn->prepare($sqlVerificar);
    $stmtVerificar->bind_param("i", $idHerramientaEditar);
    $stmtVerificar->execute();
    $resultVerificar = $stmtVerificar->get_result();

    if ($resultVerificar->fetch_assoc()['total'] > 0) {
        // La herramienta existe en el inventario, proceder con la edición de la cantidad
        $sql = "UPDATE herramientas SET Cantidad = ? WHERE IdHerramienta = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $nuevaCantidad, $idHerramientaEditar);
        $stmt->execute();

        // Redireccionar de nuevo al formulario con un mensaje de éxito
        header("Location: ../inventario.php?success=edicionexitosa");
        exit();
    } else {
        // La herramienta no existe en el inventario, mostrar mensaje de error
        header("Location: ../inventario.php?error=herramientanoencontrada");
        exit();
    }

    // Cerrar la conexión a la base de datos
    $stmt->close();
    $conn->close();
} else {
    // Si se intenta acceder directamente a este archivo sin enviar los datos del formulario, redireccionar al formulario de inventario
    header("Location: ../inventario.php");
    exit();
}
?>
