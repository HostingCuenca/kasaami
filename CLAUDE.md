# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

Kasaami Care & Beauty is a medical tourism website for cosmetic surgery services in Ecuador. It's a multi-language (Spanish/English) PHP-based website with a clean, modern design targeting international patients seeking medical procedures.

## Architecture

### Technology Stack
- **Backend**: Pure PHP (no framework) with MySQL database
- **Frontend**: Tailwind CSS (via CDN), vanilla JavaScript
- **Database**: MySQL with custom ORM-like Database class
- **Email**: SMTP via Hostinger (PHPMailer integration)
- **No build tools**: No package.json, webpack, or build processes

### File Structure
```
kasaami/
├── index.php                 # Homepage with hero, services, stats
├── router.php               # Simple router for clean URLs (/sobre-nosotros, /servicios, etc.)
├── bd.sql                   # Complete database schema with CRM tables, triggers, procedures
├── setup_database.php       # Database initialization and setup script
├── test_connection.php      # Database connectivity testing utility
├── includes/
│   ├── Navbar.php          # Universal navigation component with $basePath support
│   ├── Footer.php          # Universal footer component  
│   ├── FlotanteWpp.php     # Floating WhatsApp button
│   ├── database.php        # Core classes: Database, EmailService, LeadManager
│   ├── formulario.php      # Form handling with CRM integration and real-time availability
│   ├── language-manager.php # KasaamiLanguageManager class for server-side language detection
│   ├── init-language.php   # Language initialization helper for pages
│   ├── check_connection.php # Database connectivity testing
│   ├── check_availability.php # AJAX endpoint for real-time appointment availability
│   └── paises.php          # Countries data array for form dropdowns
├── componentes/
│   ├── testimonios.php     # Testimonials carousel component with embedded data
│   ├── formulario.php      # Integrated contact form component
│   └── procedimientos.php  # Procedures gallery component with multi-language support
├── assets/
│   ├── doctores/          # Doctor/medical procedure images
│   ├── tarjetas/          # Service card images  
│   ├── fuentes/           # Custom fonts (Filson Pro family)
│   ├── js/                # JavaScript utilities (language management)
│   ├── css/               # Additional stylesheets (including fonts.css for Filson Pro)
│   └── logos-*.png        # White/black logo variants for different backgrounds
├── crmkasaami/            # Complete CRM system for lead and appointment management
│   ├── dashboard.php      # Main CRM dashboard with charts and metrics
│   ├── leads.php          # Lead management interface
│   ├── appointments.php   # Appointment scheduling and management
│   ├── reports.php        # Analytics and reporting dashboard
│   ├── login.php          # CRM authentication system
│   ├── config.php         # CRM configuration and session management
│   ├── init_database.php  # CRM database tables initialization
│   ├── setup_user.php     # User account creation for CRM access
│   ├── test_all_pages.php # Complete CRM system testing utility
│   └── includes/          # CRM-specific includes (navbar, navigation, head-common)
└── public/
    └── favicon.png
```

### Key Pages
- `index.php` - Homepage with hero video, services grid, testimonials
- `servicios.php` - Services page with packages and detailed offerings
- `contactanos.php` - Contact form page with integrated CRM functionality
- `sobre-nosotros.php` - About us page with company information
- `procedimientos.php` - Medical procedures and treatments page
- `medicos-aliados.php` - Allied doctors and medical professionals page
- `router.php` - Simple router enabling clean URLs (routes: /sobre-nosotros, /servicios, /procedimientos, /medicos-aliados, /contactanos)

## Development Commands

**Important**: This project has no build tools or package managers. All development is done with plain PHP and static assets.

### Local Development
```bash
# Start PHP development server with router (recommended)
php -S localhost:8000 router.php

# Or serve directly without clean URLs
php -S localhost:8000

# Test database connection
php includes/check_connection.php

# Setup database (if needed)
php setup_database.php

# Debug database connection info
php -r "require_once 'includes/database.php'; debugDatabaseConnection();"

# Initialize CRM database tables
php crmkasaami/init_database.php

# Create CRM user account
php crmkasaami/setup_user.php

# Test all CRM functionality
php crmkasaami/test_all_pages.php
```

