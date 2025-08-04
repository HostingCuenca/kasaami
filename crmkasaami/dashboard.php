<?php
// crmkasaami/dashboard.php
// Dashboard principal del CRM Kasaami

require_once 'config.php';
requireLogin();

$pageTitle = 'Dashboard';
$currentPage = 'dashboard';

// Obtener datos del usuario
$user = getUserInfo();

try {
    $db = Database::getInstance()->getConnection();
    
    // Estadísticas principales
    $stats = [];
    
    // Total de leads
    $stmt = $db->query("SELECT COUNT(*) as total FROM leads");
    $stats['total_leads'] = $stmt->fetch()['total'];
    
    // Leads nuevos hoy
    $stmt = $db->query("SELECT COUNT(*) as total FROM leads WHERE DATE(created_at) = CURDATE()");
    $stats['leads_today'] = $stmt->fetch()['total'];
    
    // Citas programadas
    $stmt = $db->query("SELECT COUNT(*) as total FROM appointments WHERE status = 'programada'");
    $stats['appointments_scheduled'] = $stmt->fetch()['total'];
    
    // Citas hoy
    $stmt = $db->query("SELECT COUNT(*) as total FROM appointments WHERE DATE(appointment_date) = CURDATE() AND status NOT IN ('cancelada', 'no_asistio')");
    $stats['appointments_today'] = $stmt->fetch()['total'];
    
    // Leads por estado
    $stmt = $db->query("
        SELECT status, COUNT(*) as count 
        FROM leads 
        GROUP BY status 
        ORDER BY count DESC
    ");
    $leads_by_status = $stmt->fetchAll();
    
    // Leads recientes
    $stmt = $db->query("
        SELECT l.*, a.appointment_date, a.appointment_time 
        FROM leads l 
        LEFT JOIN appointments a ON l.id = a.lead_id 
        ORDER BY l.created_at DESC 
        LIMIT 10
    ");
    $recent_leads = $stmt->fetchAll();
    
    // Citas próximas
    $stmt = $db->query("
        SELECT a.*, l.name, l.lastname, l.email, l.phone 
        FROM appointments a 
        JOIN leads l ON a.lead_id = l.id 
        WHERE a.appointment_date >= CURDATE() 
        AND a.status NOT IN ('cancelada', 'no_asistio') 
        ORDER BY a.appointment_date, a.appointment_time 
        LIMIT 10
    ");
    $upcoming_appointments = $stmt->fetchAll();
    
    // Actividades recientes
    $stmt = $db->query("
        SELECT la.*, l.name, l.lastname 
        FROM lead_activities la 
        JOIN leads l ON la.lead_id = l.id 
        ORDER BY la.created_at DESC 
        LIMIT 15
    ");
    $recent_activities = $stmt->fetchAll();
    
} catch (Exception $e) {
    error_log("Dashboard error: " . $e->getMessage());
    $error = "Error al cargar el dashboard";
}

// Función para formatear fechas
function formatDate($date) {
    return date('d/m/Y', strtotime($date));
}

function formatDateTime($datetime) {
    return date('d/m/Y H:i', strtotime($datetime));
}

function formatTime($time) {
    return date('H:i', strtotime($time));
}

// Función para obtener color de estado
function getStatusColor($status) {
    $colors = [
        'nuevo' => 'bg-blue-100 text-blue-800',
        'contactado' => 'bg-yellow-100 text-yellow-800',
        'interesado' => 'bg-green-100 text-green-800',
        'propuesta_enviada' => 'bg-purple-100 text-purple-800',
        'negociando' => 'bg-orange-100 text-orange-800',
        'convertido' => 'bg-green-100 text-green-800',
        'perdido' => 'bg-red-100 text-red-800',
        'programada' => 'bg-blue-100 text-blue-800',
        'confirmada' => 'bg-green-100 text-green-800',
        'completada' => 'bg-gray-100 text-gray-800',
    ];
    
    return $colors[$status] ?? 'bg-gray-100 text-gray-800';
}
?>

<!DOCTYPE html>
<html lang="es" class="h-full bg-gray-50">
<head>
    <title>Dashboard - CRM Kasaami</title>
    
    <?php include 'includes/head-common.php'; ?>
    
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="h-full font-filson bg-gray-50">
    <div class="min-h-full">
        <!-- Navigation -->
        <?php include 'includes/navbar.php'; ?>

        <!-- Main content -->
        <div class="py-10">
            <header>
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between items-center">
                        <div>
                            <h1 class="text-3xl font-filson font-bold text-gray-900">Dashboard</h1>
                            <p class="mt-2 text-sm text-gray-600 font-filson">
                                Bienvenido de vuelta, <?php echo htmlspecialchars($user['full_name']); ?>
                            </p>
                        </div>
                        <div class="flex space-x-3">
                            <button type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-lg shadow-sm text-sm font-medium font-filson text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-kasaami-violet transition-colors duration-200">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                </svg>
                                Exportar
                            </button>
                        </div>
                    </div>
                </div>
            </header>

            <main>
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    
                    <!-- Estadísticas principales -->
                    <div class="mt-8">
                        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">
                            <!-- Total Leads -->
                            <div class="bg-white overflow-hidden shadow-lg rounded-2xl">
                                <div class="p-5">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <div class="w-8 h-8 bg-blue-500 rounded-lg flex items-center justify-center">
                                                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="ml-5 w-0 flex-1">
                                            <dl>
                                                <dt class="text-sm font-medium text-gray-500 truncate">Total Leads</dt>
                                                <dd class="text-lg font-medium text-gray-900"><?php echo number_format($stats['total_leads']); ?></dd>
                                            </dl>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-gray-50 px-5 py-3">
                                    <div class="text-sm">
                                        <span class="text-green-600 font-medium">+<?php echo $stats['leads_today']; ?></span>
                                        <span class="text-gray-500"> hoy</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Citas Programadas -->
                            <div class="bg-white overflow-hidden shadow-lg rounded-2xl">
                                <div class="p-5">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <div class="w-8 h-8 bg-green-500 rounded-lg flex items-center justify-center">
                                                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="ml-5 w-0 flex-1">
                                            <dl>
                                                <dt class="text-sm font-medium text-gray-500 truncate">Citas Programadas</dt>
                                                <dd class="text-lg font-medium text-gray-900"><?php echo number_format($stats['appointments_scheduled']); ?></dd>
                                            </dl>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-gray-50 px-5 py-3">
                                    <div class="text-sm">
                                        <span class="text-blue-600 font-medium"><?php echo $stats['appointments_today']; ?></span>
                                        <span class="text-gray-500"> hoy</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Conversión -->
                            <div class="bg-white overflow-hidden shadow-lg rounded-2xl">
                                <div class="p-5">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <div class="w-8 h-8 bg-purple-500 rounded-lg flex items-center justify-center">
                                                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"/>
                                                    <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"/>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="ml-5 w-0 flex-1">
                                            <dl>
                                                <dt class="text-sm font-medium text-gray-500 truncate">Tasa Conversión</dt>
                                                <dd class="text-lg font-medium text-gray-900">
                                                    <?php 
                                                    $conversion_rate = $stats['total_leads'] > 0 ? 
                                                        round(($stats['appointments_scheduled'] / $stats['total_leads']) * 100, 1) : 0;
                                                    echo $conversion_rate . '%';
                                                    ?>
                                                </dd>
                                            </dl>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-gray-50 px-5 py-3">
                                    <div class="text-sm">
                                        <span class="text-purple-600 font-medium">Meta: 25%</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Lead Score Promedio -->
                            <div class="bg-white overflow-hidden shadow-lg rounded-2xl">
                                <div class="p-5">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <div class="w-8 h-8 bg-yellow-500 rounded-lg flex items-center justify-center">
                                                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="ml-5 w-0 flex-1">
                                            <dl>
                                                <dt class="text-sm font-medium text-gray-500 truncate">Score Promedio</dt>
                                                <dd class="text-lg font-medium text-gray-900">
                                                    <?php
                                                    $stmt = $db->query("SELECT AVG(lead_score) as avg_score FROM leads WHERE lead_score > 0");
                                                    $avg_score = round($stmt->fetch()['avg_score'] ?? 0);
                                                    echo $avg_score . '/100';
                                                    ?>
                                                </dd>
                                            </dl>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-gray-50 px-5 py-3">
                                    <div class="text-sm">
                                        <span class="text-yellow-600 font-medium">Calidad leads</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Gráficos y tablas -->
                    <div class="mt-8 grid grid-cols-1 gap-8 lg:grid-cols-2">
                        
                        <!-- Gráfico de leads por estado -->
                        <div class="bg-white shadow-lg rounded-2xl p-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Leads por Estado</h3>
                            <div class="relative h-64">
                                <canvas id="leadsChart"></canvas>
                            </div>
                        </div>

                        <!-- Actividades recientes -->
                        <div class="bg-white shadow-lg rounded-2xl p-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Actividades Recientes</h3>
                            <div class="flow-root">
                                <ul class="-mb-8">
                                    <?php foreach (array_slice($recent_activities, 0, 8) as $index => $activity): ?>
                                        <li>
                                            <div class="relative pb-8">
                                                <?php if ($index < count($recent_activities) - 1): ?>
                                                    <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200"></span>
                                                <?php endif; ?>
                                                <div class="relative flex space-x-3">
                                                    <div>
                                                        <span class="h-8 w-8 rounded-full bg-kasaami-violet flex items-center justify-center ring-8 ring-white">
                                                            <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                                            </svg>
                                                        </span>
                                                    </div>
                                                    <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                                        <div>
                                                            <p class="text-sm text-gray-900">
                                                                <span class="font-medium"><?php echo htmlspecialchars($activity['name'] . ' ' . $activity['lastname']); ?></span>
                                                                - <?php echo htmlspecialchars($activity['description']); ?>
                                                            </p>
                                                        </div>
                                                        <div class="text-right text-sm whitespace-nowrap text-gray-500">
                                                            <?php echo formatDateTime($activity['created_at']); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Tablas de datos -->
                    <div class="mt-8 grid grid-cols-1 gap-8 lg:grid-cols-2">
                        
                        <!-- Leads recientes -->
                        <div class="bg-white shadow-lg rounded-2xl overflow-hidden">
                            <div class="px-6 py-4 border-b border-gray-200">
                                <h3 class="text-lg font-medium text-gray-900">Leads Recientes</h3>
                            </div>
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cliente</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Score</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        <?php foreach (array_slice($recent_leads, 0, 8) as $lead): ?>
                                            <tr class="hover:bg-gray-50">
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <div class="h-8 w-8 rounded-full bg-kasaami-violet flex items-center justify-center">
                                                            <span class="text-white text-sm font-medium">
                                                                <?php echo strtoupper(substr($lead['name'], 0, 1)); ?>
                                                            </span>
                                                        </div>
                                                        <div class="ml-3">
                                                            <div class="text-sm font-medium text-gray-900">
                                                                <?php echo htmlspecialchars($lead['name'] . ' ' . $lead['lastname']); ?>
                                                            </div>
                                                            <div class="text-sm text-gray-500">
                                                                <?php echo htmlspecialchars($lead['email']); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full <?php echo getStatusColor($lead['status']); ?>">
                                                        <?php echo ucfirst(str_replace('_', ' ', $lead['status'])); ?>
                                                    </span>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                    <div class="flex items-center">
                                                        <span class="text-sm font-medium mr-2"><?php echo $lead['lead_score']; ?></span>
                                                        <div class="w-16 bg-gray-200 rounded-full h-2">
                                                            <div class="bg-kasaami-violet h-2 rounded-full" style="width: <?php echo $lead['lead_score']; ?>%"></div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                    <?php echo formatDate($lead['created_at']); ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="px-6 py-4 border-t border-gray-200">
                                <a href="leads.php" class="text-kasaami-violet hover:text-kasaami-dark-violet text-sm font-medium">
                                    Ver todos los leads →
                                </a>
                            </div>
                        </div>

                        <!-- Próximas citas -->
                        <div class="bg-white shadow-lg rounded-2xl overflow-hidden">
                            <div class="px-6 py-4 border-b border-gray-200">
                                <h3 class="text-lg font-medium text-gray-900">Próximas Citas</h3>
                            </div>
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cliente</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Hora</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        <?php foreach (array_slice($upcoming_appointments, 0, 8) as $appointment): ?>
                                            <tr class="hover:bg-gray-50">
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <div class="h-8 w-8 rounded-full bg-green-500 flex items-center justify-center">
                                                            <span class="text-white text-sm font-medium">
                                                                <?php echo strtoupper(substr($appointment['name'], 0, 1)); ?>
                                                            </span>
                                                        </div>
                                                        <div class="ml-3">
                                                            <div class="text-sm font-medium text-gray-900">
                                                                <?php echo htmlspecialchars($appointment['name'] . ' ' . $appointment['lastname']); ?>
                                                            </div>
                                                            <div class="text-sm text-gray-500">
                                                                <?php echo htmlspecialchars($appointment['phone']); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                    <?php echo formatDate($appointment['appointment_date']); ?>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                    <?php echo formatTime($appointment['appointment_time']); ?>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full <?php echo getStatusColor($appointment['status']); ?>">
                                                        <?php echo ucfirst(str_replace('_', ' ', $appointment['status'])); ?>
                                                    </span>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="px-6 py-4 border-t border-gray-200">
                                <a href="appointments.php" class="text-kasaami-violet hover:text-kasaami-dark-violet text-sm font-medium">
                                    Ver todas las citas →
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Acciones rápidas -->
                    <div class="mt-8 bg-white shadow-lg rounded-2xl p-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Acciones Rápidas</h3>
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
                            <button class="relative group bg-gradient-to-r from-kasaami-violet to-kasaami-dark-violet p-4 rounded-lg overflow-hidden hover:shadow-lg transition-all duration-200">
                                <div class="relative z-10">
                                    <svg class="w-8 h-8 text-white mb-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"/>
                                    </svg>
                                    <div class="text-white text-sm font-medium">Nuevo Lead</div>
                                </div>
                            </button>
                            
                            <button class="relative group bg-gradient-to-r from-blue-500 to-blue-600 p-4 rounded-lg overflow-hidden hover:shadow-lg transition-all duration-200">
                                <div class="relative z-10">
                                    <svg class="w-8 h-8 text-white mb-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                    <div class="text-white text-sm font-medium">Agendar Cita</div>
                                </div>
                            </button>
                            
                            <button class="relative group bg-gradient-to-r from-green-500 to-green-600 p-4 rounded-lg overflow-hidden hover:shadow-lg transition-all duration-200">
                                <div class="relative z-10">
                                    <svg class="w-8 h-8 text-white mb-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                                    </svg>
                                    <div class="text-white text-sm font-medium">Enviar Email</div>
                                </div>
                            </button>
                            
                            <button class="relative group bg-gradient-to-r from-purple-500 to-purple-600 p-4 rounded-lg overflow-hidden hover:shadow-lg transition-all duration-200">
                                <div class="relative z-10">
                                    <svg class="w-8 h-8 text-white mb-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"/>
                                        <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"/>
                                    </svg>
                                    <div class="text-white text-sm font-medium">Ver Reportes</div>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
        // Gráfico de leads por estado
        const ctx = document.getElementById('leadsChart').getContext('2d');
        const leadsChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: [
                    <?php foreach ($leads_by_status as $status): ?>
                        '<?php echo ucfirst(str_replace("_", " ", $status["status"])); ?>',
                    <?php endforeach; ?>
                ],
                datasets: [{
                    data: [
                        <?php foreach ($leads_by_status as $status): ?>
                            <?php echo $status['count']; ?>,
                        <?php endforeach; ?>
                    ],
                    backgroundColor: [
                        '#8B5CF6', '#06B6D4', '#10B981', '#F59E0B', 
                        '#EF4444', '#6366F1', '#EC4899', '#84CC16'
                    ],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            padding: 20,
                            usePointStyle: true
                        }
                    }
                }
            }
        });

        // Auto-refresh cada 5 minutos
        setInterval(function() {
            location.reload();
        }, 300000);

        // Notificaciones en tiempo real (placeholder)
        function checkNotifications() {
            // Aquí iría la lógica para verificar nuevas notificaciones
            console.log('Checking notifications...');
        }

        // Verificar notificaciones cada minuto
        setInterval(checkNotifications, 60000);

        console.log('Dashboard CRM Kasaami loaded successfully');
    </script>
</body>
</html>