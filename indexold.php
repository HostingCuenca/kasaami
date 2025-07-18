<?php
// index.php - Kasaami Care & Beauty
$pageTitle = "Kasaami Care & Beauty - Your transformation begins in the heart of the Andes";
$currentLang = $_GET['lang'] ?? 'es';

// Language content
$content = [
    'es' => [
        'nav' => [
            'about' => 'Sobre Nosotros',
            'services' => 'Servicios', 
            'procedures' => 'Procedimientos',
            'partners' => 'Aliados',
            'contact' => 'Contacto',
            'schedule' => 'Agendar Consulta'
        ],
        'hero' => [
            'title' => 'Tu transformación comienza en el corazón de los Andes',
            'subtitle' => 'Experimenta la excelencia médica en Ecuador con nuestros especialistas de clase mundial',
            'cta' => 'Descubre más'
        ],
        'experience' => [
            'title' => 'Una experiencia única de transformación',
            'description' => 'Combinamos la más alta calidad médica con la calidez humana ecuatoriana, en el entorno natural más privilegiado de Sudamérica.'
        ],
        'procedures' => [
            'title' => 'Nuestros Procedimientos',
            'body' => 'Corporal',
            'face' => 'Facial', 
            'hair' => 'Capilar',
            'obesity' => 'Obesidad'
        ],
        'testimonials' => [
            'title' => 'Testimonios que transforman',
            'subtitle' => 'Historias reales de pacientes que encontraron su mejor versión'
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
            'procedures' => 'Procedures', 
            'partners' => 'Partners',
            'contact' => 'Contact',
            'schedule' => 'Schedule Consultation'
        ],
        'hero' => [
            'title' => 'Your transformation begins in the heart of the Andes',
            'subtitle' => 'Experience medical excellence in Ecuador with our world-class specialists',
            'cta' => 'Discover more'
        ],
        'experience' => [
            'title' => 'A unique transformation experience',
            'description' => 'We combine the highest medical quality with Ecuadorian human warmth, in the most privileged natural environment in South America.'
        ],
        'procedures' => [
            'title' => 'Our Procedures',
            'body' => 'Body',
            'face' => 'Face',
            'hair' => 'Hair',
            'obesity' => 'Obesity'
        ],
        'testimonials' => [
            'title' => 'Transforming testimonials',
            'subtitle' => 'Real stories from patients who found their best version'
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
    <meta name="description" content="<?php echo $t['hero']['subtitle']; ?>">
    <meta name="keywords" content="cirugía estética, turismo médico, Ecuador, Quito, transformación, belleza">
    <meta name="author" content="Kasaami Care & Beauty">
    
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="<?php echo $pageTitle; ?>">
    <meta property="og:description" content="<?php echo $t['hero']['subtitle']; ?>">
    <meta property="og:image" content="assets/og-image.jpg">
    <meta property="og:url" content="https://kasaami.com">
    <meta property="og:type" content="website">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Rufina:wght@400;700&display=swap" rel="stylesheet">
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="assets/favicon.png">
    
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
                        'float': 'float 3s ease-in-out infinite'
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
                        float: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-10px)' }
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
        
        /* Video overlay removed - no gradient on hero */
        .video-container {
            position: relative;
            overflow: hidden;
        }
        
        .video-container video {
            width: 100%;
            height: 100vh;
            object-fit: cover;
        }
        
        /* Scroll indicator */
        .scroll-indicator {
            animation: bounce 2s infinite;
        }
        
        @keyframes bounce {
            0%, 20%, 53%, 80%, 100% { transform: translate3d(0,0,0); }
            40%, 43% { transform: translate3d(0,-8px,0); }
            70% { transform: translate3d(0,-4px,0); }
            90% { transform: translate3d(0,-2px,0); }
        }
    </style>
</head>

<body class="font-poppins bg-white overflow-x-hidden">
    
    <!-- Navigation -->
    <?php include 'includes/Navbar.php'; ?>

    <!-- Hero Section with Clean Video Background -->
    <section class="relative h-screen flex items-end justify-center overflow-hidden">
        <!-- Video Background -->
        <div class="absolute inset-0 w-full h-full video-container">
            <video 
                autoplay 
                muted 
                loop 
                playsinline 
                class="w-full h-full object-cover"
                poster="https://images.unsplash.com/photo-1559757148-5c350d0d3c56?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80"
            >
                <source src="https://shawellness.com/wp-content/uploads/video/2025/04/sha-home-desktop.mp4" type="video/mp4">
                <!-- Fallback image -->
                <img src="https://images.unsplash.com/photo-1559757148-5c350d0d3c56?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80" alt="Kasaami Background" class="w-full h-full object-cover">
            </video>
        </div>
        
        <!-- Scroll Indicator - Positioned at bottom -->
        <div class="relative z-10 mb-8 scroll-indicator">
            <div class="w-6 h-10 border-2 border-white rounded-full flex justify-center bg-white/10 backdrop-blur-sm">
                <div class="w-1 h-3 bg-white rounded-full mt-2 animate-pulse"></div>
            </div>
        </div>
    </section>

    <!-- Experience Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-rufina font-bold text-gray-900 mb-6 animate-fade-in">
                    <?php echo $t['experience']['title']; ?>
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed animate-slide-up">
                    <?php echo $t['experience']['description']; ?>
                </p>
            </div>
        </div>
    </section>

    <!-- Procedures Gallery -->
    <section id="procedures" class="py-20 bg-kasaami-pearl">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-rufina font-bold text-gray-900 mb-6">
                    <?php echo $t['procedures']['title']; ?>
                </h2>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Body Procedures -->
                <div class="group hover-lift cursor-pointer">
                    <div class="relative overflow-hidden rounded-2xl h-80 bg-gradient-to-br from-purple-500 to-pink-500">
                        <img src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Body Procedures" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                        <div class="absolute bottom-6 left-6 text-white">
                            <h3 class="text-2xl font-rufina font-bold mb-2"><?php echo $t['procedures']['body']; ?></h3>
                        </div>
                    </div>
                </div>

                <!-- Face Procedures -->
                <div class="group hover-lift cursor-pointer">
                    <div class="relative overflow-hidden rounded-2xl h-80 bg-gradient-to-br from-blue-500 to-purple-500">
                        <img src="https://images.unsplash.com/photo-1616391182219-e080b4d1043a?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Face Procedures" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                        <div class="absolute bottom-6 left-6 text-white">
                            <h3 class="text-2xl font-rufina font-bold mb-2"><?php echo $t['procedures']['face']; ?></h3>
                        </div>
                    </div>
                </div>

                <!-- Hair Procedures -->
                <div class="group hover-lift cursor-pointer">
                    <div class="relative overflow-hidden rounded-2xl h-80 bg-gradient-to-br from-green-500 to-blue-500">
                        <img src="https://images.unsplash.com/photo-1560066984-138dadb4c035?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Hair Procedures" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                        <div class="absolute bottom-6 left-6 text-white">
                            <h3 class="text-2xl font-rufina font-bold mb-2"><?php echo $t['procedures']['hair']; ?></h3>
                        </div>
                    </div>
                </div>

                <!-- Obesity Procedures -->
                <div class="group hover-lift cursor-pointer">
                    <div class="relative overflow-hidden rounded-2xl h-80 bg-gradient-to-br from-orange-500 to-red-500">
                        <img src="https://images.unsplash.com/photo-1576091160399-112ba8d25d1f?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Obesity Procedures" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                        <div class="absolute bottom-6 left-6 text-white">
                            <h3 class="text-2xl font-rufina font-bold mb-2"><?php echo $t['procedures']['obesity']; ?></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-rufina font-bold text-gray-900 mb-6">
                    <?php echo $t['testimonials']['title']; ?>
                </h2>
                <p class="text-xl text-gray-600">
                    <?php echo $t['testimonials']['subtitle']; ?>
                </p>
            </div>
            
            <!-- Testimonials Carousel placeholder -->
            <div class="flex justify-center">
                <div class="w-16 h-1 bg-kasaami-violet rounded-full"></div>
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

        // Video fallback
        const video = document.querySelector('video');
        if (video) {
            video.addEventListener('error', function() {
                const img = document.querySelector('video + img');
                if (img) {
                    img.style.display = 'block';
                }
            });
        }

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
    </script>
</body>
</html>