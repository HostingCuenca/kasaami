<?php
// test_connection.php - EJECUTAR ESTE ARCHIVO PARA DIAGNOSTICAR

require_once 'includes/database.php';

echo "<h1>🔍 Diagnóstico de Conexión CRM Kasaami</h1>";

try {
    echo "<h2>📊 Información del Sistema</h2>";
    echo "<pre>";
    echo "PHP Version: " . phpversion() . "\n";
    echo "Server Software: " . ($_SERVER['SERVER_SOFTWARE'] ?? 'unknown') . "\n";
    echo "Server Name: " . ($_SERVER['SERVER_NAME'] ?? 'unknown') . "\n";
    echo "Server IP: " . ($_SERVER['SERVER_ADDR'] ?? 'unknown') . "\n";
    echo "Document Root: " . ($_SERVER['DOCUMENT_ROOT'] ?? 'unknown') . "\n";
    echo "</pre>";
    
    echo "<h2>🔧 Extensiones PHP</h2>";
    echo "<pre>";
    $extensions = ['pdo', 'pdo_mysql', 'mysqli', 'openssl', 'curl'];
    foreach ($extensions as $ext) {
        $status = extension_loaded($ext) ? '✅ Instalada' : '❌ NO instalada';
        echo "$ext: $status\n";
    }
    echo "</pre>";
    
    echo "<h2>🌐 Test de Conectividad de Red</h2>";
    echo "<pre>";
    
    // Test 1: Resolver hostname
    echo "1. Resolviendo hostname...\n";
    $hosts = ['82.197.82.72', 'srv1623.hstgr.io', 'localhost'];
    foreach ($hosts as $host) {
        $ip = gethostbyname($host);
        echo "   $host -> $ip\n";
    }
    
    // Test 2: Conectividad de puerto
    echo "\n2. Probando conectividad de puertos...\n";
    foreach ($hosts as $host) {
        echo "   Probando $host:3306... ";
        $connection = @fsockopen($host, 3306, $errno, $errstr, 10);
        if ($connection) {
            echo "✅ CONECTA\n";
            fclose($connection);
        } else {
            echo "❌ NO CONECTA (Error: $errno - $errstr)\n";
        }
    }
    echo "</pre>";
    
    echo "<h2>🗄️ Test de Base de Datos</h2>";
    echo "<pre>";
    
    // Obtener información completa
    $info = debugDatabaseConnection();
    
    echo "Host: " . $info['host'] . "\n";
    echo "Database: " . $info['database'] . "\n";
    echo "User: " . $info['user'] . "\n";
    echo "Port: " . $info['port'] . "\n";
    echo "Conectado: " . ($info['connected'] ? '✅ SÍ' : '❌ NO') . "\n";
    
    if (!empty($info['network_status'])) {
        echo "\nEstado de Red:\n";
        echo "- Puerto alcanzable: " . ($info['network_status']['port_reachable'] ? '✅ SÍ' : '❌ NO') . "\n";
        if (!$info['network_status']['port_reachable']) {
            echo "- Error Code: " . $info['network_status']['error_code'] . "\n";
            echo "- Error Message: " . $info['network_status']['error_message'] . "\n";
        }
    }
    
    if (!empty($info['server_info'])) {
        echo "\nInformación del Servidor MySQL:\n";
        echo "- Versión: " . $info['server_info']['version'] . "\n";
        echo "- Hostname: " . $info['server_info']['hostname'] . "\n";
    }
    
    if (!empty($info['tables'])) {
        echo "\nTablas encontradas: " . implode(', ', $info['tables']) . "\n";
    }
    
    if (!empty($info['error'])) {
        echo "\n❌ ERROR: " . $info['error'] . "\n";
    }
    echo "</pre>";
    
    // Sugerencias basadas en los resultados
    echo "<h2>💡 Recomendaciones</h2>";
    echo "<div style='background: #f0f8ff; padding: 15px; border-left: 4px solid #0066cc;'>";
    
    if (!$info['connected']) {
        echo "<strong>⚠️ No se pudo conectar a la base de datos</strong><br>";
        
        if (isset($info['network_status']) && !$info['network_status']['port_reachable']) {
            echo "<br>🔥 <strong>PROBLEMA IDENTIFICADO: Puerto MySQL no alcanzable</strong><br>";
            echo "<strong>Posibles soluciones:</strong><br>";
            echo "1. <strong>Verificar con tu hosting:</strong> Pregunta si permiten conexiones externas a MySQL<br>";
            echo "2. <strong>Usar localhost:</strong> Si tu código PHP está en el mismo servidor que MySQL<br>";
            echo "3. <strong>Configurar firewall:</strong> Agregar la IP del servidor web a la lista blanca<br>";
            echo "4. <strong>Usar tunnel SSH:</strong> Si el hosting lo permite<br>";
        } else {
            echo "<br>🔍 <strong>El puerto es alcanzable pero MySQL rechaza la conexión</strong><br>";
            echo "<strong>Verificar:</strong><br>";
            echo "1. Credenciales correctas<br>";
            echo "2. Usuario tiene permisos para conectarse desde esta IP<br>";
            echo "3. Base de datos existe<br>";
        }
    } else {
        echo "✅ <strong>¡Conexión exitosa!</strong><br>";
        echo "La base de datos está funcionando correctamente.";
    }
    
    echo "</div>";
    
} catch (Exception $e) {
    echo "<h2>❌ Error Fatal</h2>";
    echo "<pre style='background: #ffe6e6; padding: 15px; border: 1px solid #ff0000;'>";
    echo "Error: " . $e->getMessage() . "\n";
    echo "Archivo: " . $e->getFile() . "\n";
    echo "Línea: " . $e->getLine() . "\n";
    echo "</pre>";
}

echo "<hr>";
echo "<p><small>Diagnóstico ejecutado el " . date('Y-m-d H:i:s') . " - Kasaami CRM</small></p>";
?>