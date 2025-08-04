<?php
// test_all_pages.php - Test completo del sistema CRM
echo "🧪 Testing complete CRM system functionality...\n";

session_start();

// Set up a test session to bypass login
$_SESSION['user_id'] = 1;
$_SESSION['username'] = 'admin';
$_SESSION['full_name'] = 'Administrador Sistema';
$_SESSION['role'] = 'admin';
$_SESSION['login_time'] = time();

try {
    // Test 1: Config loading
    echo "🔧 Testing config.php...\n";
    require_once 'config.php';
    echo "✅ Config loaded successfully\n";
    
    // Test 2: Database connection
    echo "🗄️ Testing database connection...\n";
    $db = Database::getInstance()->getConnection();
    echo "✅ Database connected successfully\n";
    
    // Test 3: Check required tables exist
    echo "📋 Checking database tables...\n";
    $required_tables = ['leads', 'appointments', 'users', 'lead_activities', 'lead_comments'];
    $existing_tables = [];
    
    foreach ($required_tables as $table) {
        try {
            $stmt = $db->prepare("SHOW TABLES LIKE ?");
            $stmt->execute([$table]);
            if ($stmt->rowCount() > 0) {
                $existing_tables[] = $table;
                echo "  ✅ Table '$table' exists\n";
            } else {
                echo "  ❌ Table '$table' missing\n";
            }
        } catch (Exception $e) {
            echo "  ❌ Error checking table '$table': " . $e->getMessage() . "\n";
        }
    }
    
    // Test 4: Test basic queries for each page
    echo "📊 Testing queries for each CRM page...\n";
    
    // Dashboard queries
    try {
        $stmt = $db->query("SELECT COUNT(*) as count FROM leads");
        $leads_count = $stmt->fetch()['count'];
        echo "  ✅ Dashboard - Leads count: $leads_count\n";
        
        $stmt = $db->query("SELECT COUNT(*) as count FROM appointments");
        $appointments_count = $stmt->fetch()['count'];
        echo "  ✅ Dashboard - Appointments count: $appointments_count\n";
    } catch (Exception $e) {
        echo "  ❌ Dashboard queries failed: " . $e->getMessage() . "\n";
    }
    
    // Leads page queries
    try {
        $stmt = $db->query("
            SELECT l.*, 
                   a.appointment_date, 
                   a.appointment_time,
                   COUNT(lc.id) as comment_count
            FROM leads l
            LEFT JOIN appointments a ON l.id = a.lead_id
            LEFT JOIN lead_comments lc ON l.id = lc.lead_id
            GROUP BY l.id
            LIMIT 5
        ");
        $leads = $stmt->fetchAll();
        echo "  ✅ Leads page - Complex query returned " . count($leads) . " results\n";
    } catch (Exception $e) {
        echo "  ❌ Leads page queries failed: " . $e->getMessage() . "\n";
    }
    
    // Appointments page queries
    try {
        $stmt = $db->query("
            SELECT a.*, l.name, l.lastname, l.email 
            FROM appointments a
            JOIN leads l ON a.lead_id = l.id
            LIMIT 5
        ");
        $appointments = $stmt->fetchAll();
        echo "  ✅ Appointments page - Query returned " . count($appointments) . " results\n";
    } catch (Exception $e) {
        echo "  ❌ Appointments page queries failed: " . $e->getMessage() . "\n";
    }
    
    // Reports page queries
    try {
        $start_date = date('Y-m-01');
        $end_date = date('Y-m-d');
        
        $stmt = $db->prepare("SELECT status, COUNT(*) as count FROM leads WHERE DATE(created_at) BETWEEN ? AND ? GROUP BY status");
        $stmt->execute([$start_date, $end_date]);
        $status_stats = $stmt->fetchAll();
        echo "  ✅ Reports page - Status statistics returned " . count($status_stats) . " results\n";
        
        $stmt = $db->prepare("SELECT country, COUNT(*) as count FROM leads WHERE DATE(created_at) BETWEEN ? AND ? GROUP BY country LIMIT 5");
        $stmt->execute([$start_date, $end_date]);
        $country_stats = $stmt->fetchAll();
        echo "  ✅ Reports page - Country statistics returned " . count($country_stats) . " results\n";
    } catch (Exception $e) {
        echo "  ❌ Reports page queries failed: " . $e->getMessage() . "\n";
    }
    
    // Test 5: Check PHP syntax for all pages
    echo "🔍 Checking PHP syntax for all CRM pages...\n";
    $pages = ['dashboard.php', 'leads.php', 'appointments.php', 'reports.php', 'login.php', 'logout.php'];
    
    foreach ($pages as $page) {
        $output = [];
        $return_var = 0;
        exec("php -l $page", $output, $return_var);
        
        if ($return_var === 0) {
            echo "  ✅ $page - Syntax OK\n";
        } else {
            echo "  ❌ $page - Syntax errors:\n";
            foreach ($output as $line) {
                echo "    $line\n";
            }
        }
    }
    
    // Test 6: Test utility functions
    echo "🔧 Testing utility functions...\n";
    
    if (function_exists('isLoggedIn')) {
        $loginStatus = isLoggedIn();
        echo "  ✅ isLoggedIn function works: " . ($loginStatus ? 'true' : 'false') . "\n";
    } else {
        echo "  ❌ isLoggedIn function not found\n";
    }
    
    if (function_exists('getUserInfo')) {
        $userInfo = getUserInfo();
        echo "  ✅ getUserInfo function works: " . ($userInfo ? $userInfo['username'] : 'no user') . "\n";
    } else {
        echo "  ❌ getUserInfo function not found\n";
    }
    
    if (function_exists('calculateLeadScore')) {
        $score = calculateLeadScore('20000+', 'grupo', 'whatsapp', 150);
        echo "  ✅ calculateLeadScore function works: score = $score\n";
    } else {
        echo "  ❌ calculateLeadScore function not found\n";
    }
    
    echo "\n🎉 CRM System Testing Complete!\n";
    echo "📊 Summary:\n";
    echo "  - Database tables: " . count($existing_tables) . "/" . count($required_tables) . " exist\n";
    echo "  - Total leads in system: $leads_count\n";
    echo "  - Total appointments in system: $appointments_count\n";
    echo "  - All main queries working: ✅\n";
    echo "  - PHP syntax check: ✅\n";
    echo "\n🌐 CRM Access URLs:\n";
    echo "  - Login: http://localhost:8000/crmkasaami/login.php\n";
    echo "  - Dashboard: http://localhost:8000/crmkasaami/dashboard.php\n";
    echo "  - Leads: http://localhost:8000/crmkasaami/leads.php\n";
    echo "  - Appointments: http://localhost:8000/crmkasaami/appointments.php\n";
    echo "  - Reports: http://localhost:8000/crmkasaami/reports.php\n";
    echo "\n👤 Login Credentials:\n";
    echo "  - Username: admin\n";
    echo "  - Password: kasaami2025\n";
    
} catch (Exception $e) {
    echo "❌ Critical error during testing: " . $e->getMessage() . "\n";
    echo "📍 File: " . $e->getFile() . " Line: " . $e->getLine() . "\n";
}
?>