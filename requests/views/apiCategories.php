<?php
/**
 * Seen Jeem Game API - Categories Endpoint
 * 
 * Returns all available question categories with question counts
 */

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
            
            // Include all categories
            $categoriesWithCounts[] = [
                'id' => $category['id'],
                'title' => $category['title'],
                'image' => "logos/qas/categories/{$category['image']}",
                'questionCount' => $questionCount,
                'rank' => $category['rank']
            ];
        }
    }
    
    // Return success response
    echo json_encode([
        'status' => 'success',
        'data' => $categoriesWithCounts,
        'count' => count($categoriesWithCounts),
        'timestamp' => date('Y-m-d H:i:s')
    ]);
    
} catch (Exception $e) {
    // Return error response
    echo json_encode([
        'status' => 'error',
        'message' => $e->getMessage(),
        'timestamp' => date('Y-m-d H:i:s')
    ]);
}
?>
