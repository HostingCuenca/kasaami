<?php
// crmkasaami/lead_detail.php
// Vista detallada de un lead individual con notas y actividades

require_once 'config.php';
requireLogin();

$pageTitle = 'Detalle del Lead';
$currentPage = 'leads';

// Obtener datos del usuario
$user = getUserInfo();

// Obtener ID del lead
$lead_id = (int)($_GET['id'] ?? 0);

if (!$lead_id) {
    header('Location: leads.php');
    exit;
}

// Procesar acciones
$message = '';
$message_type = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $db = Database::getInstance()->getConnection();
        
        if (isset($_POST['action'])) {
            switch ($_POST['action']) {
                case 'add_note':
                    $note = trim($_POST['note']);
                    if (!empty($note)) {
                        $stmt = $db->prepare("INSERT INTO lead_activities (lead_id, activity_type, description, performed_by) VALUES (?, 'note', ?, ?)");
                        if ($stmt->execute([$lead_id, $note, $user['username']])) {
                            $message = "Nota agregada correctamente";
                            $message_type = "success";
                        }
                    }
                    break;
                    
                case 'update_status':
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
            }
        }
    } catch (Exception $e) {
        error_log("Lead detail error: " . $e->getMessage());
        $message = "Error al procesar la acción: " . $e->getMessage();
        $message_type = "error";
    }
}

