<?php

require_once '../db_connection.php';
session_start();

$data = explode("&", $_SERVER["QUERY_STRING"]);
$productID = $data[0];
$newAmount = $data[1];

$stmt = $conn->prepare("UPDATE CartItems SET ProductAmount=" . $newAmount . " WHERE CartItems.UserID=" . $_SESSION["user_id"] . " AND CartItems.ProductID=" . $productID);
$stmt->execute();
$stmt->close();

echo "Updated cart";