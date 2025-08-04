<?php
// crmkasaami/appointments.php
// Gestión de citas del CRM Kasaami

require_once 'config.php';
requireLogin();

$pageTitle = 'Gestión de Citas';
$currentPage = 'appointments';

// Obtener datos del usuario
$user = getUserInfo();

// Procesar acciones
$message = '';
$message_type = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $db = Database::getInstance()->getConnection();
        
        if (isset($_POST['action'])) {
            switch ($_POST['action']) {
                case 'update_status':
                    $appointment_id = (int)$_POST['appointment_id'];
                    $new_status = $_POST['status'];
                    
                    $stmt = $db->prepare("UPDATE appointments SET status = ?, updated_at = NOW() WHERE id = ?");
                    if ($stmt->execute([$new_status, $appointment_id])) {
                        // Obtener lead_id para registrar actividad
                        $stmt = $db->prepare("SELECT lead_id FROM appointments WHERE id = ?");
                        $stmt->execute([$appointment_id]);
                        $lead_id = $stmt->fetch()['lead_id'];
                        
                        // Registrar actividad
                        $stmt = $db->prepare("INSERT INTO lead_activities (lead_id, activity_type, description, performed_by) VALUES (?, 'appointment_status_changed', ?, ?)");
                        $stmt->execute([$lead_id, "Estado de cita cambiado a: $new_status", $user['username']]);
                        
                        $message = "Estado de cita actualizado correctamente";
                        $message_type = "success";
                    }
                    break;
                    
                case 'reschedule':
                    $appointment_id = (int)$_POST['appointment_id'];
                    $new_date = $_POST['appointment_date'];
                    $new_time = $_POST['appointment_time'];
                    
                    $stmt = $db->prepare("UPDATE appointments SET appointment_date = ?, appointment_time = ?, updated_at = NOW() WHERE id = ?");
                    if ($stmt->execute([$new_date, $new_time, $appointment_id])) {
                        $message = "Cita reprogramada correctamente";
                        $message_type = "success";
                    }
                    break;
                    
                case 'add_notes':
                    $appointment_id = (int)$_POST['appointment_id'];
                    $notes = trim($_POST['notes']);
                    
                    if (!empty($notes)) {
                        $stmt = $db->prepare("UPDATE appointments SET notes = ?, updated_at = NOW() WHERE id = ?");
                        if ($stmt->execute([$notes, $appointment_id])) {
                            $message = "Notas agregadas correctamente";
                            $message_type = "success";
                        }
                    }
                    break;
                    
                case 'create_appointment':
                    $lead_id = (int)$_POST['lead_id'];
                    $appointment_date = $_POST['appointment_date'];
                    $appointment_time = $_POST['appointment_time'];
                    $appointment_type = $_POST['appointment_type'];
                    $modality = $_POST['modality'];
                    
                    $stmt = $db->prepare("
                        INSERT INTO appointments (lead_id, appointment_date, appointment_time, appointment_type, modality, status) 
                        VALUES (?, ?, ?, ?, ?, 'programada')
                    ");
                    if ($stmt->execute([$lead_id, $appointment_date, $appointment_time, $appointment_type, $modality])) {
                        $message = "Cita creada correctamente";
                        $message_type = "success";
                    }
                    break;
            }
        }
    } catch (Exception $e) {
        $message = "Error: " . $e->getMessage();
        $message_type = "error";
    }
}

