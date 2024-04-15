<?php
// Verificar si se han enviado los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Incluir el archivo de conexión a la base de datos
    include 'conexion.php';

    // Obtener los datos del formulario y limpiarlos
    $id = htmlspecialchars($_POST["id"]);
    $nombre = htmlspecialchars($_POST['nombre']);
    $apellido = htmlspecialchars($_POST['apellido']);
    $puesto = htmlspecialchars($_POST['puesto']);

    // Validar los datos
    if (empty($id) || empty($nombre) || empty($apellido) || empty($puesto)) {
        // Si hay campos vacíos, redireccionar de nuevo al formulario con un mensaje de error
        header("Location: ../lista_trabajadores.php?error=emptyfields");
        exit();
    } else {
        // Verificar si el ID del trabajador ya existe en la base de datos
        $sql_verificar = "SELECT id_empleado FROM trabajadores WHERE id_empleado = ?";
        $stmt_verificar = $conn->prepare($sql_verificar);
        $stmt_verificar->bind_param("i", $id);
        $stmt_verificar->execute();
        $stmt_verificar->store_result();
        if ($stmt_verificar->num_rows > 0) {
            // Si el ID ya existe, redireccionar con un mensaje de error
            header("Location: ../lista_trabajadores.php?error=idexistente");
            exit();
        } else {
            // Insertar los datos en la base de datos
            $sql_insertar = "INSERT INTO trabajadores (id_empleado, nombre, apellido, puesto) VALUES (?, ?, ?, ?)";
            $stmt_insertar = $conn->prepare($sql_insertar);
            $stmt_insertar->bind_param("isss", $id, $nombre, $apellido, $puesto);
            if ($stmt_insertar->execute()) {
                // Redireccionar de nuevo al formulario con un mensaje de éxito
                header("Location: ../lista_trabajadores.php?success=registroexitoso");
                exit();
            } else {
                // Si hay un error al ejecutar la consulta, redireccionar con un mensaje de error
                header("Location: ../lista_trabajadores.php?error=sqlerror");
                exit();
            }
        }
    }

    // Cerrar la conexión a la base de datos
    $stmt_verificar->close();
    $stmt_insertar->close();
    $conn->close();
} else {
    // Si se intenta acceder directamente a este archivo sin enviar los datos del formulario, redireccionar al formulario de lista_trabajadores
    header("Location: ../lista_trabajadores.php");
    exit();
}
?>
