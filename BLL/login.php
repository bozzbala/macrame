
<?php
include 'db.php';

// Проверяем, была ли отправлена форма с логином
if (!isset($_POST['submit'])) {
    // Получаем данные из формы
    $username = $_POST['login'];
    $password = $_POST['pass'];
   echo "1st";
    // Защищаем данные от SQL-инъекций
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);
   echo "second";
    // Шифруем пароль
    $password = md5($password);

    // Запрос к базе данных для поиска пользователя с таким же логином и паролем
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    echo "3rd";
    // Проверяем, найден ли пользователь с такими данными
    if (mysqli_num_rows($result) == 1) {
        // Авторизуем пользователя
        session_start();
        $_SESSION['username'] = $username;
        header("Location: index.php");
        header("Location: /admin.php");
    } else {
        // Выводим сообщение об ошибке
        echo "Invalid username or password.";
        header("Location: /BLL/loginPage.php");
    }
}

// Закрываем соединение с базой данных
mysqli_close($conn);
?> 