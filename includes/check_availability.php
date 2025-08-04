<?php
// includes/check_availability.php
// API para verificar disponibilidad de citas en tiempo real

// Incluir configuración de base de datos
require_once __DIR__ . '/database.php';

// Configurar cabeceras para respuesta JSON
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

// Función para responder JSON para disponibilidad
function availabilityJsonResponse($success, $message = '', $data = []) {
    echo json_encode([
        'success' => $success,
        'message' => $message,
        'data' => $data,
        'timestamp' => date('Y-m-d H:i:s'),
        'max_per_slot' => MAX_APPOINTMENTS_PER_SLOT
    ] + $data);
    exit;
}

try {
    // Verificar conexión a la base de datos
    $db = Database::getInstance()->getConnection();
    
    // Horarios disponibles (debe coincidir con formulario.php)
    $available_times = [
        '09:00' => '9:00 AM',
        '10:00' => '10:00 AM', 
        '11:00' => '11:00 AM',
        '14:00' => '2:00 PM',
        '15:00' => '3:00 PM',
        '16:00' => '4:00 PM',
        '17:00' => '5:00 PM'
    ];
    
    // Validar que se reciba una fecha
    if (!isset($_GET['date']) || empty($_GET['date'])) {
        availabilityJsonResponse(false, "Fecha requerida");
    }
    
    $date = $_GET['date'];
    
    // Validar formato de fecha
    if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $date)) {
        availabilityJsonResponse(false, "Formato de fecha inválido");
    }
    
    // Verificar que la fecha no sea en el pasado
    if (strtotime($date) < strtotime(date('Y-m-d'))) {
        availabilityJsonResponse(false, "No se pueden hacer citas en fechas pasadas");
    }
    
    // Si se especifica una hora específica, verificar solo esa
    if (isset($_GET['time']) && !empty($_GET['time'])) {
        $time = $_GET['time'];
        
        // Validar que la hora esté en el rango permitido
        if (!array_key_exists($time, $available_times)) {
            availabilityJsonResponse(false, "Hora no válida");
        }
        
        // Verificar disponibilidad para hora específica
        $stmt = $db->prepare("
            SELECT COUNT(*) as count 
            FROM appointments 
            WHERE appointment_date = ? 
            AND appointment_time = ? 
            AND status NOT IN ('cancelada', 'no_asistio')
        ");
        $stmt->execute([$date, $time]);
        $result = $stmt->fetch();
        
        $is_available = $result['count'] < MAX_APPOINTMENTS_PER_SLOT;
        $slots_taken = $result['count'];
        $slots_remaining = MAX_APPOINTMENTS_PER_SLOT - $slots_taken;
        
        availabilityJsonResponse(true, $is_available ? "Horario disponible" : "Horario no disponible", [
            'available' => $is_available,
            'slots_taken' => $slots_taken,
            'slots_remaining' => $slots_remaining,
            'max_slots' => MAX_APPOINTMENTS_PER_SLOT,
            'date' => $date,
            'time' => $time,
            'time_display' => $available_times[$time]
        ]);
        
    } else {
        // Verificar disponibilidad para toda la fecha
        $availability_data = [];
        $total_slots = count($available_times) * MAX_APPOINTMENTS_PER_SLOT;
        $total_taken = 0;
        $unavailable_times = [];
        
        foreach ($available_times as $time => $display) {
            $stmt = $db->prepare("
                SELECT COUNT(*) as count 
                FROM appointments 
                WHERE appointment_date = ? 
                AND appointment_time = ? 
                AND status NOT IN ('cancelada', 'no_asistio')
            ");
            $stmt->execute([$date, $time]);
            $result = $stmt->fetch();
            
            $slots_taken = $result['count'];
            $is_available = $slots_taken < MAX_APPOINTMENTS_PER_SLOT;
            
            $availability_data[$time] = [
                'time' => $time,
                'display' => $display,
                'available' => $is_available,
                'slots_taken' => $slots_taken,
                'slots_remaining' => MAX_APPOINTMENTS_PER_SLOT - $slots_taken
            ];
            
            $total_taken += $slots_taken;
            
            if (!$is_available) {
                $unavailable_times[] = $time;
            }
        }
        
        $available_slots = $total_slots - $total_taken;
        $availability_percentage = ($available_slots / $total_slots) * 100;
        
        availabilityJsonResponse(true, "Disponibilidad verificada", [
            'date' => $date,
            'total_slots' => $total_slots,
            'available_slots' => $available_slots,
            'taken_slots' => $total_taken,
            'availability_percentage' => round($availability_percentage, 1),
            'unavailable_times' => $unavailable_times,
            'times_detail' => $availability_data,
            'max_per_slot' => MAX_APPOINTMENTS_PER_SLOT
        ]);
    }
    
} catch (Exception $e) {
    error_log("Check availability error: " . $e->getMessage());
    availabilityJsonResponse(false, "Error interno del servidor", [
        'error' => $e->getMessage()
    ]);
}
?>