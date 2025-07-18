<?php
// contactanos.php
$pageTitle = "Contacto - Kasaami Care & Beauty";
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
            'title' => 'Contacto',
            'subtitle' => 'Agenda tu consulta gratuita y personalizada'
        ],
        'intro' => [
            'title' => 'Comienza tu transformación',
            'description' => 'Nuestro equipo de especialistas está listo para acompañarte en cada paso de tu proceso de transformación. Agenda una consulta gratuita y descubre todas las opciones disponibles para ti.',
            'video_text' => 'Conoce más sobre nuestro proceso y cómo podemos ayudarte a alcanzar tus objetivos de transformación y bienestar.'
        ],
        'form' => [
            'title' => 'Agenda tu consulta gratuita',
            'name' => 'Nombre completo',
            'email' => 'Correo electrónico',
            'phone' => 'Teléfono',
            'country' => 'País de residencia',
            'procedure' => 'Procedimiento de interés',
            'date' => 'Fecha preferida',
            'time' => 'Hora preferida',
            'message' => 'Mensaje adicional',
            'submit' => 'Agendar Consulta',
            'required' => 'Campo requerido'
        ],
        'contact_info' => [
            'title' => 'Información de Contacto',
            'address' => 'Quito, Ecuador',
            'phone' => '+593 XXX XXXX',
            'email' => 'info@kasaami.com',
            'hours' => 'Lunes a Viernes: 8:00 AM - 6:00 PM',
            'emergency' => 'Emergencias 24/7'
        ],
        'procedures' => [
            'body' => 'Procedimientos Corporales',
            'face' => 'Procedimientos Faciales',
            'hair' => 'Trasplante Capilar',
            'obesity' => 'Cirugía Bariátrica',
            'other' => 'Otro'
        ],
        'success' => [
            'title' => '¡Consulta Agendada!',
            'message' => 'Hemos recibido tu solicitud. Te contactaremos pronto para confirmar tu cita.',
            'next_steps' => 'Próximos pasos:',
            'step1' => 'Recibirás un email de confirmación',
            'step2' => 'Nuestro equipo te contactará en 24 horas',
            'step3' => 'Se creará un enlace para tu consulta virtual'
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
            'message' => 'Hola! Me interesa agendar una consulta con Kasaami Care & Beauty.',
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
            'title' => 'Contact',
            'subtitle' => 'Schedule your free and personalized consultation'
        ],
        'intro' => [
            'title' => 'Start your transformation',
            'description' => 'Our team of specialists is ready to accompany you in every step of your transformation process. Schedule a free consultation and discover all the options available for you.',
            'video_text' => 'Learn more about our process and how we can help you achieve your transformation and wellness goals.'
        ],
        'form' => [
            'title' => 'Schedule your free consultation',
            'name' => 'Full name',
            'email' => 'Email address',
            'phone' => 'Phone number',
            'country' => 'Country of residence',
            'procedure' => 'Procedure of interest',
            'date' => 'Preferred date',
            'time' => 'Preferred time',
            'message' => 'Additional message',
            'submit' => 'Schedule Consultation',
            'required' => 'Required field'
        ],
        'contact_info' => [
            'title' => 'Contact Information',
            'address' => 'Quito, Ecuador',
            'phone' => '+593 XXX XXXX',
            'email' => 'info@kasaami.com',
            'hours' => 'Monday to Friday: 8:00 AM - 6:00 PM',
            'emergency' => '24/7 Emergency'
        ],
        'procedures' => [
            'body' => 'Body Procedures',
            'face' => 'Facial Procedures', 
            'hair' => 'Hair Transplant',
            'obesity' => 'Bariatric Surgery',
            'other' => 'Other'
        ],
        'success' => [
            'title' => 'Consultation Scheduled!',
            'message' => 'We have received your request. We will contact you soon to confirm your appointment.',
            'next_steps' => 'Next steps:',
            'step1' => 'You will receive a confirmation email',
            'step2' => 'Our team will contact you within 24 hours',
            'step3' => 'A link will be created for your virtual consultation'
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
            'message' => 'Hello! I am interested in scheduling a consultation with Kasaami Care & Beauty.',
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
    <meta name="keywords" content="contacto, consulta médica, Ecuador, turismo médico, agendar cita">
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

    <!-- Introduction with Video Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <!-- Content -->
                <div class="space-y-8">
                    <h2 class="text-4xl md:text-5xl font-rufina font-bold text-gray-900">
                        <?php echo $t['intro']['title']; ?>
                    </h2>
                    <p class="text-lg text-gray-600 leading-relaxed">
                        <?php echo $t['intro']['description']; ?>
                    </p>
                    <div class="bg-kasaami-pearl p-6 rounded-xl border-l-4 border-kasaami-violet">
                        <p class="text-gray-700 font-medium">
                            <?php echo $t['intro']['video_text']; ?>
                        </p>
                    </div>
                </div>
                
                <!-- Video Placeholder -->
                <div class="relative hover-lift">
                    <div class="aspect-video bg-gradient-to-br from-kasaami-violet to-kasaami-dark-violet rounded-2xl shadow-2xl flex items-center justify-center">
                        <div class="text-center text-white">
                            <svg class="w-20 h-20 mx-auto mb-4 animate-pulse-gentle" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8 5v14l11-7z"/>
                            </svg>
                            <p class="text-lg font-medium">Video de Presentación</p>
                            <p class="text-sm opacity-80">Conoce nuestro proceso</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Form & Info Section -->
    <section class="py-20 bg-kasaami-pearl">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                
                <!-- Contact Form -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-2xl shadow-xl p-8 hover-lift">
                        <h2 class="text-3xl font-rufina font-bold text-gray-900 mb-8">
                            <?php echo $t['form']['title']; ?>
                        </h2>
                        
                        <form id="contact-form" class="space-y-6">
                            <!-- Name & Email -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        <?php echo $t['form']['name']; ?> <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" required class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-kasaami-violet focus:border-kasaami-violet">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        <?php echo $t['form']['email']; ?> <span class="text-red-500">*</span>
                                    </label>
                                    <input type="email" required class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-kasaami-violet focus:border-kasaami-violet">
                                </div>
                            </div>

                            <!-- Phone & Country -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        <?php echo $t['form']['phone']; ?> <span class="text-red-500">*</span>
                                    </label>
                                    <input type="tel" required class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-kasaami-violet focus:border-kasaami-violet">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        <?php echo $t['form']['country']; ?> <span class="text-red-500">*</span>
                                    </label>
                                    <select required class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-kasaami-violet focus:border-kasaami-violet">
                                        <option value="">Seleccionar país</option>
                                        <option value="US">Estados Unidos</option>
                                        <option value="CA">Canadá</option>
                                        <option value="ES">España</option>
                                        <option value="MX">México</option>
                                        <option value="CO">Colombia</option>
                                        <option value="PE">Perú</option>
                                        <option value="AR">Argentina</option>
                                        <option value="other">Otro</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Procedure -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    <?php echo $t['form']['procedure']; ?> <span class="text-red-500">*</span>
                                </label>
                                <select required class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-kasaami-violet focus:border-kasaami-violet">
                                    <option value="">Seleccionar procedimiento</option>
                                    <option value="body"><?php echo $t['procedures']['body']; ?></option>
                                    <option value="face"><?php echo $t['procedures']['face']; ?></option>
                                    <option value="hair"><?php echo $t['procedures']['hair']; ?></option>
                                    <option value="obesity"><?php echo $t['procedures']['obesity']; ?></option>
                                    <option value="other"><?php echo $t['procedures']['other']; ?></option>
                                </select>
                            </div>

                            <!-- Date & Time -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        <?php echo $t['form']['date']; ?>
                                    </label>
                                    <input type="date" class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-kasaami-violet focus:border-kasaami-violet">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        <?php echo $t['form']['time']; ?>
                                    </label>
                                    <select class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-kasaami-violet focus:border-kasaami-violet">
                                        <option value="">Seleccionar hora</option>
                                        <option value="09:00">9:00 AM</option>
                                        <option value="10:00">10:00 AM</option>
                                        <option value="11:00">11:00 AM</option>
                                        <option value="14:00">2:00 PM</option>
                                        <option value="15:00">3:00 PM</option>
                                        <option value="16:00">4:00 PM</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Message -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    <?php echo $t['form']['message']; ?>
                                </label>
                                <textarea rows="4" class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-kasaami-violet focus:border-kasaami-violet" placeholder="Cuéntanos más sobre tus objetivos y expectativas..."></textarea>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="w-full bg-gradient-to-r from-kasaami-violet to-kasaami-dark-violet text-white py-4 px-8 rounded-lg font-semibold text-lg hover:shadow-lg hover:shadow-kasaami-violet/25 transition-all duration-200 transform hover:scale-105">
                                <?php echo $t['form']['submit']; ?>
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Contact Information -->
                <div class="space-y-8">
                    <!-- Contact Info Card -->
                    <div class="bg-white rounded-2xl shadow-xl p-8 hover-lift">
                        <h3 class="text-2xl font-rufina font-bold text-gray-900 mb-6">
                            <?php echo $t['contact_info']['title']; ?>
                        </h3>
                        
                        <div class="space-y-4">
                            <!-- Address -->
                            <div class="flex items-start space-x-4">
                                <div class="w-6 h-6 text-kasaami-violet mt-1">
                                    <svg fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-900">Dirección</p>
                                    <p class="text-gray-600"><?php echo $t['contact_info']['address']; ?></p>
                                </div>
                            </div>

                            <!-- Phone -->
                            <div class="flex items-start space-x-4">
                                <div class="w-6 h-6 text-kasaami-violet mt-1">
                                    <svg fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-900">Teléfono</p>
                                    <p class="text-gray-600"><?php echo $t['contact_info']['phone']; ?></p>
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="flex items-start space-x-4">
                                <div class="w-6 h-6 text-kasaami-violet mt-1">
                                    <svg fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-900">Email</p>
                                    <p class="text-gray-600"><?php echo $t['contact_info']['email']; ?></p>
                                </div>
                            </div>

                            <!-- Hours -->
                            <div class="flex items-start space-x-4">
                                <div class="w-6 h-6 text-kasaami-violet mt-1">
                                    <svg fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-900">Horarios</p>
                                    <p class="text-gray-600"><?php echo $t['contact_info']['hours']; ?></p>
                                    <p class="text-sm text-kasaami-violet font-medium"><?php echo $t['contact_info']['emergency']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Contact Buttons -->
                    <div class="space-y-4">
                        <a href="https://wa.me/593XXXXXXXXX" class="flex items-center justify-center space-x-3 bg-green-500 hover:bg-green-600 text-white py-4 px-6 rounded-lg transition-colors duration-200 transform hover:scale-105">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"/>
                            </svg>
                            <span class="font-medium">Chatear por WhatsApp</span>
                        </a>
                        
                        <a href="mailto:info@kasaami.com" class="flex items-center justify-center space-x-3 bg-kasaami-violet hover:bg-kasaami-dark-violet text-white py-4 px-6 rounded-lg transition-colors duration-200 transform hover:scale-105">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                            </svg>
                            <span class="font-medium">Enviar Email</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Success Message (Hidden by default) -->
    <div id="success-message" class="fixed inset-0 bg-black/50 z-50 flex items-center justify-center hidden">
        <div class="bg-white rounded-2xl p-8 max-w-md mx-4 text-center animate-slide-up">
            <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-8 h-8 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
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

    <!-- Call to Action Section -->
    <section class="py-20 bg-gradient-to-r from-kasaami-violet to-kasaami-dark-violet text-white">
        <div class="max-w-4xl mx-auto text-center px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl md:text-5xl font-rufina font-bold mb-6">
                <?php echo $currentLang === 'es' ? 'Tu transformación te está esperando' : 'Your transformation is waiting for you'; ?>
            </h2>
            <p class="text-xl mb-8 opacity-90">
                <?php echo $currentLang === 'es' ? 'Da el primer paso hacia la versión mejorada de ti mismo' : 'Take the first step towards an improved version of yourself'; ?>
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="sobre-nosotros.php" class="bg-white text-kasaami-violet px-8 py-4 rounded-full font-semibold hover:bg-gray-100 transition-colors duration-200 transform hover:scale-105">
                    <?php echo $currentLang === 'es' ? 'Conocer Más' : 'Learn More'; ?>
                </a>
                <a href="procedimientos.php" class="border-2 border-white text-white px-8 py-4 rounded-full font-semibold hover:bg-white hover:text-kasaami-violet transition-all duration-200 transform hover:scale-105">
                    <?php echo $currentLang === 'es' ? 'Ver Procedimientos' : 'View Procedures'; ?>
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include 'includes/Footer.php'; ?>

    <!-- WhatsApp Button -->
    <?php include 'includes/FlotanteWpp.php'; ?>

    <script>
        // Form submission handler
        document.getElementById('contact-form').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Show success message
            document.getElementById('success-message').classList.remove('hidden');
            
            // Here you would normally send the form data to your backend
            // For now, we'll just simulate a successful submission
            
            // Reset form
            this.reset();
        });

        // Close success message
        function closeSuccessMessage() {
            document.getElementById('success-message').classList.add('hidden');
        }

        // Close success message when clicking outside
        document.getElementById('success-message').addEventListener('click', function(e) {
            if (e.target === this) {
                closeSuccessMessage();
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

        // Set minimum date to today
        const dateInput = document.querySelector('input[type="date"]');
        if (dateInput) {
            const today = new Date().toISOString().split('T')[0];
            dateInput.setAttribute('min', today);
        }

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
    </script>
</body>
</html>