<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customers - Chic Style Boutique</title>
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
                <h2>Customers</h2>
                <div class="scrollable-table">
                    <table class="product-table">
                        <thead>
                            <tr>
                                <th>Customer ID</th>
                                <th>Name</th>
                                <th>Company Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Billing address</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>00003</td>
                                <td>Yuka Toshima</td>
                                <td>-</td>
                                <td>12345567@students.koi.edu.au</td>
                                <td>+61 41234 5678</td>
                                <td>Level 1/31 Market St, Sydney NSW 2000 Australia</td>
                            </tr>
                            <tr>
                                <td>00002</td>
                                <td>John Benny</td>
                                <td>-</td>
                                <td>89123456@students.koi.edu.au</td>
                                <td>+61 49876 5678</td>
                                <td>Level 1/31 Market St, Sydney NSW 2000 Australia</td>
                            </tr>
                            <tr>
                                <td>00001</td>
                                <td>Akiko Ishijima</td>
                                <td>KOI</td>
                                <td>20019026@students.koi.edu.au</td>
                                <td>+61 25678 5678</td>
                                <td>Level 1/31 Market St, Sydney NSW 2000 Australia</td>
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