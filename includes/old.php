<?php
// includes/Navbar.php
?>

<!-- Navigation -->
<nav class="fixed top-0 w-full z-50 transition-all duration-500" id="navbar">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            
            <!-- Logo -->
            <div class="flex-shrink-0 animate-fade-in">
                <div class="flex items-center space-x-3">
                    <img id="logo-image" src="assets/logos-letrablanca.png" alt="Kasaami Logo" class="h-12 w-auto transition-all duration-300">
                </div>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden md:block">
                <div class="ml-10 flex items-baseline space-x-8">
                    <a href="#about" class="nav-link px-3 py-2 text-sm font-medium transition-colors duration-200"><?php echo $t['nav']['about']; ?></a>
                    <a href="#services" class="nav-link px-3 py-2 text-sm font-medium transition-colors duration-200"><?php echo $t['nav']['services']; ?></a>
                    <a href="#procedures" class="nav-link px-3 py-2 text-sm font-medium transition-colors duration-200"><?php echo $t['nav']['procedures']; ?></a>
                    <a href="#partners" class="nav-link px-3 py-2 text-sm font-medium transition-colors duration-200"><?php echo $t['nav']['partners']; ?></a>
                    <a href="#contact" class="nav-link px-3 py-2 text-sm font-medium transition-colors duration-200"><?php echo $t['nav']['contact']; ?></a>
                </div>
            </div>

            <!-- Language Switcher & CTA -->
            <div class="flex items-center space-x-4">
                <div class="flex space-x-2">
                    <a href="?lang=es" class="<?php echo $currentLang === 'es' ? 'text-kasaami-violet' : 'nav-link-lang'; ?> text-sm font-medium transition-colors duration-200">ES</a>
                    <span class="nav-separator">|</span>
                    <a href="?lang=en" class="<?php echo $currentLang === 'en' ? 'text-kasaami-violet' : 'nav-link-lang'; ?> text-sm font-medium transition-colors duration-200">EN</a>
                </div>
                <button class="cta-button bg-gradient-to-r from-kasaami-violet to-kasaami-dark-violet text-white px-6 py-2 rounded-full text-sm font-medium hover:shadow-lg hover:shadow-kasaami-violet/25 transition-all duration-200 transform hover:scale-105">
                    <?php echo $t['nav']['schedule']; ?>
                </button>
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden">
                <button class="nav-link p-2" id="mobile-menu-btn">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
        
        <!-- Mobile Navigation -->
        <div class="md:hidden hidden" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1 bg-white/95 backdrop-blur-md rounded-lg mt-2">
                <a href="#about" class="block text-gray-700 hover:text-kasaami-violet px-3 py-2 text-sm font-medium"><?php echo $t['nav']['about']; ?></a>
                <a href="#services" class="block text-gray-700 hover:text-kasaami-violet px-3 py-2 text-sm font-medium"><?php echo $t['nav']['services']; ?></a>
                <a href="#procedures" class="block text-gray-700 hover:text-kasaami-violet px-3 py-2 text-sm font-medium"><?php echo $t['nav']['procedures']; ?></a>
                <a href="#partners" class="block text-gray-700 hover:text-kasaami-violet px-3 py-2 text-sm font-medium"><?php echo $t['nav']['partners']; ?></a>
                <a href="#contact" class="block text-gray-700 hover:text-kasaami-violet px-3 py-2 text-sm font-medium"><?php echo $t['nav']['contact']; ?></a>
            </div>
        </div>
    </div>
</nav>

<style>
/* Navbar Styles */
#navbar {
    /* Transparente por defecto */
}

/* Estado transparente (inicial) */
.navbar-transparent .nav-link {
    color: white;
}

.navbar-transparent .nav-link:hover {
    color: #C4B5FD; /* kasaami-light-violet */
}

.navbar-transparent .nav-link-lang {
    color: rgba(255, 255, 255, 0.8);
}

.navbar-transparent .nav-separator {
    color: rgba(255, 255, 255, 0.5);
}

/* Estado sólido (cuando hace scroll) */
.navbar-solid {
    background-color: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px);
    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
}

.navbar-solid .nav-link {
    color: #374151; /* gray-700 */
}

.navbar-solid .nav-link:hover {
    color: #8B5CF6; /* kasaami-violet */
}

.navbar-solid .nav-link-lang {
    color: #6B7280; /* gray-500 */
}

.navbar-solid .nav-separator {
    color: #D1D5DB; /* gray-300 */
}

/* CTA Button */
.cta-button {
    border: 2px solid transparent;
}

.navbar-transparent .cta-button {
    background: rgba(255, 255, 255, 0.2);
    color: white;
    border-color: rgba(255, 255, 255, 0.3);
}

.navbar-transparent .cta-button:hover {
    background: rgba(255, 255, 255, 0.3);
}

.navbar-solid .cta-button {
    background: linear-gradient(135deg, #8B5CF6, #6D28D9);
    color: white;
}
</style>

<script>
// Navbar scroll behavior
document.addEventListener('DOMContentLoaded', function() {
    const navbar = document.getElementById('navbar');
    const logo = document.getElementById('logo-image');
    
    // Inicializar navbar como transparente
    navbar.classList.add('navbar-transparent');
    
    window.addEventListener('scroll', function() {
        if (window.scrollY > 50) {
            // Scroll hacia abajo - navbar sólido
            navbar.classList.remove('navbar-transparent');
            navbar.classList.add('navbar-solid');
            logo.src = 'assets/logos-letranegra.png';
        } else {
            // En el top - navbar transparente
            navbar.classList.remove('navbar-solid');
            navbar.classList.add('navbar-transparent');
            logo.src = 'assets/logos-letrablanca.png';
        }
    });
    
    // Mobile menu toggle
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    
    if (mobileMenuBtn && mobileMenu) {
        mobileMenuBtn.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
        });
    }
});
</script>
