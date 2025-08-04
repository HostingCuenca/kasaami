<?php
// contactanos.php
$pageTitle = "Contacto - Kasaami Care & Beauty";
$currentLang = $_GET['lang'] ?? 'es';

// Include countries data
require_once 'includes/paises.php';

// Language content
$content = [
    'es' => [
        'nav' => [
            'about' => 'Sobre Nosotros',
            'services' => 'Servicios', 
            'procedures' => 'Procedimientos'
        ],
        'hero' => [
            'title' => 'Contáctanos',
            'subtitle' => 'Diseñamos experiencias a tu medida. Agenda tu asesoría gratuita y empieza tu viaje con Kasaami.'
        ],
        'video' => [
            'title' => 'Descubre Nuestro Proceso',
            'subtitle' => 'Así es como en Kasaami transformamos tu vida en Ecuador.'
        ],
        'why_contact' => [
            'title' => '¿Por qué ponerse en contacto con nosotros?',
            'subtitle' => 'Diseñamos experiencias a tu medida. Agenda tu asesoría gratuita y empieza tu viaje con Kasaami.',
            'benefits' => [
                [
                    'icon' => 'consultation',
                    'title' => 'Asesoría Gratuita',
                    'description' => 'Conversa sin compromiso con un asesor experto en turismo médico. Estamos aquí para escucharte y guiarte. Asesoría inicial sin costo.'
                ],
                [
                    'icon' => 'package',
                    'title' => 'Primera Consulta de Cortesía',
                    'description' => 'Comparte tus objetivos y dudas con un especialista que entiende lo que necesitas. Consulta médica y estética sin compromiso, 100% adaptada a ti.'
                ],
                [
                    'icon' => 'privacy',
                    'title' => 'Paquete Diseñado a Medida',
                    'description' => 'Recibe una propuesta única que une salud, belleza y viaje en una sola experiencia. Planes personalizados de cirugía estética + turismo de bienestar.'
                ],
                [
                    'icon' => 'experience',
                    'title' => 'Privacidad Garantizada',
                    'description' => 'Tu proceso será totalmente confidencial. Cuidamos cada detalle con máxima discreción. Confianza, privacidad y atención exclusiva de principio a fin.'
                ]
            ]
        ],
        'calendar' => [
            'title' => 'Selecciona tu fecha y hora preferida',
            'select_date' => 'Seleccionar fecha',
            'select_time' => 'Seleccionar hora',
            'available_times' => [
                '09:00' => '9:00 AM',
                '10:00' => '10:00 AM', 
                '11:00' => '11:00 AM',
                '14:00' => '2:00 PM',
                '15:00' => '3:00 PM',
                '16:00' => '4:00 PM'
            ]
        ],
        'form' => [
            'title' => 'Queremos Conocerte',
            'subtitle' => 'Completa el formulario y agenda una conversación con nuestros expertos en turismo médico. Te guiaremos paso a paso para crear la experiencia médica perfecta para ti, combinando atención de primer nivel, bienestar y hospitalidad.',
            'name' => 'Nombre',
            'lastname' => 'Apellido', 
            'email' => 'Correo electrónico',
            'phone' => 'Teléfono/Móvil',
            'country' => 'País del pasaporte',
            'budget' => 'Presupuesto por persona (excluidos vuelos) en USD',
            'budget_options' => [
                '4000-8000' => '$4,000 a $8,000',
                '8000-12000' => '$8,000 a $12,000', 
                '12000-16000' => '$12,000 a $16,000',
                '16000-20000' => '$16,000 a $20,000',
                '20000+' => '$20,000+'
            ],
            'travel_time' => '¿Cuándo tiene previsto viajar?',
            'travel_options' => [
                'next_month' => 'Próximo mes',
                '2-3_months' => '2-3 meses',
                '4-6_months' => '4-6 meses',
                '6+_months' => '+6 meses'
            ],
            'interest' => '¿Le interesa un paquete de viaje preestablecido o una solución a medida?',
            'interest_options' => [
                'preset' => 'Paquete preestablecido',
                'custom' => 'Paquete personalizado'
            ],
            'travel_type' => 'Viajar',
            'travel_type_options' => [
                'solo' => 'Solo',
                'friend' => 'Con un amigo',
                'partner' => 'Con un compañero', 
                'group' => 'Grupo'
            ],
            'group_size' => '¿Cuántas personas hay en su grupo (incluido usted)?',
            'objectives' => 'Explíquenos sus objetivos de viaje y en qué podemos ayudarle',
            'objectives_placeholder' => 'Comparta su consulta aquí, incluyendo cualquier requisito específico, y nos pondremos en contacto con usted lo antes posible.',
            'found_us' => '¿Cómo nos ha encontrado?',
            'found_options' => [
                'google' => 'Google (u otro motor de búsqueda)',
                'social' => 'Redes sociales',
                'referral' => 'Remisión', 
                'other' => 'Otros'
            ],
            'contact_preference' => '¿Cómo prefiere que nos pongamos en contacto con usted?',
            'contact_options' => [
                'email' => 'Correo electrónico',
                'phone' => 'Teléfono',
                'whatsapp' => 'WhatsApp'
            ],
            'terms' => 'He leído los términos y condiciones',
            'privacy' => 'Acepto los paquetes de turismo médico Condiciones generales he leído el Política de privacidad y acepto que los datos que he proporcionado, incluidos los datos sanitarios, sean procesados por Medical Tourism Packages con el fin de obtener presupuestos.',
            'submit' => 'ENVIAR',
            'required' => 'Campo requerido'
        ],
        'contact_direct' => [
            'title' => '¿Necesitas más información?',
            'subtitle' => 'Comunícate con nosotros por cualquiera de nuestros canales disponibles.',
            'whatsapp_title' => 'WhatsApp',
            'whatsapp_desc' => 'Escríbenos y uno de nuestros asesores te atenderá',
            'whatsapp_number' => '+593 96 305 2401',
            'email_title' => 'Correo Electrónico', 
            'email_desc' => 'Envíanos un correo electrónico para poder resolver tus dudas',
            'email_address' => 'info@kasaamigroup.com',
            'location_title' => 'Ubicación',
            'location_desc' => 'Av. Mariano Paredes, entre Tadeo Benitez y Jonatan Saenz, Edificio Atika\nQuito, Ecuador'
        ],
        'no_email' => [
            'title' => '¡Servicio de correo no disponible!',
            'message' => 'Actualmente nuestro sistema de correo está en mantenimiento. Por favor, contáctanos directamente a través de los siguientes medios:',
            'whatsapp' => 'WhatsApp: +593 96 305 2401',
            'phone' => 'Teléfono: +593 96 305 2401',
            'email_alt' => 'Email: info@kasaami.com'
        ],
        'success' => [
            'title' => '¡Consulta Enviada!',
            'message' => 'Hemos recibido tu consulta. Te contactaremos pronto para programar tu cita.',
            'next_steps' => 'Próximos pasos:',
            'step1' => 'Recibirás un email de confirmación',
            'step2' => 'Nuestro equipo te contactará en 24 horas',
            'step3' => 'Se creará un enlace para tu consulta virtual'
        ]
    ],
    'en' => [
        'nav' => [
            'about' => 'About Us',
            'services' => 'Services',
            'procedures' => 'Procedures'
        ],
        'hero' => [
            'title' => 'Contact Us',
            'subtitle' => 'We design experiences tailored to you. Schedule your free consultation and start your journey with Kasaami.'
        ],
        'video' => [
            'title' => 'Discover Our Process',
            'subtitle' => 'This is how at Kasaami we transform your life in Ecuador.'
        ],
        'why_contact' => [
            'title' => 'Why get in touch with us?',
            'subtitle' => 'We design experiences tailored to you. Schedule your free consultation and start your journey with Kasaami.',
            'benefits' => [
                [
                    'icon' => 'consultation',
                    'title' => 'Free Consultation',
                    'description' => 'Talk without commitment with an expert advisor in medical tourism. We are here to listen and guide you. Initial consultation at no cost.'
                ],
                [
                    'icon' => 'package', 
                    'title' => 'First Courtesy Consultation',
                    'description' => 'Share your goals and concerns with a specialist who understands what you need. Medical and aesthetic consultation without commitment, 100% adapted to you.'
                ],
                [
                    'icon' => 'privacy',
                    'title' => 'Custom Designed Package',
                    'description' => 'Receive a unique proposal that unites health, beauty and travel in a single experience. Personalized aesthetic surgery + wellness tourism plans.'
                ],
                [
                    'icon' => 'experience',
                    'title' => 'Guaranteed Privacy',
                    'description' => 'Your process will be completely confidential. We take care of every detail with maximum discretion. Trust, privacy and exclusive attention from start to finish.'
                ]
            ]
        ],
        'calendar' => [
            'title' => 'Select your preferred date and time',
            'select_date' => 'Select date',
            'select_time' => 'Select time',
            'available_times' => [
                '09:00' => '9:00 AM',
                '10:00' => '10:00 AM',
                '11:00' => '11:00 AM', 
                '14:00' => '2:00 PM',
                '15:00' => '3:00 PM',
                '16:00' => '4:00 PM'
            ]
        ],
        'form' => [
            'title' => 'We Want to Know You',
            'subtitle' => 'Complete the form and schedule a conversation with our medical tourism experts. We will guide you step by step to create the perfect medical experience for you, combining first-class care, wellness and hospitality.',
            'name' => 'Name',
            'lastname' => 'Last name',
            'email' => 'Email address',
            'phone' => 'Phone/Mobile',
            'country' => 'Passport country',
            'budget' => 'Budget per person (excluding flights) in USD',
            'budget_options' => [
                '4000-8000' => '$4,000 to $8,000',
                '8000-12000' => '$8,000 to $12,000',
                '12000-16000' => '$12,000 to $16,000', 
                '16000-20000' => '$16,000 to $20,000',
                '20000+' => '$20,000+'
            ],
            'travel_time' => 'When do you plan to travel?',
            'travel_options' => [
                'next_month' => 'Next month',
                '2-3_months' => '2-3 months',
                '4-6_months' => '4-6 months',
                '6+_months' => '+6 months'
            ],
            'interest' => 'Are you interested in a preset travel package or a custom solution?',
            'interest_options' => [
                'preset' => 'Preset package',
                'custom' => 'Custom package'
            ],
            'travel_type' => 'Travel',
            'travel_type_options' => [
                'solo' => 'Solo',
                'friend' => 'With a friend',
                'partner' => 'With a partner',
                'group' => 'Group'
            ],
            'group_size' => 'How many people are in your group (including you)?',
            'objectives' => 'Explain your travel goals and how we can help you',
            'objectives_placeholder' => 'Share your inquiry here, including any specific requirements, and we will contact you as soon as possible.',
            'found_us' => 'How did you find us?',
            'found_options' => [
                'google' => 'Google (or other search engine)',
                'social' => 'Social media',
                'referral' => 'Referral',
                'other' => 'Other'
            ],
            'contact_preference' => 'How do you prefer we contact you?',
            'contact_options' => [
                'email' => 'Email',
                'phone' => 'Phone',
                'whatsapp' => 'WhatsApp'
            ],
            'terms' => 'I have read the terms and conditions',
            'privacy' => 'I accept the medical tourism packages General terms I have read the Privacy Policy and agree that the data I have provided, including health data, be processed by Medical Tourism Packages for the purpose of obtaining quotes.',
            'submit' => 'SEND',
            'required' => 'Required field'
        ],
        'contact_direct' => [
            'title' => 'Need more information?',
            'subtitle' => 'Contact us through any of our available channels.',
            'whatsapp_title' => 'WhatsApp',
            'whatsapp_desc' => 'Write to us and one of our advisors will assist you',
            'whatsapp_number' => '+593 96 305 2401',
            'email_title' => 'Email',
            'email_desc' => 'Send us an email so we can resolve your doubts',
            'email_address' => 'info@kasaamigroup.com',
            'location_title' => 'Location',
            'location_desc' => 'Av. Mariano Paredes, between Tadeo Benitez and Jonatan Saenz, Atika Building\nQuito, Ecuador'
        ],
        'no_email' => [
            'title' => 'Email service not available!',
            'message' => 'Our email system is currently under maintenance. Please contact us directly through the following means:',
            'whatsapp' => 'WhatsApp: +593 96 305 2401',
            'phone' => 'Phone: +593 96 305 2401',
            'email_alt' => 'Email: info@kasaami.com'
        ],
        'success' => [
            'title' => 'Inquiry Sent!',
            'message' => 'We have received your inquiry. We will contact you soon to schedule your appointment.',
            'next_steps' => 'Next steps:',
            'step1' => 'You will receive a confirmation email',
            'step2' => 'Our team will contact you within 24 hours',
            'step3' => 'A link will be created for your virtual consultation'
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
    <meta name="description" content="Agenda tu consulta gratuita con Kasaami Care & Beauty. Especialistas en turismo médico en Ecuador.">
    <meta name="keywords" content="contacto, consulta médica, Ecuador, turismo médico, agendar cita">
    <meta name="author" content="Kasaami Care & Beauty">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="public/favicon.png">
    <link rel="shortcut icon" href="public/favicon.png">
    <link rel="apple-touch-icon" href="public/favicon.png">
    
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
                        'pulse-gentle': 'pulseGentle 2s ease-in-out infinite'
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
                        pulseGentle: {
                            '0%, 100%': { opacity: '1' },
                            '50%': { opacity: '0.8' }
                        }
                    }
                }
            }
        }
    </script>
    
    <style>
        .form-input {
            transition: all 0.3s ease;
        }
        
        .form-input:focus {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(139, 92, 246, 0.1);
        }
        
        .hover-lift {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .hover-lift:hover {
            transform: translateY(-8px);
            box-shadow: 0 25px 50px -12px rgba(139, 92, 246, 0.25);
        }

        .calendar-day {
            transition: all 0.3s ease;
        }
        
        .calendar-day:hover {
            background: linear-gradient(135deg, #8B5CF6, #6D28D9);
            color: white;
        }
        
        .calendar-day.selected {
            background: linear-gradient(135deg, #8B5CF6, #6D28D9);
            color: white;
        }
        
        .time-slot {
            transition: all 0.3s ease;
        }
        
        .time-slot:hover {
            background: #C4B5FD;
            color: #6D28D9;
        }
        
        .time-slot.selected {
            background: #8B5CF6;
            color: white;
        }

        .phone-container {
            position: relative;
            width: 100%;
        }

        .phone-flag {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            z-index: 10;
            pointer-events: none;
            transition: opacity 0.3s ease;
            opacity: 0;
        }

        .phone-flag.visible {
            opacity: 1;
        }

        .phone-flag img {
            width: 20px;
            height: 14px;
            border-radius: 2px;
            object-fit: cover;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        #phone-input {
            transition: padding-left 0.3s ease;
            padding-left: 16px;
        }

        #phone-input.with-flag {
            padding-left: 42px;
        }

        .phone-container input[type="tel"] {
            width: 100%;
            height: 48px;
            border: 1px solid #d1d5db;
            border-radius: 0.5rem;
            font-size: 16px;
            background: white;
        }

        .phone-container input[type="tel"]:focus {
            outline: none;
            border-color: #8b5cf6;
            box-shadow: 0 0 0 3px rgba(139, 92, 246, 0.1);
            transform: translateY(-2px);
        }

        .country-select {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='m6 8 4 4 4-4'/%3e%3c/svg%3e");
            background-position: right 0.5rem center;
            background-repeat: no-repeat;
            background-size: 1.5em 1.5em;
            padding-right: 2.5rem;
        }
    </style>
</head>

<body class="font-poppins bg-white overflow-x-hidden">
    
    <!-- Navigation -->
    <?php include 'includes/Navbar.php'; ?>

    <!-- Hero Section -->
    <section class="relative min-h-screen flex items-center justify-center bg-gradient-to-br from-kasaami-violet via-kasaami-dark-violet to-purple-900">
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="relative z-10 text-center text-white px-4 sm:px-6 lg:px-8 max-w-4xl mx-auto">
            <h1 class="text-5xl md:text-7xl font-rufina font-bold mb-6 animate-slide-up">
                <?php echo $t['hero']['title']; ?>
            </h1>
            <p class="text-xl md:text-2xl opacity-90 animate-slide-up max-w-3xl mx-auto leading-relaxed" style="animation-delay: 0.2s;">
                <?php echo $t['hero']['subtitle']; ?>
            </p>
        </div>
    </section>

    <!-- Video Section -->
    <section class="py-20 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-4xl md:text-5xl font-rufina font-bold text-gray-900 mb-8">
                <?php echo $t['video']['title']; ?>
            </h2>
            <p class="text-xl text-gray-600 mb-12">
                <?php echo $t['video']['subtitle']; ?>
            </p>
            
            <!-- Video Placeholder -->
            <div class="relative hover-lift">
                <div class="aspect-video bg-gradient-to-br from-kasaami-violet to-kasaami-dark-violet rounded-2xl shadow-2xl flex items-center justify-center cursor-pointer" onclick="playVideo()">
                    <div class="text-center text-white">
                        <div class="w-24 h-24 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-6 hover:bg-white/30 transition-colors duration-300">
                            <svg class="w-12 h-12 animate-pulse-gentle ml-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8 5v14l11-7z"/>
                            </svg>
                        </div>
                        <p class="text-xl font-medium mb-2">Video de Presentación</p>
                        <p class="text-sm opacity-80">Conoce nuestro proceso de transformación</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Contact Us Section -->
    <section class="py-20 bg-kasaami-pearl">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-rufina font-bold text-gray-900 mb-6">
                    <?php echo $t['why_contact']['title']; ?>
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    <?php echo $t['why_contact']['subtitle']; ?>
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <?php foreach ($t['why_contact']['benefits'] as $benefit): ?>
                <div class="text-center p-8 bg-white rounded-2xl shadow-lg hover-lift">
                    <!-- Icon -->
                    <div class="w-20 h-20 bg-gradient-to-br from-kasaami-light-violet to-kasaami-violet rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <?php if ($benefit['icon'] === 'consultation'): ?>
                            <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        <?php elseif ($benefit['icon'] === 'package'): ?>
                            <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                            </svg>
                        <?php elseif ($benefit['icon'] === 'privacy'): ?>
                            <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M7 4V2C7 1.45 7.45 1 8 1h8c.55 0 1 .45 1 1v2h4c.55 0 1 .45 1 1v16c0 .55-.45 1-1 1H3c-.55 0-1-.45-1-1V5c0-.55.45-1 1-1h4zM9 3v1h6V3H9zm10 5H5v11h14V8z"/>
                            </svg>
                        <?php else: ?>
                            <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4z"/>
                            </svg>
                        <?php endif; ?>
                    </div>
                    
                    <!-- Content -->
                    <h3 class="text-xl font-rufina font-bold text-gray-900 mb-4">
                        <?php echo $benefit['title']; ?>
                    </h3>
                    <p class="text-gray-600 leading-relaxed text-sm">
                        <?php echo $benefit['description']; ?>
                    </p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Form & Calendar Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Form Section -->
            <div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-xl p-8 mb-16">
                <h2 class="text-3xl font-rufina font-bold text-gray-900 mb-4 text-center">
                    <?php echo $t['form']['title']; ?>
                </h2>
                <p class="text-gray-600 mb-8 text-center">
                    <?php echo $t['form']['subtitle']; ?>
                </p>
                
                <form id="contact-form" class="space-y-6">
                    <!-- Name & Last Name -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                <?php echo $t['form']['name']; ?> <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="name" required class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-kasaami-violet focus:border-kasaami-violet">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                <?php echo $t['form']['lastname']; ?> <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="lastname" required class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-kasaami-violet focus:border-kasaami-violet">
                        </div>
                    </div>

                    <!-- Email & Phone -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                <?php echo $t['form']['email']; ?> <span class="text-red-500">*</span>
                            </label>
                            <input type="email" name="email" required class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-kasaami-violet focus:border-kasaami-violet">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                <?php echo $t['form']['phone']; ?> <span class="text-red-500">*</span>
                            </label>
                            <div class="phone-container">
                                <div class="phone-flag hidden" id="phone-flag">
                                    <img id="flag-img" src="" alt="">
                                </div>
                                <input type="tel" id="phone-input" name="phone" required class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-kasaami-violet focus:border-kasaami-violet" placeholder="+593 96 305 2401">
                            </div>
                        </div>
                    </div>

                    <!-- Country -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            <?php echo $t['form']['country']; ?> <span class="text-red-500">*</span>
                        </label>
                        <select name="country" required class="country-select form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-kasaami-violet focus:border-kasaami-violet appearance-none">
                            <option value="">Seleccionar país</option>
                            <?php foreach ($countries as $code => $country): ?>
                            <option value="<?php echo $code; ?>" data-flag="<?php echo $country['flag']; ?>">
                                <?php echo $country['name']; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Budget -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            <?php echo $t['form']['budget']; ?> <span class="text-red-500">*</span>
                        </label>
                        <select name="budget" required class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-kasaami-violet focus:border-kasaami-violet">
                            <option value="">Seleccionar presupuesto</option>
                            <?php foreach ($t['form']['budget_options'] as $value => $display): ?>
                            <option value="<?php echo $value; ?>"><?php echo $display; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Travel Time -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            <?php echo $t['form']['travel_time']; ?> <span class="text-red-500">*</span>
                        </label>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                            <?php foreach ($t['form']['travel_options'] as $value => $display): ?>
                            <label class="relative">
                                <input type="radio" name="travel_time" value="<?php echo $value; ?>" class="sr-only peer" required>
                                <div class="p-3 border border-gray-300 rounded-lg text-center cursor-pointer peer-checked:bg-kasaami-violet peer-checked:text-white peer-checked:border-kasaami-violet hover:border-kasaami-light-violet transition-colors duration-200">
                                    <span class="text-sm font-medium"><?php echo $display; ?></span>
                                </div>
                            </label>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Interest -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            <?php echo $t['form']['interest']; ?> <span class="text-red-500">*</span>
                        </label>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                            <?php foreach ($t['form']['interest_options'] as $value => $display): ?>
                            <label class="relative">
                                <input type="radio" name="interest" value="<?php echo $value; ?>" class="sr-only peer" required>
                                <div class="p-4 border border-gray-300 rounded-lg text-center cursor-pointer peer-checked:bg-kasaami-violet peer-checked:text-white peer-checked:border-kasaami-violet hover:border-kasaami-light-violet transition-colors duration-200">
                                    <span class="font-medium"><?php echo $display; ?></span>
                                </div>
                            </label>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Travel Type -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            <?php echo $t['form']['travel_type']; ?> <span class="text-red-500">*</span>
                        </label>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                            <?php foreach ($t['form']['travel_type_options'] as $value => $display): ?>
                            <label class="relative">
                                <input type="radio" name="travel_type" value="<?php echo $value; ?>" class="sr-only peer travel-type-radio" required onchange="toggleGroupSize()">
                                <div class="p-3 border border-gray-300 rounded-lg text-center cursor-pointer peer-checked:bg-kasaami-violet peer-checked:text-white peer-checked:border-kasaami-violet hover:border-kasaami-light-violet transition-colors duration-200">
                                    <span class="text-sm font-medium"><?php echo $display; ?></span>
                                </div>
                            </label>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Group Size (Hidden by default) -->
                    <div id="group-size-section" class="hidden">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            <?php echo $t['form']['group_size']; ?> <span class="text-red-500">*</span>
                        </label>
                        <input type="number" name="group_size" min="2" max="20" class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-kasaami-violet focus:border-kasaami-violet" placeholder="Incluido usted" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                    </div>

                    <!-- Objectives -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            <?php echo $t['form']['objectives']; ?> <span class="text-red-500">*</span>
                        </label>
                        <textarea name="objectives" rows="4" required class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-kasaami-violet focus:border-kasaami-violet" placeholder="<?php echo $t['form']['objectives_placeholder']; ?>"></textarea>
                    </div>

                    <!-- How found us -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            <?php echo $t['form']['found_us']; ?> <span class="text-red-500">*</span>
                        </label>
                        <select name="found_us" required class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-kasaami-violet focus:border-kasaami-violet">
                            <option value="">- Seleccionar -</option>
                            <?php foreach ($t['form']['found_options'] as $value => $display): ?>
                            <option value="<?php echo $value; ?>"><?php echo $display; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Contact Preference -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            <?php echo $t['form']['contact_preference']; ?> <span class="text-red-500">*</span>
                        </label>
                        <select name="contact_preference" required class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-kasaami-violet focus:border-kasaami-violet">
                            <option value="">- Seleccionar -</option>
                            <?php foreach ($t['form']['contact_options'] as $value => $display): ?>
                            <option value="<?php echo $value; ?>" <?php echo $value === 'whatsapp' ? 'style="background-color: #25d366; color: white;"' : ''; ?>>
                                <?php echo $display; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Terms and Privacy -->
                    <div class="space-y-3">
                        <label class="flex items-start space-x-3">
                            <input type="checkbox" name="terms" required class="mt-1 h-4 w-4 text-kasaami-violet focus:ring-kasaami-violet border-gray-300 rounded">
                            <span class="text-sm text-gray-700"><?php echo $t['form']['terms']; ?></span>
                        </label>
                        
                        <label class="flex items-start space-x-3">
                            <input type="checkbox" name="privacy" required class="mt-1 h-4 w-4 text-kasaami-violet focus:ring-kasaami-violet border-gray-300 rounded">
                            <span class="text-sm text-gray-700"><?php echo $t['form']['privacy']; ?></span>
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <div class="text-center">
                        <button type="submit" class="w-full bg-gradient-to-r from-kasaami-violet to-kasaami-dark-violet text-white py-4 px-8 rounded-lg font-semibold text-lg hover:shadow-lg hover:shadow-kasaami-violet/25 transition-all duration-200 transform hover:scale-105">
                            <?php echo $t['form']['submit']; ?>
                        </button>
                    </div>
                </form>
            </div>

            <!-- Calendar Section -->
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-rufina font-bold text-gray-900 mb-8">
                    <?php echo $t['calendar']['title']; ?>
                </h2>
                
                <!-- Simple Calendar -->
                <div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-xl p-8 mb-12">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Date Selection -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-4"><?php echo $t['calendar']['select_date']; ?></h3>
                            <input type="date" id="selected-date" class="w-full p-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-kasaami-violet focus:border-kasaami-violet" min="<?php echo date('Y-m-d'); ?>">
                        </div>
                        
                        <!-- Time Selection -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-4"><?php echo $t['calendar']['select_time']; ?></h3>
                            <div class="grid grid-cols-2 gap-3">
                                <?php foreach ($t['calendar']['available_times'] as $time => $display): ?>
                                <button type="button" class="time-slot p-3 border border-gray-300 rounded-lg text-sm font-medium" data-time="<?php echo $time; ?>">
                                    <?php echo $display; ?>
                                </button>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Schedule Button -->
                    <div class="mt-8 text-center">
                        <button id="schedule-btn" class="bg-gradient-to-r from-kasaami-violet to-kasaami-dark-violet text-white px-12 py-4 rounded-full font-semibold text-lg hover:shadow-lg hover:shadow-kasaami-violet/25 transition-all duration-200 transform hover:scale-105 opacity-50 cursor-not-allowed" onclick="scheduleAppointment()" disabled>
                            AGENDAR CITA
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Direct Section -->
    <section class="py-20 bg-kasaami-pearl">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-rufina font-bold text-gray-900 mb-6">
                    <?php echo $t['contact_direct']['title']; ?>
                </h2>
                <p class="text-xl text-gray-600">
                    <?php echo $t['contact_direct']['subtitle']; ?>
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                
                <!-- WhatsApp -->
                <div class="text-center p-8 bg-white rounded-2xl shadow-lg hover-lift">
                    <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-700 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-rufina font-bold text-gray-900 mb-4">
                        <?php echo $t['contact_direct']['whatsapp_title']; ?>
                    </h3>
                    <p class="text-gray-600 mb-4">
                        <?php echo $t['contact_direct']['whatsapp_desc']; ?>
                    </p>
                    <a href="https://wa.me/593963052401" class="text-lg font-bold text-green-600 hover:text-green-700">
                        <?php echo $t['contact_direct']['whatsapp_number']; ?>
                    </a>
                </div>

                <!-- Email -->
                <div class="text-center p-8 bg-white rounded-2xl shadow-lg hover-lift">
                    <div class="w-16 h-16 bg-gradient-to-br from-kasaami-violet to-kasaami-dark-violet rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-rufina font-bold text-gray-900 mb-4">
                        <?php echo $t['contact_direct']['email_title']; ?>
                    </h3>
                    <p class="text-gray-600 mb-4">
                        <?php echo $t['contact_direct']['email_desc']; ?>
                    </p>
                    <a href="mailto:info@kasaamigroup.com" class="text-lg font-bold text-kasaami-violet hover:text-kasaami-dark-violet">
                        <?php echo $t['contact_direct']['email_address']; ?>
                    </a>
                </div>

                <!-- Location -->
                <div class="text-center p-8 bg-white rounded-2xl shadow-lg hover-lift">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-700 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-rufina font-bold text-gray-900 mb-4">
                        <?php echo $t['contact_direct']['location_title']; ?>
                    </h3>
                    <div class="text-gray-600 text-sm leading-relaxed whitespace-pre-line">
                        <?php echo $t['contact_direct']['location_desc']; ?>
                    </div>
                </div>
            </div>

            <!-- Quick Action Buttons -->
            <div class="flex flex-col md:flex-row gap-4 justify-center mt-12">
                <a href="https://wa.me/593963052401?text=<?php echo urlencode('Hola! Me interesa agendar una consulta con Kasaami Care & Beauty.'); ?>" 
                   class="flex items-center justify-center space-x-3 bg-green-500 hover:bg-green-600 text-white py-4 px-8 rounded-full transition-colors duration-200 transform hover:scale-105 shadow-lg">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"/>
                    </svg>
                    <span class="font-medium">Chatear por WhatsApp</span>
                </a>
                
                <a href="mailto:info@kasaamigroup.com" 
                   class="flex items-center justify-center space-x-3 bg-kasaami-violet hover:bg-kasaami-dark-violet text-white py-4 px-8 rounded-full transition-colors duration-200 transform hover:scale-105 shadow-lg">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                    </svg>
                    <span class="font-medium">Enviar Email</span>
                </a>
            </div>
        </div>
    </section>

    <!-- Success Message Modal -->
    <div id="success-message" class="fixed inset-0 bg-black/50 z-50 flex items-center justify-center hidden">
        <div class="bg-white rounded-2xl p-8 max-w-md mx-4 text-center animate-slide-up">
            <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-8 h-8 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                </svg>
            </div>
            <h3 class="text-2xl font-rufina font-bold text-gray-900 mb-4">
                <?php echo $t['success']['title']; ?>
            </h3>
            <p class="text-gray-600 mb-6">
                <?php echo $t['success']['message']; ?>
            </p>
            <div class="text-left mb-6">
                <h4 class="font-semibold text-gray-900 mb-3"><?php echo $t['success']['next_steps']; ?></h4>
                <ul class="space-y-2 text-sm text-gray-600">
                    <li class="flex items-start space-x-2">
                        <span class="text-kasaami-violet">1.</span>
                        <span><?php echo $t['success']['step1']; ?></span>
                    </li>
                    <li class="flex items-start space-x-2">
                        <span class="text-kasaami-violet">2.</span>
                        <span><?php echo $t['success']['step2']; ?></span>
                    </li>
                    <li class="flex items-start space-x-2">
                        <span class="text-kasaami-violet">3.</span>
                        <span><?php echo $t['success']['step3']; ?></span>
                    </li>
                </ul>
            </div>
            <button onclick="closeSuccessMessage()" class="bg-kasaami-violet hover:bg-kasaami-dark-violet text-white px-6 py-3 rounded-lg font-medium transition-colors duration-200">
                Cerrar
            </button>
        </div>
    </div>

    <!-- No Email Service Modal -->
    <div id="no-email-modal" class="fixed inset-0 bg-black/50 z-50 flex items-center justify-center hidden">
        <div class="bg-white rounded-2xl p-8 max-w-md mx-4 text-center animate-slide-up">
            <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-8 h-8 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                </svg>
            </div>
            <h3 class="text-2xl font-rufina font-bold text-gray-900 mb-4">
                <?php echo $t['no_email']['title']; ?>
            </h3>
            <p class="text-gray-600 mb-6">
                <?php echo $t['no_email']['message']; ?>
            </p>
            <div class="space-y-3 mb-6">
                <div class="flex items-center justify-center space-x-2 p-3 bg-green-50 rounded-lg">
                    <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"/>
                    </svg>
                    <span class="text-sm font-medium text-green-700"><?php echo $t['no_email']['whatsapp']; ?></span>
                </div>
                <div class="flex items-center justify-center space-x-2 p-3 bg-blue-50 rounded-lg">
                    <svg class="w-5 h-5 text-blue-500" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                    </svg>
                    <span class="text-sm font-medium text-blue-700"><?php echo $t['no_email']['phone']; ?></span>
                </div>
                <div class="flex items-center justify-center space-x-2 p-3 bg-purple-50 rounded-lg">
                    <svg class="w-5 h-5 text-purple-500" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                    </svg>
                    <span class="text-sm font-medium text-purple-700"><?php echo $t['no_email']['email_alt']; ?></span>
                </div>
            </div>
            <div class="flex space-x-3">
                <a href="https://wa.me/593963052401" class="flex-1 bg-green-500 hover:bg-green-600 text-white px-4 py-3 rounded-lg font-medium transition-colors duration-200">
                    WhatsApp
                </a>
                <button onclick="closeNoEmailModal()" class="flex-1 bg-gray-500 hover:bg-gray-600 text-white px-4 py-3 rounded-lg font-medium transition-colors duration-200">
                    Cerrar
                </button>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include 'includes/Footer.php'; ?>

    <!-- WhatsApp Button -->
    <?php include 'includes/FlotanteWpp.php'; ?>

    <script>
        let selectedDate = null;
        let selectedTime = null;

        // Time slot selection
        document.querySelectorAll('.time-slot').forEach(slot => {
            slot.addEventListener('click', function() {
                // Remove selected class from all slots
                document.querySelectorAll('.time-slot').forEach(s => s.classList.remove('selected'));
                // Add selected class to clicked slot
                this.classList.add('selected');
                selectedTime = this.dataset.time;
                checkScheduleButton();
            });
        });

        // Date input change
        document.getElementById('selected-date').addEventListener('change', function() {
            selectedDate = this.value;
            checkScheduleButton();
        });

        // Check if both date and time are selected
        function checkScheduleButton() {
            const scheduleBtn = document.getElementById('schedule-btn');
            if (selectedDate && selectedTime) {
                scheduleBtn.disabled = false;
                scheduleBtn.classList.remove('opacity-50', 'cursor-not-allowed');
                scheduleBtn.classList.add('hover:shadow-lg', 'hover:shadow-kasaami-violet/25');
            } else {
                scheduleBtn.disabled = true;
                scheduleBtn.classList.add('opacity-50', 'cursor-not-allowed');
                scheduleBtn.classList.remove('hover:shadow-lg', 'hover:shadow-kasaami-violet/25');
            }
        }

        // Schedule appointment when button is clicked
        function scheduleAppointment() {
            if (selectedDate && selectedTime) {
                // Add selected date and time to form
                const form = document.getElementById('contact-form');
                
                // Create hidden inputs for date and time
                let dateInput = document.getElementById('scheduled-date');
                if (!dateInput) {
                    dateInput = document.createElement('input');
                    dateInput.type = 'hidden';
                    dateInput.name = 'scheduled_date';
                    dateInput.id = 'scheduled-date';
                    form.appendChild(dateInput);
                }
                
                let timeInput = document.getElementById('scheduled-time');
                if (!timeInput) {
                    timeInput = document.createElement('input');
                    timeInput.type = 'hidden';
                    timeInput.name = 'scheduled_time';
                    timeInput.id = 'scheduled-time';
                    form.appendChild(timeInput);
                }
                
                dateInput.value = selectedDate;
                timeInput.value = selectedTime;
                
                // Scroll to form
                const formSection = document.getElementById('contact-form');
                const offset = 80;
                const elementPosition = formSection.offsetTop;
                const offsetPosition = elementPosition - offset;

                window.scrollTo({
                    top: offsetPosition,
                    behavior: 'smooth'
                });

                // Show success message briefly
                showSuccess(`Fecha y hora seleccionadas: ${selectedDate} a las ${selectedTime}. Complete el formulario para finalizar.`);
            } else {
                alert('Por favor selecciona una fecha y hora antes de continuar.');
            }
        }

        // Toggle group size field based on travel type
        function toggleGroupSize() {
            const travelTypeRadios = document.querySelectorAll('input[name="travel_type"]');
            const groupSizeSection = document.getElementById('group-size-section');
            const groupSizeInput = document.querySelector('input[name="group_size"]');
            
            let isGroupSelected = false;
            travelTypeRadios.forEach(radio => {
                if (radio.checked && radio.value === 'group') {
                    isGroupSelected = true;
                }
            });
            
            if (isGroupSelected) {
                groupSizeSection.classList.remove('hidden');
                groupSizeInput.required = true;
            } else {
                groupSizeSection.classList.add('hidden');
                groupSizeInput.required = false;
                groupSizeInput.value = '';
            }
        }

        // Play video function
        function playVideo() {
            // Replace with actual video implementation
            alert('Aquí se reproduciría el video de presentación de Kasaami Care & Beauty');
        }

        // Form submission handler
        document.getElementById('contact-form').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Simple phone validation
            const phoneInput = document.getElementById('phone-input');
            const phoneValue = phoneInput.value.trim();
            
            if (phoneValue.length < 10) {
                showError('Por favor ingresa un número de teléfono válido');
                phoneInput.classList.add('border-red-500');
                return;
            }
            
            // Simulate email service check (replace with actual check)
            const emailServiceAvailable = Math.random() > 0.3; // 70% chance of being available
            
            if (emailServiceAvailable) {
                // Collect form data
                const formData = new FormData(this);
                const data = {
                    scheduled_date: selectedDate,
                    scheduled_time: selectedTime,
                    name: formData.get('name'),
                    lastname: formData.get('lastname'),
                    email: formData.get('email'),
                    phone: formData.get('phone'),
                    country: formData.get('country'),
                    budget: formData.get('budget'),
                    travel_time: formData.get('travel_time'),
                    interest: formData.get('interest'),
                    travel_type: formData.get('travel_type'),
                    group_size: formData.get('group_size'),
                    objectives: formData.get('objectives'),
                    found_us: formData.get('found_us'),
                    contact_preference: formData.get('contact_preference'),
                    terms: formData.get('terms'),
                    privacy: formData.get('privacy')
                };
                
                // Here you would send the data to your backend
                console.log('Form data:', data);
                
                // Show success message
                document.getElementById('success-message').classList.remove('hidden');
                
                // Reset form
                this.reset();
                updatePhoneFlag(null); // Clear flag
                selectedDate = null;
                selectedTime = null;
                document.querySelectorAll('.time-slot').forEach(s => s.classList.remove('selected'));
                document.getElementById('selected-date').value = '';
                document.getElementById('group-size-section').classList.add('hidden');
                checkScheduleButton();
                
                // Send emails (simulate)
                sendEmailToCommercial(data);
                sendConfirmationEmail(data);
                createCalendarEvent(data);
                
            } else {
                // Show no email service modal
                document.getElementById('no-email-modal').classList.remove('hidden');
            }
        });

        // Simulate sending email to commercial team
        function sendEmailToCommercial(data) {
            console.log('Email sent to commercial team:', {
                to: 'comercial@kasaami.com',
                subject: 'Nueva consulta agendada - ' + data.name + ' ' + data.lastname,
                body: `
                    Nueva consulta agendada:
                    
                    Fecha: ${data.scheduled_date}
                    Hora: ${data.scheduled_time}
                    Nombre: ${data.name} ${data.lastname}
                    Email: ${data.email}
                    Teléfono: ${data.phone}
                    País: ${data.country}
                    Presupuesto: ${data.budget}
                    Tipo de viaje: ${data.travel_type}
                    ${data.group_size ? 'Tamaño del grupo: ' + data.group_size : ''}
                    Objetivos: ${data.objectives}
                    Cómo nos encontró: ${data.found_us}
                    Preferencia de contacto: ${data.contact_preference}
                `
            });
        }

        // Simulate sending confirmation email to client
        function sendConfirmationEmail(data) {
            console.log('Confirmation email sent to client:', {
                to: data.email,
                subject: 'Consulta agendada - Kasaami Care & Beauty',
                body: `
                    Hola ${data.name},
                    
                    Tu consulta ha sido agendada exitosamente para:
                    Fecha: ${data.scheduled_date}
                    Hora: ${data.scheduled_time}
                    
                    Te contactaremos pronto para confirmar los detalles.
                    
                    Saludos,
                    Equipo Kasaami Care & Beauty
                `
            });
        }

        // Simulate creating calendar event
        function createCalendarEvent(data) {
            const meetingLink = 'https://meet.google.com/xxx-xxxx-xxx'; // Generate actual link
            console.log('Calendar event created:', {
                title: `Consulta - ${data.name} ${data.lastname}`,
                date: data.scheduled_date,
                time: data.scheduled_time,
                attendees: [data.email, 'comercial@kasaami.com'],
                meeting_link: meetingLink,
                description: `
                    Consulta médica con ${data.name} ${data.lastname}
                    Teléfono: ${data.phone}
                    País: ${data.country}
                    Objetivos: ${data.objectives}
                    
                    Link de reunión: ${meetingLink}
                `
            });
        }

        // Close success message
        function closeSuccessMessage() {
            document.getElementById('success-message').classList.add('hidden');
        }

        // Close no email modal
        function closeNoEmailModal() {
            document.getElementById('no-email-modal').classList.add('hidden');
        }

        // Close modals when clicking outside
        document.getElementById('success-message').addEventListener('click', function(e) {
            if (e.target === this) {
                closeSuccessMessage();
            }
        });

        document.getElementById('no-email-modal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeNoEmailModal();
            }
        });

        // Country codes mapping for flag detection
        const countryCodes = {
            '1': 'us',     // USA/Canada
            '7': 'ru',     // Russia
            '33': 'fr',    // France
            '34': 'es',    // Spain
            '39': 'it',    // Italy
            '44': 'gb',    // United Kingdom
            '49': 'de',    // Germany
            '51': 'pe',    // Peru
            '52': 'mx',    // Mexico
            '54': 'ar',    // Argentina
            '55': 'br',    // Brazil
            '56': 'cl',    // Chile
            '57': 'co',    // Colombia
            '58': 've',    // Venezuela
            '86': 'cn',    // China
            '91': 'in',    // India
            '351': 'pt',   // Portugal
            '506': 'cr',   // Costa Rica
            '507': 'pa',   // Panama
            '591': 'bo',   // Bolivia
            '593': 'ec',   // Ecuador
            '595': 'py',   // Paraguay
            '598': 'uy'    // Uruguay
        };

        // Function to detect country from phone number
        function detectCountryFromPhone(phoneNumber) {
            const cleaned = phoneNumber.replace(/\D/g, '');
            
            // Check 3-digit codes first
            for (let i = 3; i >= 1; i--) {
                const code = cleaned.substring(0, i);
                if (countryCodes[code]) {
                    return countryCodes[code];
                }
            }
            
            return null;
        }

        // Function to show/hide flag
        function updatePhoneFlag(countryCode) {
            const flagElement = document.getElementById('phone-flag');
            const flagImg = document.getElementById('flag-img');
            const phoneInput = document.getElementById('phone-input');
            
            if (countryCode) {
                flagImg.src = `https://flagcdn.com/w40/${countryCode}.png`;
                flagImg.alt = countryCode.toUpperCase();
                flagElement.classList.remove('hidden');
                flagElement.classList.add('visible');
                phoneInput.classList.add('with-flag');
            } else {
                flagElement.classList.remove('visible');
                flagElement.classList.add('hidden');
                phoneInput.classList.remove('with-flag');
            }
        }

        // Enhanced error handling
        function showError(message) {
            const errorDiv = document.createElement('div');
            errorDiv.className = 'fixed top-4 right-4 bg-red-500 text-white px-6 py-3 rounded-lg shadow-lg z-50 animate-slide-up max-w-sm';
            errorDiv.textContent = message;
            
            document.body.appendChild(errorDiv);
            
            setTimeout(() => {
                errorDiv.remove();
            }, 5000);
        }

        // Success notification
        function showSuccess(message) {
            const successDiv = document.createElement('div');
            successDiv.className = 'fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50 animate-slide-up max-w-sm';
            successDiv.textContent = message;
            
            document.body.appendChild(successDiv);
            
            setTimeout(() => {
                successDiv.remove();
            }, 5000);
        }

        // Initialize page
        document.addEventListener('DOMContentLoaded', function() {
            // Set minimum date to today
            const today = new Date().toISOString().split('T')[0];
            document.getElementById('selected-date').setAttribute('min', today);
            
            // Phone input flag detection
            const phoneInput = document.getElementById('phone-input');
            
            phoneInput.addEventListener('input', function() {
                const value = this.value;
                const countryCode = detectCountryFromPhone(value);
                updatePhoneFlag(countryCode);
            });
            
            // Clear flag when input is empty
            phoneInput.addEventListener('blur', function() {
                if (this.value.trim() === '') {
                    updatePhoneFlag(null);
                }
            });

            // Add WhatsApp click tracking
            document.querySelectorAll('a[href*="wa.me"]').forEach(link => {
                link.addEventListener('click', function() {
                    console.log('WhatsApp link clicked');
                });
            });

            // Initialize schedule button state
            checkScheduleButton();
        });

        // Handle escape key to close modals
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeSuccessMessage();
                closeNoEmailModal();
            }
        });

        // Form validation and animations
        const inputs = document.querySelectorAll('.form-input');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('focused');
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.classList.remove('focused');
            });
        });

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

        // Make time slots keyboard accessible
        document.querySelectorAll('.time-slot').forEach(slot => {
            slot.setAttribute('tabindex', '0');
            slot.setAttribute('role', 'button');
            slot.setAttribute('aria-label', `Seleccionar horario ${slot.textContent}`);
        });

        // Accessibility improvements
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                if (e.target.classList.contains('time-slot')) {
                    e.preventDefault();
                    e.target.click();
                }
            }
        });

        console.log('Kasaami Contact Form initialized successfully');
    </script>
</body>
</html>