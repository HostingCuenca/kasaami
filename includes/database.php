<?php
// includes/database.php - CONFIGURACIÓN FINAL CORREGIDA

// CONFIGURACIÓN DE PRODUCCIÓN HOSTINGER
define('DB_HOST', 'srv1623.hstgr.io');
define('DB_NAME', 'u734106719_kasaamigroupbd');
define('DB_USER', 'u734106719_root');
define('DB_PASS', '@Kasaamigroupbd2025.');
define('DB_PORT', 3306);

// Configuración de Correo
define('MAIL_HOST', 'smtp.hostinger.com');
define('MAIL_PORT', 465);
define('MAIL_USERNAME', 'info@kasaamigroup.com');
define('MAIL_PASSWORD', 'infoKasaami2025.');
define('MAIL_FROM_EMAIL', 'info@kasaamigroup.com');
define('MAIL_FROM_NAME', 'Kasaami Care & Beauty');

// Configuración General
define('TIMEZONE', 'America/Guayaquil');
define('COMPANY_NAME', 'Kasaami Care & Beauty');
define('WHATSAPP_NUMBER', '593963052401');

// Configuración del Sistema de Citas
define('MAX_APPOINTMENTS_PER_SLOT', 3); // Máximo número de citas por horario
define('APPOINTMENT_SLOT_MINUTES', 60); // Duración de cada slot en minutos

// Establecer zona horaria
date_default_timezone_set(TIMEZONE);

// DEBUG: Solo en desarrollo
error_reporting(E_ALL);
ini_set('display_errors', 1);

class Database {
    private static $instance = null;
    private $connection;
    private $last_error = '';
    
    private function __construct() {
        try {
            error_log("Attempting LOCAL database connection to: " . DB_HOST . ":" . DB_PORT . " DB: " . DB_NAME);
            
            // CONFIGURACIÓN SIMPLIFICADA - SIN CONSTANTES PROBLEMÁTICAS
            $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT . ";charset=utf8mb4";
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
                PDO::ATTR_TIMEOUT => 30,
                // REMOVIDO: PDO::MYSQL_ATTR_CONNECT_TIMEOUT (causa el error)
            ];
            
            $this->connection = new PDO($dsn, DB_USER, DB_PASS, $options);
            
            // Configurar charset explícitamente
            $this->connection->exec("SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci");
            
            error_log("✅ LOCAL Database connection successful");
            
        } catch (PDOException $e) {
            $this->last_error = $e->getMessage();
            error_log("❌ LOCAL Database connection failed: " . $e->getMessage());
            error_log("Connection details - Host: " . DB_HOST . ", DB: " . DB_NAME . ", User: " . DB_USER);
            
            throw new Exception("Error de conexión a la base de datos local: " . $e->getMessage());
        }
    }
    
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    public function getConnection() {
        return $this->connection;
    }
    
    public function getLastError() {
        return $this->last_error;
    }
    
    // Método para probar la conexión
    public static function testConnection() {
        try {
            $db = self::getInstance();
            $stmt = $db->getConnection()->query("SELECT 1 as test, NOW() as server_time, @@hostname as hostname");
            $result = $stmt->fetch();
            
            error_log("✅ Database test successful: " . print_r($result, true));
            return $result && $result['test'] == 1;
            
        } catch (Exception $e) {
            error_log("❌ Database test failed: " . $e->getMessage());
            return false;
        }
    }
    
    // Verificar si las tablas existen
    public static function checkTables() {
        try {
            $db = self::getInstance();
            $tables = ['leads', 'appointments', 'users', 'lead_activities'];
            $existing_tables = [];
            
            foreach ($tables as $table) {
                try {
                    $stmt = $db->getConnection()->prepare("SHOW TABLES LIKE ?");
                    $stmt->execute([$table]);
                    if ($stmt->rowCount() > 0) {
                        $existing_tables[] = $table;
                    }
                } catch (Exception $e) {
                    error_log("Error checking table $table: " . $e->getMessage());
                }
            }
            
            error_log("Existing tables: " . implode(', ', $existing_tables));
            return $existing_tables;
            
        } catch (Exception $e) {
            error_log("Error in checkTables: " . $e->getMessage());
            return [];
        }
    }
    
    // Crear base de datos si no existe
    public static function createDatabaseIfNotExists() {
        try {
            error_log("Verificando si la base de datos existe...");
            
            // Conectar sin especificar base de datos
            $dsn = "mysql:host=" . DB_HOST . ";port=" . DB_PORT . ";charset=utf8mb4";
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ];
            
            $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
            
            // Verificar si la base de datos existe
            $stmt = $pdo->prepare("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = ?");
            $stmt->execute([DB_NAME]);
            
            if ($stmt->rowCount() == 0) {
                // Crear la base de datos
                $pdo->exec("CREATE DATABASE `" . DB_NAME . "` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
                error_log("✅ Base de datos '" . DB_NAME . "' creada exitosamente");
                return true;
            } else {
                error_log("✅ Base de datos '" . DB_NAME . "' ya existe");
                return true;
            }
            
        } catch (Exception $e) {
            error_log("❌ Error al crear/verificar base de datos: " . $e->getMessage());
            return false;
        }
    }
    
    // Información de conexión para debug
    public static function getConnectionInfo() {
        $info = [
            'host' => DB_HOST,
            'database' => DB_NAME,
            'user' => DB_USER,
            'port' => DB_PORT,
            'connected' => false,
            'server_info' => [],
            'tables' => [],
            'error' => ''
        ];
        
        try {
            $connected = self::testConnection();
            $info['connected'] = $connected;
            
            if ($connected) {
                $db = self::getInstance();
                $stmt = $db->getConnection()->query("SELECT VERSION() as version, @@hostname as hostname, DATABASE() as current_db");
                $serverInfo = $stmt->fetch();
                $info['server_info'] = $serverInfo;
                $info['tables'] = self::checkTables();
            }
            
        } catch (Exception $e) {
            $info['error'] = $e->getMessage();
        }
        
        return $info;
    }
}

