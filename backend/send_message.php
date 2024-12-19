<?php
// Start session to validate the logged-in user
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    http_response_code(401); // Unauthorized
    echo json_encode(['error' => 'Unauthorized access']);
    exit();
}

// Include the database connection file
require 'db_connection.php';

// Check if the request is POST and contains the necessary fields
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['recipient_id'], $_POST['message_content'])) {
    $sender_id = $_SESSION['user_id']; // Logged-in user ID
    $recipient_id = intval($_POST['recipient_id']); // Recipient ID
    $message_content = trim($_POST['message_content']); // Message content

    if (empty($message_content)) {
        http_response_code(400); // Bad Request
        echo json_encode(['error' => 'Message content cannot be empty.']);
        exit();
    }

    if ($sender_id === $recipient_id) {
        http_response_code(400); // Bad Request
        echo json_encode(['error' => 'You cannot send a message to yourself.']);
        exit();
    }

    try {
        // Check if the user has paid for unlimited messaging
        $stmt = $pdo->prepare("
            SELECT subscription_status 
            FROM members 
            WHERE id = :sender_id
        ");
        $stmt->execute(['sender_id' => $sender_id]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user || $user['subscription_status'] !== 'paid') {
            http_response_code(403); // Forbidden
            echo json_encode(['error' => 'Messaging requires a paid subscription.']);
            exit();
        }

        // Insert the message into the database
        $stmt = $pdo->prepare("
            INSERT INTO messages (sender_id, recipient_id, message_content, sent_at) 
            VALUES (:sender_id, :recipient_id, :message_content, NOW())
        ");
        $stmt->execute([
            'sender_id' => $sender_id,
            'recipient_id' => $recipient_id,
            'message_content' => $message_content
        ]);

        // Return success response
        echo json_encode(['success' => 'Message sent successfully.']);

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
