<?php
// crmkasaami/update_activities.php
// Script para agregar el tipo 'note' a las actividades

require_once 'config.php';

try {
    $db = Database::getInstance()->getConnection();
    
    echo "Actualizando tabla lead_activities para incluir notas...\n";
    
    // Agregar 'note' al ENUM de activity_type
    $sql = "ALTER TABLE lead_activities MODIFY COLUMN activity_type ENUM(
        'form_submitted', 
        'email_sent', 
        'email_opened', 
        'phone_call', 
        'whatsapp_sent', 
        'appointment_scheduled', 
        'appointment_completed', 
        'status_changed', 
        'document_sent', 
        'payment_received',
        'note'
    ) NOT NULL";
    
    $db->exec($sql);
    
    echo "✅ Tabla lead_activities actualizada correctamente.\n";
    echo "✅ Ahora se pueden agregar notas a los leads.\n";
    
} catch (Exception $e) {
    echo "❌ Error al actualizar la tabla: " . $e->getMessage() . "\n";
}
?>