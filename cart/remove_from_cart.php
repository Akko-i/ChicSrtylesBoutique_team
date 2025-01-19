<?php

require_once '../db_connection.php';
session_start();

$stmt = $conn->prepare("DELETE FROM CartItems WHERE CartItems.UserID=" . $_SESSION["user_id"] . " AND CartItems.ProductID=" . $_SERVER["QUERY_STRING"]);
$stmt->execute();
$stmt->close();

echo "Removed from cart";