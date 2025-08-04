<?php
// index.php - Kasaami Care & Beauty (Root)
require_once('includes/init-language.php');
$pageTitle = setPageTitle(
    "Kasaami Care & Beauty - Tu transformación comienza en el corazón de los Andes",
    "Kasaami Care & Beauty - Your transformation begins in the heart of the Andes"
);

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
            'subtitle' => 'En Kasaami, unimos la excelencia médica y la hospitalidad para ofrecerte una experiencia única de medicina estética y bienestar en Ecuador.',
            'cta' => 'Descubre más'
        ],
        'experience' => [
            'title' => 'Tu transformación comienza en el corazón de los Andes',
            'description' => 'En Kasaami, unimos la excelencia médica y la hospitalidad para ofrecerte una experiencia única de medicina estética y bienestar en Ecuador.',
            'feature1_title' => 'Atención personalizada y cercana',
            'feature1_desc' => 'Acompañamos cada etapa de tu proceso con dedicación y tratamientos personalizados, desde la primera consulta hasta tu recuperación completa.',
            'feature2_title' => 'Compromiso con la excelencia médica',
            'feature2_desc' => 'Nuestro equipo de profesionales certificados garantiza los más altos estándares internacionales en medicina estética y cuidado de la salud.',
            'feature3_title' => 'Bienestar integral y turismo médico en Ecuador',
            'feature3_desc' => 'Fusionamos medicina avanzada con experiencias de turismo y cuidado personal, para que transformes tu salud y belleza en un solo viaje inolvidable.'
        ],
        'wellness_tourism' => [
    'title' => 'Explora Bienestar y Turismo Médico en Ecuador',
    'description' => 'En Kasaami, tu proceso de transformación va más allá del procedimiento médico. Integramos tu recuperación con experiencias exclusivas de <strong>turismo médico en Ecuador</strong> y <strong>bienestar integral</strong>, asegurando que tu estadía sea reparadora y enriquecedora. Te acompañamos en cada paso, desde la <strong>gestión de trámites médicos</strong> hasta actividades diseñadas para potenciar tu <strong>recuperación física y emocional</strong> en un entorno natural privilegiado.'
],
        'comprehensive_services' => [
    'title' => 'Servicios Integrales',
    'service1_title' => 'Bienestar y Recuperación Integral',
    'service1_desc' => 'Programas personalizados de recuperación que combinan medicina avanzada con terapias de bienestar en un ambiente natural privilegiado.',
    'service2_title' => 'Experiencias de Turismo Médico Personalizadas',
    'service2_desc' => 'Vivencias únicas que conectan tu proceso de sanación con la riqueza cultural y natural de Ecuador.',
    'service3_title' => 'Asistencia Completa en Trámites y Logística Médica',
    'service3_desc' => 'Gestión integral de documentación, coordinación médica y logística personalizada para una experiencia sin complicaciones.'
],
        'stats' => [
            'title' => 'Nuestros Números',
            'patients' => 'Pacientes Transformados',
            'doctors' => 'Médicos Especialistas',
            'countries' => 'Países de Origen',
            'experience' => 'Años de Experiencia'
        ],
        'testimonials' => [
            'title' => 'Voces que Inspiran Transformación',
            'subtitle' => 'Historias reales de pacientes que eligieron Ecuador para renovarse, sanar y redescubrir su belleza con Kasaami.'
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
            'subtitle' => 'At Kasaami, we unite medical excellence and hospitality to offer you a unique aesthetic medicine and wellness experience in Ecuador.',
            'cta' => 'Discover more'
        ],
        'experience' => [
            'title' => 'A unique transformation experience',
            'description' => 'At Kasaami, we unite medical excellence and hospitality to offer you a unique aesthetic medicine and wellness experience in Ecuador.',
            'feature1_title' => 'Personalized and close attention',
            'feature1_desc' => 'We accompany every stage of your process with dedication and personalized treatments, from the first consultation to your complete recovery.',
            'feature2_title' => 'Commitment to medical excellence',
            'feature2_desc' => 'Our team of certified professionals guarantees the highest international standards in aesthetic medicine and health care.',
            'feature3_title' => 'Comprehensive wellness and medical tourism in Ecuador',
            'feature3_desc' => 'We fuse advanced medicine with tourism and personal care experiences, so you can transform your health and beauty in one unforgettable trip.'
        ],
        'wellness_tourism' => [
            'title' => 'Explore Wellness and Medical Tourism in Ecuador',
            'description' => 'At Kasaami, your transformation process goes beyond the medical procedure. We integrate your recovery with exclusive <strong>medical tourism experiences in Ecuador</strong> and <strong>comprehensive wellness</strong>, ensuring your stay is restorative and enriching. We accompany you every step of the way, from <strong>medical procedures management</strong> to activities designed to enhance your <strong>physical and emotional recovery</strong> in a privileged natural environment.'
        ],
        'comprehensive_services' => [
            'title' => 'Comprehensive Services',
            'service1_title' => 'Comprehensive Wellness and Recovery',
            'service1_desc' => 'Personalized recovery programs that combine advanced medicine with wellness therapies in a privileged natural environment.',
            'service2_title' => 'Personalized Medical Tourism Experiences',
            'service2_desc' => 'Unique experiences that connect your healing process with the cultural and natural richness of Ecuador.',
            'service3_title' => 'Complete Assistance in Medical Procedures and Logistics',
            'service3_desc' => 'Comprehensive management of documentation, medical coordination and personalized logistics for a hassle-free experience.'
        ],
        'stats' => [
            'title' => 'Our Numbers',
            'patients' => 'Transformed Patients',
            'doctors' => 'Specialist Doctors',
            'countries' => 'Countries of Origin',
            'experience' => 'Years of Experience'
        ],
        'testimonials' => [
            'title' => 'Voices that Inspire Transformation',
            'subtitle' => 'Real stories of patients who chose Ecuador to renew themselves, heal and rediscover their beauty with Kasaami.'
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

// Procedimientos data - ACTUALIZADO CON CAMBIOS EXACTOS DE LA CAPTURA
$proceduresData = [
    'es' => [
        'title' => 'Nuestros Procedimientos',
        'subtitle' => 'Especialidades médicas de clase mundial',
        'face' => [
            'title' => 'FACE',
            'procedures' => [
                'RINOPLASTIA',
                'LIFTING FACIAL',
                'BLEFAROPLASTIA',
                'MENTOPLASTIA',
                'BICHECTOMÍA',
                'IMPLANTES FACIALES',
                'LIPOSUCCIÓN FACIAL',
                'OTOPLASTIA (CIRUGÍA DE OREJAS)',
                'REJUVENECIMIENTO FACIAL',
                'LIFTING DE CEJAS'
            ]
        ],
        'body' => [
            'title' => 'BODY',
            'procedures' => [
                'LIPOSUCCIÓN',
                'ABDOMINOPLASTIA',
                'AUMENTO DE GLÚTEOS',
                // ELIMINADOS: 'REDUCCIÓN DE SENOS', 'MASTOPEXIA', 'REDUCCIÓN DE PAPADA'
                'LIFTING CORPORAL',
                'CONTORNO CORPORAL',
                'BRAZOS Y MUSLOS',
                'TRATAMIENTOS CELULITIS'
            ]
        ],
        'breast' => [
            'title' => 'BREAST',
            'procedures' => [
                'AUMENTO DE SENOS',
                'REDUCCIÓN DE SENOS',
                'LEVANTAMIENTO DE SENOS',
                'RECONSTRUCCIÓN MAMARIA',
                'IMPLANTES MAMARIOS',
                'CORRECCIÓN ASIMETRÍA',
                'CIRUGÍA PTOSIS MAMARIA',
                'REVISIÓN DE IMPLANTES'
            ]
        ],
        'hair' => [
            'title' => 'HAIR',
            'procedures' => [
                'TRASPLANTE CAPILAR (FUE Y FUT)', // EXACTO COMO EN CAPTURA
                'MICROINJERTOS CAPILARES',
                'TERAPIA PRP CAPILAR',
                'MESOTERAPIA CAPILAR',
                'REGENERACIÓN CAPILAR',
                'REDUCCIÓN LÍNEA FRONTAL',
                'REPARACIÓN CICATRICES',
                'TRATAMIENTO ALOPECIA',
                'IMPLANTES CEJAS'
                // ELIMINADO: 'MICROPIGMENTACIÓN'
            ]
        ],
        'wellness' => [
            'title' => 'BARIATRIC CARE', // CAMBIO DE NOMBRE EXACTO
            'procedures' => [
                'MANGA GÁSTRICA',
                'BYPASS GÁSTRICO',
                'MINI BYPASS GÁSTRICO',
                'BALÓN GÁSTRICO',
                'REVISIÓN BARIÁTRICA',
                'CIRUGÍA METABÓLICA',
                'ENDOSCOPÍA BARIÁTRICA', // REPOSICIONADO
                'BYPASS DUODENAL',
                'CONVERSIÓN BARIÁTRICA',
                'MANGA ENDOSCÓPICA'
            ]
        ]
    ],
    'en' => [
        'title' => 'Our Procedures',
        'subtitle' => 'World-class medical specialties',
        'face' => [
            'title' => 'FACE',
            'procedures' => [
                'RHINOPLASTY',
                'FACELIFT',
                'BLEPHAROPLASTY',
                'MENTOPLASTY',
                'BICHECTOMY',
                'FACIAL IMPLANTS',
                'FACIAL LIPOSUCTION',
                'OTOPLASTY (EAR SURGERY)',
                'FACIAL REJUVENATION',
                'BROW LIFT'
            ]
        ],
        'body' => [
            'title' => 'BODY',
            'procedures' => [
                'LIPOSUCTION',
                'ABDOMINOPLASTY',
                'BUTTOCK AUGMENTATION',
                // ELIMINADOS: 'BREAST REDUCTION', 'MASTOPEXY', 'DOUBLE CHIN REDUCTION'
                'BODY LIFT',
                'BODY CONTOURING',
                'ARMS & THIGHS',
                'CELLULITE TREATMENTS'
            ]
        ],
        'breast' => [
            'title' => 'BREAST',
            'procedures' => [
                'BREAST AUGMENTATION',
                'BREAST REDUCTION',
                'BREAST LIFT',
                'BREAST RECONSTRUCTION',
                'BREAST IMPLANTS',
                'ASYMMETRY CORRECTION',
                'BREAST PTOSIS SURGERY',
                'IMPLANT REVISION'
            ]
        ],
        'hair' => [
            'title' => 'HAIR',
            'procedures' => [
                'HAIR TRANSPLANT (FUE & FUT)', // EXACTO COMO EN CAPTURA
                'HAIR MICROGRAFTS',
                'PRP HAIR THERAPY',
                'HAIR MESOTHERAPY',
                'HAIR REGENERATION',
                'FRONTAL HAIRLINE REDUCTION',
                'SCAR REPAIR',
                'ALOPECIA TREATMENT',
                'EYEBROW IMPLANTS'
                // ELIMINADO: 'HAIR MICROPIGMENTATION'
            ]
        ],
        'wellness' => [
            'title' => 'BARIATRIC CARE', // CAMBIO DE NOMBRE EXACTO
            'procedures' => [
                'GASTRIC SLEEVE',
                'GASTRIC BYPASS',
                'MINI GASTRIC BYPASS',
                'GASTRIC BALLOON',
                'BARIATRIC REVISION',
                'METABOLIC SURGERY',
                'BARIATRIC ENDOSCOPY', // REPOSICIONADO
                'DUODENAL BYPASS',
                'BARIATRIC CONVERSION',
                'ENDOSCOPIC SLEEVE'
            ]
        ]
    ]
];

$t = $content[$currentLang];
$procData = $proceduresData[$currentLang];
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

    <?php include 'includes/head-common.php'; ?>
    
    <!-- Page-specific styles -->
    <style>
        
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

        /* Procedures section - Reducido de 100vh a 60vh */
        .procedures-container {
            display: flex;
            height: 60vh;
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
            min-height: 60vh;
        }

        .procedure-card:hover {
            filter: grayscale(0%);
            flex: 2.2;
        }

        /* Cuando uno hace hover, los otros se achican */
        .procedures-container:hover .procedure-card:not(:hover) {
            flex: 0.7;
            filter: grayscale(100%) brightness(0.7);
        }

        .procedure-card::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(45deg, rgba(0,0,0,0.9), rgba(0,0,0,0.6));
            transition: all 0.8s ease;
            z-index: 1;
        }

        .procedure-card:hover::before {
            background: linear-gradient(45deg, rgba(139, 92, 246, 0.85), rgba(109, 40, 217, 0.7));
        }

        .procedure-content {
            position: relative;
            z-index: 2;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 2rem 1.5rem;
            color: white;
        }

        .procedure-text {
            writing-mode: vertical-rl;
            text-orientation: mixed;
            font-size: 2rem;
            font-weight: 700;
            letter-spacing: 0.3em;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.8);
            margin-bottom: auto;
            transform: translateY(1.5rem);
        }

        .procedure-info {
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.6s ease;
            margin-top: auto;
            max-width: 340px;
            max-height: 55vh;
            display: flex;
            flex-direction: column;
            padding-bottom: 1rem;
        }

        .procedure-card:hover .procedure-info {
            opacity: 1;
            transform: translateY(0);
        }

        /* Estilos para listas SIN SCROLL - AJUSTADOS PARA VER TODOS LOS PROCEDIMIENTOS */
        .procedure-list-no-scroll {
            display: flex;
            flex-direction: column;
            gap: 6px;
            max-height: none;
            overflow: visible;
            padding: 0;
        }

        .procedure-item-large {
            font-size: 0.85rem;
            font-weight: 600;
            line-height: 1.3;
            opacity: 0.95;
            padding-left: 8px;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.8);
        }

        .procedure-item-large:hover {
            opacity: 1;
            transform: translateX(6px);
            color: #C4B5FD;
        }

        /* Features hover effects */
        .feature-card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .feature-card:hover {
            transform: translateY(-12px);
            box-shadow: 0 25px 50px -12px rgba(139, 92, 246, 0.15);
        }

        /* Counter animation */
        .counter-number {
            font-feature-settings: 'tnum';
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .procedures-container {
                flex-direction: column;
                height: auto;
                width: 100%;
            }
            
            .procedure-card {
                height: 300px;
                flex: none !important;
                min-height: auto;
            }
            
            .procedure-text {
                writing-mode: horizontal-tb;
                text-orientation: initial;
                font-size: 1.8rem;
                transform: none;
            }
            
            .procedure-info {
                opacity: 1;
                transform: none;
                max-height: 45vh;
                padding-bottom: 0.5rem;
            }
            
            .procedure-content {
                padding: 1.5rem;
            }

            .procedure-item-large {
                font-size: 0.8rem;
                padding-left: 6px;
                line-height: 1.2;
            }
            
            .procedure-list-no-scroll {
                gap: 4px;
            }
        }
    </style>