class EmailService {
    private $mailer;
    
    public function __construct() {
        // Configuración básica de email
    }
    
    public function sendEmail($to, $subject, $body, $isHTML = true) {
        try {
            $headers = [
                'From: ' . MAIL_FROM_NAME . ' <' . MAIL_FROM_EMAIL . '>',
                'Reply-To: ' . MAIL_FROM_EMAIL,
                'X-Mailer: PHP/' . phpversion()
            ];
            
            if ($isHTML) {
                $headers[] = 'MIME-Version: 1.0';
                $headers[] = 'Content-Type: text/html; charset=UTF-8';
            }
            
            $header_string = implode("\r\n", $headers);
            $result = mail($to, $subject, $body, $header_string);
            
            error_log("Email sent to $to, subject: $subject, result: " . ($result ? 'success' : 'failed'));
            return $result;
            
        } catch (Exception $e) {
            error_log("Email sending failed: " . $e->getMessage());
            return false;
        }
    }
    
    public function sendConfirmationEmail($leadData) {
        $subject = "Consulta Confirmada - " . COMPANY_NAME;
        
        $body = "
        <html>
        <head>
            <title>Consulta Confirmada</title>
            <style>
                body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
                .header { background: #8B5CF6; color: white; padding: 20px; text-align: center; }
                .content { padding: 20px; }
                .footer { background: #f4f4f4; padding: 15px; text-align: center; font-size: 12px; }
            </style>
        </head>
        <body>
            <div class='header'>
                <h1>¡Hola {$leadData['name']}!</h1>
            </div>
            <div class='content'>
                <p>Tu consulta ha sido confirmada exitosamente.</p>
                <h3>Detalles de tu cita:</h3>
                <ul>
                    <li><strong>Fecha:</strong> {$leadData['appointment_date']}</li>
                    <li><strong>Hora:</strong> {$leadData['appointment_time']}</li>
                    <li><strong>Tipo:</strong> Consulta inicial</li>
                </ul>
                <p>Nuestro equipo se pondrá en contacto contigo lo más pronto posible para brindarte todos los detalles de tu asesoría virtual.</p>
            </div>
            <div class='footer'>
                <p>Saludos cordiales,<br>
                <strong>Equipo " . COMPANY_NAME . "</strong><br>
                WhatsApp: +" . WHATSAPP_NUMBER . "</p>
            </div>
        </body>
        </html>";
        
        return $this->sendEmail($leadData['email'], $subject, $body, true);
    }
    
    public function sendCommercialNotification($leadData) {
        $subject = "Nueva Consulta Agendada - {$leadData['name']} {$leadData['lastname']}";
        
        $body = "
        <html>
        <head>
            <title>Nueva Consulta Agendada</title>
        </head>
        <body>
            <h2>🎯 Nueva Consulta Agendada</h2>
            <h3>Información del Cliente:</h3>
            <p><strong>Nombre:</strong> {$leadData['name']} {$leadData['lastname']}</p>
            <p><strong>Email:</strong> {$leadData['email']}</p>
            <p><strong>Teléfono:</strong> {$leadData['phone']}</p>
            <p><strong>País:</strong> {$leadData['country']}</p>
            
            <h3>Detalles de la Cita:</h3>
            <p><strong>Fecha:</strong> {$leadData['appointment_date']}</p>
            <p><strong>Hora:</strong> {$leadData['appointment_time']}</p>
            
            <p><strong>⚡ Acción Requerida:</strong> Contactar al cliente lo más pronto posible para confirmar asesoría virtual.</p>
        </body>
        </html>";
        
        return $this->sendEmail(MAIL_FROM_EMAIL, $subject, $body, true);
    }
}

class LeadManager {
    private $db;
    
    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }
    
    public function createLead($data) {
        try {
            error_log("Creating lead: " . print_r($data, true));
            
            $leadScore = $this->calculateLeadScore($data);
            
            $sql = "INSERT INTO leads (
                name, lastname, email, phone, country, budget_range, travel_type, 
                group_size, procedures_interest, found_us, contact_preference, 
                lead_score, status, priority, language, source, ip_address, user_agent
            ) VALUES (
                :name, :lastname, :email, :phone, :country, :budget_range, :travel_type,
                :group_size, :procedures_interest, :found_us, :contact_preference,
                :lead_score, 'nuevo', :priority, 'es', 'website_form', :ip_address, :user_agent
            )";
            
            $stmt = $this->db->prepare($sql);
            $priority = $leadScore >= 70 ? 'alta' : ($leadScore >= 50 ? 'media' : 'baja');
            
            $result = $stmt->execute([
                ':name' => $data['name'],
                ':lastname' => $data['lastname'],
                ':email' => $data['email'],
                ':phone' => $data['phone'],
                ':country' => $data['country'],
                ':budget_range' => $data['budget_range'] ?? $data['budget'],
                ':travel_type' => $data['travel_type'],
                ':group_size' => $data['group_size'] ?? 1,
                ':procedures_interest' => $data['procedures_interest'],
                ':found_us' => $data['found_us'],
                ':contact_preference' => $data['contact_preference'],
                ':lead_score' => $leadScore,
                ':priority' => $priority,
                ':ip_address' => $_SERVER['REMOTE_ADDR'] ?? 'unknown',
                ':user_agent' => $_SERVER['HTTP_USER_AGENT'] ?? 'unknown'
            ]);
            
            if ($result) {
                $leadId = $this->db->lastInsertId();
                error_log("Lead created successfully with ID: $leadId");
                $this->logActivity($leadId, 'created', 'Lead creado desde formulario web');
                return $leadId;
            }
            
            return false;
            
        } catch (Exception $e) {
            error_log("Error creating lead: " . $e->getMessage());
            return false;
        }
    }
    
