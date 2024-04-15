<?php
// Verificar si se han enviado los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Incluir el archivo de conexión a la base de datos
    include 'conexion.php';

    // Obtener los datos del formulario
    $idHerramienta = trim($_POST['idHerramienta']);
    $nombreHerramienta = trim($_POST['nombreHerramienta']);
    $cantidad = trim($_POST['cantidad']);

    // Validar los datos
    if (empty($idHerramienta) || empty($nombreHerramienta) || empty($cantidad)) {
        // Si hay campos vacíos, redireccionar de nuevo al formulario con un mensaje de error
        header("Location: ../inventario.php?error=emptyfields");
        exit();
    }

    // Verificar si el ID de la herramienta ya existe en la tabla de herramientas
    $sqlVerificar = "SELECT COUNT(*) as total FROM herramientas WHERE IdHerramienta = ?";
    $stmtVerificar = $conn->prepare($sqlVerificar);
    $stmtVerificar->bind_param("i", $idHerramienta); 
    $stmtVerificar->execute();
    $resultVerificar = $stmtVerificar->get_result();

    if ($resultVerificar->fetch_assoc()['total'] > 0) {
        // Si el ID de la herramienta ya existe, mostrar un mensaje de error
        header("Location: ../inventario.php?error=idexistente");
        exit();
    }

    // Insertar los datos en la base de datos
    $sql = "INSERT INTO herramientas (IdHerramienta, NombreHerramienta, Cantidad) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iss", $idHerramienta, $nombreHerramienta, $cantidad);
    $stmt->execute();
    
    // Redireccionar de nuevo al formulario con un mensaje de éxito
    header("Location: ../inventario.php?success=registroexitoso");
    exit();

    // Cerrar la conexión a la base de datos
    $stmt->close();
    $conn->close();
} else {
    // Si se intenta acceder directamente a este archivo sin enviar los datos del formulario, redireccionar al formulario de herramientas
    header("Location: ../inventario.php");
    exit();
}
?>
