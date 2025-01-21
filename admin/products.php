<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products - Chic Style Boutique</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="admin-dashboard.css">
    <script src="../script.js"></script>
    <script src="admin-dashboard.js"></script>
</head>
<body>
    <div class="flex">
        <aside>
            <div class="fix">
                <h1>CHIC STYLES BOUTIQUE</h1>
                <nav>
                    <ul>
                        <li><a href="products.phpl">Products →</a></li>
                        <li><a href="orders.php">Orders →</a></li>
                        <li><a href="customers.php">Customers →</a></li>
                        <li><a href="index.php">Log out →</a></li>
                    </ul>
                </nav>
            </div>
        </aside>

        <div class="flex2">
            <main>
                <h2>Products</h2>
                <button class="add-product-btn" type=”button” onclick="location.href='products_new.html'">+ Add New Product</button>

<div class="scrollable-table">
    <table class="product-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>AC1</td>
                <td><img src="../img/shop/AC1.png" alt="Beach vibes set"></td>
                <td>Beach vibes set</td>
                <td>$120</td>
                <td>30</td>
                <td>
                    <button class="edit-btn" type="button" onclick="location.href='products_edit.html'">Edit</button>
                    <button class="delete-btn" type="button">Delete</button>
                </td>
            </tr>
            <tr>
                <td>DR1</td>
                <td><img src="../img/shop/DR1.png" alt="Navy long dress"></td>
                <td>Navy long dress</td>
                <td>$120</td>
                <td>30</td>
                <td>
                    <button class="edit-btn" type="button" onclick="location.href='products_edit.html'">Edit</button>
                    <button class="delete-btn" type="button">Delete</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>
            </main>
            <footer>
                <div class="container">
                    <small>©2024 All Rights Reserved</small>
                </div>
            </footer>
        </div>
    </div>
    
</body>
</html>
