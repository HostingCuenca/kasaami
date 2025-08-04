<?php
// pages/servicios.php
require_once('includes/init-language.php');
$pageTitle = setPageTitle(
    "Servicios - Kasaami Care & Beauty",
    "Services - Kasaami Care & Beauty"
);

// Language content
$content = [
    'es' => [
        'nav' => [
            'about' => 'Sobre Nosotros',
            'services' => 'Servicios', 
            'procedures' => 'Procedimientos',
            'doctors' => 'Médicos Aliados'
        ],
        'hero' => [
            'title' => 'Experiencias Integrales de Cuidado',
            'subtitle' => 'Más que una cirugía, un viaje único de transformación y bienestar en el corazón vibrante de los Andes.'
        ],
        'services_carousel' => [
            [
                'id' => 'servicio-completo',
                'badge' => 'Todo incluido garantizado',
                'title' => 'Servicio Todo Incluido en Turismo Médico Ecuador',
                'subtitle' => 'Experiencias completas diseñadas',
                'description' => 'Diseñamos experiencias completas que integran cirugías plásticas y estéticas, estancias premium, traslados seguros y cuidado pre y postoperatorio personalizado.',
                'features' => [
                    'Cirugías especializadas',
                    'Estancias premium',
                    'Traslados seguros',
                    'Cuidado personalizado'
                ],
                'image' => 'assets/tarjetas/service.png',
                'gradient' => 'from-blue-500 to-purple-600',
                'icon' => 'medical'
            ],
            [
                'id' => 'excelencia-medica',
                'badge' => 'Más de 500 cirugías exitosas',
                'title' => 'Excelencia Médica en el Corazón de los Andes',
                'subtitle' => 'Cirugías de clase mundial',
                'description' => 'Garantizamos calidad y seguridad con los mejores profesionales médicos certificados, ofreciendo tratamientos de primer nivel en un entorno único.',
                'features' => [
                    'Cirujanos certificados',
                    'Tecnología avanzada',
                    'Protocolos internacionales',
                    'Seguimiento personalizado'
                ],
                'image' => 'assets/tarjetas/quirofano.png',
                'gradient' => 'from-purple-500 to-pink-600',
                'icon' => 'star'
            ],
            [
                'id' => 'experiencia-integral',
                'badge' => 'Atención 24/7 garantizada',
                'title' => 'Estadía Premium y Recuperación Confortable',
                'subtitle' => 'Cuidado personalizado 24/7',
                'description' => 'Disfruta de alojamientos de lujo y bienestar total, con asistencia dedicada para una recuperación óptima y confortable.',
                'features' => [
                    'Coordinador personal',
                    'Traslados VIP',
                    'Alojamiento premium',
                    'Soporte multiidioma'
                ],
                'image' => 'assets/estadia.jpg',
                'gradient' => 'from-indigo-500 to-purple-600',
                'icon' => 'hotel'
            ],
            [
                'id' => 'acompanamiento-360',
                'badge' => 'Soporte integral',
                'title' => 'Acompañamiento Integral 360°',
                'subtitle' => 'Soporte en cada etapa',
                'description' => 'Brindamos soporte personalizado en cada etapa de tu viaje médico, asegurando atención cercana y soluciones a medida.',
                'features' => [
                    'Asistencia 24/7',
                    'Coordinación médica',
                    'Seguimiento continuo',
                    'Apoyo emocional'
                ],
                'image' => 'assets/tarjetas/reunionvirtua.png',
                'gradient' => 'from-teal-500 to-blue-600',
                'icon' => 'heart'
            ],
            [
                'id' => 'turismo-bienestar',
                'badge' => 'Ecuador te espera',
                'title' => 'Turismo Recreativo y Bienestar Complementario',
                'subtitle' => 'Descubre Ecuador mientras te recuperas',
                'description' => 'Ofrecemos actividades turísticas y recreativas exclusivas para complementar tu proceso de transformación y enriquecer tu experiencia en Ecuador.',
                'features' => [
                    'Tours personalizados',
                    'Gastronomía ecuatoriana',
                    'Spa y wellness',
                    'Actividades culturales'
                ],
                'image' => 'assets/tarjetas/experiencia.png',
                'gradient' => 'from-green-500 to-teal-600',
                'icon' => 'tourism'
            ]
        ],
        'journey_steps' => [
            [
                'step' => '1',
                'title' => 'Consulta Inicial',
                'description' => 'Videollamada para conocer tus necesidades. KASAAMI Care & Beauty te guía.',
                'icon' => 'video'
            ],
            [
                'step' => '2',
                'title' => 'Evaluación Médica',
                'description' => 'Nuestro equipo médico revisa tu caso. Recibe el mejor consejo.',
                'icon' => 'medical'
            ],
            [
                'step' => '3',
                'title' => 'Propuesta de Plan',
                'description' => 'Cotización todo incluido presentada por KASAAMI Care & Beauty. Sin sorpresas.',
                'icon' => 'plan'
            ],
            [
                'step' => '4',
                'title' => 'Agenda y Reservas',
                'description' => 'Confirmamos fechas y te preparamos tu viaje. Kasaami gestiona todo.',
                'icon' => 'calendar'
            ],
            [
                'step' => '5',
                'title' => 'Bienvenido en Ecuador',
                'description' => 'Te recibimos y coordinamos perfectamente tu alojamiento. Tu llegada es tranquila.',
                'icon' => 'welcome'
            ],
            [
                'step' => '6',
                'title' => 'Procedimiento',
                'description' => 'Realizas tu cirugía con seguimiento constante. Médico y clínica cuidan de ti.',
                'icon' => 'surgery'
            ],
            [
                'step' => '7',
                'title' => 'Postoperatorio y Recuperación',
                'description' => 'Supervisión médica y bienestar emocional. KASAAMI Care & Beauty, tu médico te guían.',
                'icon' => 'recovery'
            ],
            [
                'step' => '8',
                'title' => 'Cierre y Regreso',
                'description' => 'Último control y recomendaciones. Te despedimos con gratitud.',
                'icon' => 'departure'
            ]
        ],
        'why_kasaami' => [
            'title' => '¿Por Qué Elegir KASAAMI Care & Beauty?',
            'description' => 'En KASAAMI Care & Beauty, te ofrecemos la combinación perfecta de excelencia médica, atención personalizada y un entorno natural único en Ecuador para tu transformación integral.',
            'subtitle' => 'Confía en nuestro equipo de especialistas certificados y vive una experiencia completa de turismo médico con estancias premium y cuidado total. No esperes más para comenzar tu cambio: agenda hoy tu asesoría inicial gratuita y da el primer paso hacia la mejor versión de ti mismo.',
            'question' => '¿Estás listo para transformar tu vida?',
            'final_text' => 'Empieza tu viaje de salud, belleza y bienestar con Kasaami.',
            'button' => 'Agendar Asesoría Gratuita'
        ],
        'sections' => [
            'services_title' => 'Nuestros Servicios Integrales',
            'services_subtitle' => 'Selecciona un servicio para conocer más detalles',
            'journey_title' => 'Tu Viaje de Transformación, Paso a Paso',
            'journey_subtitle' => 'Conoce el proceso completo que vivirás con nosotros',
            'cta_title' => 'Comienza Tu Transformación Hoy',
            'cta_subtitle' => 'Agenda tu consulta virtual gratuita y descubre cómo podemos hacer realidad la mejor versión de ti mismo',
            'cta_button_details' => 'Conocer Más Detalles',
            'cta_button_procedures' => 'Ver Procedimientos'
        ]
    ],
    'en' => [
        'nav' => [
            'about' => 'About Us',
            'services' => 'Services',
            'procedures' => 'Procedures',
            'doctors' => 'Allied Doctors'
        ],
        'hero' => [
            'title' => 'Comprehensive Care Experiences',
            'subtitle' => 'More than surgery, a unique journey of transformation and wellness in the vibrant heart of the Andes.'
        ],
        'services_carousel' => [
            [
                'id' => 'complete-service',
                'badge' => 'All-inclusive guaranteed',
                'title' => 'Complete All-Inclusive Medical Tourism Service in Ecuador',
                'subtitle' => 'Complete experiences designed',
                'description' => 'We design complete experiences that integrate plastic and aesthetic surgeries, premium stays, safe transfers and personalized pre and postoperative care.',
                'features' => [
                    'Specialized surgeries',
                    'Premium stays',
                    'Safe transfers',
                    'Personalized care'
                ],
                'image' => 'assets/tarjetas/service.png',
                'gradient' => 'from-blue-500 to-purple-600',
                'icon' => 'medical'
            ],
            [
                'id' => 'medical-excellence',
                'badge' => 'More than 500 successful surgeries',
                'title' => 'Medical Excellence in the Heart of the Andes',
                'subtitle' => 'World-class surgeries',
                'description' => 'We guarantee quality and safety with the best certified medical professionals, offering first-class treatments in a unique environment.',
                'features' => [
                    'Certified surgeons',
                    'Advanced technology',
                    'International protocols',
                    'Personalized follow-up'
                ],
                'image' => 'assets/tarjetas/quirofano.png',
                'gradient' => 'from-purple-500 to-pink-600',
                'icon' => 'star'
            ],
            [
                'id' => 'comprehensive-experience',
                'badge' => '24/7 care guaranteed',
                'title' => 'Premium Stay and Comfortable Recovery',
                'subtitle' => 'Personalized 24/7 care',
                'description' => 'Enjoy luxury accommodations and total wellness, with dedicated assistance for optimal and comfortable recovery.',
                'features' => [
                    'Personal coordinator',
                    'VIP transfers',
                    'Premium accommodation',
                    'Multilingual support'
                ],
                'image' => 'assets/estadia.jpg',
                'gradient' => 'from-indigo-500 to-purple-600',
                'icon' => 'hotel'
            ],
            [
                'id' => 'comprehensive-support',
                'badge' => 'Comprehensive support',
                'title' => '360° Comprehensive Accompaniment',
                'subtitle' => 'Support at every stage',
                'description' => 'We provide personalized support at every stage of your medical journey, ensuring close attention and tailored solutions.',
                'features' => [
                    '24/7 assistance',
                    'Medical coordination',
                    'Continuous monitoring',
                    'Emotional support'
                ],
                'image' => 'assets/tarjetas/reunionvirtua.png',
                'gradient' => 'from-teal-500 to-blue-600',
                'icon' => 'heart'
            ],
            [
                'id' => 'wellness-tourism',
                'badge' => 'Ecuador awaits you',
                'title' => 'Recreational Tourism and Complementary Wellness',
                'subtitle' => 'Discover Ecuador while you recover',
                'description' => 'We offer exclusive tourist and recreational activities to complement your transformation process and enrich your experience in Ecuador.',
                'features' => [
                    'Personalized tours',
                    'Ecuadorian gastronomy',
                    'Spa and wellness',
                    'Cultural activities'
                ],
                'image' => 'assets/tarjetas/experiencia.png',
                'gradient' => 'from-green-500 to-teal-600',
                'icon' => 'tourism'
            ]
        ],
        'journey_steps' => [
            [
                'step' => '1',
                'title' => 'Initial Consultation',
                'description' => 'Video call to understand your needs. KASAAMI Care & Beauty guides you.',
                'icon' => 'video'
            ],
            [
                'step' => '2',
                'title' => 'Medical Evaluation',
                'description' => 'Our medical team reviews your case. Receive the best advice.',
                'icon' => 'medical'
            ],
            [
                'step' => '3',
                'title' => 'Plan Proposal',
                'description' => 'All-inclusive quote presented by KASAAMI Care & Beauty. No surprises.',
                'icon' => 'plan'
            ],
            [
                'step' => '4',
                'title' => 'Schedule and Reservations',
                'description' => 'We confirm dates and prepare your trip. Kasaami manages everything.',
                'icon' => 'calendar'
            ],
            [
                'step' => '5',
                'title' => 'Welcome to Ecuador',
                'description' => 'We receive you and perfectly coordinate your accommodation. Your arrival is peaceful.',
                'icon' => 'welcome'
            ],
            [
                'step' => '6',
                'title' => 'Procedure',
                'description' => 'You perform your surgery with constant monitoring. Doctor and clinic take care of you.',
                'icon' => 'surgery'
            ],
            [
                'step' => '7',
                'title' => 'Postoperative and Recovery',
                'description' => 'Medical supervision and emotional well-being. KASAAMI Care & Beauty, your doctor guide you.',
                'icon' => 'recovery'
            ],
            [
                'step' => '8',
                'title' => 'Closure and Return',
                'description' => 'Final check-up and recommendations. We say goodbye with gratitude.',
                'icon' => 'departure'
            ]
        ],
        'why_kasaami' => [
            'title' => 'Why Choose KASAAMI Care & Beauty?',
            'description' => 'At KASAAMI Care & Beauty, we offer you the perfect combination of medical excellence, personalized attention and a unique natural environment in Ecuador for your comprehensive transformation.',
            'subtitle' => 'Trust our team of certified specialists and live a complete medical tourism experience with premium stays and total care. Don\'t wait any longer to start your change: schedule your free initial consultation today and take the first step towards the best version of yourself.',
            'question' => 'Are you ready to transform your life?',
            'final_text' => 'Start your journey of health, beauty and wellness with Kasaami.',
            'button' => 'Schedule Free Consultation'
        ],
        'sections' => [
            'services_title' => 'Our Comprehensive Services',
            'services_subtitle' => 'Select a service to learn more details',
            'journey_title' => 'Your Transformation Journey, Step by Step',
            'journey_subtitle' => 'Learn about the complete process you will experience with us',
            'cta_title' => 'Start Your Transformation Today',
            'cta_subtitle' => 'Schedule your free virtual consultation and discover how we can make the best version of yourself a reality',
            'cta_button_details' => 'Learn More Details',
            'cta_button_procedures' => 'View Procedures'
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
    <meta name="keywords" content="<?php echo $currentLang === 'es' ? 'servicios médicos, turismo médico, Ecuador, hospitalidad, cirugía' : 'medical services, medical tourism, Ecuador, hospitality, surgery'; ?>">
    <meta name="author" content="Kasaami Care & Beauty">
    
    <!-- Favicon -->
 <!-- Favicon -->
    <link rel="icon" type="image/png" href="public/favicon.png">
    <link rel="shortcut icon" href="public/favicon.png">
    <link rel="apple-touch-icon" href="public/favicon.png">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Filson Pro Fonts -->
    <link rel="stylesheet" href="assets/css/fonts.css">
    
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
                        'slide-in-left': 'slideInLeft 0.8s ease-out',
                        'slide-in-right': 'slideInRight 0.8s ease-out',
                        'scale-in': 'scaleIn 0.5s ease-out',
                        'float-gentle': 'floatGentle 3s ease-in-out infinite',
                        'progress-fill': 'progressFill 8s linear infinite'
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
                        slideInLeft: {
                            '0%': { transform: 'translateX(-50px)', opacity: '0' },
                            '100%': { transform: 'translateX(0)', opacity: '1' }
                        },
                        slideInRight: {
                            '0%': { transform: 'translateX(50px)', opacity: '0' },
                            '100%': { transform: 'translateX(0)', opacity: '1' }
                        },
                        scaleIn: {
                            '0%': { transform: 'scale(0.9)', opacity: '0' },
                            '100%': { transform: 'scale(1)', opacity: '1' }
                        },
                        floatGentle: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-10px)' }
                        },
                        progressFill: {
                            '0%': { width: '0%' },
                            '100%': { width: '100%' }
                        }
                    }
                }
            }
        }
    </script>
    
    <style>
        .parallax {
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        
        /* Mini Cards Styles */
        .mini-card {
            width: 200px;
            height: 120px;
            background-size: cover;
            background-position: center;
            border-radius: 1rem;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            opacity: 0.7;
        }

        .mini-card::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(0,0,0,0.4), rgba(0,0,0,0.2));
            transition: all 0.4s ease;
        }

        .mini-card.active {
            opacity: 1;
            transform: scale(1.05);
            box-shadow: 0 8px 25px rgba(139, 92, 246, 0.3);
        }

        .mini-card:hover {
            opacity: 1;
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        }

        .mini-card.active::before {
            background: linear-gradient(135deg, rgba(139, 92, 246, 0.3), rgba(109, 40, 217, 0.2));
        }

        /* Mini Card Content positioned at bottom */
        .mini-card-content {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-end;
            padding: 12px 8px;
            z-index: 10;
        }

        /* Progress Indicator */
        .progress-container {
            position: absolute;
            bottom: -4px;
            left: 0;
            right: 0;
            height: 4px;
            background: rgba(255,255,255,0.3);
            border-radius: 0 0 1rem 1rem;
            overflow: hidden;
        }

        .progress-bar {
            height: 100%;
            background: linear-gradient(90deg, #8B5CF6, #C4B5FD);
            width: 0%;
            transition: width 0.3s ease;
            animation: progressFill 8s linear infinite;
        }

        .progress-bar.paused {
            animation-play-state: paused;
        }

        /* Mini progress bars for all cards */
        .mini-progress-container {
            position: absolute;
            bottom: -4px;
            left: 0;
            right: 0;
            height: 3px;
            background: rgba(255,255,255,0.2);
            border-radius: 0 0 1rem 1rem;
            overflow: hidden;
        }

        .mini-progress-bar {
            height: 100%;
            background: linear-gradient(90deg, #8B5CF6, #C4B5FD);
            width: 0%;
            transition: width 0.1s ease;
        }

        .mini-progress-bar.active {
            animation: progressFill 8s linear infinite;
        }

        .mini-progress-bar.completed {
            width: 100%;
            background: linear-gradient(90deg, #10B981, #34D399);
        }

        /* Detailed Card Styles with Gradient - Improved background positioning */
        .detailed-card {
            background-size: cover;
            background-position: center center;
            border-radius: 1.5rem;
            min-height: 550px;
            position: relative;
            overflow: hidden;
            transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .detailed-card::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(to bottom, 
                transparent 0%,
                rgba(0,0,0,0.1) 30%,
                rgba(139, 92, 246, 0.6) 60%, 
                rgba(139, 92, 246, 0.9) 100%);
        }

        .card-content {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: 10;
            max-height: 60%;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 0 2rem 2.5rem 2rem;
            color: white;
        }

        /* Journey Steps with Gradient Background */
        .journey-background {
            background: linear-gradient(135deg, 
                rgba(139, 92, 246, 0.05) 0%, 
                rgba(196, 181, 253, 0.1) 25%, 
                rgba(255, 255, 255, 0.05) 50%, 
                rgba(196, 181, 253, 0.1) 75%, 
                rgba(139, 92, 246, 0.05) 100%);
        }

        /* Journey Steps - Central Numbers, Alternating Text */
        .journey-container {
            position: relative;
            max-width: 900px;
            margin: 0 auto;
        }

        .journey-container::before {
            content: '';
            position: absolute;
            top: 0;
            bottom: 0;
            left: 50%;
            width: 2px;
            background: linear-gradient(to bottom, 
                transparent 0%, 
                rgba(139, 92, 246, 0.3) 10%, 
                rgba(139, 92, 246, 0.6) 50%, 
                rgba(139, 92, 246, 0.3) 90%, 
                transparent 100%);
            transform: translateX(-50%);
            z-index: 0;
        }

        .journey-step {
            display: grid;
            grid-template-columns: 1fr 100px 1fr;
            align-items: center;
            gap: 2rem;
            margin-bottom: 3rem;
            position: relative;
            z-index: 10;
        }

        .step-content-left {
            text-align: right;
            padding-right: 2rem;
        }

        .step-content-right {
            text-align: left;
            padding-left: 2rem;
        }

        .step-content-empty {
            /* Empty space for alternating layout */
        }

        .step-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #8B5CF6, #6D28D9);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            box-shadow: 0 8px 25px rgba(139, 92, 246, 0.3);
            margin: 0 auto;
            position: relative;
            z-index: 20;
        }

        .step-icon:hover {
            transform: scale(1.1);
            box-shadow: 0 12px 35px rgba(139, 92, 246, 0.4);
        }

        /* CTA Section - Full Width Colored */
        .cta-full-width {
            background: linear-gradient(135deg, #8B5CF6 0%, #6D28D9 100%);
            margin: 0 -9999px;
            padding: 4rem 9999px;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .mini-card {
                width: 150px;
                height: 90px;
            }

            .detailed-card {
                min-height: 450px;
            }

            .card-content {
                max-height: 65%;
                padding: 0 1.5rem 2rem 1.5rem;
            }

            .journey-container::before {
                display: none;
            }

            .journey-step {
                grid-template-columns: 1fr;
                text-align: center;
                gap: 1rem;
            }

            .step-content-left,
            .step-content-right {
                text-align: center;
                padding: 0;
            }
        }
    </style>
</head>

<body class="font-filson bg-white overflow-x-hidden">
    
    <!-- Navigation -->
    <?php include 'includes/Navbar.php'; ?>

    <!-- Hero Section -->
    <section class="relative min-h-screen flex items-center justify-center parallax" style="background-image: linear-gradient(rgba(139, 92, 246, 0.7), rgba(109, 40, 217, 0.5)), url('assets/doctores/portadaherodoctores.png');">
        <div class="relative z-10 text-center text-white px-4 sm:px-6 lg:px-8 max-w-4xl mx-auto">
            <h1 class="text-5xl md:text-7xl font-filson font-bold mb-6 animate-slide-up">
                <?php echo $t['hero']['title']; ?>
            </h1>
            <p class="text-xl md:text-2xl opacity-90 animate-slide-up max-w-3xl mx-auto leading-relaxed" style="animation-delay: 0.2s;">
                <?php echo $t['hero']['subtitle']; ?>
            </p>
        </div>
    </section>

    <!-- Services Interactive Section -->
    <section class="py-20 bg-gradient-to-br from-gray-50 to-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-filson font-bold text-gray-900 mb-6">
                    <?php echo $t['sections']['services_title']; ?>
                </h2>
                <p class="text-xl text-gray-600">
                    <?php echo $t['sections']['services_subtitle']; ?>
                </p>
            </div>

            <!-- Mini Cards Row with Progress -->
            <div class="flex flex-wrap justify-center gap-4 mb-12">
                <?php foreach ($t['services_carousel'] as $index => $service): ?>
                <div class="mini-card <?php echo $index === 0 ? 'active' : ''; ?>" 
                     data-service="<?php echo $index; ?>"
                     onclick="selectService(<?php echo $index; ?>)"
                     style="background-image: url('<?php echo $service['image']; ?>');">
                    
                    <div class="mini-card-content">
                        <!-- Service Icon -->
                        <div class="w-8 h-8 mx-auto mb-2 text-white">
                            <?php if ($service['icon'] === 'star'): ?>
                                <svg fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                </svg>
                            <?php elseif ($service['icon'] === 'medical'): ?>
                                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path d="M4 9a2 2 0 0 0-2 2v2a2 2 0 0 0 2 2h4a1 1 0 0 1 1 1v4a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2v-4a1 1 0 0 1 1-1h4a2 2 0 0 0 2-2v-2a2 2 0 0 0-2-2h-4a1 1 0 0 1-1-1V4a2 2 0 0 0-2-2h-2a2 2 0 0 0-2 2v4a1 1 0 0 1-1 1z"/>
                                </svg>
                            <?php elseif ($service['icon'] === 'hotel'): ?>
                                <svg fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M7 13c1.66 0 3-1.34 3-3S8.66 7 7 7s-3 1.34-3 3 1.34 3 3 3zm12-6h-8v7H3V6H1v15h2v-3h18v3h2v-9c0-2.21-1.79-4-4-4z"/>
                                </svg>
                            <?php elseif ($service['icon'] === 'heart'): ?>
                                <svg fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                                </svg>
                            <?php else: ?>
                                <svg fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M14 6l-3.75 5 2.85 3.8-1.6 1.2C9.81 13.75 7 10 7 10l-6 8h22l-9-12z"/>
                                </svg>
                            <?php endif; ?>
                        </div>
                        <h4 class="text-xs font-semibold text-white text-center leading-tight">
                            <?php echo explode(' ', $service['title'])[0]; ?>
                        </h4>
                    </div>

                    <!-- Mini Progress Indicator for each card -->
                    <div class="mini-progress-container">
                        <div class="mini-progress-bar <?php echo $index === 0 ? 'active' : ''; ?>" 
                             data-progress="<?php echo $index; ?>"></div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <!-- Detailed Card with Gradient -->
            <div class="detailed-card animate-scale-in" 
                 id="detailed-card"
                 style="background-image: url('<?php echo $t['services_carousel'][0]['image']; ?>');">
                
                <div class="card-content">
                    <!-- Badge -->
                    <div class="mb-6">
                        <span id="service-badge" class="inline-block px-4 py-2 bg-gradient-to-r <?php echo $t['services_carousel'][0]['gradient']; ?> rounded-full text-sm font-semibold">
                            <?php echo $t['services_carousel'][0]['badge']; ?>
                        </span>
                    </div>
                    
                    <!-- Main Content Grid -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-end">
                        <div>
                            <h3 id="service-title" class="text-3xl md:text-4xl font-filson font-bold mb-4">
                                <?php echo $t['services_carousel'][0]['title']; ?>
                            </h3>
                            <p id="service-description" class="text-lg md:text-xl opacity-90 mb-6 leading-relaxed">
                                <?php echo $t['services_carousel'][0]['description']; ?>
                            </p>
                        </div>
                        
                        <!-- Features Grid -->
                        <div id="service-features" class="grid grid-cols-2 gap-3">
                            <?php foreach ($t['services_carousel'][0]['features'] as $feature): ?>
                            <div class="flex items-center text-sm font-medium">
                                <svg class="w-4 h-4 mr-2 text-white/80" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                                <?php echo $feature; ?>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- CTA Button -->
                    <div class="mt-8">
                        <button onclick="openWhatsApp()" class="bg-white/20 backdrop-blur-sm text-white px-8 py-3 rounded-full font-semibold hover:bg-white/30 transition-all duration-200 transform hover:scale-105 border border-white/30">
                            <?php echo $t['sections']['cta_button_details']; ?>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Journey Steps Section - Central Numbers, Alternating Text -->
    <section class="py-20 journey-background">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-filson font-bold text-gray-900 mb-6">
                    <?php echo $t['sections']['journey_title']; ?>
                </h2>
                <p class="text-xl text-gray-600">
                    <?php echo $t['sections']['journey_subtitle']; ?>
                </p>
            </div>

            <div class="journey-container">
                <?php foreach ($t['journey_steps'] as $index => $step): ?>
                <?php $isEven = $index % 2 === 0; ?>
                
                <div class="journey-step">
                    <!-- Left Content (odd steps) -->
                    <?php if (!$isEven): ?>
                    <div class="step-content-left animate-slide-in-left">
                        <h3 class="text-2xl md:text-3xl font-filson font-bold text-gray-900 mb-3">
                            <?php echo $step['title']; ?>
                        </h3>
                        <p class="text-lg text-gray-600 leading-relaxed">
                            <?php echo $step['description']; ?>
                        </p>
                    </div>
                    <?php else: ?>
                    <div class="step-content-empty"></div>
                    <?php endif; ?>
                    
                    <!-- Central Icon -->
                    <div class="step-icon animate-float-gentle">
                     <span class="text-2xl md:text-3xl font-bold text-white"><?php echo $step['step']; ?></span>
                   </div>
                   
                   <!-- Right Content (even steps) -->
                   <?php if ($isEven): ?>
                   <div class="step-content-right animate-slide-in-right">
                       <h3 class="text-2xl md:text-3xl font-filson font-bold text-gray-900 mb-3">
                           <?php echo $step['title']; ?>
                       </h3>
                       <p class="text-lg text-gray-600 leading-relaxed">
                           <?php echo $step['description']; ?>
                       </p>
                   </div>
                   <?php else: ?>
                   <div class="step-content-empty"></div>
                   <?php endif; ?>
               </div>
               <?php endforeach; ?>
           </div>
       </div>
   </section>

   <!-- Why Kasaami Section -->
   <section class="py-20 bg-gradient-to-br from-kasaami-pearl to-white">
       <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
           <div class="text-center">
               <h2 class="text-4xl md:text-5xl font-filson font-bold text-gray-900 mb-8">
                   <?php echo $t['why_kasaami']['title']; ?>
               </h2>
               
               <div class="max-w-4xl mx-auto">
                   <p class="text-xl text-gray-700 leading-relaxed mb-6">
                       <?php echo $t['why_kasaami']['description']; ?>
                   </p>
                   
                   <p class="text-lg text-gray-600 leading-relaxed mb-8">
                       <?php echo $t['why_kasaami']['subtitle']; ?>
                   </p>
                   
                   <!-- Highlighted Question -->
                 
               </div>
           </div>
       </div>
   </section>

   <!-- CTA Section - Full Width Colored -->
   <section class="relative overflow-hidden">
       <div class="cta-full-width">
           <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
               <div class="py-16">
                   <h2 class="text-4xl md:text-5xl font-filson font-bold mb-6">
                       <?php echo $t['sections']['cta_title']; ?>
                   </h2>
                   <p class="text-xl md:text-2xl opacity-90 mb-8 max-w-3xl mx-auto leading-relaxed">
                       <?php echo $t['sections']['cta_subtitle']; ?>
                   </p>
                   
                   <!-- CTA Buttons -->
                   <div class="flex flex-col sm:flex-row gap-4 justify-center">
                       <button onclick="openWhatsApp()" class="bg-white text-kasaami-violet px-12 py-4 rounded-full font-bold text-lg hover:bg-gray-100 transition-all duration-200 transform hover:scale-105 shadow-lg">
                           <?php echo $t['why_kasaami']['button']; ?>
                       </button>
                       <a href="procedimientos.php<?php echo $currentLang === 'en' ? '?lang=en' : ''; ?>" class="border-2 border-white text-white px-12 py-4 rounded-full font-bold text-lg hover:bg-white hover:text-kasaami-violet transition-all duration-200 transform hover:scale-105 inline-block">
                           <?php echo $t['sections']['cta_button_procedures']; ?>
                       </a>
                   </div>
                   
                   <!-- Contact Info -->
                   <div class="mt-12 flex flex-col sm:flex-row justify-center items-center gap-6 text-white/80">
                       <div class="flex items-center gap-2">
                           <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                               <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
                           </svg>
                           <span class="font-medium">+593 96 305 2401</span>
                       </div>
                       <div class="flex items-center gap-2">
                           <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                               <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                           </svg>
                           <span class="font-medium">Quito, Ecuador</span>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </section>

   <!-- Footer -->
   <?php include 'includes/Footer.php'; ?>

   <!-- WhatsApp Button -->
   <?php include 'includes/FlotanteWpp.php'; ?>

   <script>
       // Services data for dynamic content
       const servicesData = <?php echo json_encode($t['services_carousel']); ?>;

       function selectService(index) {
           // Update mini cards active state and progress bars
           document.querySelectorAll('.mini-card').forEach((card, i) => {
               const isActive = i === index;
               const progressBar = card.querySelector('.mini-progress-bar');
               
               // Update card active state
               card.classList.toggle('active', isActive);
               
               // Update progress bars
               if (progressBar) {
                   progressBar.classList.remove('active', 'completed');
                   
                   if (i < index) {
                       // Previous cards - completed
                       progressBar.classList.add('completed');
                       progressBar.style.width = '100%';
                   } else if (i === index) {
                       // Current card - active with animation
                       progressBar.classList.add('active');
                       progressBar.style.width = '0%';
                   } else {
                       // Future cards - empty
                       progressBar.style.width = '0%';
                   }
               }
           });

           // Get service data
           const service = servicesData[index];
           
           // Update detailed card with smooth animation
           const detailedCard = document.getElementById('detailed-card');
           
           // Fade out with scale
           detailedCard.style.opacity = '0.3';
           detailedCard.style.transform = 'scale(0.98)';
           
           setTimeout(() => {
               // Update background image
               detailedCard.style.backgroundImage = `url('${service.image}')`;
               
               // Update content
               document.getElementById('service-badge').textContent = service.badge;
               document.getElementById('service-badge').className = `inline-block px-4 py-2 bg-gradient-to-r ${service.gradient} rounded-full text-sm font-semibold`;
               document.getElementById('service-title').textContent = service.title;
               document.getElementById('service-description').textContent = service.description;
               
               // Update features
               const featuresContainer = document.getElementById('service-features');
               featuresContainer.innerHTML = '';
               service.features.forEach(feature => {
                   const featureDiv = document.createElement('div');
                   featureDiv.className = 'flex items-center text-sm font-medium';
                   featureDiv.innerHTML = `
                       <svg class="w-4 h-4 mr-2 text-white/80" fill="currentColor" viewBox="0 0 20 20">
                           <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                       </svg>
                       ${feature}
                   `;
                   featuresContainer.appendChild(featureDiv);
               });
               
               // Fade in
               detailedCard.style.opacity = '1';
               detailedCard.style.transform = 'scale(1)';
           }, 300);
       }

       function openWhatsApp() {
           const currentLang = '<?php echo $currentLang; ?>';
           const message = currentLang === 'es' 
               ? '¡Hola! Me interesa conocer más sobre los servicios de Kasaami Care & Beauty. Me gustaría agendar una consulta virtual gratuita.'
               : 'Hello! I am interested in learning more about Kasaami Care & Beauty services. I would like to schedule a free virtual consultation.';
           const whatsappNumber = "593963052401";
           const whatsappURL = `https://wa.me/${whatsappNumber}?text=${encodeURIComponent(message)}`;
           window.open(whatsappURL, '_blank');
       }

       // Auto-rotate services every 8 seconds
       let currentServiceIndex = 0;
       let serviceInterval;

       function startServiceRotation() {
           serviceInterval = setInterval(() => {
               currentServiceIndex = (currentServiceIndex + 1) % servicesData.length;
               selectService(currentServiceIndex);
           }, 8000);
       }

       function resetServiceInterval() {
           clearInterval(serviceInterval);
           // Pause all progress bars
           document.querySelectorAll('.mini-progress-bar.active').forEach(bar => {
               bar.style.animationPlayState = 'paused';
           });
           
           setTimeout(() => {
               document.querySelectorAll('.mini-progress-bar.active').forEach(bar => {
                   bar.style.animationPlayState = 'running';
               });
               startServiceRotation();
           }, 1000);
       }

       // Start auto-rotation
       startServiceRotation();

       // Pause auto-rotation on user interaction
       document.querySelectorAll('.mini-card').forEach((card, index) => {
           card.addEventListener('click', () => {
               currentServiceIndex = index;
               resetServiceInterval();
           });
       });

       // Pause on detailed card hover
       document.getElementById('detailed-card').addEventListener('mouseenter', () => {
           clearInterval(serviceInterval);
           document.querySelectorAll('.mini-progress-bar.active').forEach(bar => {
               bar.style.animationPlayState = 'paused';
           });
       });

       document.getElementById('detailed-card').addEventListener('mouseleave', () => {
           document.querySelectorAll('.mini-progress-bar.active').forEach(bar => {
               bar.style.animationPlayState = 'running';
           });
           startServiceRotation();
       });

       // Intersection Observer for animations
       const observerOptions = {
           threshold: 0.1,
           rootMargin: '0px 0px -100px 0px'
       };

       const observer = new IntersectionObserver((entries) => {
           entries.forEach(entry => {
               if (entry.isIntersecting) {
                   entry.target.classList.add('animate-fade-in');
               }
           });
       }, observerOptions);

       // Observe journey steps for animations
       document.querySelectorAll('.journey-step').forEach(step => {
           observer.observe(step);
       });

       // Enhanced mini card hover effects
       document.querySelectorAll('.mini-card').forEach(card => {
           card.addEventListener('mouseenter', function() {
               if (!this.classList.contains('active')) {
                   this.style.transform = 'translateY(-5px) scale(1.02)';
               }
               // Pause progress bars on hover
               document.querySelectorAll('.mini-progress-bar.active').forEach(bar => {
                   bar.style.animationPlayState = 'paused';
               });
           });
           
           card.addEventListener('mouseleave', function() {
               if (!this.classList.contains('active')) {
                   this.style.transform = '';
               }
               // Resume progress bars
               document.querySelectorAll('.mini-progress-bar.active').forEach(bar => {
                   bar.style.animationPlayState = 'running';
               });
           });
       });

       // Smooth scrolling
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

       // Touch support for mobile
       let touchStartY = 0;
       document.addEventListener('touchstart', e => {
           touchStartY = e.touches[0].clientY;
       });

       document.addEventListener('touchend', e => {
           const touchEndY = e.changedTouches[0].clientY;
           const diff = touchStartY - touchEndY;
           
           // If swipe up on services section, go to next service
           if (Math.abs(diff) > 50 && e.target.closest('.mini-card')) {
               if (diff > 0) {
                   // Swipe up - next service
                   currentServiceIndex = (currentServiceIndex + 1) % servicesData.length;
               } else {
                   // Swipe down - previous service
                   currentServiceIndex = (currentServiceIndex - 1 + servicesData.length) % servicesData.length;
               }
               selectService(currentServiceIndex);
               resetServiceInterval();
           }
       });

       // Keyboard navigation
       document.addEventListener('keydown', (e) => {
           if (e.target.closest('.detailed-card') || e.target.closest('.mini-card')) {
               if (e.key === 'ArrowLeft') {
                   currentServiceIndex = (currentServiceIndex - 1 + servicesData.length) % servicesData.length;
                   selectService(currentServiceIndex);
                   resetServiceInterval();
               } else if (e.key === 'ArrowRight') {
                   currentServiceIndex = (currentServiceIndex + 1) % servicesData.length;
                   selectService(currentServiceIndex);
                   resetServiceInterval();
               }
           }
       });

       // Performance optimization - Preload images
       servicesData.forEach(service => {
           const img = new Image();
           img.src = service.image;
       });

       // Visibility API to pause/resume when tab is not active
       document.addEventListener('visibilitychange', () => {
           if (document.hidden) {
               clearInterval(serviceInterval);
               document.querySelectorAll('.mini-progress-bar.active').forEach(bar => {
                   bar.style.animationPlayState = 'paused';
               });
           } else {
               document.querySelectorAll('.mini-progress-bar.active').forEach(bar => {
                   bar.style.animationPlayState = 'running';
               });
               startServiceRotation();
           }
       });
   </script>
</body>
</html>