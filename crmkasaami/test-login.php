<?php
// crmkasaami/test-login.php  
// Test de login automático para pruebas

require_once 'config.php';

echo "<h2>🧪 Test de Login CRM</h2>";
echo "<hr>";

try {
    $db = Database::getInstance()->getConnection();
    echo "✅ Conexión establecida<br><br>";
    
    // Buscar usuario admin
    $stmt = $db->prepare("SELECT * FROM users WHERE username = 'admin' AND is_active = 1");
    $stmt->execute();
    $user = $stmt->fetch();
    
    if ($user) {
        echo "👤 Usuario encontrado: " . $user['full_name'] . "<br>";
        
        // Verificar password
        if (password_verify('kasaami2025', $user['password_hash'])) {
            echo "🔐 Password correcto<br>";
            
            // Simular login
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['full_name'] = $user['full_name'];
            $_SESSION['role'] = $user['role'];
            
            echo "✅ <strong>Login simulado exitoso!</strong><br><br>";
            echo "<a href='dashboard.php' style='background: #8B5CF6; color: white; padding: 10px 20px; text-decoration: none; border-radius: 8px;'>🚀 Ir al Dashboard</a>";
            
        } else {
            echo "❌ Password incorrecto<br>";
        }
    } else {
        echo "❌ Usuario no encontrado<br>";
    }
    
} catch (Exception $e) {
    echo "❌ Error: " . $e->getMessage();
}
?>