try {
    $db = Database::getInstance()->getConnection();
    
    // Filtros
    $status_filter = $_GET['status'] ?? '';
    $date_filter = $_GET['date'] ?? '';
    $search = $_GET['search'] ?? '';
    $page = max(1, (int)($_GET['page'] ?? 1));
    $per_page = 20;
    $offset = ($page - 1) * $per_page;
    
    // Construir consulta con filtros
    $where_conditions = [];
    $params = [];
    
    if (!empty($status_filter)) {
        $where_conditions[] = "a.status = ?";
        $params[] = $status_filter;
    }
    
    if (!empty($date_filter)) {
        $where_conditions[] = "DATE(a.appointment_date) = ?";
        $params[] = $date_filter;
    }
    
    if (!empty($search)) {
        $where_conditions[] = "(l.name LIKE ? OR l.lastname LIKE ? OR l.email LIKE ? OR l.phone LIKE ?)";
        $search_param = "%$search%";
        $params = array_merge($params, [$search_param, $search_param, $search_param, $search_param]);
    }
    
    $where_clause = !empty($where_conditions) ? "WHERE " . implode(" AND ", $where_conditions) : "";
    
    // Obtener citas
    $stmt = $db->prepare("
        SELECT a.*, 
               l.name, 
               l.lastname, 
               l.email, 
               l.phone, 
               l.country,
               l.lead_score,
               l.procedures_interest
        FROM appointments a
        JOIN leads l ON a.lead_id = l.id
        $where_clause
        ORDER BY a.appointment_date ASC, a.appointment_time ASC
        LIMIT $per_page OFFSET $offset
    ");
    $stmt->execute($params);
    $appointments = $stmt->fetchAll();
    
    // Contar total para paginación
    $count_stmt = $db->prepare("SELECT COUNT(*) as total FROM appointments a JOIN leads l ON a.lead_id = l.id $where_clause");
    $count_stmt->execute($params);
    $total_appointments = $count_stmt->fetch()['total'];
    $total_pages = ceil($total_appointments / $per_page);
    
    // Estadísticas rápidas
    $stats = [];
    $stats_queries = [
        'total' => "SELECT COUNT(*) as count FROM appointments",
        'programada' => "SELECT COUNT(*) as count FROM appointments WHERE status = 'programada'",
        'confirmada' => "SELECT COUNT(*) as count FROM appointments WHERE status = 'confirmada'",
        'hoy' => "SELECT COUNT(*) as count FROM appointments WHERE DATE(appointment_date) = CURDATE() AND status NOT IN ('cancelada', 'no_asistio')"
    ];
    
    foreach ($stats_queries as $key => $query) {
        $stmt = $db->query($query);
        $stats[$key] = $stmt->fetch()['count'];
    }
    
    // Obtener todas las citas para el calendario (último mes y próximos 2 meses)
    $calendar_start = date('Y-m-01', strtotime('-1 month'));
    $calendar_end = date('Y-m-t', strtotime('+2 months'));
    
    $stmt = $db->prepare("
        SELECT a.*, 
               l.name, 
               l.lastname, 
               l.email, 
               l.phone
        FROM appointments a 
        JOIN leads l ON a.lead_id = l.id 
        WHERE a.appointment_date BETWEEN ? AND ?
        ORDER BY a.appointment_date, a.appointment_time
    ");
    $stmt->execute([$calendar_start, $calendar_end]);
    $calendar_appointments = $stmt->fetchAll();
    
    // Obtener leads sin cita para crear nuevas citas
    $leads_stmt = $db->query("
        SELECT l.id, l.name, l.lastname, l.email 
        FROM leads l 
        LEFT JOIN appointments a ON l.id = a.lead_id AND a.status NOT IN ('cancelada', 'no_asistio')
        WHERE a.id IS NULL
        ORDER BY l.created_at DESC 
        LIMIT 50
    ");
    $leads_without_appointment = $leads_stmt->fetchAll();
    
} catch (Exception $e) {
    error_log("Appointments page error: " . $e->getMessage());
    $error = "Error al cargar las citas";
}

// Funciones de formato
function formatDate($date) {
    return date('d/m/Y', strtotime($date));
}

function formatDateTime($datetime) {
    return date('d/m/Y H:i', strtotime($datetime));
}

function formatTime($time) {
    return date('H:i', strtotime($time));
}

function getStatusColor($status) {
    $colors = [
        'programada' => 'bg-blue-100 text-blue-800',
        'confirmada' => 'bg-green-100 text-green-800',
        'en_progreso' => 'bg-yellow-100 text-yellow-800',
        'completada' => 'bg-gray-100 text-gray-800',
        'cancelada' => 'bg-red-100 text-red-800',
        'no_asistio' => 'bg-orange-100 text-orange-800'
    ];
    return $colors[$status] ?? 'bg-gray-100 text-gray-800';
}

function getModalityIcon($modality) {
    $icons = [
        'virtual' => '💻',
        'presencial' => '🏥',
        'telefonica' => '📞'
    ];
    return $icons[$modality] ?? '📅';
}
?>

<!DOCTYPE html>
<html lang="es" class="h-full bg-gray-50">
<head>
    <title>Citas - CRM Kasaami</title>
    
    <?php include 'includes/head-common.php'; ?>
</head>

<body class="h-full font-filson bg-gray-50">
    <div class="min-h-full">
        <!-- Navigation -->
        <?php include 'includes/navbar.php'; ?>

        <!-- Main content -->
        <div class="py-6">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                
                <!-- Header -->
                <div class="md:flex md:items-center md:justify-between mb-6">
                    <div class="flex-1 min-w-0">
                        <h2 class="text-3xl font-filson font-bold text-gray-900">Gestión de Citas</h2>
                        <p class="mt-1 text-sm text-gray-500 font-filson">Administra y programa citas con clientes</p>
                    </div>
                    <div class="mt-4 flex space-x-3 md:mt-0 md:ml-4">
                        <button onclick="openCalendarModal()" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-kasaami-violet font-filson transition-colors duration-200">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            Vista Calendario
                        </button>
                        <button onclick="openCreateModal()" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-kasaami-violet hover:bg-kasaami-dark-violet focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-kasaami-violet font-filson transition-colors duration-200">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Nueva Cita
                        </button>
                    </div>
                </div>

                <!-- Mensajes -->
                <?php if (!empty($message)): ?>
                    <div class="mb-6 p-4 rounded-lg <?php echo $message_type === 'success' ? 'bg-green-50 border border-green-200' : 'bg-red-50 border border-red-200'; ?>">
                        <div class="flex">
                            <svg class="h-5 w-5 <?php echo $message_type === 'success' ? 'text-green-400' : 'text-red-400'; ?>" viewBox="0 0 20 20" fill="currentColor">
                                <?php if ($message_type === 'success'): ?>
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                <?php else: ?>
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 000 2v4a1 1 0 002 0V7a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                <?php endif; ?>
                            </svg>
                            <div class="ml-3">
                                <p class="text-sm <?php echo $message_type === 'success' ? 'text-green-700' : 'text-red-700'; ?>">
                                    <?php echo htmlspecialchars($message); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Estadísticas rápidas -->
                <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4 mb-6">
                    <div class="bg-white overflow-hidden shadow rounded-lg">
                        <div class="p-5">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <div class="w-8 h-8 bg-blue-500 rounded-lg flex items-center justify-center">
                                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-5 w-0 flex-1">
                                    <dl>
                                        <dt class="text-sm font-medium text-gray-500 truncate">Total Citas</dt>
                                        <dd class="text-lg font-medium text-gray-900"><?php echo number_format($stats['total']); ?></dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white overflow-hidden shadow rounded-lg">
                        <div class="p-5">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <div class="w-8 h-8 bg-yellow-500 rounded-lg flex items-center justify-center">
                                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-5 w-0 flex-1">
                                    <dl>
                                        <dt class="text-sm font-medium text-gray-500 truncate">Programadas</dt>
                                        <dd class="text-lg font-medium text-gray-900"><?php echo number_format($stats['programada']); ?></dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white overflow-hidden shadow rounded-lg">
                        <div class="p-5">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <div class="w-8 h-8 bg-green-500 rounded-lg flex items-center justify-center">
                                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-5 w-0 flex-1">
                                    <dl>
                                        <dt class="text-sm font-medium text-gray-500 truncate">Confirmadas</dt>
                                        <dd class="text-lg font-medium text-gray-900"><?php echo number_format($stats['confirmada']); ?></dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white overflow-hidden shadow rounded-lg">
                        <div class="p-5">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <div class="w-8 h-8 bg-purple-500 rounded-lg flex items-center justify-center">
                                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-5 w-0 flex-1">
                                    <dl>
                                        <dt class="text-sm font-medium text-gray-500 truncate">Hoy</dt>
                                        <dd class="text-lg font-medium text-gray-900"><?php echo number_format($stats['hoy']); ?></dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Filtros y búsqueda -->
                <div class="bg-white shadow rounded-lg mb-6">
                    <div class="p-6">
                        <form method="GET" class="grid grid-cols-1 gap-4 sm:grid-cols-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Buscar Cliente</label>
                                <input type="text" name="search" value="<?php echo htmlspecialchars($search); ?>" 
                                       placeholder="Nombre, email o teléfono..." 
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-kasaami-violet focus:border-kasaami-violet">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Estado</label>
                                <select name="status" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-kasaami-violet focus:border-kasaami-violet">
                                    <option value="">Todos los estados</option>
                                    <option value="programada" <?php echo $status_filter === 'programada' ? 'selected' : ''; ?>>Programada</option>
                                    <option value="confirmada" <?php echo $status_filter === 'confirmada' ? 'selected' : ''; ?>>Confirmada</option>
                                    <option value="en_progreso" <?php echo $status_filter === 'en_progreso' ? 'selected' : ''; ?>>En Progreso</option>
                                    <option value="completada" <?php echo $status_filter === 'completada' ? 'selected' : ''; ?>>Completada</option>
                                    <option value="cancelada" <?php echo $status_filter === 'cancelada' ? 'selected' : ''; ?>>Cancelada</option>
                                    <option value="no_asistio" <?php echo $status_filter === 'no_asistio' ? 'selected' : ''; ?>>No Asistió</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Fecha</label>
                                <input type="date" name="date" value="<?php echo htmlspecialchars($date_filter); ?>"
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-kasaami-violet focus:border-kasaami-violet">
                            </div>
                            <div class="flex items-end">
                                <button type="submit" class="w-full bg-kasaami-violet text-white px-4 py-2 rounded-md hover:bg-kasaami-dark-violet focus:outline-none focus:ring-2 focus:ring-kasaami-violet focus:ring-offset-2">
                                    Filtrar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Tabla de citas -->
                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cliente</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha & Hora</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipo</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Modalidad</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Score</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <?php foreach ($appointments as $appointment): ?>
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="h-10 w-10 rounded-full bg-kasaami-violet flex items-center justify-center">
                                                    <span class="text-white text-sm font-medium">
                                                        <?php echo strtoupper(substr($appointment['name'], 0, 1)); ?>
                                                    </span>
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        <?php echo htmlspecialchars($appointment['name'] . ' ' . $appointment['lastname']); ?>
                                                    </div>
                                                    <div class="text-sm text-gray-500">
                                                        <?php echo htmlspecialchars($appointment['email']); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900"><?php echo formatDate($appointment['appointment_date']); ?></div>
                                            <div class="text-sm text-gray-500"><?php echo formatTime($appointment['appointment_time']); ?></div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            <?php echo ucfirst(str_replace('_', ' ', $appointment['appointment_type'])); ?>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <span class="mr-2"><?php echo getModalityIcon($appointment['modality']); ?></span>
                                                <span class="text-sm text-gray-900"><?php echo ucfirst($appointment['modality']); ?></span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full <?php echo getStatusColor($appointment['status']); ?>">
                                                <?php echo ucfirst(str_replace('_', ' ', $appointment['status'])); ?>
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <span class="text-sm font-medium mr-2"><?php echo $appointment['lead_score']; ?></span>
                                                <div class="w-16 bg-gray-200 rounded-full h-2">
                                                    <div class="bg-kasaami-violet h-2 rounded-full" style="width: <?php echo $appointment['lead_score']; ?>%"></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <button onclick="openStatusModal(<?php echo $appointment['id']; ?>, '<?php echo $appointment['status']; ?>')" class="text-kasaami-violet hover:text-kasaami-dark-violet mr-3">
                                                Estado
                                            </button>
                                            <button onclick="openRescheduleModal(<?php echo $appointment['id']; ?>, '<?php echo $appointment['appointment_date']; ?>', '<?php echo $appointment['appointment_time']; ?>')" class="text-blue-600 hover:text-blue-900 mr-3">
                                                Reprogramar
                                            </button>
                                            <button onclick="openNotesModal(<?php echo $appointment['id']; ?>, '<?php echo htmlspecialchars($appointment['notes'] ?? '', ENT_QUOTES); ?>')" class="text-green-600 hover:text-green-900">
                                                Notas
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Paginación (similar a leads.php) -->
                <?php if ($total_pages > 1): ?>
                    <div class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6 mt-6">
                        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                            <div>
                                <p class="text-sm text-gray-700">
                                    Mostrando 
                                    <span class="font-medium"><?php echo ($page - 1) * $per_page + 1; ?></span>
                                    a 
                                    <span class="font-medium"><?php echo min($page * $per_page, $total_appointments); ?></span>
                                    de 
                                    <span class="font-medium"><?php echo $total_appointments; ?></span>
                                    resultados
                                </p>
                            </div>
                            <div>
                                <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px">
                                    <?php for ($i = max(1, $page - 2); $i <= min($total_pages, $page + 2); $i++): ?>
                                        <a href="?page=<?php echo $i; ?>&status=<?php echo $status_filter; ?>&date=<?php echo $date_filter; ?>&search=<?php echo urlencode($search); ?>" 
                                           class="<?php echo $i === $page ? 'bg-kasaami-violet text-white' : 'bg-white text-gray-500 hover:bg-gray-50'; ?> relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium">
                                            <?php echo $i; ?>
                                        </a>
                                    <?php endfor; ?>
                                </nav>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Modal para crear cita -->
    <div id="createModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden z-50">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="bg-white rounded-lg shadow-xl max-w-md w-full">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">Crear Nueva Cita</h3>
                </div>
                <form method="POST">
                    <div class="px-6 py-4 space-y-4">
                        <input type="hidden" name="action" value="create_appointment">
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Cliente</label>
                            <select name="lead_id" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-kasaami-violet focus:border-kasaami-violet">
                                <option value="">Seleccionar cliente</option>
                                <?php foreach ($leads_without_appointment as $lead): ?>
                                    <option value="<?php echo $lead['id']; ?>">
                                        <?php echo htmlspecialchars($lead['name'] . ' ' . $lead['lastname'] . ' - ' . $lead['email']); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Fecha</label>
                                <input type="date" name="appointment_date" required min="<?php echo date('Y-m-d'); ?>"
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-kasaami-violet focus:border-kasaami-violet">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Hora</label>
                                <select name="appointment_time" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-kasaami-violet focus:border-kasaami-violet">
                                    <option value="">Seleccionar hora</option>
                                    <option value="09:00:00">09:00 AM</option>
                                    <option value="10:00:00">10:00 AM</option>
                                    <option value="11:00:00">11:00 AM</option>
                                    <option value="14:00:00">02:00 PM</option>
                                    <option value="15:00:00">03:00 PM</option>
                                    <option value="16:00:00">04:00 PM</option>
                                    <option value="17:00:00">05:00 PM</option>
                                </select>
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Tipo de Cita</label>
                            <select name="appointment_type" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-kasaami-violet focus:border-kasaami-violet">
                                <option value="inicial">Consulta Inicial</option>
                                <option value="seguimiento">Seguimiento</option>
                                <option value="cirugia">Cirugía</option>
                                <option value="postoperatorio">Postoperatorio</option>
                            </select>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Modalidad</label>
                            <select name="modality" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-kasaami-violet focus:border-kasaami-violet">
                                <option value="virtual">Virtual</option>
                                <option value="presencial">Presencial</option>
                                <option value="telefonica">Telefónica</option>
                            </select>
                        </div>
                    </div>
                    <div class="px-6 py-4 border-t border-gray-200 flex justify-end space-x-3">
                        <button type="button" onclick="closeCreateModal()" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">
                            Cancelar
                        </button>
                        <button type="submit" class="px-4 py-2 bg-kasaami-violet text-white rounded-md hover:bg-kasaami-dark-violet">
                            Crear Cita
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal para cambiar estado -->
    <div id="statusModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden z-50">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="bg-white rounded-lg shadow-xl max-w-md w-full">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">Cambiar Estado de la Cita</h3>
                </div>
                <form method="POST">
                    <div class="px-6 py-4">
                        <input type="hidden" name="action" value="update_status">
                        <input type="hidden" name="appointment_id" id="statusAppointmentId">
                        
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nuevo Estado</label>
                        <select name="status" id="statusSelect" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-kasaami-violet focus:border-kasaami-violet">
                            <option value="programada">Programada</option>
                            <option value="confirmada">Confirmada</option>
                            <option value="en_progreso">En Progreso</option>
                            <option value="completada">Completada</option>
                            <option value="cancelada">Cancelada</option>
                            <option value="no_asistio">No Asistió</option>
                        </select>
                    </div>
                    <div class="px-6 py-4 border-t border-gray-200 flex justify-end space-x-3">
                        <button type="button" onclick="closeStatusModal()" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">
                            Cancelar
                        </button>
                        <button type="submit" class="px-4 py-2 bg-kasaami-violet text-white rounded-md hover:bg-kasaami-dark-violet">
                            Guardar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal para reprogramar -->
    <div id="rescheduleModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden z-50">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="bg-white rounded-lg shadow-xl max-w-md w-full">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">Reprogramar Cita</h3>
                </div>
                <form method="POST">
                    <div class="px-6 py-4 space-y-4">
                        <input type="hidden" name="action" value="reschedule">
                        <input type="hidden" name="appointment_id" id="rescheduleAppointmentId">
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nueva Fecha</label>
                            <input type="date" name="appointment_date" id="rescheduleDate" required min="<?php echo date('Y-m-d'); ?>"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-kasaami-violet focus:border-kasaami-violet">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nueva Hora</label>
                            <select name="appointment_time" id="rescheduleTime" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-kasaami-violet focus:border-kasaami-violet">
                                <option value="">Seleccionar hora</option>
                                <option value="09:00:00">09:00 AM</option>
                                <option value="10:00:00">10:00 AM</option>
                                <option value="11:00:00">11:00 AM</option>
                                <option value="14:00:00">02:00 PM</option>
                                <option value="15:00:00">03:00 PM</option>
                                <option value="16:00:00">04:00 PM</option>
                                <option value="17:00:00">05:00 PM</option>
                            </select>
                        </div>
                    </div>
                    <div class="px-6 py-4 border-t border-gray-200 flex justify-end space-x-3">
                        <button type="button" onclick="closeRescheduleModal()" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">
                            Cancelar
                        </button>
                        <button type="submit" class="px-4 py-2 bg-kasaami-violet text-white rounded-md hover:bg-kasaami-dark-violet">
                            Reprogramar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal para notas -->
    <div id="notesModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden z-50">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="bg-white rounded-lg shadow-xl max-w-md w-full">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">Notas de la Cita</h3>
                </div>
                <form method="POST">
                    <div class="px-6 py-4">
                        <input type="hidden" name="action" value="add_notes">
                        <input type="hidden" name="appointment_id" id="notesAppointmentId">
                        
                        <label class="block text-sm font-medium text-gray-700 mb-2">Notas</label>
                        <textarea name="notes" id="notesTextarea" rows="4" 
                                  class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-kasaami-violet focus:border-kasaami-violet"
                                  placeholder="Agregar notas sobre la cita..."></textarea>
                    </div>
                    <div class="px-6 py-4 border-t border-gray-200 flex justify-end space-x-3">
                        <button type="button" onclick="closeNotesModal()" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">
                            Cancelar
                        </button>
                        <button type="submit" class="px-4 py-2 bg-kasaami-violet text-white rounded-md hover:bg-kasaami-dark-violet">
                            Guardar Notas
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal para calendario -->
    <div id="calendarModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden z-50">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="bg-white rounded-lg shadow-xl max-w-6xl w-full max-h-[90vh] overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                    <h3 class="text-lg font-medium text-gray-900 font-filson">Calendario de Citas</h3>
                    <button onclick="closeCalendarModal()" class="text-gray-400 hover:text-gray-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                
                <div class="p-6 overflow-y-auto max-h-[80vh]">
                    <!-- Navegación del calendario -->
                    <div class="flex justify-between items-center mb-6">
                        <div class="flex items-center space-x-4">
                            <button onclick="previousMonth()" class="p-2 text-gray-500 hover:text-kasaami-violet transition-colors duration-200">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                </svg>
                            </button>
                            <h4 id="currentMonth" class="text-xl font-semibold text-gray-900 font-filson"></h4>
                            <button onclick="nextMonth()" class="p-2 text-gray-500 hover:text-kasaami-violet transition-colors duration-200">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </button>
                        </div>
                        <div class="flex items-center space-x-2">
                            <button onclick="goToToday()" class="px-3 py-1 text-sm bg-kasaami-violet text-white rounded-md hover:bg-kasaami-dark-violet font-filson">
                                Hoy
                            </button>
                        </div>
                    </div>

                    <!-- Calendario -->
                    <div class="grid grid-cols-7 gap-1 mb-4">
                        <!-- Días de la semana -->
                        <div class="p-3 text-center text-sm font-medium text-gray-500 font-filson">Lun</div>
                        <div class="p-3 text-center text-sm font-medium text-gray-500 font-filson">Mar</div>
                        <div class="p-3 text-center text-sm font-medium text-gray-500 font-filson">Mié</div>
                        <div class="p-3 text-center text-sm font-medium text-gray-500 font-filson">Jue</div>
                        <div class="p-3 text-center text-sm font-medium text-gray-500 font-filson">Vie</div>
                        <div class="p-3 text-center text-sm font-medium text-gray-500 font-filson">Sáb</div>
                        <div class="p-3 text-center text-sm font-medium text-gray-500 font-filson">Dom</div>
                    </div>

                    <!-- Grid de días -->
                    <div id="calendarGrid" class="grid grid-cols-7 gap-1">
                        <!-- Los días se generan dinámicamente con JavaScript -->
                    </div>

                    <!-- Leyenda -->
                    <div class="mt-6 flex items-center space-x-6 text-sm font-filson">
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-green-500 rounded-full mr-2"></div>
                            <span class="text-gray-600">Confirmada</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-blue-500 rounded-full mr-2"></div>
                            <span class="text-gray-600">Programada</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-yellow-500 rounded-full mr-2"></div>
                            <span class="text-gray-600">Pendiente</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-red-500 rounded-full mr-2"></div>
                            <span class="text-gray-600">Cancelada</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para detalles de cita del calendario -->
    <div id="appointmentDetailModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden z-[60]">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="bg-white rounded-lg shadow-xl max-w-md w-full">
                <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                    <h3 class="text-lg font-medium text-gray-900 font-filson">Detalles de la Cita</h3>
                    <button onclick="closeAppointmentDetailModal()" class="text-gray-400 hover:text-gray-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <div id="appointmentDetailContent" class="p-6">
                    <!-- El contenido se genera dinámicamente -->
                </div>
            </div>
        </div>
    </div>

    <script>
        // Funciones para modales
        function openCreateModal() {
            document.getElementById('createModal').classList.remove('hidden');
        }
        
        function closeCreateModal() {
            document.getElementById('createModal').classList.add('hidden');
        }

        function openStatusModal(appointmentId, currentStatus) {
            document.getElementById('statusAppointmentId').value = appointmentId;
            document.getElementById('statusSelect').value = currentStatus;
            document.getElementById('statusModal').classList.remove('hidden');
        }

        function closeStatusModal() {
            document.getElementById('statusModal').classList.add('hidden');
        }

        function openRescheduleModal(appointmentId, currentDate, currentTime) {
            document.getElementById('rescheduleAppointmentId').value = appointmentId;
            document.getElementById('rescheduleDate').value = currentDate;
            document.getElementById('rescheduleTime').value = currentTime;
            document.getElementById('rescheduleModal').classList.remove('hidden');
        }

        function closeRescheduleModal() {
            document.getElementById('rescheduleModal').classList.add('hidden');
        }

        function openNotesModal(appointmentId, currentNotes) {
            document.getElementById('notesAppointmentId').value = appointmentId;
            document.getElementById('notesTextarea').value = currentNotes;
            document.getElementById('notesModal').classList.remove('hidden');
        }

        function closeNotesModal() {
            document.getElementById('notesModal').classList.add('hidden');
        }

        // Datos de citas para el calendario (desde PHP)
        const calendarAppointments = <?php echo json_encode($calendar_appointments); ?>;
        
        // Variables del calendario
        let currentDate = new Date();
        let currentMonth = currentDate.getMonth();
        let currentYear = currentDate.getFullYear();
        
        // Funciones del calendario
        function openCalendarModal() {
            document.getElementById('calendarModal').classList.remove('hidden');
            renderCalendar();
        }
        
        function closeCalendarModal() {
            document.getElementById('calendarModal').classList.add('hidden');
        }
        
        function openAppointmentDetailModal(appointment) {
            const modal = document.getElementById('appointmentDetailModal');
            const content = document.getElementById('appointmentDetailContent');
            
            const statusColors = {
                'programada': 'bg-blue-100 text-blue-800',
                'confirmada': 'bg-green-100 text-green-800',
                'pendiente': 'bg-yellow-100 text-yellow-800',
                'cancelada': 'bg-red-100 text-red-800',
                'completada': 'bg-gray-100 text-gray-800',
                'no_asistio': 'bg-red-100 text-red-800'
            };
            
            content.innerHTML = `
                <div class="space-y-4">
                    <div>
                        <h4 class="text-lg font-semibold text-gray-900 font-filson">
                            ${appointment.name} ${appointment.lastname}
                        </h4>
                        <p class="text-sm text-gray-600 font-filson">${appointment.email}</p>
                        <p class="text-sm text-gray-600 font-filson">${appointment.phone}</p>
                    </div>
                    
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="text-sm font-medium text-gray-500 font-filson">Fecha</label>
                            <p class="text-sm text-gray-900 font-filson">${formatDate(appointment.appointment_date)}</p>
                        </div>
                        <div>
                            <label class="text-sm font-medium text-gray-500 font-filson">Hora</label>
                            <p class="text-sm text-gray-900 font-filson">${formatTime(appointment.appointment_time)}</p>
                        </div>
                    </div>
                    
                    <div>
                        <label class="text-sm font-medium text-gray-500 font-filson">Estado</label>
                        <p class="mt-1">
                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full ${statusColors[appointment.status] || 'bg-gray-100 text-gray-800'}">
                                ${appointment.status.charAt(0).toUpperCase() + appointment.status.slice(1).replace('_', ' ')}
                            </span>
                        </p>
                    </div>
                    
                    ${appointment.appointment_type ? `
                        <div>
                            <label class="text-sm font-medium text-gray-500 font-filson">Tipo de Cita</label>
                            <p class="text-sm text-gray-900 font-filson">${appointment.appointment_type}</p>
                        </div>
                    ` : ''}
                    
                    ${appointment.modality ? `
                        <div>
                            <label class="text-sm font-medium text-gray-500 font-filson">Modalidad</label>
                            <p class="text-sm text-gray-900 font-filson">${appointment.modality}</p>
                        </div>
                    ` : ''}
                    
                    ${appointment.notes ? `
                        <div>
                            <label class="text-sm font-medium text-gray-500 font-filson">Notas</label>
                            <p class="text-sm text-gray-900 font-filson">${appointment.notes}</p>
                        </div>
                    ` : ''}
                    
                    <div class="pt-4 border-t border-gray-200 flex space-x-3">
                        <a href="mailto:${appointment.email}" class="flex-1 text-center px-3 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 font-filson">
                            Email
                        </a>
                        <a href="tel:${appointment.phone}" class="flex-1 text-center px-3 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 font-filson">
                            Llamar
                        </a>
                    </div>
                </div>
            `;
            
            modal.classList.remove('hidden');
        }
        
        function closeAppointmentDetailModal() {
            document.getElementById('appointmentDetailModal').classList.add('hidden');
        }
        
        function previousMonth() {
            currentMonth--;
            if (currentMonth < 0) {
                currentMonth = 11;
                currentYear--;
            }
            renderCalendar();
        }
        
        function nextMonth() {
            currentMonth++;
            if (currentMonth > 11) {
                currentMonth = 0;
                currentYear++;
            }
            renderCalendar();
        }
        
        function goToToday() {
            const today = new Date();
            currentMonth = today.getMonth();
            currentYear = today.getFullYear();
            renderCalendar();
        }
        
        function renderCalendar() {
            const monthNames = [
                'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
                'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
            ];
            
            // Actualizar título del mes
            document.getElementById('currentMonth').textContent = `${monthNames[currentMonth]} ${currentYear}`;
            
            // Obtener primer día del mes y días en el mes
            const firstDay = new Date(currentYear, currentMonth, 1);
            const lastDay = new Date(currentYear, currentMonth + 1, 0);
            const daysInMonth = lastDay.getDate();
            const startingDayOfWeek = (firstDay.getDay() + 6) % 7; // Convertir domingo=0 a lunes=0
            
            // Limpiar grid
            const grid = document.getElementById('calendarGrid');
            grid.innerHTML = '';
            
            // Agregar días vacíos al inicio
            for (let i = 0; i < startingDayOfWeek; i++) {
                const emptyDay = document.createElement('div');
                emptyDay.className = 'h-24 border border-gray-200 bg-gray-50';
                grid.appendChild(emptyDay);
            }
            
            // Agregar días del mes
            for (let day = 1; day <= daysInMonth; day++) {
                const dayElement = document.createElement('div');
                dayElement.className = 'h-24 border border-gray-200 bg-white hover:bg-gray-50 cursor-pointer relative';
                
                const dateString = `${currentYear}-${(currentMonth + 1).toString().padStart(2, '0')}-${day.toString().padStart(2, '0')}`;
                const dayAppointments = calendarAppointments.filter(apt => apt.appointment_date === dateString);
                
                // Marcar día actual
                const today = new Date();
                const isToday = currentYear === today.getFullYear() && 
                               currentMonth === today.getMonth() && 
                               day === today.getDate();
                
                dayElement.innerHTML = `
                    <div class="p-2">
                        <div class="text-sm font-medium ${isToday ? 'text-kasaami-violet font-bold' : 'text-gray-900'} font-filson">
                            ${day}
                        </div>
                        <div class="mt-1 space-y-1">
                            ${dayAppointments.slice(0, 3).map(apt => {
                                const colors = {
                                    'programada': 'bg-blue-500',
                                    'confirmada': 'bg-green-500',
                                    'pendiente': 'bg-yellow-500',
                                    'cancelada': 'bg-red-500',
                                    'completada': 'bg-gray-500',
                                    'no_asistio': 'bg-red-500'
                                };
                                return `
                                    <div class="text-xs p-1 rounded ${colors[apt.status] || 'bg-gray-500'} text-white truncate font-filson cursor-pointer hover:opacity-80" 
                                         onclick="event.stopPropagation(); openAppointmentDetailModal(${JSON.stringify(apt).replace(/"/g, '&quot;')})">
                                        ${formatTime(apt.appointment_time)} - ${apt.name}
                                    </div>
                                `;
                            }).join('')}
                            ${dayAppointments.length > 3 ? `
                                <div class="text-xs text-gray-500 font-filson">
                                    +${dayAppointments.length - 3} más
                                </div>
                            ` : ''}
                        </div>
                    </div>
                `;
                
                grid.appendChild(dayElement);
            }
        }
        
        function formatDate(dateString) {
            const date = new Date(dateString + 'T00:00:00');
            return date.toLocaleDateString('es-ES', {
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            });
        }
        
        function formatTime(timeString) {
            const [hours, minutes] = timeString.split(':');
            return `${hours}:${minutes}`;
        }

        // Cerrar modales con Escape
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeCreateModal();
                closeStatusModal();
                closeRescheduleModal();
                closeNotesModal();
                closeCalendarModal();
                closeAppointmentDetailModal();
            }
        });
    </script>
</body>
</html>