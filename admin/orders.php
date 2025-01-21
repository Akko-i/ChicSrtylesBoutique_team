<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders - Chic Style Boutique</title>
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
            <main>
                <h2>Orders</h2>
                <div class="scrollable-table">
                    <table class="product-table">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Order Date</th>
                                <th>Customer</th>
                                <th>Ship to</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>00002</td>
                                <td>12 Dec 2022</td>
                                <td>Akiko Ishijima</td>
                                <td>Level 1/31 Market St, Sydney NSW 2000 <br>
                                    Australia <br>
                                    +61 41234 5678
                                </td>
                                <td>Shipped</td>
                                <td>
                                    <button class="order-view-btn" type="button" onclick="location.href='order_details_fulfill.php'">View Details</button>
                                </td>
                            </tr>
                            <tr>
                                <td>00001</td>
                                <td>24 Jan 2022</td>
                                <td>John Benny</td>
                                <td>Level 1/31 Market St, Sydney NSW 2000 <br>
                                    Australia <br>
                                    +61 41234 5678
                                </td>
                                <td>Processing</td>
                                <td>
                                    <button class="order-view-btn" type="button" onclick="location.href='order_details_fulfill.php'">View Details</button>
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