### Database Management
- MySQL database required for contact forms and CRM
- Configuration in `includes/database.php`
- Schema available in `bd.sql` (includes tables: leads, appointments, users, lead_activities)
- Test connection with `includes/check_connection.php`
- CRM database initialization via `crmkasaami/init_database.php`

### CRM System
- Complete lead management system in `crmkasaami/` directory
- Database tables: leads, appointments, users, lead_activities
- Lead scoring system based on budget (up to 50 points), travel type (up to 20 points), and engagement
- Email notifications via `EmailService` class in `database.php`
- Session-based authentication for CRM access
- Dashboard with charts, metrics, and analytics
- Real-time appointment scheduling with availability checking (max 3 appointments per time slot)
- Lead status tracking: nuevo → contactado → interesado → convertido/perdido
- Priority management: baja, media, alta, urgente

### File Serving
- Static assets (CSS, JS, images) are served directly
- No compilation or bundling required
- Tailwind CSS loaded via CDN

## Code Patterns and Conventions

### PHP Architecture
- **No framework**: Pure PHP with simple routing via `router.php`
- **Component includes**: Reusable components in `includes/` and `componentes/`
- **Multi-language**: Content arrays with `es`/`en` keys, `$currentLang` for language detection
- **Path handling**: Dynamic `$basePath` for root vs subdirectory compatibility
- **Database layer**: Custom Database class in `includes/database.php` with prepared statements and singleton pattern
- **Form handling**: Centralized form processing in `includes/formulario.php` with real-time availability checking
- **Configuration**: Constants defined in `includes/database.php` for DB, email, and app settings
- **CRM Integration**: `LeadManager` class handles lead creation, scoring, and appointment scheduling
- **Email system**: `EmailService` class manages automated notifications and confirmations
- **Error handling**: Comprehensive error logging and user-friendly error responses
- **Security**: Input sanitization, prepared statements, and CSRF protection considerations

### Styling Approach
- **Tailwind CSS**: Utility-first via CDN with custom config
- **Custom fonts**: Filson Pro font family (complete weights) via `assets/css/fonts.css`
- **Custom colors**: Kasaami brand colors defined in Tailwind config
- **Responsive design**: Mobile-first approach
- **Animations**: CSS keyframes and Tailwind animation utilities

### JavaScript Patterns
- **Vanilla JS**: No frameworks or libraries
- **Component-specific**: JavaScript embedded in PHP files where needed
- **Intersection Observer**: For scroll animations and lazy loading
- **Event handling**: Standard DOM manipulation

### Navigation System
- **Universal navbar**: `includes/Navbar.php` with transparent/solid states and dynamic `$basePath`
- **Active page detection**: PHP-based current page highlighting using `$currentPage` variable
- **Mobile responsive**: Hamburger menu with smooth transitions
- **Logo switching**: White logo on transparent, black on solid background
- **Root detection**: `$isRoot` variable determines if navbar is on homepage or internal page

### Content Management
- **Inline content arrays**: Multi-language content defined in each PHP file with `es`/`en` structure
- **Language detection**: `KasaamiLanguageManager` class handles detection via URL params, cookies, and defaults
- **Language initialization**: `includes/init-language.php` provides consistent language setup
- **Component data**: Testimonials and procedures data embedded in component files (`componentes/`)
- **Image paths**: Relative paths with `$basePath` for universal compatibility
- **Countries data**: Centralized in `includes/paises.php` for form dropdowns
- **Typography**: Filson Pro font family with utility classes (`.filson-thin` to `.filson-black`)

## Common Development Tasks

### Adding New Pages
1. Create new PHP file in root directory
2. Set required variables:
   ```php
   <?php
   $pageTitle = "Page Title";
   $currentPage = "page-name"; // For navbar active state
   require_once 'includes/init-language.php'; // Sets $currentLang
   ?>
   ```
3. Define content arrays with `es`/`en` keys
4. Include navigation: `<?php include 'includes/Navbar.php'; ?>`
5. Include footer: `<?php include 'includes/Footer.php'; ?>`
6. Include WhatsApp button: `<?php include 'includes/FlotanteWpp.php'; ?>`
7. Update `router.php` routes array if using clean URLs
8. Use `$basePath` for asset paths to ensure cross-directory compatibility

