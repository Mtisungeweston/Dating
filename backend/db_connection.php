<?php
// Database configuration
$host = 'localhost';       // Database host
$dbname = 'friendizo';     // Database name
$username = 'root';        // Database username
$password = '';            // Database password

try {
    // Establish the database connection
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

    // Set PDO error mode to exception for better error handling
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Output success message for debugging (optional, comment out in production)
    // echo "Database connection successful!";
} catch (PDOException $e) {
    // Handle database connection error
    die("Database connection failed: " . $e->getMessage());
}
?>
