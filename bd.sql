-- ============================================
-- BASE DE DATOS CRM KASAAMI CARE & BEAUTY
-- Sistema completo de gestión de leads y citas
-- ============================================

-- 1. TABLA DE LEADS/CLIENTES POTENCIALES
CREATE TABLE leads (
    id INT PRIMARY KEY AUTO_INCREMENT,
    -- Información personal
    name VARCHAR(100) NOT NULL,
    lastname VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    phone VARCHAR(20) NOT NULL,
    country VARCHAR(5) NOT NULL, -- Código ISO del país
    
    -- Información del viaje/tratamiento
    budget_range ENUM('4000-8000', '8000-12000', '12000-16000', '16000-20000', '20000+') NOT NULL,
    travel_type ENUM('solo', 'familiar', 'amigo', 'grupo') NOT NULL,
    group_size INT DEFAULT 1,
    procedures_interest TEXT NOT NULL,
    
    -- Marketing y contacto
    found_us ENUM('google', 'social', 'referral', 'other') NOT NULL,
    contact_preference ENUM('email', 'phone', 'whatsapp') NOT NULL,
    
    -- Sistema CRM
    lead_score INT DEFAULT 0, -- Puntuación automática del lead
    status ENUM('nuevo', 'contactado', 'interesado', 'propuesta_enviada', 'negociando', 'convertido', 'perdido') DEFAULT 'nuevo',
    priority ENUM('baja', 'media', 'alta', 'urgente') DEFAULT 'media',
    assigned_to VARCHAR(100), -- Asesor asignado
    
    -- Metadatos
    language VARCHAR(2) DEFAULT 'es',
    source VARCHAR(50) DEFAULT 'website_form',
    ip_address VARCHAR(45),
    user_agent TEXT,
    
    -- Timestamps
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    last_contact_at TIMESTAMP NULL,
    
    -- Índices para optimización
    INDEX idx_email (email),
    INDEX idx_status (status),
    INDEX idx_created_at (created_at),
    INDEX idx_lead_score (lead_score),
    INDEX idx_assigned_to (assigned_to)
);

-- 2. TABLA DE CITAS/APPOINTMENTS
CREATE TABLE appointments (
    id INT PRIMARY KEY AUTO_INCREMENT,
    lead_id INT NOT NULL,
    
    -- Información de la cita
    appointment_date DATE NOT NULL,
    appointment_time TIME NOT NULL,
    timezone VARCHAR(50) DEFAULT 'America/Guayaquil',
    duration_minutes INT DEFAULT 60,
    
    -- Tipo y modalidad
    appointment_type ENUM('inicial', 'seguimiento', 'cirugia', 'postoperatorio') DEFAULT 'inicial',
    modality ENUM('presencial', 'virtual', 'telefonica') DEFAULT 'virtual',
    
    -- Estado de la cita
    status ENUM('programada', 'confirmada', 'en_progreso', 'completada', 'cancelada', 'no_asistio') DEFAULT 'programada',
    
    -- Información adicional
    meeting_link VARCHAR(255), -- Link de Google Meet, Zoom, etc.
    location TEXT, -- Para citas presenciales
    notes TEXT,
    
    -- Personal asignado
    doctor_assigned VARCHAR(100),
    consultant_assigned VARCHAR(100),
    
    -- Recordatorios
    reminder_sent_24h BOOLEAN DEFAULT FALSE,
    reminder_sent_1h BOOLEAN DEFAULT FALSE,
    
    -- Timestamps
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    confirmed_at TIMESTAMP NULL,
    completed_at TIMESTAMP NULL,
    
    FOREIGN KEY (lead_id) REFERENCES leads(id) ON DELETE CASCADE,
    
    -- Índices
    INDEX idx_appointment_date (appointment_date),
    INDEX idx_appointment_datetime (appointment_date, appointment_time),
    INDEX idx_status (status),
    INDEX idx_lead_id (lead_id),
    
    -- Constraint para evitar doble reserva (máximo 3 citas por slot)
    INDEX idx_datetime_slot (appointment_date, appointment_time)
);

