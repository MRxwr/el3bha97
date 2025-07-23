<?php
// Include your database connection and functions
include_once('../admin/includes/config.php');
include_once('../admin/includes/functions.php');

// Set content type to JSON
header('Content-Type: application/json');

try {
    // Get active and visible categories with question counts
    $categories = selectDB("qas_categories", "`status` = '0' AND `hidden` = '1' ORDER BY `rank` ASC");
    
    $categoriesWithCounts = [];
    
    if ($categories) {
        foreach ($categories as $category) {
            // Count questions for each category
            $questionCount = 0;
            $questions = selectDB("qas_questions", "`categoryId` = '{$category['id']}' AND `status` = '0'");
            if ($questions) {
                $questionCount = count($questions);
            }
            
            // Only include categories that have at least 6 questions
            if ($questionCount >= 6) {
                $categoriesWithCounts[] = [
                    'id' => $category['id'],
                    'title' => $category['title'],
                    'image' => $category['image'],
                    'questionCount' => $questionCount
                ];
            }
        }
    }
    
    echo json_encode($categoriesWithCounts);
    
} catch (Exception $e) {
    // Return empty array on error
    echo json_encode([]);
}
?>