</head>

<body class="font-filson bg-white overflow-x-hidden">
    
    <!-- Navigation -->
    <?php include 'includes/Navbar.php'; ?>

    <!-- Hero Section with Clean Video Background -->
    <section class="relative h-screen flex items-center justify-center overflow-hidden">
        <!-- Video Background -->
        <div class="absolute inset-0 w-full h-full video-container">
            <?php
            // Obtener configuración de videos desde base de datos
            require_once 'includes/database.php';
            
            // Detectar si es móvil
            $isMobile = preg_match('/(android|iphone|ipad|mobile)/i', $_SERVER['HTTP_USER_AGENT'] ?? '');
            $device = $isMobile ? 'mobile' : 'desktop';
            
            // Obtener URL del video y configuración
            $videoUrl = getVideoUrl($currentLang, $device);
            $videoSettings = getVideoSettings();
            ?>
            <video 
                <?php echo $videoSettings['autoplay'] ? 'autoplay' : ''; ?>
                <?php echo $videoSettings['muted'] ? 'muted' : ''; ?>
                <?php echo $videoSettings['loop'] ? 'loop' : ''; ?>
                playsinline 
                class="w-full h-full object-cover"
                poster=""
            >
                <?php if (!empty($videoUrl)): ?>
                    <source src="<?php echo htmlspecialchars($videoUrl); ?>" type="video/mp4">
                <?php else: ?>
                    <!-- Fallback a videos por defecto si no hay configuración en BD -->
                    <?php if($currentLang === 'es'): ?>
                        <source src="https://kasaamigroup.com/VIDEO-HOME-KASAAMI-mp4.mp4" type="video/mp4">
                    <?php else: ?>
                        <source src="https://kasaamigroup.com/KASAAMI-HOME-INGLES-mp4.mp4" type="video/mp4">
                    <?php endif; ?>
                <?php endif; ?>
                <!-- Fallback image -->
            </video>
        </div>
    </section>

    <!-- Experience Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6 animate-fade-in">
                    <?php echo $t['experience']['title']; ?>
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed animate-slide-up">
                    <?php echo $t['experience']['description']; ?>
                </p>
            </div>
            
            <!-- Features Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-16">
                <div class="text-center p-6 rounded-xl feature-card">
                    <div class="w-20 h-20 bg-gradient-to-br from-kasaami-light-violet to-kasaami-violet rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg group-hover:shadow-2xl group-hover:from-kasaami-violet group-hover:to-kasaami-dark-violet transition-all duration-500 group-hover:scale-110">
                        <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4"><?php echo $t['experience']['feature1_title']; ?></h3>
                    <p class="text-gray-600 leading-relaxed"><?php echo $t['experience']['feature1_desc']; ?></p>
                </div>
                
                <div class="text-center p-6 rounded-xl feature-card">
                    <div class="w-20 h-20 bg-gradient-to-br from-kasaami-light-violet to-kasaami-violet rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg group-hover:shadow-2xl group-hover:from-kasaami-violet group-hover:to-kasaami-dark-violet transition-all duration-500 group-hover:scale-110">
                        <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4"><?php echo $t['experience']['feature2_title']; ?></h3>
                    <p class="text-gray-600 leading-relaxed"><?php echo $t['experience']['feature2_desc']; ?></p>
                </div>
                
                <div class="text-center p-6 rounded-xl feature-card">
                    <div class="w-20 h-20 bg-gradient-to-br from-kasaami-light-violet to-kasaami-violet rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg group-hover:shadow-2xl group-hover:from-kasaami-violet group-hover:to-kasaami-dark-violet transition-all duration-500 group-hover:scale-110">
                        <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.22.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99zM6.5 16c-.83 0-1.5-.67-1.5-1.5S5.67 13 6.5 13s1.5.67 1.5 1.5S7.33 16 6.5 16zm11 0c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5zM5 11l1.5-4.5h11L19 11H5z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4"><?php echo $t['experience']['feature3_title']; ?></h3>
                    <p class="text-gray-600 leading-relaxed"><?php echo $t['experience']['feature3_desc']; ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Procedures Gallery - ACTUALIZADA CON IMÁGENES LOCALES Y CAMBIOS EXACTOS -->
    <section class="bg-black">
        <div class="w-full">
            <div class="text-center py-12 px-4">
                <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">
                    <?php echo $procData['title']; ?>
                </h2>
                <p class="text-xl text-gray-300">
                    <?php echo $procData['subtitle']; ?>
                </p>
            </div>
            
            <div class="procedures-container">
                <!-- Face Procedures -->
                <a href="procedimientos" class="procedure-card" style="background-image: url('assets/secciones/face.png');">
                    <div class="procedure-content">
                        <div class="procedure-text">
                            <?php echo $procData['face']['title']; ?>
                        </div>
                        <div class="procedure-info">
                            <div class="procedure-list-no-scroll">
                                <?php foreach($procData['face']['procedures'] as $procedure): ?>
                                    <div class="procedure-item-large">• <?php echo $procedure; ?></div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </a>

                <!-- Body Procedures -->
                <a href="procedimientos" class="procedure-card" style="background-image: url('assets/secciones/body.jpg');">
                    <div class="procedure-content">
                        <div class="procedure-text">
                            <?php echo $procData['body']['title']; ?>
                        </div>
                        <div class="procedure-info">
                            <div class="procedure-list-no-scroll">
                                <?php foreach($procData['body']['procedures'] as $procedure): ?>
                                    <div class="procedure-item-large">• <?php echo $procedure; ?></div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </a>

                <!-- Breast Procedures -->
                <a href="procedimientos" class="procedure-card" style="background-image: url('assets/secciones/breast.png');">
                    <div class="procedure-content">
                        <div class="procedure-text">
                            <?php echo $procData['breast']['title']; ?>
                        </div>
                        <div class="procedure-info">
                            <div class="procedure-list-no-scroll">
                                <?php foreach($procData['breast']['procedures'] as $procedure): ?>
                                    <div class="procedure-item-large">• <?php echo $procedure; ?></div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </a>

                <!-- Hair Procedures -->
                <a href="procedimientos" class="procedure-card" style="background-image: url('assets/secciones/hair.png');">
                    <div class="procedure-content">
                        <div class="procedure-text">
                            <?php echo $procData['hair']['title']; ?>
                        </div>
                        <div class="procedure-info">
                            <div class="procedure-list-no-scroll">
                                <?php foreach($procData['hair']['procedures'] as $procedure): ?>
                                    <div class="procedure-item-large">• <?php echo $procedure; ?></div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </a>

                <!-- Bariatric Care (antes Wellness) -->
                <a href="procedimientos" class="procedure-card" style="background-image: url('assets/secciones/wellness.png');">
                    <div class="procedure-content">
                        <div class="procedure-text">
                            <?php echo $procData['wellness']['title']; ?>
                        </div>
                        <div class="procedure-info">
                            <div class="procedure-list-no-scroll">
                                <?php foreach($procData['wellness']['procedures'] as $procedure): ?>
                                    <div class="procedure-item-large">• <?php echo $procedure; ?></div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Schedule Appointment Button -->
            <div class="text-center py-12 bg-gray-900">
                <a href="contactanos.php" class="inline-flex items-center space-x-3 border-2 border-white text-white px-8 py-4 rounded-lg font-medium text-lg hover:bg-white hover:text-gray-900 transition-all duration-300 transform hover:scale-105">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a1 1 0 011-1h6a1 1 0 011 1v4m-6 0v1m0-1h4m-4 0H7a3 3 0 00-3 3v8a3 3 0 003 3h10a3 3 0 003-3V10a3 3 0 00-3-3h-2.5"></path>
                    </svg>
                    <span><?php echo $currentLang === 'es' ? 'AGENDA UNA CITA' : 'SCHEDULE AN APPOINTMENT'; ?></span>
                </a>
            </div>
        </div>
    </section>

    <!-- Nueva Sección: Explora Bienestar y Turismo Médico en Ecuador -->
    <section class="pt-20 pb-12 bg-kasaami-pearl">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-9">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                    <?php echo $t['wellness_tourism']['title']; ?>
                </h2>
                <div class="max-w-5xl mx-auto">
                    <p class="text-xl text-gray-600 leading-relaxed">
                        <?php echo $t['wellness_tourism']['description']; ?>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Servicios Integrales Section con SVGs -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                    <?php echo $t['comprehensive_services']['title']; ?>
                </h2>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Bienestar y Recuperación Integral -->
                <div class="group text-center p-8 bg-white rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-500 border border-kasaami-pearl hover:border-kasaami-light-violet transform hover:-translate-y-3 hover:bg-gradient-to-br hover:from-kasaami-pearl hover:to-kasaami-light-violet">
                    <div class="w-20 h-20 bg-gradient-to-br from-kasaami-light-violet to-kasaami-violet rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg group-hover:shadow-2xl group-hover:from-kasaami-violet group-hover:to-kasaami-dark-violet transition-all duration-500 group-hover:scale-110">
                        <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C13.1 2 14 2.9 14 4C14 5.1 13.1 6 12 6C10.9 6 10 5.1 10 4C10 2.9 10.9 2 12 2ZM21 9V7L15 4V6C15 7.1 14.1 8 13 8V22H17V16H19V22H21V9ZM11 8C9.9 8 9 7.1 9 6V4L3 7V9H5V22H7V16H9V22H11V8Z"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-xl text-gray-900 mb-3 group-hover:text-kasaami-dark-violet transition-colors duration-300"><?php echo $t['comprehensive_services']['service1_title']; ?></h3>
                    <p class="text-gray-600 leading-relaxed group-hover:text-gray-700 transition-colors duration-300"><?php echo $t['comprehensive_services']['service1_desc']; ?></p>
                </div>

                <!-- Experiencias de Turismo Médico Personalizadas -->
                <div class="group text-center p-8 bg-white rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-500 border border-kasaami-pearl hover:border-kasaami-light-violet transform hover:-translate-y-3 hover:bg-gradient-to-br hover:from-kasaami-pearl hover:to-kasaami-light-violet">
                    <div class="w-20 h-20 bg-gradient-to-br from-kasaami-light-violet to-kasaami-violet rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg group-hover:shadow-2xl group-hover:from-kasaami-violet group-hover:to-kasaami-dark-violet transition-all duration-500 group-hover:scale-110">
                        <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M21 16v-2l-8-5V6.5c0-.83-.67-1.5-1.5-1.5S10 5.67 10 6.5V9l-8 5v2l8-2.5v4.5c0 .83.67 1.5 1.5 1.5s1.5-.67 1.5-1.5V14l8 2.5z"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-xl text-gray-900 mb-3 group-hover:text-kasaami-dark-violet transition-colors duration-300"><?php echo $t['comprehensive_services']['service2_title']; ?></h3>
                    <p class="text-gray-600 leading-relaxed group-hover:text-gray-700 transition-colors duration-300"><?php echo $t['comprehensive_services']['service2_desc']; ?></p>
                </div>

                <!-- Asistencia Completa en Trámites y Logística Médica -->
                <div class="group text-center p-8 bg-white rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-500 border border-kasaami-pearl hover:border-kasaami-light-violet transform hover:-translate-y-3 hover:bg-gradient-to-br hover:from-kasaami-pearl hover:to-kasaami-light-violet">
                    <div class="w-20 h-20 bg-gradient-to-br from-kasaami-light-violet to-kasaami-violet rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg group-hover:shadow-2xl group-hover:from-kasaami-violet group-hover:to-kasaami-dark-violet transition-all duration-500 group-hover:scale-110">
                        <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-xl text-gray-900 mb-3 group-hover:text-kasaami-dark-violet transition-colors duration-300"><?php echo $t['comprehensive_services']['service3_title']; ?></h3>
                    <p class="text-gray-600 leading-relaxed group-hover:text-gray-700 transition-colors duration-300"><?php echo $t['comprehensive_services']['service3_desc']; ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-20 bg-kasaami-pearl">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
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
    <?php include 'componentes/testimonios.php'; ?>

    <!-- Call to Action Section -->
    <section class="py-20 bg-gradient-to-r from-kasaami-violet to-kasaami-dark-violet text-white">
        <div class="max-w-4xl mx-auto text-center px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl md:text-5xl font-bold mb-6">
                <?php echo $t['cta']['title']; ?>
            </h2>
            <p class="text-xl mb-8 opacity-90">
                <?php echo $t['cta']['subtitle']; ?>
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="contactanos.php" class="bg-white text-kasaami-violet px-8 py-4 rounded-full font-semibold hover:bg-gray-100 transition-colors duration-200 transform hover:scale-105">
                    <?php echo $t['cta']['button1']; ?>
                </a>
                <a href="servicios.php" class="border-2 border-white text-white px-8 py-4 rounded-full font-semibold hover:bg-white hover:text-kasaami-violet transition-all duration-200 transform hover:scale-105">
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
        document.querySelectorAll('.feature-card').forEach(el => {
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