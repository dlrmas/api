<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405); // Method Not Allowed
    exit;
}

$resource = $_POST['resource'] ?? null;
$platform = $_POST['platform'] ?? null;
$user     = $_POST['user'] ?? null;

if (!$resource || !$platform || !$user) {
    http_response_code(400); // Bad Request
    echo json_encode(['error' => 'Missing required parameters']);
    exit;
}

// Simulate a key response
$timestamp = time() + (7 * 24 * 60 * 60); // 7 days from now
$key = base64_encode("valid_{$timestamp}");

echo json_encode(['key' => $key]);
http_response_code(200);
