<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gold thin rings - Chic Style Boutique</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="product.css">
    <script src="../script.js"></script>
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
                <li>Gold thin rings</li>
            </ol>
        </nav>

        <!-- Product Details Section -->
        <section class="product-details">
            <article class="product-container">

                <!-- Left: Product Thumbnail -->
                <figure class="product-thumbnail">
                        <a href="../img/shop/AC4_large.png"><img src="../img/shop/AC4.png" alt="Gold thin rings" title="Gold thin rings"></a>
                </figure>

                <!-- Right: Product Information -->
                <section class="product-info">
                    <h2>Gold thin rings</h2>
                    <p class="price">AUD 80.00</p>

                    <!-- Size -->
                    <!-- <section class="size-selector">
                        <label for="size">Select Size:</label>
                        <select id="size" name="size" required>
                            <option value="">-- Select a Size --</option>
                            <option value="S">Small</option>
                            <option value="M">Medium</option>
                            <option value="L">Large</option>
                            <option value="XL">X-Large</option>
                        </select>
                        <p id="sizeError">Please select a size before adding to the cart.</p>
                    </section> -->

                    <!-- Amount Selection -->
                    <section class="amount-selector">
                        <label for="amount">Amount :</label>
                        <input type="number" id="amount" name="amount" value="1" min="1" max="3">
                    </section>

                    <!-- Cart Button -->
                    <button class="add-to-cart-button">Add to Cart</button>

                    <!-- Product Description -->
                    <p class="product-description">
                        These minimalistic gold thin rings are perfect for stacking or wearing individually. Made from high-quality gold, they add an understated elegance to any outfit. Whether paired with casual or formal wear, these rings offer a sleek, sophisticated style that’s timeless and versatile.
                    </p>
                </section>
            </article>
        </section>

    </main>
    

    <?php include '../footer.php'; ?>

</body>
</html>