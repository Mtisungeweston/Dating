<?php
// Start session to check for logged-in status
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    http_response_code(401); // Unauthorized
    echo json_encode(['error' => 'Unauthorized access']);
    exit();
}

// Include the database connection file
require 'db_connection.php';

try {
    // Get the logged-in user's ID
    $user_id = $_SESSION['user_id'];

    // Optional: Add location filter or other criteria if needed
    // Example: Fetch nearby users (within the same city or region)

    // Query to fetch member profiles excluding the current user
    $stmt = $pdo->prepare("
        SELECT 
            id, 
            name, 
            location, 
            photo 
        FROM 
            members 
        WHERE 
            id != :user_id
        ORDER BY 
            RAND() 
        LIMIT 10
    ");
    $stmt->execute(['user_id' => $user_id]);

    // Fetch all members
    $members = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Return members as JSON
    header('Content-Type: application/json');
    echo json_encode($members);

} catch (PDOException $e) {
    // Handle database errors
    http_response_code(500); // Internal Server Error
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>
