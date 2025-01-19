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
<?php
    require_once "../db_connection.php";

    if ($_POST) {
        // Insert products into cart item
        $stmt = $conn->prepare("INSERT INTO CartItems (UserID, ProductID, ProductAmount) VALUES (?, ?, ?);");
        $stmt->execute([$_SESSION['user_id'], $_POST["product_id"], $_POST["amount"]]);
    }

    require_once "fetch_cart.php";
?>
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
            <?php 
                if (!$isUserLoggedIn) {
                    echo "<p>You must be logged in to view or add to your cart</p>";
                }
            ?>
            <table class="cart-table">
                <tbody>
                <?php
                    $total_price = 0;
                    $row_num = 0;
                    if ($isUserLoggedIn) {
                        while ($row_num < $cart_items_result->num_rows) {
                            $row = $cart_items_result->fetch_assoc();
                            $cart_item_price = $row["ProductPrice"] * $row["ProductAmount"];
                            $total_price += $cart_item_price;
                            echo
                            '<tr id="product_' . $row["ProductID"] . '">
                                <td class="product">
                                    <div class="product-info">
                                        <img src="../img/shop/'.$row["ProductImg"].'" alt="' . $row["ProductName"] . '">
                                        <div class="product-details">
                                            <p><a href="../product/AC8.html">' . $row["ProductName"] . '</a></p>
                                            <p class="subtotal"> $' .number_format((float)$cart_item_price, 2, '.', '') . '</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="quantity">
                                    <input type="number" value="'.$row["ProductAmount"].'" min="1" onchange="onUpdateItemAmountInCart('.$row["ProductID"].', this.value)">
                                    <button class="remove-item" onclick="onRemoveFromCartClicked('. $row["ProductID"] .');"><img src="../img/cart/icon-cross.svg" alt="Remove this product"></button>
                                </td>
                            </tr>';
                            $row_num++;
                        }
                    }
                ?>
                </tbody>
            </table>
        
            <div class="cart-totals">
                <div class="totals-row">
                    <span>Total</span>
                    <span><?php echo "$" .number_format((float)$total_price, 2, '.', ''); ?></span>
                </div>
            </div>
        
            <div class="cart-buttons">
                <button class="continue-shopping" type="button" onclick="location.href='../index.php'">← Continue Shopping</button>
                <?php if ($row_num > 0 /* At least one item*/) { ?>
                <button class="proceed-to-checkout" type="button" onclick="location.href='checkout.php'">Proceed to checkout →</button>
                <?php } ?>
            </div>
        </section>
            
    </main>
    

    <?php include '../footer.php'; ?>

</body>
</html>

<?php $conn->close(); ?>