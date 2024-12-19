<?php
session_start();
session_unset(); // Clear all session variables
session_destroy(); // Destroy the session

// Redirect to the login page
header("Location: login-form.html");
exit();
?>
