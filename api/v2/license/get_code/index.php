<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit;
}

$key = $_POST['key'] ?? null;
$resource = $_POST['resource'] ?? null;

if (!$key || !$resource) {
    http_response_code(400);
    echo json_encode(['error' => 'Missing key or resource']);
    exit;
}

// Simulate verification code (e.g., hash of key)
$code = substr(md5($key . $resource), 0, 8);

echo json_encode(['code' => $code]);
http_response_code(200);
