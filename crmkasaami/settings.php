<?php
// crmkasaami/settings.php
// Página de configuración del sistema

require_once 'config.php';
requireLogin();

$pageTitle = 'Configuración del Sistema';
$currentPage = 'settings';

// Procesar actualizaciones
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $db = Database::getInstance()->getConnection();
    
    if ($_POST['action'] === 'update_videos') {
        try {
            $stmt = $db->prepare("UPDATE system_settings SET setting_value = ? WHERE setting_key = ?");
            
            $videoKeys = [
                'video_home_desktop_es',
                'video_home_desktop_en', 
                'video_home_mobile_es',
                'video_home_mobile_en',
                'video_autoplay',
                'video_muted',
                'video_loop'
            ];
            
            foreach ($videoKeys as $key) {
                if (isset($_POST[$key])) {
                    $value = $_POST[$key];
                    // Para checkboxes boolean
                    if (in_array($key, ['video_autoplay', 'video_muted', 'video_loop'])) {
                        $value = isset($_POST[$key]) ? 'true' : 'false';
                    }
                    $stmt->execute([$value, $key]);
                }
            }
            
            $successMessage = "Configuración de videos actualizada correctamente";
            
        } catch (Exception $e) {
            $errorMessage = "Error al actualizar configuración: " . $e->getMessage();
        }
    }
}

