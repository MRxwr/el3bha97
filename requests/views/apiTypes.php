<?php
/**
 * Seen Jeem Game API - Types Endpoint
 * 
 * Returns all available question types
 */

try {
    // Get active and visible question types
    $types = selectDB("qas_types", "`status` = '0' AND `hidden` = '0' ORDER BY `rank` ASC");
    
    $typesData = [];
    
    if ($types) {
        foreach ($types as $type) {
            // Count questions for each type
            $questionCount = 0;
            $questions = selectDB("qas_questions", "`typeId` = '{$type['id']}' AND `status` = '0'");
            if ($questions) {
                $questionCount = count($questions);
            }
            
            $typesData[] = [
                'id' => $type['id'],
                'title' => $type['title'],
                'questionCount' => $questionCount,
                'rank' => $type['rank']
            ];
        }
    }
    
    // Return success response
    echo json_encode([
        'status' => 'success',
        'data' => $typesData,
        'count' => count($typesData),
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
