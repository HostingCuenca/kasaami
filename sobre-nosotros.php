<?php
// pages/sobre-nosotros.php
$pageTitle = "Sobre Nosotros - Kasaami Care & Beauty";
$currentLang = $_GET['lang'] ?? 'es';

// Language content
$content = [
    'es' => [
        'nav' => [
            'about' => 'Sobre Nosotros',
            'services' => 'Servicios', 
            'procedures' => 'Procedimientos'
        ],
        'hero' => [
            'title' => 'Sobre Nosotros',
            'subtitle' => 'Tu transformación comienza en el corazón de los Andes'
        ],
        'intro' => [
            'title' => 'Turismo Médico y Estético en Ecuador',
            'description' => 'KASAAMI Care & Beauty es su aliado en turismo médico y estético en Ecuador. Con 6 años de experiencia, ofrecemos una experiencia integral de hospitalidad, bienestar y transformación, fusionando cuidado humano, excelencia profesional y el poder sanador de nuestro país.',
            'highlight' => 'Nuestros servicios todo incluido cubren cirugías de primer nivel, medicina premium, traslados seguros y cuidado pre/postoperatorio, con opciones de turismo y bienestar.'
        ],
        'essence' => [
            'title' => 'Nuestra Esencia',
            'values' => [
                [
                    'icon' => 'heart',
                    'title' => 'Cuidado Humano',
                    'description' => 'Brindamos un servicio integral, centrado en el bienestar y la mejora continua, entendiendo que la transformación es un proceso holístico.'
                ],
                [
                    'icon' => 'star',
                    'title' => 'Excelencia Profesional',
                    'description' => 'Combinamos la experiencia médica de primer nivel con un equipo altamente dedicado, garantizando los más altos estándares de calidad.'
                ],
                [
                    'icon' => 'mountain',
                    'title' => 'El Poder de Ecuador',
                    'description' => 'Aprovechamos el entorno natural y cultural de Ecuador para ofrecer una experiencia única de sanación y transformación.'
                ]
            ]
        ],
        'mission' => [
            'title' => 'Nuestra Misión',
            'description' => 'Ser el puente que conecta a pacientes internacionales con la excelencia médica ecuatoriana, proporcionando experiencias transformadoras que van más allá de la cirugía, integrando bienestar, cultura y la magia natural de los Andes.',
            'vision_title' => 'Nuestra Visión',
            'vision_description' => 'Posicionar a Ecuador como el destino líder en turismo médico de Latinoamérica, siendo reconocidos por nuestra calidez humana, innovación médica y experiencias integrales de transformación.'
        ],
        'stats' => [
            'title' => 'Nuestros Números',
            'items' => [
                ['number' => '500+', 'label' => 'Pacientes Transformados'],
                ['number' => '50+', 'label' => 'Médicos Especialistas'],
                ['number' => '15+', 'label' => 'Países de Origen'],
                ['number' => '6', 'label' => 'Años de Experiencia']
            ]
        ],
        'team' => [
            'title' => 'Nuestro Equipo',
            'subtitle' => 'Profesionales dedicados a tu transformación',
            'description' => 'Contamos con un equipo multidisciplinario de especialistas médicos, coordinadores de experiencia, y profesionales en hospitalidad, todos unidos por el compromiso de brindar la mejor atención integral.'
        ],
        'footer' => [
            'description' => 'Tu transformación comienza en el corazón de los Andes. Experimenta la excelencia médica en Ecuador con nuestros especialistas de clase mundial.',
            'links' => 'Enlaces Rápidos',
            'contact' => 'Contacto',
            'newsletter' => 'Newsletter',
            'email_placeholder' => 'Tu email',
            'rights' => 'Todos los derechos reservados',
            'privacy' => 'Política de Privacidad',
            'terms' => 'Términos y Condiciones'
        ],
        'whatsapp' => [
            'message' => 'Hola! Me interesa conocer más sobre los servicios de Kasaami Care & Beauty.',
            'tooltip' => 'Escríbenos por WhatsApp'
        ]
    ],
    'en' => [
        'nav' => [
            'about' => 'About Us',
            'services' => 'Services',
            'procedures' => 'Procedures'
        ],
        'hero' => [
            'title' => 'About Us',
            'subtitle' => 'Your transformation begins in the heart of the Andes'
        ],
        'intro' => [
            'title' => 'Medical and Aesthetic Tourism in Ecuador',
            'description' => 'KASAAMI Care & Beauty is your ally in medical and aesthetic tourism in Ecuador. With 6 years of experience, we offer a comprehensive experience of hospitality, wellness and transformation, merging human care, professional excellence and the healing power of our country.',
            'highlight' => 'Our all-inclusive services cover premier surgeries, premium medicine, safe transfers and pre/post-operative care, with tourism and wellness options.'
        ],
        'essence' => [
            'title' => 'Our Essence',
            'values' => [
                [
                    'icon' => 'heart',
                    'title' => 'Human Care',
                    'description' => 'We provide comprehensive service, focused on wellness and continuous improvement, understanding that transformation is a holistic process.'
                ],
                [
                    'icon' => 'star',
                    'title' => 'Professional Excellence',
                    'description' => 'We combine first-level medical experience with a highly dedicated team, guaranteeing the highest quality standards.'
                ],
                [
                    'icon' => 'mountain',
                    'title' => 'The Power of Ecuador',
                    'description' => 'We leverage Ecuador\'s natural and cultural environment to offer a unique healing and transformation experience.'
                ]
            ]
        ],
        'mission' => [
            'title' => 'Our Mission',
            'description' => 'To be the bridge that connects international patients with Ecuadorian medical excellence, providing transformative experiences that go beyond surgery, integrating wellness, culture and the natural magic of the Andes.',
            'vision_title' => 'Our Vision',
            'vision_description' => 'Position Ecuador as the leading medical tourism destination in Latin America, being recognized for our human warmth, medical innovation and comprehensive transformation experiences.'
        ],
        'stats' => [
            'title' => 'Our Numbers',
            'items' => [
                ['number' => '500+', 'label' => 'Transformed Patients'],
                ['number' => '50+', 'label' => 'Specialist Doctors'],
                ['number' => '15+', 'label' => 'Countries of Origin'],
                ['number' => '6', 'label' => 'Years of Experience']
            ]
        ],
        'team' => [
            'title' => 'Our Team',
            'subtitle' => 'Professionals dedicated to your transformation',
            'description' => 'We have a multidisciplinary team of medical specialists, experience coordinators, and hospitality professionals, all united by the commitment to provide the best comprehensive care.'
        ],
        'footer' => [
            'description' => 'Your transformation begins in the heart of the Andes. Experience medical excellence in Ecuador with our world-class specialists.',
            'links' => 'Quick Links',
            'contact' => 'Contact',
            'newsletter' => 'Newsletter',
            'email_placeholder' => 'Your email',
            'rights' => 'All rights reserved',
            'privacy' => 'Privacy Policy',
            'terms' => 'Terms and Conditions'
        ],
        'whatsapp' => [
            'message' => 'Hello! I am interested in learning more about Kasaami Care & Beauty services.',
            'tooltip' => 'Contact us on WhatsApp'
        ]
    ]
];

