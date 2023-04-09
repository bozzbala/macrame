<?php
session_start();
$cart_items = !empty($_SESSION['cart']) ? $_SESSION['cart'] : array();

// Get the product ID and action (increment or decrement) from the form submission
$product_id = isset($_POST['product_id']) ? $_POST['product_id'] : null;
$action = isset($_POST['action']) ? $_POST['action'] : null;

// If the product ID is not valid, redirect back to the cart page
if (!$product_id || !array_key_exists($product_id, $cart_items)) {
    header("Location: ../cart.php");
    exit();
}

// Update the quantity for the specified product ID based on the action
if ($action === "increment") {
    $cart_items[$product_id]['quantity']++;
} else if ($action === "decrement") {
    $cart_items[$product_id]['quantity']--;
    // Remove the item from the cart if the quantity reaches 0
    if ($cart_items[$product_id]['quantity'] <= 0) {
        unset($cart_items[$product_id]);
    }
}

// Update the cart in the session
$_SESSION['cart'] = $cart_items;

// Redirect back to the cart page
header("Location: ../cart.php");
exit();
?>
