<?php
// Incluir archivo de conexión a la base de datos
include 'obtener_datos.php';
session_start();

// Verificar si el usuario está logueado
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Mostrar mensaje de iniciar sesión si no está logueado
    echo "<script>
            alert('Por favor, inicie sesión para realizar la compra.');
            window.location.href = 'login.php';
          </script>";
    exit;
}

// Verificar si se han enviado los datos del formulario de compra
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $producto_id = $_POST['producto_id'];
    $producto_nombre = $_POST['producto_nombre'];
    $producto_precio = $_POST['producto_precio'];
    $cantidad = $_POST['cantidad'];
    $correo = $_SESSION['correo'];

    // Insertar los datos en la tabla historial
    $sql = "INSERT INTO historial (producto, cantidad, precio, estado, correo) VALUES ('$producto_nombre', $cantidad, $producto_precio, 'en camino', '$correo')";

    if ($conn->query($sql) === TRUE) {
        // Redirigir al usuario después de realizar la compra
        header("Location: usuario.php");
        exit;
    } else {
        echo "Error al procesar la compra: " . $conn->error;
    }
}

// Cerrar conexión a la base de datos
$conn->close();
?>
