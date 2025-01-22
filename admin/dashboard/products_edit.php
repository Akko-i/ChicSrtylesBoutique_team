<?php
session_start();
require_once '../../config.php';
require_once '../../db_connection.php';

// Redirect to login if the admin is not logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: ' . BASE_URL . 'admin/index.php');
    exit();
}

// Get the product_id from the query string
$product_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Fetch product details
$sql = "SELECT * FROM product WHERE product_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $product_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows !== 1) {
    die("Product not found.");
}
$product = $result->fetch_assoc();

// Fetch all categories
$categories = $conn->query("SELECT * FROM category");

// Fetch selected categories for the product
$selected_categories = [];
$category_result = $conn->prepare("SELECT category_id FROM product_categories WHERE product_id = ?");
$category_result->bind_param('i', $product_id);
$category_result->execute();
$category_result = $category_result->get_result();
while ($row = $category_result->fetch_assoc()) {
    $selected_categories[] = $row['category_id'];
}

// Fetch all sizes
$sizes = $conn->query("SELECT * FROM size");

// Fetch stock for each size for the product
$size_stock = [];
$size_result = $conn->prepare("SELECT size_id, stock FROM product_size WHERE product_id = ?");
$size_result->bind_param('i', $product_id);
$size_result->execute();
$size_result = $size_result->get_result();
while ($row = $size_result->fetch_assoc()) {
    $size_stock[$row['size_id']] = $row['stock'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product - Chic Style Boutique</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>style.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>admin/dashboard/admin-dashboard.css">
</head>
<body>
    <div class="flex">
        <?php include 'sidebar.php'; ?>

        <div class="flex2">
            <main class="product-edit">
                <h2>Edit Product</h2>
                
                <form action="product_update.php" method="POST" enctype="multipart/form-data">
                    <fieldset>
                        <label for="product-id">Product ID</label>
                        <input type="text" id="product-id" name="product_id" readonly value="<?php echo htmlspecialchars($product['product_id']); ?>">
                    </fieldset>
                    <fieldset>
                        <label for="product-name">Product Name</label>
                        <input type="text" id="product-name" name="product_name" required value="<?php echo htmlspecialchars($product['product_name']); ?>">
                    </fieldset>
                    <fieldset>
                        <label for="price">Price</label>
                        <input type="number" id="price" name="price" step="0.01" min="0" required value="<?php echo htmlspecialchars($product['price']); ?>">
                    </fieldset>
                    <fieldset>
                        <label for="description">Description</label>
                        <textarea id="description" name="description" rows="4" required><?php echo htmlspecialchars($product['description']); ?></textarea>
                    </fieldset>
                    <fieldset>
                        <label>Categories</label>
                        <div class="category-group">
                            <?php while ($category = $categories->fetch_assoc()): ?>
                                <label>
                                    <input type="checkbox" name="categories[]" value="<?php echo $category['category_id']; ?>" 
                                    <?php echo in_array($category['category_id'], $selected_categories) ? 'checked' : ''; ?>>
                                    <?php echo htmlspecialchars($category['category_name']); ?>
                                </label>
                            <?php endwhile; ?>
                        </div>
                    </fieldset>
                    <fieldset>
                        <label>Size and Stock</label>
                        <div class="size-group">
                            <?php while ($size = $sizes->fetch_assoc()): ?>
                                <label>
                                    <strong><?php echo htmlspecialchars($size['size_value']); ?></strong>
                                    <input type="number" name="size_stock[<?php echo $size['size_id']; ?>]" min="0" 
                                           value="<?php echo isset($size_stock[$size['size_id']]) ? $size_stock[$size['size_id']] : 0; ?>">
                                </label>
                            <?php endwhile; ?>
                        </div>
                    </fieldset>
                    <fieldset class="thumbnail">
                        <label for="image">Image</label>
                        <input type="file" id="image" name="image" accept="image/*">
                        <?php if (!empty($product['product_image'])): ?>
                            <p>Current Image:</p>
                            <img src="<?php echo BASE_URL . 'img/shop/' . htmlspecialchars($product['product_image']); ?>" alt="Product Image" style="max-width: 150px;">
                        <?php endif; ?>
                    </fieldset>
                    <div class="update_button">
                        <button type="submit">Update Product</button>
                    </div>
                </form>
            </main>
            <footer>
                <div class="container">
                    <small>©<?php echo date('Y'); ?> All Rights Reserved</small>
                </div>
            </footer>

        </div>
    </div>
</body>
</html>
