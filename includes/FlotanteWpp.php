<?php
// includes/FlotanteWpp.php
$whatsapp_number = "593XXXXXXXXX"; // Cambiar por el número real
$whatsapp_message = urlencode($t['whatsapp']['message'] ?? "Hola! Me interesa conocer más sobre los servicios de Kasaami Care & Beauty.");
?>

<!-- WhatsApp Floating Button -->
<div class="fixed bottom-6 right-6 z-50" id="whatsapp-float">
    <a href="https://wa.me/<?php echo $whatsapp_number; ?>?text=<?php echo $whatsapp_message; ?>" 
       target="_blank" 
       rel="noopener noreferrer"
       class="whatsapp-btn group flex items-center justify-center bg-green-500 hover:bg-green-600 text-white rounded-full shadow-2xl hover:shadow-green-500/25 transition-all duration-300 transform hover:scale-110"
       aria-label="Contactar por WhatsApp">
        
        <!-- WhatsApp Icon -->
        <svg class="w-8 h-8 transition-transform duration-300 group-hover:scale-110" fill="currentColor" viewBox="0 0 24 24">
            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"/>
        </svg>
        
        <!-- Tooltip -->
        <div class="tooltip absolute right-full mr-3 top-1/2 transform -translate-y-1/2 bg-gray-900 text-white text-sm px-3 py-2 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap pointer-events-none">
            <?php echo $t['whatsapp']['tooltip'] ?? 'Escríbenos por WhatsApp'; ?>
            <div class="absolute left-full top-1/2 transform -translate-y-1/2 w-0 h-0 border-l-4 border-l-gray-900 border-y-4 border-y-transparent"></div>
        </div>
    </a>
    
    <!-- Pulse Animation Ring -->
    <div class="absolute inset-0 bg-green-400 rounded-full animate-ping opacity-30"></div>
    <div class="absolute inset-0 bg-green-400 rounded-full animate-pulse opacity-20"></div>
</div>

<style>
.whatsapp-btn {
    width: 60px;
    height: 60px;
    position: relative;
    animation: float 3s ease-in-out infinite;
}

@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-6px); }
}

/* Hover effect para el botón */
.whatsapp-btn:hover {
    transform: translateY(-6px) scale(1.1);
}

/* Animación de entrada */
#whatsapp-float {
    animation: slideInUp 0.8s ease-out 2s both;
}

@keyframes slideInUp {
    0% {
        transform: translateY(100px);
        opacity: 0;
    }
    100% {
        transform: translateY(0);
        opacity: 1;
    }
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .whatsapp-btn {
        width: 56px;
        height: 56px;
    }
    
    .whatsapp-btn svg {
        width: 1.75rem;
        height: 1.75rem;
    }
    
    .tooltip {
        display: none; /* Hide tooltip on mobile */
    }
}

/* Accessibility */
.whatsapp-btn:focus {
    outline: 2px solid #10B981;
    outline-offset: 2px;
}

/* Custom pulse animation for the rings */
@keyframes custom-ping {
    75%, 100% {
        transform: scale(2);
        opacity: 0;
    }
}
</style>

<script>
// WhatsApp Button Behavior
document.addEventListener('DOMContentLoaded', function() {
    const whatsappBtn = document.getElementById('whatsapp-float');
    let isVisible = false;
    
    // Show button after page load
    setTimeout(() => {
        if (whatsappBtn) {
            whatsappBtn.style.opacity = '1';
            isVisible = true;
        }
    }, 2000);
    
    // Hide/show on scroll (optional)
    let lastScrollY = window.scrollY;
    window.addEventListener('scroll', () => {
        if (!isVisible) return;
        
        const currentScrollY = window.scrollY;
        
        if (currentScrollY > lastScrollY && currentScrollY > 300) {
            // Scrolling down - hide button
            whatsappBtn.style.transform = 'translateY(100px)';
            whatsappBtn.style.opacity = '0';
        } else {
            // Scrolling up - show button
            whatsappBtn.style.transform = 'translateY(0)';
            whatsappBtn.style.opacity = '1';
        }
        
        lastScrollY = currentScrollY;
    });
    
    // Track WhatsApp clicks (optional analytics)
    const whatsappLink = whatsappBtn?.querySelector('a');
    if (whatsappLink) {
        whatsappLink.addEventListener('click', function() {
            // Analytics tracking
            if (typeof gtag !== 'undefined') {
                gtag('event', 'whatsapp_click', {
                    event_category: 'engagement',
                    event_label: 'floating_button'
                });
            }
        });
    }
});
</script>