<?php
// crmkasaami/reports.php
// Reportes y analytics del CRM Kasaami

require_once 'config.php';
requireLogin();

$pageTitle = 'Reportes y Analytics';
$currentPage = 'reports';

// Obtener datos del usuario
$user = getUserInfo();

try {
    $db = Database::getInstance()->getConnection();
    
    // Filtros de fecha
    $start_date = $_GET['start_date'] ?? date('Y-m-01'); // Primer día del mes actual
    $end_date = $_GET['end_date'] ?? date('Y-m-d'); // Hoy
    $report_type = $_GET['report_type'] ?? 'general';
    
    // === ESTADÍSTICAS GENERALES ===
    $general_stats = [];
    
    // Total de leads en el período
    $stmt = $db->prepare("SELECT COUNT(*) as count FROM leads WHERE DATE(created_at) BETWEEN ? AND ?");
    $stmt->execute([$start_date, $end_date]);
    $general_stats['total_leads'] = $stmt->fetch()['count'];
    
    // Leads por estado en el período
    $stmt = $db->prepare("
        SELECT status, COUNT(*) as count 
        FROM leads 
        WHERE DATE(created_at) BETWEEN ? AND ?
        GROUP BY status 
        ORDER BY count DESC
    ");
    $stmt->execute([$start_date, $end_date]);
    $leads_by_status = $stmt->fetchAll();
    
    // Citas en el período
    $stmt = $db->prepare("SELECT COUNT(*) as count FROM appointments WHERE DATE(created_at) BETWEEN ? AND ?");
    $stmt->execute([$start_date, $end_date]);
    $general_stats['total_appointments'] = $stmt->fetch()['count'];
    
    // Tasa de conversión (leads con cita)
    $stmt = $db->prepare("
        SELECT COUNT(DISTINCT l.id) as count 
        FROM leads l 
        JOIN appointments a ON l.id = a.lead_id 
        WHERE DATE(l.created_at) BETWEEN ? AND ?
    ");
    $stmt->execute([$start_date, $end_date]);
    $leads_with_appointments = $stmt->fetch()['count'];
    $general_stats['conversion_rate'] = $general_stats['total_leads'] > 0 ? 
        round(($leads_with_appointments / $general_stats['total_leads']) * 100, 1) : 0;
    
    // Score promedio
    $stmt = $db->prepare("SELECT AVG(lead_score) as avg_score FROM leads WHERE DATE(created_at) BETWEEN ? AND ? AND lead_score > 0");
    $stmt->execute([$start_date, $end_date]);
    $general_stats['avg_score'] = round($stmt->fetch()['avg_score'] ?? 0);
    
    // === ANÁLISIS POR FUENTE ===
    $stmt = $db->prepare("
        SELECT found_us, COUNT(*) as count, AVG(lead_score) as avg_score
        FROM leads 
        WHERE DATE(created_at) BETWEEN ? AND ?
        GROUP BY found_us 
        ORDER BY count DESC
    ");
    $stmt->execute([$start_date, $end_date]);
    $leads_by_source = $stmt->fetchAll();
    
    // === ANÁLISIS POR PAÍS ===
    $stmt = $db->prepare("
        SELECT country, COUNT(*) as count, AVG(lead_score) as avg_score, AVG(CASE WHEN budget_range = '20000+' THEN 1 ELSE 0 END) * 100 as high_budget_percent
        FROM leads 
        WHERE DATE(created_at) BETWEEN ? AND ?
        GROUP BY country 
        ORDER BY count DESC
        LIMIT 10
    ");
    $stmt->execute([$start_date, $end_date]);
    $leads_by_country = $stmt->fetchAll();
    
    // === ANÁLISIS POR PRESUPUESTO ===
    $stmt = $db->prepare("
        SELECT budget_range, COUNT(*) as count, AVG(lead_score) as avg_score
        FROM leads 
        WHERE DATE(created_at) BETWEEN ? AND ?
        GROUP BY budget_range 
        ORDER BY FIELD(budget_range, '4000-8000', '8000-12000', '12000-16000', '16000-20000', '20000+')
    ");
    $stmt->execute([$start_date, $end_date]);
    $leads_by_budget = $stmt->fetchAll();
    
    // === ANÁLISIS TEMPORAL ===
    $stmt = $db->prepare("
        SELECT DATE(created_at) as date, COUNT(*) as leads_count, 
               COUNT(CASE WHEN lead_score >= 70 THEN 1 END) as high_quality_leads
        FROM leads 
        WHERE DATE(created_at) BETWEEN ? AND ?
        GROUP BY DATE(created_at) 
        ORDER BY date DESC
        LIMIT 30
    ");
    $stmt->execute([$start_date, $end_date]);
    $daily_stats = $stmt->fetchAll();
    
    // === ANÁLISIS DE CITAS ===
    $stmt = $db->prepare("
        SELECT a.status, COUNT(*) as count
        FROM appointments a
        WHERE DATE(a.created_at) BETWEEN ? AND ?
        GROUP BY a.status
        ORDER BY count DESC
    ");
    $stmt->execute([$start_date, $end_date]);
    $appointments_by_status = $stmt->fetchAll();
    
    // === TOP PERFORMERS ===
    // Días con más leads
    $stmt = $db->prepare("
        SELECT DAYNAME(created_at) as day_name, DAYOFWEEK(created_at) as day_num, COUNT(*) as count
        FROM leads 
        WHERE DATE(created_at) BETWEEN ? AND ?
        GROUP BY DAYOFWEEK(created_at), DAYNAME(created_at)
        ORDER BY count DESC
    ");
    $stmt->execute([$start_date, $end_date]);
    $leads_by_day = $stmt->fetchAll();
    
    // Horas con más leads
    $stmt = $db->prepare("
        SELECT HOUR(created_at) as hour, COUNT(*) as count
        FROM leads 
        WHERE DATE(created_at) BETWEEN ? AND ?
        GROUP BY HOUR(created_at)
        ORDER BY count DESC
        LIMIT 5
    ");
    $stmt->execute([$start_date, $end_date]);
    $leads_by_hour = $stmt->fetchAll();
    
    // === PROCEDIMIENTOS MÁS SOLICITADOS ===
    $stmt = $db->prepare("
        SELECT procedures_interest, COUNT(*) as count, AVG(lead_score) as avg_score
        FROM leads 
        WHERE DATE(created_at) BETWEEN ? AND ? AND LENGTH(procedures_interest) > 10
        GROUP BY procedures_interest 
        ORDER BY count DESC
        LIMIT 10
    ");
    $stmt->execute([$start_date, $end_date]);
    $top_procedures = $stmt->fetchAll();
    
} catch (Exception $e) {
    error_log("Reports page error: " . $e->getMessage());
    $error = "Error al cargar los reportes";
}

// Funciones de formato
function formatDate($date) {
    return date('d/m/Y', strtotime($date));
}

function getCountryName($code) {
    $countries = [
        'US' => 'Estados Unidos',
        'CA' => 'Canadá', 
        'MX' => 'México',
        'CO' => 'Colombia',
        'PE' => 'Perú',
        'CL' => 'Chile',
        'AR' => 'Argentina',
        'BR' => 'Brasil',
        'ES' => 'España',
        'IT' => 'Italia',
        'FR' => 'Francia',
        'DE' => 'Alemania',
        'UK' => 'Reino Unido'
    ];
    return $countries[$code] ?? $code;
}

function getSourceName($source) {
    $sources = [
        'google' => 'Google',
        'social' => 'Redes Sociales',
        'referral' => 'Referencia',
        'other' => 'Otro'
    ];
    return $sources[$source] ?? $source;
}
?>

<!DOCTYPE html>
<html lang="es" class="h-full bg-gray-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reportes - CRM Kasaami</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="../public/favicon.png">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Rufina:wght@400;700&display=swap" rel="stylesheet">
    
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <!-- Custom Tailwind Config -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'poppins': ['Poppins', 'sans-serif'],
                        'rufina': ['Rufina', 'serif']
                    },
                    colors: {
                        'kasaami': {
                            'violet': '#8B5CF6',
                            'light-violet': '#C4B5FD', 
                            'dark-violet': '#6D28D9',
                            'pearl': '#F8FAFC',
                            'gold': '#F59E0B'
                        }
                    }
                }
            }
        }
    </script>
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
                        <h2 class="text-3xl font-filson font-bold text-gray-900">Reportes y Analytics</h2>
                        <p class="mt-1 text-sm text-gray-500 font-filson">Análisis detallado del rendimiento del sistema</p>
                    </div>
                    <div class="mt-4 flex md:mt-0 md:ml-4">
                        <button onclick="exportReport()" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-kasaami-violet">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            Exportar
                        </button>
                    </div>
                </div>

                <!-- Filtros de fecha -->
                <div class="bg-white shadow rounded-lg mb-6">
                    <div class="p-6">
                        <form method="GET" class="grid grid-cols-1 gap-4 sm:grid-cols-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Fecha Inicio</label>
                                <input type="date" name="start_date" value="<?php echo $start_date; ?>"
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-kasaami-violet focus:border-kasaami-violet">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Fecha Fin</label>
                                <input type="date" name="end_date" value="<?php echo $end_date; ?>"
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-kasaami-violet focus:border-kasaami-violet">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Tipo de Reporte</label>
                                <select name="report_type" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-kasaami-violet focus:border-kasaami-violet">
                                    <option value="general" <?php echo $report_type === 'general' ? 'selected' : ''; ?>>General</option>
                                    <option value="leads" <?php echo $report_type === 'leads' ? 'selected' : ''; ?>>Solo Leads</option>
                                    <option value="appointments" <?php echo $report_type === 'appointments' ? 'selected' : ''; ?>>Solo Citas</option>
                                </select>
                            </div>
                            <div class="flex items-end">
                                <button type="submit" class="w-full bg-kasaami-violet text-white px-4 py-2 rounded-md hover:bg-kasaami-dark-violet focus:outline-none focus:ring-2 focus:ring-kasaami-violet focus:ring-offset-2">
                                    Generar Reporte
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Estadísticas principales -->
                <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4 mb-8">
                    <div class="bg-white overflow-hidden shadow rounded-xl">
                        <div class="p-5">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <div class="w-10 h-10 bg-blue-500 rounded-xl flex items-center justify-center">
                                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-5 w-0 flex-1">
                                    <dl>
                                        <dt class="text-sm font-medium text-gray-500 truncate">Total Leads</dt>
                                        <dd class="text-2xl font-bold text-gray-900"><?php echo number_format($general_stats['total_leads']); ?></dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-5 py-3">
                            <div class="text-sm text-gray-600">
                                Período: <?php echo formatDate($start_date); ?> - <?php echo formatDate($end_date); ?>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white overflow-hidden shadow rounded-xl">
                        <div class="p-5">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <div class="w-10 h-10 bg-green-500 rounded-xl flex items-center justify-center">
                                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-5 w-0 flex-1">
                                    <dl>
                                        <dt class="text-sm font-medium text-gray-500 truncate">Total Citas</dt>
                                        <dd class="text-2xl font-bold text-gray-900"><?php echo number_format($general_stats['total_appointments']); ?></dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-5 py-3">
                            <div class="text-sm text-gray-600">
                                Con cita: <?php echo $leads_with_appointments; ?> leads
                            </div>
                        </div>
                    </div>

                    <div class="bg-white overflow-hidden shadow rounded-xl">
                        <div class="p-5">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <div class="w-10 h-10 bg-purple-500 rounded-xl flex items-center justify-center">
                                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"/>
                                            <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-5 w-0 flex-1">
                                    <dl>
                                        <dt class="text-sm font-medium text-gray-500 truncate">Conversión</dt>
                                        <dd class="text-2xl font-bold text-gray-900"><?php echo $general_stats['conversion_rate']; ?>%</dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-5 py-3">
                            <div class="text-sm text-gray-600">
                                Leads → Citas
                            </div>
                        </div>
                    </div>

                    <div class="bg-white overflow-hidden shadow rounded-xl">
                        <div class="p-5">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <div class="w-10 h-10 bg-yellow-500 rounded-xl flex items-center justify-center">
                                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-5 w-0 flex-1">
                                    <dl>
                                        <dt class="text-sm font-medium text-gray-500 truncate">Score Promedio</dt>
                                        <dd class="text-2xl font-bold text-gray-900"><?php echo $general_stats['avg_score']; ?>/100</dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-5 py-3">
                            <div class="text-sm text-gray-600">
                                Calidad de leads
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Gráficos -->
                <div class="grid grid-cols-1 gap-8 lg:grid-cols-2 mb-8">
                    
                    <!-- Gráfico de leads por estado -->
                    <div class="bg-white shadow rounded-xl p-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Leads por Estado</h3>
                        <div class="relative h-64">
                            <canvas id="statusChart"></canvas>
                        </div>
                    </div>

                    <!-- Gráfico de leads por fuente -->
                    <div class="bg-white shadow rounded-xl p-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Leads por Fuente</h3>
                        <div class="relative h-64">
                            <canvas id="sourceChart"></canvas>
                        </div>
                    </div>

                    <!-- Gráfico de presupuesto -->
                    <div class="bg-white shadow rounded-xl p-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Distribución por Presupuesto</h3>
                        <div class="relative h-64">
                            <canvas id="budgetChart"></canvas>
                        </div>
                    </div>

                    <!-- Gráfico temporal -->
                    <div class="bg-white shadow rounded-xl p-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Tendencia Diaria (Últimos 30 días)</h3>
                        <div class="relative h-64">
                            <canvas id="dailyChart"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Tablas de análisis -->
                <div class="grid grid-cols-1 gap-8 lg:grid-cols-2 mb-8">
                    
                    <!-- Top países -->
                    <div class="bg-white shadow rounded-xl overflow-hidden">
                        <div class="px-6 py-4 border-b border-gray-200">
                            <h3 class="text-lg font-medium text-gray-900">Top Países</h3>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">País</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Leads</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Score Avg</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Budget Alto %</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <?php foreach ($leads_by_country as $country): ?>
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                <?php echo getCountryName($country['country']); ?>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                <?php echo number_format($country['count']); ?>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                <?php echo round($country['avg_score']); ?>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                <?php echo round($country['high_budget_percent']); ?>%
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Análisis temporal -->
                    <div class="bg-white shadow rounded-xl overflow-hidden">
                        <div class="px-6 py-4 border-b border-gray-200">
                            <h3 class="text-lg font-medium text-gray-900">Rendimiento por Día de la Semana</h3>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Día</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Total Leads</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">% del Total</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <?php 
                                    $total_leads_week = array_sum(array_column($leads_by_day, 'count'));
                                    foreach ($leads_by_day as $day): 
                                        $percentage = $total_leads_week > 0 ? round(($day['count'] / $total_leads_week) * 100, 1) : 0;
                                    ?>
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                <?php echo $day['day_name']; ?>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                <?php echo number_format($day['count']); ?>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                <div class="flex items-center">
                                                    <span class="mr-2"><?php echo $percentage; ?>%</span>
                                                    <div class="w-16 bg-gray-200 rounded-full h-2">
                                                        <div class="bg-kasaami-violet h-2 rounded-full" style="width: <?php echo $percentage; ?>%"></div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Procedimientos más solicitados -->
                <?php if (!empty($top_procedures)): ?>
                <div class="bg-white shadow rounded-xl overflow-hidden mb-8">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900">Procedimientos Más Solicitados</h3>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Procedimiento</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Solicitudes</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Score Promedio</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <?php foreach ($top_procedures as $procedure): ?>
                                    <tr>
                                        <td class="px-6 py-4 text-sm text-gray-900 max-w-xs">
                                            <div class="truncate" title="<?php echo htmlspecialchars($procedure['procedures_interest']); ?>">
                                                <?php echo htmlspecialchars(substr($procedure['procedures_interest'], 0, 80) . (strlen($procedure['procedures_interest']) > 80 ? '...' : '')); ?>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            <?php echo number_format($procedure['count']); ?>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            <?php echo round($procedure['avg_score']); ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script>
        // Datos para los gráficos
        const statusData = {
            labels: [<?php foreach ($leads_by_status as $status) echo "'" . ucfirst(str_replace('_', ' ', $status['status'])) . "',"; ?>],
            datasets: [{
                data: [<?php foreach ($leads_by_status as $status) echo $status['count'] . ','; ?>],
                backgroundColor: [
                    '#8B5CF6', '#06B6D4', '#10B981', '#F59E0B', 
                    '#EF4444', '#6366F1', '#EC4899', '#84CC16'
                ],
                borderWidth: 0
            }]
        };

        const sourceData = {
            labels: [<?php foreach ($leads_by_source as $source) echo "'" . getSourceName($source['found_us']) . "',"; ?>],
            datasets: [{
                data: [<?php foreach ($leads_by_source as $source) echo $source['count'] . ','; ?>],
                backgroundColor: ['#8B5CF6', '#06B6D4', '#10B981', '#F59E0B'],
                borderWidth: 0
            }]
        };

        const budgetData = {
            labels: [<?php foreach ($leads_by_budget as $budget) echo "'" . $budget['budget_range'] . "',"; ?>],
            datasets: [{
                label: 'Número de Leads',
                data: [<?php foreach ($leads_by_budget as $budget) echo $budget['count'] . ','; ?>],
                backgroundColor: '#8B5CF6',
                borderColor: '#6D28D9',
                borderWidth: 1
            }]
        };

        const dailyData = {
            labels: [<?php foreach (array_reverse($daily_stats) as $day) echo "'" . formatDate($day['date']) . "',"; ?>],
            datasets: [{
                label: 'Total Leads',
                data: [<?php foreach (array_reverse($daily_stats) as $day) echo $day['leads_count'] . ','; ?>],
                borderColor: '#8B5CF6',
                backgroundColor: 'rgba(139, 92, 246, 0.1)',
                tension: 0.4
            }, {
                label: 'Leads Alta Calidad',
                data: [<?php foreach (array_reverse($daily_stats) as $day) echo $day['high_quality_leads'] . ','; ?>],
                borderColor: '#10B981',
                backgroundColor: 'rgba(16, 185, 129, 0.1)',
                tension: 0.4
            }]
        };

        // Crear gráficos
        const chartOptions = {
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
        };

        // Gráfico de estados
        new Chart(document.getElementById('statusChart'), {
            type: 'doughnut',
            data: statusData,
            options: chartOptions
        });

        // Gráfico de fuentes
        new Chart(document.getElementById('sourceChart'), {
            type: 'pie',
            data: sourceData,
            options: chartOptions
        });

        // Gráfico de presupuesto
        new Chart(document.getElementById('budgetChart'), {
            type: 'bar',
            data: budgetData,
            options: {
                ...chartOptions,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Gráfico temporal
        new Chart(document.getElementById('dailyChart'), {
            type: 'line',
            data: dailyData,
            options: {
                ...chartOptions,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Función para exportar reporte
        function exportReport() {
            // Por ahora, mostrar un mensaje
            alert('Funcionalidad de exportación en desarrollo. Pronto estará disponible.');
            
            // En el futuro, aquí se podría implementar:
            // - Exportación a PDF
            // - Exportación a Excel
            // - Envío por email
        }

        console.log('Reports page loaded successfully');
    </script>
</body>
</html>