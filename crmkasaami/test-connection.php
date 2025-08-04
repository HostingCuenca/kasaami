<?php
// crmkasaami/test-connection.php
// Test simple de conexión a la base de datos CRM

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Configuración de la base de datos
$host = 'srv1623.hstgr.io';
$dbname = 'u734106719_kasaamigroupbd';
$username = 'u734106719_root';
$password = '@Kasaamigroupbd2025.';
$port = 3306;

echo "<h2>🔌 Test de Conexión CRM Kasaami</h2>";
echo "<hr>";

try {
    // Intentar conexión
    echo "📡 <strong>Conectando a:</strong><br>";
    echo "• Host: $host<br>";
    echo "• Base de datos: $dbname<br>";
    echo "• Usuario: $username<br>";
    echo "• Puerto: $port<br><br>";
    
    $pdo = new PDO(
        "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4",
        $username,
        $password,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_TIMEOUT => 10
        ]
    );
    
    echo "✅ <strong style='color: green;'>¡Conexión exitosa!</strong><br><br>";
    
    // Verificar tablas existentes
    echo "📋 <strong>Verificando estructura de tablas:</strong><br>";
    $tables = [
        'leads', 'appointments', 'lead_comments', 'lead_activities', 
        'available_schedules', 'users', 'system_config', 'email_templates'
    ];
    
    foreach ($tables as $table) {
        try {
            $stmt = $pdo->query("SELECT COUNT(*) as count FROM $table");
            $result = $stmt->fetch();
            echo "• <span style='color: green;'>✓</span> Tabla '<strong>$table</strong>': {$result['count']} registros<br>";
        } catch (Exception $e) {
            echo "• <span style='color: red;'>✗</span> Tabla '<strong>$table</strong>': NO EXISTE<br>";
        }
    }
    
    echo "<br>";
    
    // Verificar vistas
    echo "📊 <strong>Verificando vistas:</strong><br>";
    $views = ['leads_with_appointments', 'schedule_availability'];
    
    foreach ($views as $view) {
        try {
            $stmt = $pdo->query("SELECT COUNT(*) as count FROM $view");
            $result = $stmt->fetch();
            echo "• <span style='color: green;'>✓</span> Vista '<strong>$view</strong>': {$result['count']} registros<br>";
        } catch (Exception $e) {
            echo "• <span style='color: red;'>✗</span> Vista '<strong>$view</strong>': NO EXISTE<br>";
        }
    }
    
    echo "<br>";
    
    // Test de inserción simple
    echo "💾 <strong>Test de operaciones básicas:</strong><br>";
    
    // Test INSERT
    try {
        $testStmt = $pdo->prepare("
            INSERT INTO leads (
                name, lastname, email, phone, country, budget_range, 
                travel_type, procedures_interest, found_us, contact_preference
            ) VALUES (
                'Test', 'Connection', 'test@conexion.com', '+1234567890', 'US', 
                '8000-12000', 'solo', 'Test de conexión', 'google', 'email'
            )
        ");
        $testStmt->execute();
        $testLeadId = $pdo->lastInsertId();
        echo "• <span style='color: green;'>✓</span> INSERT: Lead creado con ID $testLeadId<br>";
        
        // Test SELECT
        $selectStmt = $pdo->prepare("SELECT * FROM leads WHERE id = ?");
        $selectStmt->execute([$testLeadId]);
        $testLead = $selectStmt->fetch();
        echo "• <span style='color: green;'>✓</span> SELECT: Lead recuperado - {$testLead['name']} {$testLead['lastname']}<br>";
        
        // Test UPDATE
        $updateStmt = $pdo->prepare("UPDATE leads SET status = 'contactado' WHERE id = ?");
        $updateStmt->execute([$testLeadId]);
        echo "• <span style='color: green;'>✓</span> UPDATE: Status actualizado<br>";
        
        // Test DELETE (limpieza)
        $deleteStmt = $pdo->prepare("DELETE FROM leads WHERE id = ?");
        $deleteStmt->execute([$testLeadId]);
        echo "• <span style='color: green;'>✓</span> DELETE: Lead de prueba eliminado<br>";
        
    } catch (Exception $e) {
        echo "• <span style='color: red;'>✗</span> Error en operaciones: " . $e->getMessage() . "<br>";
    }
    
    echo "<br>";
    
    // Información del servidor
    echo "ℹ️ <strong>Información del servidor:</strong><br>";
    $serverInfo = $pdo->query("SELECT VERSION() as version")->fetch();
    echo "• MySQL Version: {$serverInfo['version']}<br>";
    
    $timezone = $pdo->query("SELECT @@time_zone as tz")->fetch();
    echo "• Timezone: {$timezone['tz']}<br>";
    
    echo "<br>";
    echo "<div style='background: #d4edda; border: 1px solid #c3e6cb; border-radius: 5px; padding: 15px; color: #155724;'>";
    echo "🎉 <strong>¡Conexión CRM completamente funcional!</strong><br>";
    echo "La base de datos está lista para integrarse con el formulario.";
    echo "</div>";
    
} catch (PDOException $e) {
    echo "<div style='background: #f8d7da; border: 1px solid #f5c6cb; border-radius: 5px; padding: 15px; color: #721c24;'>";
    echo "❌ <strong>Error de conexión:</strong><br>";
    echo "Código: " . $e->getCode() . "<br>";
    echo "Mensaje: " . $e->getMessage() . "<br>";
    
    if (strpos($e->getMessage(), 'Connection refused') !== false) {
        echo "<br><strong>Posibles soluciones:</strong><br>";
        echo "• Verificar que el servidor MySQL esté activo<br>";
        echo "• Comprobar credenciales de acceso<br>";
        echo "• Verificar configuración del firewall<br>";
    }
    echo "</div>";
} catch (Exception $e) {
    echo "<div style='background: #fff3cd; border: 1px solid #ffeaa7; border-radius: 5px; padding: 15px; color: #856404;'>";
    echo "⚠️ <strong>Error general:</strong><br>";
    echo $e->getMessage();
    echo "</div>";
}

echo "<br><hr>";
echo "<small>Test ejecutado el: " . date('Y-m-d H:i:s') . "</small>";
?>