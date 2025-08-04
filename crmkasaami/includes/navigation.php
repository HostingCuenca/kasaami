<?php
// crmkasaami/includes/navigation.php
// Componente de navegación reutilizable para el CRM

$currentPage = $currentPage ?? '';
$user = getUserInfo();
?>

<nav class="bg-white shadow-sm border-b">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Logo y navegación principal -->
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <a href="dashboard.php" class="flex items-center">
                        <img src="../assets/logos-letranegra.png" alt="Kasaami" class="h-8 w-auto">
                        <span class="ml-2 text-xl font-bold text-gray-900"><?php echo APP_NAME; ?></span>
                    </a>
                </div>
                
                <!-- Menú de navegación -->
                <div class="hidden md:ml-8 md:flex md:space-x-8">
                    <a href="dashboard.php" 
                       class="<?php echo $currentPage === 'dashboard' ? 'text-kasaami-violet border-b-2 border-kasaami-violet' : 'text-gray-500 hover:text-gray-700'; ?> px-3 py-2 text-sm font-medium transition-colors duration-200">
                        <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                        </svg>
                        Dashboard
                    </a>
                    
                    <a href="leads.php" 
                       class="<?php echo $currentPage === 'leads' ? 'text-kasaami-violet border-b-2 border-kasaami-violet' : 'text-gray-500 hover:text-gray-700'; ?> px-3 py-2 text-sm font-medium transition-colors duration-200">
                        <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"></path>
                        </svg>
                        Leads
                    </a>
                    
                    <a href="appointments.php" 
                       class="<?php echo $currentPage === 'appointments' ? 'text-kasaami-violet border-b-2 border-kasaami-violet' : 'text-gray-500 hover:text-gray-700'; ?> px-3 py-2 text-sm font-medium transition-colors duration-200">
                        <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        Citas
                    </a>
                    
                    <a href="reports.php" 
                       class="<?php echo $currentPage === 'reports' ? 'text-kasaami-violet border-b-2 border-kasaami-violet' : 'text-gray-500 hover:text-gray-700'; ?> px-3 py-2 text-sm font-medium transition-colors duration-200">
                        <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                        Reportes
                    </a>
                    
                    <a href="settings.php" 
                       class="<?php echo $currentPage === 'settings' ? 'text-kasaami-violet border-b-2 border-kasaami-violet' : 'text-gray-500 hover:text-gray-700'; ?> px-3 py-2 text-sm font-medium transition-colors duration-200">
                        <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        Configuración
                    </a>
                </div>
            </div>
            
            <!-- Menú de usuario -->
            <div class="flex items-center space-x-4">
                <div class="hidden md:flex md:items-center md:space-x-6">
                    <!-- Notificaciones -->
                    <button class="text-gray-400 hover:text-gray-500 transition-colors duration-200">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-3.403-3.403A1 1 0 0116 13V8a6 6 0 10-12 0v5a1 1 0 01-.597.806L0 17h5m10 0a3 3 0 01-6 0m6 0H9"></path>
                        </svg>
                    </button>
                    
                    <!-- Info de usuario -->
                    <div class="flex items-center space-x-3">
                        <div class="text-right">
                            <div class="text-sm font-medium text-gray-900">
                                <?php echo $user ? htmlspecialchars($user['full_name']) : 'Usuario'; ?>
                            </div>
                            <div class="text-xs text-gray-500">
                                <?php echo $user ? ucfirst($user['role']) : 'Rol'; ?>
                            </div>
                        </div>
                        
                        <!-- Avatar -->
                        <div class="w-8 h-8 bg-kasaami-violet rounded-full flex items-center justify-center">
                            <span class="text-white text-sm font-medium">
                                <?php echo $user ? strtoupper(substr($user['full_name'], 0, 1)) : 'U'; ?>
                            </span>
                        </div>
                    </div>
                </div>
                
                <!-- Cerrar sesión -->
                <a href="logout.php" 
                   class="text-gray-500 hover:text-gray-700 text-sm font-medium transition-colors duration-200 flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                    </svg>
                    Salir
                </a>
            </div>
        </div>
    </div>
    
    <!-- Menú móvil (opcional) -->
    <div class="md:hidden hidden" id="mobile-menu">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 bg-white border-t">
            <a href="dashboard.php" class="block px-3 py-2 text-sm font-medium text-gray-500 hover:text-gray-700">Dashboard</a>
            <a href="leads.php" class="block px-3 py-2 text-sm font-medium text-gray-500 hover:text-gray-700">Leads</a>
            <a href="appointments.php" class="block px-3 py-2 text-sm font-medium text-gray-500 hover:text-gray-700">Citas</a>
            <a href="reports.php" class="block px-3 py-2 text-sm font-medium text-gray-500 hover:text-gray-700">Reportes</a>
            <a href="settings.php" class="block px-3 py-2 text-sm font-medium text-gray-500 hover:text-gray-700">Configuración</a>
        </div>
    </div>
</nav>

<style>
.text-kasaami-violet { color: #8B5CF6; }
.border-kasaami-violet { border-color: #8B5CF6; }
.bg-kasaami-violet { background-color: #8B5CF6; }
</style>