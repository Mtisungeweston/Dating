<?php
// Start session to verify logged-in status
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    http_response_code(401); // Unauthorized
    echo json_encode(['error' => 'Unauthorized access']);
    exit();
}

// Include the database connection file
require 'db_connection.php';

// Check if the request is POST and contains the member ID
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['member_id'])) {
    $user_id = $_SESSION['user_id']; // Logged-in user ID
    $member_id = intval($_POST['member_id']); // ID of the member to be liked

    if ($user_id === $member_id) {
        // Prevent users from liking themselves
        http_response_code(400); // Bad Request
        echo json_encode(['error' => 'You cannot like yourself.']);
        exit();
    }

    try {
        // Check if the user has already liked this member
        $stmt = $pdo->prepare("
            SELECT id FROM likes 
            WHERE user_id = :user_id AND liked_member_id = :member_id
        ");
        $stmt->execute(['user_id' => $user_id, 'member_id' => $member_id]);
        
        if ($stmt->rowCount() > 0) {
            // User has already liked this member
            http_response_code(409); // Conflict
            echo json_encode(['error' => 'You have already liked this member.']);
            exit();
        }

        // Insert the like into the database
        $stmt = $pdo->prepare("
            INSERT INTO likes (user_id, liked_member_id, liked_at) 
            VALUES (:user_id, :member_id, NOW())
        ");
        $stmt->execute(['user_id' => $user_id, 'member_id' => $member_id]);

        // Return success response
        echo json_encode(['success' => 'Member liked successfully.']);

    } catch (PDOException $e) {
        // Handle database errors
        http_response_code(500); // Internal Server Error
        echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
    }
} else {
    // Invalid request
    http_response_code(400); // Bad Request
    echo json_encode(['error' => 'Invalid request.']);
}
?>
