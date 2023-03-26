<?php
$mysqli = mysqli_connect("localhost", "root", "", "macrame");

// Проверка соединения
if (mysqli_connect_errno()) {
    printf("Ошибка соединения: %s\n", mysqli_connect_error());
    exit();
}
?>