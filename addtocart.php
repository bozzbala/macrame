<?php
session_start();

// проверяем, была ли отправлена форма
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "da";
    // проверяем, есть ли данные о товаре в POST-запросе
    if (isset($_POST['product_id'], $_POST['product_name'], $_POST['product_price'], $_POST['product_image'])) {
        // создаем массив товара
        $products = array(
            'id' => $_POST['product_id'],
            'name' => $_POST['product_name'],
            'price' => $_POST['product_price'],
            'image_url' => $_POST['product_image'],
            'quantity' => 1
        );
        echo "da";

        // проверяем, есть ли уже товар в корзине
        if (isset($_SESSION['cart'][$products['id']])) {
            // если товар уже есть в корзине, увеличиваем его количество на 1
            $_SESSION['cart'][$products['id']]['quantity']++;
            echo "";
        } else {
            // если товара еще нет в корзине, добавляем его
            $_SESSION['cart'][$products['id']] = $products;
            echo "";
        }
    }
}

header('Location: cart.php');
?>