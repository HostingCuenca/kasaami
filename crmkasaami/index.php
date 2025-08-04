<?php
// crmkasaami/index.php
// Página de inicio del CRM Kasaami

require_once 'config.php';

// Si ya está logueado, redirigir al dashboard
if (isLoggedIn()) {
    header('Location: dashboard.php');
    exit;
}

// Si no está logueado, mostrar página de bienvenida con opción de login
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRM Kasaami - Sistema de Gestión</title>
    
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
        .hover\:bg-kasaami-dark-violet:hover { background-color: #7C3AED; }
        
        .gradient-bg {
            background: linear-gradient(135deg, #8B5CF6 0%, #7C3AED 50%, #6D28D9 100%);
        }
    </style>
    
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-filson">
    
    <div class="min-h-screen flex">
        <!-- Lado izquierdo - Información -->
        <div class="flex-1 gradient-bg flex items-center justify-center p-8">
            <div class="max-w-lg text-white text-center">
                <div class="mb-8">
                    <img src="../assets/logos-letrablanca.png" alt="Kasaami" class="h-16 mx-auto mb-4">
                    <h1 class="text-4xl font-bold mb-2">CRM Kasaami</h1>
                    <p class="text-xl opacity-90">Sistema de Gestión de Leads y Citas</p>
                </div>
                
                <div class="space-y-6">
                    <div class="flex items-center text-left">
                        <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center mr-4">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold">Gestión de Leads</h3>
                            <p class="text-sm opacity-75">Administra y da seguimiento a todos tus prospectos</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center text-left">
                        <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center mr-4">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold">Control de Citas</h3>
                            <p class="text-sm opacity-75">Programa y gestiona todas las consultas médicas</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center text-left">
                        <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center mr-4">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold">Configuración Avanzada</h3>
                            <p class="text-sm opacity-75">Personaliza videos y parámetros del sistema</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Lado derecho - Acceso -->
        <div class="flex-1 flex items-center justify-center p-8">
            <div class="max-w-md w-full space-y-8">
                <div class="text-center">
                    <h2 class="text-3xl font-bold text-gray-900">Acceso al CRM</h2>
                    <p class="mt-2 text-gray-600">Ingresa para gestionar leads y citas</p>
                </div>
                
                <div class="space-y-6">
                    <a href="login.php" 
                       class="w-full flex justify-center py-4 px-6 border border-transparent rounded-lg shadow-sm text-white bg-kasaami-violet hover:bg-kasaami-dark-violet focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-kasaami-violet transition-all duration-200 transform hover:scale-105">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                        </svg>
                        Iniciar Sesión
                    </a>
                    
                    <div class="text-center">
                        <p class="text-sm text-gray-500">
                            ¿Problemas para acceder? 
                            <a href="mailto:admin@kasaamigroup.com" class="text-kasaami-violet hover:underline">
                                Contacta al administrador
                            </a>
                        </p>
                    </div>
                </div>
                
                <!-- Información de credenciales para desarrollo -->
                <div class="mt-8 p-4 bg-blue-50 border border-blue-200 rounded-lg">
                    <h3 class="text-sm font-medium text-blue-900 mb-2">Acceso de Desarrollo:</h3>
                    <div class="text-sm text-blue-700 space-y-1">
                        <p><strong>Usuario:</strong> admin</p>
                        <p><strong>Contraseña:</strong> admin123</p>
                    </div>
                </div>
                
                <!-- Enlaces rápidos -->
                <div class="border-t pt-6">
                    <h3 class="text-sm font-medium text-gray-900 mb-3">Accesos Rápidos:</h3>
                    <div class="space-y-2">
                        <a href="../" class="block text-sm text-gray-600 hover:text-kasaami-violet transition-colors duration-200">
                            ← Volver al sitio web principal
                        </a>
                        <a href="settings.php" class="block text-sm text-gray-600 hover:text-kasaami-violet transition-colors duration-200">
                            ⚙️ Configuración de Videos (requiere login)
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        // Auto-focus en el botón de login
        document.addEventListener('DOMContentLoaded', function() {
            const loginButton = document.querySelector('a[href="login.php"]');
            if (loginButton) {
                loginButton.focus();
            }
        });
    </script>
</body>
</html>