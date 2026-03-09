<?php
// Configuración de la Base de Datos
$servername = "localhost"; // O la IP de tu servidor
$username = "root";        // Por defecto en XAMPP/WAMP. ¡Cámbialo en producción!
$password = "";            // Por defecto vacío en XAMPP/WAMP. ¡Cámbialo en producción!
$dbname = "kukyspa";      // El nombre de la base de datos que creaste

// Crea la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Comprueba la conexión
if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

// Opcional: establecer el juego de caracteres a utf8
$conn->set_charset("utf8");

// La conexión ahora está lista para ser usada en otros scripts PHP
?>