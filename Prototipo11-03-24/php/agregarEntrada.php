<?php
// Verificar si se han enviado los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Incluir el archivo de conexión a la base de datos
    include 'conexion.php';

    // Obtener los datos del formulario
    $idHerramienta = $_POST['idHerramienta'];
    $nombreHerramienta = $_POST['nombreHerramienta'];
    $idEmpleado = $_POST['idEmpleado'];
    $hora = $_POST['hora'];
    $fecha = $_POST['fecha'];

    // Validar los datos (puedes agregar más validaciones según tus necesidades)
    if (empty($idHerramienta) || empty($nombreHerramienta) || empty($idEmpleado) || empty($hora) || empty($fecha)) {
        // Si hay campos vacíos, redireccionar de nuevo al formulario con un mensaje de error
        header("Location: ../entradas.php?error=emptyfields");
        exit();
    } else {
        // Insertar los datos en la base de datos
        $sql = "INSERT INTO entradas (IdHerramienta, NombreHerramienta, IdEmpleado, Hora, Fecha) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("isiss", $idHerramienta, $nombreHerramienta, $idEmpleado, $hora, $fecha);
        $stmt->execute();
        
        // Redireccionar de nuevo al formulario con un mensaje de éxito
        header("Location: ../entradas.php?success=registroexitoso");
        exit();
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
} else {
    // Si se intenta acceder directamente a este archivo sin enviar los datos del formulario, redireccionar al formulario de entradas
    header("Location: ../entradas.php");
    exit();
}
?>