// Obtener configuración actual
$db = Database::getInstance()->getConnection();
$stmt = $db->query("SELECT setting_key, setting_value, description FROM system_settings WHERE category = 'videos' ORDER BY setting_key");
$videoSettings = [];
while ($row = $stmt->fetch()) {
    $videoSettings[$row['setting_key']] = $row;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?> - <?php echo APP_NAME; ?></title>
    
    <!-- Fuentes personalizadas Kasaami -->
    <style>
        @font-face {
            font-family: 'Filson Pro';
            src: url('../assets/fuentes/FilsonProRegular.woff2') format('woff2'),
                 url('../assets/fuentes/FilsonProRegular.woff') format('woff');
            font-weight: 400;
            font-style: normal;
        }
        
        @font-face {
            font-family: 'Filson Pro';
            src: url('../assets/fuentes/FilsonProMedium.woff2') format('woff2'),
                 url('../assets/fuentes/FilsonProMedium.woff') format('woff');
            font-weight: 500;
            font-style: normal;
        }
        
        @font-face {
            font-family: 'Filson Pro';
            src: url('../assets/fuentes/FilsonProBold.woff2') format('woff2'),
                 url('../assets/fuentes/FilsonProBold.woff') format('woff');
            font-weight: 700;
            font-style: normal;
        }
        
        .font-filson { font-family: 'Filson Pro', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif; }
        .text-kasaami-violet { color: #8B5CF6; }
        .bg-kasaami-violet { background-color: #8B5CF6; }
        .border-kasaami-violet { border-color: #8B5CF6; }
        .hover\:bg-kasaami-dark-violet:hover { background-color: #7C3AED; }
    </style>
    
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-filson">
    
    <!-- Navigation -->
    <?php include 'includes/navbar.php'; ?>

    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900"><?php echo $pageTitle; ?></h1>
            <p class="mt-2 text-gray-600">Gestiona la configuración de videos y parámetros del sistema</p>
        </div>

        <!-- Messages -->
        <?php if (isset($successMessage)): ?>
        <div class="mb-6 bg-green-50 border border-green-200 rounded-md p-4">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-green-800"><?php echo $successMessage; ?></p>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <?php if (isset($errorMessage)): ?>
        <div class="mb-6 bg-red-50 border border-red-200 rounded-md p-4">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-red-800"><?php echo $errorMessage; ?></p>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <!-- Video Configuration Section -->
        <div class="bg-white shadow rounded-lg">
            <div class="px-6 py-4 border-b border-gray-200">
                <h2 class="text-lg font-medium text-gray-900 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-kasaami-violet" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2 6a2 2 0 012-2h6l2 2h6a2 2 0 012 2v6a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM5 8a1 1 0 000 2h8a1 1 0 100-2H5z"/>
                    </svg>
                    Configuración de Videos
                </h2>
                <p class="mt-1 text-sm text-gray-600">
                    Configura los videos que se muestran en la página principal del sitio web
                </p>
            </div>
            
            <form method="POST" class="p-6 space-y-6">
                <input type="hidden" name="action" value="update_videos">
                
                <!-- Videos de Escritorio -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Video Principal - Escritorio - Español
                        </label>
                        <input type="url" 
                               name="video_home_desktop_es" 
                               value="<?php echo htmlspecialchars($videoSettings['video_home_desktop_es']['setting_value'] ?? ''); ?>"
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-kasaami-violet focus:border-kasaami-violet"
                               placeholder="https://ejemplo.com/video-es.mp4">
                        <p class="mt-1 text-xs text-gray-500">URL del video en español para dispositivos de escritorio</p>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Video Principal - Escritorio - Inglés
                        </label>
                        <input type="url" 
                               name="video_home_desktop_en" 
                               value="<?php echo htmlspecialchars($videoSettings['video_home_desktop_en']['setting_value'] ?? ''); ?>"
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-kasaami-violet focus:border-kasaami-violet"
                               placeholder="https://ejemplo.com/video-en.mp4">
                        <p class="mt-1 text-xs text-gray-500">URL del video en inglés para dispositivos de escritorio</p>
                    </div>
                </div>
                
                <!-- Videos de Móvil -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Video Principal - Móvil - Español
                        </label>
                        <input type="url" 
                               name="video_home_mobile_es" 
                               value="<?php echo htmlspecialchars($videoSettings['video_home_mobile_es']['setting_value'] ?? ''); ?>"
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-kasaami-violet focus:border-kasaami-violet"
                               placeholder="https://ejemplo.com/video-mobile-es.mp4">
                        <p class="mt-1 text-xs text-gray-500">URL del video en español para móviles (opcional - usa escritorio si está vacío)</p>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Video Principal - Móvil - Inglés
                        </label>
                        <input type="url" 
                               name="video_home_mobile_en" 
                               value="<?php echo htmlspecialchars($videoSettings['video_home_mobile_en']['setting_value'] ?? ''); ?>"
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-kasaami-violet focus:border-kasaami-violet"
                               placeholder="https://ejemplo.com/video-mobile-en.mp4">
                        <p class="mt-1 text-xs text-gray-500">URL del video en inglés para móviles (opcional - usa escritorio si está vacío)</p>
                    </div>
                </div>
                
                <!-- Opciones de Reproducción -->
                <div class="border-t border-gray-200 pt-6">
                    <h3 class="text-base font-medium text-gray-900 mb-4">Opciones de Reproducción</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <label class="flex items-center">
                            <input type="checkbox" 
                                   name="video_autoplay" 
                                   <?php echo ($videoSettings['video_autoplay']['setting_value'] ?? 'true') === 'true' ? 'checked' : ''; ?>
                                   class="h-4 w-4 text-kasaami-violet focus:ring-kasaami-violet border-gray-300 rounded">
                            <span class="ml-2 text-sm text-gray-700">Reproducción automática</span>
                        </label>
                        
                        <label class="flex items-center">
                            <input type="checkbox" 
                                   name="video_muted" 
                                   <?php echo ($videoSettings['video_muted']['setting_value'] ?? 'true') === 'true' ? 'checked' : ''; ?>
                                   class="h-4 w-4 text-kasaami-violet focus:ring-kasaami-violet border-gray-300 rounded">
                            <span class="ml-2 text-sm text-gray-700">Iniciar silenciado</span>
                        </label>
                        
                        <label class="flex items-center">
                            <input type="checkbox" 
                                   name="video_loop" 
                                   <?php echo ($videoSettings['video_loop']['setting_value'] ?? 'true') === 'true' ? 'checked' : ''; ?>
                                   class="h-4 w-4 text-kasaami-violet focus:ring-kasaami-violet border-gray-300 rounded">
                            <span class="ml-2 text-sm text-gray-700">Reproducir en bucle</span>
                        </label>
                    </div>
                </div>
                
                <!-- Vista Previa de Videos -->
                <div class="border-t border-gray-200 pt-6">
                    <h3 class="text-base font-medium text-gray-900 mb-4">Vista Previa Actual</h3>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                        <?php if (!empty($videoSettings['video_home_desktop_es']['setting_value'])): ?>
                        <div class="border border-gray-200 rounded-lg p-4">
                            <h4 class="text-sm font-medium text-gray-700 mb-2">Video Español (Escritorio)</h4>
                            <video class="w-full h-32 object-cover rounded" controls>
                                <source src="<?php echo htmlspecialchars($videoSettings['video_home_desktop_es']['setting_value']); ?>" type="video/mp4">
                                Tu navegador no soporta videos.
                            </video>
                        </div>
                        <?php endif; ?>
                        
                        <?php if (!empty($videoSettings['video_home_desktop_en']['setting_value'])): ?>
                        <div class="border border-gray-200 rounded-lg p-4">
                            <h4 class="text-sm font-medium text-gray-700 mb-2">Video Inglés (Escritorio)</h4>
                            <video class="w-full h-32 object-cover rounded" controls>
                                <source src="<?php echo htmlspecialchars($videoSettings['video_home_desktop_en']['setting_value']); ?>" type="video/mp4">
                                Tu navegador no soporta videos.
                            </video>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                
                <!-- Botones de Acción -->
                <div class="border-t border-gray-200 pt-6 flex justify-end space-x-4">
                    <button type="button" onclick="window.location.reload()" 
                            class="px-4 py-2 border border-gray-300 text-gray-700 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-kasaami-violet">
                        Cancelar
                    </button>
                    <button type="submit" 
                            class="px-6 py-2 bg-kasaami-violet text-white rounded-md hover:bg-kasaami-dark-violet focus:outline-none focus:ring-2 focus:ring-kasaami-violet">
                        Guardar Configuración
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Validación de URLs
        document.querySelectorAll('input[type="url"]').forEach(input => {
            input.addEventListener('blur', function() {
                if (this.value && !this.checkValidity()) {
                    this.classList.add('border-red-500');
                } else {
                    this.classList.remove('border-red-500');
                }
            });
        });
    </script>
</body>
</html>