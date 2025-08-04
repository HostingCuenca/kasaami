<?php
// includes/head-common.php
// Common head elements for all pages
?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Favicon -->
    <link rel="icon" type="image/jpeg" href="<?php echo $basePath ?? ''; ?>public/favicon.jpg">
    <link rel="shortcut icon" href="<?php echo $basePath ?? ''; ?>public/favicon.jpg">
    <link rel="apple-touch-icon" href="<?php echo $basePath ?? ''; ?>public/favicon.jpg">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Filson Pro Fonts -->
    <style>
        @font-face {
            font-family: 'Filson Pro';
            src: url('<?php echo $basePath ?? ''; ?>assets/fuentes/FilsonProRegular.woff2') format('woff2'),
                 url('<?php echo $basePath ?? ''; ?>assets/fuentes/FilsonProRegular.woff') format('woff');
            font-weight: 400;
            font-style: normal;
        }
        
        @font-face {
            font-family: 'Filson Pro';
            src: url('<?php echo $basePath ?? ''; ?>assets/fuentes/FilsonProMedium.woff2') format('woff2'),
                 url('<?php echo $basePath ?? ''; ?>assets/fuentes/FilsonProMedium.woff') format('woff');
            font-weight: 500;
            font-style: normal;
        }
        
        @font-face {
            font-family: 'Filson Pro';
            src: url('<?php echo $basePath ?? ''; ?>assets/fuentes/FilsonProBold.woff2') format('woff2'),
                 url('<?php echo $basePath ?? ''; ?>assets/fuentes/FilsonProBold.woff') format('woff');
            font-weight: 700;
            font-style: normal;
        }
        
        .font-filson { 
            font-family: 'Filson Pro', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif; 
        }
    </style>
    
    <!-- Custom Tailwind Config -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'filson': ['Filson Pro', 'sans-serif'],
                        'sans': ['Filson Pro', 'system-ui', 'sans-serif']
                    },
                    colors: {
                        'kasaami': {
                            'violet': '#8B5CF6',
                            'light-violet': '#C4B5FD', 
                            'dark-violet': '#6D28D9',
                            'pearl': '#F8FAFC',
                            'gold': '#F59E0B'
                        }
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.8s ease-in-out',
                        'slide-up': 'slideUp 0.6s ease-out',
                        'counter': 'counter 2s ease-out'
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' }
                        },
                        slideUp: {
                            '0%': { transform: 'translateY(30px)', opacity: '0' },
                            '100%': { transform: 'translateY(0)', opacity: '1' }
                        },
                        counter: {
                            '0%': { transform: 'scale(0.8)', opacity: '0' },
                            '100%': { transform: 'scale(1)', opacity: '1' }
                        }
                    }
                }
            }
        }
    </script>