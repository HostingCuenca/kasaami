<?php
// pages/medicos-aliados.php
require_once('includes/init-language.php');
$pageTitle = setPageTitle(
    "Médicos Aliados - Kasaami Care & Beauty",
    "Medical Partners - Kasaami Care & Beauty"
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
            'title' => 'Únete al Equipo que Redefine el Turismo Médico en Ecuador',
            'subtitle' => 'Conectamos tu expertise con pacientes internacionales, para que seas parte de la revolución del turismo médico en el país.'
        ],
        'value_proposition' => [
            'title' => 'Tu práctica merece más que solo pacientes locales',
            'subtitle' => 'Expandimos tu alcance profesional conectándote con pacientes de todo el mundo que buscan excelencia médica.',
            'stats' => [
                ['number' => '300+', 'label' => 'Pacientes Internacionales Mensuales'],
                ['number' => '15+', 'label' => 'Países de Origen'],
                ['number' => '98%', 'label' => 'Satisfacción del Paciente'],
                ['number' => '24/7', 'label' => 'Soporte Integral']
            ]
        ],
        'specialties' => [
            'title' => 'Especialidades que Buscamos',
            'subtitle' => 'Conectamos especialistas de clase mundial',
            'list' => [
                [
                    'name' => 'Cirugía Plástica y Estética',
                    'description' => 'Rinoplastia, lifting facial, liposucción, aumento mamario',
                    'image' => 'assets/doctores/cirjuano.png',
                    'demand' => 'Alta Demanda'
                ],
                [
                    'name' => 'Otorrinolaringología',
                    'description' => 'Rinoplastia funcional, cirugía de sinusitis, septoplastia',
                    'image' => 'assets/doctores/doctor.png',
                    'demand' => 'Muy Solicitada'
                ],
                [
                    'name' => 'Cirugía Bariátrica',
                    'description' => 'Bypass gástrico, manga gástrica, balón intragástrico',
                    'image' => 'assets/doctores/especialistahombre.png',
                    'demand' => 'Creciente'
                ],
                [
                    'name' => 'Medicina Reproductiva',
                    'description' => 'FIV, inseminación artificial, preservación de fertilidad',
                    'image' => 'assets/doctores/dra1.png',
                    'demand' => 'Emergente'
                ],
                [
                    'name' => 'Trasplante Capilar',
                    'description' => 'FUE, FUT, microinjertos, tratamientos de alopecia',
                    'image' => 'assets/doctores/doctor2.png',
                    'demand' => 'Alta Demanda'
                ],
                [
                    'name' => 'Odontología Estética',
                    'description' => 'Diseño de sonrisa, implantes, carillas, blanqueamiento dental y armonización orofacial',
                    'image' => 'assets/doctores/especialistamujer.png',
                    'demand' => 'Creciente'
                ]
            ]
        ],
        'benefits' => [
            'title' => 'Beneficios de Ser Aliado Kasaami',
            'items' => [
                [
                    'icon' => 'patients',
                    'title' => 'Flujo Constante de Pacientes',
                    'description' => 'Recibe pacientes internacionales calificados y pre-evaluados mensualmente.',
                    'benefit' => 'Incrementa ingresos 40-60%'
                ],
                [
                    'icon' => 'support',
                    'title' => 'Soporte Integral 24/7',
                    'description' => 'Coordinación completa: traducción, logística, seguimiento postoperatorio.',
                    'benefit' => 'Enfócate solo en operar'
                ],
                [
                    'icon' => 'marketing',
                    'title' => 'Marketing Internacional',
                    'description' => 'Tu perfil y especialidades promocionados en mercados internacionales.',
                    'benefit' => 'Alcance global inmediato'
                ],
                [
                    'icon' => 'quality',
                    'title' => 'Certificación de Calidad',
                    'description' => 'Sello Kasaami que respalda tu expertise ante pacientes internacionales.',
                    'benefit' => 'Prestigio internacional'
                ]
            ]
        ],
        'process' => [
            'title' => 'Proceso de Alianza Estratégica',
            'subtitle' => 'Simplificamos tu entrada al turismo médico internacional',
            'steps' => [
                [
                    'number' => '01',
                    'title' => 'Evaluación Profesional',
                    'description' => 'Revisamos tus credenciales, experiencia y capacidades de infraestructura.',
                    'duration' => '5-7 días'
                ],
                [
                    'number' => '02',
                    'title' => 'Acuerdo de Colaboración',
                    'description' => 'Definimos términos, comisiones y protocolos de atención específicos.',
                    'duration' => '3-5 días'
                ],
                [
                    'number' => '03',
                    'title' => 'Capacitación Kasaami',
                    'description' => 'Entrenamiento en protocolos, manejo de pacientes internacionales y sistemas.',
                    'duration' => '2 semanas'
                ],
                [
                    'number' => '04',
                    'title' => 'Lanzamiento y Promoción',
                    'description' => 'Creación de perfil, sesión fotográfica profesional y campaña de lanzamiento.',
                    'duration' => '1-2 semanas'
                ],
                [
                    'number' => '05',
                    'title' => 'Primeros Pacientes',
                    'description' => 'Asignación de casos iniciales con acompañamiento completo del equipo.',
                    'duration' => 'Inmediato'
                ],
                [
                    'number' => '06',
                    'title' => 'Crecimiento Sostenido',
                    'description' => 'Incremento gradual de casos basado en resultados y capacidad instalada.',
                    'duration' => 'Continuo'
                ]
            ]
        ],
        'testimonials' => [
            'title' => 'Médicos Aliados Comparten su Experiencia',
            'items' => [
                [
                    'text' => 'Desde que me uní a Kasaami, mi práctica se transformó completamente. Ahora atiendo pacientes de Estados Unidos y Canadá regularmente, y el soporte del equipo es excepcional.',
                    'name' => 'Dr. Carlos Mendoza',
                    'specialty' => 'Cirujano Plástico',
                    'experience' => '2 años con Kasaami',
                    'image' => 'assets/doctores/cirjuano.png'
                ],
                [
                    'text' => 'La coordinación es perfecta. Los pacientes llegan preparados, con expectativas claras, y todo el proceso postoperatorio está cubierto. Puedo enfocarme 100% en la medicina.',
                    'name' => 'Dra. María González',
                    'specialty' => 'Especialista en Fertilidad',
                    'experience' => '18 meses con Kasaami',
                    'image' => 'assets/doctores/dra1.png'
                ],
                [
                    'text' => 'Mi consulta creció 200% en ingresos. Kasaami no solo trae pacientes, sino que maneja toda la experiencia turística. Es medicina de primer mundo en Ecuador.',
                    'name' => 'Dr. Roberto Silva',
                    'specialty' => 'Otorrinolaringólogo',
                    'experience' => '3 años con Kasaami',
                    'image' => 'assets/doctores/doctor.png'
                ]
            ]
        ],
        'requirements' => [
            'title' => 'Requisitos para Ser Aliado Kasaami',
            'subtitle' => 'Mantenemos los más altos estándares de calidad',
            'essential' => [
                'Título médico válido y especialización certificada',
                'Mínimo 5 años de experiencia en tu especialidad',
                'Instalaciones quirúrgicas certificadas y equipadas',
                'Dominio básico del inglés (apoyo de traducción disponible)'
            ],
            'preferred' => [
                'Experiencia previa con pacientes internacionales',
                'Certificaciones internacionales adicionales',
                'Equipo médico propio (anestesiólogos, enfermeras)',
                'Ubicación en Quito o ciudades principales'
            ]
        ],
        'cta_form' => [
            'title' => '¿Listo para Expandir tu Práctica Médica?',
            'subtitle' => 'Únete a la red de especialistas más prestigiosa de Ecuador',
            'description' => 'Completa el formulario y nuestro equipo se pondrá en contacto contigo en 24 horas.',
            'form' => [
                'name' => 'Nombre completo',
                'email' => 'Correo electrónico profesional',
                'phone' => 'Teléfono de contacto',
                'specialty' => 'Especialidad médica',
                'experience' => 'Años de experiencia',
                'location' => 'Ciudad de práctica',
                'message' => 'Cuéntanos sobre tu práctica actual',
                'submit' => 'Solicitar Información Detallada'
            ]
        ],
        'footer' => [
            'description' => 'Transformamos vidas conectando especialistas ecuatorianos con pacientes internacionales.',
            'rights' => 'Todos los derechos reservados'
        ],
        'whatsapp' => [
            'message' => 'Hola! Soy médico especialista y me interesa ser aliado de Kasaami Care & Beauty.',
            'tooltip' => 'Escríbenos por WhatsApp'
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
            'title' => 'Join the Team Redefining Medical Tourism in Ecuador',
            'subtitle' => 'We connect your expertise with international patients, so you can be part of the medical tourism revolution in the country.'
        ],
        'value_proposition' => [
            'title' => 'Your practice deserves more than just local patients',
            'subtitle' => 'We expand your professional reach by connecting you with patients from around the world seeking medical excellence.',
            'stats' => [
                ['number' => '300+', 'label' => 'International Patients Monthly'],
                ['number' => '15+', 'label' => 'Countries of Origin'],
                ['number' => '98%', 'label' => 'Patient Satisfaction'],
                ['number' => '24/7', 'label' => 'Comprehensive Support']
            ]
        ],
        'specialties' => [
            'title' => 'Specialties We Seek',
            'subtitle' => 'Connecting world-class specialists',
            'list' => [
                [
                    'name' => 'Plastic & Aesthetic Surgery',
                    'description' => 'Rhinoplasty, facelift, liposuction, breast augmentation',
                    'image' => 'assets/doctores/cirjuano.png',
                    'demand' => 'High Demand'
                ],
                [
                    'name' => 'Otolaryngology',
                    'description' => 'Functional rhinoplasty, sinus surgery, septoplasty',
                    'image' => 'assets/doctores/doctor.png',
                    'demand' => 'Very Requested'
                ],
                [
                    'name' => 'Bariatric Surgery',
                    'description' => 'Gastric bypass, gastric sleeve, intragastric balloon',
                    'image' => 'assets/doctores/especialistahombre.png',
                    'demand' => 'Growing'
                ],
                [
                    'name' => 'Reproductive Medicine',
                    'description' => 'IVF, artificial insemination, fertility preservation',
                    'image' => 'assets/doctores/dra1.png',
                    'demand' => 'Emerging'
                ],
                [
                    'name' => 'Hair Transplant',
                    'description' => 'FUE, FUT, micrografts, alopecia treatments',
                    'image' => 'assets/doctores/doctor2.png',
                    'demand' => 'High Demand'
                ],
                [
                    'name' => 'Aesthetic Dentistry',
                    'description' => 'Smile design, implants, veneers, dental whitening and orofacial harmonization',
                    'image' => 'assets/doctores/especialistamujer.png',
                    'demand' => 'Growing'
                ]
            ]
        ],
        'benefits' => [
            'title' => 'Benefits of Being a Kasaami Partner',
            'items' => [
                [
                    'icon' => 'patients',
                    'title' => 'Constant Patient Flow',
                    'description' => 'Receive qualified and pre-evaluated international patients monthly.',
                    'benefit' => 'Increase income 40-60%'
                ],
                [
                    'icon' => 'support',
                    'title' => 'Comprehensive 24/7 Support',
                    'description' => 'Complete coordination: translation, logistics, postoperative follow-up.',
                    'benefit' => 'Focus only on operating'
                ],
                [
                    'icon' => 'marketing',
                    'title' => 'International Marketing',
                    'description' => 'Your profile and specialties promoted in international markets.',
                    'benefit' => 'Immediate global reach'
                ],
                [
                    'icon' => 'quality',
                    'title' => 'Quality Certification',
                    'description' => 'Kasaami seal that endorses your expertise to international patients.',
                    'benefit' => 'International prestige'
                ]
            ]
        ],
        'process' => [
            'title' => 'Strategic Partnership Process',
            'subtitle' => 'We simplify your entry into international medical tourism',
            'steps' => [
                [
                    'number' => '01',
                    'title' => 'Professional Evaluation',
                    'description' => 'We review your credentials, experience and infrastructure capabilities.',
                    'duration' => '5-7 days'
                ],
                [
                    'number' => '02',
                    'title' => 'Collaboration Agreement',
                    'description' => 'We define terms, commissions and specific care protocols.',
                    'duration' => '3-5 days'
                ],
                [
                    'number' => '03',
                    'title' => 'Kasaami Training',
                    'description' => 'Training in protocols, international patient management and systems.',
                    'duration' => '2 weeks'
                ],
                [
                    'number' => '04',
                    'title' => 'Launch and Promotion',
                    'description' => 'Profile creation, professional photo session and launch campaign.',
                    'duration' => '1-2 weeks'
                ],
                [
                    'number' => '05',
                    'title' => 'First Patients',
                    'description' => 'Assignment of initial cases with complete team support.',
                    'duration' => 'Immediate'
                ],
                [
                    'number' => '06',
                    'title' => 'Sustained Growth',
                    'description' => 'Gradual increase in cases based on results and installed capacity.',
                    'duration' => 'Continuous'
                ]
            ]
        ],
        'testimonials' => [
            'title' => 'Allied Doctors Share Their Experience',
            'items' => [
                [
                    'text' => 'Since I joined Kasaami, my practice was completely transformed. I now regularly treat patients from the United States and Canada, and the team support is exceptional.',
                    'name' => 'Dr. Carlos Mendoza',
                    'specialty' => 'Plastic Surgeon',
                    'experience' => '2 years with Kasaami',
                    'image' => 'assets/doctores/cirjuano.png'
                ],
                [
                    'text' => 'The coordination is perfect. Patients arrive prepared, with clear expectations, and the entire postoperative process is covered. I can focus 100% on medicine.',
                    'name' => 'Dr. María González',
                    'specialty' => 'Fertility Specialist',
                    'experience' => '18 months with Kasaami',
                    'image' => 'assets/doctores/dra1.png'
                ],
                [
                    'text' => 'My practice grew 200% in income. Kasaami not only brings patients, but manages the entire tourist experience. It\'s first-world medicine in Ecuador.',
                    'name' => 'Dr. Roberto Silva',
                    'specialty' => 'Otolaryngologist',
                    'experience' => '3 years with Kasaami',
                    'image' => 'assets/doctores/doctor.png'
                ]
            ]
        ],
        'requirements' => [
            'title' => 'Requirements to be a Kasaami Partner',
            'subtitle' => 'We maintain the highest quality standards',
            'essential' => [
                'Valid medical degree and certified specialization',
                'Minimum 5 years of experience in your specialty',
                'Certified and equipped surgical facilities',
                'Basic English proficiency (translation support available)'
            ],
            'preferred' => [
                'Previous experience with international patients',
                'Additional international certifications',
                'Own medical team (anesthesiologists, nurses)',
                'Location in Quito or major cities'
            ]
        ],
        'cta_form' => [
            'title' => 'Ready to Expand Your Medical Practice?',
            'subtitle' => 'Join Ecuador\'s most prestigious network of specialists',
            'description' => 'Complete the form and our team will contact you within 24 hours.',
            'form' => [
                'name' => 'Full name',
                'email' => 'Professional email',
                'phone' => 'Contact phone',
                'specialty' => 'Medical specialty',
                'experience' => 'Years of experience',
                'location' => 'Practice city',
                'message' => 'Tell us about your current practice',
                'submit' => 'Request Detailed Information'
            ]
        ],
        'footer' => [
            'description' => 'We transform lives by connecting Ecuadorian specialists with international patients.',
            'rights' => 'All rights reserved'
        ],
        'whatsapp' => [
            'message' => 'Hello! I am a medical specialist and I am interested in being a partner of Kasaami Care & Beauty.',
            'tooltip' => 'Write us on WhatsApp'
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
    <meta name="keywords" content="médicos aliados, turismo médico, Ecuador, especialistas, cirujanos">
    <meta name="author" content="Kasaami Care & Beauty">
    
    <!-- Favicon -->
    <link rel="icon" type="image/jpeg" href="public/favicon.jpg">
    <link rel="shortcut icon" href="public/favicon.jpg">
    <link rel="apple-touch-icon" href="public/favicon.jpg">
    
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
                        'float': 'float 3s ease-in-out infinite',
                        'pulse-slow': 'pulse 3s ease-in-out infinite'
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
        .parallax {
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        
        .hover-lift {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .hover-lift:hover {
            transform: translateY(-8px);
            box-shadow: 0 25px 50px -12px rgba(139, 92, 246, 0.25);
        }

        .specialty-card {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            transform-style: preserve-3d;
        }

        .specialty-card:hover {
            transform: rotateY(10deg) rotateX(5deg) scale(1.05);
        }

        .floating-element {
            animation: float 6s ease-in-out infinite;
        }

        .floating-element:nth-child(2) {
            animation-delay: -2s;
        }

        .floating-element:nth-child(3) {
            animation-delay: -4s;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .step-connector {
            position: relative;
        }

        .step-connector::after {
            content: '';
            position: absolute;
            top: 50%;
            right: -25px;
            width: 50px;
            height: 2px;
            background: linear-gradient(90deg, #8B5CF6, transparent);
            transform: translateY(-50%);
        }

        .step-connector:last-child::after {
            display: none;
        }

        @media (max-width: 768px) {
            .step-connector::after {
                top: 100%;
                right: 50%;
                width: 2px;
                height: 50px;
                background: linear-gradient(180deg, #8B5CF6, transparent);
                transform: translateX(50%);
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
            <div class="mb-6">
                <span class="inline-block px-4 py-2 bg-kasaami-dark-violet text-sm font-semibold rounded-full mb-4 animate-slide-up">
                   <?php echo $currentLang === 'es' ? 'Para Médicos Especialistas' : 'For Medical Specialists'; ?>
                </span>
            </div>
            
            <h1 class="text-5xl md:text-7xl font-filson font-bold mb-6 animate-slide-up">
                <?php echo $t['hero']['title']; ?>
            </h1>
            
            <p class="text-xl md:text-2xl opacity-90 animate-slide-up max-w-3xl mx-auto leading-relaxed" style="animation-delay: 0.2s;">
                <?php echo $t['hero']['subtitle']; ?>
            </p>
            
            <div class="flex flex-col sm:flex-row gap-4 justify-center mt-8 animate-slide-up" style="animation-delay: 0.4s;">
                <button onclick="document.getElementById('cta-form').scrollIntoView({ behavior: 'smooth' })" class="bg-kasaami-dark-violet border-violet px-8 py-4 rounded-full font-semibold text-lg hover:bg-white hover:text-kasaami-violet transition-all duration-300 transform hover:scale-105">
                    <?php echo $currentLang === 'es' ? 'Únete Ahora' : 'Join Now'; ?>
                </button>
                <button onclick="document.getElementById('benefits').scrollIntoView({ behavior: 'smooth' })" class="border-2 border-white text-white px-8 py-4 rounded-full font-semibold hover:bg-white hover:text-kasaami-violet transition-all duration-200 transform hover:scale-105">
                    <?php echo $currentLang === 'es' ? 'Ver Beneficios' : 'See Benefits'; ?>
                </button>
            </div>
        </div>
    </section>

    <!-- Value Proposition Section -->
    <section class="relative py-20 bg-gradient-to-b from-kasaami-pearl to-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-filson font-bold text-gray-900 mb-6">
                    <?php echo $t['value_proposition']['title']; ?>
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    <?php echo $t['value_proposition']['subtitle']; ?>
                </p>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-16">
                <?php foreach ($t['value_proposition']['stats'] as $stat): ?>
                <div class="text-center p-6 glass-card rounded-2xl hover-lift">
                    <div class="text-4xl md:text-5xl font-bold text-kasaami-violet mb-2">
                        <?php echo $stat['number']; ?>
                    </div>
                    <div class="text-gray-600 font-medium">
                        <?php echo $stat['label']; ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Specialties Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-filson font-bold text-gray-900 mb-6">
                    <?php echo $t['specialties']['title']; ?>
                </h2>
                <p class="text-xl text-gray-600">
                    <?php echo $t['specialties']['subtitle']; ?>
                </p>
            </div>

            <!-- Hexagonal Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php foreach ($t['specialties']['list'] as $index => $specialty): ?>
                <div class="specialty-card group relative">
                    <div class="bg-gradient-to-br from-kasaami-pearl to-white p-8 rounded-2xl shadow-lg border border-kasaami-violet/10 h-full">
                        <!-- Image -->
                        <div class="relative mb-6">
                            <div class="w-24 h-24 mx-auto rounded-full overflow-hidden ring-4 ring-kasaami-violet/20 group-hover:ring-kasaami-violet/40 transition-all duration-300">
                                <img src="<?php echo $specialty['image']; ?>" alt="<?php echo $specialty['name']; ?>" class="w-full h-full object-cover">
                            </div>
                            <!-- Demand Badge con colores Kasaami -->
                            <span class="absolute -top-2 -right-2 bg-gradient-to-r from-kasaami-violet to-kasaami-dark-violet text-white text-xs px-3 py-1 rounded-full font-semibold shadow-lg">
                                <?php echo $specialty['demand']; ?>
                            </span>
                        </div>

                        <!-- Content -->
                        <h3 class="text-xl font-filson font-bold text-gray-900 mb-3 text-center">
                            <?php echo $specialty['name']; ?>
                        </h3>
                        <p class="text-gray-600 text-center leading-relaxed">
                            <?php echo $specialty['description']; ?>
                        </p>

                        <!-- Hover Effect -->
                        <div class="absolute inset-0 bg-kasaami-violet/5 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Benefits Section -->
    <section id="benefits" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-filson font-bold text-gray-900 mb-6">
                    <?php echo $t['benefits']['title']; ?>
                </h2>
            </div>

            <!-- Benefits Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <?php foreach ($t['benefits']['items'] as $benefit): ?>
                <div class="bg-white p-8 rounded-2xl shadow-lg hover-lift">
                    <div class="flex items-start space-x-4">
                        <div class="w-16 h-16 bg-gradient-to-br from-kasaami-violet to-kasaami-dark-violet rounded-full flex items-center justify-center flex-shrink-0">
                            <?php if ($benefit['icon'] === 'patients'): ?>
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                    <path d="M4 9a2 2 0 0 0-2 2v2a2 2 0 0 0 2 2h4a1 1 0 0 1 1 1v4a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2v-4a1 1 0 0 1 1-1h4a2 2 0 0 0 2-2v-2a2 2 0 0 0-2-2h-4a1 1 0 0 1-1-1V4a2 2 0 0 0-2-2h-2a2 2 0 0 0-2 2v4a1 1 0 0 1-1 1z"/>
                                </svg>
                            <?php elseif ($benefit['icon'] === 'support'): ?>
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                    <path d="M3 11h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-5Zm0 0a9 9 0 1 1 18 0m0 0v5a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3Z"/>
                                    <path d="M21 16v2a4 4 0 0 1-4 4h-5"/>
                                </svg>
                            <?php elseif ($benefit['icon'] === 'marketing'): ?>
                                <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zM4 12c0-.61.08-1.21.21-1.78L9.99 16v1c0 1.1.9 2 2 2v1.93C7.06 19.43 4 16.07 4 12zm13.89 5.4c-.26-.81-1-1.4-1.89-1.4h-1v-3c0-.55-.45-1-1-1h-6v-2h2c.55 0 1-.45 1-1V7h2c1.1 0 2-.9 2-2v-.41C17.92 5.77 20 8.65 20 12c0 2.08-.81 3.98-2.11 5.4z"/>
                                </svg>
                            <?php else: ?>
                                <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                </svg>
                            <?php endif; ?>
                        </div>
                        
                        <div class="flex-1">
                            <h3 class="text-xl font-filson font-bold text-gray-900 mb-2">
                                <?php echo $benefit['title']; ?>
                            </h3>
                            <p class="text-gray-600 mb-3 leading-relaxed">
                                <?php echo $benefit['description']; ?>
                            </p>
                            <span class="inline-block px-3 py-1 bg-kasaami-light-violet text-kasaami-dark-violet text-sm font-semibold rounded-full">
                                <?php echo $benefit['benefit']; ?>
                            </span>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Process Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-filson font-bold text-gray-900 mb-6">
                    <?php echo $t['process']['title']; ?>
                </h2>
                <p class="text-xl text-gray-600">
                    <?php echo $t['process']['subtitle']; ?>
                </p>
            </div>

            <!-- Process Steps -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php foreach ($t['process']['steps'] as $step): ?>
                <div class="step-connector relative">
                    <div class="bg-gradient-to-br from-kasaami-pearl to-white p-6 rounded-2xl border border-kasaami-violet/10 hover-lift h-full">
                        <!-- Step Number -->
                        <div class="w-12 h-12 bg-gradient-to-br from-kasaami-violet to-kasaami-dark-violet text-white rounded-full flex items-center justify-center font-bold text-lg mb-4">
                           <?php echo $step['number']; ?>
                       </div>
                       
                       <h3 class="text-lg font-filson font-bold text-gray-900 mb-3">
                           <?php echo $step['title']; ?>
                       </h3>
                       
                       <p class="text-gray-600 leading-relaxed mb-4">
                           <?php echo $step['description']; ?>
                       </p>
                       
                       <div class="flex items-center text-sm text-kasaami-violet">
                           <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                               <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                           </svg>
                           <?php echo $currentLang === 'es' ? 'Duración: ' : 'Duration: '; ?><?php echo $step['duration']; ?>
                       </div>
                   </div>
               </div>
               <?php endforeach; ?>
           </div>
       </div>
   </section>

   <!-- Testimonials Section -->
   <section class="py-20 bg-gray-50">
       <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
           <div class="text-center mb-16">
               <h2 class="text-4xl md:text-5xl font-filson font-bold text-gray-900 mb-6">
                   <?php echo $t['testimonials']['title']; ?>
               </h2>
           </div>

           <!-- Testimonials Grid -->
           <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
               <?php foreach ($t['testimonials']['items'] as $testimonial): ?>
               <div class="bg-white p-8 rounded-2xl shadow-lg hover-lift">
                   <!-- Stars -->
                   <div class="flex items-center mb-4">
                       <?php for($i = 0; $i < 5; $i++): ?>
                       <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                           <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                       </svg>
                       <?php endfor; ?>
                   </div>
                   
                   <!-- Testimonial Text -->
                   <blockquote class="text-gray-600 mb-6 italic leading-relaxed">
                       "<?php echo $testimonial['text']; ?>"
                   </blockquote>
                   
                   <!-- Doctor Info -->
                   <div class="flex items-center border-t pt-6">
                       <img src="<?php echo $testimonial['image']; ?>" alt="<?php echo $testimonial['name']; ?>" class="w-16 h-16 rounded-full object-cover mr-4 border-2 border-kasaami-violet/20">
                       <div>
                           <p class="font-semibold text-gray-900 text-lg"><?php echo $testimonial['name']; ?></p>
                           <p class="text-kasaami-violet font-medium"><?php echo $testimonial['specialty']; ?></p>
                           <p class="text-gray-500 text-sm"><?php echo $testimonial['experience']; ?></p>
                       </div>
                   </div>
               </div>
               <?php endforeach; ?>
           </div>
       </div>
   </section>

   <!-- Requirements Section with purple/gray colors -->
   <section class="py-20 bg-white">
       <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
           <div class="text-center mb-16">
               <h2 class="text-4xl md:text-5xl font-filson font-bold text-gray-900 mb-6">
                   <?php echo $t['requirements']['title']; ?>
               </h2>
               <p class="text-xl text-gray-600">
                   <?php echo $t['requirements']['subtitle']; ?>
               </p>
           </div>

           <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
               <!-- Essential Requirements - Purple Theme -->
               <div class="bg-gradient-to-br from-kasaami-pearl to-purple-50 p-8 rounded-2xl border border-kasaami-violet/20">
                   <div class="flex items-center mb-6">
                       <div class="w-12 h-12 bg-kasaami-violet rounded-full flex items-center justify-center mr-4">
                           <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                               <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                           </svg>
                       </div>
                       <h3 class="text-2xl font-filson font-bold text-gray-900">
                           <?php echo $currentLang === 'es' ? 'Requisitos Esenciales' : 'Essential Requirements'; ?>
                       </h3>
                   </div>
                   
                   <ul class="space-y-4">
                       <?php foreach ($t['requirements']['essential'] as $req): ?>
                       <li class="flex items-start">
                           <svg class="w-5 h-5 text-kasaami-violet mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                               <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                           </svg>
                           <span class="text-gray-700"><?php echo $req; ?></span>
                       </li>
                       <?php endforeach; ?>
                   </ul>
               </div>

               <!-- Preferred Requirements - Gray Theme -->
               <div class="bg-gradient-to-br from-gray-50 to-slate-100 p-8 rounded-2xl border border-gray-300">
                   <div class="flex items-center mb-6">
                       <div class="w-12 h-12 bg-gray-600 rounded-full flex items-center justify-center mr-4">
                           <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                               <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                           </svg>
                       </div>
                       <h3 class="text-2xl font-filson font-bold text-gray-900">
                           <?php echo $currentLang === 'es' ? 'Requisitos Preferidos' : 'Preferred Requirements'; ?>
                       </h3>
                   </div>
                   
                   <ul class="space-y-4">
                       <?php foreach ($t['requirements']['preferred'] as $req): ?>
                       <li class="flex items-start">
                           <svg class="w-5 h-5 text-gray-600 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                               <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                           </svg>
                           <span class="text-gray-700"><?php echo $req; ?></span>
                       </li>
                       <?php endforeach; ?>
                   </ul>
               </div>
           </div>
       </div>
   </section>

   <!-- Commented out form section - replaced with simple CTA -->
   <!--
   <section id="cta-form" class="py-20 bg-gradient-to-br from-kasaami-violet to-kasaami-dark-violet text-white relative overflow-hidden">
       <div class="absolute inset-0">
           <div class="floating-element absolute top-10 left-10 w-40 h-40 bg-white/5 rounded-full blur-xl"></div>
           <div class="floating-element absolute bottom-20 right-20 w-60 h-60 bg-white/10 rounded-full blur-2xl"></div>
       </div>

       <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
           <div class="text-center mb-12">
               <h2 class="text-4xl md:text-5xl font-filson font-bold mb-4">
                   <?php echo $t['cta_form']['title']; ?>
               </h2>
               <p class="text-xl opacity-90 mb-4">
                   <?php echo $t['cta_form']['subtitle']; ?>
               </p>
               <p class="text-lg opacity-75">
                   <?php echo $t['cta_form']['description']; ?>
               </p>
           </div>
           
           <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-8 border border-white/20">
               <form id="doctor-form" class="space-y-6">
                   [Form content commented out]
               </form>
           </div>
       </div>
   </section>
   -->

   <!-- New Simple CTA Section -->
   <section id="cta-contact" class="py-20 bg-gradient-to-br from-kasaami-violet to-kasaami-dark-violet text-white relative overflow-hidden">
       <!-- Background Pattern -->
       <div class="absolute inset-0">
           <div class="floating-element absolute top-10 left-10 w-40 h-40 bg-white/5 rounded-full blur-xl"></div>
           <div class="floating-element absolute bottom-20 right-20 w-60 h-60 bg-white/10 rounded-full blur-2xl"></div>
       </div>

       <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
           <h2 class="text-4xl md:text-5xl font-filson font-bold mb-6">
               <?php echo $t['cta_form']['title']; ?>
           </h2>
           <p class="text-xl opacity-90 mb-4">
               <?php echo $t['cta_form']['subtitle']; ?>
           </p>
           <p class="text-lg opacity-75 mb-12 max-w-2xl mx-auto">
               <?php echo $t['cta_form']['description']; ?>
           </p>

           <!-- CTA Button -->
           <div class="flex justify-center">
               <button onclick="openWhatsAppDoctors()" class="bg-purple-600 text-white px-12 py-4 rounded-xl font-semibold text-lg hover:bg-purple-700 transition-all duration-300 transform hover:scale-105 shadow-lg flex items-center justify-center gap-3 min-w-[300px]">
                   <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                       <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"/>
                   </svg>
                   <?php echo $currentLang === 'es' ? 'Solicitar Información' : 'Request Information'; ?>
               </button>
           </div>

           <!-- Additional Info -->
           <div class="mt-12 opacity-80">
               <p class="text-sm">
                   <?php echo $currentLang === 'es' ? '🩺 Te contactaremos en menos de 24 horas para una reunión personalizada' : '🩺 We will contact you within 24 hours for a personalized meeting'; ?>
               </p>
           </div>
       </div>
   </section>

   <!-- Footer -->
   <?php include 'includes/Footer.php'; ?>

   <!-- WhatsApp Button -->
   <?php include 'includes/FlotanteWpp.php'; ?>

   <script>
       // Global language variable
       const currentLang = '<?php echo $currentLang; ?>';
       
       // CTA Function for WhatsApp
       function openWhatsAppDoctors() {
           const message = currentLang === 'es' 
               ? '🩺 Hola! Soy médico especialista y me interesa ser aliado de Kasaami Care & Beauty. Me gustaría conocer más detalles sobre la alianza estratégica.'
               : '🩺 Hello! I am a medical specialist and I am interested in being a partner of Kasaami Care & Beauty. I would like to know more details about the strategic partnership.';
           
           const whatsappNumber = "593963052401";
           const whatsappURL = `https://wa.me/${whatsappNumber}?text=${encodeURIComponent(message)}`;
           
           window.open(whatsappURL, '_blank');
       }

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
       document.querySelectorAll('.hover-lift, .specialty-card').forEach(el => {
           observer.observe(el);
       });

       // Parallax effect for floating elements
       window.addEventListener('scroll', () => {
           const scrolled = window.pageYOffset;
           const floatingElements = document.querySelectorAll('.floating-element');
           
           floatingElements.forEach((el, index) => {
               const speed = 0.1 + (index * 0.05);
               const yPos = -(scrolled * speed);
               el.style.transform = `translateY(${yPos}px)`;
           });
       });

       // Add dynamic hover effects to specialty cards
       document.querySelectorAll('.specialty-card').forEach(card => {
           card.addEventListener('mouseenter', function() {
               this.style.transform = 'rotateY(10deg) rotateX(5deg) scale(1.05)';
           });
           
           card.addEventListener('mouseleave', function() {
               this.style.transform = 'rotateY(0deg) rotateX(0deg) scale(1)';
           });
       });
   </script>
</body>
</html>