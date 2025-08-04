

<?php
// includes/Navbar.php - Universal para root y páginas internas
$isRoot = (basename($_SERVER['SCRIPT_NAME']) === 'index.php' && dirname($_SERVER['SCRIPT_NAME']) === '/');
$basePath = $isRoot ? '' : '../';
$homeUrl = $isRoot ? './' : '../';

// Detectar página actual para destacar navegación activa
$currentPage = basename($_SERVER['SCRIPT_NAME']);
$isContactPage = ($currentPage === 'contactanos.php');
$isAboutPage = ($currentPage === 'sobre-nosotros.php');
$isServicesPage = ($currentPage === 'servicios.php');
$isProceduresPage = ($currentPage === 'procedimientos.php');
$isDoctorsPage = ($currentPage === 'medicos-aliados.php');

// Función para determinar si un enlace está activo
function isActivePage($pageName, $currentPage) {
    return ($currentPage === $pageName) ? 'active-page' : '';
}
?>

<!-- Navigation -->
<nav class="fixed top-0 w-full z-40 transition-all duration-500" id="navbar">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Top Bar Simple -->
        <div class="hidden md:flex justify-end items-center py-2 text-xs font-light border-b border-white/20 topbar">
            <a href="<?php echo $basePath; ?>contactanos.php" class="topbar-link hover:opacity-80 transition-opacity duration-200">
                <?php echo isset($currentLang) && $currentLang === 'en' ? 'CONTACT US' : 'CONTÁCTANOS'; ?>
            </a>
            <span class="mx-3 topbar-separator">|</span>
            <a href="?lang=es" class="topbar-link <?php echo (!isset($currentLang) || $currentLang === 'es') ? 'active' : ''; ?> hover:opacity-80 transition-opacity duration-200">ES</a>
            <span class="mx-2 topbar-separator">•</span>
            <a href="?lang=en" class="topbar-link <?php echo (isset($currentLang) && $currentLang === 'en') ? 'active' : ''; ?> hover:opacity-80 transition-opacity duration-200">EN</a>
        </div>
        
        <!-- Main Navigation -->
        <div class="flex justify-between items-center h-16">
            
            <!-- Logo -->
            <div class="flex-shrink-0 animate-fade-in">
                <a href="<?php echo $homeUrl; ?>" class="flex items-center space-x-3 transition-transform duration-200 hover:scale-105">
                    <img id="logo-image" 
                         src="<?php echo $basePath; ?>assets/logos-letrablanca.png" 
                         alt="Kasaami Logo" 
                         class="h-12 w-auto transition-all duration-300">
                </a>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden md:block">
                <div class="ml-10 flex items-baseline space-x-8">
                    <a href="<?php echo $basePath; ?>sobre-nosotros.php" 
                       class="nav-link px-3 py-2 text-sm font-medium transition-all duration-200 relative <?php echo isActivePage('sobre-nosotros.php', $currentPage); ?>">
                        <?php echo isset($t['nav']['about']) ? $t['nav']['about'] : 'Esencia Kas'; ?>
                    </a>
                    <a href="<?php echo $basePath; ?>servicios.php" 
                       class="nav-link px-3 py-2 text-sm font-medium transition-all duration-200 relative <?php echo isActivePage('servicios.php', $currentPage); ?>">
                        <?php echo isset($t['nav']['services']) ? $t['nav']['services'] : 'Servicios'; ?>
                    </a>
                    <a href="<?php echo $basePath; ?>procedimientos.php" 
                       class="nav-link px-3 py-2 text-sm font-medium transition-all duration-200 relative <?php echo isActivePage('procedimientos.php', $currentPage); ?>">
                        <?php echo isset($t['nav']['procedures']) ? $t['nav']['procedures'] : 'Procedimientos'; ?>
                    </a>
                    <a href="<?php echo $basePath; ?>medicos-aliados.php" 
                       class="nav-link px-3 py-2 text-sm font-medium transition-all duration-200 relative <?php echo isActivePage('medicos-aliados.php', $currentPage); ?>">
                       Aliados
                    </a>
                </div>
            </div>

            <!-- CTA Button AGENDA -->
            <div class="flex items-center">
                <a href="<?php echo $basePath; ?>contactanos.php" 
                   class="cta-button bg-gradient-to-r from-kasaami-violet to-kasaami-dark-violet text-white px-8 py-2 rounded-full text-sm font-bold tracking-wide hover:shadow-lg hover:shadow-kasaami-violet/25 transition-all duration-300 transform hover:scale-105 inline-block text-center no-underline <?php echo $isContactPage ? 'active-cta' : ''; ?>"
                   <?php if ($isContactPage): ?>aria-current="page"<?php endif; ?>>
                    <span class="flex items-center space-x-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <span>AGENDA</span>
                    </span>
                </a>
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden">
                <button class="nav-link p-2 rounded-md transition-colors duration-200" id="mobile-menu-btn" aria-label="Abrir menú móvil">
                    <svg class="h-6 w-6 transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" id="menu-icon">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                    <svg class="h-6 w-6 transition-transform duration-200 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" id="close-icon">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>
        
        <!-- Mobile Navigation -->
        <div class="md:hidden hidden transition-all duration-300 ease-in-out" id="mobile-menu">
            <div class="px-2 pt-4 pb-3 space-y-1 bg-white/95 backdrop-blur-md rounded-lg mt-2 shadow-lg">
                <a href="<?php echo $basePath; ?>sobre-nosotros.php" 
                   class="block text-gray-700 hover:text-kasaami-violet hover:bg-gray-50 px-3 py-3 text-sm font-medium rounded-md transition-all duration-200 <?php echo $isAboutPage ? 'text-kasaami-violet bg-gray-50' : ''; ?>">
                    <?php echo isset($t['nav']['about']) ? $t['nav']['about'] : 'Sobre Nosotros'; ?>
                </a>
                <a href="<?php echo $basePath; ?>servicios.php" 
                   class="block text-gray-700 hover:text-kasaami-violet hover:bg-gray-50 px-3 py-3 text-sm font-medium rounded-md transition-all duration-200 <?php echo $isServicesPage ? 'text-kasaami-violet bg-gray-50' : ''; ?>">
                    <?php echo isset($t['nav']['services']) ? $t['nav']['services'] : 'Servicios'; ?>
                </a>
                <a href="<?php echo $basePath; ?>procedimientos.php" 
                   class="block text-gray-700 hover:text-kasaami-violet hover:bg-gray-50 px-3 py-3 text-sm font-medium rounded-md transition-all duration-200 <?php echo $isProceduresPage ? 'text-kasaami-violet bg-gray-50' : ''; ?>">
                    <?php echo isset($t['nav']['procedures']) ? $t['nav']['procedures'] : 'Procedimientos'; ?>
                </a>
                <a href="<?php echo $basePath; ?>medicos-aliados.php" 
                   class="block text-gray-700 hover:text-kasaami-violet hover:bg-gray-50 px-3 py-3 text-sm font-medium rounded-md transition-all duration-200 <?php echo $isDoctorsPage ? 'text-kasaami-violet bg-gray-50' : ''; ?>">
                    Aliados
                </a>
                <a href="<?php echo $basePath; ?>contactanos.php" 
                   class="block text-gray-700 hover:text-kasaami-violet hover:bg-gray-50 px-3 py-3 text-sm font-medium rounded-md transition-all duration-200 <?php echo $isContactPage ? 'text-kasaami-violet bg-gray-50' : ''; ?>">
                    Contacto
                </a>
                
                <!-- Language selector mobile -->
                <div class="flex space-x-4 px-3 py-3 border-t border-gray-200 mt-2">
                    <span class="text-gray-500 text-sm font-medium">Idioma:</span>
                    <a href="?lang=es" 
                       class="<?php echo (!isset($currentLang) || $currentLang === 'es') ? 'text-kasaami-violet font-semibold' : 'text-gray-500 hover:text-kasaami-violet'; ?> text-sm font-medium transition-colors duration-200">ES</a>
                    <span class="text-gray-300">|</span>
                    <a href="?lang=en" 
                       class="<?php echo (isset($currentLang) && $currentLang === 'en') ? 'text-kasaami-violet font-semibold' : 'text-gray-500 hover:text-kasaami-violet'; ?> text-sm font-medium transition-colors duration-200">EN</a>
                </div>
            </div>
        </div>
    </div>
