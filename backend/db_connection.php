<?php
// Database configuration
$host = getenv('DB_HOST') ?: 'localhost';       // Database host (uses environment variable if set)
$dbname = getenv('DB_NAME') ?: 'friendizo';     // Database name (uses environment variable if set)
$username = getenv('DB_USERNAME') ?: 'root';   // Database username (uses environment variable if set)
$password = getenv('DB_PASSWORD') ?: '';       // Database password (uses environment variable if set)

try {
    // Establish the database connection
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

    // Set PDO error mode to exception for better error handling
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Optional: Set default fetch mode to associative array
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    // Debugging: Comment out the next line in production
    // echo "Database connection successful!";
} catch (PDOException $e) {
    // Handle database connection error
    error_log("Database connection failed: " . $e->getMessage()); // Log error for troubleshooting
    die("Database connection failed. Please try again later."); // User-friendly error message
}
?>