-- 3. TABLA DE COMENTARIOS/NOTAS INTERNAS
CREATE TABLE lead_comments (
    id INT PRIMARY KEY AUTO_INCREMENT,
    lead_id INT NOT NULL,
    
    -- Contenido del comentario
    comment TEXT NOT NULL,
    comment_type ENUM('nota', 'llamada', 'email', 'whatsapp', 'reunion', 'tarea', 'recordatorio') DEFAULT 'nota',
    
    -- Usuario que hizo el comentario
    created_by VARCHAR(100) NOT NULL,
    is_private BOOLEAN DEFAULT FALSE, -- Para comentarios internos
    
    -- Seguimiento
    is_important BOOLEAN DEFAULT FALSE,
    requires_followup BOOLEAN DEFAULT FALSE,
    followup_date DATE NULL,
    
    -- Timestamps
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    
    FOREIGN KEY (lead_id) REFERENCES leads(id) ON DELETE CASCADE,
    
    -- Índices
    INDEX idx_lead_id (lead_id),
    INDEX idx_created_at (created_at),
    INDEX idx_comment_type (comment_type),
    INDEX idx_followup_date (followup_date)
);

-- 4. TABLA DE ACTIVIDADES/HISTORIAL
CREATE TABLE lead_activities (
    id INT PRIMARY KEY AUTO_INCREMENT,
    lead_id INT NOT NULL,
    
    -- Tipo de actividad
    activity_type ENUM('form_submitted', 'email_sent', 'email_opened', 'phone_call', 'whatsapp_sent', 'appointment_scheduled', 'appointment_completed', 'status_changed', 'document_sent', 'payment_received') NOT NULL,
    
    -- Descripción de la actividad
    description TEXT NOT NULL,
    
    -- Metadatos adicionales (JSON para flexibilidad)
    metadata JSON,
    
    -- Usuario responsable
    performed_by VARCHAR(100),
    
    -- Timestamp
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    
    FOREIGN KEY (lead_id) REFERENCES leads(id) ON DELETE CASCADE,
    
    -- Índices
    INDEX idx_lead_id (lead_id),
    INDEX idx_activity_type (activity_type),
    INDEX idx_created_at (created_at)
);

-- 5. TABLA DE CONFIGURACIÓN DE HORARIOS DISPONIBLES
CREATE TABLE available_schedules (
    id INT PRIMARY KEY AUTO_INCREMENT,
    
    -- Configuración de fechas
    date DATE NOT NULL,
    day_of_week TINYINT NOT NULL, -- 1=Lunes, 7=Domingo
    
    -- Horarios disponibles
    time_slot TIME NOT NULL,
    max_appointments INT DEFAULT 3, -- Máximo 3 citas por horario
    current_appointments INT DEFAULT 0,
    
    -- Estado del horario
    is_available BOOLEAN DEFAULT TRUE,
    is_holiday BOOLEAN DEFAULT FALSE,
    
    -- Tipo de cita permitida
    appointment_types SET('inicial', 'seguimiento', 'cirugia', 'postoperatorio') DEFAULT 'inicial,seguimiento',
    
    -- Notas administrativas
    notes TEXT,
    
    -- Timestamps
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    
    -- Índices
    UNIQUE KEY unique_datetime (date, time_slot),
    INDEX idx_date (date),
    INDEX idx_availability (is_available, date),
    INDEX idx_day_of_week (day_of_week)
);

-- 6. TABLA DE USUARIOS/STAFF
CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    
    -- Información personal
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(150) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    full_name VARCHAR(150) NOT NULL,
    
    -- Rol y permisos
    role ENUM('admin', 'manager', 'consultant', 'doctor', 'assistant') NOT NULL,
    department ENUM('ventas', 'medico', 'administracion', 'marketing') DEFAULT 'ventas',
    
    -- Estado
    is_active BOOLEAN DEFAULT TRUE,
    can_assign_leads BOOLEAN DEFAULT FALSE,
    can_schedule_appointments BOOLEAN DEFAULT TRUE,
    
    -- Configuración personal
    timezone VARCHAR(50) DEFAULT 'America/Guayaquil',
    language VARCHAR(2) DEFAULT 'es',
    
    -- Timestamps
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    last_login_at TIMESTAMP NULL,
    
    -- Índices
    INDEX idx_email (email),
    INDEX idx_role (role),
    INDEX idx_active (is_active)
);

