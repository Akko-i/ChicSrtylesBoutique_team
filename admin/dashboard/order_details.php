<?php
session_start();
require_once '../../config.php';
require_once '../../db_connection.php';

// Redirect to login if the admin is not logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: ' . BASE_URL . 'admin/index.php');
    exit();
}

// Get the order ID from the query string
$order_id = isset($_GET['order_id']) ? intval($_GET['order_id']) : 0;

// Fetch order details
$sql = "SELECT o.order_id, o.order_date, o.status, o.total_price, o.tracking_number, 
               u.user_first_name, u.user_last_name, 
               sa.address_line1 AS shipping_address1, sa.address_line2 AS shipping_address2, sa.suburb AS shipping_suburb,
               sa.state AS shipping_state, sa.postcode AS shipping_postcode, sa.country AS shipping_country, sa.phone AS shipping_phone,
               ba.address_line1 AS billing_address1, ba.address_line2 AS billing_address2, ba.suburb AS billing_suburb,
               ba.state AS billing_state, ba.postcode AS billing_postcode, ba.country AS billing_country, ba.phone AS billing_phone
        FROM orders o
        JOIN user u ON o.user_id = u.user_id
        JOIN shipping_address sa ON o.shipping_address_id = sa.shipping_id
        JOIN billing_address ba ON o.billing_address_id = ba.billing_id
        WHERE o.order_id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $order_id);
$stmt->execute();
$order = $stmt->get_result()->fetch_assoc();

if (!$order) {
    die("Order not found.");
}

// Fetch order items
$sql_items = "SELECT oi.quantity, oi.price, p.product_name, p.product_image 
              FROM order_items oi
              JOIN product p ON oi.product_id = p.product_id
              WHERE oi.order_id = ?";
$stmt_items = $conn->prepare($sql_items);
$stmt_items->bind_param('i', $order_id);
$stmt_items->execute();
$order_items = $stmt_items->get_result();

// Calculate totals
$subtotal = 0;
while ($item = $order_items->fetch_assoc()) {
    $subtotal += $item['price'] * $item['quantity'];
}
$shipping_fee = 15; // Example shipping fee
$total = $subtotal + $shipping_fee;

// Reset the order items result for the loop in HTML
$order_items->data_seek(0);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details - Chic Style Boutique</title>
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="admin-dashboard.css">
</head>
<body>
    <div class="flex">
        <!-- Include the sidebar -->
        <?php include 'sidebar.php'; ?>

        <!-- Main content -->
        <div class="flex2">
            <main class="orders-details">
                <h2>Order Details</h2>
                <section class="order-summary">
                    <form id="order-status-form" action="order_status_update.php" method="POST">
                        <input type="hidden" name="order_id" value="<?php echo $order['order_id']; ?>">
                        <p><strong>Order No.:</strong> <?php echo htmlspecialchars($order['order_id']); ?></p>
                        <p><strong>Order Date:</strong> <?php echo date('d M Y', strtotime($order['order_date'])); ?></p>

                        <!-- Order Status Dropdown -->
                        <fieldset>
                            <label for="order-status"><strong>Order Status:</strong></label>
                            <select id="order-status" name="status">
                                <option value="Pending" <?php echo $order['status'] == 'Pending' ? 'selected' : ''; ?>>Pending</option>
                                <option value="Processing" <?php echo $order['status'] == 'Processing' ? 'selected' : ''; ?>>Processing</option>
                                <option value="Completed" <?php echo $order['status'] == 'Completed' ? 'selected' : ''; ?>>Completed</option>
                                <option value="Cancelled" <?php echo $order['status'] == 'Cancelled' ? 'selected' : ''; ?>>Cancelled</option>
                            </select>
                        </fieldset>

                        <!-- Tracking Number Input -->
                        <fieldset>
                            <label for="tracking-number"><strong>Tracking Number:</strong></label>
                            <input type="text" id="tracking-number" name="tracking_number" value="<?php echo htmlspecialchars($order['tracking_number']); ?>" placeholder="Enter tracking number">
                        </fieldset>
                        
                        <button type="submit">Update Order</button>
                    </form>
                </section>
                            
                <hr>
            
                <section class="address-details">
                    <article class="billing-details">
                        <h3>Billing Details:</h3>
                        <address>
                            <?php echo htmlspecialchars($order['user_first_name'] . ' ' . $order['user_last_name']); ?><br>
                            <?php echo htmlspecialchars($order['billing_address1']) . ' ' . htmlspecialchars($order['billing_address2']); ?><br>
                            <?php echo htmlspecialchars($order['billing_suburb']) . ', ' . htmlspecialchars($order['billing_state']) . ' ' . htmlspecialchars($order['billing_postcode']); ?><br>
                            <?php echo htmlspecialchars($order['billing_country']); ?><br>
                            <?php echo htmlspecialchars($order['billing_phone']); ?>
                        </address>
                    </article>
            
                    <article class="shipping-details">
                        <h3>Shipping Details:</h3>
                        <address>
                            <?php echo htmlspecialchars($order['user_first_name'] . ' ' . $order['user_last_name']); ?><br>
                            <?php echo htmlspecialchars($order['shipping_address1']) . ' ' . htmlspecialchars($order['shipping_address2']); ?><br>
                            <?php echo htmlspecialchars($order['shipping_suburb']) . ', ' . htmlspecialchars($order['shipping_state']) . ' ' . htmlspecialchars($order['shipping_postcode']); ?><br>
                            <?php echo htmlspecialchars($order['shipping_country']); ?><br>
                            <?php echo htmlspecialchars($order['shipping_phone']); ?>
                        </address>
                    </article>
                </section>
            
                <hr>
            
                <section class="order-items">
                    <h3>Order Items</h3>
                    <table>
                        <tbody>
                            <?php while ($item = $order_items->fetch_assoc()): ?>
                                <tr>
                                    <td><img src="../../img/shop/<?php echo htmlspecialchars($item['product_image']); ?>" alt="<?php echo htmlspecialchars($item['product_name']); ?>"></td>
                                    <td><?php echo htmlspecialchars($item['product_name']); ?></td>
                                    <td>$<?php echo number_format($item['price'], 2); ?></td>
                                    <td>×<?php echo htmlspecialchars($item['quantity']); ?></td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </section>
            
                <section class="order-totals">
                    <p><strong>Subtotal:</strong> $<?php echo number_format($subtotal, 2); ?></p>
                    <p><strong>Shipping Fee:</strong> $<?php echo number_format($shipping_fee, 2); ?></p>
                    <p><strong>Total:</strong> $<?php echo number_format($total, 2); ?></p>
                </section>
            
                <nav class="back-navigation">
                    <button class="back-btn" onclick="history.back()">← Back</button>
                </nav>
            </main>
            <footer>
                <div class="container">
                    <small>©<?php echo date('Y'); ?> All Rights Reserved</small>
                </div>
            </footer>
        </div>
    </div>
</body>
</html>
