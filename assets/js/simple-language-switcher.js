/**
 * Simple Language Switcher - Versión de respaldo simplificada
 */

(function() {
    'use strict';
    
    console.log('Inicializando Simple Language Switcher...');
    
    // Configuración
    const SUPPORTED_LANGUAGES = ['es', 'en'];
    const DEFAULT_LANGUAGE = 'es';
    const COOKIE_NAME = 'kasaami_language';
    
    // Funciones de utilidad para cookies
    function setCookie(name, value, days) {
        const expires = new Date();
        expires.setTime(expires.getTime() + (days * 24 * 60 * 60 * 1000));
        document.cookie = `${name}=${value};expires=${expires.toUTCString()};path=/;SameSite=Lax`;
    }
    
    function getCookie(name) {
        const nameEQ = name + "=";
        const ca = document.cookie.split(';');
        for (let i = 0; i < ca.length; i++) {
            let c = ca[i];
            while (c.charAt(0) === ' ') c = c.substring(1, c.length);
            if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length);
        }
        return null;
    }
    
    // Cambiar idioma
    function changeLanguage(newLang) {
        if (!SUPPORTED_LANGUAGES.includes(newLang)) {
            console.warn('Idioma no soportado:', newLang);
            return;
        }
        
        console.log('Cambiando idioma a:', newLang);
        
        // Guardar preferencia
        localStorage.setItem(COOKIE_NAME, newLang);
        setCookie(COOKIE_NAME, newLang, 30);
        
        // Construir nueva URL
        const url = new URL(window.location);
        
        if (newLang === 'es') {
            url.searchParams.delete('lang');
        } else {
            url.searchParams.set('lang', newLang);
        }
        
        // Redirigir
        window.location.href = url.toString();
    }
    
    // Configurar manejadores de eventos
    function setupEventHandlers() {
        document.addEventListener('click', function(e) {
            // Buscar si el elemento clickeado es un language switcher
            const target = e.target;
            
            if (target.classList.contains('language-switcher') || 
                target.closest('.language-switcher')) {
                
                e.preventDefault();
                
                const switcher = target.classList.contains('language-switcher') ? 
                                target : target.closest('.language-switcher');
                
                const targetLang = switcher.getAttribute('data-lang');
                
                console.log('Click en language switcher, target lang:', targetLang);
                
                if (targetLang && SUPPORTED_LANGUAGES.includes(targetLang)) {
                    changeLanguage(targetLang);
                } else {
                    console.warn('Idioma no válido en data-lang:', targetLang);
                }
            }
        });
        
        console.log('Event handlers configurados');
    }
    
    // Inicializar
    function init() {
        console.log('Configurando Simple Language Switcher...');
        
        // Verificar que hay elementos language-switcher
        const switchers = document.querySelectorAll('.language-switcher');
        console.log('Language switchers encontrados:', switchers.length);
        
        switchers.forEach((switcher, index) => {
            console.log(`Switcher ${index}:`, switcher.tagName, 
                       'data-lang:', switcher.getAttribute('data-lang'));
        });
        
        setupEventHandlers();
        
        console.log('Simple Language Switcher inicializado');
    }
    
    // Inicializar cuando DOM esté listo
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
    
})();