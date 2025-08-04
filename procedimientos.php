<?php
// pages/procedimientos.php
require_once('includes/init-language.php');
$pageTitle = setPageTitle(
    "Procedimientos - Kasaami Care & Beauty",
    "Procedures - Kasaami Care & Beauty"
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
            'title' => 'Nuestros Procedimientos',
            'subtitle' => 'Tu transformación merece mucho más que resultados. En Kasaami, unimos excelencia médica con experiencias únicas que renuevan cuerpo y alma en el corazón de los Andes.'
        ],
        'intro' => [
            'title' => 'Tu salud merece más que solo resultados',
            'description' => 'En Kasaami, entendemos que los procedimientos médicos son mucho más que técnicas: son momentos de cuidado, confianza y transformación. Por eso, hacemos que tu experiencia sea fácil, ágil y memorable, acompañándote con calidez en cada paso.'
        ],
        'procedures_unified' => [
            [
                'id' => 'faciales',
                'name' => 'Procedimientos Faciales',
                'mainTitle' => 'Procedimientos Faciales que Armonizan, Rejuvenecen y Elevan tu Confianza',
                'description' => 'Técnicas de vanguardia para armonizar tu rostro manteniendo tu esencia natural.',
                'duration' => '1-2 horas',
                'recovery' => '5-7 días',
                'icon' => 'face',
                'color_theme' => 'purple',
                'gradient' => 'from-purple-100 to-violet-200',
                'accent_color' => 'text-kasaami-violet',
                'images' => [
                    'main' => 'assets/tarjetas/marcascirujia.png',
                    'care' => 'assets/tarjetas/facial1.png',
                    'results' => 'assets/tarjetas/facial2.png'
                ],
                'stats' => [
                    'satisfaction' => '90%',
                    'care_hours' => '94%',
                    'transformations' => '+114K'
                ],
                'specialized_text' => 'Lifting Facial (Ritidectomía)',
                'care_stat_text' => 'Pacientes reportan sentirse más seguros consigo mismos',
                'central_stat_text' => 'Pacientes combinan lifting con cuello',
                'central_description' => 'Efecto natural con técnica avanzada, sin apariencia tirante. Recupera firmeza, redefine tus facciones, rejuvenece hasta 10 años.',
                'results_stat_text' => 'Personas al mes rejuvenecen su mirada con blefaroplastia',
                'bottom_card' => [
                    'title' => 'Blefaroplastia',
                    'description' => 'Cirugía de párpados que rejuvenece tu mirada sin cambiar tu expresión.',
                    'claim' => 'Una mirada joven y descansada',
                    'benefits' => [
                        'Corrige bolsas, párpados caídos y exceso de piel',
                        'Mejora la expresión facial y la visión periférica',
                        'Procedimiento ambulatorio con anestesia local o sedación leve',
                        'Cicatrices imperceptibles',
                        'Tiene efecto de larga duración (5-10 años)',
                        'Ideal a partir de los 35-40 años'
                    ]
                ]
            ],
            [
                'id' => 'corporales',
                'name' => 'Procedimientos Corporales',
                'mainTitle' => 'Procedimientos Corporales Diseñados para Transformar',
                'description' => 'Contorno corporal de alta definición con tecnología de última generación.',
                'duration' => '2.5-4 horas',
                'recovery' => '2-3 semanas',
                'icon' => 'body',
                'color_theme' => 'purple',
                'gradient' => 'from-violet-100 to-purple-200',
                'accent_color' => 'text-kasaami-violet',
                'images' => [
                    'main' => 'assets/tarjetas/corporal1.webp',
                    'care' => 'assets/tarjetas/corporal2.jpg',
                    'results' => 'assets/tarjetas/corporal3.avif'
                ],
                'stats' => [
                    'satisfaction' => '2 - 4',
                    'care_hours' => '+22K',
                    'transformations' => '97%'
                ],
                'specialized_text' => 'Brazilian Butt Lift (BBL / Aumento de glúteos)',
                'care_stat_text' => 'Personas al mes optan por liposucción en más de una zona del cuerpo',
                'central_stat_text' => 'Horas Duración promedio del procedimiento',
                'central_description' => 'Realza tu silueta sin implantes, con técnica de transferencia grasa. Curvas naturales con tu propia grasa.',
                'results_stat_text' => 'Satisfacción en mujeres post-parto o post-bariátricas',
                'bottom_card' => [
                    'title' => 'Abdominoplastia ("Tummy Tuck")',
                    'description' => 'Cirugía para remover exceso de piel y grasa abdominal, y reforzar músculos abdominales.',
                    'claim' => 'Tu abdomen plano, firme y sin piel sobrante',
                    'benefits' => [
                        'Elimina piel flácida y estrías del abdomen',
                        'Refuerza músculos abdominales separados',
                        'Mejora contorno corporal post-embarazo',
                        'Resultados duraderos con estilo de vida saludable'
                    ]
                ]
            ],
            [
                'id' => 'mamarias',
                'name' => 'Cirugías Mamarias',
                'mainTitle' => 'Cirugías Mamarias Diseñadas para Equilibrar, Embellecer y Potenciar tu Silueta',
                'description' => 'Aumento, reducción y lifting mamario con resultados naturales y seguros.',
                'duration' => '2-4 horas',
                'recovery' => '1-4 semanas',
                'icon' => 'breast',
                'color_theme' => 'purple',
                'gradient' => 'from-purple-200 to-indigo-300',
                'accent_color' => 'text-kasaami-violet',
                'images' => [
                    'main' => 'assets/tarjetas/MAMARIAS1.webp',
                    'care' => 'assets/tarjetas/MAMARIAS2.jpg',
                    'results' => 'assets/tarjetas/MAMARIAS3.webp'
                ],
                'stats' => [
                    'satisfaction' => '9/10',
                    'care_hours' => 'Top 1',
                    'transformations' => '91%'
                ],
                'specialized_text' => 'Mamoplastia de Reducción',
                'care_stat_text' => 'Procedimiento estético más realizado en el mundo',
                'central_stat_text' => 'Mujeres mejoran dolores de espalda, cuello y postura',
                'central_description' => 'Menos peso, más libertad y bienestar. Alivio físico y emocional que cambia tu día a día y tu autoestima.',
                'results_stat_text' => 'Satisfacción a largo plazo según estudios clínicos',
                'bottom_card' => [
                    'title' => 'Mastopexia (Levantamiento de senos)',
                    'description' => 'Eleva y reafirma los senos eliminando el exceso de piel y reposicionando el tejido.',
                    'claim' => 'Recupera la firmeza y forma de tu busto',
                    'benefits' => [
                        'Levanta y reafirma senos caídos',
                        'Reposiciona areola y pezón naturalmente',
                        'Combina con aumento si se desea más volumen',
                        'Restaura confianza y feminidad'
                    ]
                ]
            ],
            [
                'id' => 'capilares',
                'name' => 'Procedimientos Capilares',
                'mainTitle' => 'Soluciones para Recuperar Volumen, Densidad y Confianza desde la Raíz',
                'description' => 'Rejuvenecimiento facial natural que preserva tu expresión única.',
                'duration' => '4-6 horas',
                'recovery' => '3-7 días',
                'icon' => 'hair',
                'color_theme' => 'purple',
                'gradient' => 'from-purple-150 to-violet-250',
                'accent_color' => 'text-kasaami-violet',
                'images' => [
                    'main' => 'assets/tarjetas/capilar2.png',
                    'care' => 'assets/tarjetas/capilar1.png',
                    'results' => 'assets/tarjetas/capilar3.png'
                ],
                'stats' => [
                    'satisfaction' => '7/10',
                    'care_hours' => '6 - 12',
                    'transformations' => '+95%'
                ],
                'specialized_text' => 'Frontal Hairline Design',
                'care_stat_text' => 'meses Resultados progresivos a partir del tercer mes, visibles a los 6-12 meses',
                'central_stat_text' => 'Hombres se someten a un trasplante capilar para rediseñar la línea frontal',
                'central_description' => 'Rejuvenece tu expresión con naturalidad y precisión. Una línea frontal bien diseñada transforma tu marco facial y te devuelve seguridad.',
                'results_stat_text' => 'De éxito en integración del folículo',
                'bottom_card' => [
                    'title' => 'Transplante Capilar en Barba y Cejas (FUE)',
                    'description' => 'Implante folicular desde la zona donante para definir, poblar o reconstruir barba y cejas con un resultado natural.',
                    'claim' => 'Reconstrucción facial con impacto estético y emocional',
                    'benefits' => [
                        'Corrige bolsas, párpados caídos y exceso de piel',
                        'Mejora la expresión facial y la visión periférica',
                        'Procedimiento ambulatorio con anestesia local',
                        'Cicatrices imperceptibles y naturales',
                        'Resultados permanentes y naturales',
                        'Técnica FUE mínimamente invasiva'
                    ]
                ]
            ],
            [
                'id' => 'bariatricas',
                'name' => 'Intervenciones Bariátricas',
                'mainTitle' => 'Intervenciones Médicas Seguras, Efectivas y Acompañadas por Expertos',
                'description' => 'Pérdida de peso no quirúrgica y acompañamiento médico seguro.',
                'duration' => '3-4 horas',
                'recovery' => '3-14 días',
                'icon' => 'weight',
                'color_theme' => 'purple',
                'gradient' => 'from-violet-200 to-purple-300',
                'accent_color' => 'text-kasaami-violet',
                'images' => [
                    'main' => 'assets/tarjetas/bariatrico2.jpg',
                    'care' => 'assets/tarjetas/bariatricas1.png',
                    'results' => 'assets/tarjetas/bariatrico3.jpg'
                ],
                'stats' => [
                    'satisfaction' => '30',
                    'care_hours' => '70%',
                    'transformations' => '+72%'
                ],
                'specialized_text' => 'Balón Gástrico',
                'care_stat_text' => 'De pérdida de peso en 12 a 18 meses',
                'central_stat_text' => 'minutos Tiempo promedio del procedimiento',
                'central_description' => 'Una solución no quirúrgica y temporal para iniciar la pérdida de peso. Menos invasivo, más accesible, el impulso seguro hacia una nueva forma de vivir.',
                'results_stat_text' => 'De remisión en los casos de diabetes tipo 2',
                'bottom_card' => [
                    'title' => 'Bypass Gástrico',
                    'description' => 'Reduce el tamaño del estómago y modifica el tránsito intestinal para limitar la ingesta y absorción de calorías.',
                    'claim' => 'Técnica clásica, potente y respaldada por décadas de eficacia',
                    'benefits' => [
                        'Pérdida de peso sostenida a largo plazo',
                        'Mejora diabetes tipo 2 y presión arterial',
                        'Reduce riesgo cardiovascular significativamente'
                    ]
                ]
            ]
        ],
        'procedures_list' => [
            [
                'category' => 'Facial',
                'procedures' => ['Rinoplastia', 'Lifting Facial', 'Blefaroplastia', 'Otoplastia']
            ],
            [
                'category' => 'Corporal',
                'procedures' => ['Liposucción', 'Abdominoplastia', 'Lifting de Brazos', 'Contorno Corporal']
            ],
            [
                'category' => 'Senos',
                'procedures' => ['Aumento Mamario', 'Reducción Mamaria', 'Lifting de Senos', 'Reconstrucción']
            ],
            [
                'category' => 'Especializadas',
                'procedures' => ['Trasplante Capilar', 'Cirugía Bariátrica', 'Ginecomastia', 'Tratamientos Fertilidad']
            ]
        ],
        'contact_form' => [
            'title' => '¿Listo para tu transformación?',
            'subtitle' => 'Agenda tu consulta virtual gratuita',
            'description' => 'Nuestros especialistas te guiarán en cada paso de tu proceso.',
            'form' => [
                'name' => 'Nombre completo',
                'email' => 'Correo electrónico',
                'phone' => 'Teléfono',
                'procedure' => 'Procedimiento de interés',
                'message' => 'Cuéntanos tus expectativas',
                'submit' => 'Agendar Consulta Gratuita'
            ]
        ],
        'treatment_cards' => [
            'title' => 'Nuestros Tratamientos',
            'subtitle' => 'Descubre cada procedimiento en detalle con imágenes y información completa',
            'categories' => [
                'facial' => [
                    'title' => 'Procedimientos Faciales',
                    'subtitle' => 'Armonía facial perfecta',
                    'description' => 'Técnicas avanzadas para realzar tu belleza natural manteniendo la armonía de tus rasgos únicos.',
                    'procedures' => ['Rinoplastia', 'Lifting Facial', 'Blefaroplastia', 'Otoplastia']
                ],
                'corporal' => [
                    'title' => 'Procedimientos Corporales',
                    'subtitle' => 'Contorno corporal definido',
                    'description' => 'Esculpe tu silueta con tecnología de vanguardia y técnicas mínimamente invasivas.',
                    'procedures' => ['Liposucción', 'Abdominoplastia', 'Brazilian Butt Lift', 'Contorno Corporal']
                ],
                'mamario' => [
                    'title' => 'Cirugías Mamarias',
                    'subtitle' => 'Volumen y forma natural',
                    'description' => 'Realza tu feminidad con procedimientos seguros que respetan tu anatomía natural.',
                    'procedures' => ['Aumento Mamario', 'Reducción Mamaria', 'Mastopexia', 'Reconstrucción']
                ],
                'capilar' => [
                    'title' => 'Procedimientos Capilares',
                    'subtitle' => 'Recupera tu cabello natural',
                    'description' => 'Soluciones avanzadas para restaurar la densidad y confianza desde la raíz.',
                    'procedures' => ['Trasplante Capilar FUE', 'Trasplante de Barba', 'Trasplante de Cejas', 'Diseño de Línea Frontal']
                ]
            ]
        ]
    ],
    'en' => [
        'nav' => [
            'about' => 'About Us',
            'services' => 'Services', 
            'procedures' => 'Procedures'
        ],
        'hero' => [
            'title' => 'Our Procedures',
            'subtitle' => 'Your transformation deserves much more than results. At Kasaami, we unite medical excellence with unique experiences that renew body and soul in the heart of the Andes.'
        ],
        'intro' => [
            'title' => 'Your health deserves more than just results',
            'description' => 'At Kasaami, we understand that medical procedures are much more than techniques: they are moments of care, trust and transformation. That\'s why we make your experience easy, agile and memorable, accompanying you with warmth every step of the way.'
        ],
        'procedures_unified' => [
            [
                'id' => 'faciales',
                'name' => 'Facial Procedures',
                'mainTitle' => 'Facial Procedures that Harmonize, Rejuvenate and Boost your Confidence',
                'description' => 'Cutting-edge techniques to harmonize your face while maintaining your natural essence.',
                'duration' => '1-2 hours',
                'recovery' => '5-7 days',
                'icon' => 'face',
                'color_theme' => 'purple',
                'gradient' => 'from-purple-100 to-violet-200',
                'accent_color' => 'text-kasaami-violet',
                'images' => [
                    'main' => 'assets/tarjetas/marcascirujia.png',
                    'care' => 'assets/tarjetas/facial1.png',
                    'results' => 'assets/tarjetas/facial2.png'
                ],
                'stats' => [
                    'satisfaction' => '90%',
                    'care_hours' => '94%',
                    'transformations' => '+114K'
                ],
                'specialized_text' => 'Facial Lift (Rhytidectomy)',
                'care_stat_text' => 'Patients report feeling more confident about themselves',
                'central_stat_text' => 'Patients combine lifting with neck',
                'central_description' => 'Natural effect with advanced technique, without tight appearance. Regain firmness, redefine your features, rejuvenate up to 10 years.',
                'results_stat_text' => 'People per month rejuvenate their look with blepharoplasty',
                'bottom_card' => [
                    'title' => 'Blepharoplasty',
                    'description' => 'Eyelid surgery that rejuvenates your look without changing your expression.',
                    'claim' => 'A youthful and rested look',
                    'benefits' => [
                        'Corrects bags, droopy eyelids and excess skin',
                        'Improves facial expression and peripheral vision',
                        'Outpatient procedure with local anesthesia or light sedation',
                        'Imperceptible scars',
                        'Long-lasting effect (5-10 years)',
                        'Ideal from 35-40 years old'
                    ]
                ]
            ],
            [
                'id' => 'corporales',
                'name' => 'Body Procedures',
                'mainTitle' => 'Body Procedures Designed to Transform',
                'description' => 'High-definition body contouring with state-of-the-art technology.',
                'duration' => '2.5-4 hours',
                'recovery' => '2-3 weeks',
                'icon' => 'body',
                'color_theme' => 'purple',
                'gradient' => 'from-violet-100 to-purple-200',
                'accent_color' => 'text-kasaami-violet',
                'images' => [
                    'main' => 'assets/tarjetas/corporal1.webp',
                    'care' => 'assets/tarjetas/corporal2.jpg',
                    'results' => 'assets/tarjetas/corporal3.avif'
                ],
                'stats' => [
                    'satisfaction' => '2 - 4',
                    'care_hours' => '+22K',
                    'transformations' => '97%'
                ],
                'specialized_text' => 'Brazilian Butt Lift (BBL)',
                'care_stat_text' => 'People per month opt for liposuction in more than one body area',
                'central_stat_text' => 'Hours Average procedure duration',
                'central_description' => 'Enhance your silhouette without implants, with fat transfer technique. Natural curves with your own fat.',
                'results_stat_text' => 'Satisfaction in post-partum or post-bariatric women',
                'bottom_card' => [
                    'title' => 'Abdominoplasty ("Tummy Tuck")',
                    'description' => 'Surgery to remove excess abdominal skin and fat, and strengthen abdominal muscles.',
                    'claim' => 'Your flat, firm abdomen without excess skin',
                    'benefits' => [
                        'Eliminates sagging skin and abdominal stretch marks',
                        'Strengthens separated abdominal muscles',
                        'Improves body contour post-pregnancy',
                        'Long-lasting results with healthy lifestyle'
                    ]
                ]
            ],
            [
                'id' => 'mamarias',
                'name' => 'Breast Surgery',
                'mainTitle' => 'Breast Surgery Designed to Balance, Beautify and Enhance your Silhouette',
                'description' => 'Breast augmentation, reduction and lifting with natural and safe results.',
                'duration' => '2-4 hours',
                'recovery' => '1-4 weeks',
                'icon' => 'breast',
                'color_theme' => 'purple',
                'gradient' => 'from-purple-200 to-indigo-300',
                'accent_color' => 'text-kasaami-violet',
                'images' => [
                    'main' => 'assets/tarjetas/MAMARIAS1.webp',
                    'care' => 'assets/tarjetas/MAMARIAS2.jpg',
                    'results' => 'assets/tarjetas/MAMARIAS3.webp'
                ],
                'stats' => [
                    'satisfaction' => '9/10',
                    'care_hours' => 'Top 1',
                    'transformations' => '91%'
                ],
                'specialized_text' => 'Breast Reduction',
                'care_stat_text' => 'Most performed aesthetic procedure in the world',
                'central_stat_text' => 'Women improve back, neck and posture pain',
                'central_description' => 'Less weight, more freedom and well-being. Physical and emotional relief that changes your daily life and self-esteem.',
                'results_stat_text' => 'Long-term satisfaction according to clinical studies',
                'bottom_card' => [
                    'title' => 'Mastopexy (Breast Lift)',
                    'description' => 'Lifts and firms breasts by removing excess skin and repositioning tissue.',
                    'claim' => 'Regain firmness and shape of your bust',
                    'benefits' => [
                        'Lifts and firms sagging breasts',
                        'Repositions areola and nipple naturally',
                        'Can be combined with augmentation if more volume is desired',
                        'Restores confidence and femininity'
                    ]
                ]
            ],
            [
                'id' => 'capilares',
                'name' => 'Hair Procedures',
                'mainTitle' => 'Solutions to Recover Volume, Density and Confidence from the Root',
                'description' => 'Natural facial rejuvenation that preserves your unique expression.',
                'duration' => '4-6 hours',
                'recovery' => '3-7 days',
                'icon' => 'hair',
                'color_theme' => 'purple',
                'gradient' => 'from-purple-150 to-violet-250',
                'accent_color' => 'text-kasaami-violet',
                'images' => [
                    'main' => 'assets/tarjetas/capilar2.png',
                    'care' => 'assets/tarjetas/capilar1.png',
                    'results' => 'assets/tarjetas/capilar3.png'
                ],
                'stats' => [
                    'satisfaction' => '7/10',
                    'care_hours' => '6 - 12',
                    'transformations' => '+95%'
                ],
                'specialized_text' => 'Frontal Hairline Design',
                'care_stat_text' => 'months Progressive results from the third month, visible at 6-12 months',
                'central_stat_text' => 'Men undergo hair transplant to redesign frontal line',
                'central_description' => 'Rejuvenate your expression with naturalness and precision. A well-designed frontal line transforms your facial frame and gives you back confidence.',
                'results_stat_text' => 'Success rate in follicle integration',
                'bottom_card' => [
                    'title' => 'Beard and Eyebrow Hair Transplant (FUE)',
                    'description' => 'Follicular implant from donor area to define, populate or reconstruct beard and eyebrows with natural result.',
                    'claim' => 'Facial reconstruction with aesthetic and emotional impact',
                    'benefits' => [
                        'Corrects bags, droopy eyelids and excess skin',
                        'Improves facial expression and peripheral vision',
                        'Outpatient procedure with local anesthesia',
                        'Imperceptible and natural scars',
                        'Permanent and natural results',
                        'Minimally invasive FUE technique'
                    ]
                ]
            ],
            [
                'id' => 'bariatricas',
                'name' => 'Bariatric Interventions',
                'mainTitle' => 'Safe, Effective Medical Interventions Accompanied by Experts',
                'description' => 'Non-surgical weight loss and safe medical accompaniment.',
                'duration' => '3-4 hours',
                'recovery' => '3-14 days',
                'icon' => 'weight',
                'color_theme' => 'purple',
                'gradient' => 'from-violet-200 to-purple-300',
                'accent_color' => 'text-kasaami-violet',
                'images' => [
                    'main' => 'assets/tarjetas/bariatrico2.jpg',
                    'care' => 'assets/tarjetas/bariatricas1.png',
                    'results' => 'assets/tarjetas/bariatrico3.jpg'
                ],
                'stats' => [
                    'satisfaction' => '30',
                    'care_hours' => '70%',
                    'transformations' => '+72%'
                ],
                'specialized_text' => 'Gastric Balloon',
                'care_stat_text' => 'Weight loss in 12 to 18 months',
                'central_stat_text' => 'minutes Average procedure time',
                'central_description' => 'A non-surgical and temporary solution to start weight loss. Less invasive, more accessible, the safe boost towards a new way of living.',
                'results_stat_text' => 'Remission in type 2 diabetes cases',
                'bottom_card' => [
                    'title' => 'Gastric Bypass',
                    'description' => 'Reduces stomach size and modifies intestinal transit to limit calorie intake and absorption.',
                    'claim' => 'Classic, powerful technique backed by decades of efficacy',
                    'benefits' => [
                        'Sustained long-term weight loss',
                        'Improves type 2 diabetes and blood pressure',
                        'Significantly reduces cardiovascular risk'
                    ]
                ]
            ]
        ],
        'procedures_list' => [
            [
                'category' => 'Facial',
                'procedures' => ['Rhinoplasty', 'Facelift', 'Blepharoplasty', 'Otoplasty']
            ],
            [
                'category' => 'Body',
                'procedures' => ['Liposuction', 'Abdominoplasty', 'Arm Lift', 'Body Contouring']
            ],
            [
                'category' => 'Breast',
                'procedures' => ['Breast Augmentation', 'Breast Reduction', 'Breast Lift', 'Reconstruction']
            ],
            [
                'category' => 'Specialized',
                'procedures' => ['Hair Transplant', 'Bariatric Surgery', 'Gynecomastia', 'Fertility Treatments']
            ]
        ],
        'contact_form' => [
            'title' => 'Ready for your transformation?',
            'subtitle' => 'Schedule your free virtual consultation',
            'description' => 'Our specialists will guide you through every step of your process.',
            'form' => [
                'name' => 'Full name',
                'email' => 'Email address',
                'phone' => 'Phone',
                'procedure' => 'Procedure of interest',
                'message' => 'Tell us your expectations',
                'submit' => 'Schedule Free Consultation'
            ]
        ],
        'treatment_cards' => [
            'title' => 'Our Treatments',
            'subtitle' => 'Discover each procedure in detail with images and complete information',
            'categories' => [
                'facial' => [
                    'title' => 'Facial Procedures',
                    'subtitle' => 'Perfect facial harmony',
                    'description' => 'Advanced techniques to enhance your natural beauty while maintaining the harmony of your unique features.',
                    'procedures' => ['Rhinoplasty', 'Facelift', 'Blepharoplasty', 'Otoplasty']
                ],
                'corporal' => [
                    'title' => 'Body Procedures',
                    'subtitle' => 'Defined body contour',
                    'description' => 'Sculpt your silhouette with cutting-edge technology and minimally invasive techniques.',
                    'procedures' => ['Liposuction', 'Abdominoplasty', 'Brazilian Butt Lift', 'Body Contouring']
                ],
                'mamario' => [
                    'title' => 'Breast Surgery',
                    'subtitle' => 'Natural volume and shape',
                    'description' => 'Enhance your femininity with safe procedures that respect your natural anatomy.',
                    'procedures' => ['Breast Augmentation', 'Breast Reduction', 'Mastopexy', 'Reconstruction']
                ],
                'capilar' => [
                    'title' => 'Hair Procedures',
                    'subtitle' => 'Recover your natural hair',
                    'description' => 'Advanced solutions to restore density and confidence from the root.',
                    'procedures' => ['FUE Hair Transplant', 'Beard Transplant', 'Eyebrow Transplant', 'Frontal Line Design']
                ]
            ]
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
    <meta name="keywords" content="procedimientos, cirugía estética, turismo médico, Ecuador, transformación">
    <meta name="author" content="Kasaami Care & Beauty">
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="../public/favicon.png">
    <link rel="shortcut icon" href="../public/favicon.png">
    <link rel="apple-touch-icon" href="../public/favicon.png">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Filson Pro Fonts -->
    <style>
        @font-face {
            font-family: 'Filson Pro';
            src: url('../assets/fuentes/FilsonProRegular.otf') format('opentype');
            font-weight: 400;
            font-style: normal;
        }
        
        @font-face {
            font-family: 'Filson Pro';
            src: url('../assets/fuentes/FilsonProRegularItalic.otf') format('opentype');
            font-weight: 400;
            font-style: italic;
        }
        
        @font-face {
            font-family: 'Filson Pro';
            src: url('../assets/fuentes/FilsonProThin.otf') format('opentype');
            font-weight: 100;
            font-style: normal;
        }
        
        @font-face {
            font-family: 'Filson Pro';
            src: url('../assets/fuentes/FilsonProThinItalic.otf') format('opentype');
            font-weight: 100;
            font-style: italic;
        }
        
        @font-face {
            font-family: 'Filson Pro';
            src: url('../assets/fuentes/FilsonProLight.otf') format('opentype');
            font-weight: 300;
            font-style: normal;
        }
        
        @font-face {
            font-family: 'Filson Pro';
            src: url('../assets/fuentes/FilsonProLightItalic.otf') format('opentype');
            font-weight: 300;
            font-style: italic;
        }
        
        @font-face {
            font-family: 'Filson Pro';
            src: url('../assets/fuentes/FilsonProBook.otf') format('opentype');
            font-weight: 350;
            font-style: normal;
        }
        
        @font-face {
            font-family: 'Filson Pro';
            src: url('../assets/fuentes/FilsonProBookItalic.otf') format('opentype');
            font-weight: 350;
            font-style: italic;
        }
        
        @font-face {
            font-family: 'Filson Pro';
            src: url('../assets/fuentes/FilsonProMedium.otf') format('opentype');
            font-weight: 500;
            font-style: normal;
        }
        
        @font-face {
            font-family: 'Filson Pro';
            src: url('../assets/fuentes/FilsonProMediumItalic.otf') format('opentype');
            font-weight: 500;
            font-style: italic;
        }
        
        @font-face {
            font-family: 'Filson Pro';
            src: url('../assets/fuentes/FilsonProBold.otf') format('opentype');
            font-weight: 700;
            font-style: normal;
        }
        
        @font-face {
            font-family: 'Filson Pro';
            src: url('../assets/fuentes/FilsonProBoldItalic.otf') format('opentype');
            font-weight: 700;
            font-style: italic;
        }
        
        @font-face {
            font-family: 'Filson Pro';
            src: url('../assets/fuentes/FilsonProHeavy.otf') format('opentype');
            font-weight: 800;
            font-style: normal;
        }
        
        @font-face {
            font-family: 'Filson Pro';
            src: url('../assets/fuentes/FilsonProHeavyItalic.otf') format('opentype');
            font-weight: 800;
            font-style: italic;
        }
        
        @font-face {
            font-family: 'Filson Pro';
            src: url('../assets/fuentes/FilsonProBlack.otf') format('opentype');
            font-weight: 900;
            font-style: normal;
        }
        
        @font-face {
            font-family: 'Filson Pro';
            src: url('../assets/fuentes/FilsonProBlackItalic.otf') format('opentype');
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
                        'scale-in': 'scaleIn 0.5s ease-out',
                        'progress-fill': 'progressFill 8s linear infinite',
                        'card-transform': 'cardTransform 0.6s ease-in-out',
                        'pulse-slow': 'pulse 2s ease-in-out infinite'
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
                        scaleIn: {
                            '0%': { transform: 'scale(0.9)', opacity: '0' },
                            '100%': { transform: 'scale(1)', opacity: '1' }
                        },
                        progressFill: {
                            '0%': { width: '0%' },
                            '100%': { width: '100%' }
                        },
                        cardTransform: {
                            '0%': { transform: 'scale(1)', opacity: '1' },
                            '50%': { transform: 'scale(0.95)', opacity: '0.7' },
                            '100%': { transform: 'scale(1)', opacity: '1' }
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

        /* Unified Cards Animation */
        .unified-card {
            transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .unified-card.changing {
            animation: cardTransform 0.6s ease-in-out;
        }

        /* Global Progress Bar */
        .global-progress {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: rgba(139, 92, 246, 0.1);
            z-index: 50;
        }

        .global-progress-bar {
            height: 100%;
            background: linear-gradient(90deg, #8B5CF6, #C4B5FD, #8B5CF6);
            width: 0%;
            animation: progressFill 10s linear infinite;
        }

        /* Procedure Icons */
        .procedure-icon {
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Improved card overlays with subtle blur transition */
        .card-overlay-top {
            background: linear-gradient(180deg, 
                rgba(109, 40, 217, 0.9) 0%, 
                rgba(109, 40, 217, 0.7) 30%, 
                rgba(109, 40, 217, 0.5) 50%, 
                rgba(109, 40, 217, 0.3) 70%, 
                rgba(109, 40, 217, 0.1) 85%, 
                transparent 100%);
        }

        .card-overlay-bottom {
            background: linear-gradient(0deg, 
                rgba(139, 92, 246, 0.95) 0%, 
                rgba(139, 92, 246, 0.85) 20%, 
                rgba(139, 92, 246, 0.7) 40%, 
                rgba(139, 92, 246, 0.5) 60%, 
                rgba(139, 92, 246, 0.3) 75%, 
                rgba(139, 92, 246, 0.1) 90%, 
                transparent 100%);
        }

        /* Subtle blur effect with opacity transition */
        .card-overlay-top::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            backdrop-filter: blur(0px);
            background: linear-gradient(180deg, 
                rgba(109, 40, 217, 0.1) 0%, 
                rgba(109, 40, 217, 0.05) 50%, 
                transparent 100%);
            animation: subtle-blur 0.3s ease-in-out;
        }

        .card-overlay-bottom::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            backdrop-filter: blur(1px);
            background: linear-gradient(0deg, 
                rgba(139, 92, 246, 0.1) 0%, 
                rgba(139, 92, 246, 0.05) 50%, 
                transparent 100%);
        }

        @keyframes subtle-blur {
            0% { backdrop-filter: blur(0px); opacity: 0; }
            100% { backdrop-filter: blur(1px); opacity: 1; }
        }

        /* Bottom card text adjustments for better fitting */
        .bottom-card-text-sm {
            font-size: 0.75rem;
            line-height: 1rem;
        }

        .bottom-card-text-xs {
            font-size: 0.7rem;
            line-height: 0.9rem;
        }

        .bottom-card-benefits {
            max-height: 110px;
            overflow: hidden;
        }

        .benefit-item {
            display: flex;
            align-items: flex-start;
            gap: 0.25rem;
            margin-bottom: 0.2rem;
        }

        .benefit-text {
            font-size: 0.7rem;
            line-height: 0.9rem;
            flex: 1;
        }

        .benefit-icon {
            font-size: 0.6rem;
            margin-top: 0.1rem;
            flex-shrink: 0;
        }
    </style>
</head>

<body class="font-filson bg-white overflow-x-hidden">
    
    <!-- Global Progress Bar -->
    <div class="global-progress">
        <div id="global-progress-bar" class="global-progress-bar"></div>
    </div>

    <!-- Navigation -->
    <?php include 'includes/Navbar.php'; ?>

    <!-- Hero Section -->
    <section class="relative min-h-screen flex items-center justify-center parallax" style="background-image: linear-gradient(rgba(139, 92, 246, 0.7), rgba(109, 40, 217, 0.5)), url('../assets/tarjetas/reunionvirtua.png');">
        <div class="relative z-10 text-center text-white px-4 sm:px-6 lg:px-8 max-w-4xl mx-auto">
            <h1 class="text-5xl md:text-7xl font-bold mb-6 animate-slide-up">
                <?php echo $t['hero']['title']; ?>
            </h1>
            <p class="text-xl md:text-2xl opacity-90 animate-slide-up max-w-3xl mx-auto leading-relaxed" style="animation-delay: 0.2s;">
                <?php echo $t['hero']['subtitle']; ?>
            </p>
        </div>
    </section>

    <!-- Unified Dynamic Cards Grid Section -->
    <section class="relative w-full bg-gradient-to-b from-kasaami-pearl to-white py-20">
        <!-- Main heading -->
        <div class="flex flex-col items-center px-4 mb-16 max-w-7xl mx-auto">
            <h1 class="max-w-4xl font-bold text-4xl md:text-6xl leading-tight text-gray-800 text-center">
                <?php echo $t['intro']['title']; ?>
            </h1>
            <p class="max-w-3xl mt-6 text-lg md:text-xl leading-relaxed text-gray-500 text-center">
                <?php echo $t['intro']['description']; ?>
            </p>
        </div>

        <!-- Current Procedure Indicator -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center gap-2 bg-white rounded-full px-4 py-2.5 shadow-lg">
                <div id="current-procedure-icon" class="w-5 h-5 text-kasaami-violet flex-shrink-0">
                    <!-- Icon will be dynamically updated -->
                </div>
                <span id="current-procedure-name" class="font-semibold text-gray-800 text-sm">
                    <?php echo $t['procedures_unified'][0]['name']; ?>
                </span>
            </div>
        </div>

        <!-- Unified Cards Grid -->
        <div class="grid grid-cols-3 gap-6 max-w-6xl mx-auto px-4">
            
            <!-- Main Feature Card (Top Left) -->
            <div id="main-feature-card" class="col-start-1 row-start-1 bg-gradient-to-br <?php echo $t['procedures_unified'][0]['gradient']; ?> border-none rounded-3xl h-[263px] relative overflow-hidden group hover:scale-105 transition-all duration-300 cursor-pointer unified-card" onclick="openContactForm()">
                <div class="procedure-icon absolute top-8 left-8">
                    <svg id="main-procedure-icon" class="h-7 w-7 <?php echo $t['procedures_unified'][0]['accent_color']; ?>" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <!-- Icon will be dynamically updated -->
                    </svg>
                </div>
                <div class="flex flex-col w-[244px] gap-2 absolute top-[75px] left-8">
                    <h3 id="main-procedure-title" class="font-semibold text-xl leading-7">
                        <?php echo $t['procedures_unified'][0]['mainTitle']; ?>
                    </h3>
                </div>
            </div>

            <!-- Care Card (Left Middle-Bottom) -->
            <div id="care-card" class="col-start-1 row-start-2 row-span-2 bg-gray-200 overflow-hidden border-none rounded-3xl h-[445px] relative group hover:scale-105 transition-all duration-300 unified-card">
                <img id="care-image" class="absolute w-full h-full object-cover transition-all duration-600" alt="Cuidado Especializado" src="<?php echo $t['procedures_unified'][0]['images']['care']; ?>" />
                <div class="absolute bottom-0 w-full h-[240px] card-overlay-bottom"></div>
                <div class="absolute bottom-8 left-8 right-8">
                    <div id="care-stat-value" class="font-bold text-white text-[42px] leading-[48px] drop-shadow-lg mb-2">
                        <?php echo $t['procedures_unified'][0]['stats']['care_hours']; ?>
                    </div>
                    <div id="care-stat-text" class="text-white text-sm leading-[20px] drop-shadow-md">
                        <?php echo $t['procedures_unified'][0]['care_stat_text']; ?>
                    </div>
                </div>
            </div>

            <!-- Main Central Card (Center All) -->
            <div id="central-card" class="col-start-2 row-start-1 row-span-3 bg-gray-200 overflow-hidden border-none rounded-3xl h-[732px] relative group hover:scale-105 transition-all duration-300 unified-card">
                <img id="central-image" class="absolute w-full h-full object-cover transition-all duration-600" alt="Experiencia Integral" src="<?php echo $t['procedures_unified'][0]['images']['main']; ?>" />
                <div class="absolute top-0 w-full h-[220px] card-overlay-top"></div>
                <div class="absolute top-8 left-8 right-8">
                    <div id="central-stat-value" class="font-bold text-white text-[42px] leading-[48px] drop-shadow-lg mb-2">
                        <?php echo $t['procedures_unified'][0]['stats']['satisfaction']; ?>
                    </div>
                    <div id="central-stat-text" class="text-white text-sm leading-[22px] drop-shadow-md">
                        <?php echo $t['procedures_unified'][0]['central_stat_text']; ?>
                    </div>
                </div>
                <div class="absolute bottom-0 w-full h-[300px] card-overlay-bottom"></div>
                <div class="absolute bottom-8 left-8 right-8">
                    <h3 id="central-specialized-text" class="font-semibold text-white text-xl leading-7 drop-shadow-md mb-3">
                        <?php echo $t['procedures_unified'][0]['specialized_text']; ?>
                    </h3>
                    <p id="central-procedure-description" class="text-sm text-white/95 leading-[20px] drop-shadow-sm">
                        <?php echo $t['procedures_unified'][0]['central_description']; ?>
                    </p>
                </div>
            </div>

            <!-- Results Card (Right Top-Middle) -->
            <div id="results-card" class="col-start-3 row-start-1 row-span-2 bg-gray-200 overflow-hidden border-none rounded-3xl h-[445px] relative group hover:scale-105 transition-all duration-300 unified-card">
                <img id="results-image" class="absolute w-full h-full object-cover transition-all duration-600" alt="Transformaciones Exitosas" src="<?php echo $t['procedures_unified'][0]['images']['results']; ?>" />
                <div class="absolute bottom-0 w-full h-[240px] card-overlay-bottom"></div>
                <div class="absolute bottom-8 left-8 right-8">
                    <div id="results-stat-value" class="font-bold text-white text-[42px] leading-[48px] drop-shadow-lg mb-2">
                        <?php echo $t['procedures_unified'][0]['stats']['transformations']; ?>
                    </div>
                    <div id="results-stat-text" class="text-white text-sm leading-[20px] drop-shadow-md">
                        <?php echo $t['procedures_unified'][0]['results_stat_text']; ?>
                    </div>
                </div>
            </div>

            <!-- Bottom Right Feature Card - OPTIMIZADO: Texto más compacto -->
            <div id="bottom-feature-card" class="col-start-3 row-start-3 bg-gradient-to-br <?php echo $t['procedures_unified'][0]['gradient']; ?> border-none rounded-3xl h-[263px] relative overflow-hidden group hover:scale-105 transition-all duration-300 cursor-pointer unified-card" onclick="openContactForm()">
                <div class="flex flex-col gap-1.5 absolute top-5 left-5 right-5 bottom-5 overflow-hidden">
                    <h3 id="bottom-procedure-title" class="font-semibold text-lg leading-6 text-gray-800">
                        <?php echo $t['procedures_unified'][0]['bottom_card']['title']; ?>
                    </h3>
                    <p id="bottom-procedure-description" class="bottom-card-text-sm text-neutral-600 leading-4 mb-1">
                        <?php echo $t['procedures_unified'][0]['bottom_card']['description']; ?>
                    </p>
                    <div class="text-sm text-kasaami-violet font-medium mb-1.5">
                        <span id="bottom-procedure-claim"><?php echo $t['procedures_unified'][0]['bottom_card']['claim']; ?></span>
                    </div>
                    
                    <!-- Benefits list - Simplificado para bypass gástrico -->
                    <div id="bottom-procedure-benefits" class="bottom-card-benefits flex-1">
                        <?php if (isset($t['procedures_unified'][0]['bottom_card']['benefits'])): ?>
                        <div class="space-y-0.5">
                            <?php foreach (array_slice($t['procedures_unified'][0]['bottom_card']['benefits'], 0, 3) as $benefit): ?>
                            <div class="benefit-item">
                                <span class="benefit-icon text-kasaami-violet">🔹</span>
                                <span class="benefit-text text-gray-600"><?php echo $benefit; ?></span>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                    
                    <div class="mt-auto">
                        <div id="bottom-procedure-times" class="flex gap-3 text-xs text-gray-500">
                            <span>⏱️ <?php echo $t['procedures_unified'][0]['duration']; ?></span>
                            <span>🏥 <?php echo $t['procedures_unified'][0]['recovery']; ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Procedure Navigation Dots -->
        <div class="flex justify-center mt-12 gap-3">
            <?php foreach ($t['procedures_unified'] as $index => $procedure): ?>
            <button onclick="selectProcedure(<?php echo $index; ?>)" 
                    class="procedure-dot w-3 h-3 rounded-full transition-all duration-300 <?php echo $index === 0 ? 'bg-kasaami-violet scale-125' : 'bg-gray-300 hover:bg-kasaami-light-violet'; ?>" 
                    data-index="<?php echo $index; ?>"
                    title="<?php echo $procedure['name']; ?>">
            </button>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- Procedures Cards Section -->
    <section class="py-20 bg-gradient-to-b from-white to-kasaami-pearl">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6"><?php echo $t['treatment_cards']['title']; ?></h2>
                <p class="text-lg text-gray-600 max-w-3xl mx-auto"><?php echo $t['treatment_cards']['subtitle']; ?></p>
            </div>
            
            <!-- Treatment Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-16">
                
                <!-- Facial Procedures Card -->
                <div class="group bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 cursor-pointer" onclick="openTreatmentModal('facial')">
                    <div class="relative h-64 overflow-hidden">
                        <img src="assets/tarjetas/facial1.png" alt="Procedimientos Faciales" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-kasaami-violet/60 to-transparent opacity-80"></div>
                        <div class="absolute bottom-4 left-4 text-white">
                            <h3 class="text-xl font-bold mb-1"><?php echo $t['treatment_cards']['categories']['facial']['title']; ?></h3>
                            <p class="text-sm opacity-90"><?php echo $t['treatment_cards']['categories']['facial']['subtitle']; ?></p>
                        </div>
                        <div class="absolute top-4 right-4 bg-white/20 backdrop-blur-sm rounded-full p-2">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <circle cx="12" cy="12" r="10"/>
                                <path d="m9 9 1.5 1.5L12 9l1.5 1.5L15 9"/>
                                <path d="M9 16s1-2 3-2 3 2 3 2"/>
                            </svg>
                        </div>
                    </div>
                    <div class="p-6">
                        <p class="text-gray-600 text-sm leading-relaxed"><?php echo $t['treatment_cards']['categories']['facial']['description']; ?></p>
                    </div>
                </div>

                <!-- Body Procedures Card -->
                <div class="group bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 cursor-pointer" onclick="openTreatmentModal('corporal')">
                    <div class="relative h-64 overflow-hidden">
                        <img src="assets/tarjetas/corporal1.webp" alt="Procedimientos Corporales" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-kasaami-violet/60 to-transparent opacity-80"></div>
                        <div class="absolute bottom-4 left-4 text-white">
                            <h3 class="text-xl font-bold mb-1"><?php echo $t['treatment_cards']['categories']['corporal']['title']; ?></h3>
                            <p class="text-sm opacity-90"><?php echo $t['treatment_cards']['categories']['corporal']['subtitle']; ?></p>
                        </div>
                        <div class="absolute top-4 right-4 bg-white/20 backdrop-blur-sm rounded-full p-2">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2z"/>
                                <ellipse cx="12" cy="8" rx="3" ry="4"/>
                                <ellipse cx="12" cy="16" rx="4" ry="3"/>
                            </svg>
                        </div>
                    </div>
                    <div class="p-6">
                        <p class="text-gray-600 text-sm leading-relaxed"><?php echo $t['treatment_cards']['categories']['corporal']['description']; ?></p>
                    </div>
                </div>

                <!-- Breast Surgery Card -->
                <div class="group bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 cursor-pointer" onclick="openTreatmentModal('mamario')">
                    <div class="relative h-64 overflow-hidden">
                        <img src="assets/tarjetas/MAMARIAS1.webp" alt="Cirugías Mamarias" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-kasaami-violet/60 to-transparent opacity-80"></div>
                        <div class="absolute bottom-4 left-4 text-white">
                            <h3 class="text-xl font-bold mb-1"><?php echo $t['treatment_cards']['categories']['mamario']['title']; ?></h3>
                            <p class="text-sm opacity-90"><?php echo $t['treatment_cards']['categories']['mamario']['subtitle']; ?></p>
                        </div>
                        <div class="absolute top-4 right-4 bg-white/20 backdrop-blur-sm rounded-full p-2">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <circle cx="9" cy="12" r="4"/>
                                <circle cx="15" cy="12" r="4"/>
                            </svg>
                        </div>
                    </div>
                    <div class="p-6">
                        <p class="text-gray-600 text-sm leading-relaxed"><?php echo $t['treatment_cards']['categories']['mamario']['description']; ?></p>
                    </div>
                </div>

                <!-- Hair Procedures Card -->
                <div class="group bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 cursor-pointer" onclick="openTreatmentModal('capilar')">
                    <div class="relative h-64 overflow-hidden">
                        <img src="assets/tarjetas/capilar2.png" alt="Procedimientos Capilares" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-kasaami-violet/60 to-transparent opacity-80"></div>
                        <div class="absolute bottom-4 left-4 text-white">
                            <h3 class="text-xl font-bold mb-1"><?php echo $t['treatment_cards']['categories']['capilar']['title']; ?></h3>
                            <p class="text-sm opacity-90"><?php echo $t['treatment_cards']['categories']['capilar']['subtitle']; ?></p>
                        </div>
                        <div class="absolute top-4 right-4 bg-white/20 backdrop-blur-sm rounded-full p-2">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M12 2c-4 0-8 2-8 6v2c0 4 4 6 8 6s8-2 8-6V8c0-4-4-6-8-6z"/>
                                <path d="M8 8c0-2 2-4 4-4s4 2 4 4"/>
                            </svg>
                        </div>
                    </div>
                    <div class="p-6">
                        <p class="text-gray-600 text-sm leading-relaxed"><?php echo $t['treatment_cards']['categories']['capilar']['description']; ?></p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Treatment Modal -->
    <div id="treatment-modal" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 hidden opacity-0 transition-all duration-300">
        <div class="flex items-center justify-center min-h-screen p-4" onclick="closeTreatmentModal()">
            <div id="modal-content" class="bg-white rounded-3xl max-w-4xl w-full max-h-[90vh] overflow-hidden transform scale-95 transition-all duration-300" onclick="event.stopPropagation()">
                <!-- Modal content will be populated dynamically -->
            </div>
        </div>
    </div>

    <!-- Contact CTA Section -->
    <section class="py-20 bg-gradient-to-r from-kasaami-violet to-kasaami-dark-violet text-white relative overflow-hidden">
        <div class="absolute inset-0 bg-black opacity-10"></div>
        <div class="relative z-10 max-w-4xl mx-auto text-center px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl md:text-5xl font-bold mb-6">
                <?php echo $currentLang === 'es' ? 'Comienza Tu Transformación Hoy' : 'Start Your Transformation Today'; ?>
            </h2>
            <p class="text-xl mb-8 opacity-90">
                <?php echo $currentLang === 'es' 
                    ? 'Agenda tu consulta virtual gratuita y descubre cómo podemos hacer realidad la mejor versión de ti mismo' 
                    : 'Schedule your free virtual consultation and discover how we can make the best version of yourself a reality'; ?>
            </p>
            
            <button onclick="openWhatsAppConsultation()" class="bg-white text-kasaami-violet px-8 py-4 rounded-full font-semibold text-lg hover:bg-gray-100 transition-all duration-300 transform hover:scale-105 shadow-lg inline-flex items-center gap-3 mb-8">
                <?php echo $currentLang === 'es' ? 'Agendar Asesoría Gratuita' : 'Schedule Free Consultation'; ?>
            </button>
            
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                <div class="flex items-center gap-2 text-white/80">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                    </svg>
                    <span>+593 96 305 2401</span>
                </div>
                <span class="hidden sm:inline text-white/60">•</span>
                <div class="flex items-center gap-2 text-white/80">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    <span>Quito, Ecuador</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include 'includes/Footer.php'; ?>

    <!-- WhatsApp Button -->
    <?php include 'includes/FlotanteWpp.php'; ?>

    <script>
        // ================================================================
        // ⏰ CONFIGURACIÓN DE TIEMPO DEL CARRUSEL - CAMBIAR AQUÍ
        // ================================================================
        // Tiempo de transición entre procedimientos: 10 segundos (10000ms)
        const CAROUSEL_INTERVAL = 10000;
        // ================================================================

        // Procedures data for unified content
        const proceduresData = <?php echo json_encode($t['procedures_unified']); ?>;

        // Current procedure index - NO MORE PAUSE FUNCTIONALITY
        let currentProcedureIndex = 0;
        let procedureInterval;

        // Icon mappings for procedures
        const procedureIcons = {
            'face': '<circle cx="12" cy="12" r="10"/><path d="m9 9 1.5 1.5L12 9l1.5 1.5L15 9"/><path d="M9 16s1-2 3-2 3 2 3 2"/>',
            'body': '<path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2z"/><ellipse cx="12" cy="8" rx="3" ry="4"/><ellipse cx="12" cy="16" rx="4" ry="3"/>',
            'breast': '<circle cx="9" cy="12" r="4"/><circle cx="15" cy="12" r="4"/>',
            'hair': '<path d="M12 2c-4 0-8 2-8 6v2c0 4 4 6 8 6s8-2 8-6V8c0-4-4-6-8-6z"/><path d="M8 8c0-2 2-4 4-4s4 2 4 4"/>',
            'weight': '<path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2z"/><path d="M8 12h8"/><path d="M12 8v8"/>'
        };

        function updateProcedureIcon(iconElement, iconType) {
            const iconPath = procedureIcons[iconType] || procedureIcons['face'];
            iconElement.innerHTML = iconPath;
        }

        function updateAllCards(procedureIndex) {
            const procedure = proceduresData[procedureIndex];
            
            // Add changing animation to all cards
            document.querySelectorAll('.unified-card').forEach(card => {
                card.classList.add('changing');
            });

            setTimeout(() => {
                // Update current procedure indicator
                document.getElementById('current-procedure-name').textContent = procedure.name;
                updateProcedureIcon(document.getElementById('current-procedure-icon'), procedure.icon);

                // Update main feature card (top left)
                const mainCard = document.getElementById('main-feature-card');
                mainCard.className = mainCard.className.replace(/bg-gradient-to-br from-[\w-]+ to-[\w-]+/, `bg-gradient-to-br ${procedure.gradient}`);
                
                updateProcedureIcon(document.getElementById('main-procedure-icon'), procedure.icon);
                document.getElementById('main-procedure-icon').className = `h-7 w-7 ${procedure.accent_color}`;
                document.getElementById('main-procedure-title').textContent = procedure.mainTitle;

                // Update bottom feature card (bottom right)
                const bottomCard = document.getElementById('bottom-feature-card');
                bottomCard.className = bottomCard.className.replace(/bg-gradient-to-br from-[\w-]+ to-[\w-]+/, `bg-gradient-to-br ${procedure.gradient}`);
                
                document.getElementById('bottom-procedure-title').textContent = procedure.bottom_card.title;
                document.getElementById('bottom-procedure-description').textContent = procedure.bottom_card.description;
                document.getElementById('bottom-procedure-times').innerHTML = `<span>⏱️ ${procedure.duration}</span><span>🏥 ${procedure.recovery}</span>`;
                document.getElementById('bottom-procedure-claim').textContent = procedure.bottom_card.claim;

                // Update benefits list for bottom card - SIMPLIFIED
                const benefitsContainer = document.getElementById('bottom-procedure-benefits');
                if (procedure.bottom_card.benefits) {
                    benefitsContainer.innerHTML = `
                        <div class="space-y-0.5">
                            ${procedure.bottom_card.benefits.slice(0, 3).map(benefit => `
                                <div class="benefit-item">
                                    <span class="benefit-icon text-kasaami-violet">🔹</span>
                                    <span class="benefit-text text-gray-600">${benefit}</span>
                                </div>
                            `).join('')}
                        </div>
                    `;
                } else {
                    benefitsContainer.innerHTML = '';
                }

                // Update images
                document.getElementById('care-image').src = procedure.images.care;
                document.getElementById('central-image').src = procedure.images.main;
                document.getElementById('results-image').src = procedure.images.results;

                // Update stats
                document.getElementById('care-stat-value').textContent = procedure.stats.care_hours;
                document.getElementById('care-stat-text').textContent = procedure.care_stat_text;
                document.getElementById('central-stat-value').textContent = procedure.stats.satisfaction;
                document.getElementById('central-stat-text').textContent = procedure.central_stat_text;
                document.getElementById('results-stat-value').textContent = procedure.stats.transformations;
                document.getElementById('results-stat-text').textContent = procedure.results_stat_text;

                // Update specialized text and description
                document.getElementById('central-specialized-text').textContent = procedure.specialized_text;
                document.getElementById('central-procedure-description').textContent = procedure.central_description;

                // Update navigation dots
                document.querySelectorAll('.procedure-dot').forEach((dot, index) => {
                    if (index === procedureIndex) {
                        dot.className = 'procedure-dot w-3 h-3 rounded-full transition-all duration-300 bg-kasaami-violet scale-125';
                    } else {
                        dot.className = 'procedure-dot w-3 h-3 rounded-full transition-all duration-300 bg-gray-300 hover:bg-kasaami-light-violet';
                    }
                });

                // Remove changing animation
                setTimeout(() => {
                    document.querySelectorAll('.unified-card').forEach(card => {
                        card.classList.remove('changing');
                    });
                }, 100);

            }, 300);
        }

        function selectProcedure(index) {
            currentProcedureIndex = index;
            updateAllCards(index);
            // Reset auto-rotation
            clearInterval(procedureInterval);
            setTimeout(startAutoRotation, 2000);
        }

        function nextProcedure() {
            currentProcedureIndex = (currentProcedureIndex + 1) % proceduresData.length;
            updateAllCards(currentProcedureIndex);
            
            // Reset progress bar
            const progressBar = document.getElementById('global-progress-bar');
            if (progressBar) {
                progressBar.style.animation = 'none';
                progressBar.offsetHeight; // Trigger reflow
                progressBar.style.animation = 'progressFill 10s linear infinite';
            }
        }

        function startAutoRotation() {
            procedureInterval = setInterval(nextProcedure, CAROUSEL_INTERVAL);
        }

        // Treatment Modal System - Simplified
        const currentLang = '<?php echo $currentLang; ?>';
        const treatmentCategories = <?php echo json_encode($t['treatment_cards']['categories']); ?>;
        
        // Modal images for each category
        const categoryImages = {
            'facial': 'assets/tarjetas/facial1.png',
            'corporal': 'assets/tarjetas/corporal1.webp', 
            'mamario': 'assets/tarjetas/MAMARIAS1.webp',
            'capilar': 'assets/tarjetas/capilar2.png'
        };

        // Modal click handler function
        function modalClickHandler(e) {
            const modal = document.getElementById('treatment-modal');
            const modalContent = document.getElementById('modal-content');
            if (e.target === modal) {
                closeTreatmentModal();
            }
        }

        // Function to go to contact page
        function goToContactPage() {
            const contactURL = currentLang === 'es' ? 'contactanos.php' : 'contactanos.php?lang=en';
            window.open(contactURL, '_blank');
        }

        function openTreatmentModal(categoryId) {
            const category = treatmentCategories[categoryId];
            if (!category) return;

            const modal = document.getElementById('treatment-modal');
            const modalContent = document.getElementById('modal-content');

            modalContent.innerHTML = `
                <div class="flex flex-col lg:flex-row h-full">
                    <!-- Image Section -->
                    <div class="lg:w-1/2 h-64 lg:h-auto relative">
                        <img src="${categoryImages[categoryId]}" alt="${category.title}" class="w-full h-full object-cover">
                        <div class="absolute top-4 right-4">
                            <button onclick="closeTreatmentModal()" class="bg-white/20 backdrop-blur-sm rounded-full p-2 text-white hover:bg-white/30 transition-colors z-10">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                    
                    <!-- Content Section -->
                    <div class="lg:w-1/2 p-6 lg:p-8 overflow-y-auto max-h-[60vh] lg:max-h-none">
                        <h2 class="text-3xl font-bold text-gray-900 mb-2">${category.title}</h2>
                        <p class="text-lg text-kasaami-violet mb-4">${category.subtitle}</p>
                        
                        <p class="text-gray-600 mb-6 leading-relaxed">${category.description}</p>
                        
                        <!-- Procedures List -->
                        <div class="mb-6">
                            <h3 class="text-xl font-semibold text-gray-900 mb-3">${currentLang === 'es' ? 'Procedimientos Disponibles' : 'Available Procedures'}</h3>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
                                ${category.procedures.map(procedure => `
                                    <div class="flex items-center gap-2 p-2 bg-kasaami-pearl rounded-lg hover:bg-kasaami-violet/10 transition-colors cursor-pointer" onclick="openContactForm('${procedure}')">
                                        <svg class="w-4 h-4 text-kasaami-violet flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-sm text-gray-700 font-medium">${procedure}</span>
                                    </div>
                                `).join('')}
                            </div>
                        </div>
                        
                        <!-- CTA Buttons -->
                        <div class="flex flex-col sm:flex-row gap-3 mt-8">
                            <button onclick="goToContactPage()" class="flex-1 bg-kasaami-violet text-white px-6 py-3 rounded-xl font-semibold hover:bg-kasaami-dark-violet transition-colors">
                                ${currentLang === 'es' ? 'Agendar Consulta Gratuita' : 'Schedule Free Consultation'}
                            </button>
                            <button onclick="openWhatsAppTreatment('${category.title}')" class="flex-1 bg-green-500 text-white px-6 py-3 rounded-xl font-semibold hover:bg-green-600 transition-colors flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"/>
                                </svg>
                                WhatsApp
                            </button>
                        </div>
                    </div>
                </div>
            `;

            modal.classList.remove('hidden');
            setTimeout(() => {
                modal.classList.remove('opacity-0');
                modalContent.classList.remove('scale-95');
                modalContent.classList.add('scale-100');
            }, 10);

            // Close modal when clicking outside - Remove previous listeners first
            modal.removeEventListener('click', modalClickHandler);
            modal.addEventListener('click', modalClickHandler);
            
            // Add Escape key listener
            document.removeEventListener('keydown', escapeKeyHandler);
            document.addEventListener('keydown', escapeKeyHandler);
        }

        function closeTreatmentModal() {
            const modal = document.getElementById('treatment-modal');
            const modalContent = document.getElementById('modal-content');
            
            modal.classList.add('opacity-0');
            modalContent.classList.remove('scale-100');
            modalContent.classList.add('scale-95');
            
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300);

            // Remove event listeners
            modal.removeEventListener('click', modalClickHandler);
            document.removeEventListener('keydown', escapeKeyHandler);
        }

        // Handle Escape key to close modal
        function escapeKeyHandler(e) {
            if (e.key === 'Escape') {
                closeTreatmentModal();
            }
        }

        function openWhatsAppTreatment(treatmentName) {
            const whatsappMessage = currentLang === 'es' 
                ? `¡Hola! Me interesa obtener más información sobre ${treatmentName}.

Me gustaría agendar una consulta virtual gratuita para conocer:
- Detalles del procedimiento
- Fechas disponibles
- Proceso de recuperación

¡Gracias!`
                : `Hello! I'm interested in getting more information about ${treatmentName}.

I would like to schedule a free virtual consultation to learn about:
- Procedure details
- Available dates
- Recovery process

Thank you!`;
            
            const whatsappNumber = "593963052401";
            const whatsappURL = `https://wa.me/${whatsappNumber}?text=${encodeURIComponent(whatsappMessage)}`;
            
            window.open(whatsappURL, '_blank');
        }

        // Contact Form Functions
        function openContactForm(procedureName = null) {
            const whatsappMessage = currentLang === 'es'
                ? `¡Hola! Me interesa obtener información sobre ${procedureName || proceduresData[currentProcedureIndex].name}.

Me gustaría agendar una consulta virtual gratuita para conocer más detalles sobre el procedimiento.

¡Gracias!`
                : `Hello! I'm interested in getting information about ${procedureName || proceduresData[currentProcedureIndex].name}.

I would like to schedule a free virtual consultation to learn more details about the procedure.

Thank you!`;
            
            const whatsappNumber = "593963052401";
            const whatsappURL = `https://wa.me/${whatsappNumber}?text=${encodeURIComponent(whatsappMessage)}`;
            
            window.open(whatsappURL, '_blank');
        }

        function openWhatsAppConsultation() {
            const whatsappMessage = `¡Hola! Me interesa agendar una consulta virtual gratuita con Kasaami Care & Beauty.

Me gustaría conocer más sobre sus procedimientos y recibir asesoría personalizada para mi transformación.

¡Gracias!`;
            
            const whatsappNumber = "59396305240";
            const whatsappURL = `https://wa.me/${whatsappNumber}?text=${encodeURIComponent(whatsappMessage)}`;
            
            window.open(whatsappURL, '_blank');
        }

        // Initialize when page loads
        document.addEventListener('DOMContentLoaded', function() {
            // Set initial state
            updateProcedureIcon(document.getElementById('current-procedure-icon'), proceduresData[0].icon);
            updateProcedureIcon(document.getElementById('main-procedure-icon'), proceduresData[0].icon);
            
            // Start auto-rotation after delay (10 second intervals)
            setTimeout(startAutoRotation, 3000);
        });

        // Keep only basic functionality
        document.getElementById('central-card').addEventListener('click', () => {
            clearInterval(procedureInterval);
            nextProcedure();
            setTimeout(startAutoRotation, 3000);
        });

        // Preload images for smooth transitions
        proceduresData.forEach(procedure => {
            Object.values(procedure.images).forEach(imageSrc => {
                const img = new Image();
                img.src = imageSrc;
            });
        });
    </script>
</body>
</html>

