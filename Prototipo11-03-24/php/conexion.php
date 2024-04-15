<?php
// Configuración de la base de datos
$ServerName = 'localhost';
$UserName = 'root';
$Password = '';
$Database = 'cicsa';

// Conexión a la base de datos
$conn = new mysqli($ServerName, $UserName, $Password, $Database);

// Verificar la conexión
if ($conn->connect_error) {
    die("ERROR: No se pudo conectar. " . $conn->connect_error);
}
?>