-- 7. TABLA DE CONFIGURACIÓN DEL SISTEMA
CREATE TABLE system_config (
    id INT PRIMARY KEY AUTO_INCREMENT,
    config_key VARCHAR(100) NOT NULL UNIQUE,
    config_value TEXT NOT NULL,
    description TEXT,
    config_type ENUM('string', 'number', 'boolean', 'json') DEFAULT 'string',
    
    -- Timestamps
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    
    INDEX idx_config_key (config_key)
);

-- 8. TABLA DE TEMPLATES DE EMAIL
CREATE TABLE email_templates (
    id INT PRIMARY KEY AUTO_INCREMENT,
    template_name VARCHAR(100) NOT NULL UNIQUE,
    subject VARCHAR(200) NOT NULL,
    body_html TEXT NOT NULL,
    body_text TEXT,
    
    -- Configuración
    language VARCHAR(2) DEFAULT 'es',
    template_type ENUM('confirmation', 'reminder', 'followup', 'welcome', 'proposal') NOT NULL,
    
    -- Variables disponibles para el template
    available_variables JSON,
    
    -- Estado
    is_active BOOLEAN DEFAULT TRUE,
    
    -- Timestamps
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    
    INDEX idx_template_type (template_type),
    INDEX idx_language (language)
);

-- ============================================
-- DATOS INICIALES
-- ============================================

-- Insertar horarios disponibles para los próximos 30 días
INSERT INTO available_schedules (date, day_of_week, time_slot, max_appointments)
SELECT 
    DATE_ADD(CURDATE(), INTERVAL seq.seq DAY) as date,
    DAYOFWEEK(DATE_ADD(CURDATE(), INTERVAL seq.seq DAY)) as day_of_week,
    time_slots.time_slot,
    3 as max_appointments
FROM (
    SELECT 0 as seq UNION SELECT 1 UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION 
    SELECT 5 UNION SELECT 6 UNION SELECT 7 UNION SELECT 8 UNION SELECT 9 UNION 
    SELECT 10 UNION SELECT 11 UNION SELECT 12 UNION SELECT 13 UNION SELECT 14 UNION 
    SELECT 15 UNION SELECT 16 UNION SELECT 17 UNION SELECT 18 UNION SELECT 19 UNION 
    SELECT 20 UNION SELECT 21 UNION SELECT 22 UNION SELECT 23 UNION SELECT 24 UNION 
    SELECT 25 UNION SELECT 26 UNION SELECT 27 UNION SELECT 28 UNION SELECT 29
) as seq
CROSS JOIN (
    SELECT '09:00:00' as time_slot UNION 
    SELECT '10:00:00' UNION 
    SELECT '11:00:00' UNION 
    SELECT '14:00:00' UNION 
    SELECT '15:00:00' UNION 
    SELECT '16:00:00' UNION 
    SELECT '17:00:00'
) as time_slots
WHERE DAYOFWEEK(DATE_ADD(CURDATE(), INTERVAL seq.seq DAY)) != 1; -- Excluir domingos

-- Usuario administrador inicial
INSERT INTO users (username, email, password_hash, full_name, role, can_assign_leads, can_schedule_appointments) 
VALUES ('admin', 'admin@kasaami.com', '$2y$10$92IxUuhcoNYjxM2AgEELEOu5Ao6rcORRrn0V2oANwjwEcvAb8XZKG', 'Administrador Sistema', 'admin', TRUE, TRUE);