### Database Operations
- Include database: `require_once 'includes/database.php';`
- Use Database class methods with prepared statements
- Test connections with `Database::testConnection()`
- Handle errors gracefully with try-catch blocks

### Form Integration
- Include form handler: `require_once 'includes/formulario.php';`
- Include countries data: `require_once 'includes/paises.php';`
- Use POST method with proper validation
- Implement CSRF protection where needed

### Multi-language Support
- Include language initialization: `require_once 'includes/init-language.php';`
- Define content arrays with `es` and `en` keys
- Use `KasaamiLanguageManager::detectLanguage()` for proper language detection
- Access translations via `$content[$currentLang]` structure
- Language persistence via cookies managed by `KasaamiLanguageManager`
- URL building with language parameters via `KasaamiLanguageManager::buildUrl()`

### CRM Operations
- Include CRM classes: `require_once 'includes/database.php';`
- Use `LeadManager` class for lead creation and management
- Lead scoring automatically calculated based on form data (budget, travel type, contact preference, etc.)
- Email notifications sent via `EmailService` class
- Activity logging via `LeadManager::logActivity()` method
- Real-time availability checking via AJAX calls to `includes/check_availability.php`
- Appointment scheduling with conflict detection (max 3 per time slot)
- Lead status tracking: nuevo → contactado → interesado → convertido/perdido

## Important Notes

- **No build process**: Changes are reflected immediately - this is a pure PHP application
- **CDN dependencies**: Tailwind CSS and Google Fonts loaded externally
- **Database credentials**: Located in `includes/database.php` - keep secure, move to environment variables in production
- **WhatsApp integration**: Update phone number in `FlotanteWpp.php` and `WHATSAPP_NUMBER` constant (`593963052401`)
- **Asset paths**: Always use `$basePath` variable for cross-directory compatibility
- **Router usage**: Clean URLs require server configuration or use of `router.php` with PHP dev server
- **Email configuration**: SMTP settings via Hostinger in `includes/database.php` (info@kasaamigroup.com)
- **Timezone**: Set to 'America/Guayaquil' in database configuration
- **Database naming**: Uses `softvjrr_kasaamidb` database name with `softvjrr_admin` user
- **Language detection**: Uses `KasaamiLanguageManager` class with URL params, cookies, and defaults
- **Path handling**: `$basePath` automatically detects if running from root or subdirectory
- **Navigation state**: `$currentPage` variable controls active page highlighting in navbar
- **Lead scoring**: Automatic scoring system based on budget (up to 50 points), travel type (up to 20 points), and other factors
- **Availability system**: Real-time appointment scheduling with 3-appointment-per-slot limit
- **Session management**: CRM system uses PHP sessions for authentication

## Security Considerations

- Database uses prepared statements to prevent SQL injection
- Form validation implemented in `includes/formulario.php`
- Sensitive credentials should be moved to environment variables in production
- Debug mode should be disabled in production (`$debug_mode = false`)

## Testing

No automated testing framework. Manual testing required:

### Core Website Testing
- Test all pages in both languages (es/en) via `?lang=es` and `?lang=en` parameters
- Verify responsive design on mobile/desktop breakpoints
- Test navigation across all pages and clean URL routing
- Verify WhatsApp button functionality and correct phone number
- Check image loading and asset paths with `$basePath`
- Test language switching and cookie persistence

### Database and Backend Testing
- Test database connectivity: `php includes/check_connection.php`
- Test CRM database setup: `php crmkasaami/init_database.php`
- Test all CRM pages: `php crmkasaami/test_all_pages.php`
- Verify contact form submissions and CRM lead creation
- Test appointment scheduling and availability checking
- Verify lead scoring calculations and status transitions

### Email and Communication Testing
- Test email notifications (confirmation and commercial)
- Verify SMTP configuration and email delivery
- Test form data sanitization and validation
- Check CRM dashboard functionality and data display
- Test session management and authentication flows
# important-instruction-reminders
Do what has been asked; nothing more, nothing less.
NEVER create files unless they're absolutely necessary for achieving your goal.
ALWAYS prefer editing an existing file to creating a new one.
NEVER proactively create documentation files (*.md) or README files. Only create documentation files if explicitly requested by the User.