try {
    $db = Database::getInstance()->getConnection();
    
    // Obtener información del lead
    $stmt = $db->prepare("
        SELECT l.*, a.appointment_date, a.appointment_time, a.status as appointment_status
        FROM leads l 
        LEFT JOIN appointments a ON l.id = a.lead_id 
        WHERE l.id = ?
    ");
    $stmt->execute([$lead_id]);
    $lead = $stmt->fetch();
    
    if (!$lead) {
        header('Location: leads.php');
        exit;
    }
    
    // Obtener actividades y notas del lead
    $stmt = $db->prepare("
        SELECT * FROM lead_activities 
        WHERE lead_id = ? 
        ORDER BY created_at DESC
    ");
    $stmt->execute([$lead_id]);
    $activities = $stmt->fetchAll();
    
} catch (Exception $e) {
    error_log("Lead detail error: " . $e->getMessage());
    $error = "Error al cargar el lead";
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
    ];
    
    return $colors[$status] ?? 'bg-gray-100 text-gray-800';
}

function formatDateTime($datetime) {
    return date('d/m/Y H:i', strtotime($datetime));
}

function getActivityIcon($activity_type) {
    $icons = [
        'form_submitted' => '<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>',
        'note' => '<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M4 4a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2H4z"/></svg>',
        'status_changed' => '<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z" clip-rule="evenodd"/></svg>',
        'email_sent' => '<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/></svg>',
        'phone_call' => '<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/></svg>',
        'appointment_scheduled' => '<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/></svg>'
    ];
    
    return $icons[$activity_type] ?? '<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/></svg>';
}
?>

<!DOCTYPE html>
<html lang="es" class="h-full bg-gray-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?> - CRM Kasaami</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="../public/favicon.png">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Custom Tailwind Config -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
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
                
                <!-- Header con navegación -->
                <div class="mb-6">
                    <nav class="flex" aria-label="Breadcrumb">
                        <ol class="flex items-center space-x-4">
                            <li>
                                <a href="leads.php" class="text-gray-500 hover:text-kasaami-violet font-filson">
                                    ← Volver a Leads
                                </a>
                            </li>
                            <li>
                                <span class="text-gray-500">/</span>
                            </li>
                            <li class="text-gray-900 font-filson font-medium">
                                <?php echo htmlspecialchars($lead['name'] . ' ' . $lead['lastname']); ?>
                            </li>
                        </ol>
                    </nav>
                </div>

                <!-- Mensajes -->
                <?php if (!empty($message)): ?>
                    <div class="mb-6 p-4 rounded-lg <?php echo $message_type === 'success' ? 'bg-green-50 border border-green-200' : 'bg-red-50 border border-red-200'; ?>">
                        <div class="flex">
                            <svg class="h-5 w-5 <?php echo $message_type === 'success' ? 'text-green-400' : 'text-red-400'; ?>" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="<?php echo $message_type === 'success' ? 'M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z' : 'M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 000 2v4a1 1 0 002 0V7a1 1 0 00-1-1z'; ?>" clip-rule="evenodd"/>
                            </svg>
                            <div class="ml-3">
                                <p class="text-sm font-medium <?php echo $message_type === 'success' ? 'text-green-800' : 'text-red-800'; ?>">
                                    <?php echo htmlspecialchars($message); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Grid principal -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    
                    <!-- Información del lead -->
                    <div class="lg:col-span-2 space-y-6">
                        
                        <!-- Datos personales -->
                        <div class="bg-white shadow rounded-lg">
                            <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                                <h3 class="text-lg font-medium text-gray-900 font-filson">Información Personal</h3>
                                <span class="inline-flex px-3 py-1 text-sm font-semibold rounded-full <?php echo getStatusColor($lead['status']); ?>">
                                    <?php echo ucfirst(str_replace('_', ' ', $lead['status'])); ?>
                                </span>
                            </div>
                            <div class="px-6 py-4">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label class="text-sm font-medium text-gray-500 font-filson">Nombre Completo</label>
                                        <p class="mt-1 text-sm text-gray-900 font-filson">
                                            <?php echo htmlspecialchars($lead['name'] . ' ' . $lead['lastname']); ?>
                                        </p>
                                    </div>
                                    <div>
                                        <label class="text-sm font-medium text-gray-500 font-filson">Email</label>
                                        <p class="mt-1 text-sm text-gray-900 font-filson">
                                            <a href="mailto:<?php echo htmlspecialchars($lead['email']); ?>" class="text-kasaami-violet hover:text-kasaami-dark-violet">
                                                <?php echo htmlspecialchars($lead['email']); ?>
                                            </a>
                                        </p>
                                    </div>
                                    <div>
                                        <label class="text-sm font-medium text-gray-500 font-filson">Teléfono</label>
                                        <p class="mt-1 text-sm text-gray-900 font-filson">
                                            <a href="tel:<?php echo htmlspecialchars($lead['phone']); ?>" class="text-kasaami-violet hover:text-kasaami-dark-violet">
                                                <?php echo htmlspecialchars($lead['phone']); ?>
                                            </a>
                                        </p>
                                    </div>
                                    <div>
                                        <label class="text-sm font-medium text-gray-500 font-filson">País</label>
                                        <p class="mt-1 text-sm text-gray-900 font-filson"><?php echo htmlspecialchars($lead['country']); ?></p>
                                    </div>
                                    <div>
                                        <label class="text-sm font-medium text-gray-500 font-filson">Presupuesto</label>
                                        <p class="mt-1 text-sm text-gray-900 font-filson">$<?php echo htmlspecialchars($lead['budget_range']); ?></p>
                                    </div>
                                    <div>
                                        <label class="text-sm font-medium text-gray-500 font-filson">Lead Score</label>
                                        <div class="mt-1 flex items-center">
                                            <span class="text-sm font-medium text-gray-900 font-filson mr-2"><?php echo $lead['lead_score']; ?>/100</span>
                                            <div class="w-24 bg-gray-200 rounded-full h-2">
                                                <div class="bg-kasaami-violet h-2 rounded-full" style="width: <?php echo $lead['lead_score']; ?>%"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Información del tratamiento -->
                        <?php if (!empty($lead['appointment_type']) || !empty($lead['modality'])): ?>
                        <div class="bg-white shadow rounded-lg">
                            <div class="px-6 py-4 border-b border-gray-200">
                                <h3 class="text-lg font-medium text-gray-900 font-filson">Información del Tratamiento</h3>
                            </div>
                            <div class="px-6 py-4">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <?php if (!empty($lead['appointment_type'])): ?>
                                    <div>
                                        <label class="text-sm font-medium text-gray-500 font-filson">Tipo de Cita</label>
                                        <p class="mt-1 text-sm text-gray-900 font-filson"><?php echo htmlspecialchars($lead['appointment_type']); ?></p>
                                    </div>
                                    <?php endif; ?>
                                    <?php if (!empty($lead['modality'])): ?>
                                    <div>
                                        <label class="text-sm font-medium text-gray-500 font-filson">Modalidad</label>
                                        <p class="mt-1 text-sm text-gray-900 font-filson"><?php echo htmlspecialchars($lead['modality']); ?></p>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>

                        <!-- Timeline de actividades y notas -->
                        <div class="bg-white shadow rounded-lg">
                            <div class="px-6 py-4 border-b border-gray-200">
                                <h3 class="text-lg font-medium text-gray-900 font-filson">Actividades y Notas</h3>
                            </div>
                            <div class="px-6 py-4">
                                <div class="flow-root">
                                    <ul class="-mb-8">
                                        <?php foreach ($activities as $index => $activity): ?>
                                            <li>
                                                <div class="relative pb-8">
                                                    <?php if ($index < count($activities) - 1): ?>
                                                        <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200"></span>
                                                    <?php endif; ?>
                                                    <div class="relative flex space-x-3">
                                                        <div>
                                                            <span class="h-8 w-8 rounded-full <?php echo $activity['activity_type'] === 'note' ? 'bg-yellow-500' : 'bg-kasaami-violet'; ?> flex items-center justify-center ring-8 ring-white">
                                                                <div class="text-white">
                                                                    <?php echo getActivityIcon($activity['activity_type']); ?>
                                                                </div>
                                                            </span>
                                                        </div>
                                                        <div class="min-w-0 flex-1 pt-1.5">
                                                            <div>
                                                                <?php if ($activity['activity_type'] === 'note'): ?>
                                                                    <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-3 mb-2">
                                                                        <p class="text-sm text-gray-900 font-filson"><?php echo nl2br(htmlspecialchars($activity['description'])); ?></p>
                                                                    </div>
                                                                <?php else: ?>
                                                                    <p class="text-sm text-gray-900 font-filson"><?php echo htmlspecialchars($activity['description']); ?></p>
                                                                <?php endif; ?>
                                                                <div class="mt-1 flex items-center space-x-2">
                                                                    <span class="text-xs text-gray-500 font-filson">
                                                                        <?php echo formatDateTime($activity['created_at']); ?>
                                                                    </span>
                                                                    <?php if (!empty($activity['performed_by'])): ?>
                                                                        <span class="text-xs text-gray-500 font-filson">
                                                                            por <?php echo htmlspecialchars($activity['performed_by']); ?>
                                                                        </span>
                                                                    <?php endif; ?>
                                                                </div>
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
                    </div>

                    <!-- Panel lateral -->
                    <div class="space-y-6">
                        
                        <!-- Cambiar estado -->
                        <div class="bg-white shadow rounded-lg">
                            <div class="px-6 py-4 border-b border-gray-200">
                                <h3 class="text-lg font-medium text-gray-900 font-filson">Cambiar Estado</h3>
                            </div>
                            <form method="POST" class="px-6 py-4">
                                <input type="hidden" name="action" value="update_status">
                                <div class="space-y-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 font-filson mb-2">Nuevo Estado</label>
                                        <select name="status" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-kasaami-violet focus:border-kasaami-violet font-filson">
                                            <option value="nuevo" <?php echo $lead['status'] === 'nuevo' ? 'selected' : ''; ?>>Nuevo</option>
                                            <option value="contactado" <?php echo $lead['status'] === 'contactado' ? 'selected' : ''; ?>>Contactado</option>
                                            <option value="interesado" <?php echo $lead['status'] === 'interesado' ? 'selected' : ''; ?>>Interesado</option>
                                            <option value="propuesta_enviada" <?php echo $lead['status'] === 'propuesta_enviada' ? 'selected' : ''; ?>>Propuesta Enviada</option>
                                            <option value="negociando" <?php echo $lead['status'] === 'negociando' ? 'selected' : ''; ?>>Negociando</option>
                                            <option value="convertido" <?php echo $lead['status'] === 'convertido' ? 'selected' : ''; ?>>Convertido</option>
                                            <option value="perdido" <?php echo $lead['status'] === 'perdido' ? 'selected' : ''; ?>>Perdido</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="w-full bg-kasaami-violet text-white px-4 py-2 rounded-md hover:bg-kasaami-dark-violet focus:outline-none focus:ring-2 focus:ring-kasaami-violet font-filson transition-colors duration-200">
                                        Actualizar Estado
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!-- Agregar nota -->
                        <div class="bg-white shadow rounded-lg">
                            <div class="px-6 py-4 border-b border-gray-200">
                                <h3 class="text-lg font-medium text-gray-900 font-filson">Agregar Nota</h3>
                            </div>
                            <form method="POST" class="px-6 py-4">
                                <input type="hidden" name="action" value="add_note">
                                <div class="space-y-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 font-filson mb-2">Nueva Nota</label>
                                        <textarea name="note" rows="4" required
                                                  class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-kasaami-violet focus:border-kasaami-violet font-filson"
                                                  placeholder="Escribe una nota sobre este lead..."></textarea>
                                    </div>
                                    <button type="submit" class="w-full bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-600 font-filson transition-colors duration-200">
                                        Agregar Nota
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!-- Información de la cita (si existe) -->
                        <?php if (!empty($lead['appointment_date'])): ?>
                        <div class="bg-white shadow rounded-lg">
                            <div class="px-6 py-4 border-b border-gray-200">
                                <h3 class="text-lg font-medium text-gray-900 font-filson">Cita Programada</h3>
                            </div>
                            <div class="px-6 py-4">
                                <div class="space-y-3">
                                    <div>
                                        <label class="text-sm font-medium text-gray-500 font-filson">Fecha</label>
                                        <p class="mt-1 text-sm text-gray-900 font-filson"><?php echo date('d/m/Y', strtotime($lead['appointment_date'])); ?></p>
                                    </div>
                                    <div>
                                        <label class="text-sm font-medium text-gray-500 font-filson">Hora</label>
                                        <p class="mt-1 text-sm text-gray-900 font-filson"><?php echo date('H:i', strtotime($lead['appointment_time'])); ?></p>
                                    </div>
                                    <div>
                                        <label class="text-sm font-medium text-gray-500 font-filson">Estado</label>
                                        <p class="mt-1">
                                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full <?php echo getStatusColor($lead['appointment_status']); ?>">
                                                <?php echo ucfirst(str_replace('_', ' ', $lead['appointment_status'])); ?>
                                            </span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>

                        <!-- Acciones rápidas -->
                        <div class="bg-white shadow rounded-lg">
                            <div class="px-6 py-4 border-b border-gray-200">
                                <h3 class="text-lg font-medium text-gray-900 font-filson">Acciones Rápidas</h3>
                            </div>
                            <div class="px-6 py-4 space-y-3">
                                <a href="mailto:<?php echo htmlspecialchars($lead['email']); ?>" 
                                   class="w-full flex items-center justify-center px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 font-filson transition-colors duration-200">
                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                                    </svg>
                                    Enviar Email
                                </a>
                                <a href="tel:<?php echo htmlspecialchars($lead['phone']); ?>" 
                                   class="w-full flex items-center justify-center px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 font-filson transition-colors duration-200">
                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                                    </svg>
                                    Llamar
                                </a>
                                <a href="https://wa.me/<?php echo htmlspecialchars(str_replace(['+', ' ', '-'], '', $lead['phone'])); ?>" 
                                   target="_blank"
                                   class="w-full flex items-center justify-center px-4 py-2 border border-green-300 rounded-md text-sm font-medium text-green-700 bg-green-50 hover:bg-green-100 font-filson transition-colors duration-200">
                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                    </svg>
                                    WhatsApp
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Auto-refresh de actividades cada 30 segundos (para notas en tiempo real)
        function refreshActivities() {
            // Podrías implementar un endpoint AJAX para refrescar solo las actividades
            console.log('Checking for new activities...');
        }
        
        setInterval(refreshActivities, 30000);
        
        console.log('Lead detail page loaded successfully');
    </script>
</body>
</html>