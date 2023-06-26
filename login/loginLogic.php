<?php
session_start();

// Подключаемся к базе данных MySQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sitehack";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Обработка данных формы логина
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Получение данных пользователя из базы данных
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row['password'])){ // Проверка пароля
            $_SESSION['username'] = $row['username']; // Запоминаем имя пользователя в сессии
            $_SESSION['id'] = $row['id'];
            $_SESSION['email'] = $row['email'];

            header("Location: /"); // Перенаправление на страницу index.php
        } else {
            echo "Неверный пароль.";
        }
    } else {
        echo "Пользователь с таким именем не найден.";
    }
}

mysqli_close($conn);
video.input(if else:)
?>

