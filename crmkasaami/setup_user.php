<?php
// crmkasaami/setup_user.php
// Script para crear usuario administrador inicial

require_once 'config.php';

try {
    $db = Database::getInstance()->getConnection();
    
    // Verificar si la tabla users existe
    $stmt = $db->query("SHOW TABLES LIKE 'users'");
    if ($stmt->rowCount() == 0) {
        echo "❌ Tabla 'users' no existe. Ejecuta primero el setup de la base de datos.\n";
        exit;
    }
    
    // Verificar si ya existe el usuario admin
    $stmt = $db->prepare("SELECT COUNT(*) as count FROM users WHERE username = 'admin'");
    $stmt->execute();
    $result = $stmt->fetch();
    
    if ($result['count'] > 0) {
        echo "✅ Usuario 'admin' ya existe.\n";
    } else {
        // Crear usuario admin
        $password_hash = password_hash('kasaami2025', PASSWORD_DEFAULT);
        
        $stmt = $db->prepare("
            INSERT INTO users (username, email, password_hash, full_name, role, can_assign_leads, can_schedule_appointments, is_active) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)
        ");
        
        $result = $stmt->execute([
            'admin',
            'admin@kasaami.com',
            $password_hash,
            'Administrador Sistema',
            'admin',
            1,
            1,
            1
        ]);
        
        if ($result) {
            echo "✅ Usuario 'admin' creado exitosamente.\n";
            echo "👤 Usuario: admin\n";
            echo "🔑 Contraseña: kasaami2025\n";
        } else {
            echo "❌ Error al crear el usuario.\n";
        }
    }
    
    // Mostrar todos los usuarios
    $stmt = $db->query("SELECT id, username, email, full_name, role, is_active FROM users");
    $users = $stmt->fetchAll();
    
    echo "\n📋 Usuarios en el sistema:\n";
    foreach ($users as $user) {
        $status = $user['is_active'] ? '✅' : '❌';
        echo "- {$status} ID: {$user['id']} | {$user['username']} | {$user['full_name']} | {$user['role']}\n";
    }
    
} catch (Exception $e) {
    echo "❌ Error: " . $e->getMessage() . "\n";
}
?>