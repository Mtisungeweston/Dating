<?php
require 'db_connection.php'; // Include your database connection file

if ($conn) {
    echo "Database connected successfully!";
} else {
    echo "Failed to connect to the database.";
}
?>
