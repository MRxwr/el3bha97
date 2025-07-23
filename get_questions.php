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
    if (!isset($_POST['categories']) || !is_array($_POST['categories'])) {
        throw new Exception('No categories provided');
    }
    
    $categoryIds = $_POST['categories'];
    $questions = [];
    
    foreach ($categoryIds as $categoryId) {
        // Get category info
        $category = selectDB("qas_categories", "`id` = '{$categoryId}' AND `status` = '0'");
        if (!$category) continue;
        
        $categoryName = $category[0]['title'];
        
        // Get 6 random questions from this category
        $categoryQuestions = selectDB("qas_questions", 
            "`categoryId` = '{$categoryId}' AND `status` = '0' AND `hidden` = '0' ORDER BY RAND() LIMIT 6");
        
        if ($categoryQuestions) {
            foreach ($categoryQuestions as $question) {
                $questions[] = [
                    'id' => $question['id'],
                    'question' => $question['question'],
                    'answer' => $question['answer'],
                    'categoryId' => $question['categoryId'],
                    'categoryName' => $categoryName,
                    'typeId' => $question['typeId'],
                    'points' => $question['points'],
                    'image' => $question['image'],
                    'video' => $question['video'],
                    'audio' => $question['audio']
                ];
            }
        }
    }
    
    // Shuffle all questions for random order
    shuffle($questions);
    
    echo json_encode($questions);
    
} catch (Exception $e) {
    echo json_encode([
        'error' => true,
        'message' => $e->getMessage(),
        'file' => $e->getFile(),
        'line' => $e->getLine()
    ]);
}
?>