    public function createAppointment($leadId, $date, $time) {
        try {
            error_log("Creating appointment for lead $leadId: $date $time");
            
            $sql = "INSERT INTO appointments (
                lead_id, appointment_date, appointment_time, appointment_type, modality, status
            ) VALUES (
                :lead_id, :appointment_date, :appointment_time, 'inicial', 'virtual', 'programada'
            )";
            
            $stmt = $this->db->prepare($sql);
            $result = $stmt->execute([
                ':lead_id' => $leadId,
                ':appointment_date' => $date,
                ':appointment_time' => $time
            ]);
            
            if ($result) {
                $appointmentId = $this->db->lastInsertId();
                error_log("Appointment created successfully with ID: $appointmentId");
                $this->logActivity($leadId, 'appointment_scheduled', "Cita programada para $date a las $time");
                return $appointmentId;
            }
            
            return false;
            
        } catch (Exception $e) {
            error_log("Error creating appointment: " . $e->getMessage());
            return false;
        }
    }
    
    private function calculateLeadScore($data) {
        $score = 0;
        
        $budget = $data['budget_range'] ?? $data['budget'];
        switch ($budget) {
            case '20000+': $score += 50; break;
            case '16000-20000': $score += 40; break;
            case '12000-16000': $score += 30; break;
            case '8000-12000': $score += 20; break;
            default: $score += 10;
        }
        
        switch ($data['travel_type']) {
            case 'grupo': $score += 20; break;
            case 'familiar': $score += 15; break;
            case 'amigo': $score += 10; break;
            default: $score += 5;
        }
        
        if ($data['contact_preference'] === 'whatsapp') {
            $score += 10;
        }
        
        if (strlen($data['procedures_interest']) > 100) {
            $score += 15;
        }
        
        return min($score, 100);
    }
    
    public function logActivity($leadId, $activityType, $description, $metadata = null) {
        try {
            $sql = "INSERT INTO lead_activities (lead_id, activity_type, description) 
                    VALUES (:lead_id, :activity_type, :description)";
            
            $stmt = $this->db->prepare($sql);
            $result = $stmt->execute([
                ':lead_id' => $leadId,
                ':activity_type' => $activityType,
                ':description' => $description
            ]);
            
            if ($result) {
                error_log("Activity logged for lead $leadId: $activityType - $description");
            }
            
            return $result;
            
        } catch (Exception $e) {
            error_log("Error logging activity: " . $e->getMessage());
            return false;
        }
    }
}

