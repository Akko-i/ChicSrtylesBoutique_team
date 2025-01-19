<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart - Chic Style Boutique</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="cart.css">
    <script src="../script.js"></script>
    <script src="cart.js"></script>
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
                <li>Cart</li>
            </ol>

            <h2>Cart</h2>
        </nav>

        <section class="cart">
            <table class="cart-table">
                <tbody>
                    <tr>
                        <td class="product">
                            <div class="product-info">
                                <img src="../img/shop/DR8.png" alt="White cotton dress">
                                <div class="product-details">
                                    <p><a href="../product/DR8.php">White cotton dress</a></p>
                                    <p class="subtotal">$120.00</p>
                                </div>
                            </div>
                        </td>
                        <td class="quantity">
                            <input type="number" value="1" min="1">
                            <button class="remove-item"><img src="../img/cart/icon-cross.svg" alt="Remove this product"></button>
                        </td>
                    </tr>
                    <tr>
                        <td class="product">
                            <div class="product-info">
                                <img src="../img/shop/AC8.png" alt="Double ring necklace">
                                <div class="product-details">
                                    <p><a href="../product/AC8.php">Double ring necklace</a></p>
                                    <p class="subtotal">$120.00</p>
                                </div>
                            </div>
                        </td>
                        <td class="quantity">
                            <input type="number" value="1" min="1">
                            <button class="remove-item"><img src="../img/cart/icon-cross.svg" alt="Remove this product"></button>
                        </td>
                    </tr>
                                    </tbody>
            </table>
        
            <div class="cart-totals">
                <div class="totals-row">
                    <span>Total</span>
                    <span>$240.00</span>
                </div>
            </div>
        
            <div class="cart-buttons">
                <button class="continue-shopping" type="button" onclick="location.href='../index.php'">← Continue Shopping</button>
                <button class="proceed-to-checkout" type="button" onclick="location.href='checkout.php'">Proceed to checkout →</button>
            </div>
        </section>
            
    </main>
    

    <?php include '../footer.php'; ?>

</body>
</html>
