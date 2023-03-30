<?php

include 'BLL/db.php';
session_start();

$product_id = $_GET['product_id'];
$quantity = $_GET['quantity'];

$sql = "SELECT * FROM products WHERE id = '$product_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $total_price = $row["price"] * $quantity;

    if(isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id]['quantity'] += $quantity;
        $_SESSION['cart'][$product_id]['total_price'] += $total_price;
    } else {
        $_SESSION['cart'][$product_id] = array("product_name" => $row["name"], "quantity" => $quantity, "price" => $row["price"], "total_price" => $total_price);
    }
}