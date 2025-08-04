<?php
// crmkasaami/config.php
// Configuración del CRM

// Configuración de la base de datos - PRODUCCIÓN HOSTINGER
define('DB_HOST', 'srv1623.hstgr.io');
define('DB_NAME', 'u734106719_kasaamigroupbd');
define('DB_USER', 'u734106719_root');
define('DB_PASS', '@Kasaamigroupbd2025.');
define('DB_PORT', 3306);

// Configuración de la aplicación
define('APP_NAME', 'Kasaami CRM');
define('APP_VERSION', '1.0.0');
define('TIMEZONE', 'America/Guayaquil');

# Configuración de sesiones
if (session_status() === PHP_SESSION_NONE) {
    ini_set('session.cookie_lifetime', 86400); // 24 horas
    ini_set('session.gc_maxlifetime', 86400);
    session_start();
}

// Configurar timezone
date_default_timezone_set(TIMEZONE);

// Clase de conexión a BD
class Database {
    private static $instance = null;
    private $pdo;
    
    private function __construct() {
        try {
            $this->pdo = new PDO(
                "mysql:host=" . DB_HOST . ";port=" . DB_PORT . ";dbname=" . DB_NAME . ";charset=utf8mb4",
                DB_USER,
                DB_PASS,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_PERSISTENT => true
                ]
            );
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }
    
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    public function getConnection() {
        return $this->pdo;
    }
}

// Funciones de utilidad
function isLoggedIn() {
    return isset($_SESSION['user_id']) && isset($_SESSION['username']);
}

function requireLogin() {
    if (!isLoggedIn()) {
        header('Location: login.php');
        exit;
    }
}

function getUserInfo() {
    if (!isLoggedIn()) {
        return null;
    }
    
    $db = Database::getInstance()->getConnection();
    $stmt = $db->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute([$_SESSION['user_id']]);
    return $stmt->fetch();
}

function logout() {
    session_destroy();
    header('Location: login.php');
    exit;
}

function calculateLeadScore($budget, $travelType, $contactPref, $proceduresLength) {
    $score = 0;
    
    // Puntuación por presupuesto
    switch ($budget) {
        case '20000+': $score += 50; break;
        case '16000-20000': $score += 40; break;
        case '12000-16000': $score += 30; break;
        case '8000-12000': $score += 20; break;
        default: $score += 10;
    }
    
    // Puntuación por tipo de viaje
    switch ($travelType) {
        case 'grupo': $score += 20; break;
        case 'familiar': $score += 15; break;
        case 'amigo': $score += 10; break;
        default: $score += 5;
    }
    
    // Puntuación por preferencia de contacto
    if ($contactPref === 'whatsapp') {
        $score += 10;
    }
    
    // Puntuación por detalle en procedimientos
    if ($proceduresLength > 100) {
        $score += 15;
    }
    
    return min($score, 100);
}
?>