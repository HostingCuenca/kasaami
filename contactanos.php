<?php
// contactanos.php
// Página de contacto completa con CRM integrado

// Initialize language detection first
require_once(__DIR__ . '/includes/init-language.php');

$pageTitle = "Contacto - Kasaami Care & Beauty";

// DEBUG: Verificar conexión a BD (comentar en producción)
$debug_db_status = false;
$debug_db_message = '';
try {
    require_once 'includes/database.php';
    $debug_db_status = Database::testConnection();
    $debug_db_message = $debug_db_status ? 'BD Conectada' : 'BD Error';
} catch (Exception $e) {
    $debug_db_message = 'BD Exception: ' . $e->getMessage();
}

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
                    'description' => 'Conversa sin compromiso con un asesor experto en turismo médico.<br>Estamos aquí para escucharte y guiarte.<br>Asesoría inicial sin costo.'
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
        'form' => [
            'title' => 'Queremos Conocerte',
            'subtitle' => 'Completa el formulario y agenda una conversación con nuestros expertos en turismo médico. Te guiaremos paso a paso para crear la experiencia médica perfecta para ti, combinando atención de primer nivel, bienestar y hospitalidad.',
            'schedule_title' => 'Selecciona tu fecha y hora preferida',
            'appointment_date' => 'Fecha de la cita',
            'appointment_time' => 'Hora de la cita',
            'select_date' => 'Seleccionar fecha',
            'select_time' => 'Seleccionar hora',
            'first_select_date' => 'Primero selecciona una fecha',
            'name' => 'Nombre',
            'lastname' => 'Apellido', 
            'email' => 'Correo electrónico',
            'phone' => 'Teléfono/Móvil',
            'country' => 'País del pasaporte',
            'select_country' => 'Seleccionar país',
            'budget' => 'Presupuesto por persona (excluidos vuelos) en USD',
            'budget_question' => '¿Qué presupuesto tienes? en USD',
            'select_budget' => 'Seleccionar presupuesto',
            'budget_options' => [
                '4000-8000' => '$4,000 a $8,000',
                '8000-12000' => '$8,000 a $12,000', 
                '12000-16000' => '$12,000 a $16,000',
                '16000-20000' => '$16,000 a $20,000',
                '20000+' => '$20,000+'
            ],
            'travel_type' => 'Viajas:',
            'travel_type_options' => [
                'solo' => 'Solo',
                'amigo' => 'Con un amigo',
                'familiar' => 'Con un familiar', 
                'grupo' => 'En grupo'
            ],
            'group_size' => '¿Cuántas personas hay en su grupo (incluido usted)?',
            'group_size_placeholder' => 'Incluido usted',
            'objectives' => 'Cuéntanos en qué procedimiento estás interesado',
            'objectives_placeholder' => 'Escribe el procedimiento médico o estético que te interesa (ej. rinoplastia, liposucción, aumento de senos, etc.). Si lo deseas, puedes añadir cualquier información adicional que consideres importante, como antecedentes médicos, intervenciones previas o aspectos específicos que te gustaría mejorar.',
            'found_us' => '¿Cómo nos ha encontrado?',
            'select_found' => 'Seleccionar',
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
            'sending' => 'Enviando...',
            'required' => 'Campo requerido'
        ],
        'contact_direct' => [
            'title' => '¿Necesitas más información?',
            'subtitle' => 'Comunícate con nosotros por cualquiera de nuestros canales disponibles.',
            'whatsapp_title' => 'WhatsApp',
            'whatsapp_desc' => 'Escríbenos y uno de nuestros asesores te atenderá',
            'whatsapp_number' => '+593 96 305 2401',
            'whatsapp_cta' => 'Chatear por WhatsApp',
            'email_title' => 'Correo Electrónico', 
            'email_desc' => 'Envíanos un correo electrónico para poder resolver tus dudas',
            'email_address' => 'info@kasaamigroup.com',
            'email_cta' => 'Enviar Email',
            'location_title' => 'Ubicación',
            'location_desc' => 'Av. Mariano Paredes, entre Tadeo Benitez y Jonatan Saenz, Edificio Atika\nQuito, Ecuador',
            'crm_cta' => 'Acceso CRM'
        ],
        'success' => [
            'title' => '¡Consulta Enviada!',
            'message' => 'Hemos recibido tu consulta. Te contactaremos pronto para programar tu cita.',
            'appointment_scheduled' => '¡Consulta Agendada!',
            'next_steps' => 'Próximos pasos:',
            'step1' => 'Recibirás un email de confirmación',
            'step2' => 'Te contactaremos lo más pronto posible para brindarte los detalles de la asesoría virtual',
            'step3' => 'Se creará un enlace para tu consulta virtual',
            'close' => 'Cerrar',
            'whatsapp_contact' => 'Contactar por WhatsApp'
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
                    'description' => 'Have a no-commitment conversation with an expert medical tourism advisor.<br>We are here to listen and guide you.<br>Initial consultation at no cost.'
                ],
                [
                    'icon' => 'package',
                    'title' => 'Complimentary First Consultation',
                    'description' => 'Share your goals and concerns with a specialist who understands what you need. Medical and aesthetic consultation without commitment, 100% tailored to you.'
                ],
                [
                    'icon' => 'privacy',
                    'title' => 'Custom-Designed Package',
                    'description' => 'Receive a unique proposal that combines health, beauty and travel in one experience. Personalized aesthetic surgery + wellness tourism plans.'
                ],
                [
                    'icon' => 'experience',
                    'title' => 'Guaranteed Privacy',
                    'description' => 'Your process will be completely confidential. We take care of every detail with maximum discretion. Trust, privacy and exclusive attention from start to finish.'
                ]
            ]
        ],
        'form' => [
            'title' => 'We Want to Know You',
            'subtitle' => 'Complete the form and schedule a conversation with our medical tourism experts. We will guide you step by step to create the perfect medical experience for you, combining first-class care, wellness and hospitality.',
            'schedule_title' => 'Select your preferred date and time',
            'appointment_date' => 'Appointment date',
            'appointment_time' => 'Appointment time',
            'select_date' => 'Select date',
            'select_time' => 'Select time',
            'first_select_date' => 'First select a date',
            'name' => 'First Name',
            'lastname' => 'Last Name', 
            'email' => 'Email address',
            'phone' => 'Phone/Mobile',
            'country' => 'Passport country',
            'select_country' => 'Select country',
            'budget' => 'Budget per person (excluding flights) in USD',
            'budget_question' => 'What is your budget? in USD',
            'select_budget' => 'Select budget',
            'budget_options' => [
                '4000-8000' => '$4,000 to $8,000',
                '8000-12000' => '$8,000 to $12,000', 
                '12000-16000' => '$12,000 to $16,000',
                '16000-20000' => '$16,000 to $20,000',
                '20000+' => '$20,000+'
            ],
            'travel_type' => 'You travel:',
            'travel_type_options' => [
                'solo' => 'Alone',
                'amigo' => 'With a friend',
                'familiar' => 'With family', 
                'grupo' => 'In group'
            ],
            'group_size' => 'How many people are in your group (including yourself)?',
            'group_size_placeholder' => 'Including yourself',
            'objectives' => 'Tell us which procedure you are interested in',
            'objectives_placeholder' => 'Write the medical or aesthetic procedure you are interested in (e.g. rhinoplasty, liposuction, breast augmentation, etc.). If you wish, you can add any additional information you consider important, such as medical history, previous interventions or specific aspects you would like to improve.',
            'found_us' => 'How did you find us?',
            'select_found' => 'Select',
            'found_options' => [
                'google' => 'Google (or other search engine)',
                'social' => 'Social media',
                'referral' => 'Referral', 
                'other' => 'Others'
            ],
            'contact_preference' => 'How do you prefer us to contact you?',
            'contact_options' => [
                'email' => 'Email',
                'phone' => 'Phone',
                'whatsapp' => 'WhatsApp'
            ],
            'terms' => 'I have read the terms and conditions',
            'privacy' => 'I accept the medical tourism packages General Conditions I have read the Privacy Policy and agree that the data I have provided, including health data, be processed by Medical Tourism Packages for the purpose of obtaining quotes.',
            'submit' => 'SUBMIT',
            'sending' => 'Sending...',
            'required' => 'Required field'
        ],
        'contact_direct' => [
            'title' => 'Need more information?',
            'subtitle' => 'Contact us through any of our available channels.',
            'whatsapp_title' => 'WhatsApp',
            'whatsapp_desc' => 'Write to us and one of our advisors will assist you',
            'whatsapp_number' => '+593 96 305 2401',
            'whatsapp_cta' => 'Chat on WhatsApp',
            'email_title' => 'Email', 
            'email_desc' => 'Send us an email so we can resolve your questions',
            'email_address' => 'info@kasaamigroup.com',
            'email_cta' => 'Send Email',
            'location_title' => 'Location',
            'location_desc' => 'Av. Mariano Paredes, between Tadeo Benitez and Jonatan Saenz, Atika Building\nQuito, Ecuador',
            'crm_cta' => 'CRM Access'
        ],
        'success' => [
            'title' => 'Consultation Sent!',
            'message' => 'We have received your consultation. We will contact you soon to schedule your appointment.',
            'appointment_scheduled' => 'Appointment Scheduled!',
            'next_steps' => 'Next steps:',
            'step1' => 'You will receive a confirmation email',
            'step2' => 'Our team will contact you within 24 hours',
            'step3' => 'A link will be created for your virtual consultation',
            'close' => 'Close',
            'whatsapp_contact' => 'Contact via WhatsApp'
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

        .country-select {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='m6 8 4 4 4-4'/%3e%3c/svg%3e");
            background-position: right 0.5rem center;
            background-repeat: no-repeat;
            background-size: 1.5em 1.5em;
            padding-right: 2.5rem;
        }

        /* DEBUG: Indicador sutil de conexión BD (comentar en producción) */
        .debug-indicator {
            position: fixed;
            bottom: 10px;
            right: 10px;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            z-index: 9999;
            opacity: 0.7;
        }
        .debug-connected { background-color: #10B981; }
        .debug-disconnected { background-color: #EF4444; }
        
        /* Calendar Styles */
        .calendar-day {
            @apply w-8 h-8 flex items-center justify-center text-sm rounded-lg cursor-pointer transition-all duration-200 relative;
        }
        
        .calendar-day.disabled {
            @apply text-gray-300 cursor-not-allowed opacity-50;
        }
        
        .calendar-day.disabled::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 4px;
            height: 4px;
            background-color: #ef4444;
            border-radius: 50%;
            opacity: 0.6;
        }
        
        .calendar-day.available {
            @apply text-gray-700 hover:bg-kasaami-light-violet hover:text-white;
        }
        
        .calendar-day.available::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 4px;
            height: 4px;
            background-color: #10b981;
            border-radius: 50%;
            opacity: 0.8;
        }
        
        .calendar-day.selected {
            @apply bg-kasaami-violet text-white font-semibold;
        }
        
        .calendar-day.selected::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 6px;
            height: 6px;
            background-color: #ffffff;
            border-radius: 50%;
        }
        
        .calendar-day.other-month {
            @apply text-gray-300 opacity-40;
        }
        
        .calendar-day.today {
            @apply ring-2 ring-kasaami-violet font-semibold;
        }
        
        .calendar-day.past {
            @apply text-gray-400 cursor-not-allowed line-through opacity-60;
        }
        
        .calendar-day.past::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 3px;
            height: 3px;
            background-color: #6b7280;
            border-radius: 50%;
            opacity: 0.5;
        }
        
        /* Time Chip Styles */
        .time-chip {
            @apply transform transition-all duration-200 ease-in-out;
        }
        
        .time-chip.selected {
            @apply border-kasaami-violet bg-kasaami-violet text-white font-semibold scale-105 shadow-lg;
        }
        
        .time-chip.available:hover {
            @apply border-kasaami-violet bg-kasaami-light-violet text-white scale-105 shadow-md;
        }
        
        .time-chip.unavailable {
            @apply border-red-200 bg-red-50 text-red-400 cursor-not-allowed opacity-60;
        }
        
        /* Smooth transitions for calendar and modal */
        .modal-enter {
            @apply opacity-0 scale-95;
        }
        
        .modal-enter-active {
            @apply opacity-100 scale-100 transition-all duration-200 ease-out;
        }
        
        /* Loading states */
        .loading-pulse {
            animation: pulse 1.5s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }
        
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }
    </style>
