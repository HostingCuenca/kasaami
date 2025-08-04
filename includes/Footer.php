<?php
// includes/Footer.php - Universal para root y páginas internas
$isRoot = (basename($_SERVER['SCRIPT_NAME']) === 'index.php' && dirname($_SERVER['SCRIPT_NAME']) === '/');
$basePath = $isRoot ? '' : '../';

// Obtener idioma actual (ya debe estar detectado por init-language.php)
if (!isset($currentLang)) {
    $currentLang = $_GET['lang'] ?? 'es';
}

// Traducciones para el footer
$footerContent = [
    'es' => [
        'tagline' => 'Tu transformación empieza en el corazón de los Andes.',
        'description' => 'En Kasaami, unimos la excelencia médica y la hospitalidad para ofrecerte una experiencia única de medicina estética y bienestar en Ecuador.',
        'links' => 'Enlaces Rápidos',
        'contact' => 'Contacto',
        'essence' => 'Esencia Kasaami',
        'services' => 'Servicios',
        'procedures' => 'Procedimientos',
        'allies' => 'Aliados',
        'language' => 'Idioma / Language',
        'spanish' => 'Español',
        'english' => 'English',
        'rights' => 'Todos los derechos reservados',
        'privacy' => 'Política de Privacidad',
        'terms' => 'Términos y Condiciones',
        'developed' => 'Desarrollado por'
    ],
    'en' => [
        'tagline' => 'Your transformation begins in the heart of the Andes.',
        'description' => 'At Kasaami, we unite medical excellence and hospitality to offer you a unique aesthetic medicine and wellness experience in Ecuador.',
        'links' => 'Quick Links',
        'contact' => 'Contact',
        'essence' => 'Kasaami Essence',
        'services' => 'Services',
        'procedures' => 'Procedures',
        'allies' => 'Partners',
        'language' => 'Idioma / Language',
        'spanish' => 'Español',
        'english' => 'English',
        'rights' => 'All rights reserved',
        'privacy' => 'Privacy Policy',
        'terms' => 'Terms and Conditions',
        'developed' => 'Developed by'
    ]
];

$ft = $footerContent[$currentLang];
?>

<!-- Footer -->
<footer class="bg-gray-900 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- Logo & Description -->
            <div class="col-span-1 md:col-span-2">
                <div class="flex items-center space-x-3 mb-6">
                    <img src="<?php echo $basePath; ?>assets/logos-letrablanca.png" alt="Kasaami Logo" class="h-12 w-auto">
                </div>
                <p class="text-kasaami-light-violet max-w-md leading-relaxed font-medium">
                    <?php echo $ft['tagline']; ?>
                </p>
                <p class="text-gray-400 max-w-md leading-relaxed mt-3">
                    <?php echo $ft['description']; ?>
                </p>
                
                <!-- Social Media -->
                <div class="flex space-x-4 mt-6">
                    <!-- Instagram -->
                    <a href="#" class="text-gray-400 hover:text-kasaami-violet transition-colors duration-200 transform hover:scale-110">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                        </svg>
                    </a>
                    
                    <!-- WhatsApp -->
                    <a href="https://wa.me/593963052401" target="_blank" class="text-gray-400 hover:text-kasaami-violet transition-colors duration-200 transform hover:scale-110">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"/>
                        </svg>
                    </a>
                </div>
            </div>
            
            <!-- Quick Links -->
            <div>
                <h4 class="text-lg font-semibold mb-4 font-rufina"><?php echo $ft['links']; ?></h4>
                <ul class="space-y-3">
                    <li><span class="text-gray-400 cursor-default"><?php echo $ft['essence']; ?></span></li>
                    <li><span class="text-gray-400 cursor-default"><?php echo $ft['services']; ?></span></li>
                    <li><span class="text-gray-400 cursor-default"><?php echo $ft['procedures']; ?></span></li>
                    <li><span class="text-gray-400 cursor-default"><?php echo $ft['allies']; ?></span></li>
                </ul>
            </div>
            
            <!-- Contact Info & Language -->
            <div>
                <h4 class="text-lg font-semibold mb-4 font-rufina"><?php echo $ft['contact']; ?></h4>
                <ul class="space-y-4 text-gray-400">
                    <li class="flex items-start space-x-3">
                        <svg class="w-5 h-5 mt-0.5 text-kasaami-violet flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                        </svg>
                        <span>Quito, Ecuador</span>
                    </li>
                    <li class="flex items-start space-x-3">
                        <svg class="w-5 h-5 mt-0.5 text-kasaami-violet flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path>
                        </svg>
                        <a href="tel:+593963052401" class="hover:text-kasaami-violet transition-colors duration-200">+593 9630 52401</a>
                    </li>
                    <li class="flex items-start space-x-3">
                        <svg class="w-5 h-5 mt-0.5 text-kasaami-violet flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                        </svg>
                        <a href="mailto:info@kasaami.com" class="hover:text-kasaami-violet transition-colors duration-200">info@kasaami.com</a>
                    </li>
                </ul>
                
                <!-- Language Selector -->
                <!-- <div class="mt-6">
                    <h5 class="text-sm font-semibold mb-3 text-kasaami-light-violet"><?php echo $ft['language']; ?></h5>
                    <div class="flex space-x-4">
                        <a href="?lang=es" 
                           class="<?php echo ($currentLang === 'es') ? 'text-kasaami-violet font-semibold border-b-2 border-kasaami-violet' : 'text-gray-400 hover:text-kasaami-violet'; ?> text-base font-medium transition-all duration-200 pb-1">
                            <?php echo $ft['spanish']; ?>
                        </a>
                        <span class="text-gray-500">|</span>
                        <a href="?lang=en" 
                           class="<?php echo ($currentLang === 'en') ? 'text-kasaami-violet font-semibold border-b-2 border-kasaami-violet' : 'text-gray-400 hover:text-kasaami-violet'; ?> text-base font-medium transition-all duration-200 pb-1">
                            <?php echo $ft['english']; ?>
                        </a>
                    </div>
                </div> -->
            </div>
        </div>
        
        <div class="border-t border-gray-800 mt-12 pt-8">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-400 text-sm">
                    &copy; <?php echo date('Y'); ?> Kasaami Care & Beauty. <?php echo $ft['rights']; ?>.
                </p>
                <div class="flex flex-col md:flex-row items-center space-y-2 md:space-y-0 md:space-x-6 mt-4 md:mt-0">
                    <div class="flex flex-col md:flex-row items-center space-y-2 md:space-y-0 md:space-x-6">
                        <a href="#" class="text-gray-400 hover:text-kasaami-violet text-sm transition-colors duration-200"><?php echo $ft['privacy']; ?></a>
                        <a href="#" class="text-gray-400 hover:text-kasaami-violet text-sm transition-colors duration-200"><?php echo $ft['terms']; ?></a>
                        <span class="text-gray-400 text-sm">
                            <?php echo $ft['developed']; ?> <a href="https://torisoftt.com" target="_blank" class="text-kasaami-light-violet hover:text-kasaami-violet transition-colors duration-200 font-medium">Torisoftt</a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>