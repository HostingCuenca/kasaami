<?php
/**
 * Kasaami Language Manager - PHP Backend
 * Sistema de detección y gestión de idiomas en el servidor
 */

class KasaamiLanguageManager {
    private static $supportedLanguages = ['es', 'en'];
    private static $defaultLanguage = 'es';
    
    /**
     * Detecta el idioma actual basado en múltiples fuentes
     * Prioridades: 1) URL param, 2) Cookie, 3) Default
     */
    public static function detectLanguage() {
        $language = self::$defaultLanguage;
        
        // Prioridad 1: Parámetro GET de la URL
        if (isset($_GET['lang']) && in_array($_GET['lang'], self::$supportedLanguages)) {
            $language = $_GET['lang'];
            // Solo guardar en cookie si los headers no han sido enviados
            if (!headers_sent()) {
                self::setLanguageCookie($language);
            }
            return $language;
        }
        
        // Prioridad 2: Cookie guardada
        if (isset($_COOKIE['kasaami_language']) && in_array($_COOKIE['kasaami_language'], self::$supportedLanguages)) {
            $language = $_COOKIE['kasaami_language'];
            return $language;
        }
        
        // Prioridad 3: Idioma por defecto (español)
        // NO usamos detección automática del header Accept-Language
        // para respetar la elección explícita del usuario
        return $language;
    }
    
    /**
     * Analiza el header Accept-Language para detectar el idioma preferido
     */
    private static function getBrowserLanguage($acceptLanguage) {
        // Parsear el header Accept-Language
        $languages = [];
        $parts = explode(',', $acceptLanguage);
        
        foreach ($parts as $part) {
            $part = trim($part);
            if (preg_match('/^([a-z]{2})(?:-[A-Z]{2})?(?:;q=([0-9.]+))?$/', $part, $matches)) {
                $lang = $matches[1];
                $quality = isset($matches[2]) ? (float)$matches[2] : 1.0;
                $languages[$lang] = $quality;
            }
        }
        
        // Ordenar por calidad (q-value)
        arsort($languages);
        
        // Buscar el primer idioma soportado
        foreach ($languages as $lang => $quality) {
            if (in_array($lang, self::$supportedLanguages)) {
                return $lang;
            }
        }
        
        return null;
    }
    
    /**
     * Establece la cookie de idioma (solo si los headers no han sido enviados)
     */
    private static function setLanguageCookie($language) {
        // Solo establecer cookie si los headers no han sido enviados
        if (!headers_sent()) {
            $expire = time() + (30 * 24 * 60 * 60); // 30 días
            $path = '/';
            $domain = '';
            $secure = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on';
            $httponly = false; // Permitir acceso desde JavaScript
            
            setcookie('kasaami_language', $language, $expire, $path, $domain, $secure, $httponly);
            return true;
        }
        return false; // No se pudo establecer la cookie
    }
    
    /**
     * Genera URLs con el parámetro de idioma apropiado
     */
    public static function buildUrl($path, $currentLang = null) {
        if ($currentLang === null) {
            $currentLang = self::detectLanguage();
        }
        
        // Para español, no añadir parámetro (URLs más limpias)
        if ($currentLang === 'es') {
            return $path;
        }
        
        // Para otros idiomas, añadir parámetro
        $separator = strpos($path, '?') === false ? '?' : '&';
        return $path . $separator . 'lang=' . $currentLang;
    }
    
    /**
     * Genera script JavaScript con la configuración actual
     */
    public static function getJavaScriptConfig($currentLang) {
        return "
        <script>
            // Configuración del idioma para JavaScript
            window.kasaamiLanguageConfig = {
                currentLang: '{$currentLang}',
                supportedLanguages: " . json_encode(self::$supportedLanguages) . ",
                defaultLanguage: '" . self::$defaultLanguage . "'
            };
        </script>";
    }
    
    /**
     * Actualiza todos los enlaces en un texto HTML para incluir el idioma
     */
    public static function updateLinksInContent($html, $currentLang) {
        if ($currentLang === 'es') {
            return $html; // No necesitamos modificar enlaces para español
        }
        
        // Buscar y actualizar enlaces internos .php
        $pattern = '/href=["\']([^"\']*\.php)(?:\?[^"\']*)?["\']/i';
        $replacement = function($matches) use ($currentLang) {
            $url = $matches[1];
            $separator = strpos($url, '?') === false ? '?' : '&';
            return 'href="' . $url . $separator . 'lang=' . $currentLang . '"';
        };
        
        return preg_replace_callback($pattern, $replacement, $html);
    }
    
    /**
     * Obtiene los idiomas soportados
     */
    public static function getSupportedLanguages() {
        return self::$supportedLanguages;
    }
    
    /**
     * Verifica si un idioma es soportado
     */
    public static function isSupported($language) {
        return in_array($language, self::$supportedLanguages);
    }
}

/**
 * Función helper global para detectar idioma
 */
function kasaami_detect_language() {
    return KasaamiLanguageManager::detectLanguage();
}

/**
 * Función helper global para construir URLs
 */
function kasaami_url($path, $currentLang = null) {
    return KasaamiLanguageManager::buildUrl($path, $currentLang);
}
?>