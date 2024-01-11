<?php

function validateInput($data)
{
    if (isset($data['product_id'], $data['user_id'], $data['review_text']) && !empty($data['product_id']) && !empty($data['user_id']) && !empty($data['review_text'])) {
        if (is_numeric($data['product_id']) && is_numeric($data['user_id'])) {
            return true;
        }
    }

    return false;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $json_data = file_get_contents('php://input');
    $data = json_decode($json_data, true);

    if (validateInput($data)) {
        // Database operations (uncomment and customize as needed)
        // $db = new PDO('mysql:host=localhost;dbname=your_database', 'your_username', 'your_password');
        // ... perform database operations ...

        $response = array('status' => 'success', 'message' => 'Review submitted successfully');
        http_response_code(200);
    } else {
        $response = array('status' => 'error', 'message' => 'Invalid input data');
        http_response_code(400);
    }

    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    header('HTTP/1.1 405 Method Not Allowed');
    header('Allow: POST');
    echo json_encode(array('status' => 'error', 'message' => 'Invalid request method'));
    http_response_code(405);
}
