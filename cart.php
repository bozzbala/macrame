<?php
include_once "BLL/db.php";
session_start();
$cart_items = !empty($_SESSION['cart']) ? $_SESSION['cart'] : array();
$total_price = 0;

if (!empty($cart_items)) {
    $cart_ids = implode(',', array_keys($cart_items));
    $query = "SELECT * FROM products WHERE id IN ($cart_ids)";
    $result = mysqli_query($conn, $query);
    $products = mysqli_fetch_all($result, MYSQLI_ASSOC);

    foreach ($products as $product) {
        $quantity = $cart_items[$product['id']]['quantity'];
        $subtotal = $quantity * $product['price'];
        $total_price += $subtotal;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Корзина</title>
</head>

<body>
    <h1>Корзина</h1>
    <?php if (empty($cart_items)) { ?>
        <p>Ваша корзина пуста.</p>
    <?php } else { ?>
        <table>
            <thead>
                <tr>
                    <th>Изображение</th>
                    <th>Наименование товара</th>
                    <th>Цена</th>
                    <th>Количество</th>
                    <th>Итого</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($products as $product) { ?>
    <tr>
        <td><img src="<?php echo "./db/" . strtok($product['image_url'], " "); ?>" width="50"></td>
        <td><?php echo $product['name']; ?></td>
        <td><?php echo $product['price']; ?></td>
        <td>
            <form method="post" action="BLL/update_cart.php">
                <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                <input type="number" name="quantity" value="<?php echo $cart_items[$product['id']]['quantity']; ?>">
                <button type="submit" name="action" value="increment">+</button>
                <button type="submit" name="action" value="decrement">-</button>
            </form>
        </td>
        <td><?php echo $cart_items[$product['id']]['quantity'] * $product['price']; ?></td>
    </tr>
<?php } ?>

            </tbody>
        </table>
        <p>Общая стоимость: <?php echo $total_price; ?></p>
        <form method="post" action="checkout.php">
            <button type="submit">Оформить заказ</button>
        </form>
    <?php } ?>
</body>

</html>