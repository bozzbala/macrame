<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получаем данные из формы
    $name = mysqli_real_escape_string($mysqli, $_POST['name']);
    $description = mysqli_real_escape_string($mysqli, $_POST['description']);
    $price = mysqli_real_escape_string($mysqli, $_POST['price']);
    $image_url = mysqli_real_escape_string($mysqli, $_POST['image_url']);
    $category = mysqli_real_escape_string($mysqli, $_POST['category']);

    // Создаем SQL-запрос для добавления товара в базу данных
    $sql = "INSERT INTO `products` (`name`, `description`, `price`, `image_url`, `category`) 
            VALUES ('$name', '$description', '$price', '$image_url', '$category')";

    // Выполняем запрос
    if (mysqli_query($mysqli, $sql)) {
        echo "Товар успешно добавлен в базу данных.";
    } else {
        echo "Ошибка: " . mysqli_error($mysqli);
    }

    // Закрываем соединение с базой данных
    mysqli_close($mysqli);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}
?>