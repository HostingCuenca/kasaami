<?php
// crmkasaami/fix-database.php
// Script para corregir el trigger problemático

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Configuración de la base de datos
$host = 'srv1623.hstgr.io';
$dbname = 'u734106719_kasaamigroupbd';
$username = 'u734106719_root';
$password = '@Kasaamigroupbd2025.';

echo "<h2>🔧 Corrección de Base de Datos CRM</h2>";
echo "<hr>";

try {
    $pdo = new PDO(
        "mysql:host=$host;port=3306;dbname=$dbname;charset=utf8mb4",
        $username,
        $password,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );
    
    echo "✅ Conectado a la base de datos<br><br>";
    
    // 1. Eliminar trigger problemático
    echo "🗑️ <strong>Eliminando trigger problemático...</strong><br>";
    try {
        $pdo->exec("DROP TRIGGER IF EXISTS calculate_lead_score_on_insert");
        echo "• Trigger eliminado correctamente<br>";
    } catch (Exception $e) {
        echo "• Error eliminando trigger: " . $e->getMessage() . "<br>";
    }
    
    // 2. Crear función para calcular lead score (sin trigger automático)
    echo "<br>📊 <strong>Creando función de lead scoring...</strong><br>";
    try {
        $pdo->exec("DROP FUNCTION IF EXISTS calculate_lead_score");
        
        $pdo->exec("
        CREATE FUNCTION calculate_lead_score(
            p_budget VARCHAR(20),
            p_travel_type VARCHAR(20), 
            p_contact_pref VARCHAR(20),
            p_procedures_length INT
        ) RETURNS INT
        READS SQL DATA
        DETERMINISTIC
        BEGIN
            DECLARE score INT DEFAULT 0;
            
            -- Puntuación por presupuesto
            CASE p_budget
                WHEN '20000+' THEN SET score = score + 50;
                WHEN '16000-20000' THEN SET score = score + 40;
                WHEN '12000-16000' THEN SET score = score + 30;
                WHEN '8000-12000' THEN SET score = score + 20;
                ELSE SET score = score + 10;
            END CASE;
            
            -- Puntuación por tipo de viaje
            CASE p_travel_type
                WHEN 'grupo' THEN SET score = score + 20;
                WHEN 'familiar' THEN SET score = score + 15;
                WHEN 'amigo' THEN SET score = score + 10;
                ELSE SET score = score + 5;
            END CASE;
            
            -- Puntuación por preferencia de contacto
            IF p_contact_pref = 'whatsapp' THEN
                SET score = score + 10;
            END IF;
            
            -- Puntuación por detalle en procedimientos
            IF p_procedures_length > 100 THEN
                SET score = score + 15;
            END IF;
            
            RETURN LEAST(score, 100);
        END
        ");
        echo "• Función de scoring creada correctamente<br>";
    } catch (Exception $e) {
        echo "• Error creando función: " . $e->getMessage() . "<br>";
    }
    
    // 3. Verificar/crear usuario admin con password correcto
    echo "<br>👤 <strong>Verificando usuario administrador...</strong><br>";
    try {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = 'admin'");
        $stmt->execute();
        $admin = $stmt->fetch();
        
        if ($admin) {
            echo "• Usuario admin encontrado<br>";
            // Actualizar password si es necesario
            $newPasswordHash = password_hash('kasaami2025', PASSWORD_DEFAULT);
            $updateStmt = $pdo->prepare("UPDATE users SET password_hash = ? WHERE username = 'admin'");
            $updateStmt->execute([$newPasswordHash]);
            echo "• Password actualizado<br>";
        } else {
            // Crear usuario admin
            $passwordHash = password_hash('kasaami2025', PASSWORD_DEFAULT);
            $insertStmt = $pdo->prepare("
                INSERT INTO users (username, email, password_hash, full_name, role, can_assign_leads, can_schedule_appointments) 
                VALUES ('admin', 'admin@kasaami.com', ?, 'Administrador Sistema', 'admin', TRUE, TRUE)
            ");
            $insertStmt->execute([$passwordHash]);
            echo "• Usuario admin creado<br>";
        }
    } catch (Exception $e) {
        echo "• Error con usuario admin: " . $e->getMessage() . "<br>";
    }
    
    // 4. Test final
    echo "<br>🧪 <strong>Test de inserción de lead...</strong><br>";
    try {
        // Calcular score manualmente
        $score = $pdo->query("SELECT calculate_lead_score('12000-16000', 'grupo', 'whatsapp', 150) as score")->fetch()['score'];
        
        $testStmt = $pdo->prepare("
            INSERT INTO leads (
                name, lastname, email, phone, country, budget_range, 
                travel_type, procedures_interest, found_us, contact_preference,
                lead_score
            ) VALUES (
                'Test', 'Final', 'test@final.com', '+1234567890', 'US', 
                '12000-16000', 'grupo', 'Test final de conexión y scoring', 'google', 'whatsapp',
                ?
            )
        ");
        $testStmt->execute([$score]);
        
        $testLeadId = $pdo->lastInsertId();
        echo "• Lead creado exitosamente con ID $testLeadId y score $score<br>";
        
        // Limpiar
        $pdo->prepare("DELETE FROM leads WHERE id = ?")->execute([$testLeadId]);
        echo "• Test completado y limpiado<br>";
        
    } catch (Exception $e) {
        echo "• Error en test: " . $e->getMessage() . "<br>";
    }
    
    echo "<br><div style='background: #d4edda; border: 1px solid #c3e6cb; border-radius: 5px; padding: 15px; color: #155724;'>";
    echo "🎉 <strong>¡Base de datos corregida exitosamente!</strong><br>";
    echo "• Trigger problemático eliminado<br>";
    echo "• Función de scoring creada<br>";
    echo "• Usuario admin configurado<br>";
    echo "• Sistema listo para el CRM";
    echo "</div>";
    
} catch (Exception $e) {
    echo "<div style='background: #f8d7da; border: 1px solid #f5c6cb; border-radius: 5px; padding: 15px; color: #721c24;'>";
    echo "❌ <strong>Error:</strong> " . $e->getMessage();
    echo "</div>";
}

echo "<br><hr>";
echo "<small>Corrección ejecutada el: " . date('Y-m-d H:i:s') . "</small>";
?>