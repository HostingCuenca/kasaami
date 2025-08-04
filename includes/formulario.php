<?php
// includes/formulario.php
// Formulario de contacto integrado con CRM

// Incluir configuración de base de datos
require_once __DIR__ . '/database.php';

// Procesar formulario si se envía por POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Validar que todos los campos requeridos estén presentes
        $required_fields = ['name', 'lastname', 'email', 'phone', 'country', 'budget', 'travel_type', 'procedures_interest', 'found_us', 'contact_preference', 'appointment_date', 'appointment_time'];
        
        foreach ($required_fields as $field) {
            if (empty($_POST[$field])) {
                jsonResponse(false, "El campo $field es requerido");
            }
        }
        
        // Validar email
        if (!isValidEmail($_POST['email'])) {
            jsonResponse(false, "El email no es válido");
        }
        
        // Validar fecha de cita (no puede ser en el pasado)
        $appointmentDate = $_POST['appointment_date'];
        if (strtotime($appointmentDate) < strtotime(date('Y-m-d'))) {
            jsonResponse(false, "La fecha de la cita no puede ser en el pasado");
        }
        
        // Sanitizar datos
        $formData = [
            'name' => sanitizeInput($_POST['name']),
            'lastname' => sanitizeInput($_POST['lastname']),
            'email' => sanitizeInput($_POST['email']),
            'phone' => sanitizeInput($_POST['phone']),
            'country' => sanitizeInput($_POST['country']),
            'budget' => sanitizeInput($_POST['budget']),
            'travel_type' => sanitizeInput($_POST['travel_type']),
            'group_size' => isset($_POST['group_size']) ? (int)$_POST['group_size'] : 1,
            'procedures_interest' => sanitizeInput($_POST['procedures_interest']),
            'found_us' => sanitizeInput($_POST['found_us']),
            'contact_preference' => sanitizeInput($_POST['contact_preference']),
            'appointment_date' => sanitizeInput($_POST['appointment_date']),
            'appointment_time' => sanitizeInput($_POST['appointment_time'])
        ];
        
        // Verificar disponibilidad del horario
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("
            SELECT COUNT(*) as count 
            FROM appointments 
            WHERE appointment_date = ? 
            AND appointment_time = ? 
            AND status NOT IN ('cancelada', 'no_asistio')
        ");
        $stmt->execute([$formData['appointment_date'], $formData['appointment_time']]);
        $result = $stmt->fetch();
        
        if ($result['count'] >= MAX_APPOINTMENTS_PER_SLOT) {
            jsonResponse(false, "Este horario ya no está disponible. Por favor selecciona otro.");
        }
        
        // Crear lead
        $leadManager = new LeadManager();
        $leadId = $leadManager->createLead($formData);
        
        if (!$leadId) {
            jsonResponse(false, "Error al crear el registro. Inténtalo de nuevo.");
        }
        
        // Crear cita
        $appointmentId = $leadManager->createAppointment($leadId, $formData['appointment_date'], $formData['appointment_time']);
        
        if (!$appointmentId) {
            jsonResponse(false, "Error al agendar la cita. Inténtalo de nuevo.");
        }
        
        // Enviar emails si el servicio está disponible
        if (isEmailServiceAvailable()) {
            $emailService = new EmailService();
            
            // Email de confirmación al cliente
            $emailService->sendConfirmationEmail($formData);
            
            // Notificación al equipo comercial
            $emailService->sendCommercialNotification($formData);
        }
        
        // Respuesta exitosa
        jsonResponse(true, "¡Consulta agendada exitosamente! Te contactaremos pronto.", [
            'lead_id' => $leadId,
            'appointment_id' => $appointmentId,
            'appointment_date' => $formData['appointment_date'],
            'appointment_time' => $formData['appointment_time']
        ]);
        
    } catch (Exception $e) {
        error_log("Form processing error: " . $e->getMessage());
        jsonResponse(false, "Error interno. Por favor intenta de nuevo o contáctanos por WhatsApp.");
    }
    
    exit;
}

