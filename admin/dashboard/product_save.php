<?php
session_start();
require_once '../../config.php';
require_once '../../db_connection.php';

// Redirect to login if the admin is not logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: ' . BASE_URL . 'admin/index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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

    // Handle image upload
    $image_name = null;
    if (!empty($image['name'])) {
        $target_dir = "../../img/shop/";
        $image_name = time() . "_" . basename($image["name"]);
        $target_file = $target_dir . $image_name;

        if (!move_uploaded_file($image["tmp_name"], $target_file)) {
            die("Error uploading image.");
        }
    }

    // Insert product into the `product` table
    $sql = "INSERT INTO product (product_name, price, description, product_image) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sdss', $product_name, $price, $description, $image_name);

    if (!$stmt->execute()) {
        die("Error adding product: " . $stmt->error);
    }

    // Get the inserted product ID
    $product_id = $stmt->insert_id;

    // Insert categories into `product_categories` table
    $category_stmt = $conn->prepare("INSERT INTO product_categories (product_id, category_id) VALUES (?, ?)");
    foreach ($categories as $category_id) {
        $category_stmt->bind_param('ii', $product_id, $category_id);
        $category_stmt->execute();
    }

    // Insert stock into `product_size` table
    $size_stmt = $conn->prepare("INSERT INTO product_size (product_id, size_id, stock) VALUES (?, ?, ?)");
    foreach ($size_stock as $size_id => $stock) {
        $size_stmt->bind_param('iii', $product_id, $size_id, $stock);
        $size_stmt->execute();
    }

    // Redirect to product list with success message
    header('Location: ' . BASE_URL . 'admin/dashboard/products.php?success=1');
    exit();
} else {
    die("Invalid request.");
}
?>
