<?php
// Подключаем файл с настройками базы данных
require_once('BLL/db.php');

// Получаем параметры запроса
$id = $_POST['id'];
foreach ($_POST as $name => $value) {
    if (strpos($name, 'available_') === 0) {
        $product_id = substr($name, strlen('available_'));
        $available = $value;
        // Обновляем значение поля available в базе данных для записи с указанным идентификатором товара
        $sql = "UPDATE products SET available = $available WHERE id = $product_id";
        mysqli_query($mysqli, $sql);
    }
}
mysqli_close($mysqli);
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;