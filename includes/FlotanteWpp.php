<?php
// includes/FlotanteWpp.php
$whatsapp_number = "593963052401"; // Número de WhatsApp
$whatsapp_message = "Hola! Me interesa conocer más sobre los servicios de Kasaami Care & Beauty.";
$whatsapp_url = "https://wa.me/" . $whatsapp_number . "?text=" . urlencode($whatsapp_message);
?>

<!-- WhatsApp Floating Button -->
<div class="fixed bottom-6 right-6 z-50" id="whatsapp-float">
    <a href="<?php echo $whatsapp_url; ?>" 
       target="_blank" 
       rel="noopener noreferrer"
       class="whatsapp-btn"
       onclick="openWhatsApp()"
       title="Contactar por WhatsApp">
        
        <!-- WhatsApp Icon -->
        <svg width="28" height="28" fill="white" viewBox="0 0 24 24">
            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"/>
        </svg>
        
        <!-- Pulse effect -->
        <div class="pulse-ring"></div>
        <div class="pulse-ring pulse-ring-2"></div>
    </a>
</div>

<style>
/* WhatsApp Button Styles */
.whatsapp-btn {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, #8B5CF6 0%, #7C3AED 100%);
    border-radius: 50%;
    box-shadow: 0 4px 15px rgba(139, 92, 246, 0.2);
    transition: all 0.3s ease;
    position: relative;
    text-decoration: none;
    cursor: pointer;
    z-index: 2;
    border: 2px solid rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(10px);
}

.whatsapp-btn:hover {
    transform: scale(1.05);
    box-shadow: 0 8px 25px rgba(139, 92, 246, 0.4);
    background: linear-gradient(135deg, #7C3AED 0%, #6D28D9 100%);
    border-color: rgba(255, 255, 255, 0.3);
}

.whatsapp-btn:active {
    transform: scale(0.95);
}

/* Pulse Animation */
.pulse-ring {
    position: absolute;
    width: 100%;
    height: 100%;
    border: 2px solid #C4B5FD;
    border-radius: 50%;
    animation: pulse 2s infinite;
    z-index: 1;
    opacity: 0.3;
}

.pulse-ring-2 {
    animation-delay: 1s;
    opacity: 0.7;
}

@keyframes pulse {
    0% {
        transform: scale(1);
        opacity: 1;
    }
    50% {
        transform: scale(1.3);
        opacity: 0.7;
    }
    100% {
        transform: scale(1.6);
        opacity: 0;
    }
}

/* Float animation */
#whatsapp-float {
    animation: float 3s ease-in-out infinite;
}

@keyframes float {
    0%, 100% { 
        transform: translateY(0px); 
    }
    50% { 
        transform: translateY(-8px); 
    }
}

/* Responsive */
@media (max-width: 768px) {
    .whatsapp-btn {
        width: 56px;
        height: 56px;
    }
    
    .whatsapp-btn svg {
        width: 24px;
        height: 24px;
    }
    
    #whatsapp-float {
        bottom: 20px;
        right: 20px;
    }
}

/* Ensure button is clickable */
.whatsapp-btn * {
    pointer-events: none;
}

.whatsapp-btn {
    pointer-events: all;
}
</style>

<script>
function openWhatsApp() {
    // Debug log
    console.log('WhatsApp button clicked!');
    
    // Fallback URL construction
    const phoneNumber = '<?php echo $whatsapp_number; ?>';
    const message = encodeURIComponent('<?php echo $whatsapp_message; ?>');
    const whatsappURL = `https://wa.me/${phoneNumber}?text=${message}`;
    
    console.log('Opening URL:', whatsappURL);
    
    // Try multiple methods to ensure it opens
    try {
        // Method 1: Direct window.open
        const newWindow = window.open(whatsappURL, '_blank', 'noopener,noreferrer');
        
        // Method 2: If window.open fails, try location
        if (!newWindow) {
            window.location.href = whatsappURL;
        }
        
        // Method 3: For mobile devices, try the app scheme
        if (/Android|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
            setTimeout(() => {
                window.location.href = `whatsapp://send?phone=${phoneNumber}&text=${message}`;
            }, 500);
        }
        
    } catch (error) {
        console.error('Error opening WhatsApp:', error);
        // Final fallback
        window.location.href = whatsappURL;
    }
    
    return false; // Prevent default link behavior
}

// Alternative click handler
document.addEventListener('DOMContentLoaded', function() {
    const whatsappBtn = document.querySelector('#whatsapp-float .whatsapp-btn');
    
    if (whatsappBtn) {
        console.log('WhatsApp button found and ready');
        
        // Add multiple event listeners for maximum compatibility
        whatsappBtn.addEventListener('click', function(e) {
            e.preventDefault();
            console.log('Click event triggered');
            openWhatsApp();
        });
        
        whatsappBtn.addEventListener('touchstart', function(e) {
            console.log('Touch event triggered');
        });
        
        // Test click programmatically
        setTimeout(() => {
            console.log('WhatsApp button is ready for clicks');
        }, 1000);
    } else {
        console.error('WhatsApp button not found!');
    }
});

// Debug: Click anywhere to test
console.log('WhatsApp component loaded. Button URL: <?php echo $whatsapp_url; ?>');
</script> 