<?php
// Database configuration
$host = 'localhost'; // Change if needed
$db = 'chic_styles'; // Database name
$user = 'root';      // Database username
$password = '';      // Database password (leave blank for default XAMPP)

// Create connection
$conn = new mysqli($host, $user, $password, $db);

// Check connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}
?>
