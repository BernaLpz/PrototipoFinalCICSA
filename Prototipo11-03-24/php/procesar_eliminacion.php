<?php
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conectar a la base de datos
    include 'conexion.php';

    // Obtener el ID de la herramienta enviado desde el formulario
    $idHerramientaEliminar = $_POST["idHerramientaEliminar"];

    // Verificar si la herramienta existe en el inventario
    $sqlVerificar = "SELECT COUNT(*) as total FROM herramientas WHERE IdHerramienta = ?";
    $stmtVerificar = $conn->prepare($sqlVerificar);
    $stmtVerificar->bind_param("i", $idHerramientaEliminar);
    $stmtVerificar->execute();
    $resultVerificar = $stmtVerificar->get_result();
    $rowVerificar = $resultVerificar->fetch_assoc();
    $totalHerramientas = $rowVerificar['total'];

    if ($totalHerramientas > 0) {
        // La herramienta existe en el inventario, proceder con la eliminación
        $sqlEliminar = "DELETE FROM herramientas WHERE IdHerramienta = ?";
        $stmtEliminar = $conn->prepare($sqlEliminar);
        $stmtEliminar->bind_param("i", $idHerramientaEliminar);
        $stmtEliminar->execute();

        // Redireccionar de nuevo al formulario con un mensaje de éxito
        header("Location: ../inventario.php?success=eliminacionexitosa");
        exit();
    } else {
        // La herramienta no existe en el inventario, mostrar mensaje de error
        header("Location: ../inventario.php?error=herramientanoencontrada");
        exit();
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
} else {
    // Si se intenta acceder directamente a este archivo sin enviar los datos del formulario, redireccionar al formulario de inventario
    header("Location: ../inventario.php");
    exit();
}
?>