</head>

<body class="font-poppins bg-white overflow-x-hidden">
    
    <!-- DEBUG: Indicador de conexión BD (comentar en producción) -->
    <div class="debug-indicator <?php echo $debug_db_status ? 'debug-connected' : 'debug-disconnected'; ?>" 
         title="<?php echo $debug_db_message; ?>"></div>
    
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
                        <?php echo nl2br($benefit['description']); ?>
                    </p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Formulario de Contacto -->
    <?php include 'componentes/formulario.php'; ?>



    <!-- Footer -->
    <?php include 'includes/Footer.php'; ?>

    <!-- WhatsApp Button -->
    <?php include 'includes/FlotanteWpp.php'; ?>

    <script>
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

        // Calendar variables
        let currentCalendarDate = new Date();
        let selectedDate = null;
        let selectedTime = null;
        let calendarVisible = false;
        
        // Available dates from PHP
        const availableDates = <?php echo json_encode($available_schedules['dates']); ?>;
        const availableTimes = <?php echo json_encode($available_schedules['times']); ?>;
        
        // Initialize page
        document.addEventListener('DOMContentLoaded', function() {
            checkDatabaseConnection();
            initializeTimeChips();
            
            // Calendar navigation
            document.getElementById('prev-month').addEventListener('click', function() {
                currentCalendarDate.setMonth(currentCalendarDate.getMonth() - 1);
                renderCalendar();
            });
            
            document.getElementById('next-month').addEventListener('click', function() {
                currentCalendarDate.setMonth(currentCalendarDate.getMonth() + 1);
                renderCalendar();
            });
            
            // Click outside calendar to close
            document.addEventListener('click', function(e) {
                const calendarDropdown = document.getElementById('calendar-dropdown');
                const dateDisplay = document.getElementById('date-display');
                
                if (!calendarDropdown.contains(e.target) && e.target !== dateDisplay) {
                    hideCalendar();
                }
            });

            // Phone input flag detection
            const phoneInput = document.getElementById('phone-input');
            if (phoneInput) {
                phoneInput.addEventListener('input', function() {
                    const value = this.value;
                    const countryCode = detectCountryFromPhone(value);
                    updatePhoneFlag(countryCode);
                });
                
                phoneInput.addEventListener('blur', function() {
                    if (this.value.trim() === '') {
                        updatePhoneFlag(null);
                    }
                });
            }

            // Handle modal keyboard shortcuts
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    const modal = document.getElementById('appointment-modal');
                    if (modal && !modal.classList.contains('hidden')) {
                        closeAppointmentModal();
                    }
                }
            });

            // Handle modal outside click
            document.getElementById('appointment-modal').addEventListener('click', function(e) {
                if (e.target === this) {
                    closeAppointmentModal();
                }
            });
        });

        // Verificar conexión a la base de datos
        async function checkDatabaseConnection() {
            try {
                const response = await fetch('includes/check_connection.php');
                const data = await response.json();
                
                const statusDiv = document.getElementById('connection-status');
                const statusIcon = document.getElementById('status-icon');
                const statusMessage = document.getElementById('status-message');
                
                if (data.success) {
                    statusDiv.className = 'mb-6 p-4 rounded-lg bg-green-50 border border-green-200';
                    statusIcon.innerHTML = `
                        <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                    `;
                    statusMessage.innerHTML = `
                        <span class="text-green-700 font-medium">Sistema CRM conectado</span>
                        <div class="text-green-600 text-sm mt-1">Base de datos: ${data.tables.join(', ')}</div>
                    `;
                } else {
                    statusDiv.className = 'mb-6 p-4 rounded-lg bg-red-50 border border-red-200';
                    statusIcon.innerHTML = `
                        <svg class="w-5 h-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                    `;
                    statusMessage.innerHTML = `
                        <span class="text-red-700 font-medium">Error de conexión CRM</span>
                        <div class="text-red-600 text-sm mt-1">Por favor contáctanos por WhatsApp</div>
                    `;
                }
                
                statusDiv.classList.remove('hidden');
                
            } catch (error) {
                console.error('Error checking connection:', error);
            }
        }

        // Toggle calendar visibility
        function toggleCalendar() {
            const calendarDropdown = document.getElementById('calendar-dropdown');
            
            if (calendarVisible) {
                hideCalendar();
            } else {
                showCalendar();
            }
        }
        
        // Show calendar
        function showCalendar() {
            const calendarDropdown = document.getElementById('calendar-dropdown');
            calendarDropdown.classList.remove('hidden');
            calendarVisible = true;
            renderCalendar();
        }
        
        // Hide calendar
        function hideCalendar() {
            const calendarDropdown = document.getElementById('calendar-dropdown');
            calendarDropdown.classList.add('hidden');
            calendarVisible = false;
        }
        
        // Render calendar
        function renderCalendar() {
            const monthNames = {
                'es': ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                'en': ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']
            };
            
            const currentLang = '<?php echo $currentLang; ?>';
            const monthYear = document.getElementById('calendar-month-year');
            const calendarDays = document.getElementById('calendar-days');
            
            // Update month/year display
            monthYear.textContent = `${monthNames[currentLang][currentCalendarDate.getMonth()]} ${currentCalendarDate.getFullYear()}`;
            
            // Clear previous days
            calendarDays.innerHTML = '';
            
            // Get first day of month and number of days
            const firstDay = new Date(currentCalendarDate.getFullYear(), currentCalendarDate.getMonth(), 1);
            const lastDay = new Date(currentCalendarDate.getFullYear(), currentCalendarDate.getMonth() + 1, 0);
            const startDate = new Date(firstDay);
            startDate.setDate(startDate.getDate() - firstDay.getDay());
            
            // Generate 42 days (6 weeks)
            for (let i = 0; i < 42; i++) {
                const date = new Date(startDate);
                date.setDate(startDate.getDate() + i);
                
                const dayButton = document.createElement('button');
                dayButton.type = 'button';
                dayButton.textContent = date.getDate();
                dayButton.className = 'calendar-day';
                
                const dateString = date.toISOString().split('T')[0];
                const isCurrentMonth = date.getMonth() === currentCalendarDate.getMonth();
                const isToday = dateString === new Date().toISOString().split('T')[0];
                const isPast = date < new Date().setHours(0, 0, 0, 0);
                const isAvailable = availableDates.includes(dateString);
                const isSelected = selectedDate === dateString;
                
                // Add appropriate classes
                if (!isCurrentMonth) {
                    dayButton.classList.add('other-month');
                    dayButton.disabled = true;
                } else if (isPast) {
                    dayButton.classList.add('past');
                    dayButton.disabled = true;
                } else if (!isAvailable) {
                    dayButton.classList.add('disabled');
                    dayButton.disabled = true;
                } else {
                    dayButton.classList.add('available');
                    dayButton.addEventListener('click', () => selectDate(dateString));
                }
                
                if (isToday && isCurrentMonth && !isPast) {
                    dayButton.classList.add('today');
                }
                
                if (isSelected) {
                    dayButton.classList.add('selected');
                    // Remove other classes when selected
                    dayButton.classList.remove('available', 'today');
                }
                
                calendarDays.appendChild(dayButton);
            }
        }
        
        // Select date function
        function selectDate(dateString) {
            selectedDate = dateString;
            selectedTime = null; // Reset time selection
            
            // Update hidden input
            document.getElementById('modal-appointment-date').value = dateString;
            
            // Update display input
            const dateObj = new Date(dateString);
            const formattedDate = dateObj.toLocaleDateString('<?php echo $currentLang === "es" ? "es-ES" : "en-US"; ?>', {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            });
            document.getElementById('date-display').value = formattedDate;
            
            // Hide calendar
            hideCalendar();
            
            // Re-render calendar to show selection
            renderCalendar();
            
            // Enable time selection
            enableTimeSelection();
            
            // Check availability for selected date
            checkModalAvailabilityForDate(dateString);
            document.getElementById('modal-availability-info').classList.remove('hidden');
        }
        
        // Initialize time chips
        function initializeTimeChips() {
            const timeChips = document.querySelectorAll('.time-chip');
            timeChips.forEach(chip => {
                chip.addEventListener('click', function() {
                    if (!this.disabled && selectedDate) {
                        selectTime(this.dataset.time);
                    }
                });
            });
        }
        
        // Enable time selection
        function enableTimeSelection() {
            const container = document.getElementById('time-selection-container');
            const chips = document.querySelectorAll('.time-chip');
            
            container.classList.remove('opacity-50', 'pointer-events-none');
            container.querySelector('p').textContent = '<?php echo $currentLang === "es" ? "Selecciona un horario:" : "Select a time:"; ?>';
            
            chips.forEach(chip => {
                chip.disabled = false;
                chip.classList.remove('selected', 'unavailable');
                chip.classList.add('available');
            });
        }
        
        // Select time function
        function selectTime(time) {
            selectedTime = time;
            
            // Update hidden input
            document.getElementById('modal-appointment-time').value = time;
            
            // Update chip styles
            document.querySelectorAll('.time-chip').forEach(chip => {
                chip.classList.remove('selected');
                if (chip.dataset.time === time) {
                    chip.classList.add('selected');
                }
            });
            
            // Update appointment summary
            updateAppointmentSummary();
            
            // Check specific time availability
            if (selectedDate && selectedTime) {
                checkModalSpecificTimeAvailability(selectedDate, selectedTime);
                document.getElementById('confirm-appointment-btn').disabled = false;
            }
        }
        
        // Update appointment summary
        function updateAppointmentSummary() {
            const appointmentSummary = document.getElementById('appointment-summary');
            const appointmentDetails = document.getElementById('appointment-details');
            
            if (selectedDate && selectedTime) {
                const dateObj = new Date(selectedDate);
                const isSpanish = '<?php echo $currentLang; ?>' === 'es';
                
                const dayNames = {
                    'es': ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                    'en': ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday']
                };
                
                const dayName = dayNames[isSpanish ? 'es' : 'en'][dateObj.getDay()];
                const formattedDate = dateObj.toLocaleDateString(isSpanish ? 'es-ES' : 'en-US', {
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                });
                
                const timeDisplay = availableTimes[selectedTime];
                
                appointmentDetails.innerHTML = `
                    <div class="flex items-center space-x-2">
                        <span class="text-2xl">📅</span>
                        <div>
                            <div class="font-medium">${dayName}</div>
                            <div class="text-xs text-gray-600">${formattedDate}</div>
                        </div>
                    </div>
                    <div class="flex items-center space-x-2">
                        <span class="text-2xl">🕐</span>
                        <div>
                            <div class="font-medium">${timeDisplay}</div>
                            <div class="text-xs text-gray-600">${isSpanish ? 'Hora local Ecuador' : 'Ecuador local time'}</div>
                        </div>
                    </div>
                    <div class="flex items-center space-x-2 mt-2 p-2 bg-white/50 rounded-lg">
                        <span class="text-lg">✨</span>
                        <div class="text-xs">
                            <div class="font-medium text-kasaami-dark-violet">${isSpanish ? 'Consulta Virtual Gratuita' : 'Free Virtual Consultation'}</div>
                            <div class="text-gray-600">${isSpanish ? 'Duración: 30 minutos' : 'Duration: 30 minutes'}</div>
                        </div>
                    </div>
                `;
                
                appointmentSummary.classList.remove('hidden');
            } else {
                appointmentSummary.classList.add('hidden');
            }
        }
        
        // Show appointment modal
        function showAppointmentModal() {
            const modal = document.getElementById('appointment-modal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.style.overflow = 'hidden';
        }

        // Close appointment modal
        function closeAppointmentModal() {
            const modal = document.getElementById('appointment-modal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.style.overflow = '';
            
            // Reset selections
            selectedDate = null;
            selectedTime = null;
            
            // Reset modal form
            document.getElementById('modal-appointment-date').value = '';
            document.getElementById('modal-appointment-time').value = '';
            document.getElementById('date-display').value = '';
            
            // Hide calendar
            hideCalendar();
            
            // Reset time selection UI
            const container = document.getElementById('time-selection-container');
            container.classList.add('opacity-50', 'pointer-events-none');
            container.querySelector('p').textContent = '<?php echo $t['form']['first_select_date']; ?>';
            
            // Reset time chips
            document.querySelectorAll('.time-chip').forEach(chip => {
                chip.disabled = true;
                chip.classList.remove('selected', 'available', 'unavailable');
            });
            
            // Hide availability info and disable confirm button
            document.getElementById('modal-availability-info').classList.add('hidden');
            document.getElementById('confirm-appointment-btn').disabled = true;
            
            // Reset calendar to current month
            currentCalendarDate = new Date();
        }

        // Fill user summary in modal
        function fillUserSummary() {
            const summaryContent = document.getElementById('summary-content');
            const formData = window.formData;
            
            const isSpanish = '<?php echo $currentLang; ?>' === 'es';
            
            const name = formData.get('name') + ' ' + formData.get('lastname');
            const email = formData.get('email');
            const phone = formData.get('phone');
            const procedure = formData.get('procedures_interest');
            const budget = formData.get('budget');
            const travelType = formData.get('travel_type');
            
            // Get budget display text
            const budgetOptions = <?php echo json_encode($t['form']['budget_options']); ?>;
            const budgetDisplay = budgetOptions[budget] || budget;
            
            // Get travel type display text
            const travelOptions = <?php echo json_encode($t['form']['travel_type_options']); ?>;
            const travelDisplay = travelOptions[travelType] || travelType;
            
            let summaryHTML = `
                <div><strong>${isSpanish ? 'Nombre:' : 'Name:'}</strong> ${name}</div>
                <div><strong>${isSpanish ? 'Email:' : 'Email:'}</strong> ${email}</div>
                <div><strong>${isSpanish ? 'Teléfono:' : 'Phone:'}</strong> ${phone}</div>
                <div><strong>${isSpanish ? 'Procedimiento:' : 'Procedure:'}</strong> ${procedure.length > 100 ? procedure.substring(0, 100) + '...' : procedure}</div>
                <div><strong>${isSpanish ? 'Presupuesto:' : 'Budget:'}</strong> ${budgetDisplay}</div>
                <div><strong>${isSpanish ? 'Viaja:' : 'Travels:'}</strong> ${travelDisplay}</div>
            `;
            
            summaryContent.innerHTML = summaryHTML;
        }

        // Confirm appointment and submit form
        async function confirmAppointment() {
            const appointmentDate = document.getElementById('modal-appointment-date').value;
            const appointmentTime = document.getElementById('modal-appointment-time').value;
            
            if (!appointmentDate || !appointmentTime) {
                showErrorMessage('<?php echo $currentLang === 'es' ? 'Por favor selecciona fecha y hora para la cita' : 'Please select date and time for the appointment'; ?>');
                return;
            }
            
            const confirmBtn = document.getElementById('confirm-appointment-btn');
            const confirmText = document.getElementById('confirm-appointment-text');
            const confirmLoading = document.getElementById('confirm-appointment-loading');
            
            // Show loading state
            confirmBtn.disabled = true;
            confirmText.classList.add('hidden');
            confirmLoading.classList.remove('hidden');
            
            try {
                // Add appointment data to form
                window.formData.append('appointment_date', appointmentDate);
                window.formData.append('appointment_time', appointmentTime);
                
                const response = await fetch('includes/formulario.php', {
                    method: 'POST',
                    body: window.formData
                });
                
                const data = await response.json();
                
                if (data.success) {
                    closeAppointmentModal();
                    showSuccessMessage(data.message, data.data);
                    
                    // Reset main form
                    document.getElementById('contact-form').reset();
                    updatePhoneFlag(null);
                    document.getElementById('group-size-section').classList.add('hidden');
                } else {
                    showErrorMessage(data.message);
                }
                
            } catch (error) {
                console.error('Appointment confirmation error:', error);
                showErrorMessage('<?php echo $currentLang === 'es' ? 'Error de conexión. Por favor intenta de nuevo o contáctanos por WhatsApp.' : 'Connection error. Please try again or contact us via WhatsApp.'; ?>');
            } finally {
                // Reset button state
                confirmBtn.disabled = false;
                confirmText.classList.remove('hidden');
                confirmLoading.classList.add('hidden');
            }
        }

        // Verificar disponibilidad para una fecha específica (Modal version)
        async function checkModalAvailabilityForDate(date) {
            try {
                const response = await fetch(`includes/check_availability.php?date=${date}`);
                const data = await response.json();
                
                const availabilityText = document.getElementById('modal-availability-text');
                
                if (data.success) {
                    const available = data.available_slots;
                    const total = data.total_slots;
                    const percentage = ((available / total) * 100).toFixed(0);
                    
                    const isSpanish = '<?php echo $currentLang; ?>' === 'es';
                    
                    if (percentage > 50) {
                        availabilityText.innerHTML = `<span class="text-green-600">${isSpanish ? 'Buena disponibilidad:' : 'Good availability:'} ${available} de ${total} ${isSpanish ? 'horarios disponibles' : 'time slots available'}</span>`;
                    } else if (percentage > 20) {
                        availabilityText.innerHTML = `<span class="text-yellow-600">${isSpanish ? 'Disponibilidad limitada:' : 'Limited availability:'} ${available} de ${total} ${isSpanish ? 'horarios disponibles' : 'time slots available'}</span>`;
                    } else {
                        availabilityText.innerHTML = `<span class="text-red-600">${isSpanish ? 'Poca disponibilidad:' : 'Low availability:'} ${available} de ${total} ${isSpanish ? 'horarios disponibles' : 'time slots available'}</span>`;
                    }
                    
                    // Update time chips availability
                    updateTimeChipsAvailability(data.unavailable_times || []);
                } else {
                    const isSpanish = '<?php echo $currentLang; ?>' === 'es';
                    availabilityText.innerHTML = `<span class="text-gray-600">${isSpanish ? 'No se pudo verificar disponibilidad' : 'Could not verify availability'}</span>`;
                }
            } catch (error) {
                console.error('Error checking availability:', error);
            }
        }
        
        // Update time chips based on availability
        function updateTimeChipsAvailability(unavailableTimes) {
            document.querySelectorAll('.time-chip').forEach(chip => {
                const time = chip.dataset.time;
                if (unavailableTimes.includes(time)) {
                    chip.classList.remove('available');
                    chip.classList.add('unavailable');
                    chip.disabled = true;
                    
                    // Add unavailable text
                    const display = chip.querySelector('div');
                    const isSpanish = '<?php echo $currentLang; ?>' === 'es';
                    display.innerHTML += `<br><span class="text-xs">${isSpanish ? 'No disponible' : 'Unavailable'}</span>`;
                } else {
                    chip.classList.remove('unavailable');
                    chip.classList.add('available');
                    chip.disabled = false;
                    
                    // Remove any unavailable text
                    const display = chip.querySelector('div');
                    const originalText = availableTimes[time];
                    display.innerHTML = originalText;
                }
            });
        }

        // Verificar disponibilidad de un horario específico (Modal version)
        async function checkModalSpecificTimeAvailability(date, time) {
            try {
                const response = await fetch(`includes/check_availability.php?date=${date}&time=${time}`);
                const data = await response.json();
                
                const availabilityText = document.getElementById('modal-availability-text');
                const isSpanish = '<?php echo $currentLang; ?>' === 'es';
                
                if (data.success) {
                    if (data.available) {
                        availabilityText.innerHTML = `<span class="text-green-600">✓ ${isSpanish ? 'Horario disponible' : 'Time slot available'}</span>`;
                        // Enable confirm button
                        document.getElementById('confirm-appointment-btn').disabled = false;
                    } else {
                        availabilityText.innerHTML = `<span class="text-red-600">✗ ${isSpanish ? 'Horario no disponible' : 'Time slot not available'}</span>`;
                        
                        // Mark the selected chip as unavailable
                        const selectedChip = document.querySelector(`[data-time="${time}"]`);
                        if (selectedChip) {
                            selectedChip.classList.remove('selected', 'available');
                            selectedChip.classList.add('unavailable');
                            selectedChip.disabled = true;
                        }
                        
                        // Reset selection
                        selectedTime = null;
                        document.getElementById('modal-appointment-time').value = '';
                        
                        // Disable confirm button
                        document.getElementById('confirm-appointment-btn').disabled = true;
                    }
                }
            } catch (error) {
                console.error('Error checking time availability:', error);
            }
        }

        // Form submission - intercept to show appointment modal
        document.getElementById('contact-form').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Validate form first
            if (!this.checkValidity()) {
                this.reportValidity();
                return;
            }
            
            // Store form data temporarily
            window.formData = new FormData(this);
            
            // Fill user summary in modal
            fillUserSummary();
            
            // Show appointment modal
            showAppointmentModal();
        });

        // Enhanced success message with CRM data
        function showSuccessMessage(message, data) {
            const modal = document.createElement('div');
            modal.className = 'fixed inset-0 bg-black/50 z-50 flex items-center justify-center';
            modal.innerHTML = `
                <div class="bg-white rounded-2xl p-8 max-w-md mx-4 text-center animate-slide-up">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-rufina font-bold text-gray-900 mb-4"><?php echo $t['success']['appointment_scheduled']; ?></h3>
                    <p class="text-gray-600 mb-6">${message}</p>
                    ${data ? `
                        <div class="bg-gray-50 rounded-lg p-4 mb-6 text-left">
                            <h4 class="font-semibold text-gray-900 mb-2">Detalles de tu cita:</h4>
                            <p class="text-sm text-gray-600">📅 Fecha: ${data.appointment_date}</p>
                            <p class="text-sm text-gray-600">🕒 Hora: ${data.appointment_time}</p>
                            <p class="text-sm text-gray-600">✅ Estado: Confirmada</p>
                        </div>
                        <div class="bg-blue-50 rounded-lg p-4 mb-6 text-left">
                            <h4 class="font-semibold text-blue-900 mb-2"><?php echo $t['success']['next_steps']; ?></h4>
                            <ol class="text-sm text-blue-700 space-y-1">
                                <li>1. <?php echo $t['success']['step1']; ?></li>
                                <li>2. <?php echo $t['success']['step2']; ?></li>
                                <li>3. <?php echo $t['success']['step3']; ?></li>
                            </ol>
                        </div>
                    ` : ''}
                    <div class="space-y-3">
                        <button onclick="this.closest('.fixed').remove()" class="w-full bg-kasaami-violet hover:bg-kasaami-dark-violet text-white px-6 py-3 rounded-lg font-medium transition-colors duration-200">
                            <?php echo $t['success']['close']; ?>
                        </button>
                    </div>
                </div>
            `;
            
            document.body.appendChild(modal);
            
            // Close on click outside
            modal.addEventListener('click', (e) => {
                if (e.target === modal) {
                    modal.remove();
                }
            });

            // Close on escape key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    modal.remove();
                }
            });
        }

        // Enhanced error message
        function showErrorMessage(message) {
            const errorDiv = document.createElement('div');
            errorDiv.className = 'fixed top-4 right-4 bg-red-500 text-white px-6 py-4 rounded-lg shadow-lg z-50 animate-slide-up max-w-sm';
            errorDiv.innerHTML = `
                <div class="flex items-start">
                    <svg class="w-5 h-5 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 000 2v4a1 1 0 002 0V7a1 1 0 00-1-1z" clip-rule="evenodd"/>
                    </svg>
                    <div>
                        <div class="font-medium">${message}</div>
                        <button onclick="this.closest('.fixed').remove()" class="text-red-200 hover:text-white text-sm mt-1">Cerrar</button>
                    </div>
                </div>
            `;
            
            document.body.appendChild(errorDiv);
            
            setTimeout(() => {
                if (errorDiv.parentNode) {
                    errorDiv.remove();
                }
            }, 8000);
        }

        // Toggle group size field based on travel type
        function toggleGroupSize() {
            const travelTypeRadios = document.querySelectorAll('input[name="travel_type"]');
            const groupSizeSection = document.getElementById('group-size-section');
            const groupSizeInput = document.querySelector('input[name="group_size"]');
            
            let isGroupSelected = false;
            travelTypeRadios.forEach(radio => {
                if (radio.checked && radio.value === 'grupo') {
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

        // Play video function
        function playVideo() {
            // Create modal for video
            const modal = document.createElement('div');
            modal.className = 'fixed inset-0 bg-black/80 z-50 flex items-center justify-center p-4';
            modal.innerHTML = `
                <div class="relative max-w-4xl w-full">
                    <button onclick="this.closest('.fixed').remove()" class="absolute -top-12 right-0 text-white hover:text-gray-300 text-2xl">
                        ✕
                    </button>
                    <div class="aspect-video bg-gray-900 rounded-lg flex items-center justify-center">
                        <div class="text-center text-white">
                            <svg class="w-16 h-16 mx-auto mb-4 opacity-50" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8 5v14l11-7z"/>
                            </svg>
                            <p class="text-xl">Video de presentación</p>
                            <p class="text-sm opacity-75 mt-2">Próximamente disponible</p>
                        </div>
                    </div>
                </div>
                
                </div>
            `;
            
            document.body.appendChild(modal);
            
            // Close on click outside
            modal.addEventListener('click', (e) => {
                if (e.target === modal) {
                    modal.remove();
                }
            });
        }

        // Form validation enhancements
        const inputs = document.querySelectorAll('.form-input');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('focused');
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.classList.remove('focused');
                
                // Real-time validation
                if (this.type === 'email' && this.value) {
                    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (!emailRegex.test(this.value)) {
                        this.classList.add('border-red-500');
                    } else {
                        this.classList.remove('border-red-500');
                    }
                }
                
                if (this.type === 'tel' && this.value) {
                    if (this.value.length < 10) {
                        this.classList.add('border-red-500');
                    } else {
                        this.classList.remove('border-red-500');
                    }
                }
            });
        });

        // Handle escape key to close modals
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                document.querySelectorAll('.fixed').forEach(modal => {
                    if (modal.classList.contains('z-50')) {
                        modal.remove();
                    }
                });
            }
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

        // Console log for debugging
        console.log('Kasaami Contact Form with CRM integration loaded successfully');
        console.log('Database Status:', '<?php echo $debug_db_status ? "Connected" : "Disconnected"; ?>');
        console.log('Debug Message:', '<?php echo $debug_db_message; ?>');
    </script>
</body>
</html>