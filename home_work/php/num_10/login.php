<?php
//Соединение с БД
    require 'db.php';    

    if (!empty($_POST)){
        $errors = array();
        $sqlLogin = "SELECT * FROM user WHERE `login` = '{$_POST['login']}'";
        $preSql = $db->prepare($sqlLogin);
        $preSql->execute();
        $loginArr = $preSql->fetchALL(PDO::FETCH_ASSOC);

        if (!empty($loginArr)){
                if (password_verify($_POST['password'], $loginArr['0']['password'])){
                    $id = $loginArr['0']['id'];
                    $_SESSION['logged_user'] = $loginArr['0'];
                    header('LOCATION: task.php');
                    die;
                } 
                $errors[] = 'Пароль введен не верно!';
        } else {
            $errors[] = 'Пользователь не найден!';
        }
        if (!empty($errors)){
            echo '<div style="color: red; text-align: center;">'.array_shift($errors).'</div><hr>';
        }
    }
    $db = null;
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
    <form method="post">
        <p>Авторизация</p>
        <p>Введите логин: <input type="text" name="login"></p>
        <p>Введите пароль: <input type="password" name="password"></p>
        <p><button type="submit">Отправить</button></p>
    </form>  
</div>
</body>
</html>