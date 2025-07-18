<?php
// index.php - Kasaami Care & Beauty (Root)
$pageTitle = "Kasaami Care & Beauty - Your transformation begins in the heart of the Andes";
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
            'title' => 'Tu transformación comienza en el corazón de los Andes',
            'subtitle' => 'Experimenta la excelencia médica en Ecuador con nuestros especialistas de clase mundial',
            'cta' => 'Descubre más'
        ],
        'experience' => [
            'title' => 'Una experiencia única de transformación',
            'description' => 'Combinamos la más alta calidad médica con la calidez humana ecuatoriana, en el entorno natural más privilegiado de Sudamérica.',
            'feature1_title' => 'Atención Personalizada',
            'feature1_desc' => 'Cuidado individual desde la consulta hasta la recuperación completa.',
            'feature2_title' => 'Excelencia Médica',
            'feature2_desc' => 'Profesionales certificados con los más altos estándares internacionales.',
            'feature3_title' => 'Experiencia Integral',
            'feature3_desc' => 'Combinamos medicina de primer nivel con turismo y bienestar en Ecuador.'
        ],
        'procedures' => [
            'title' => 'Nuestros Procedimientos',
            'subtitle' => 'Especialidades médicas de clase mundial',
            'face' => [
                'title' => 'FACE',
                'subtitle' => 'Procedimientos Faciales',
                'description' => 'Rinoplastia, lifting facial, blefaroplastia y rejuvenecimiento facial con las técnicas más avanzadas.'
            ],
            'body' => [
                'title' => 'BODY',
                'subtitle' => 'Cirugía Corporal',
                'description' => 'Liposucción, abdominoplastia, lifting corporal y contorno con resultados naturales.'
            ],
            'breast' => [
                'title' => 'BREAST',
                'subtitle' => 'Cirugía de Senos',
                'description' => 'Aumento, reducción, lifting y reconstrucción mamaria con implantes de última generación.'
            ],
            'hair' => [
                'title' => 'HAIR',
                'subtitle' => 'Tratamiento Capilar',
                'description' => 'Trasplante capilar FUE, tratamientos de regeneración y soluciones innovadoras.'
            ]
        ],
        'stats' => [
            'title' => 'Nuestros Números',
            'patients' => 'Pacientes Transformados',
            'doctors' => 'Médicos Especialistas',
            'countries' => 'Países de Origen',
            'experience' => 'Años de Experiencia'
        ],
        'testimonials' => [
            'title' => 'Testimonios que transforman',
            'subtitle' => 'Historias reales de pacientes que encontraron su mejor versión',
            'testimonial1' => [
                'text' => 'La experiencia completa fue excepcional. Desde la primera consulta hasta la recuperación, me sentí cuidada y acompañada. Los resultados superaron mis expectativas.',
                'name' => 'María González',
                'procedure' => 'Rinoplastia'
            ],
            'testimonial2' => [
                'text' => 'No solo obtuve los resultados que buscaba, sino que pude conocer la belleza de Ecuador. El equipo médico es de primer nivel y el trato humano incomparable.',
                'name' => 'Jessica Thompson',
                'procedure' => 'Aumento de Senos'
            ],
            'testimonial3' => [
                'text' => 'Decidir operarme en Ecuador fue la mejor decisión. La calidad médica es excepcional y los costos son muy accesibles comparado con Estados Unidos.',
                'name' => 'Carlos Mendoza',
                'procedure' => 'Liposucción'
            ]
        ],
        'cta' => [
            'title' => '¿Listo para tu transformación?',
            'subtitle' => 'Comienza tu viaje hacia una nueva versión de ti mismo en el corazón de los Andes',
            'button1' => 'Agendar Consulta',
            'button2' => 'Conocer Servicios'
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
            'title' => 'Your transformation begins in the heart of the Andes',
            'subtitle' => 'Experience medical excellence in Ecuador with our world-class specialists',
            'cta' => 'Discover more'
        ],
        'experience' => [
            'title' => 'A unique transformation experience',
            'description' => 'We combine the highest medical quality with Ecuadorian human warmth, in the most privileged natural environment in South America.',
            'feature1_title' => 'Personalized Care',
            'feature1_desc' => 'Individual care from consultation to complete recovery.',
            'feature2_title' => 'Medical Excellence',
            'feature2_desc' => 'Certified professionals with the highest international standards.',
            'feature3_title' => 'Comprehensive Experience',
            'feature3_desc' => 'We combine first-class medicine with tourism and wellness in Ecuador.'
        ],
        'procedures' => [
            'title' => 'Our Procedures',
            'subtitle' => 'World-class medical specialties',
            'face' => [
                'title' => 'FACE',
                'subtitle' => 'Facial Procedures',
                'description' => 'Rhinoplasty, facelifts, blepharoplasty and facial rejuvenation with the most advanced techniques.'
            ],
            'body' => [
                'title' => 'BODY',
                'subtitle' => 'Body Surgery',
                'description' => 'Liposuction, abdominoplasty, body lifting and contouring with natural results.'
            ],
            'breast' => [
                'title' => 'BREAST', 
                'subtitle' => 'Breast Surgery',
                'description' => 'Augmentation, reduction, lifting and reconstruction with latest generation implants.'
            ],
            'hair' => [
                'title' => 'HAIR',
                'subtitle' => 'Hair Treatment',
                'description' => 'FUE hair transplant, regeneration treatments and innovative solutions.'
            ]
        ],
        'stats' => [
            'title' => 'Our Numbers',
            'patients' => 'Transformed Patients',
            'doctors' => 'Specialist Doctors',
            'countries' => 'Countries of Origin',
            'experience' => 'Years of Experience'
        ],
        'testimonials' => [
            'title' => 'Transforming testimonials',
            'subtitle' => 'Real stories from patients who found their best version',
            'testimonial1' => [
                'text' => 'The complete experience was exceptional. From the first consultation to recovery, I felt cared for and accompanied. The results exceeded my expectations.',
                'name' => 'María González',
                'procedure' => 'Rhinoplasty'
            ],
            'testimonial2' => [
                'text' => 'Not only did I get the results I was looking for, but I was able to discover the beauty of Ecuador. The medical team is first class and the human treatment incomparable.',
                'name' => 'Jessica Thompson',
                'procedure' => 'Breast Augmentation'
            ],
            'testimonial3' => [
                'text' => 'Deciding to have surgery in Ecuador was the best decision. The medical quality is exceptional and the costs are very affordable compared to the United States.',
                'name' => 'Carlos Mendoza',
                'procedure' => 'Liposuction'
            ]
        ],
        'cta' => [
            'title' => 'Ready for your transformation?',
            'subtitle' => 'Start your journey to a new version of yourself in the heart of the Andes',
            'button1' => 'Schedule Consultation',
            'button2' => 'Learn About Services'
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
                        'float': 'float 3s ease-in-out infinite',
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
                        float: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-10px)' }
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
        /* Video styling */
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

        /* Procedures section - Full Width */
        .procedures-container {
            display: flex;
            height: 100vh;
            width: 100vw;
            margin: 0;
            padding: 0;
            gap: 0;
        }

        .procedure-card {
            position: relative;
            overflow: hidden;
            background-size: cover;
            background-position: center;
            transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
            filter: grayscale(100%);
            flex: 1;
            cursor: pointer;
            min-height: 100vh;
        }

        .procedure-card:hover {
            filter: grayscale(0%);
            flex: 2.5; /* Se expande más */
        }

        /* Cuando uno hace hover, los otros se achican */
        .procedures-container:hover .procedure-card:not(:hover) {
            flex: 0.6;
            filter: grayscale(100%) brightness(0.7);
        }

        .procedure-card::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(45deg, rgba(0,0,0,0.8), rgba(0,0,0,0.4));
            transition: all 0.8s ease;
            z-index: 1;
        }

        .procedure-card:hover::before {
            background: linear-gradient(45deg, rgba(139, 92, 246, 0.8), rgba(109, 40, 217, 0.6));
        }

        .procedure-content {
            position: relative;
            z-index: 2;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 3rem 2rem;
            color: white;
        }

        .procedure-text {
            writing-mode: vertical-rl;
            text-orientation: mixed;
            font-size: 2.5rem;
            font-weight: 700;
            letter-spacing: 0.3em;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.8);
            margin-bottom: auto;
            transform: translateY(2rem);
        }

        .procedure-info {
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.6s ease;
            margin-top: auto;
            max-width: 300px;
        }

        .procedure-card:hover .procedure-info {
            opacity: 1;
            transform: translateY(0);
        }

        /* Button styling */
        .schedule-button {
            background: rgba(31, 41, 55, 0.95);
            backdrop-filter: blur(10px);
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .procedures-container {
                flex-direction: column;
                height: auto;
                width: 100%;
            }
            
            .procedure-card {
                height: 350px;
                flex: none !important;
                min-height: auto;
            }
            
            .procedure-text {
                writing-mode: horizontal-tb;
                text-orientation: initial;
                font-size: 2rem;
                transform: none;
            }
            
            .procedure-info {
                opacity: 1;
                transform: none;
            }
            
            .procedure-content {
                padding: 2rem;
            }
        }

        /* Features hover effects */
        .feature-card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .feature-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 25px 50px -12px rgba(139, 92, 246, 0.25);
        }

        /* Testimonials */
        .testimonial-card {
            transition: all 0.3s ease;
        }

        .testimonial-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }

        /* Counter animation */
        .counter-number {
            font-feature-settings: 'tnum';
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
                poster="https://ecuadorexplorer.com/wp-content/uploads/2023/08/blog1_vista_hermosa_centro_quito_historico.jpg"
            >
                <source src="https://shawellness.com/wp-content/uploads/video/2025/04/sha-home-desktop.mp4" type="video/mp4">
                <!-- Fallback image -->
                <img src="https://ecuadorexplorer.com/wp-content/uploads/2023/08/blog1_vista_hermosa_centro_quito_historico.jpg" alt="Quito - Ecuador" class="w-full h-full object-cover">
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
            
            <!-- Features Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-16">
                <div class="text-center p-6 rounded-xl feature-card">
                    <div class="w-16 h-16 bg-gradient-to-br from-kasaami-violet to-kasaami-dark-violet rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-rufina font-bold text-gray-900 mb-3"><?php echo $t['experience']['feature1_title']; ?></h3>
                    <p class="text-gray-600"><?php echo $t['experience']['feature1_desc']; ?></p>
                </div>
                
                <div class="text-center p-6 rounded-xl feature-card">
                    <div class="w-16 h-16 bg-gradient-to-br from-kasaami-violet to-kasaami-dark-violet rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-rufina font-bold text-gray-900 mb-3"><?php echo $t['experience']['feature2_title']; ?></h3>
                    <p class="text-gray-600"><?php echo $t['experience']['feature2_desc']; ?></p>
                </div>
                
                <div class="text-center p-6 rounded-xl feature-card">
                    <div class="w-16 h-16 bg-gradient-to-br from-kasaami-violet to-kasaami-dark-violet rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M14 6l-3.75 5 2.85 3.8-1.6 1.2C9.81 13.75 7 10 7 10l-6 8h22l-9-12z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-rufina font-bold text-gray-900 mb-3"><?php echo $t['experience']['feature3_title']; ?></h3>
                    <p class="text-gray-600"><?php echo $t['experience']['feature3_desc']; ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Procedures Gallery - Black & White with Color Hover -->
    <section class="bg-black">
        <div class="w-full">
            <div class="text-center py-16 px-4">
                <h2 class="text-4xl md:text-5xl font-rufina font-bold text-white mb-6">
                    <?php echo $t['procedures']['title']; ?>
                </h2>
                <p class="text-xl text-gray-300">
                    <?php echo $t['procedures']['subtitle']; ?>
                </p>
            </div>
            
            <div class="procedures-container">
                <!-- Face Procedures -->
                <a href="procedimientos" class="procedure-card" style="background-image: url('https://www.lajollaskin.com/wp-content/themes/lajollaskin_com/static/images/specialties-face-2.jpg');">
                    <div class="procedure-content">
                        <div class="procedure-text">
                            <?php echo $t['procedures']['face']['title']; ?>
                        </div>
                        <div class="procedure-info">
                            <h3 class="text-xl font-semibold mb-3"><?php echo $t['procedures']['face']['subtitle']; ?></h3>
                            <p class="text-sm opacity-90 leading-relaxed"><?php echo $t['procedures']['face']['description']; ?></p>
                        </div>
                    </div>
                </a>

                <!-- Body Procedures -->
                <a href="procedimientos" class="procedure-card" style="background-image: url('https://www.lajollaskin.com/wp-content/themes/lajollaskin_com/static/images/specialties-body.jpg');">
                    <div class="procedure-content">
                        <div class="procedure-text">
                            <?php echo $t['procedures']['body']['title']; ?>
                        </div>
                        <div class="procedure-info">
                            <h3 class="text-xl font-semibold mb-3"><?php echo $t['procedures']['body']['subtitle']; ?></h3>
                            <p class="text-sm opacity-90 leading-relaxed"><?php echo $t['procedures']['body']['description']; ?></p>
                        </div>
                    </div>
                </a>

                <!-- Breast Procedures -->
                <a href="procedimientos" class="procedure-card" style="background-image: url('https://www.lajollaskin.com/wp-content/themes/lajollaskin_com/static/images/specialties-breasts-2.jpg');">
                    <div class="procedure-content">
                        <div class="procedure-text">
                            <?php echo $t['procedures']['breast']['title']; ?>
                        </div>
                        <div class="procedure-info">
                            <h3 class="text-xl font-semibold mb-3"><?php echo $t['procedures']['breast']['subtitle']; ?></h3>
                            <p class="text-sm opacity-90 leading-relaxed"><?php echo $t['procedures']['breast']['description']; ?></p>
                        </div>
                    </div>
                </a>

                <!-- Hair Procedures -->
                <a href="procedimientos" class="procedure-card" style="background-image: url('https://www.lajollaskin.com/wp-content/themes/lajollaskin_com/static/images/specialties-hair-removal.jpg');">
                    <div class="procedure-content">
                        <div class="procedure-text">
                            <?php echo $t['procedures']['hair']['title']; ?>
                        </div>
                        <div class="procedure-info">
                            <h3 class="text-xl font-semibold mb-3"><?php echo $t['procedures']['hair']['subtitle']; ?></h3>
                            <p class="text-sm opacity-90 leading-relaxed"><?php echo $t['procedures']['hair']['description']; ?></p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Schedule Appointment Button -->
            <div class="text-center py-16 bg-gray-900">
                <a href="contactanos" class="inline-flex items-center space-x-3 border-2 border-white text-white px-8 py-4 rounded-lg font-medium text-lg hover:bg-white hover:text-gray-900 transition-all duration-300 transform hover:scale-105">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a1 1 0 011-1h6a1 1 0 011 1v4m-6 0v1m0-1h4m-4 0H7a3 3 0 00-3 3v8a3 3 0 003 3h10a3 3 0 003-3V10a3 3 0 00-3-3h-2.5"></path>
                    </svg>
                    <span><?php echo $currentLang === 'es' ? 'AGENDA UNA CITA' : 'SCHEDULE AN APPOINTMENT'; ?></span>
                </a>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-20 bg-kasaami-pearl">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-rufina font-bold text-gray-900 mb-6">
                    <?php echo $t['stats']['title']; ?>
                </h2>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="text-center animate-counter">
                    <div class="text-4xl md:text-5xl font-bold text-kasaami-violet mb-2 counter-number">
                        500+
                    </div>
                    <div class="text-gray-600 font-medium">
                        <?php echo $t['stats']['patients']; ?>
                    </div>
                </div>
                <div class="text-center animate-counter">
                    <div class="text-4xl md:text-5xl font-bold text-kasaami-violet mb-2 counter-number">
                        50+
                    </div>
                    <div class="text-gray-600 font-medium">
                        <?php echo $t['stats']['doctors']; ?>
                    </div>
                </div>
                <div class="text-center animate-counter">
                    <div class="text-4xl md:text-5xl font-bold text-kasaami-violet mb-2 counter-number">
                        15+
                    </div>
                    <div class="text-gray-600 font-medium">
                        <?php echo $t['stats']['countries']; ?>
                    </div>
                </div>
                <div class="text-center animate-counter">
                    <div class="text-4xl md:text-5xl font-bold text-kasaami-violet mb-2 counter-number">
                        6
                    </div>
                    <div class="text-gray-600 font-medium">
                        <?php echo $t['stats']['experience']; ?>
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
            
            <!-- Testimonials Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="testimonial-card bg-white p-8 rounded-2xl shadow-lg border border-gray-100">
                    <div class="flex items-center mb-4">
                        <?php for($i = 0; $i < 5; $i++): ?>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <?php endfor; ?>
                    </div>
                    <p class="text-gray-600 mb-6 italic leading-relaxed">
                        "<?php echo $t['testimonials']['testimonial1']['text']; ?>"
                    </p>
                    <div class="border-t pt-4">
                        <p class="font-semibold text-gray-900"><?php echo $t['testimonials']['testimonial1']['name']; ?></p>
                        <p class="text-kasaami-violet text-sm"><?php echo $t['testimonials']['testimonial1']['procedure']; ?></p>
                    </div>
                </div>

                <div class="testimonial-card bg-white p-8 rounded-2xl shadow-lg border border-gray-100">
                    <div class="flex items-center mb-4">
                        <?php for($i = 0; $i < 5; $i++): ?>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <?php endfor; ?>
                    </div>
                    <p class="text-gray-600 mb-6 italic leading-relaxed">
                        "<?php echo $t['testimonials']['testimonial2']['text']; ?>"
                    </p>
                    <div class="border-t pt-4">
                        <p class="font-semibold text-gray-900"><?php echo $t['testimonials']['testimonial2']['name']; ?></p>
                        <p class="text-kasaami-violet text-sm"><?php echo $t['testimonials']['testimonial2']['procedure']; ?></p>
                    </div>
                </div>

                <div class="testimonial-card bg-white p-8 rounded-2xl shadow-lg border border-gray-100">
                    <div class="flex items-center mb-4">
                        <?php for($i = 0; $i < 5; $i++): ?>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <?php endfor; ?>
                    </div>
                    <p class="text-gray-600 mb-6 italic leading-relaxed">
                        "<?php echo $t['testimonials']['testimonial3']['text']; ?>"
                    </p>
                    <div class="border-t pt-4">
                        <p class="font-semibold text-gray-900"><?php echo $t['testimonials']['testimonial3']['name']; ?></p>
                        <p class="text-kasaami-violet text-sm"><?php echo $t['testimonials']['testimonial3']['procedure']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="py-20 bg-gradient-to-r from-kasaami-violet to-kasaami-dark-violet text-white">
        <div class="max-w-4xl mx-auto text-center px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl md:text-5xl font-rufina font-bold mb-6">
                <?php echo $t['cta']['title']; ?>
            </h2>
            <p class="text-xl mb-8 opacity-90">
                <?php echo $t['cta']['subtitle']; ?>
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="contactanos" class="bg-white text-kasaami-violet px-8 py-4 rounded-full font-semibold hover:bg-gray-100 transition-colors duration-200 transform hover:scale-105">
                    <?php echo $t['cta']['button1']; ?>
                </a>
                <a href="servicios" class="border-2 border-white text-white px-8 py-4 rounded-full font-semibold hover:bg-white hover:text-kasaami-violet transition-all duration-200 transform hover:scale-105">
                    <?php echo $t['cta']['button2']; ?>
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

        // Remove parallax effect that was covering the content
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
        document.querySelectorAll('.feature-card, .testimonial-card').forEach(el => {
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

        const statsSection = document.querySelector('.py-20.bg-kasaami-pearl');
        if (statsSection) {
            counterObserver.observe(statsSection);
        }
    </script>
</body>
</html>