// Horarios disponibles
$available_schedules = [
    'dates' => [],
    'times' => [
        '09:00' => '9:00 AM',
        '10:00' => '10:00 AM', 
        '11:00' => '11:00 AM',
        '14:00' => '2:00 PM',
        '15:00' => '3:00 PM',
        '16:00' => '4:00 PM',
        '17:00' => '5:00 PM'
    ]
];

// Generar fechas disponibles (próximos 30 días, excluyendo domingos)
$start_date = new DateTime();
$end_date = new DateTime();
$end_date->add(new DateInterval('P30D'));

$current_date = clone $start_date;
while ($current_date <= $end_date) {
    // Excluir domingos (0 = domingo)
    if ($current_date->format('w') != 0) {
        $available_schedules['dates'][] = $current_date->format('Y-m-d');
    }
    $current_date->add(new DateInterval('P1D'));
}
?>

<!-- Form & Calendar Section Integrated -->
<div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-xl p-8 mb-16">
    <h2 class="text-3xl font-rufina font-bold text-gray-900 mb-4 text-center">
        <?php echo $t['form']['title']; ?>
    </h2>
    <p class="text-gray-600 mb-8 text-center">
        <?php echo $t['form']['subtitle']; ?>
    </p>
    
    <!-- Mensaje de estado de conexión -->
    <div id="connection-status" class="mb-6 p-4 rounded-lg hidden">
        <div class="flex items-center">
            <div id="status-icon" class="mr-3"></div>
            <div id="status-message"></div>
        </div>
    </div>
    
    <form id="contact-form" class="space-y-6">
        
        <!-- Fecha y Hora de la Cita -->
        <div class="bg-kasaami-pearl p-6 rounded-xl mb-6">
            <h3 class="text-xl font-semibold text-gray-900 mb-6 text-center">Selecciona tu fecha y hora preferida</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Date Selection -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Fecha de la cita <span class="text-red-500">*</span>
                    </label>
                    <select name="appointment_date" id="appointment-date" required class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-kasaami-violet focus:border-kasaami-violet">
                        <option value="">Seleccionar fecha</option>
                        <?php foreach ($available_schedules['dates'] as $date): ?>
                            <?php 
                                $date_obj = new DateTime($date);
                                $formatted_date = $date_obj->format('d/m/Y');
                                $day_name = $date_obj->format('l');
                                $day_spanish = [
                                    'Monday' => 'Lunes',
                                    'Tuesday' => 'Martes', 
                                    'Wednesday' => 'Miércoles',
                                    'Thursday' => 'Jueves',
                                    'Friday' => 'Viernes',
                                    'Saturday' => 'Sábado'
                                ];
                            ?>
                            <option value="<?php echo $date; ?>">
                                <?php echo $day_spanish[$day_name] . ' ' . $formatted_date; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                
                <!-- Time Selection -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Hora de la cita <span class="text-red-500">*</span>
                    </label>
                    <select name="appointment_time" id="appointment-time" required class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-kasaami-violet focus:border-kasaami-violet" disabled>
                        <option value="">Primero selecciona una fecha</option>
                        <?php foreach ($available_schedules['times'] as $time => $display): ?>
                            <option value="<?php echo $time; ?>"><?php echo $display; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            
            <!-- Disponibilidad en tiempo real -->
            <div id="availability-info" class="mt-4 p-3 bg-blue-50 border border-blue-200 rounded-lg hidden">
                <div class="flex items-center text-blue-700">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                    </svg>
                    <span id="availability-text">Verificando disponibilidad...</span>
                </div>
            </div>
        </div>

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
                    Correo electrónico <span class="text-red-500">*</span>
                </label>
                <input type="email" name="email" required class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-kasaami-violet focus:border-kasaami-violet">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Teléfono/Móvil <span class="text-red-500">*</span>
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
                País del pasaporte <span class="text-red-500">*</span>
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
                ¿Qué presupuesto tienes? en USD <span class="text-red-500">*</span>
            </label>
            <select name="budget" required class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-kasaami-violet focus:border-kasaami-violet">
                <option value="">Seleccionar presupuesto</option>
                <?php foreach ($t['form']['budget_options'] as $value => $display): ?>
                <option value="<?php echo $value; ?>"><?php echo $display; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Travel Type -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">
                Viajas: <span class="text-red-500">*</span>
            </label>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                <label class="relative">
                    <input type="radio" name="travel_type" value="solo" class="sr-only peer travel-type-radio" required onchange="toggleGroupSize()">
                    <div class="p-3 border border-gray-300 rounded-lg text-center cursor-pointer peer-checked:bg-kasaami-violet peer-checked:text-white peer-checked:border-kasaami-violet hover:border-kasaami-light-violet transition-colors duration-200">
                        <span class="text-sm font-medium">Solo</span>
                    </div>
                </label>
                <label class="relative">
                    <input type="radio" name="travel_type" value="familiar" class="sr-only peer travel-type-radio" required onchange="toggleGroupSize()">
                    <div class="p-3 border border-gray-300 rounded-lg text-center cursor-pointer peer-checked:bg-kasaami-violet peer-checked:text-white peer-checked:border-kasaami-violet hover:border-kasaami-light-violet transition-colors duration-200">
                        <span class="text-sm font-medium">Con un familiar</span>
                    </div>
                </label>
                <label class="relative">
                    <input type="radio" name="travel_type" value="amigo" class="sr-only peer travel-type-radio" required onchange="toggleGroupSize()">
                    <div class="p-3 border border-gray-300 rounded-lg text-center cursor-pointer peer-checked:bg-kasaami-violet peer-checked:text-white peer-checked:border-kasaami-violet hover:border-kasaami-light-violet transition-colors duration-200">
                        <span class="text-sm font-medium">Con un amigo</span>
                    </div>
                </label>
                <label class="relative">
                    <input type="radio" name="travel_type" value="grupo" class="sr-only peer travel-type-radio" required onchange="toggleGroupSize()">
                    <div class="p-3 border border-gray-300 rounded-lg text-center cursor-pointer peer-checked:bg-kasaami-violet peer-checked:text-white peer-checked:border-kasaami-violet hover:border-kasaami-light-violet transition-colors duration-200">
                        <span class="text-sm font-medium">En grupo</span>
                    </div>
                </label>
            </div>
        </div>

        <!-- Group Size (Hidden by default) -->
        <div id="group-size-section" class="hidden">
            <label class="block text-sm font-medium text-gray-700 mb-2">
                ¿Cuántas personas hay en su grupo (incluido usted)? <span class="text-red-500">*</span>
            </label>
            <input type="number" name="group_size" min="2" max="20" class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-kasaami-violet focus:border-kasaami-violet" placeholder="Incluido usted" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
        </div>

        <!-- Procedures Interest -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">
                Cuéntanos en qué procedimiento estás interesado <span class="text-red-500">*</span>
            </label>
            <textarea name="procedures_interest" rows="4" required class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-kasaami-violet focus:border-kasaami-violet" placeholder="Escribe el procedimiento médico o estético que te interesa (ej. rinoplastia, liposucción, aumento de senos, etc.). Si lo deseas, puedes añadir cualquier información adicional que consideres importante, como antecedentes médicos, intervenciones previas o aspectos específicos que te gustaría mejorar."></textarea>
        </div>

        <!-- How found us -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">
                ¿Cómo nos ha encontrado? <span class="text-red-500">*</span>
            </label>
            <select name="found_us" required class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-kasaami-violet focus:border-kasaami-violet">
                <option value="">Seleccionar</option>
                <?php foreach ($t['form']['found_options'] as $value => $display): ?>
                <option value="<?php echo $value; ?>"><?php echo $display; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Contact Preference -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">
                ¿Cómo prefiere que nos pongamos en contacto usted? <span class="text-red-500">*</span>
            </label>
            <select name="contact_preference" required class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-kasaami-violet focus:border-kasaami-violet">
                <option value="">Seleccionar</option>
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
                <span class="text-sm text-gray-700">He leído los términos y condiciones</span>
            </label>
            
            <label class="flex items-start space-x-3">
                <input type="checkbox" name="privacy" required class="mt-1 h-4 w-4 text-kasaami-violet focus:ring-kasaami-violet border-gray-300 rounded">
                <span class="text-sm text-gray-700">Acepto los paquetes de turismo médico Condiciones generales he leído el Política de privacidad y acepto que los datos que he proporcionado, incluidos los datos sanitarios, sean procesados por Medical Tourism Packages con el fin de obtener presupuestos.</span>
            </label>
        </div>

        <!-- Submit Button -->
        <div class="text-center">
            <button type="submit" id="submit-btn" class="w-full bg-gradient-to-r from-kasaami-violet to-kasaami-dark-violet text-white py-4 px-8 rounded-lg font-semibold text-lg hover:shadow-lg hover:shadow-kasaami-violet/25 transition-all duration-200 transform hover:scale-105">
                <span id="submit-text">ENVIAR</span>
                <span id="submit-loading" class="hidden">
                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Enviando...
                </span>
            </button>
        </div>
    </form>
