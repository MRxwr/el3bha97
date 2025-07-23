<?php
/**
 * Seen Jeem Game API - Questions Endpoint
 * 
 * Returns questions for selected categories
 */

try {
    // Check if categories are provided
    $input = json_decode(file_get_contents('php://input'), true);
    $categoryIds = $input['categories'] ?? $_POST['categories'] ?? null;
    
    if (!$categoryIds || !is_array($categoryIds)) {
        throw new Exception('No categories provided. Please send categories as an array.');
    }
    
    $questions = [];
    $debug_info = [];
    
    foreach ($categoryIds as $categoryId) {
        // Validate category ID
        if (!is_numeric($categoryId)) {
            $debug_info[] = "Invalid category ID: $categoryId";
            continue;
        }
        
        // Get category info
        $category = selectDB("qas_categories", "`id` = '{$categoryId}' AND `status` = '0'");
        if (!$category) {
            $debug_info[] = "Category not found for ID: $categoryId";
            continue;
        }
        
        $categoryName = $category[0]['title'];
        $debug_info[] = "Found category: $categoryName (ID: $categoryId)";
        
        // Get 6 random questions from this category with different point values
        $categoryQuestions = selectDB("qas_questions", 
            "`categoryId` = '{$categoryId}' AND `status` = '0' AND `hidden` = '0' ORDER BY RAND() LIMIT 6");
        
        $questionCount = $categoryQuestions ? count($categoryQuestions) : 0;
        $debug_info[] = "Found $questionCount questions for category $categoryName";
        
        if ($categoryQuestions) {
            // Assign point values (200, 400, 600) - 2 questions each
            $pointValues = [200, 200, 400, 400, 600, 600];
            
            foreach ($categoryQuestions as $index => $question) {
                $points = isset($pointValues[$index]) ? $pointValues[$index] : 200;
                
                $questions[] = [
                    'id' => $question['id'],
                    'question' => $question['question'],
                    'answer' => $question['answer'],
                    'categoryId' => $question['categoryId'],
                    'categoryName' => $categoryName,
                    'typeId' => $question['typeId'],
                    'points' => $points, // Use assigned points instead of database points
                    'image' => $question['image'] ?: null,
                    'video' => $question['video'] ?: null,
                    'audio' => $question['audio'] ?: null,
                    'date' => $question['date']
                ];
            }
        }
    }
    
    // Shuffle all questions for random order
    shuffle($questions);
    
    // Return success response
    echo json_encode([
        'status' => 'success',
        'data' => $questions,
        'count' => count($questions),
        'categories_requested' => count($categoryIds),
        'questions_per_category' => 6,
        'debug_info' => $debug_info,
        'received_categories' => $categoryIds,
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
