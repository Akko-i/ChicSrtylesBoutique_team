<?php
    require_once "../db_connection.php";

    if ($_SERVER["QUERY_STRING"] == "") {
        echo "Product ID not set";
        exit;
    }

    $stmt = $conn->prepare("SELECT * FROM Products WHERE Products.ProductID=" . $_SERVER["QUERY_STRING"]);
    $stmt -> execute();
    $products_result = $stmt->get_result();

    $product = [
        "ProductName" => "UNKNOWN", 
        "ProductImg" => "UNKNOWN", 
        "ProductImgLarge" => "UNKNOWN", 
        "ProductPrice" => 0
    ];
    if ($products_result->num_rows != 0) {
        $product = $products_result->fetch_assoc();
    }

    $stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $product["ProductName"]; ?> - Chic Style Boutique</title>
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
                <li><?php echo $product["ProductName"]; ?></li>
            </ol>
        </nav>

        <!-- Product Details Section -->
        <section class="product-details">
            <article class="product-container">

                <!-- Left: Product Thumbnail -->
                <figure class="product-thumbnail">
                        <a href="../img/shop/large/<?php echo $product["ProductImgLarge"]; ?>">
                            <?php
                                echo '<img src="../img/shop/' . $product["ProductImg"]. '" alt="' . $product["ProductName"] . '" title="' . $product["ProductName"] . '">';
                            ?>
                        </a>
                </figure>

                <!-- Right: Product Information -->
                <section class="product-info">
                    <?php
                    echo '<h2>'.$product["ProductName"].'</h2>
                    <p class="price">AUD ' . number_format((float)$product["ProductPrice"], 2, '.', '') . '</p>';
                    ?>

                    <form action="/cart/index.php" method="POST" >
                        <!-- Size -->
                        <section class="size-selector">
                            <label for="size">Select Size:</label>
                            <select id="size" name="size" required>
                                <option value="">-- Select a Size --</option>
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
                        
                        <input type="hidden" name="product_id" value="<?php echo $product["ProductID"]; ?>">
                        
                        <!-- Cart Button -->
                        <?php 
                        if (!$isUserLoggedIn) {
                            echo '<p>You must login to add this item to your cart.</p><br><br>';
                        } else {
                            echo '<button class="add-to-cart-button">Add to Cart</button>';
                        }
                        ?>
                    </form>
                    <!-- Product Description -->
                    <p class="product-description">
                        This beach vibes jewelry set includes a matching necklace and bracelet, both designed with natural stones and beads for a laid-back, bohemian look. Perfect for beach outings or summer festivals, this set adds a carefree, relaxed vibe to your look while maintaining an effortlessly chic style.
                    </p>
                </section>
            </article>
        </section>

    </main>
    

    <?php include '../footer.php'; ?>

</body>
</html>