</div>

<script>
// Verificar conexión a la base de datos al cargar la página
document.addEventListener('DOMContentLoaded', function() {
    checkDatabaseConnection();
    
    // Enable time selection when date is selected
    document.getElementById('appointment-date').addEventListener('change', function() {
        const timeSelect = document.getElementById('appointment-time');
        const availabilityInfo = document.getElementById('availability-info');
        
        if (this.value) {
            timeSelect.disabled = false;
            timeSelect.innerHTML = '<option value="">Seleccionar hora</option>';
            
            // Add available times
            const times = <?php echo json_encode($available_schedules['times']); ?>;
            for (const [value, display] of Object.entries(times)) {
                const option = document.createElement('option');
                option.value = value;
                option.textContent = display;
                timeSelect.appendChild(option);
            }
            
            // Check availability for selected date
            checkAvailabilityForDate(this.value);
            availabilityInfo.classList.remove('hidden');
        } else {
            timeSelect.disabled = true;
            timeSelect.innerHTML = '<option value="">Primero selecciona una fecha</option>';
            availabilityInfo.classList.add('hidden');
        }
    });
    
    // Check specific time availability
    document.getElementById('appointment-time').addEventListener('change', function() {
        const dateValue = document.getElementById('appointment-date').value;
        if (dateValue && this.value) {
            checkSpecificTimeAvailability(dateValue, this.value);
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
                <span class="text-green-700 font-medium">Sistema conectado</span>
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
                <span class="text-red-700 font-medium">Error de conexión</span>
                <div class="text-red-600 text-sm mt-1">Por favor contáctanos por WhatsApp</div>
            `;
        }
        
        statusDiv.classList.remove('hidden');
        
    } catch (error) {
        console.error('Error checking connection:', error);
    }
}

// Verificar disponibilidad para una fecha específica
async function checkAvailabilityForDate(date) {
    try {
        const response = await fetch(`includes/check_availability.php?date=${date}`);
        const data = await response.json();
        
        const availabilityText = document.getElementById('availability-text');
        
        if (data.success) {
            const available = data.available_slots;
            const total = data.total_slots;
            const percentage = ((available / total) * 100).toFixed(0);
            
            if (percentage > 50) {
                availabilityText.innerHTML = `<span class="text-green-600">Buena disponibilidad: ${available} de ${total} horarios disponibles</span>`;
            } else if (percentage > 20) {
                availabilityText.innerHTML = `<span class="text-yellow-600">Disponibilidad limitada: ${available} de ${total} horarios disponibles</span>`;
            } else {
                availabilityText.innerHTML = `<span class="text-red-600">Poca disponibilidad: ${available} de ${total} horarios disponibles</span>`;
            }
        } else {
            availabilityText.innerHTML = `<span class="text-gray-600">No se pudo verificar disponibilidad</span>`;
        }
    } catch (error) {
        console.error('Error checking availability:', error);
    }
}

// Verificar disponibilidad de un horario específico
async function checkSpecificTimeAvailability(date, time) {
    try {
        const response = await fetch(`includes/check_availability.php?date=${date}&time=${time}`);
        const data = await response.json();
        
        const availabilityText = document.getElementById('availability-text');
        
        if (data.success) {
            if (data.available) {
                availabilityText.innerHTML = `<span class="text-green-600">✓ Horario disponible</span>`;
            } else {
                availabilityText.innerHTML = `<span class="text-red-600">✗ Horario no disponible</span>`;
                // Disable the time option
                const timeSelect = document.getElementById('appointment-time');
                const selectedOption = timeSelect.querySelector(`option[value="${time}"]`);
                if (selectedOption) {
                    selectedOption.disabled = true;
                    selectedOption.textContent += ' (No disponible)';
                }
            }
        }
    } catch (error) {
        console.error('Error checking time availability:', error);
    }
}

// Form submission with enhanced feedback
document.getElementById('contact-form').addEventListener('submit', async function(e) {
    e.preventDefault();
    
    const submitBtn = document.getElementById('submit-btn');
    const submitText = document.getElementById('submit-text');
    const submitLoading = document.getElementById('submit-loading');
    
    // Show loading state
    submitBtn.disabled = true;
    submitText.classList.add('hidden');
    submitLoading.classList.remove('hidden');
    
    try {
        const formData = new FormData(this);
        
        const response = await fetch('includes/formulario.php', {
            method: 'POST',
            body: formData
        });
        
        const data = await response.json();
        
        if (data.success) {
            showSuccessMessage(data.message, data.data);
            this.reset();
            updatePhoneFlag(null);
            document.getElementById('group-size-section').classList.add('hidden');
            document.getElementById('availability-info').classList.add('hidden');
        } else {
            showErrorMessage(data.message);
        }
        
    } catch (error) {
        console.error('Form submission error:', error);
        showErrorMessage('Error de conexión. Por favor intenta de nuevo o contáctanos por WhatsApp.');
    } finally {
        // Reset button state
        submitBtn.disabled = false;
        submitText.classList.remove('hidden');
        submitLoading.classList.add('hidden');
    }
});

// Enhanced success message
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
            <h3 class="text-2xl font-rufina font-bold text-gray-900 mb-4">¡Consulta Agendada!</h3>
            <p class="text-gray-600 mb-6">${message}</p>
            ${data ? `
                <div class="bg-gray-50 rounded-lg p-4 mb-6 text-left">
                    <h4 class="font-semibold text-gray-900 mb-2">Detalles de tu cita:</h4>
                    <p class="text-sm text-gray-600">📅 ${data.appointment_date}</p>
                    <p class="text-sm text-gray-600">🕒 ${data.appointment_time}</p>
                    <p class="text-sm text-gray-600">🆔 ID: ${data.lead_id}</p>
                </div>
            ` : ''}
            <div class="space-y-3">
                <button onclick="this.closest('.fixed').remove()" class="w-full bg-kasaami-violet hover:bg-kasaami-dark-violet text-white px-6 py-3 rounded-lg font-medium transition-colors duration-200">
                    Cerrar
                </button>
                <a href="https://wa.me/593963052401?text=${encodeURIComponent('Hola! Acabo de agendar una consulta. Mi ID es: ' + (data?.lead_id || ''))}" 
                   class="block w-full bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-lg font-medium transition-colors duration-200">
                    Contactar por WhatsApp
                </a>
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
</script>