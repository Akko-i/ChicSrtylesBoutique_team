<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders Details - Chic Style Boutique</title>
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
            <main class="oders-details">
                <h2>Orders Details</h2>
                <section class="order-summary">
                    <form id="order-status-form">
                        <p><strong>Order No.:</strong> 00003</p>
                        <p><strong>Order Date:</strong> 12 Dec 2022</p>

                        <fieldset>
                            <label for="order-status"><strong>Order Status:</strong></label>
                            <select id="order-status" name="orderStatus">
                                <option value="processing">Processing</option>
                                <option value="shipped" selected>Shipped</option>
                                <option value="cancelled">Cancelled</option>
                            </select>
                        </fieldset>
                        
                        <fieldset>
                            <label for="tracking-no"><strong>Tracking No.:</strong></label>
                            <input type="text" id="tracking-no" name="trackingNo" value="123456789">
                        </fieldset>
                        
                        <button type="button" id="fulfill-order-btn">Fulfill Order</button>
                    </form>
                </section>
                            
                <hr>
            
                <section class="address-details">
                    <article class="billing-details">
                        <h3>Billing Details:</h3>
                        <address>
                            Akiko Ishijima<br>
                            Level 1/31 Market St, Sydney NSW 2000<br>
                            Australia<br>
                            +61 41234 5678
                        </address>
                    </article>
            
                    <article class="shipping-details">
                        <h3>Shipping Details:</h3>
                        <address>
                            Akiko Ishijima<br>
                            Level 1/31 Market St, Sydney NSW 2000<br>
                            Australia<br>
                            +61 41234 5678
                        </address>
                    </article>
            
                    <article class="additional-info">
                        <h3>Additional Information:</h3>
                        <p>-</p>
                    </article>
                </section>
            
                <hr>
            
                <section class="order-items">
                    <h3>Order Items</h3>
                    <table>
                        <tbody>
                            <tr>
                                <td><img src="../img/shop/DR8.png" alt="White cotton dress"></td>
                                <td>White cotton dress</td>
                                <td>$120.00</td>
                                <td>×1</td>
                            </tr>
                            <tr>
                                <td><img src="../img/shop/AC8.png" alt="Double ring necklace"></td>
                                <td>Double ring necklace</td>
                                <td>$120.00</td>
                                <td>×1</td>
                            </tr>
                        </tbody>
                    </table>
                </section>
            
                <section class="order-totals">
                    <p><strong>Subtotal:</strong> $240</p>
                    <p><strong>Shipping Fee:</strong> $15</p>
                    <p><strong>Total:</strong> $255</p>
                </section>
            
                <nav class="back-navigation">
                    <button class="back-btn" onclick="history.back()">← Back</button>
                </nav>
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
