<?php
header('Content-Type: application/json');

require 'conecion.php'; // Archivo de conexión a la BD

$response = ['success' => false, 'data' => []];

// Definimos las horas de trabajo disponibles (deben coincidir con script.js)
$availableHours = [
    "09:00:00", "10:00:00", "11:00:00", "12:00:00", 
    "14:00:00", "15:00:00", "16:00:00", "17:00:00"
];
$total_slots_per_day = count($availableHours);

// 1. Lógica para obtener las horas ocupadas de un día específico (Usado por JS al hacer clic en un día)
if (isset($_GET['date'])) {
    $selected_date = $conn->real_escape_string($_GET['date']);
    
    // Consulta para obtener las horas ya reservadas para esa fecha
    $sql = "SELECT hora FROM citass WHERE fecha = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $selected_date);
    $stmt->execute();
    $result = $stmt->get_result();
    
    $occupied_hours = [];
    while ($row = $result->fetch_assoc()) {
        $occupied_hours[] = substr($row['hora'], 0, 5); // Formato HH:MM
    }
    $stmt->close();
    
    $response['success'] = true;
    $response['data'] = [
        'occupied' => $occupied_hours,
        'all_slots' => array_map(fn($h) => substr($h, 0, 5), $availableHours)
    ];

} 
// 2. Lógica para obtener el resumen de citas (Usado por FullCalendar para pintar los días)
else {
    // Consulta para contar el número de citas por día
    $sql = "SELECT fecha, COUNT(*) as count FROM citass GROUP BY fecha";
    $result = $conn->query($sql);
    
    $events = [];
    while ($row = $result->fetch_assoc()) {
        $count = (int)$row['count'];
        
        // Determinar si el día está completamente lleno
        if ($count >= $total_slots_per_day) {
            $events[] = [
                'date' => $row['fecha'],
                'title' => 'Día Lleno',
                'color' => '#d9534f' // Rojo para ocupado
            ];
        } else {
             // Opcional: mostrar un contador de citass parcial
            $events[] = [
                'date' => $row['fecha'],
                'title' => $count . ' citas',
                'color' => '#f0ad4e' // Amarillo/Naranja para parcialmente ocupado
            ];
        }
    }
    
    $response['success'] = true;
    $response['data'] = $events;
}

$conn->close();
echo json_encode($response);
?>