-- Configuraciones iniciales del sistema
INSERT INTO system_config (config_key, config_value, description, config_type) VALUES
('company_name', 'Kasaami Care & Beauty', 'Nombre de la empresa', 'string'),
('company_email', 'info@kasaamigroup.com', 'Email principal de la empresa', 'string'),
('company_phone', '+593 96 305 2401', 'Teléfono principal', 'string'),
('whatsapp_number', '593963052401', 'Número de WhatsApp', 'string'),
('default_appointment_duration', '60', 'Duración por defecto de citas en minutos', 'number'),
('max_appointments_per_slot', '3', 'Máximo de citas por horario', 'number'),
('business_hours_start', '09:00', 'Hora de inicio de atención', 'string'),
('business_hours_end', '18:00', 'Hora de fin de atención', 'string'),
('timezone', 'America/Guayaquil', 'Zona horaria del negocio', 'string'),
('lead_auto_assignment', 'true', 'Asignación automática de leads', 'boolean');

-- Templates de email iniciales
INSERT INTO email_templates (template_name, subject, body_html, template_type, language) VALUES
('confirmation_es', 'Consulta Confirmada - Kasaami Care & Beauty', 
'<h2>¡Hola {{name}}!</h2><p>Tu consulta ha sido confirmada para el <strong>{{appointment_date}}</strong> a las <strong>{{appointment_time}}</strong>.</p><p>Te contactaremos pronto para confirmar los detalles.</p><br><p>Saludos,<br>Equipo Kasaami Care & Beauty</p>', 
'confirmation', 'es'),

('reminder_24h_es', 'Recordatorio: Tu cita es mañana - Kasaami', 
'<h2>¡Hola {{name}}!</h2><p>Te recordamos que tienes una cita programada para mañana <strong>{{appointment_date}}</strong> a las <strong>{{appointment_time}}</strong>.</p><p>Link de la reunión: {{meeting_link}}</p>', 
'reminder', 'es');

-- ============================================
-- VISTAS ÚTILES PARA REPORTES
-- ============================================

-- Vista de leads con información de citas
CREATE VIEW leads_with_appointments AS
SELECT 
    l.*,
    a.appointment_date,
    a.appointment_time,
    a.status as appointment_status,
    a.meeting_link,
    COUNT(lc.id) as total_comments,
    MAX(la.created_at) as last_activity
FROM leads l
LEFT JOIN appointments a ON l.id = a.lead_id AND a.status != 'cancelada'
LEFT JOIN lead_comments lc ON l.id = lc.lead_id
LEFT JOIN lead_activities la ON l.id = la.lead_id
GROUP BY l.id, a.id;

-- Vista de disponibilidad de horarios
CREATE VIEW schedule_availability AS
SELECT 
    as_sched.date,
    as_sched.time_slot,
    as_sched.max_appointments,
    COUNT(a.id) as current_bookings,
    (as_sched.max_appointments - COUNT(a.id)) as available_slots,
    CASE 
        WHEN COUNT(a.id) >= as_sched.max_appointments THEN 'completo'
        WHEN COUNT(a.id) >= (as_sched.max_appointments * 0.7) THEN 'casi_lleno'
        ELSE 'disponible'
    END as availability_status
FROM available_schedules as_sched
LEFT JOIN appointments a ON as_sched.date = a.appointment_date 
    AND as_sched.time_slot = a.appointment_time 
    AND a.status NOT IN ('cancelada', 'no_asistio')
WHERE as_sched.is_available = TRUE 
    AND as_sched.date >= CURDATE()
GROUP BY as_sched.date, as_sched.time_slot, as_sched.max_appointments
ORDER BY as_sched.date, as_sched.time_slot;

-- ============================================
-- PROCEDIMIENTOS ALMACENADOS ÚTILES
-- ============================================

DELIMITER //

