<?php
// Procedimientos data - VERSIÓN SIN SCROLL, LETRAS GRANDES Y MAYÚSCULAS
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
                'OTOPLASTIA',
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
                'REDUCCIÓN DE SENOS',
                'LIFTING CORPORAL',
                'MASTOPEXIA',
                'CONTORNO CORPORAL',
                'BRAZOS Y MUSLOS',
                'REDUCCIÓN DE PAPADA',
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
                'TRASPLANTE CAPILAR FUE',
                'MICROINJERTOS CAPILARES',
                'TERAPIA PRP CAPILAR',
                'MESOTERAPIA CAPILAR',
                'REGENERACIÓN CAPILAR',
                'REDUCCIÓN LÍNEA FRONTAL',
                'REPARACIÓN CICATRICES',
                'TRATAMIENTO ALOPECIA',
                'IMPLANTES CEJAS',
                'MICROPIGMENTACIÓN'
            ]
        ],
        'wellness' => [
            'title' => 'WELLNESS',
            'procedures' => [
                'MANGA GÁSTRICA',
                'BYPASS GÁSTRICO',
                'MINI BYPASS GÁSTRICO',
                'BALÓN GÁSTRICO',
                'REVISIÓN BARIÁTRICA',
                'CIRUGÍA METABÓLICA',
                'BYPASS DUODENAL',
                'CONVERSIÓN BARIÁTRICA',
                'ENDOSCOPÍA BARIÁTRICA',
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
                'OTOPLASTY',
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
                'BREAST REDUCTION',
                'BODY LIFT',
                'MASTOPEXY',
                'BODY CONTOURING',
                'ARMS & THIGHS',
                'DOUBLE CHIN REDUCTION',
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
                'FUE HAIR TRANSPLANT',
                'HAIR MICROGRAFTS',
                'PRP HAIR THERAPY',
                'HAIR MESOTHERAPY',
                'HAIR REGENERATION',
                'FRONTAL HAIRLINE REDUCTION',
                'SCAR REPAIR',
                'ALOPECIA TREATMENT',
                'EYEBROW IMPLANTS',
                'HAIR MICROPIGMENTATION'
            ]
        ],
        'wellness' => [
            'title' => 'WELLNESS',
            'procedures' => [
                'GASTRIC SLEEVE',
                'GASTRIC BYPASS',
                'MINI GASTRIC BYPASS',
                'GASTRIC BALLOON',
                'BARIATRIC REVISION',
                'METABOLIC SURGERY',
                'DUODENAL BYPASS',
                'BARIATRIC CONVERSION',
                'BARIATRIC ENDOSCOPY',
                'ENDOSCOPIC SLEEVE'
            ]
        ]
    ]
];

$procData = $proceduresData[$currentLang];
?>

<!-- Procedures Gallery - Black & White with Color Hover -->
<section class="bg-black">
    <div class="w-full">
        <div class="text-center py-16 px-4">
            <h2 class="text-4xl md:text-5xl font-rufina font-bold text-white mb-6">
                <?php echo $procData['title']; ?>
            </h2>
            <p class="text-xl text-gray-300">
                <?php echo $procData['subtitle']; ?>
            </p>
        </div>
        
        <div class="procedures-container">
            <!-- Face Procedures -->
            <a href="procedimientos" class="procedure-card" style="background-image: url('https://www.lajollaskin.com/wp-content/themes/lajollaskin_com/static/images/specialties-face-2.jpg');">
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
            <a href="procedimientos" class="procedure-card" style="background-image: url('https://www.lajollaskin.com/wp-content/themes/lajollaskin_com/static/images/specialties-body.jpg');">
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
            <a href="procedimientos" class="procedure-card" style="background-image: url('https://www.lajollaskin.com/wp-content/themes/lajollaskin_com/static/images/specialties-breasts-2.jpg');">
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
            <a href="procedimientos" class="procedure-card" style="background-image: url('https://www.lajollaskin.com/wp-content/themes/lajollaskin_com/static/images/specialties-hair-removal.jpg');">
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

            <!-- Wellness & Bariatric Care -->
            <a href="procedimientos" class="procedure-card" style="background-image: url('https://careinturkey.com/icerik/img/medya/genel/2-2.jpg');">
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
        <div class="text-center py-16 bg-gray-900">
            <a href="contactanos.php" class="inline-flex items-center space-x-3 border-2 border-white text-white px-8 py-4 rounded-lg font-medium text-lg hover:bg-white hover:text-gray-900 transition-all duration-300 transform hover:scale-105">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a1 1 0 011-1h6a1 1 0 011 1v4m-6 0v1m0-1h4m-4 0H7a3 3 0 00-3 3v8a3 3 0 003 3h10a3 3 0 003-3V10a3 3 0 00-3-3h-2.5"></path>
                </svg>
                <span><?php echo $currentLang === 'es' ? 'AGENDA UNA CITA' : 'SCHEDULE AN APPOINTMENT'; ?></span>
            </a>
        </div>
    </div>
</section>

<style>
/* Estilos para listas SIN SCROLL - LETRAS GRANDES Y MAYÚSCULAS */
.procedure-list-no-scroll {
    display: flex;
    flex-direction: column;
    gap: 12px;
    max-height: none; /* SIN LÍMITE DE ALTURA */
    overflow: visible; /* SIN SCROLL */
    padding: 0;
}

.procedure-item-large {
    font-size: 1.1rem; /* MÁS GRANDE: de 0.875rem a 1.1rem */
    font-weight: 600; /* MÁS BOLD */
    line-height: 1.4;
    opacity: 0.95;
    padding-left: 12px;
    transition: all 0.3s ease;
    text-transform: uppercase; /* TODO EN MAYÚSCULAS */
    letter-spacing: 0.05em; /* ESPACIADO ENTRE LETRAS */
    text-shadow: 1px 1px 2px rgba(0,0,0,0.8); /* SOMBRA PARA MEJOR LEGIBILIDAD */
}

.procedure-item-large:hover {
    opacity: 1;
    transform: translateX(6px);
    color: #C4B5FD; /* Color violeta claro al hover */
}

/* Ajuste del contenido para acomodar más texto */
.procedure-info {
    opacity: 0;
    transform: translateY(20px);
    transition: all 0.6s ease;
    margin-top: auto;
    max-width: 350px; /* MÁS ANCHO: de 300px a 350px */
    max-height: 80vh; /* ALTURA MÁXIMA DEL VIEWPORT */
    display: flex;
    flex-direction: column;
}

.procedure-card:hover .procedure-info {
    opacity: 1;
    transform: translateY(0);
}

/* Responsive - Mobile adjustments */
@media (max-width: 768px) {
    .procedure-item-large {
        font-size: 1rem; /* Ajuste para móvil */
        padding-left: 8px;
    }
    
    .procedure-info {
        max-width: 100%;
        max-height: 60vh;
    }
    
    .procedure-list-no-scroll {
        gap: 8px;
    }
}

/* Mejora de contraste para mejor lectura */
.procedure-card::before {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(45deg, rgba(0,0,0,0.9), rgba(0,0,0,0.6)); /* MÁS OSCURO */
    transition: all 0.8s ease;
    z-index: 1;
}

.procedure-card:hover::before {
    background: linear-gradient(45deg, rgba(139, 92, 246, 0.85), rgba(109, 40, 217, 0.7)); /* MÁS INTENSO */
}
</style>