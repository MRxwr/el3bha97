<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include your database connection and functions
include_once('admin/includes/config.php');
include_once('admin/includes/functions.php');

// Set content type to JSON
header('Content-Type: application/json');

try {
    // Get active and visible categories with question counts
    // Corrected: status = 0 (active), hidden = 0 (visible)
    $categories = selectDB("qas_categories", "`status` = '0' AND `hidden` = '0' ORDER BY `rank` ASC");
    
    $categoriesWithCounts = [];
    
    if ($categories) {
        foreach ($categories as $category) {
            // Count questions for each category
            $questionCount = 0;
            $questions = selectDB("qas_questions", "`categoryId` = '{$category['id']}' AND `status` = '0'");
            if ($questions) {
                $questionCount = count($questions);
            }
            
            // Include all categories (remove the 6 question minimum for now to debug)
            $categoriesWithCounts[] = [
                'id' => $category['id'],
                'title' => $category['title'],
                'image' => "logos/qas/categories/{$category['image']}",
                'questionCount' => $questionCount
            ];
        }
    }
    
    // If no categories found, return debug info
    if (empty($categoriesWithCounts)) {
        $debugInfo = [
            'debug' => true,
            'message' => 'No categories found',
            'total_categories' => selectDB("qas_categories", "1"),
            'active_categories' => selectDB("qas_categories", "`status` = '0'"),
            'visible_categories' => selectDB("qas_categories", "`status` = '0' AND `hidden` = '0'")
        ];
        echo json_encode($debugInfo);
    } else {
        echo json_encode($categoriesWithCounts);
    }
    
} catch (Exception $e) {
    // Return error details for debugging
    echo json_encode([
        'error' => true,
        'message' => $e->getMessage(),
        'file' => $e->getFile(),
        'line' => $e->getLine()
    ]);
}
?>
