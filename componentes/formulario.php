<?php
// componentes/formulario.php
// Componente del formulario de contacto con modal

// Include countries data
require_once __DIR__ . '/../includes/paises.php';

// Horarios disponibles - Generar próximos 30 días (excluyendo domingos)
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

<!-- Form Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Formulario integrado -->
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
                        <option value=""><?php echo $t['form']['select_country']; ?></option>
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
                        <?php echo $t['form']['budget_question']; ?> <span class="text-red-500">*</span>
                    </label>
                    <select name="budget" required class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-kasaami-violet focus:border-kasaami-violet">
                        <option value=""><?php echo $t['form']['select_budget']; ?></option>
                        <?php foreach ($t['form']['budget_options'] as $value => $display): ?>
                        <option value="<?php echo $value; ?>"><?php echo $display; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Travel Type -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        <?php echo $t['form']['travel_type']; ?> <span class="text-red-500">*</span>
                    </label>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                        <?php foreach ($t['form']['travel_type_options'] as $value => $label): ?>
                        <label class="relative">
                            <input type="radio" name="travel_type" value="<?php echo $value; ?>" class="sr-only peer travel-type-radio" required onchange="toggleGroupSize()">
                            <div class="p-3 border border-gray-300 rounded-lg text-center cursor-pointer peer-checked:bg-kasaami-violet peer-checked:text-white peer-checked:border-kasaami-violet hover:border-kasaami-light-violet transition-colors duration-200">
                                <span class="text-sm font-medium"><?php echo $label; ?></span>
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
                    <input type="number" name="group_size" min="2" max="20" class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-kasaami-violet focus:border-kasaami-violet" placeholder="<?php echo $t['form']['group_size_placeholder']; ?>" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                </div>

                <!-- Procedures Interest -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        <?php echo $t['form']['objectives']; ?> <span class="text-red-500">*</span>
                    </label>
                    <textarea name="procedures_interest" rows="4" required class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-kasaami-violet focus:border-kasaami-violet" placeholder="<?php echo $t['form']['objectives_placeholder']; ?>"></textarea>
                </div>

                <!-- How found us -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        <?php echo $t['form']['found_us']; ?> <span class="text-red-500">*</span>
                    </label>
                    <select name="found_us" required class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-kasaami-violet focus:border-kasaami-violet">
                        <option value=""><?php echo $t['form']['select_found']; ?></option>
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
                        <option value=""><?php echo $t['form']['select_found']; ?></option>
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
                    <button type="submit" id="submit-btn" class="w-full bg-gradient-to-r from-kasaami-violet to-kasaami-dark-violet text-white py-4 px-8 rounded-lg font-semibold text-lg hover:shadow-lg hover:shadow-kasaami-violet/25 transition-all duration-200 transform hover:scale-105">
                        <span id="submit-text"><?php echo $t['form']['submit']; ?></span>
                        <span id="submit-loading" class="hidden">
                            <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            <?php echo $t['form']['sending']; ?>
                        </span>
                    </button>
                </div>
            </form>
        </div>

    </div>
</section>

