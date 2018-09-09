<?php
//Соединение с БД
    require "includes/db.php";

    if (!empty($_POST)){
        $errors = array();
        $user = R::findOne('user', 'login = ?', array($_POST['login']));    
        if ($user) {
            if (password_verify($_POST['password'], $user->password)){
                $_SESSION['logged_user'] = $user;
                echo '<div style="color: green; text-align: center;">Вы авторизованы, можете перейти на <a href="/">Главную страницу</a></div><hr>';

            } else {
                $errors[] = 'Пароль введен не верно!';
            }
        } else {
            $errors[] = 'Пользователь с таким логином не существует!';
        }
        if (!empty($errors)){
            echo '<div style="color: red; text-align: center;">'.array_shift($errors).'</div><hr>';
        }
    }
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Signup</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="auth">
<!-- Добавляем форму регистрации -->
    <form action="login.php" method="post">
        <p>Авторизация</p>
        <p>Введите логин: <input type="text" name="login"></p>
        <p>Введите пароль: <input type="password" name="password"></p>
        <p><button type="submit">Отправить</button></p>
    </form>  
</div>
</body>
</html>