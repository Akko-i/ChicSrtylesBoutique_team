<?php 
    require_once "cart_db_connect.php";

    if ($_POST) {
        // Insert products into cart item
        $stmt = $conn->prepare("INSERT INTO CartItems (UserID, ProductID, ProductAmount) VALUES (?, ?, ?);");
        $stmt->execute(['1', '3', $_POST["amount"]]);
    }

    require_once "fetch_cart.php";
?>
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
<body>
    <header id="header_fix">
        <div class="container">
            <!-- Hamburger menu (SP only) -->
            <button class="hamburger" id="hamburgerBtn">
                <span></span>
                <span></span>
            </button>
    
            <!-- Navigation -->
            <nav id="mainNav">
                <ul class="main-menu">
                    <li class="dropdown">
                        <a href="../shop/index.html">Shop</a>
                        <ul class="submenu" id="submenu">
                            <li><a href="../shop/newarrivals.html">New Arrivals →</a></li>
                            <li><a href="../shop/collection.html">Latest Collection →</a></li>
                            <li><a href="../shop/dresses.html">Dresses →</a></li>
                            <li><a href="../shop/accessories.html">Accessories →</a></li>
                        </ul>
                    </li>
                    <li><a href="../lookbook/index.html">Look Book</a></li>
                    <li><a href="../blogs/index.html">Blogs</a></li>
                </ul>
            </nav>
    
            <!-- Logo -->
            <h1><a href="../index.html"><img src="../img/header/logo.png" alt="Chic Styles Boutique" title="Chic Styles Boutique"></a></h1>
    
            <!-- Icons -->
            <ul class="header-icons">
                <li><a href="../login/index.html"><img src="../img/header/icon-mypage.png" alt="My Page" title="My Page"></a></li>
                <li><a href="../cart/cart.php"><img src="../img/header/icon-cart.png" alt="Cart" title="Cart"></a></li>
            </ul>
        </div>
    </header>

    <!-- background-overlay -->
    <div id="overlay"></div>
    
    <main>

        <!-- breadcrumbs -->
        <nav class="breadcrumbs">
            <ol>
                <li><a href="../index.html">Home</a></li>
                <li>Cart</li>
            </ol>

            <h2>Cart</h2>
        </nav>

        <section class="cart">
            <table class="cart-table">
                <tbody>   
                    <?php 
                        $row_num = 0;
                        $total_price =0;
                        while ($row_num < $cart_items_result->num_rows) {
                            $row = $cart_items_result->fetch_assoc();
                            $cart_item_price = $row["ProductPrice"] * $row["ProductAmount"];
                            $total_price += $cart_item_price;
                            echo
                            '<tr>
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
                                    <input type="number" value="'.$row["ProductAmount"].'" min="1">
                                    <button class="remove-item"><img src="../img/cart/icon-cross.svg" alt="Remove this product"></button>
                                </td>
                            </tr>';
                            $row_num++;
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
                <button class="continue-shopping" type="button" onclick="location.href='../index.html'">← Continue Shopping</button>
                <button class="proceed-to-checkout" type="button" onclick="location.href='checkout.php'">Proceed to checkout →</button>
            </div>
        </section>
            
    </main>
    

    <footer>
        <div class="container">
            <div class="footer_flex">
                <div class="footer_flex2">
                    <ul>
                        <li><a href="../shop/index.html">Shop</a></li>
                        <li><a href="../lookbook/index.html">Look Book</a></li>
                        <li><a href="../blogs/index.html">Blogs</a></li>
                    </ul>
                    <ul>  
                        <li><a href="../contactus/index.html">Cart</a></li>
                        <li><a href="../aboutus/index.html">About Us</a></li>
                        <li><a href="../privacypolicy/index.html">Privacy Policy</a></li>
                        <li><a href="../termsofuse/index.html">Terms of Use</a></li>
                    </ul>
                </div>
                <ul class="sns_icon">
                    <li><a href="https://www.instagram.com/" target="_blank"><img src="../img/footer/icon-insta.png" alt="Instagram"></a></li>
                    <li><a href="https://www.facebook.com/" target="_blank"><img src="../img/footer/icon-fb.png" alt="Facebook"></a></li>
                </ul>
            </div>
            <small>©2024 All Rights Reserved</small>
        </div>
    </footer>


</body>
</html>

<?php $conn->close(); ?>