</nav>

<style>
/* Variables CSS para colores de Kasaami */
:root {
    --kasaami-violet: #8B5CF6;
    --kasaami-dark-violet: #6D28D9;
    --kasaami-light-violet: #C4B5FD;
}

/* Top bar estilos */
.topbar {
    transition: all 0.3s ease;
}

.navbar-transparent .topbar {
    border-color: rgba(255, 255, 255, 0.2);
}

.navbar-solid .topbar {
    border-color: rgba(0, 0, 0, 0.1);
}

.topbar-link {
    transition: all 0.2s ease;
    text-decoration: none;
}

.navbar-transparent .topbar-link {
    color: white;
}

.navbar-transparent .topbar-link.active {
    opacity: 1;
    font-weight: 500;
}

.navbar-solid .topbar-link {
    color: #6B7280;
}

.navbar-solid .topbar-link:hover {
    color: #374151;
}

.navbar-solid .topbar-link.active {
    color: var(--kasaami-violet);
    font-weight: 500;
}

.navbar-transparent .topbar-separator {
    color: rgba(255, 255, 255, 0.6);
}

.navbar-solid .topbar-separator {
    color: #D1D5DB;
}

/* Navbar principal */
#navbar {
    transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
}

/* Estado transparente (inicial) */
.navbar-transparent {
    background-color: transparent;
}

