<?php
session_start();

// Verificar si el usuario está logueado
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}

// Incluir archivo de conexión a la base de datos
include 'obtener_datos.php';

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener la nueva URL de la foto desde el formulario
    $nueva_foto_url = $_POST['nueva_foto'];

    // Verificar que la URL no esté vacía
    if (!empty($nueva_foto_url)) {
        // Obtener el correo del usuario desde la sesión
        $correo = $_SESSION['correo'];

        // Actualizar la URL de la foto en la base de datos
        $sql = "UPDATE usuario SET img = ? WHERE correo = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $nueva_foto_url, $correo);

        if ($stmt->execute()) {
            // Actualizar la URL de la foto en la sesión
            $_SESSION['img'] = $nueva_foto_url;

            // Redirigir al usuario de nuevo a la página de perfil con un mensaje de éxito
            header("Location: usuario.php?mensaje=Foto actualizada correctamente");
            exit;
        } else {
            echo "Error al actualizar la foto: " . $conn->error;
        }
    } else {
        echo "Por favor, ingrese una URL válida.";
    }
}

$conn->close();
?>
