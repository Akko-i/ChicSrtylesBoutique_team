<?php

session_start();
require_once '../../config.php';
require_once '../../db_connection.php';

// Redirect to login if the admin is not logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: ' . BASE_URL . 'admin/index.php');
    exit();
}

// Check if form is submitted via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get product details
    $product_id = intval($_POST['product_id']);
    $product_name = $_POST['product_name'];
    $price = floatval($_POST['price']);
    $description = $_POST['description'];
    $categories = isset($_POST['categories']) ? $_POST['categories'] : [];
    $size_stock = isset($_POST['size_stock']) ? $_POST['size_stock'] : [];
    $image = $_FILES['image'];

    // Validate required fields
    if (empty($product_name) || empty($price) || empty($description)) {
        die("All fields are required.");
    }

    // Update product details
    $sql = "UPDATE product SET product_name = ?, price = ?, description = ? WHERE product_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sdsi', $product_name, $price, $description, $product_id);
    if (!$stmt->execute()) {
        die("Error updating product: " . $conn->error);
    }

    // Handle image upload (if a new image is uploaded)
    if (!empty($image['name'])) {
        $target_dir = "../../img/shop/";
        $target_file = $target_dir . basename($image["name"]);
        if (move_uploaded_file($image["tmp_name"], $target_file)) {
            $sql = "UPDATE product SET product_image = ? WHERE product_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('si', $image['name'], $product_id);
            $stmt->execute();
        } else {
            die("Error uploading image.");
        }
    }

    // Update categories
    $conn->query("DELETE FROM product_categories WHERE product_id = $product_id");
    $category_stmt = $conn->prepare("INSERT INTO product_categories (product_id, category_id) VALUES (?, ?)");
    foreach ($categories as $category_id) {
        $category_stmt->bind_param('ii', $product_id, $category_id);
        $category_stmt->execute();
    }

    // Update size-specific stock
    foreach ($size_stock as $size_id => $stock) {
        $size_stmt = $conn->prepare("
            INSERT INTO product_size (product_id, size_id, stock) 
            VALUES (?, ?, ?) 
            ON DUPLICATE KEY UPDATE stock = VALUES(stock)
        ");
        $size_stmt->bind_param('iii', $product_id, $size_id, $stock);
        if (!$size_stmt->execute()) {
            die("Error updating size stock: " . $size_stmt->error);
        }
    }

    // Redirect to product listing or success page
    header('Location: ' . BASE_URL . 'admin/dashboard/products.php?success=1');
    exit();
} else {
    die("Invalid request.");
}
?>
