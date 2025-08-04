<?php
// crmkasaami/init_database.php
// Inicializar base de datos y crear usuario admin por defecto

header('Content-Type: application/json');

require_once '../includes/database.php';

try {
    $db = Database::getInstance()->getConnection();
    
    // Verificar si ya existe el usuario admin
    $stmt = $db->prepare("SELECT COUNT(*) as count FROM users WHERE username = 'admin'");
    $stmt->execute();
    $result = $stmt->fetch();
    
    if ($result['count'] == 0) {
        // Crear usuario admin por defecto
        $adminPassword = password_hash('admin123', PASSWORD_DEFAULT);
        
        $stmt = $db->prepare("
            INSERT INTO users (username, email, password_hash, full_name, role, can_assign_leads, can_schedule_appointments) 
            VALUES ('admin', 'admin@kasaami.com', ?, 'Administrador Sistema', 'admin', TRUE, TRUE)
        ");
        
        $result = $stmt->execute([$adminPassword]);
        
        if ($result) {
            jsonResponse(true, 'Usuario administrador creado exitosamente', [
                'username' => 'admin',
                'password' => 'admin123',
                'message' => 'Cambia esta contraseña después del primer login'
            ]);
        } else {
            jsonResponse(false, 'Error al crear usuario administrador');
        }
    } else {
        jsonResponse(true, 'Usuario administrador ya existe');
    }
    
} catch (Exception $e) {
    error_log("Database init error: " . $e->getMessage());
    jsonResponse(false, 'Error al inicializar la base de datos');
}
?>