$t = $content[$currentLang];
?>

<!DOCTYPE html>
<html lang="<?php echo $currentLang; ?>" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="<?php echo $t['intro']['description']; ?>">
    <meta name="keywords" content="turismo médico, Ecuador, cirugía estética, transformación, hospitalidad">
    <meta name="author" content="Kasaami Care & Beauty">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Rufina:wght@400;700&display=swap" rel="stylesheet">
    
    <!-- Custom Tailwind Config -->
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
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.8s ease-in-out',
                        'slide-up': 'slideUp 0.6s ease-out',
                        'counter': 'counter 2s ease-out'
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' }
                        },
                        slideUp: {
                            '0%': { transform: 'translateY(30px)', opacity: '0' },
                            '100%': { transform: 'translateY(0)', opacity: '1' }
                        },
                        counter: {
                            '0%': { transform: 'scale(0.8)', opacity: '0' },
                            '100%': { transform: 'scale(1)', opacity: '1' }
                        }
                    }
                }
            }
        }
    </script>
    
    <style>
        .text-gradient {
            background: linear-gradient(135deg, #8B5CF6 0%, #6D28D9 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .hover-lift {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .hover-lift:hover {
            transform: translateY(-8px);
            box-shadow: 0 25px 50px -12px rgba(139, 92, 246, 0.25);
        }
        
        .parallax {
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        
        .counter-number {
            font-feature-settings: 'tnum';
        }
    </style>
</head>

<body class="font-poppins bg-white overflow-x-hidden">
    
    <!-- Navigation -->
    <?php include 'includes/Navbar.php'; ?>

    <!-- Hero Section -->
    <section class="relative min-h-screen flex items-center justify-center parallax" style="background-image: linear-gradient(rgba(139, 92, 246, 0.7), rgba(109, 40, 217, 0.5)), url('https://ecuadorexplorer.com/wp-content/uploads/2023/08/blog1_vista_hermosa_centro_quito_historico.jpg');">
        <div class="relative z-10 text-center text-white px-4 sm:px-6 lg:px-8 max-w-4xl mx-auto">
            <h1 class="text-5xl md:text-7xl font-rufina font-bold mb-6 animate-slide-up">
                <?php echo $t['hero']['title']; ?>
            </h1>
            <p class="text-xl md:text-2xl opacity-90 animate-slide-up max-w-3xl mx-auto leading-relaxed" style="animation-delay: 0.2s;">
                <?php echo $t['hero']['subtitle']; ?>
            </p>
        </div>
    </section>

    <!-- Introduction Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <!-- Content -->
                <div class="space-y-8">
                    <h2 class="text-4xl md:text-5xl font-rufina font-bold text-gray-900 mb-6">
                        <?php echo $t['intro']['title']; ?>
                    </h2>
                    <p class="text-lg text-gray-600 leading-relaxed">
                        <?php echo $t['intro']['description']; ?>
                    </p>
                    <div class="bg-kasaami-pearl p-6 rounded-xl border-l-4 border-kasaami-violet">
                        <p class="text-gray-700 font-medium italic">
                            <?php echo $t['intro']['highlight']; ?>
                        </p>
                    </div>
                </div>
                
                <!-- Image -->
                <div class="relative">
                    <img src="https://ecuadorexplorer.com/wp-content/uploads/2023/08/blog1_vista_hermosa_centro_quito_historico.jpg" 
                         alt="Quito - Centro de Ecuador" 
                         class="rounded-2xl shadow-2xl hover-lift w-full">
                    <div class="absolute -bottom-6 -right-6 w-32 h-32 bg-gradient-to-br from-kasaami-violet to-kasaami-light-violet rounded-full opacity-20"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Essence Section -->
    <section class="py-20 bg-kasaami-pearl">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-rufina font-bold text-gray-900 mb-6">
                    <?php echo $t['essence']['title']; ?>
                </h2>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <?php foreach ($t['essence']['values'] as $value): ?>
                <div class="text-center hover-lift bg-white p-8 rounded-2xl shadow-lg">
                    <!-- Icon -->
                    <div class="w-16 h-16 bg-gradient-to-br from-kasaami-violet to-kasaami-dark-violet rounded-full flex items-center justify-center mx-auto mb-6">
                        <?php if ($value['icon'] === 'heart'): ?>
                            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                            </svg>
                        <?php elseif ($value['icon'] === 'star'): ?>
                            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                            </svg>
                        <?php else: ?>
                            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M14 6l-3.75 5 2.85 3.8-1.6 1.2C9.81 13.75 7 10 7 10l-6 8h22l-9-12z"/>
                            </svg>
                        <?php endif; ?>
                    </div>
                    
                    <!-- Content -->
                    <h3 class="text-xl font-rufina font-bold text-gray-900 mb-4">
                        <?php echo $value['title']; ?>
                    </h3>
                    <p class="text-gray-600 leading-relaxed">
                        <?php echo $value['description']; ?>
                    </p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Mission & Vision Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
                <!-- Mission -->
                <div class="space-y-6">
                    <h2 class="text-3xl md:text-4xl font-rufina font-bold text-gray-900">
                        <?php echo $t['mission']['title']; ?>
                    </h2>
                    <p class="text-lg text-gray-600 leading-relaxed">
                        <?php echo $t['mission']['description']; ?>
                    </p>
                </div>
                
                <!-- Vision -->
                <div class="space-y-6">
                    <h2 class="text-3xl md:text-4xl font-rufina font-bold text-gray-900">
                        <?php echo $t['mission']['vision_title']; ?>
                    </h2>
                    <p class="text-lg text-gray-600 leading-relaxed">
                        <?php echo $t['mission']['vision_description']; ?>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-20 bg-gray-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-rufina font-bold mb-6">
                    <?php echo $t['stats']['title']; ?>
                </h2>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <?php foreach ($t['stats']['items'] as $stat): ?>
                <div class="text-center animate-counter">
                    <div class="text-4xl md:text-5xl font-bold text-kasaami-light-violet mb-2 counter-number">
                        <?php echo $stat['number']; ?>
                    </div>
                    <div class="text-gray-300 font-medium">
                        <?php echo $stat['label']; ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="py-20 bg-kasaami-pearl">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-rufina font-bold text-gray-900 mb-6">
                    <?php echo $t['team']['title']; ?>
                </h2>
                <p class="text-xl text-kasaami-violet font-medium mb-4">
                    <?php echo $t['team']['subtitle']; ?>
                </p>
                <p class="text-lg text-gray-600 max-w-3xl mx-auto leading-relaxed">
                    <?php echo $t['team']['description']; ?>
                </p>
            </div>
            
            <!-- Team Grid con Imágenes Reales -->
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-8">
                <!-- Doctor 1 -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover-lift">
                    <div class="h-64 overflow-hidden">
                        <img src="../assets/doctores/doctor.png" alt="Dr. Especialista" class="w-full h-full object-cover object-center">
                    </div>
                    <div class="p-6 text-center">
                        <h3 class="font-rufina font-bold text-gray-900 mb-2">Dr. Carlos Mendoza</h3>
                        <p class="text-kasaami-violet font-medium">Cirujano Plástico</p>
                    </div>
                </div>

                <!-- Doctora 1 -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover-lift">
                    <div class="h-64 overflow-hidden">
                        <img src="../assets/doctores/dra1.png" alt="Dra. Especialista" class="w-full h-full object-cover object-center">
                    </div>
                    <div class="p-6 text-center">
                        <h3 class="font-rufina font-bold text-gray-900 mb-2">Dra. María González</h3>
                        <p class="text-kasaami-violet font-medium">Dermatóloga</p>
                    </div>
                </div>

                <!-- Cirujano -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover-lift">
                    <div class="h-64 overflow-hidden">
                        <img src="../assets/doctores/cirjuano.png" alt="Cirujano" class="w-full h-full object-cover object-center">
                    </div>
                    <div class="p-6 text-center">
                        <h3 class="font-rufina font-bold text-gray-900 mb-2">Dr. Roberto Silva</h3>
                        <p class="text-kasaami-violet font-medium">Cirujano Estético</p>
                    </div>
                </div>

                <!-- Cirujana -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover-lift">
                    <div class="h-64 overflow-hidden">
                        <img src="../assets/doctores/cirujana.png" alt="Cirujana" class="w-full h-full object-cover object-center">
                    </div>
                    <div class="p-6 text-center">
                        <h3 class="font-rufina font-bold text-gray-900 mb-2">Dra. Ana Ramírez</h3>
                        <p class="text-kasaami-violet font-medium">Cirujana Reconstructiva</p>
                    </div>
                </div>

                <!-- Doctor 2 -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover-lift">
                    <div class="h-64 overflow-hidden">
                        <img src="../assets/doctores/doctor2.png" alt="Dr. Especialista 2" class="w-full h-full object-cover object-center">
                    </div>
                    <div class="p-6 text-center">
                        <h3 class="font-rufina font-bold text-gray-900 mb-2">Dr. Luis Herrera</h3>
                        <p class="text-kasaami-violet font-medium">Otorrinolaringólogo</p>
                    </div>
                </div>

                <!-- Especialista Hombre -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover-lift">
                    <div class="h-64 overflow-hidden">
                        <img src="../assets/doctores/especialistahombre.png" alt="Especialista" class="w-full h-full object-cover object-center">
                    </div>
                    <div class="p-6 text-center">
                        <h3 class="font-rufina font-bold text-gray-900 mb-2">Dr. Miguel Torres</h3>
                        <p class="text-kasaami-violet font-medium">Especialista Capilar</p>
                    </div>
                </div>

                <!-- Especialista Mujer -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover-lift">
                    <div class="h-64 overflow-hidden">
                        <img src="../assets/doctores/especialistamujer.png" alt="Especialista" class="w-full h-full object-cover object-center">
                    </div>
                    <div class="p-6 text-center">
                        <h3 class="font-rufina font-bold text-gray-900 mb-2">Dra. Carmen López</h3>
                        <p class="text-kasaami-violet font-medium">Especialista en Obesidad</p>
                    </div>
                </div>

                <!-- Enfermera -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover-lift">
                    <div class="h-64 overflow-hidden">
                        <img src="../assets/doctores/enfermera.png" alt="Enfermera" class="w-full h-full object-cover object-center">
                    </div>
                    <div class="p-6 text-center">
                        <h3 class="font-rufina font-bold text-gray-900 mb-2">Enf. Patricia Vega</h3>
                        <p class="text-kasaami-violet font-medium">Coordinadora de Cuidados</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="py-20 bg-gradient-to-r from-kasaami-violet to-kasaami-dark-violet text-white">
        <div class="max-w-4xl mx-auto text-center px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl md:text-5xl font-rufina font-bold mb-6">
                <?php echo $currentLang === 'es' ? '¿Listo para tu transformación?' : 'Ready for your transformation?'; ?>
            </h2>
            <p class="text-xl mb-8 opacity-90">
                <?php echo $currentLang === 'es' ? 'Comienza tu viaje hacia una nueva versión de ti mismo en el corazón de los Andes' : 'Start your journey to a new version of yourself in the heart of the Andes'; ?>
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <button class="bg-white text-kasaami-violet px-8 py-4 rounded-full font-semibold hover:bg-gray-100 transition-colors duration-200 transform hover:scale-105">
                    <?php echo $currentLang === 'es' ? 'Agendar Consulta' : 'Schedule Consultation'; ?>
                </button>
                <a href="../servicios" class="border-2 border-white text-white px-8 py-4 rounded-full font-semibold hover:bg-white hover:text-kasaami-violet transition-all duration-200 transform hover:scale-105 inline-block">
                    <?php echo $currentLang === 'es' ? 'Conocer Servicios' : 'Learn About Services'; ?>
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include 'includes/Footer.php'; ?>

    <!-- WhatsApp Button -->
    <?php include 'includes/FlotanteWpp.php'; ?>

    <script>
        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Intersection Observer for animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-fade-in');
                }
            });
        }, observerOptions);

        // Observe elements for animation
        document.querySelectorAll('.hover-lift').forEach(el => {
            observer.observe(el);
        });

        // Counter animation
        const counterObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counters = entry.target.querySelectorAll('.counter-number');
                    counters.forEach(counter => {
                        const target = counter.textContent;
                        const number = parseInt(target.replace(/\D/g, ''));
                        const suffix = target.replace(/\d/g, '');
                        
                        let current = 0;
                        const increment = number / 50;
                        
                        const updateCounter = () => {
                            current += increment;
                            if (current < number) {
                                counter.textContent = Math.floor(current) + suffix;
                                requestAnimationFrame(updateCounter);
                            } else {
                                counter.textContent = target;
                            }
                        };
                        
                        updateCounter();
                    });
                }
            });
        }, { threshold: 0.5 });

        const statsSection = document.querySelector('.py-20.bg-gray-900');
        if (statsSection) {
            counterObserver.observe(statsSection);
        }
    </script>
</body>
</html>