// Funciones de configuración del sistema
function getSystemSetting($key, $default = '') {
    try {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("SELECT setting_value FROM system_settings WHERE setting_key = ? AND is_active = TRUE");
        $stmt->execute([$key]);
        $result = $stmt->fetch();
        return $result ? $result['setting_value'] : $default;
    } catch (Exception $e) {
        error_log("Error getting system setting '$key': " . $e->getMessage());
        return $default;
    }
}

function getVideoUrl($language = 'es', $device = 'desktop') {
    $key = "video_home_{$device}_{$language}";
    $videoUrl = getSystemSetting($key);
    
    // Fallback: si no hay video para móvil, usar el de escritorio
    if (empty($videoUrl) && $device === 'mobile') {
        $fallbackKey = "video_home_desktop_{$language}";
        $videoUrl = getSystemSetting($fallbackKey);
    }
    
    return $videoUrl;
}

function getVideoSettings() {
    return [
        'autoplay' => getSystemSetting('video_autoplay', 'true') === 'true',
        'muted' => getSystemSetting('video_muted', 'true') === 'true', 
        'loop' => getSystemSetting('video_loop', 'true') === 'true'
    ];
}

// Funciones de utilidad
function jsonResponse($success, $message = '', $data = null) {
    header('Content-Type: application/json');
    echo json_encode([
        'success' => $success,
        'message' => $message,
        'data' => $data,
        'timestamp' => date('Y-m-d H:i:s')
    ]);
    exit;
}

function isValidEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

function sanitizeInput($data) {
    return htmlspecialchars(strip_tags(trim($data)));
}

function isEmailServiceAvailable() {
    return function_exists('mail');
}

// Función de debug
function debugDatabaseConnection() {
    try {
        $info = Database::getConnectionInfo();
        error_log("DATABASE DEBUG INFO: " . print_r($info, true));
        return $info;
    } catch (Exception $e) {
        error_log("DATABASE DEBUG ERROR: " . $e->getMessage());
        return ['error' => $e->getMessage(), 'connected' => false];
    }
}
?>