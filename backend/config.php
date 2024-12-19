<?php
// Database configuration
$host = 'localhost';       // Database host
$dbname = 'friendizo_db';  // Database name
$username = 'root';        // Database username
$password = '';            // Database password

try {
    // Create a new PDO instance
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

    // Set PDO error mode to exception for better error handling
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Enable persistent connections for performance optimization
    $pdo->setAttribute(PDO::ATTR_PERSISTENT, true);

    // Output success message (optional for debugging)
    // echo "Database connection successful!";
} catch (PDOException $e) {
    // Handle connection error
    die("Database connection failed: " . $e->getMessage());
}
?>
