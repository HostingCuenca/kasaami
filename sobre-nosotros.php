<?php
// pages/sobre-nosotros.php
require_once('includes/init-language.php');
$pageTitle = "Esencia Kasaami - Kasaami Care & Beauty";
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
            'title' => 'En Kasaami Somos Salud con Alma',
            'subtitle' => 'Nuestra esencia es el equilibrio entre lo estético y lo vital. Combinamos ciencia, arte y hospitalidad para que tu transformación sea segura, profunda y significativa. Porque verte bien empieza por sentirte bien.'
        ],
        'intro' => [
            'title' => 'Nuestro Camino de Cuidado',
            'description' => 'En Kasaami, tu proceso de transformación va más allá del procedimiento médico. Integramos tu recuperación con experiencias exclusivas de turismo médico en Ecuador y bienestar integral, asegurando que tu estadía sea reparadora y enriquecedora. Te acompañamos en cada paso, desde la gestión de trámites médicos hasta actividades diseñadas para potenciar tu recuperación física y emocional en un entorno natural privilegiado.'
        ],
        'mission' => [
            'title' => 'El Futuro que Imaginamos',
            'subtitle' => 'Sanar con propósito, transformar con sentido',
            'intro' => 'En KASAAMI, soñamos con redefinir el turismo médico en América Latina y posicionar a Ecuador como un destino líder en salud y belleza, ofreciendo experiencias médicas integrales que nutren el cuerpo, el alma y la identidad.',
            'vision' => 'Visualizamos un mundo donde pacientes internacionales viajan a Ecuador para sanar y vuelven transformados, no solo por los resultados clínicos, sino por la experiencia vivida, acompañamiento profesional y bienestar emocional.',
            'commitment' => 'Queremos que cada historia atendida en KASAAMI deje una huella profunda: confianza, belleza y renovación. Nos comprometemos a poner a Ecuador en los ojos del mundo, mostrando su excelencia en tratamientos médicos, su cultura única y la energía sanadora de los Andes a través de cada experiencia que ofrecemos.'
        ],
        'commitment' => [
            'title' => 'Nuestro Compromiso de Transformación',
            'description' => 'Ser el puente confiable que conecta a pacientes internacionales con la excelencia médica de Ecuador, ofreciendo experiencias de transformación que trascienden la cirugía. Integramos bienestar, riqueza cultural y energía sanadora de los Andes para acompañarte en cada paso de tu renovación. Cuidarte es nuestra misión.'
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
            'title' => 'At Kasaami We Are Health with Soul',
            'subtitle' => 'Our essence is the balance between the aesthetic and the vital. We combine science, art and hospitality so that your transformation is safe, profound and meaningful. Because looking good starts with feeling good.'
        ],
        'intro' => [
            'title' => 'Our Path of Care',
            'description' => 'At Kasaami, your transformation process goes beyond the medical procedure. We integrate your recovery with exclusive medical tourism experiences in Ecuador and comprehensive wellness, ensuring your stay is restorative and enriching. We accompany you every step of the way, from managing medical procedures to activities designed to enhance your physical and emotional recovery in a privileged natural environment.'
        ],
        'mission' => [
            'title' => 'The Future We Imagine',
            'subtitle' => 'Healing with purpose, transforming with meaning',
            'intro' => 'At KASAAMI, we dream of redefining medical tourism in Latin America and positioning Ecuador as a leading destination in health and beauty, offering comprehensive medical experiences that nourish the body, soul and identity.',
            'vision' => 'We envision a world where international patients travel to Ecuador to heal and return transformed, not only by clinical results, but by the lived experience, professional accompaniment and emotional well-being.',
            'commitment' => 'We want every story attended at KASAAMI to leave a deep mark: confidence, beauty and renewal. We commit to putting Ecuador in the eyes of the world, showing its excellence in medical treatments, its unique culture and the healing energy of the Andes through every experience we offer.'
        ],
        'commitment' => [
            'title' => 'Our Transformation Commitment',
            'description' => 'To be the reliable bridge that connects international patients with Ecuador\'s medical excellence, offering transformation experiences that transcend surgery. We integrate wellness, cultural richness and healing energy of the Andes to accompany you in every step of your renewal. Caring for you is our mission.'
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

    <!-- Favicon -->
<!-- Favicon -->
    <link rel="icon" type="image/png" href="public/favicon.png">
    <link rel="shortcut icon" href="public/favicon.png">
    <link rel="apple-touch-icon" href="public/favicon.png">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Filson Pro Fonts -->
    <style>
        @font-face {
            font-family: 'Filson Pro';
            src: url('assets/fuentes/FilsonProRegular.otf') format('opentype');
            font-weight: 400;
            font-style: normal;
        }
        
        @font-face {
            font-family: 'Filson Pro';
            src: url('assets/fuentes/FilsonProRegularItalic.otf') format('opentype');
            font-weight: 400;
            font-style: italic;
        }
        
        @font-face {
            font-family: 'Filson Pro';
            src: url('assets/fuentes/FilsonProThin.otf') format('opentype');
            font-weight: 100;
            font-style: normal;
        }
        
        @font-face {
            font-family: 'Filson Pro';
            src: url('assets/fuentes/FilsonProThinItalic.otf') format('opentype');
            font-weight: 100;
            font-style: italic;
        }
        
        @font-face {
            font-family: 'Filson Pro';
            src: url('assets/fuentes/FilsonProLight.otf') format('opentype');
            font-weight: 300;
            font-style: normal;
        }
        
        @font-face {
            font-family: 'Filson Pro';
            src: url('assets/fuentes/FilsonProLightItalic.otf') format('opentype');
            font-weight: 300;
            font-style: italic;
        }
        
        @font-face {
            font-family: 'Filson Pro';
            src: url('assets/fuentes/FilsonProBook.otf') format('opentype');
            font-weight: 350;
            font-style: normal;
        }
        
        @font-face {
            font-family: 'Filson Pro';
            src: url('assets/fuentes/FilsonProBookItalic.otf') format('opentype');
            font-weight: 350;
            font-style: italic;
        }
        
        @font-face {
            font-family: 'Filson Pro';
            src: url('assets/fuentes/FilsonProMedium.otf') format('opentype');
            font-weight: 500;
            font-style: normal;
        }
        
        @font-face {
            font-family: 'Filson Pro';
            src: url('assets/fuentes/FilsonProMediumItalic.otf') format('opentype');
            font-weight: 500;
            font-style: italic;
        }
        
        @font-face {
            font-family: 'Filson Pro';
            src: url('assets/fuentes/FilsonProBold.otf') format('opentype');
            font-weight: 700;
            font-style: normal;
        }
        
        @font-face {
            font-family: 'Filson Pro';
            src: url('assets/fuentes/FilsonProBoldItalic.otf') format('opentype');
            font-weight: 700;
            font-style: italic;
        }
        
        @font-face {
            font-family: 'Filson Pro';
            src: url('assets/fuentes/FilsonProHeavy.otf') format('opentype');
            font-weight: 800;
            font-style: normal;
        }
        
        @font-face {
            font-family: 'Filson Pro';
            src: url('assets/fuentes/FilsonProHeavyItalic.otf') format('opentype');
            font-weight: 800;
            font-style: italic;
        }
        
        @font-face {
            font-family: 'Filson Pro';
            src: url('assets/fuentes/FilsonProBlack.otf') format('opentype');
            font-weight: 900;
            font-style: normal;
        }
        
        @font-face {
            font-family: 'Filson Pro';
            src: url('assets/fuentes/FilsonProBlackItalic.otf') format('opentype');
            font-weight: 900;
            font-style: italic;
        }
    </style>
    
    <!-- Custom Tailwind Config -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'filson': ['Filson Pro', 'sans-serif'],
                        'sans': ['Filson Pro', 'system-ui', 'sans-serif']
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
    <section class="relative min-h-screen flex items-center justify-center parallax" style="background-image: linear-gradient(rgba(139, 92, 246, 0.7), rgba(109, 40, 217, 0.5)), url('assets/fondo.png');">
        <div class="relative z-10 text-center text-white px-4 sm:px-6 lg:px-8 max-w-4xl mx-auto">
            <h1 class="text-5xl md:text-7xl font-rufina font-bold mb-6 animate-slide-up">
                <?php echo $t['hero']['title']; ?>
            </h1>
            <p class="text-xl md:text-2xl opacity-90 animate-slide-up max-w-3xl mx-auto leading-relaxed" style="animation-delay: 0.2s;">
                <?php echo $t['hero']['subtitle']; ?>
            </p>
        </div>
    </section>

    <!-- Introduction Section Enhanced -->
    <section class="py-20 bg-white relative overflow-hidden">
        <!-- Background decorative elements -->
        <div class="absolute top-0 right-0 w-96 h-96 bg-gradient-to-br from-purple-200 to-blue-100 rounded-full opacity-20 transform translate-x-48 -translate-y-48"></div>
        <div class="absolute bottom-0 left-0 w-64 h-64 bg-gradient-to-tr from-purple-400 to-purple-200 rounded-full opacity-10 transform -translate-x-32 translate-y-32"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <!-- Main Title Section -->
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-6xl font-rufina font-bold text-gray-900 mb-6">
                    <?php echo $t['intro']['title']; ?>
                </h2>
                <div class="w-24 h-1 bg-gradient-to-r from-kasaami-violet to-kasaami-gold mx-auto mb-8"></div>
            </div>

            <!-- Enhanced Content Grid - SIN RECUADRO BLANCO -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center mb-20">
                <!-- Content - SIN RECUADRO -->
                <div class="space-y-8">
                    <p class="text-xl text-gray-700 leading-relaxed">
                        <?php echo $t['intro']['description']; ?>
                    </p>
                </div>
                
                <!-- Enhanced Image Section -->
                <div class="relative">
                    <!-- Marco elegante con degradado limpio -->
                    <div class="bg-gradient-to-br from-kasaami-pearl via-white to-kasaami-light-violet p-6 rounded-3xl shadow-2xl">
                        <!-- Imagen principal -->
                        <div class="relative overflow-hidden rounded-2xl">
                            <img src="assets/fotodestacada.png" 
                                 alt="Kasaami Care & Beauty - Excelencia Médica" 
                                 class="w-full h-auto transform hover:scale-105 transition-transform duration-700">
                            <!-- Overlay sutil para mayor elegancia -->
                            <div class="absolute inset-0 bg-gradient-to-t from-kasaami-violet/10 to-transparent opacity-0 hover:opacity-100 transition-opacity duration-500"></div>
                        </div>
                    </div>
                    
                    <!-- Elementos decorativos minimalistas -->
                    <div class="absolute -bottom-8 -right-8 w-32 h-32 bg-gradient-to-br from-kasaami-violet to-kasaami-dark-violet rounded-full opacity-15 blur-sm"></div>
                    <div class="absolute -top-6 -left-6 w-24 h-24 bg-gradient-to-br from-kasaami-light-violet to-kasaami-violet rounded-full opacity-20 blur-sm"></div>
                </div>
            </div>

            <!-- Experience Highlights -->
            <div class="relative bg-gradient-to-br from-kasaami-violet via-kasaami-dark-violet to-kasaami-violet rounded-3xl p-8 md:p-12 text-white overflow-hidden">
                <!-- Elementos decorativos minimalistas -->
                <div class="absolute top-0 right-0 w-64 h-64 bg-white/5 rounded-full -translate-y-32 translate-x-32"></div>
                <div class="absolute bottom-0 left-0 w-48 h-48 bg-kasaami-light-violet/10 rounded-full translate-y-24 -translate-x-24"></div>
                
                <div class="relative z-10 grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                    <div>
                        <h3 class="text-4xl font-rufina font-bold mb-8"><?php echo $t['commitment']['title']; ?></h3>
                        <p class="text-lg leading-relaxed">
                            <?php echo $t['commitment']['description']; ?>
                        </p>
                    </div>
                    <div class="text-center">
                        <div class="bg-white/15 rounded-3xl p-8 backdrop-blur-lg border border-white/20 shadow-2xl">
                            <h4 class="text-3xl font-rufina font-bold mb-6">ECUADOR el Corazón de los Andes</h4>
                            <p class="text-xl opacity-95 mb-8 leading-relaxed">Combina tu transformación médica con la magia natural y cultural de Ecuador en un ambiente de lujo exclusivo</p>
                            <div class="grid grid-cols-2 gap-6">
                                <div class="text-center bg-white/10 rounded-2xl p-4 backdrop-blur-sm">
                                    <div class="text-4xl font-bold text-kasaami-light-violet mb-2">2,850m</div>
                                    <div class="text-sm opacity-90 font-medium">Altitud de Quito</div>
                                </div>
                                <div class="text-center bg-white/10 rounded-2xl p-4 backdrop-blur-sm">
                                    <div class="text-4xl font-bold text-kasaami-light-violet mb-2">365</div>
                                    <div class="text-sm opacity-90 font-medium">Días de primavera</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission Section REDISEÑADA - Banner Style -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Banner unificado sin tarjetas -->
            <div class="bg-white rounded-3xl shadow-lg p-8 lg:p-16">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <!-- Image Section - Left Side -->
                    <div class="order-2 lg:order-1">
                        <img src="assets/doctorescomp.png" 
                             alt="Equipo médico Kasaami" 
                             class="w-full h-auto">
                    </div>
                    
                    <!-- Text Content - Right Side -->
                    <div class="order-1 lg:order-2 space-y-6">
                        <h2 class="text-3xl lg:text-5xl font-rufina font-bold text-gray-900 leading-tight">
                            <?php echo $t['mission']['title']; ?>
                        </h2>
                        
                        <h3 class="text-xl lg:text-2xl font-rufina font-bold text-kasaami-violet">
                            <?php echo $t['mission']['subtitle']; ?>
                        </h3>
                        
                        <div class="space-y-4 text-gray-700">
                            <p class="text-lg leading-relaxed">
                                <?php echo $t['mission']['intro']; ?>
                            </p>
                            
                            <p class="text-lg leading-relaxed">
                                <?php echo $t['mission']['vision']; ?>
                            </p>
                            
                            <p class="text-lg leading-relaxed">
                                <?php echo $t['mission']['commitment']; ?>
                            </p>
                        </div>
                    </div>
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