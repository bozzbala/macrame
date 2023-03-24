<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../styles/login.css" rel="stylesheet">
</head>
<body>
    <form action="login.php" method="post">
        <div class="login">
            <div class="login__input">
                <input type="text" name="login" placeholder="Имя пользователя">
            </div>
            <div class="login__input">
                <input type="password" name="pass" placeholder="Пароль">
            </div>
            <input type="submit" value="Войти" class="login__submit">
        </div>
    </form>
</body>
</html>