.navbar-transparent .nav-link {
    color: white;
    position: relative;
}

.navbar-transparent .nav-link:hover {
    color: var(--kasaami-light-violet);
    transform: translateY(-1px);
}

.navbar-transparent .nav-link.active-page::after {
    content: '';
    position: absolute;
    bottom: -2px;
    left: 50%;
    transform: translateX(-50%);
    width: 20px;
    height: 2px;
    background-color: white;
    border-radius: 1px;
}

/* Estado sólido (cuando hace scroll) */
.navbar-solid {
    background-color: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px);
    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
}

.navbar-solid .nav-link {
    color: #374151;
    position: relative;
}

.navbar-solid .nav-link:hover {
    color: var(--kasaami-violet);
    transform: translateY(-1px);
}

.navbar-solid .nav-link.active-page::after {
    content: '';
    position: absolute;
    bottom: -2px;
    left: 50%;
    transform: translateX(-50%);
    width: 20px;
    height: 2px;
    background-color: var(--kasaami-violet);
    border-radius: 1px;
}

/* CTA Button AGENDA */
.cta-button {
    border: 2px solid transparent;
    text-decoration: none !important;
    position: relative;
    overflow: hidden;
    font-weight: 700;
}

.cta-button:visited {
    color: white;
}

.cta-button:hover {
    text-decoration: none !important;
}

/* Estados del navbar - transparente */
.navbar-transparent .cta-button {
    background: rgba(255, 255, 255, 0.15);
    color: white;
    border-color: rgba(255, 255, 255, 0.3);
    backdrop-filter: blur(10px);
}

.navbar-transparent .cta-button:hover {
    background: rgba(255, 255, 255, 0.25);
    box-shadow: 0 8px 32px rgba(255, 255, 255, 0.2);
    transform: scale(1.05) translateY(-1px);
}

/* Estados del navbar - sólido */
.navbar-solid .cta-button {
    background: linear-gradient(135deg, var(--kasaami-violet), var(--kasaami-dark-violet));
    color: white;
    box-shadow: 0 4px 15px rgba(139, 92, 246, 0.2);
}

.navbar-solid .cta-button:hover {
    background: linear-gradient(135deg, #7C3AED, #5B21B6);
    box-shadow: 0 8px 25px rgba(139, 92, 246, 0.4);
    transform: scale(1.05) translateY(-1px);
}

/* CTA activo (en página de contacto) */
.cta-button.active-cta {
    animation: pulse-glow 2s infinite;
}

@keyframes pulse-glow {
    0%, 100% {
        box-shadow: 0 4px 15px rgba(139, 92, 246, 0.3);
    }
    50% {
        box-shadow: 0 8px 25px rgba(139, 92, 246, 0.6);
    }
}

/* Efecto de brillo en hover */
.cta-button::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
    transition: left 0.6s ease;
}

.cta-button:hover::before {
    left: 100%;
}

/* Focus para accesibilidad */
.cta-button:focus {
    outline: none;
    box-shadow: 0 0 0 3px rgba(139, 92, 246, 0.3);
}

/* Mobile menu */
#mobile-menu {
    transform: translateY(-10px);
    opacity: 0;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

#mobile-menu:not(.hidden) {
    transform: translateY(0);
    opacity: 1;
}

