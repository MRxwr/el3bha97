<?php
/**
 * Seen Jeem Game API - Home Endpoint
 * 
 * This endpoint provides basic API information and available endpoints
 */

echo json_encode([
    'status' => 'success',
    'message' => 'Seen Jeem Game API is working!',
    'version' => '1.0.0',
    'timestamp' => date('Y-m-d H:i:s'),
    'endpoints' => [
        'categories' => [
            'url' => '?a=Categories',
            'method' => 'GET',
            'description' => 'Get all available question categories'
        ],
        'questions' => [
            'url' => '?a=Questions',
            'method' => 'POST',
            'description' => 'Get questions for selected categories',
            'parameters' => [
                'categories' => 'Array of category IDs'
            ]
        ],
        'types' => [
            'url' => '?a=Types',
            'method' => 'GET',
            'description' => 'Get all question types'
        ]
    ],
    'usage' => [
        'base_url' => '/requests/',
        'example' => '/requests/?a=Categories'
    ]
]);
?>