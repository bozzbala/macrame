<?php
    if(!isset($_POST['login']) || !isset($_POST['pass'])){
        header("Location: /BLL/loginPage.php");
        echo "Неправильный логин или пароль";
    }

    $login = $_POST['login'];
    $pass = $_POST['pass'];
    
    if($login == 'macrame' && $pass == 'macrame'){
        setcookie($login, $pass, time() + 6400, "/");
        header("Location: /admin.php");
    }
    else{
        header("Location: /BLL/loginPage.php");
    }


?>