/* Animaciones */
@keyframes fade-in {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-fade-in {
    animation: fade-in 0.6s ease-out;
}

/* Responsive */
@media (max-width: 768px) {
    .cta-button {
        padding: 0.5rem 1.5rem;
        font-size: 0.875rem;
    }
    
    .cta-button svg {
        width: 1rem;
        height: 1rem;
    }
}

/* Mejoras de accesibilidad */
@media (prefers-reduced-motion: reduce) {
    * {
        animation-duration: 0.01ms !important;
        animation-iteration-count: 1 !important;
        transition-duration: 0.01ms !important;
    }
}

/* Estados de focus mejorados */
.nav-link:focus,
.topbar-link:focus {
    outline: 2px solid var(--kasaami-violet);
    outline-offset: 2px;
    border-radius: 2px;
}

/* Hover states mejorados para mobile */
@media (hover: hover) {
    .nav-link:hover,
    .topbar-link:hover {
        transition: all 0.2s ease;
    }
}
</style>

<script>
// Navbar scroll behavior y funcionalidad móvil
document.addEventListener('DOMContentLoaded', function() {
    const navbar = document.getElementById('navbar');
    const logo = document.getElementById('logo-image');
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    const menuIcon = document.getElementById('menu-icon');
    const closeIcon = document.getElementById('close-icon');
    
    const isRoot = <?php echo $isRoot ? 'true' : 'false'; ?>;
    const basePath = '<?php echo $basePath; ?>';
    
    let isMenuOpen = false;
    let lastScrollY = window.scrollY;
    
    // Inicializar navbar como transparente
    navbar.classList.add('navbar-transparent');
    
    // Scroll behavior
    function handleScroll() {
        const currentScrollY = window.scrollY;
        
        if (currentScrollY > 50) {
            // Scroll hacia abajo - navbar sólido
            navbar.classList.remove('navbar-transparent');
            navbar.classList.add('navbar-solid');
            if (logo) {
                logo.src = basePath + 'assets/logos-letranegra.png';
            }
        } else {
            // En el top - navbar transparente
            navbar.classList.remove('navbar-solid');
            navbar.classList.add('navbar-transparent');
            if (logo) {
                logo.src = basePath + 'assets/logos-letrablanca.png';
            }
        }
        
        lastScrollY = currentScrollY;
    }
    
    // Throttled scroll handler para mejor performance
    let ticking = false;
    function requestScrollUpdate() {
        if (!ticking) {
            requestAnimationFrame(handleScroll);
            ticking = true;
            setTimeout(() => { ticking = false; }, 10);
        }
    }
    
    window.addEventListener('scroll', requestScrollUpdate, { passive: true });
    
    // Mobile menu toggle
    if (mobileMenuBtn && mobileMenu) {
        mobileMenuBtn.addEventListener('click', function(e) {
            e.preventDefault();
            toggleMobileMenu();
        });
        
        // Cerrar menú al hacer clic en un enlace
        const mobileLinks = mobileMenu.querySelectorAll('a');
        mobileLinks.forEach(link => {
            link.addEventListener('click', function() {
                if (isMenuOpen) {
                    toggleMobileMenu();
                }
            });
        });
        
        // Cerrar menú con ESC
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && isMenuOpen) {
                toggleMobileMenu();
            }
        });
        
        // Cerrar menú al hacer clic fuera
        document.addEventListener('click', function(e) {
            if (isMenuOpen && !navbar.contains(e.target)) {
                toggleMobileMenu();
            }
        });
    }
    
    function toggleMobileMenu() {
        isMenuOpen = !isMenuOpen;
        
        if (isMenuOpen) {
            mobileMenu.classList.remove('hidden');
            menuIcon.classList.add('hidden');
            closeIcon.classList.remove('hidden');
            mobileMenuBtn.setAttribute('aria-expanded', 'true');
            
            // Prevenir scroll del body
            document.body.style.overflow = 'hidden';
        } else {
            mobileMenu.classList.add('hidden');
            menuIcon.classList.remove('hidden');
            closeIcon.classList.add('hidden');
            mobileMenuBtn.setAttribute('aria-expanded', 'false');
            
            // Restaurar scroll del body
            document.body.style.overflow = '';
        }
    }
    
    // Smooth scroll para enlaces internos
    const internalLinks = document.querySelectorAll('a[href^="#"]');
    internalLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            if (href.length > 1) {
                const target = document.querySelector(href);
                if (target) {
                    e.preventDefault();
                    const offsetTop = target.offsetTop - 80; // Compensar altura del navbar
                    window.scrollTo({
                        top: offsetTop,
                        behavior: 'smooth'
                    });
                }
            }
        });
    });
    
    // Preload de imágenes del logo para cambio suave
    const logoBlanco = new Image();
    const logoNegro = new Image();
    logoBlanco.src = basePath + 'assets/logos-letrablanca.png';
    logoNegro.src = basePath + 'assets/logos-letranegra.png';
    
    // Inicializar estados ARIA
    mobileMenuBtn.setAttribute('aria-expanded', 'false');
    mobileMenuBtn.setAttribute('aria-controls', 'mobile-menu');
    
    console.log('Navbar inicializado correctamente');
});

// Función para tracking (opcional)
function trackNavigation(page) {
    if (typeof gtag !== 'undefined') {
        gtag('event', 'page_view', {
            page_title: page,
            page_location: window.location.href
        });
    }
    console.log('Navegación a:', page);
}
</script>