-- Procedimiento para calcular lead score
CREATE PROCEDURE CalculateLeadScore(IN lead_id INT)
BEGIN
    DECLARE score INT DEFAULT 0;
    DECLARE budget VARCHAR(20);
    DECLARE travel_type VARCHAR(20);
    DECLARE contact_pref VARCHAR(20);
    DECLARE procedures_length INT;
    
    -- Obtener datos del lead
    SELECT budget_range, travel_type, contact_preference, LENGTH(procedures_interest)
    INTO budget, travel_type, contact_pref, procedures_length
    FROM leads WHERE id = lead_id;
    
    -- Puntuación por presupuesto
    CASE budget
        WHEN '20000+' THEN SET score = score + 50;
        WHEN '16000-20000' THEN SET score = score + 40;
        WHEN '12000-16000' THEN SET score = score + 30;
        WHEN '8000-12000' THEN SET score = score + 20;
        ELSE SET score = score + 10;
    END CASE;
    
    -- Puntuación por tipo de viaje
    CASE travel_type
        WHEN 'grupo' THEN SET score = score + 20;
        WHEN 'familiar' THEN SET score = score + 15;
        WHEN 'amigo' THEN SET score = score + 10;
        ELSE SET score = score + 5;
    END CASE;
    
    -- Puntuación por preferencia de contacto
    IF contact_pref = 'whatsapp' THEN
        SET score = score + 10;
    END IF;
    
    -- Puntuación por detalle en procedimientos
    IF procedures_length > 100 THEN
        SET score = score + 15;
    END IF;
    
    -- Actualizar el score
    UPDATE leads SET lead_score = LEAST(score, 100) WHERE id = lead_id;
END //

-- Procedimiento para verificar disponibilidad
CREATE PROCEDURE CheckAvailability(IN check_date DATE, IN check_time TIME)
BEGIN
    SELECT 
        available_slots,
        availability_status,
        CASE 
            WHEN availability_status = 'disponible' THEN TRUE
            ELSE FALSE
        END as can_book
    FROM schedule_availability 
    WHERE date = check_date AND time_slot = check_time;
END //

DELIMITER ;

-- ============================================
-- TRIGGERS PARA AUTOMATIZACIÓN
-- ============================================

-- Trigger para calcular lead score automáticamente
DELIMITER //
CREATE TRIGGER calculate_lead_score_on_insert
AFTER INSERT ON leads
FOR EACH ROW
BEGIN
    CALL CalculateLeadScore(NEW.id);
END //

-- Trigger para actualizar contador de citas en available_schedules
CREATE TRIGGER update_appointment_count_on_insert
AFTER INSERT ON appointments
FOR EACH ROW
BEGIN
    UPDATE available_schedules 
    SET current_appointments = current_appointments + 1
    WHERE date = NEW.appointment_date AND time_slot = NEW.appointment_time;
END //

CREATE TRIGGER update_appointment_count_on_delete
AFTER DELETE ON appointments
FOR EACH ROW
BEGIN
    UPDATE available_schedules 
    SET current_appointments = GREATEST(current_appointments - 1, 0)
    WHERE date = OLD.appointment_date AND time_slot = OLD.appointment_time;
END //

DELIMITER ;

-- ============================================
-- ÍNDICES ADICIONALES PARA OPTIMIZACIÓN
-- ============================================

-- Índices compuestos para consultas comunes
CREATE INDEX idx_leads_status_score ON leads(status, lead_score DESC);
CREATE INDEX idx_leads_created_status ON leads(created_at DESC, status);
CREATE INDEX idx_appointments_date_status ON appointments(appointment_date, status);
CREATE INDEX idx_activities_lead_created ON lead_activities(lead_id, created_at DESC);

u734106719_root
u734106719_kasaamigroupbd
@Kasaamigroupbd2025.

https://auth-db1623.hstgr.io/index.php?route=/database/sql&db=u734106719_kasaamigroupbd

Usa esta función para conectarte a nuestro servidor MySQL desde tu computadora o desde algún otro servidor. Añade tu dirección IP que se conectará a nuestro servidor MySQL y elige el nombre de la base de datos de la lista a la que deseas conectarte.

El nombre de host de nuestro servidor MySQL es: srv1623.hstgr.io o puede usar esta IP como tu nombre de host: 82.197.82.72





info@kasaamigroup.com

Protocolo
Host
Puerto
Encriptación

Incoming server (IMAP)

imap.hostinger.com

993

SSL

Incoming server (POP)

pop.hostinger.com

995

SSL

Outgoing server (SMTP)

smtp.hostinger.com

465

SSL
infoKasaami2025.


Usuario	admin
Contraseña	kasaami2025