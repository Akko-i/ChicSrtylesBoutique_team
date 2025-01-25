<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Product - Chic Style Boutique</title>
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
                        <li><a href="products.php">Products →</a></li>
                        <li><a href="orders.php">Orders →</a></li>
                        <li><a href="customers.php">Customers →</a></li>
                        <li><a href="index.php">Log out →</a></li>
                    </ul>
                </nav>
            </div>
        </aside>

        <div class="flex2">  
            <main class="product-edit">
                <h2>Add New Product</h2>
                
                <form action="/update-product" method="POST" enctype="multipart/form-data">
                    <fieldset>
                        <label for="product-id">Product ID</label>
                        <input type="text" id="product-id" name="product_id" readonly placeholder="Auto-generated ID">
                    </fieldset>
                    <fieldset>
                        <label for="product-name">Product Name</label>
                        <input type="text" id="product-name" name="product_name" required>    
                    </fieldset>
                    <fieldset>
                        <label for="price">Price</label>
                        <input type="number" id="price" name="price" step="0.01" min="0" required>    
                    </fieldset>
                    <fieldset>
                        <label for="stock">Stock</label>
                        <input type="number" id="stock" name="stock" min="0" required>    
                    </fieldset>
                    <fieldset>
                        <label>Category</label>
                        <div class="category-group">
                            <label><input type="checkbox" name="category[]" value="Dresses"> Dresses</label>
                            <label><input type="checkbox" name="category[]" value="Accessories"> Accessories</label>
                            <label><input type="checkbox" name="category[]" value="New Arrivals"> New Arrivals</label>
                            <label><input type="checkbox" name="category[]" value="Latest Collection"> Latest Collection</label>
                        </div>    
                    </fieldset>
                    <fieldset class="thumnail">
                        <label for="image">Image</label>
                        <input type="file" id="image" name="image" accept="image/*">    
                    </fieldset>
                    <!-- Update Button -->
                    <div class="update_button">
                        <button type="update">Update Product</button>
                    </div>
                </form>
                
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