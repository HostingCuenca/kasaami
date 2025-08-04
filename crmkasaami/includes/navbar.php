<?php
// crmkasaami/includes/navbar.php
// Navbar unificado para todo el CRM con fuentes Kasaami

$currentPage = $currentPage ?? '';
$user = getUserInfo();
?>

<!-- Fuentes Kasaami y estilos -->
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
    
    .font-filson { 
        font-family: 'Filson Pro', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif; 
    }
    
    .navbar-gradient {
        background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
        backdrop-filter: blur(10px);
    }
    
    .kasaami-violet { color: #8B5CF6; }
    .kasaami-violet-bg { background-color: #8B5CF6; }
    .kasaami-dark-violet { color: #7C3AED; }
    .kasaami-light-violet { color: #C4B5FD; }
    .kasaami-border { border-color: #8B5CF6; }
    
    .nav-link {
        position: relative;
        transition: all 0.3s ease;
        font-weight: 500;
    }
    
    .nav-link:hover {
        color: #8B5CF6;
        transform: translateY(-1px);
    }
    
    .nav-link.active {
        color: #8B5CF6;
        border-bottom: 2px solid #8B5CF6;
    }
    
    .nav-link.active::before {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 0;
        right: 0;
        height: 2px;
        background: linear-gradient(90deg, #8B5CF6, #C4B5FD);
        border-radius: 1px;
    }
    
    .avatar-gradient {
        background: linear-gradient(135deg, #8B5CF6 0%, #7C3AED 100%);
    }
    
    .notification-badge {
        position: absolute;
        top: -2px;
        right: -2px;
        width: 8px;
        height: 8px;
        background: #EF4444;
        border-radius: 50%;
        border: 2px solid white;
    }
</style>

<!-- Navigation -->
<nav class="navbar-gradient shadow-sm border-b border-gray-100 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Logo y navegación principal -->
            <div class="flex items-center">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="dashboard.php" class="flex items-center group">
                        <img src="../assets/logos-letranegra.png" alt="Kasaami" class="h-8 w-auto transition-transform duration-200 group-hover:scale-105">
                    </a>
                </div>
                
                <!-- Navegación principal -->
                <div class="hidden md:ml-8 md:flex md:space-x-1">
                    <a href="dashboard.php" 
                       class="nav-link <?php echo $currentPage === 'dashboard' ? 'active' : ''; ?> px-4 py-2 text-sm font-filson text-gray-700 hover:text-kasaami-violet transition-all duration-200 flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                        </svg>
                        Dashboard
                    </a>
                    
                    <a href="leads.php" 
                       class="nav-link <?php echo $currentPage === 'leads' ? 'active' : ''; ?> px-4 py-2 text-sm font-filson text-gray-700 hover:text-kasaami-violet transition-all duration-200 flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"></path>
                        </svg>
                        Leads
                    </a>
                    
                    <a href="appointments.php" 
                       class="nav-link <?php echo $currentPage === 'appointments' ? 'active' : ''; ?> px-4 py-2 text-sm font-filson text-gray-700 hover:text-kasaami-violet transition-all duration-200 flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        Citas
                    </a>
                    
                    <a href="reports.php" 
                       class="nav-link <?php echo $currentPage === 'reports' ? 'active' : ''; ?> px-4 py-2 text-sm font-filson text-gray-700 hover:text-kasaami-violet transition-all duration-200 flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                        Reportes
                    </a>
                    
                    <a href="settings.php" 
                       class="nav-link <?php echo $currentPage === 'settings' ? 'active' : ''; ?> px-4 py-2 text-sm font-filson text-gray-700 hover:text-kasaami-violet transition-all duration-200 flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        Configuración
                    </a>
                </div>
            </div>
            
            <!-- Sección derecha - Usuario y acciones -->
            <div class="flex items-center space-x-4">
                <!-- Quick Actions -->
                <a href="../" 
                   class="hidden md:flex items-center px-3 py-2 text-sm font-filson text-gray-600 hover:text-kasaami-violet transition-colors duration-200"
                   title="Ver sitio web">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                    </svg>
                    Web
                </a>
                
                <!-- Perfil de usuario -->
                <div class="flex items-center space-x-3">
                    <div class="hidden md:block text-right">
                        <div class="text-sm font-filson font-medium text-gray-900">
                            <?php echo $user ? htmlspecialchars($user['full_name']) : 'Usuario'; ?>
                        </div>
                        <div class="text-xs font-filson text-gray-500">
                            <?php echo $user ? ucfirst($user['role']) : 'Rol'; ?>
                        </div>
                    </div>
                    
                    <!-- Avatar -->
                    <div class="w-9 h-9 avatar-gradient rounded-full flex items-center justify-center shadow-sm">
                        <span class="text-white text-sm font-filson font-medium">
                            <?php echo $user ? strtoupper(substr($user['full_name'], 0, 1)) : 'U'; ?>
                        </span>
                    </div>
                    
                    <!-- Menú desplegable -->
                    <div class="relative">
                        <button type="button" class="text-gray-400 hover:text-gray-600 transition-colors duration-200" 
                                onclick="toggleUserMenu()">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        
                        <!-- Dropdown -->
                        <div id="user-menu" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-100 z-50">
                            <div class="py-1">
                                <a href="settings.php" class="block px-4 py-2 text-sm font-filson text-gray-700 hover:bg-gray-50 hover:text-kasaami-violet transition-colors duration-200">
                                    <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    Configuración
                                </a>
                                <hr class="my-1">
                                <a href="logout.php" class="block px-4 py-2 text-sm font-filson text-red-600 hover:bg-red-50 transition-colors duration-200">
                                    <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                    </svg>
                                    Cerrar Sesión
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Menú móvil -->
    <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-gray-100">
        <div class="px-4 py-3 space-y-1">
            <a href="dashboard.php" class="block px-3 py-2 text-sm font-filson text-gray-700 hover:text-kasaami-violet hover:bg-gray-50 rounded transition-colors duration-200">Dashboard</a>
            <a href="leads.php" class="block px-3 py-2 text-sm font-filson text-gray-700 hover:text-kasaami-violet hover:bg-gray-50 rounded transition-colors duration-200">Leads</a>
            <a href="appointments.php" class="block px-3 py-2 text-sm font-filson text-gray-700 hover:text-kasaami-violet hover:bg-gray-50 rounded transition-colors duration-200">Citas</a>
            <a href="reports.php" class="block px-3 py-2 text-sm font-filson text-gray-700 hover:text-kasaami-violet hover:bg-gray-50 rounded transition-colors duration-200">Reportes</a>
            <a href="settings.php" class="block px-3 py-2 text-sm font-filson text-gray-700 hover:text-kasaami-violet hover:bg-gray-50 rounded transition-colors duration-200">Configuración</a>
        </div>
    </div>
</nav>

<script>
function toggleUserMenu() {
    const menu = document.getElementById('user-menu');
    menu.classList.toggle('hidden');
}

// Cerrar menú al hacer clic fuera
document.addEventListener('click', function(event) {
    const menu = document.getElementById('user-menu');
    const button = event.target.closest('button');
    
    if (!menu.contains(event.target) && !button) {
        menu.classList.add('hidden');
    }
});

// Menú móvil toggle (si se implementa)
function toggleMobileMenu() {
    const menu = document.getElementById('mobile-menu');
    menu.classList.toggle('hidden');
}
</script>