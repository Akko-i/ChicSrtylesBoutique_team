<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>White Cotton Dress - Chic Style Boutique</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="product.css">
    <script src="../script.js"></script>
    <script src="product.js"></script>
</head>

<?php include '../config.php'; ?>
<?php include '../header.php'; ?>
<body data-base-url="<?php echo BASE_URL; ?>">

    <!-- background-overlay -->
    <div id="overlay"></div>

    
    <main>

        <!-- breadcrumbs -->
        <nav class="breadcrumbs">
            <ol>
                <li><a href="../index.php">Home</a></li>
                <li><a href="../shop/index.php">Shop</a></li>
                <li>White Cotton Dress</li>
            </ol>
        </nav>

        <!-- Product Details Section -->
        <section class="product-details">
            <article class="product-container">

                <!-- Left: Product Thumbnail -->
                <figure class="product-thumbnail">
                        <a href="../img/shop/DR8_large.png"><img src="../img/shop/DR8.png" alt="White Cotton Dress" title="White Cotton Dress"></a>
                </figure>

                <!-- Right: Product Information -->
                <section class="product-info">
                    <h2>White Cotton Dress</h2>
                    <p class="price">AUD 120.00</p>

                    <!-- Size -->
                    <section class="size-selector">
                        <label for="size">Select Size:</label>
                        <select id="size" name="size" required>
                            <option value="">-- Select a Size --</option> <!-- Default empty option -->
                            <option value="S">Small</option>
                            <option value="M">Medium</option>
                            <option value="L">Large</option>
                            <option value="XL">X-Large</option>
                        </select>
                        <p id="sizeError">Please select a size before adding to the cart.</p>
                    </section>

                    <!-- Amount Selection -->
                    <section class="amount-selector">
                        <label for="amount">Amount :</label>
                        <input type="number" id="amount" name="amount" value="1" min="1" max="3">
                    </section>

                    <!-- Cart Button with validateForm trigger -->
                    <button class="add-to-cart-button" onclick="validateForm(event)">Add to Cart</button>


                    <!-- Product Description -->
                    <p class="product-description">
                        Crafted from premium cotton, this maxi dress in a white hue offers effortless style and comfort. Perfect for resort getaways or casual outings, its flowing silhouette flatters every figure. Pair it with minimal accessories for a timeless, chic look.
                    </p>
                </section>
            </article>
        </section>

    </main>
    
    <?php include '../footer.php'; ?>

</body>
</html>