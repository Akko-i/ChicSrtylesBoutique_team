<?php 

require_once "../db_connection.php";

// Get products
$stmt = $conn->prepare("SELECT * FROM Products");
$stmt -> execute();
$products_result = $stmt->get_result();
$stmt->close();

$row_num = 0;
$products = [];
while ($row_num < $products_result->num_rows) {
    $row = $products_result->fetch_assoc();
    array_push($products, $row);
    $row_num++;
}
echo json_encode($products);