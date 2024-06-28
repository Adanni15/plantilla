<?php
session_start();
include '../obtener_datos.php'; // Archivo de conexión a la base de datos

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: ../login.php");
    exit;
}

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    
    // Eliminar la forma de pago según el ID proporcionado
    $sql = "DELETE FROM forma_pago WHERE id_forma_pago = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        // Redireccionar de vuelta a la página de formas de pago con un mensaje de éxito
        header("Location: formas_pago.php?status=success");
        exit;
    } else {
        // Si hay un error en la eliminación, redireccionar con un mensaje de error
        header("Location: formas_pago.php?status=error");
        exit;
    }
} else {
    // Si no se proporciona un ID válido, redireccionar con un mensaje de error
    header("Location: formas_pago.php?status=error");
    exit;
}

$conn->close();
?>
