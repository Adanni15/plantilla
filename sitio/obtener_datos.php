<?php
$servername = "roundhouse.proxy.rlwy.net";
$username = "root";
$password = "TtfKtATYkCzOglzhvxsknItVPDhNoCYN";
$dbname = "railway";
$port = "57267";

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
