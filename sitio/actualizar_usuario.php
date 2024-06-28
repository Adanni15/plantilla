<?php
session_start();
include 'obtener_datos.php'; // Archivo de conexión a la base de datos

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}

// Obtener los datos del formulario
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];
$correo_usuario = $_SESSION['correo'];

// Preparar la consulta SQL para actualizar los datos del usuario
$sql = "UPDATE usuario SET nombre = '$nombre', correo = '$email', telefono = '$telefono', direccion = '$direccion' WHERE correo = '$correo_usuario'";

if ($conn->query($sql) === TRUE) {
    // Actualización exitosa, actualizar las variables de sesión
    $_SESSION['nombre'] = $nombre;
    $_SESSION['correo'] = $email;
    $_SESSION['telefono'] = $telefono;
    $_SESSION['direccion'] = $direccion;

    // Redirigir de vuelta a la página de perfil del usuario
    header("Location: usuario.php");
} else {
    // Si hay algún error en la actualización
    echo "Error al actualizar el perfil: " . $conn->error;
}

$conn->close();
?>
