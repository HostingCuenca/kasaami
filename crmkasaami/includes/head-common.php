<?php
// crmkasaami/includes/head-common.php
// Common head elements for CRM pages
?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Favicon -->
    <link rel="icon" type="image/jpeg" href="../public/favicon.jpg">
    <link rel="shortcut icon" href="../public/favicon.jpg">
    <link rel="apple-touch-icon" href="../public/favicon.jpg">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Fuentes personalizadas Kasaami -->
    <style>
        @font-face {
            font-family: 'Filson Pro';
            src: url('../assets/fuentes/FilsonProRegular.woff2') format('woff2'),
                 url('../assets/fuentes/FilsonProRegular.woff') format('woff');
            font-weight: 400;
            font-style: normal;
        }
        
        @font-face {
            font-family: 'Filson Pro';
            src: url('../assets/fuentes/FilsonProMedium.woff2') format('woff2'),
                 url('../assets/fuentes/FilsonProMedium.woff') format('woff');
            font-weight: 500;
            font-style: normal;
        }
        
        @font-face {
            font-family: 'Filson Pro';
            src: url('../assets/fuentes/FilsonProBold.woff2') format('woff2'),
                 url('../assets/fuentes/FilsonProBold.woff') format('woff');
            font-weight: 700;
            font-style: normal;
        }
        
        .font-filson { font-family: 'Filson Pro', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif; }
        .text-kasaami-violet { color: #8B5CF6; }
        .bg-kasaami-violet { background-color: #8B5CF6; }
        .border-kasaami-violet { border-color: #8B5CF6; }
        .hover\:bg-kasaami-dark-violet:hover { background-color: #7C3AED; }
        
        .navbar-gradient {
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
            backdrop-filter: blur(10px);
        }
        
        .kasaami-violet { color: #8B5CF6; }
        .kasaami-violet-bg { background-color: #8B5CF6; }
        .kasaami-dark-violet { color: #7C3AED; }
        .kasaami-light-violet { color: #C4B5FD; }
        .kasaami-border { border-color: #8B5CF6; }
        
        .nav-link {
            position: relative;
            transition: all 0.3s ease;
            font-weight: 500;
        }
        
        .nav-link:hover {
            color: #8B5CF6;
            transform: translateY(-1px);
        }
        
        .nav-link.active {
            color: #8B5CF6;
            border-bottom: 2px solid #8B5CF6;
        }
        
        .nav-link.active::before {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, #8B5CF6, #C4B5FD);
            border-radius: 1px;
        }
        
        .avatar-gradient {
            background: linear-gradient(135deg, #8B5CF6 0%, #7C3AED 100%);
        }
        
        .notification-badge {
            position: absolute;
            top: -2px;
            right: -2px;
            width: 8px;
            height: 8px;
            background: #EF4444;
            border-radius: 50%;
            border: 2px solid white;
        }
    </style>
    
    <!-- Custom Tailwind Config -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'kasaami': {
                            'violet': '#8B5CF6',
                            'light-violet': '#C4B5FD', 
                            'dark-violet': '#6D28D9',
                            'pearl': '#F8FAFC',
                            'gold': '#F59E0B'
                        }
                    }
                }
            }
        }
    </script>