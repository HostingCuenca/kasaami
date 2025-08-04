/**
 * Kasaami Language Manager
 * Sistema de gestión de idiomas con persistencia usando localStorage y cookies
 */

class LanguageManager {
    constructor() {
        this.currentLang = this.getStoredLanguage();
        this.supportedLanguages = ['es', 'en'];
        this.init();
    }

    /**
     * Inicializa el sistema de idiomas
     */
    init() {
        this.setLanguageFromURL();
        this.updateAllLinks();
        this.attachLanguageHandlers();
        console.log('Language Manager initialized with language:', this.currentLang);
    }

    /**
     * Obtiene el idioma almacenado en localStorage o cookie
     */
    getStoredLanguage() {
        // Prioridad 1: localStorage
        let storedLang = localStorage.getItem('kasaami_language');
        
        // Prioridad 2: Cookie
        if (!storedLang) {
            storedLang = this.getCookie('kasaami_language');
        }
        
        // Prioridad 3: Default (español)
        // NO usamos detección automática del navegador para respetar la elección del usuario
        if (!storedLang) {
            storedLang = 'es';
        }
        
        // Validar idioma soportado
        return this.supportedLanguages.includes(storedLang) ? storedLang : 'es';
    }

    /**
     * Verifica y actualiza el idioma según la URL
     */
    setLanguageFromURL() {
        const urlParams = new URLSearchParams(window.location.search);
        const urlLang = urlParams.get('lang');
        
        if (urlLang && this.supportedLanguages.includes(urlLang)) {
            // Si hay parámetro en URL, usar ese y guardarlo
            if (urlLang !== this.currentLang) {
                this.setLanguage(urlLang);
            }
        }
        // NO redirigir automáticamente, dejar que el usuario elija
    }

    /**
     * Establece un nuevo idioma y lo guarda
     */
    setLanguage(lang) {
        if (!this.supportedLanguages.includes(lang)) {
            console.warn('Idioma no soportado:', lang);
            return;
        }

        this.currentLang = lang;
        
        // Guardar en localStorage
        localStorage.setItem('kasaami_language', lang);
        
        // Guardar en cookie (30 días)
        this.setCookie('kasaami_language', lang, 30);
        
        console.log('Idioma actualizado a:', lang);
    }

    /**
     * Cambia de idioma y redirige
     */
    changeLanguage(newLang) {
        this.setLanguage(newLang);
        this.redirectWithLanguage();
    }

    /**
     * Redirige a la página actual con el parámetro de idioma
     */
    redirectWithLanguage() {
        const url = new URL(window.location);
        
        if (this.currentLang === 'es') {
            // Para español, removemos el parámetro lang para URLs más limpias
            url.searchParams.delete('lang');
        } else {
            url.searchParams.set('lang', this.currentLang);
        }
        
        window.location.href = url.toString();
    }

    /**
     * Actualiza todos los enlaces en la página para preservar el idioma
     */
    updateAllLinks() {
        const links = document.querySelectorAll('a[href]');
        
        links.forEach(link => {
            const href = link.getAttribute('href');
            
            // Solo actualizar enlaces internos (no externos ni anchors)
            if (this.isInternalLink(href)) {
                const updatedHref = this.addLanguageToLink(href);
                link.setAttribute('href', updatedHref);
            }
        });
    }

    /**
     * Verifica si un enlace es interno
     */
    isInternalLink(href) {
        if (!href || href === '#') return false;
        
        // Excluir enlaces externos, mailto, tel, anchors, etc.
        return !href.startsWith('http') && 
               !href.startsWith('mailto:') && 
               !href.startsWith('tel:') && 
               !href.startsWith('#') &&
               !href.includes('wa.me') &&
               href.endsWith('.php');
    }

    /**
     * Añade el parámetro de idioma a un enlace si es necesario
     */
    addLanguageToLink(href) {
        try {
            if (this.currentLang === 'es') {
                // Para español no añadimos parámetro
                return href.split('?')[0];
            }
            
            // Para otros idiomas, añadir o actualizar parámetro lang
            const url = new URL(href, window.location.origin);
            url.searchParams.set('lang', this.currentLang);
            
            return url.pathname + url.search;
        } catch (error) {
            console.warn('Error procesando enlace:', href, error);
            return href; // Retornar el enlace original si hay error
        }
    }

    /**
     * Agrega manejadores de eventos a los selectores de idioma
     */
    attachLanguageHandlers() {
        console.log('Configurando manejadores de idioma...');
        
        // Usar event delegation para manejar selectores de idioma
        document.addEventListener('click', (e) => {
            console.log('Click detectado en:', e.target);
            
            const languageSwitcher = e.target.closest('.language-switcher');
            if (languageSwitcher) {
                console.log('Language switcher encontrado:', languageSwitcher);
                e.preventDefault();
                
                const targetLang = languageSwitcher.getAttribute('data-lang');
                console.log('Target language:', targetLang);
                
                if (targetLang && this.supportedLanguages.includes(targetLang)) {
                    console.log('Cambiando idioma a:', targetLang);
                    this.changeLanguage(targetLang);
                } else {
                    console.log('Idioma no válido o no soportado:', targetLang);
                }
            }
        });
        
        // También verificar que los elementos existen
        const languageSwitchers = document.querySelectorAll('.language-switcher');
        console.log('Elementos .language-switcher encontrados:', languageSwitchers.length);
        languageSwitchers.forEach((switcher, index) => {
            console.log(`Switcher ${index}:`, switcher, 'data-lang:', switcher.getAttribute('data-lang'));
        });
    }

    /**
     * Funciones de utilidad para cookies
     */
    setCookie(name, value, days) {
        const expires = new Date();
        expires.setTime(expires.getTime() + (days * 24 * 60 * 60 * 1000));
        document.cookie = `${name}=${value};expires=${expires.toUTCString()};path=/;SameSite=Lax`;
    }

    getCookie(name) {
        const nameEQ = name + "=";
        const ca = document.cookie.split(';');
        for (let i = 0; i < ca.length; i++) {
            let c = ca[i];
            while (c.charAt(0) === ' ') c = c.substring(1, c.length);
            if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length);
        }
        return null;
    }

    /**
     * API pública para obtener el idioma actual
     */
    getCurrentLanguage() {
        return this.currentLang;
    }

    /**
     * API pública para verificar si es un idioma específico  
     */
    isLanguage(lang) {
        return this.currentLang === lang;
    }
}

// Inicializar cuando el DOM esté listo
document.addEventListener('DOMContentLoaded', function() {
    try {
        console.log('Inicializando Language Manager...');
        window.languageManager = new LanguageManager();
        console.log('Language Manager inicializado correctamente');
    } catch (error) {
        console.error('Error inicializando Language Manager:', error);
    }
});

// También intentar inicializar si el DOM ya está listo
if (document.readyState === 'loading') {
    // DOM aún cargando, usar DOMContentLoaded
    console.log('DOM aún cargando, esperando DOMContentLoaded');
} else {
    // DOM ya está listo
    console.log('DOM ya listo, inicializando inmediatamente');
    try {
        window.languageManager = new LanguageManager();
    } catch (error) {
        console.error('Error inicializando Language Manager:', error);
    }
}

// Exportar para uso global
window.LanguageManager = LanguageManager;