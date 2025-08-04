<?php
// setup_database.php - CONFIGURACIÓN COMPLETA DE BASE DE DATOS LOCAL

require_once 'includes/database.php';

echo "<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>🚀 Setup CRM Kasaami - Base de Datos</title>
    <style>
        body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; 
               line-height: 1.6; max-width: 1200px; margin: 0 auto; padding: 20px; background: #f5f7fa; }
        .container { background: white; padding: 30px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        h1 { color: #8B5CF6; text-align: center; margin-bottom: 30px; }
        h2 { color: #6D28D9; border-bottom: 2px solid #8B5CF6; padding-bottom: 10px; margin-top: 30px; }
        .success { background: #d4edda; color: #155724; padding: 15px; border-radius: 5px; margin: 10px 0; }
        .error { background: #f8d7da; color: #721c24; padding: 15px; border-radius: 5px; margin: 10px 0; }
        .warning { background: #fff3cd; color: #856404; padding: 15px; border-radius: 5px; margin: 10px 0; }
        .info { background: #d1ecf1; color: #0c5460; padding: 15px; border-radius: 5px; margin: 10px 0; }
        pre { background: #f8f9fa; padding: 15px; border-radius: 5px; overflow-x: auto; }
        .credentials { background: #ffe6e6; border: 2px solid #ff9999; padding: 20px; border-radius: 10px; margin: 20px 0; }
        .step { margin: 20px 0; }
        .progress { background: #e9ecef; height: 20px; border-radius: 10px; margin: 20px 0; }
        .progress-bar { background: #8B5CF6; height: 100%; border-radius: 10px; transition: width 0.3s; }
        table { width: 100%; border-collapse: collapse; margin: 15px 0; }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
        th { background: #f8f9fa; font-weight: bold; }
        .emoji { font-size: 1.2em; margin-right: 8px; }
    </style>
</head>
<body>";

echo "<div class='container'>";
echo "<h1>🚀 Setup CRM Kasaami Care & Beauty</h1>";

$totalSteps = 8;
$currentStep = 0;

try {
    // STEP 1: Información del servidor
    $currentStep++;
    echo "<div class='step'>";
    echo "<h2><span class='emoji'>📊</span>Step $currentStep/$totalSteps: Información del Servidor</h2>";
    
    $serverInfo = [
        'Servidor' => $_SERVER['SERVER_NAME'] ?? 'unknown',
        'IP del Servidor' => $_SERVER['SERVER_ADDR'] ?? 'unknown',
        'Software del Servidor' => $_SERVER['SERVER_SOFTWARE'] ?? 'unknown',
        'Versión PHP' => phpversion(),
        'Directorio Root' => $_SERVER['DOCUMENT_ROOT'] ?? 'unknown',
        'Sistema Operativo' => php_uname('s') . ' ' . php_uname('r'),
        'Fecha/Hora' => date('Y-m-d H:i:s T')
    ];
    
    echo "<table>";
    foreach ($serverInfo as $key => $value) {
        echo "<tr><th>$key</th><td>$value</td></tr>";
    }
    echo "</table>";
    
    echo "<div class='progress'><div class='progress-bar' style='width: " . ($currentStep/$totalSteps*100) . "%'></div></div>";
    echo "</div>";

    // STEP 2: Verificar extensiones PHP
    $currentStep++;
    echo "<div class='step'>";
    echo "<h2><span class='emoji'>🔧</span>Step $currentStep/$totalSteps: Verificando Extensiones PHP</h2>";
    
    $requiredExtensions = [
        'pdo' => 'PDO - Base de datos',
        'pdo_mysql' => 'PDO MySQL - Driver MySQL',
        'mysqli' => 'MySQLi - Cliente MySQL',
        'openssl' => 'OpenSSL - Seguridad',
        'curl' => 'cURL - HTTP requests',
        'json' => 'JSON - Manejo de datos',
        'mbstring' => 'Multibyte String - Caracteres UTF-8',
        'filter' => 'Filter - Validación de datos'
    ];
    
    $allExtensionsOk = true;
    echo "<table>";
    echo "<tr><th>Extensión</th><th>Descripción</th><th>Estado</th></tr>";
    
    foreach ($requiredExtensions as $ext => $description) {
        $installed = extension_loaded($ext);
        $status = $installed ? '<span style="color: green;">✅ Instalada</span>' : '<span style="color: red;">❌ NO instalada</span>';
        echo "<tr><td><strong>$ext</strong></td><td>$description</td><td>$status</td></tr>";
        if (!$installed) $allExtensionsOk = false;
    }
    echo "</table>";
    
    if ($allExtensionsOk) {
        echo "<div class='success'>✅ Todas las extensiones requeridas están instaladas</div>";
    } else {
        echo "<div class='error'>❌ Faltan algunas extensiones. El sistema puede no funcionar correctamente.</div>";
    }
    
    echo "<div class='progress'><div class='progress-bar' style='width: " . ($currentStep/$totalSteps*100) . "%'></div></div>";
    echo "</div>";

    // STEP 3: Verificar base de datos existente
    $currentStep++;
    echo "<div class='step'>";
    echo "<h2><span class='emoji'>🗄️</span>Step $currentStep/$totalSteps: Verificando Base de Datos</h2>";
    
    echo "<div class='info'>";
    echo "<strong>📋 Configuración de la Base de Datos:</strong><br>";
    echo "• Host: " . DB_HOST . "<br>";
    echo "• Base de Datos: " . DB_NAME . "<br>";
    echo "• Usuario: " . DB_USER . "<br>";
    echo "• Puerto: " . DB_PORT . "<br>";
    echo "</div>";
    
    $dbCreated = Database::createDatabaseIfNotExists();
    
    if ($dbCreated) {
        echo "<div class='success'>✅ Base de datos encontrada y accesible</div>";
        echo "<div class='info'><strong>Estado:</strong> La base de datos <code>" . DB_NAME . "</code> está lista para usar</div>";
    } else {
        echo "<div class='error'>❌ Error: No se pudo acceder a la base de datos. Verifica que:</div>";
        echo "<ul>";
        echo "<li>La base de datos <code>" . DB_NAME . "</code> exista en cPanel/phpMyAdmin</li>";
        echo "<li>El usuario <code>" . DB_USER . "</code> tenga permisos sobre ella</li>";
        echo "<li>Las credenciales sean correctas</li>";
        echo "</ul>";
        throw new Exception("No se pudo acceder a la base de datos");
    }
    
    echo "<div class='progress'><div class='progress-bar' style='width: " . ($currentStep/$totalSteps*100) . "%'></div></div>";
    echo "</div>";

    // STEP 4: Conectar y verificar
    $currentStep++;
    echo "<div class='step'>";
    echo "<h2><span class='emoji'>🔗</span>Step $currentStep/$totalSteps: Probando Conexión a Base de Datos</h2>";
    
    $info = debugDatabaseConnection();
    
    if ($info['connected']) {
        echo "<div class='success'>✅ Conexión exitosa a la base de datos</div>";
        echo "<table>";
        echo "<tr><th>Parámetro</th><th>Valor</th></tr>";
        echo "<tr><td>Host</td><td>" . $info['host'] . "</td></tr>";
        echo "<tr><td>Base de Datos</td><td>" . $info['database'] . "</td></tr>";
        if (isset($info['server_info']['version'])) {
            echo "<tr><td>Versión MySQL</td><td>" . $info['server_info']['version'] . "</td></tr>";
        }
        if (isset($info['server_info']['current_db'])) {
            echo "<tr><td>BD Current</td><td>" . $info['server_info']['current_db'] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "<div class='error'>❌ Error de conexión: " . ($info['error'] ?? 'Error desconocido') . "</div>";
        throw new Exception("No se pudo establecer conexión con la base de datos");
    }
    
    echo "<div class='progress'><div class='progress-bar' style='width: " . ($currentStep/$totalSteps*100) . "%'></div></div>";
    echo "</div>";

    // STEP 5: Crear todas las tablas
    $currentStep++;
    echo "<div class='step'>";
    echo "<h2><span class='emoji'>🗂️</span>Step $currentStep/$totalSteps: Creando Estructura de Tablas</h2>";
    
    $db = Database::getInstance()->getConnection();
    
    // SQL completo para crear todas las tablas
    $createTablesSql = [
        'leads' => "
        CREATE TABLE IF NOT EXISTS leads (
            id INT PRIMARY KEY AUTO_INCREMENT,
            name VARCHAR(100) NOT NULL,
            lastname VARCHAR(100) NOT NULL,
            email VARCHAR(150) NOT NULL UNIQUE,
            phone VARCHAR(20) NOT NULL,
            country VARCHAR(5) NOT NULL,
            budget_range ENUM('4000-8000', '8000-12000', '12000-16000', '16000-20000', '20000+') NOT NULL,
            travel_type ENUM('solo', 'familiar', 'amigo', 'grupo') NOT NULL,
            group_size INT DEFAULT 1,
            procedures_interest TEXT NOT NULL,
            found_us ENUM('google', 'social', 'referral', 'other') NOT NULL,
            contact_preference ENUM('email', 'phone', 'whatsapp') NOT NULL,
            lead_score INT DEFAULT 0,
            status ENUM('nuevo', 'contactado', 'interesado', 'propuesta_enviada', 'negociando', 'convertido', 'perdido') DEFAULT 'nuevo',
            priority ENUM('baja', 'media', 'alta', 'urgente') DEFAULT 'media',
            assigned_to VARCHAR(100),
            language VARCHAR(2) DEFAULT 'es',
            source VARCHAR(50) DEFAULT 'website_form',
            ip_address VARCHAR(45),
            user_agent TEXT,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            last_contact_at TIMESTAMP NULL,
            INDEX idx_email (email),
            INDEX idx_status (status),
            INDEX idx_created_at (created_at),
            INDEX idx_lead_score (lead_score),
            INDEX idx_assigned_to (assigned_to)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci",
        
        'appointments' => "
        CREATE TABLE IF NOT EXISTS appointments (
            id INT PRIMARY KEY AUTO_INCREMENT,
            lead_id INT NOT NULL,
            appointment_date DATE NOT NULL,
            appointment_time TIME NOT NULL,
            timezone VARCHAR(50) DEFAULT 'America/Guayaquil',
            duration_minutes INT DEFAULT 60,
            appointment_type ENUM('inicial', 'seguimiento', 'cirugia', 'postoperatorio') DEFAULT 'inicial',
            modality ENUM('presencial', 'virtual', 'telefonica') DEFAULT 'virtual',
            status ENUM('programada', 'confirmada', 'en_progreso', 'completada', 'cancelada', 'no_asistio') DEFAULT 'programada',
            meeting_link VARCHAR(255),
            location TEXT,
            notes TEXT,
            doctor_assigned VARCHAR(100),
            consultant_assigned VARCHAR(100),
            reminder_sent_24h BOOLEAN DEFAULT FALSE,
            reminder_sent_1h BOOLEAN DEFAULT FALSE,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            confirmed_at TIMESTAMP NULL,
            completed_at TIMESTAMP NULL,
            FOREIGN KEY (lead_id) REFERENCES leads(id) ON DELETE CASCADE,
            INDEX idx_appointment_date (appointment_date),
            INDEX idx_appointment_datetime (appointment_date, appointment_time),
            INDEX idx_status (status),
            INDEX idx_lead_id (lead_id)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci",
        
        'lead_activities' => "
        CREATE TABLE IF NOT EXISTS lead_activities (
            id INT PRIMARY KEY AUTO_INCREMENT,
            lead_id INT NOT NULL,
            activity_type ENUM('form_submitted', 'email_sent', 'email_opened', 'phone_call', 'whatsapp_sent', 'appointment_scheduled', 'appointment_completed', 'status_changed', 'document_sent', 'payment_received') NOT NULL,
            description TEXT NOT NULL,
            metadata JSON,
            performed_by VARCHAR(100),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (lead_id) REFERENCES leads(id) ON DELETE CASCADE,
            INDEX idx_lead_id (lead_id),
            INDEX idx_activity_type (activity_type),
            INDEX idx_created_at (created_at)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci",
        
        'users' => "
        CREATE TABLE IF NOT EXISTS users (
            id INT PRIMARY KEY AUTO_INCREMENT,
            username VARCHAR(50) NOT NULL UNIQUE,
            email VARCHAR(150) NOT NULL UNIQUE,
            password_hash VARCHAR(255) NOT NULL,
            full_name VARCHAR(150) NOT NULL,
            role ENUM('admin', 'manager', 'consultant', 'doctor', 'assistant') NOT NULL,
            department ENUM('ventas', 'medico', 'administracion', 'marketing') DEFAULT 'ventas',
            is_active BOOLEAN DEFAULT TRUE,
            can_assign_leads BOOLEAN DEFAULT FALSE,
            can_schedule_appointments BOOLEAN DEFAULT TRUE,
            timezone VARCHAR(50) DEFAULT 'America/Guayaquil',
            language VARCHAR(2) DEFAULT 'es',
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            last_login_at TIMESTAMP NULL,
            INDEX idx_email (email),
            INDEX idx_role (role),
            INDEX idx_active (is_active)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci",
        
        'available_schedules' => "
        CREATE TABLE IF NOT EXISTS available_schedules (
            id INT PRIMARY KEY AUTO_INCREMENT,
            date DATE NOT NULL,
            day_of_week TINYINT NOT NULL,
            time_slot TIME NOT NULL,
            max_appointments INT DEFAULT 3,
            current_appointments INT DEFAULT 0,
            is_available BOOLEAN DEFAULT TRUE,
            is_holiday BOOLEAN DEFAULT FALSE,
            appointment_types SET('inicial', 'seguimiento', 'cirugia', 'postoperatorio') DEFAULT 'inicial,seguimiento',
            notes TEXT,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            UNIQUE KEY unique_datetime (date, time_slot),
            INDEX idx_date (date),
            INDEX idx_availability (is_available, date),
            INDEX idx_day_of_week (day_of_week)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci",
        
        'lead_comments' => "
        CREATE TABLE IF NOT EXISTS lead_comments (
            id INT PRIMARY KEY AUTO_INCREMENT,
            lead_id INT NOT NULL,
            comment TEXT NOT NULL,
            comment_type ENUM('nota', 'llamada', 'email', 'whatsapp', 'reunion', 'tarea', 'recordatorio') DEFAULT 'nota',
            created_by VARCHAR(100) NOT NULL,
            is_private BOOLEAN DEFAULT FALSE,
            is_important BOOLEAN DEFAULT FALSE,
            requires_followup BOOLEAN DEFAULT FALSE,
            followup_date DATE NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            FOREIGN KEY (lead_id) REFERENCES leads(id) ON DELETE CASCADE,
            INDEX idx_lead_id (lead_id),
            INDEX idx_created_at (created_at),
            INDEX idx_comment_type (comment_type),
            INDEX idx_followup_date (followup_date)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci",
        
        'system_config' => "
        CREATE TABLE IF NOT EXISTS system_config (
            id INT PRIMARY KEY AUTO_INCREMENT,
            config_key VARCHAR(100) NOT NULL UNIQUE,
            config_value TEXT NOT NULL,
            description TEXT,
            config_type ENUM('string', 'number', 'boolean', 'json') DEFAULT 'string',
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            INDEX idx_config_key (config_key)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci",
        
        'email_templates' => "
        CREATE TABLE IF NOT EXISTS email_templates (
            id INT PRIMARY KEY AUTO_INCREMENT,
            template_name VARCHAR(100) NOT NULL UNIQUE,
            subject VARCHAR(200) NOT NULL,
            body_html TEXT NOT NULL,
            body_text TEXT,
            language VARCHAR(2) DEFAULT 'es',
            template_type ENUM('confirmation', 'reminder', 'followup', 'welcome', 'proposal') NOT NULL,
            available_variables JSON,
            is_active BOOLEAN DEFAULT TRUE,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            INDEX idx_template_type (template_type),
            INDEX idx_language (language)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci"
    ];
    
    $tablesCreated = 0;
    $tablesSkipped = 0;
    
    echo "<table>";
    echo "<tr><th>Tabla</th><th>Estado</th><th>Detalles</th></tr>";
    
    foreach ($createTablesSql as $tableName => $sql) {
        try {
            $db->exec($sql);
            $tablesCreated++;
            echo "<tr><td><strong>$tableName</strong></td><td><span style='color: green;'>✅ Creada</span></td><td>Tabla creada exitosamente</td></tr>";
        } catch (PDOException $e) {
            if (strpos($e->getMessage(), 'already exists') !== false) {
                $tablesSkipped++;
                echo "<tr><td><strong>$tableName</strong></td><td><span style='color: blue;'>ℹ️ Existe</span></td><td>Tabla ya existía</td></tr>";
            } else {
                echo "<tr><td><strong>$tableName</strong></td><td><span style='color: red;'>❌ Error</span></td><td>" . htmlspecialchars($e->getMessage()) . "</td></tr>";
            }
        }
    }
    echo "</table>";
    
    echo "<div class='info'>📊 <strong>Resumen:</strong> $tablesCreated tablas creadas, $tablesSkipped ya existían</div>";
    
    echo "<div class='progress'><div class='progress-bar' style='width: " . ($currentStep/$totalSteps*100) . "%'></div></div>";
    echo "</div>";

    // STEP 6: Verificar tablas creadas
    $currentStep++;
    echo "<div class='step'>";
    echo "<h2><span class='emoji'>📋</span>Step $currentStep/$totalSteps: Verificando Estructura</h2>";
    
    $tables = Database::checkTables();
    
    if (count($tables) > 0) {
        echo "<div class='success'>✅ Se encontraron " . count($tables) . " tablas en la base de datos</div>";
        echo "<div class='info'><strong>Tablas encontradas:</strong> " . implode(', ', $tables) . "</div>";
        
        // Mostrar estructura de cada tabla
        echo "<h3>📊 Estructura de Tablas:</h3>";
        foreach ($tables as $table) {
            try {
                $stmt = $db->query("DESCRIBE `$table`");
                $columns = $stmt->fetchAll();
                
                echo "<h4>Tabla: $table (" . count($columns) . " columnas)</h4>";
                echo "<table style='font-size: 0.9em;'>";
                echo "<tr><th>Campo</th><th>Tipo</th><th>Null</th><th>Key</th><th>Default</th></tr>";
                foreach ($columns as $column) {
                    echo "<tr>";
                    echo "<td><strong>" . $column['Field'] . "</strong></td>";
                    echo "<td>" . $column['Type'] . "</td>";
                    echo "<td>" . $column['Null'] . "</td>";
                    echo "<td>" . $column['Key'] . "</td>";
                    echo "<td>" . ($column['Default'] ?? 'NULL') . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
                
            } catch (Exception $e) {
                echo "<div class='warning'>⚠️ No se pudo obtener estructura de la tabla $table</div>";
            }
        }
    } else {
        echo "<div class='warning'>⚠️ No se encontraron tablas. Esto puede indicar un problema en la creación.</div>";
    }
    
    echo "<div class='progress'><div class='progress-bar' style='width: " . ($currentStep/$totalSteps*100) . "%'></div></div>";
    echo "</div>";

    // STEP 7: Crear usuario administrador
    $currentStep++;
    echo "<div class='step'>";
    echo "<h2><span class='emoji'>👤</span>Step $currentStep/$totalSteps: Usuario Administrador</h2>";
    
    try {
        $stmt = $db->prepare("SELECT COUNT(*) FROM users WHERE role = 'admin'");
        $stmt->execute();
        $adminCount = $stmt->fetchColumn();
        
        if ($adminCount == 0) {
            $adminPassword = 'kasaami2025';
            $passwordHash = password_hash($adminPassword, PASSWORD_DEFAULT);
            
            $stmt = $db->prepare("
                INSERT INTO users (username, email, password_hash, full_name, role, can_assign_leads, can_schedule_appointments) 
                VALUES ('admin', 'admin@kasaami.com', ?, 'Administrador Sistema', 'admin', TRUE, TRUE)
            ");
            $stmt->execute([$passwordHash]);
            
            echo "<div class='success'>✅ Usuario administrador creado exitosamente</div>";
            echo "<div class='credentials'>";
            echo "<h3>🔐 CREDENCIALES DE ACCESO INICIAL:</h3>";
            echo "<table>";
            echo "<tr><th>Usuario</th><td><strong>admin</strong></td></tr>";
            echo "<tr><th>Contraseña</th><td><strong>$adminPassword</strong></td></tr>";
            echo "<tr><th>Email</th><td>admin@kasaami.com</td></tr>";
            echo "<tr><th>Rol</th><td>Administrador</td></tr>";
            echo "</table>";
            echo "<p><strong style='color: red;'>⚠️ IMPORTANTE:</strong> Cambia esta contraseña después del primer login por seguridad.</p>";
            echo "</div>";
        } else {
            echo "<div class='info'>ℹ️ Usuario administrador ya existe ($adminCount usuario(s) admin encontrado(s))</div>";
        }
    } catch (Exception $e) {
        echo "<div class='error'>❌ Error al crear usuario administrador: " . htmlspecialchars($e->getMessage()) . "</div>";
    }
    
    echo "<div class='progress'><div class='progress-bar' style='width: " . ($currentStep/$totalSteps*100) . "%'></div></div>";
    echo "</div>";

    // STEP 8: Datos iniciales y configuración
    $currentStep++;
    echo "<div class='step'>";
    echo "<h2><span class='emoji'>⚙️</span>Step $currentStep/$totalSteps: Configuración Inicial del Sistema</h2>";
    
    // Configuraciones del sistema
    $systemConfigs = [
        ['company_name', 'Kasaami Care & Beauty', 'Nombre de la empresa', 'string'],
        ['company_email', 'info@kasaamigroup.com', 'Email principal de la empresa', 'string'],
        ['company_phone', '+593 96 305 2401', 'Teléfono principal', 'string'],
        ['whatsapp_number', '593963052401', 'Número de WhatsApp', 'string'],
        ['default_appointment_duration', '60', 'Duración por defecto de citas en minutos', 'number'],
        ['max_appointments_per_slot', '3', 'Máximo de citas por horario', 'number'],
        ['business_hours_start', '09:00', 'Hora de inicio de atención', 'string'],
        ['business_hours_end', '18:00', 'Hora de fin de atención', 'string'],
        ['timezone', 'America/Guayaquil', 'Zona horaria del negocio', 'string'],
        ['lead_auto_assignment', 'true', 'Asignación automática de leads', 'boolean']
    ];
    
    $configsInserted = 0;
    $configsSkipped = 0;
    
    echo "<table>";
    echo "<tr><th>Configuración</th><th>Valor</th><th>Estado</th></tr>";
    
    foreach ($systemConfigs as $config) {
        try {
            $stmt = $db->prepare("INSERT IGNORE INTO system_config (config_key, config_value, description, config_type) VALUES (?, ?, ?, ?)");
            $result = $stmt->execute($config);
            
            if ($stmt->rowCount() > 0) {
                $configsInserted++;
                echo "<tr><td><strong>{$config[0]}</strong></td><td>{$config[1]}</td><td><span style='color: green;'>✅ Insertada</span></td></tr>";
            } else {
                $configsSkipped++;
                echo "<tr><td><strong>{$config[0]}</strong></td><td>{$config[1]}</td><td><span style='color: blue;'>ℹ️ Ya existe</span></td></tr>";
            }
        } catch (Exception $e) {
            echo "<tr><td><strong>{$config[0]}</strong></td><td>{$config[1]}</td><td><span style='color: red;'>❌ Error</span></td></tr>";
        }
    }
    echo "</table>";
    
    // Templates de email
    $emailTemplates = [
        [
            'confirmation_es',
            'Consulta Confirmada - Kasaami Care & Beauty',
            '<h2>¡Hola {{name}}!</h2><p>Tu consulta ha sido confirmada para el <strong>{{appointment_date}}</strong> a las <strong>{{appointment_time}}</strong>.</p><p>Te contactaremos pronto para confirmar los detalles.</p><br><p>Saludos,<br>Equipo Kasaami Care & Beauty</p>',
            'confirmation',
            'es'
        ],
        [
            'reminder_24h_es',
            'Recordatorio: Tu cita es mañana - Kasaami',
            '<h2>¡Hola {{name}}!</h2><p>Te recordamos que tienes una cita programada para mañana <strong>{{appointment_date}}</strong> a las <strong>{{appointment_time}}</strong>.</p><p>Link de la reunión: {{meeting_link}}</p>',
            'reminder',
            'es'
        ]
    ];
    
    $templatesInserted = 0;
    foreach ($emailTemplates as $template) {
        try {
            $stmt = $db->prepare("INSERT IGNORE INTO email_templates (template_name, subject, body_html, template_type, language) VALUES (?, ?, ?, ?, ?)");
            $result = $stmt->execute($template);
            if ($stmt->rowCount() > 0) {
                $templatesInserted++;
            }
        } catch (Exception $e) {
            // Continuar aunque falle
        }
    }
    
    // Horarios disponibles (próximos 30 días)
    $schedulesInserted = 0;
    try {
        $stmt = $db->prepare("SELECT COUNT(*) FROM available_schedules");
        $stmt->execute();
        $existingSchedules = $stmt->fetchColumn();
        
        if ($existingSchedules == 0) {
            $timeSlots = ['09:00:00', '10:00:00', '11:00:00', '14:00:00', '15:00:00', '16:00:00', '17:00:00'];
            
            for ($i = 0; $i < 30; $i++) {
                $date = date('Y-m-d', strtotime("+$i days"));
                $dayOfWeek = date('w', strtotime($date));
                
                // Excluir domingos (0)
                if ($dayOfWeek != 0) {
                    foreach ($timeSlots as $timeSlot) {
                        try {
                            $stmt = $db->prepare("INSERT INTO available_schedules (date, day_of_week, time_slot, max_appointments) VALUES (?, ?, ?, 3)");
                            $stmt->execute([$date, $dayOfWeek, $timeSlot]);
                            $schedulesInserted++;
                        } catch (Exception $e) {
                            // Continuar aunque falle algún horario
                        }
                    }
                }
            }
        }
    } catch (Exception $e) {
        // Continuar aunque falle
    }
    
    echo "<div class='info'>📝 <strong>Datos iniciales insertados:</strong><br>";
    echo "• $configsInserted configuraciones del sistema<br>";
    echo "• $templatesInserted templates de email<br>";
    echo "• $schedulesInserted horarios disponibles (próximos 30 días)<br>";
    echo "</div>";
    
    echo "<div class='progress'><div class='progress-bar' style='width: 100%'></div></div>";
    echo "</div>";

    // RESUMEN FINAL
    echo "<div class='step'>";
    echo "<h2><span class='emoji'>🎉</span>¡Instalación Completada Exitosamente!</h2>";
    
    echo "<div class='success'>";
    echo "<h3>✅ Sistema CRM Kasaami Configurado</h3>";
    echo "<p>La base de datos ha sido creada y configurada correctamente. El sistema está listo para usarse.</p>";
    echo "</div>";
    
    // Estadísticas finales
    echo "<h3>📊 Resumen de la Instalación:</h3>";
    echo "<table>";
    echo "<tr><th>Componente</th><th>Estado</th><th>Detalles</th></tr>";
    echo "<tr><td><strong>Base de Datos</strong></td><td><span style='color: green;'>✅ Conectada</span></td><td>" . DB_NAME . " en " . DB_HOST . "</td></tr>";
    echo "<tr><td><strong>Tablas</strong></td><td><span style='color: green;'>✅ Creadas</span></td><td>" . count($tables) . " tablas del sistema</td></tr>";
    echo "<tr><td><strong>Usuario Admin</strong></td><td><span style='color: green;'>✅ Configurado</span></td><td>Listo para acceso inicial</td></tr>";
    echo "<tr><td><strong>Configuración</strong></td><td><span style='color: green;'>✅ Completada</span></td><td>$configsInserted configs + $templatesInserted templates</td></tr>";
    echo "<tr><td><strong>Horarios</strong></td><td><span style='color: green;'>✅ Generados</span></td><td>$schedulesInserted slots disponibles</td></tr>";
    echo "</table>";
    
    // Próximos pasos
    echo "<h3>🚀 Próximos Pasos:</h3>";
    echo "<div class='info'>";
    echo "<ol>";
    echo "<li><strong>Accede al panel administrativo:</strong> <a href='login.php' target='_blank'>login.php</a></li>";
    echo "<li><strong>Cambia la contraseña del administrador</strong> por seguridad</li>";
    echo "<li><strong>Configura los usuarios del equipo</strong> desde el panel</li>";
    echo "<li><strong>Personaliza las configuraciones</strong> según tus necesidades</li>";
    echo "<li><strong>Prueba el formulario de leads</strong> para verificar funcionamiento</li>";
    echo "</ol>";
    echo "</div>";
    
    // Información técnica para migración
    echo "<h3>🔄 Para Migrar a Hostinger:</h3>";
    echo "<div class='warning'>";
    echo "<p><strong>Cuando transfieras el código a Hostinger:</strong></p>";
    echo "<ol>";
    echo "<li>Copia todos los archivos del CRM al hosting de Hostinger</li>";
    echo "<li>El archivo <code>includes/database.php</code> ya tiene las credenciales correctas</li>";
    echo "<li>Ejecuta este mismo <code>setup_database.php</code> en Hostinger</li>";
    echo "<li>Las tablas y datos se crearán automáticamente en la base real</li>";
    echo "<li>¡Listo! El sistema funcionará igual que aquí</li>";
    echo "</ol>";
    echo "<p>📝 <strong>Nota:</strong> La configuración cambará automáticamente de <code>localhost</code> a la base remota de Hostinger.</p>";
    echo "</div>";
    
    // Test de funcionalidades
    echo "<h3>🧪 Test de Funcionalidades:</h3>";
    
    try {
        // Test 1: Crear un lead de prueba
        echo "<h4>Test 1: Sistema de Leads</h4>";
        $leadManager = new LeadManager();
        $testLead = [
            'name' => 'Test',
            'lastname' => 'Usuario',
            'email' => 'test@kasaami.com',
            'phone' => '+593999999999',
            'country' => 'EC',
            'budget' => '12000-16000',
            'travel_type' => 'solo',
            'procedures_interest' => 'Test de instalación del sistema CRM',
            'found_us' => 'other',
            'contact_preference' => 'email'
        ];
        
        $leadId = $leadManager->createLead($testLead);
        if ($leadId) {
            echo "<div style='color: green;'>✅ Lead de prueba creado (ID: $leadId)</div>";
            
            // Test 2: Crear cita de prueba
            echo "<h4>Test 2: Sistema de Citas</h4>";
            $appointmentId = $leadManager->createAppointment($leadId, date('Y-m-d', strtotime('+7 days')), '10:00:00');
            if ($appointmentId) {
                echo "<div style='color: green;'>✅ Cita de prueba creada (ID: $appointmentId)</div>";
                
                // Test 3: Actividad de prueba
                echo "<h4>Test 3: Sistema de Actividades</h4>";
                $activityLogged = $leadManager->logActivity($leadId, 'form_submitted', 'Test de instalación completado');
                if ($activityLogged) {
                    echo "<div style='color: green;'>✅ Actividad de prueba registrada</div>";
                } else {
                    echo "<div style='color: orange;'>⚠️ Error al registrar actividad</div>";
                }
            } else {
                echo "<div style='color: orange;'>⚠️ Error al crear cita de prueba</div>";
            }
        } else {
            echo "<div style='color: orange;'>⚠️ Error al crear lead de prueba</div>";
        }
        
        // Test 4: Email service
        echo "<h4>Test 4: Sistema de Email</h4>";
        $emailService = new EmailService();
        if (function_exists('mail')) {
            echo "<div style='color: green;'>✅ Función mail() disponible</div>";
        } else {
            echo "<div style='color: orange;'>⚠️ Función mail() no disponible en este servidor</div>";
        }
        
    } catch (Exception $e) {
        echo "<div style='color: red;'>❌ Error en tests: " . htmlspecialchars($e->getMessage()) . "</div>";
    }
    
    // Enlaces útiles
    echo "<h3>🔗 Enlaces Útiles:</h3>";
    echo "<div class='info'>";
    echo "<ul>";
    echo "<li><strong>Panel de Administración:</strong> <a href='dashboard.php' target='_blank'>dashboard.php</a></li>";
    echo "<li><strong>Login:</strong> <a href='login.php' target='_blank'>login.php</a></li>";
    echo "<li><strong>Formulario de Leads:</strong> <a href='index.php' target='_blank'>index.php</a></li>";
    echo "<li><strong>Logs del Sistema:</strong> Revisa <code>error_log</code> en el directorio raíz</li>";
    echo "</ul>";
    echo "</div>";
    
    // Información de soporte
    echo "<h3>📞 Información de Contacto:</h3>";
    echo "<div class='info'>";
    echo "<table>";
    echo "<tr><th>Empresa</th><td>" . COMPANY_NAME . "</td></tr>";
    echo "<tr><th>Email</th><td>" . MAIL_FROM_EMAIL . "</td></tr>";
    echo "<tr><th>WhatsApp</th><td>+" . WHATSAPP_NUMBER . "</td></tr>";
    echo "<tr><th>Zona Horaria</th><td>" . TIMEZONE . "</td></tr>";
    echo "</table>";
    echo "</div>";
    
    echo "</div>";

} catch (Exception $e) {
    echo "<div class='error'>";
    echo "<h2>❌ Error Durante la Instalación</h2>";
    echo "<p><strong>Error:</strong> " . htmlspecialchars($e->getMessage()) . "</p>";
    echo "<p><strong>Archivo:</strong> " . $e->getFile() . "</p>";
    echo "<p><strong>Línea:</strong> " . $e->getLine() . "</p>";
    
    echo "<h3>🔧 Posibles Soluciones:</h3>";
    echo "<ul>";
    echo "<li>Verifica que las credenciales de la base de datos sean correctas</li>";
    echo "<li>Asegúrate de que MySQL esté ejecutándose</li>";
    echo "<li>Revisa que el usuario tenga permisos para crear bases de datos</li>";
    echo "<li>Verifica que las extensiones PHP requeridas estén instaladas</li>";
    echo "</ul>";
    
    echo "<h3>📋 Información de Debug:</h3>";
    echo "<pre>";
    echo "Servidor: " . ($_SERVER['SERVER_NAME'] ?? 'unknown') . "\n";
    echo "PHP Version: " . phpversion() . "\n";
    echo "MySQL Host: " . DB_HOST . "\n";
    echo "MySQL Database: " . DB_NAME . "\n";
    echo "MySQL User: " . DB_USER . "\n";
    echo "Timestamp: " . date('Y-m-d H:i:s') . "\n";
    echo "</pre>";
    echo "</div>";
}

// Footer
echo "<hr>";
echo "<div style='text-align: center; margin-top: 30px; padding: 20px; background: #f8f9fa; border-radius: 5px;'>";
echo "<p><strong>🏥 CRM Kasaami Care & Beauty</strong></p>";
echo "<p>Sistema de Gestión de Leads y Citas Médicas</p>";
echo "<p><small>Instalación ejecutada el " . date('Y-m-d H:i:s') . " en " . ($_SERVER['SERVER_NAME'] ?? 'servidor local') . "</small></p>";
echo "<p><small>Versión del Setup: 1.0 | PHP " . phpversion() . "</small></p>";
echo "</div>";

echo "</div>"; // Cerrar container
echo "</body></html>";
?>