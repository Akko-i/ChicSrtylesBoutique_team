<?php 

if (!$isUserLoggedIn) {
    return;
}

// Get cart items' product
$stmt = $conn->prepare("SELECT * FROM CartItems INNER JOIN Products ON CartItems.ProductID=Products.ProductID WHERE CartItems.UserID=" . $_SESSION["user_id"]);
$stmt -> execute();
$cart_items_result = $stmt->get_result();

$stmt->close();
