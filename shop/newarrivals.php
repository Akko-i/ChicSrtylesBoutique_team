<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Arrivals - Chic Style Boutique</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="shop.css">
    <script src="../script.js"></script>
    <script src="newarrivals.js"></script>

</head>

<?php include '../config.php'; ?>
<?php include '../header.php'; ?>
<body data-base-url="<?php echo BASE_URL; ?>">

    <!-- background-overlay -->
    <div id="overlay"></div>

    
    <main id="mainShop">

        <!-- breadcrumbs -->
        <nav class="breadcrumbs">
            <ol>
                <li><a href="../index.html">Home</a></li>
                <li><a href="index.html">Shop</a></li>
                <li>New Arrivals</li>
            </ol>

            <h2>New Arrivals</h2>
        </nav>

        <section class="sort_items">
            <p>Showing 3 results</p>

            <div>
                <label for="sort" class="visually-hidden">Sort items by:</label>
                <select id="sort">
                    <option value="newest">Newest</option>
                    <option value="oldest">Oldest</option>
                    <option value="price-high">Price: High to Low</option>
                    <option value="price-low">Price: Low to High</option>
                </select>
            </div>
        </section>

        <section id="product-list">
            <!-- products will be displayed from Database -->
        </section>
    
    </main>
    

    <?php include '../footer.php'; ?>

</body>
</html>