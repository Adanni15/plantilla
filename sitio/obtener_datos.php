<?php
$servername = "monorail.proxy.rlwy.net";
$username = "root";
$password = "RVqVbGZkDeAbTVjNEWZbFVSTNeBekWJV";
$dbname = "railway";
$port = "15077";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Configuración de la conexión (opcional)
// Por ejemplo, establecer el conjunto de caracteres
$conn->set_charset("utf8");

?>
