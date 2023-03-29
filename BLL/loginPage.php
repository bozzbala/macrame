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
   <div class="login">
   <h1>Вход</h1>
    <form action="login.php" method="POST">
      <input type="text" name="login" placeholder="Логин" required="required" />
        <input type="password" name="pass" placeholder="Пароль" required="required" />
        <button type="submit" class="btn btn-primary btn-block btn-large">Войти</button>
    </form>
</div>
</body>
</html>
