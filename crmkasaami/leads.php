<?php
// crmkasaami/leads.php
// Gestión de leads del CRM Kasaami

require_once 'config.php';
requireLogin();

$pageTitle = 'Gestión de Leads';
$currentPage = 'leads';

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
                    $lead_id = (int)$_POST['lead_id'];
                    $new_status = $_POST['status'];
                    
                    $stmt = $db->prepare("UPDATE leads SET status = ?, updated_at = NOW() WHERE id = ?");
                    if ($stmt->execute([$new_status, $lead_id])) {
                        // Registrar actividad
                        $stmt = $db->prepare("INSERT INTO lead_activities (lead_id, activity_type, description, performed_by) VALUES (?, 'status_changed', ?, ?)");
                        $stmt->execute([$lead_id, "Estado cambiado a: $new_status", $user['username']]);
                        
                        $message = "Estado actualizado correctamente";
                        $message_type = "success";
                    }
                    break;
                    
                case 'assign_lead':
                    $lead_id = (int)$_POST['lead_id'];
                    $assigned_to = $_POST['assigned_to'];
                    
                    $stmt = $db->prepare("UPDATE leads SET assigned_to = ?, updated_at = NOW() WHERE id = ?");
                    if ($stmt->execute([$assigned_to, $lead_id])) {
                        $message = "Lead asignado correctamente";
                        $message_type = "success";
                    }
                    break;
                    
                case 'add_comment':
                    $lead_id = (int)$_POST['lead_id'];
                    $comment = trim($_POST['comment']);
                    $comment_type = $_POST['comment_type'];
                    
                    if (!empty($comment)) {
                        $stmt = $db->prepare("INSERT INTO lead_comments (lead_id, comment, comment_type, created_by) VALUES (?, ?, ?, ?)");
                        if ($stmt->execute([$lead_id, $comment, $comment_type, $user['username']])) {
                            $message = "Comentario agregado correctamente";
                            $message_type = "success";
                        }
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
    $search = $_GET['search'] ?? '';
    $page = max(1, (int)($_GET['page'] ?? 1));
    $per_page = 20;
    $offset = ($page - 1) * $per_page;
    
    // Construir consulta con filtros
    $where_conditions = [];
    $params = [];
    
    if (!empty($status_filter)) {
        $where_conditions[] = "l.status = ?";
        $params[] = $status_filter;
    }
    
    if (!empty($search)) {
        $where_conditions[] = "(l.name LIKE ? OR l.lastname LIKE ? OR l.email LIKE ? OR l.phone LIKE ?)";
        $search_param = "%$search%";
        $params = array_merge($params, [$search_param, $search_param, $search_param, $search_param]);
    }
    
    $where_clause = !empty($where_conditions) ? "WHERE " . implode(" AND ", $where_conditions) : "";
    
    // Obtener leads
    $stmt = $db->prepare("
        SELECT l.*, 
               a.appointment_date, 
               a.appointment_time,
               a.status as appointment_status,
               COUNT(lc.id) as comment_count,
               MAX(la.created_at) as last_activity
        FROM leads l
        LEFT JOIN appointments a ON l.id = a.lead_id AND a.status NOT IN ('cancelada', 'no_asistio')
        LEFT JOIN lead_comments lc ON l.id = lc.lead_id
        LEFT JOIN lead_activities la ON l.id = la.lead_id
        $where_clause
        GROUP BY l.id
        ORDER BY l.created_at DESC
        LIMIT $per_page OFFSET $offset
    ");
    $stmt->execute($params);
    $leads = $stmt->fetchAll();
    
    // Contar total para paginación
    $count_stmt = $db->prepare("SELECT COUNT(DISTINCT l.id) as total FROM leads l $where_clause");
    $count_stmt->execute($params);
    $total_leads = $count_stmt->fetch()['total'];
    $total_pages = ceil($total_leads / $per_page);
    
    // Estadísticas rápidas
    $stats = [];
    $stats_queries = [
        'total' => "SELECT COUNT(*) as count FROM leads",
        'nuevo' => "SELECT COUNT(*) as count FROM leads WHERE status = 'nuevo'",
        'contactado' => "SELECT COUNT(*) as count FROM leads WHERE status = 'contactado'",
        'convertido' => "SELECT COUNT(*) as count FROM leads WHERE status = 'convertido'"
    ];
    
    foreach ($stats_queries as $key => $query) {
        $stmt = $db->query($query);
        $stats[$key] = $stmt->fetch()['count'];
    }
    
    // Obtener usuarios para asignación
    $users_stmt = $db->query("SELECT username, full_name FROM users WHERE is_active = 1 ORDER BY full_name");
    $users = $users_stmt->fetchAll();
    
} catch (Exception $e) {
    error_log("Leads page error: " . $e->getMessage());
    $error = "Error al cargar los leads";
}

// Función para obtener color de prioridad
function getPriorityColor($priority) {
    $colors = [
        'baja' => 'bg-gray-100 text-gray-800',
        'media' => 'bg-blue-100 text-blue-800',
        'alta' => 'bg-orange-100 text-orange-800',
        'urgente' => 'bg-red-100 text-red-800'
    ];
    return $colors[$priority] ?? 'bg-gray-100 text-gray-800';
}

// Funciones de formato (reutilizando las del dashboard)
function formatDate($date) {
    return date('d/m/Y', strtotime($date));
}

function formatDateTime($datetime) {
    return date('d/m/Y H:i', strtotime($datetime));
}

function getStatusColor($status) {
    $colors = [
        'nuevo' => 'bg-blue-100 text-blue-800',
        'contactado' => 'bg-yellow-100 text-yellow-800',
        'interesado' => 'bg-green-100 text-green-800',
        'propuesta_enviada' => 'bg-purple-100 text-purple-800',
        'negociando' => 'bg-orange-100 text-orange-800',
        'convertido' => 'bg-green-100 text-green-800',
        'perdido' => 'bg-red-100 text-red-800'
    ];
    return $colors[$status] ?? 'bg-gray-100 text-gray-800';
}
?>

<!DOCTYPE html>
<html lang="es" class="h-full bg-gray-50">
<head>
    <title>Leads - CRM Kasaami</title>
    
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
                        <h2 class="text-3xl font-filson font-bold text-gray-900">Gestión de Leads</h2>
                        <p class="mt-1 text-sm text-gray-500 font-filson">Administra y da seguimiento a todos los leads del sistema</p>
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
                                            <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-5 w-0 flex-1">
                                    <dl>
                                        <dt class="text-sm font-medium text-gray-500 truncate">Total Leads</dt>
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
                                            <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-5 w-0 flex-1">
                                    <dl>
                                        <dt class="text-sm font-medium text-gray-500 truncate">Nuevos</dt>
                                        <dd class="text-lg font-medium text-gray-900"><?php echo number_format($stats['nuevo']); ?></dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white overflow-hidden shadow rounded-lg">
                        <div class="p-5">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <div class="w-8 h-8 bg-orange-500 rounded-lg flex items-center justify-center">
                                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-5 w-0 flex-1">
                                    <dl>
                                        <dt class="text-sm font-medium text-gray-500 truncate">Contactados</dt>
                                        <dd class="text-lg font-medium text-gray-900"><?php echo number_format($stats['contactado']); ?></dd>
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
                                        <dt class="text-sm font-medium text-gray-500 truncate">Convertidos</dt>
                                        <dd class="text-lg font-medium text-gray-900"><?php echo number_format($stats['convertido']); ?></dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Filtros y búsqueda -->
                <div class="bg-white shadow rounded-lg mb-6">
                    <div class="p-6">
                        <form method="GET" class="grid grid-cols-1 gap-4 sm:grid-cols-3">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Buscar</label>
                                <input type="text" name="search" value="<?php echo htmlspecialchars($search); ?>" 
                                       placeholder="Nombre, email o teléfono..." 
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-kasaami-violet focus:border-kasaami-violet">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Estado</label>
                                <select name="status" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-kasaami-violet focus:border-kasaami-violet">
                                    <option value="">Todos los estados</option>
                                    <option value="nuevo" <?php echo $status_filter === 'nuevo' ? 'selected' : ''; ?>>Nuevo</option>
                                    <option value="contactado" <?php echo $status_filter === 'contactado' ? 'selected' : ''; ?>>Contactado</option>
                                    <option value="interesado" <?php echo $status_filter === 'interesado' ? 'selected' : ''; ?>>Interesado</option>
                                    <option value="propuesta_enviada" <?php echo $status_filter === 'propuesta_enviada' ? 'selected' : ''; ?>>Propuesta Enviada</option>
                                    <option value="negociando" <?php echo $status_filter === 'negociando' ? 'selected' : ''; ?>>Negociando</option>
                                    <option value="convertido" <?php echo $status_filter === 'convertido' ? 'selected' : ''; ?>>Convertido</option>
                                    <option value="perdido" <?php echo $status_filter === 'perdido' ? 'selected' : ''; ?>>Perdido</option>
                                </select>
                            </div>
                            <div class="flex items-end">
                                <button type="submit" class="w-full bg-kasaami-violet text-white px-4 py-2 rounded-md hover:bg-kasaami-dark-violet focus:outline-none focus:ring-2 focus:ring-kasaami-violet focus:ring-offset-2">
                                    Filtrar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Tabla de leads -->
                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cliente</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Contacto</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Score</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Prioridad</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cita</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <?php foreach ($leads as $lead): ?>
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="h-10 w-10 rounded-full bg-kasaami-violet flex items-center justify-center">
                                                    <span class="text-white text-sm font-medium">
                                                        <?php echo strtoupper(substr($lead['name'], 0, 1)); ?>
                                                    </span>
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        <?php echo htmlspecialchars($lead['name'] . ' ' . $lead['lastname']); ?>
                                                    </div>
                                                    <div class="text-sm text-gray-500">
                                                        <?php echo htmlspecialchars($lead['country']); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900"><?php echo htmlspecialchars($lead['email']); ?></div>
                                            <div class="text-sm text-gray-500"><?php echo htmlspecialchars($lead['phone']); ?></div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full <?php echo getStatusColor($lead['status']); ?>">
                                                <?php echo ucfirst(str_replace('_', ' ', $lead['status'])); ?>
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <span class="text-sm font-medium mr-2"><?php echo $lead['lead_score']; ?></span>
                                                <div class="w-16 bg-gray-200 rounded-full h-2">
                                                    <div class="bg-kasaami-violet h-2 rounded-full" style="width: <?php echo $lead['lead_score']; ?>%"></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full <?php echo getPriorityColor($lead['priority']); ?>">
                                                <?php echo ucfirst($lead['priority']); ?>
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            <?php if ($lead['appointment_date']): ?>
                                                <div><?php echo formatDate($lead['appointment_date']); ?></div>
                                                <div class="text-xs text-gray-500"><?php echo date('H:i', strtotime($lead['appointment_time'])); ?></div>
                                            <?php else: ?>
                                                <span class="text-gray-400">Sin cita</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <?php echo formatDate($lead['created_at']); ?>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <button onclick="openLeadModal(<?php echo $lead['id']; ?>)" class="text-kasaami-violet hover:text-kasaami-dark-violet mr-3">
                                                Ver
                                            </button>
                                            <button onclick="openStatusModal(<?php echo $lead['id']; ?>, '<?php echo $lead['status']; ?>')" class="text-blue-600 hover:text-blue-900">
                                                Editar
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Paginación -->
                <?php if ($total_pages > 1): ?>
                    <div class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6 mt-6">
                        <div class="flex-1 flex justify-between sm:hidden">
                            <?php if ($page > 1): ?>
                                <a href="?page=<?php echo $page - 1; ?>&status=<?php echo $status_filter; ?>&search=<?php echo urlencode($search); ?>" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                    Anterior
                                </a>
                            <?php endif; ?>
                            <?php if ($page < $total_pages): ?>
                                <a href="?page=<?php echo $page + 1; ?>&status=<?php echo $status_filter; ?>&search=<?php echo urlencode($search); ?>" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                    Siguiente
                                </a>
                            <?php endif; ?>
                        </div>
                        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                            <div>
                                <p class="text-sm text-gray-700">
                                    Mostrando 
                                    <span class="font-medium"><?php echo ($page - 1) * $per_page + 1; ?></span>
                                    a 
                                    <span class="font-medium"><?php echo min($page * $per_page, $total_leads); ?></span>
                                    de 
                                    <span class="font-medium"><?php echo $total_leads; ?></span>
                                    resultados
                                </p>
                            </div>
                            <div>
                                <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px">
                                    <?php for ($i = max(1, $page - 2); $i <= min($total_pages, $page + 2); $i++): ?>
                                        <a href="?page=<?php echo $i; ?>&status=<?php echo $status_filter; ?>&search=<?php echo urlencode($search); ?>" 
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

    <!-- Modal para cambiar estado -->
    <div id="statusModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden z-50">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="bg-white rounded-lg shadow-xl max-w-md w-full">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">Cambiar Estado del Lead</h3>
                </div>
                <form method="POST">
                    <div class="px-6 py-4">
                        <input type="hidden" name="action" value="update_status">
                        <input type="hidden" name="lead_id" id="statusLeadId">
                        
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nuevo Estado</label>
                        <select name="status" id="statusSelect" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-kasaami-violet focus:border-kasaami-violet">
                            <option value="nuevo">Nuevo</option>
                            <option value="contactado">Contactado</option>
                            <option value="interesado">Interesado</option>
                            <option value="propuesta_enviada">Propuesta Enviada</option>
                            <option value="negociando">Negociando</option>
                            <option value="convertido">Convertido</option>
                            <option value="perdido">Perdido</option>
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

    <script>
        function openStatusModal(leadId, currentStatus) {
            document.getElementById('statusLeadId').value = leadId;
            document.getElementById('statusSelect').value = currentStatus;
            document.getElementById('statusModal').classList.remove('hidden');
        }

        function closeStatusModal() {
            document.getElementById('statusModal').classList.add('hidden');
        }

        function openLeadModal(leadId) {
            // Por ahora, redirigir a una página de detalle
            window.location.href = `lead_detail.php?id=${leadId}`;
        }

        // Cerrar modal con Escape
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeStatusModal();
            }
        });
    </script>
</body>
</html>