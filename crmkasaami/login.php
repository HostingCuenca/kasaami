<?php
// crmkasaami/login.php
// Página de login SIMPLE para el CRM Kasaami

session_start();

// Si ya está logueado, redirigir al dashboard
if (isset($_SESSION['user_id'])) {
    header('Location: dashboard.php');
    exit;
}

$error_message = '';

// Procesar login SOLO cuando se envía el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    
    if (empty($username) || empty($password)) {
        $error_message = 'Usuario y contraseña son requeridos';
    } else {
        try {
            // Usar configuración del CRM
            require_once 'config.php';
            
            $db = Database::getInstance()->getConnection();
            $stmt = $db->prepare("SELECT id, username, password_hash, full_name, role, is_active FROM users WHERE (username = ? OR email = ?) AND is_active = 1");
            $stmt->execute([$username, $username]);
            $user = $stmt->fetch();
            
            if ($user && password_verify($password, $user['password_hash'])) {
                // Login exitoso
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['full_name'] = $user['full_name'];
                $_SESSION['role'] = $user['role'];
                $_SESSION['login_time'] = time();
                
                // Actualizar último login
                $updateStmt = $db->prepare("UPDATE users SET last_login_at = NOW() WHERE id = ?");
                $updateStmt->execute([$user['id']]);
                
                header('Location: dashboard.php');
                exit;
            } else {
                $error_message = 'Usuario o contraseña incorrectos';
            }
            
        } catch (Exception $e) {
            error_log("Login error: " . $e->getMessage());
            $error_message = 'Error de conexión. Verifica que el sistema esté configurado correctamente.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es" class="h-full bg-gray-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRM Kasaami - Login</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Rufina:wght@400;700&display=swap" rel="stylesheet">
    
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

<body class="h-full font-poppins">
    <div class="min-h-full flex flex-col justify-center py-12 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <!-- Logo -->
            <div class="text-center">
                <div class="w-20 h-20 bg-gradient-to-br from-kasaami-violet to-kasaami-dark-violet rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                    </svg>
                </div>
                <h2 class="text-3xl font-rufina font-bold text-gray-900">CRM Kasaami</h2>
                <p class="mt-2 text-sm text-gray-600">Care & Beauty Management System</p>
            </div>
        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white py-8 px-4 shadow-xl sm:rounded-2xl sm:px-10">
                
                <!-- Mensaje de bienvenida -->
                <div class="mb-6">
                    <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-blue-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-sm font-medium text-blue-800">Bienvenido</h3>
                                <div class="text-sm text-blue-700">
                                    Ingresa tus credenciales para acceder al sistema
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Mensaje de error -->
                <?php if (!empty($error_message)): ?>
                    <div class="mb-6 bg-red-50 border border-red-200 rounded-lg p-4">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 000 2v4a1 1 0 002 0V7a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-sm font-medium text-red-800">Error</h3>
                                <div class="mt-1 text-sm text-red-700"><?php echo htmlspecialchars($error_message); ?></div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Formulario de login -->
                <form class="space-y-6" method="POST">
                    <div>
                        <label for="username" class="block text-sm font-medium text-gray-700">
                            Usuario o Email
                        </label>
                        <div class="mt-1">
                            <input id="username" name="username" type="text" required 
                                   class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-lg placeholder-gray-400 focus:outline-none focus:ring-kasaami-violet focus:border-kasaami-violet sm:text-sm"
                                   placeholder="admin" value="<?php echo htmlspecialchars($_POST['username'] ?? ''); ?>">
                        </div>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">
                            Contraseña
                        </label>
                        <div class="mt-1">
                            <input id="password" name="password" type="password" required 
                                   class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-lg placeholder-gray-400 focus:outline-none focus:ring-kasaami-violet focus:border-kasaami-violet sm:text-sm"
                                   placeholder="••••••••">
                        </div>
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 text-kasaami-violet focus:ring-kasaami-violet border-gray-300 rounded">
                            <label for="remember-me" class="ml-2 block text-sm text-gray-900">
                                Recordarme
                            </label>
                        </div>

                        <div class="text-sm">
                            <a href="#" class="font-medium text-kasaami-violet hover:text-kasaami-dark-violet">
                                ¿Olvidaste tu contraseña?
                            </a>
                        </div>
                    </div>

                    <div>
                        <button type="submit" 
                                class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-lg text-white bg-kasaami-violet hover:bg-kasaami-dark-violet focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-kasaami-violet transition-colors duration-200">
                            <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                                <svg class="h-5 w-5 text-kasaami-light-violet group-hover:text-kasaami-pearl" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"/>
                                </svg>
                            </span>
                            Iniciar Sesión
                        </button>
                    </div>
                </form>

                <!-- Información de credenciales -->
                <div class="mt-6 bg-gray-50 border border-gray-200 rounded-lg p-4">
                    <h3 class="text-sm font-medium text-gray-800 mb-2">🔑 Credenciales por defecto:</h3>
                    <div class="text-sm text-gray-700">
                        <div><strong>Usuario:</strong> admin</div>
                        <div><strong>Contraseña:</strong> kasaami2025</div>
                    </div>
                    <div class="mt-2 text-xs text-gray-600">
                        Si no tienes acceso, ejecuta el setup inicial del sistema
                    </div>
                </div>

                <!-- Enlaces útiles -->
                <div class="mt-6 text-center">
                    <div class="flex justify-center space-x-4 text-sm">
                        <a href="setup_database.php" class="text-kasaami-violet hover:text-kasaami-dark-violet font-medium">
                            🛠️ Setup Sistema
                        </a>
                        <a href="test_connection.php" target="_blank" class="text-gray-500 hover:text-gray-700">
                            🔍 Test Conexión
                        </a>
                        <a href="../" class="text-gray-500 hover:text-gray-700">
                            🏠 Sitio Web
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="mt-8 text-center">
            <p class="text-sm text-gray-600">
                © 2025 Kasaami Care & Beauty. Todos los derechos reservados.
            </p>
            <p class="text-xs text-gray-500 mt-1">
                CRM Version 1.0 - Sistema de Gestión
            </p>
        </div>
    </div>

    <script>
        // Focus automático en el campo de usuario
        document.addEventListener('DOMContentLoaded', function() {
            const usernameField = document.getElementById('username');
            if (usernameField && !usernameField.value) {
                usernameField.focus();
            }
        });

        // Validación básica del formulario
        document.querySelector('form').addEventListener('submit', function(e) {
            const username = document.getElementById('username').value.trim();
            const password = document.getElementById('password').value;
            
            if (!username || !password) {
                e.preventDefault();
                alert('Por favor completa todos los campos');
                return;
            }
        });
    </script>
</body>
</html>