<?php
header('Content-Type: application/json');

// Incluye el archivo de configuración de la base de datos
require 'conecion.php';

// Verifica que el método de solicitud sea POST
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo json_encode(['success' => false, 'message' => 'Método de solicitud no permitido.']);
    exit;
}

// 1. Recoger y sanitizar los datos
$fecha    = $conn->real_escape_string($_POST['fecha'] ?? '');
$hora     = $conn->real_escape_string($_POST['hora'] ?? '');
$nombre   = $conn->real_escape_string($_POST['nombre'] ?? '');
$servicio = $conn->real_escape_string($_POST['servicio'] ?? '');
$email    = $conn->real_escape_string($_POST['email'] ?? '');
$telefono = $conn->real_escape_string($_POST['telefono'] ?? '');
$notas    = $conn->real_escape_string($_POST['notas'] ?? '');

// 2. Validación simple (Asegúrate de que los campos requeridos no estén vacíos)
if (empty($fecha) || empty($hora) || empty($nombre) || empty($servicio)) {
    echo json_encode(['success' => false, 'message' => 'Faltan campos requeridos (Fecha, Hora, Nombre, Servicio).']);
    exit;
}

// 3. Preparar la sentencia SQL para evitar inyecciones
$sql = "INSERT INTO citass (fecha, hora, nombre, email, telefono, servicio, notas) 
        VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

if ($stmt === false) {
    echo json_encode(['success' => false, 'message' => 'Error al preparar la consulta: ' . $conn->error]);
    exit;
}

// Asignar los parámetros (s = string)
// La fecha es 's', la hora es 's', los demás son 's'
$stmt->bind_param("sssssss", $fecha, $hora, $nombre, $email, $telefono, $servicio, $notas);

// 4. Ejecutar y verificar
if ($stmt->execute()) {
    // Éxito: devolver el ID insertado
    $new_id = $conn->insert_id;
    echo json_encode(['success' => true, 'message' => 'Cita guardada.', 'id' => $new_id]);
} else {
    // Error
    echo json_encode(['success' => false, 'message' => 'Error al guardar en la base de datos: ' . $stmt->error]);
}

// 5. Cerrar la conexión y el statement
$stmt->close();
$conn->close();
?>