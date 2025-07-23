<?php
// Simple test file to check database connection and functions
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<h2>Database Connection Test</h2>";

// Try different include paths
$possible_paths = [
    'admin/includes/config.php',
    '../admin/includes/config.php',
    './admin/includes/config.php'
];

foreach ($possible_paths as $path) {
    if (file_exists($path)) {
        echo "<p>✅ Found config at: $path</p>";
        include_once($path);
        break;
    } else {
        echo "<p>❌ Config not found at: $path</p>";
    }
}

$function_paths = [
    'admin/includes/functions.php',
    '../admin/includes/functions.php',
    './admin/includes/functions.php'
];

foreach ($function_paths as $path) {
    if (file_exists($path)) {
        echo "<p>✅ Found functions at: $path</p>";
        include_once($path);
        break;
    } else {
        echo "<p>❌ Functions not found at: $path</p>";
    }
}

// Test if selectDB function exists
if (function_exists('selectDB')) {
    echo "<p>✅ selectDB function exists</p>";
    
    // Test database connection
    try {
        $test = selectDB("qas_categories", "1 LIMIT 1");
        if ($test) {
            echo "<p>✅ Database connection successful</p>";
            echo "<p>Sample category: " . print_r($test[0], true) . "</p>";
            
            // Get all categories
            $all_categories = selectDB("qas_categories", "1");
            echo "<p>Total categories in database: " . (is_array($all_categories) ? count($all_categories) : 0) . "</p>";
            
            // Get active categories
            $active_categories = selectDB("qas_categories", "`status` = '0'");
            echo "<p>Active categories: " . (is_array($active_categories) ? count($active_categories) : 0) . "</p>";
            
            // Get visible categories
            $visible_categories = selectDB("qas_categories", "`status` = '0' AND `hidden` = '1'");
            echo "<p>Visible categories: " . (is_array($visible_categories) ? count($visible_categories) : 0) . "</p>";
            
            if (is_array($visible_categories) && count($visible_categories) > 0) {
                echo "<h3>Visible Categories:</h3>";
                foreach ($visible_categories as $cat) {
                    echo "<p>ID: {$cat['id']}, Title: {$cat['title']}, Hidden: {$cat['hidden']}, Status: {$cat['status']}</p>";
                }
            }
            
        } else {
            echo "<p>❌ No categories found or database error</p>";
        }
    } catch (Exception $e) {
        echo "<p>❌ Database error: " . $e->getMessage() . "</p>";
    }
} else {
    echo "<p>❌ selectDB function not found</p>";
}
?>
