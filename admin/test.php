<?php
require_once '../db_connection.php'; // Include database connection

// Test database connection
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
} else {
    echo "Database connection successful.<br>";
}

// Test fetching data from the 'user' table
$sql = "SELECT * FROM user"; // Replace 'user' with your table name if it's different
$result = $conn->query($sql);

if (!$result) {
    die("Query failed: " . $conn->error); // Debug query errors
} else {
    if ($result->num_rows > 0) {
        echo "Query executed successfully. Found " . $result->num_rows . " rows.<br>";
        
        // Display the fetched data
        while ($row = $result->fetch_assoc()) {
            echo "<pre>";
            print_r($row); // Debug output of each row
            echo "</pre>";
        }
    } else {
        echo "Query executed successfully, but no rows found.";
    }
}

$inputPassword = "AdminPassword123!"; // Replace with the password you're testing
$hashedPassword = '$2y$10$46.eZM6PfofPFW87DwBC4.xh9SbDjGE7tNXLAs4Sii8pPRRrKO9KW'; // Replace with the hash from the database

if (password_verify($inputPassword, $hashedPassword)) {
    echo "Password is correct!";
} else {
    echo "Password is incorrect.";
}
?>


