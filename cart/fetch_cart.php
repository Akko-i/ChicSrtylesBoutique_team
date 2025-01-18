<?php 

// Get cart items' product
$stmt = $conn->prepare("SELECT * FROM CartItems INNER JOIN Products ON CartItems.ProductID=Products.ProductID");
$stmt -> execute();
$cart_items_result = $stmt->get_result();

$stmt->close();