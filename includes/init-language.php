<?php
/**
 * Inicializador de idioma - DEBE incluirse al principio de cada página
 * antes de cualquier output HTML para evitar errores de headers
 */

// Incluir el sistema de gestión de idiomas
require_once(__DIR__ . '/language-manager.php');

// Detectar y establecer el idioma actual
$currentLang = KasaamiLanguageManager::detectLanguage();

// Establecer el título de página dinámico basado en el idioma
function setPageTitle($spanishTitle, $englishTitle = null) {
    global $currentLang;
    if ($englishTitle === null) {
        $englishTitle = $spanishTitle; // Usar el mismo título si no se proporciona traducción
    }
    return $currentLang === 'es' ? $spanishTitle : $englishTitle;
}

// Variables globales disponibles en todas las páginas
$isSpanish = ($currentLang === 'es');
$isEnglish = ($currentLang === 'en');

// Función helper para debug (remover en producción)
function debugLanguageInfo() {
    global $currentLang;
    if (isset($_GET['debug'])) {
        echo "<!-- Language Debug Info:\n";
        echo "Current Language: {$currentLang}\n";
        echo "URL Parameter: " . ($_GET['lang'] ?? 'none') . "\n";
        echo "Cookie: " . ($_COOKIE['kasaami_language'] ?? 'none') . "\n";
        echo "Headers Sent: " . (headers_sent() ? 'Yes' : 'No') . "\n";
        echo "-->\n";
    }
}
?>