<!-- Modal de Selección de Fecha y Hora -->
<div id="appointment-modal" class="fixed inset-0 bg-black/50 z-50 hidden items-center justify-center p-4">
    <div class="bg-white rounded-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
        <div class="p-6">
            <!-- Header del Modal -->
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-2xl font-rufina font-bold text-gray-900">
                    <?php echo $t['form']['schedule_title']; ?>
                </h3>
                <button onclick="closeAppointmentModal()" class="text-gray-400 hover:text-gray-600 transition-colors duration-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <!-- Fila 1: Resumen de datos del usuario -->
            <div class="mb-6">
                <div id="user-summary" class="bg-kasaami-pearl p-4 rounded-lg">
                    <h4 class="font-semibold text-gray-900 mb-2">
                        <?php echo $currentLang === 'es' ? 'Resumen de tu consulta:' : 'Consultation summary:'; ?>
                    </h4>
                    <div id="summary-content" class="text-sm text-gray-600 space-y-1">
                        <!-- Se llenará dinámicamente con JavaScript -->
                    </div>
                </div>
            </div>

            <!-- Fila 2: Selección de Fecha y Hora -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <!-- Date Selection -->
                <div class="relative">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        <?php echo $t['form']['appointment_date']; ?> <span class="text-red-500">*</span>
                    </label>
                    
                    <!-- Date Input with Calendar Trigger -->
                    <div class="relative">
                        <input type="text" 
                               id="date-display" 
                               class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-kasaami-violet focus:border-kasaami-violet cursor-pointer" 
                               placeholder="<?php echo $t['form']['select_date']; ?>" 
                               readonly 
                               onclick="toggleCalendar()">
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    </div>
                    
                    <!-- Calendar Dropdown -->
                    <div id="calendar-dropdown" class="absolute z-10 mt-1 bg-white border border-gray-200 rounded-lg shadow-lg p-4 hidden" style="min-width: 300px;">
                        <!-- Calendar Navigation -->
                        <div class="flex items-center justify-between mb-4">
                            <button type="button" id="prev-month" class="p-1 hover:bg-gray-100 rounded">
                                <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                </svg>
                            </button>
                            <h3 class="font-semibold text-gray-900" id="calendar-month-year"></h3>
                            <button type="button" id="next-month" class="p-1 hover:bg-gray-100 rounded">
                                <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </button>
                        </div>
                        
                        <!-- Days of week -->
                        <div class="grid grid-cols-7 gap-1 mb-2">
                            <div class="text-center text-xs font-medium text-gray-500 py-1"><?php echo $currentLang === 'es' ? 'Dom' : 'Sun'; ?></div>
                            <div class="text-center text-xs font-medium text-gray-500 py-1"><?php echo $currentLang === 'es' ? 'Lun' : 'Mon'; ?></div>
                            <div class="text-center text-xs font-medium text-gray-500 py-1"><?php echo $currentLang === 'es' ? 'Mar' : 'Tue'; ?></div>
                            <div class="text-center text-xs font-medium text-gray-500 py-1"><?php echo $currentLang === 'es' ? 'Mié' : 'Wed'; ?></div>
                            <div class="text-center text-xs font-medium text-gray-500 py-1"><?php echo $currentLang === 'es' ? 'Jue' : 'Thu'; ?></div>
                            <div class="text-center text-xs font-medium text-gray-500 py-1"><?php echo $currentLang === 'es' ? 'Vie' : 'Fri'; ?></div>
                            <div class="text-center text-xs font-medium text-gray-500 py-1"><?php echo $currentLang === 'es' ? 'Sáb' : 'Sat'; ?></div>
                        </div>
                        
                        <!-- Calendar days -->
                        <div id="calendar-days" class="grid grid-cols-7 gap-1">
                            <!-- Days will be populated by JavaScript -->
                        </div>
                    </div>
                    
                    <!-- Hidden input for selected date -->
                    <input type="hidden" id="modal-appointment-date" name="appointment_date" value="">
                </div>
                
                <!-- Time Selection -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        <?php echo $t['form']['appointment_time']; ?> <span class="text-red-500">*</span>
                    </label>
                    
                    <div id="time-selection-container" class="opacity-50 pointer-events-none transition-all duration-200">
                        <p class="text-sm text-gray-500 mb-3"><?php echo $t['form']['first_select_date']; ?></p>
                        
                        <!-- Time chips grid -->
                        <div class="grid grid-cols-2 gap-2" id="time-chips">
                            <?php foreach ($available_schedules['times'] as $time => $display): ?>
                                <button type="button" 
                                        class="time-chip p-2 border border-gray-200 rounded-lg text-center cursor-pointer hover:border-kasaami-violet hover:bg-kasaami-light-violet transition-all duration-200 disabled:opacity-50 disabled:cursor-not-allowed" 
                                        data-time="<?php echo $time; ?>"
                                        disabled>
                                    <div class="text-sm font-medium"><?php echo $display; ?></div>
                                </button>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    
                    <!-- Hidden input for selected time -->
                    <input type="hidden" id="modal-appointment-time" name="appointment_time" value="">
                </div>
            </div>

            <!-- Disponibilidad en tiempo real -->
            <div id="modal-availability-info" class="mb-4 p-3 bg-blue-50 border border-blue-200 rounded-lg hidden">
                <div class="flex items-center text-blue-700">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                    </svg>
                    <span id="modal-availability-text">
                        <?php echo $currentLang === 'es' ? 'Verificando disponibilidad...' : 'Checking availability...'; ?>
                    </span>
                </div>
            </div>

            <!-- Resumen de la Cita (aparece cuando se selecciona fecha y hora) -->
            <div id="appointment-summary" class="mb-6 p-4 bg-gradient-to-r from-kasaami-light-violet to-kasaami-violet rounded-lg text-white hidden">
                <h4 class="font-semibold mb-3">
                    <?php echo $currentLang === 'es' ? '📅 Resumen de tu cita:' : '📅 Your appointment summary:'; ?>
                </h4>
                <div id="appointment-details" class="grid grid-cols-2 gap-4 text-sm">
                    <!-- Se llenará dinámicamente con JavaScript -->
                </div>
            </div>

            <!-- Botones de acción -->
            <div class="flex flex-col sm:flex-row gap-3">
                <button onclick="closeAppointmentModal()" class="flex-1 bg-gray-200 hover:bg-gray-300 text-gray-800 py-3 px-6 rounded-lg font-medium transition-colors duration-200">
                    <?php echo $currentLang === 'es' ? 'Cancelar' : 'Cancel'; ?>
                </button>
                <button id="confirm-appointment-btn" onclick="confirmAppointment()" class="flex-1 bg-gradient-to-r from-kasaami-violet to-kasaami-dark-violet text-white py-3 px-6 rounded-lg font-semibold hover:shadow-lg hover:shadow-kasaami-violet/25 transition-all duration-200 transform hover:scale-105" disabled>
                    <span id="confirm-appointment-text">
                        <?php echo $currentLang === 'es' ? 'Confirmar Cita' : 'Confirm Appointment'; ?>
                    </span>
                    <span id="confirm-appointment-loading" class="hidden">
                        <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        <?php echo $t['form']['sending']; ?>
                    </span>
                </button>
            </div>
        </div>
    </div>
</div>