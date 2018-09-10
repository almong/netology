<?php
//Соединение с БД
    require 'db.php';
//Функция проверки на логина на уникальность
    function uniqLogin($login, $db)
    {
        $sql = "SELECT id FROM user WHERE `login` = '$login'";
        $preSql = $db->prepare($sql);
        $preSql->execute();

        if ($preSql->fetchALL(PDO::FETCH_ASSOC)){
            return true;
        } else {
            return false;
        }
    }
//Функция записи логина/пароля в БД
    function singup($login, $password, $db)
    {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO user(login, password) VALUE ('$login', '$password')";
        $preSql = $db->prepare($sql);
        $preSql->execute();
    }
// Проверяем введены ли данные в форму
    if (!empty($_POST)){
        $errors = array();
//Проверка на не пустой логин
        if (trim($_POST['login']) == ''){
            $errors[] = 'Введите логин!';
        } 
//Проверка на не пустой пароль
        if ($_POST['password'] == ''){
            $errors[] = 'Введите пароль!';
        } 
//Проверка логина на уникальность
        if (uniqLogin($_POST['login'], $db)){
            $errors[] = 'Пользователь с таким логином уже существует';
        }
// Если ошибок нет то добавляем в БД запись о пользователе.
        if (empty($errors)){
            singup($_POST['login'], $_POST['password'], $db);
            header('LOCATION: login.php');  
            die; 
        } else {
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
        <p>Регистрация</p>
        <p>Введите логин: <input type="text" name="login" value ="<?echo @$_POST['login']?>"></p>
        <p>Введите пароль: <input type="password" name="password"></p>
        <p><button type="submit">Отправить</button></p>
    </form>  
</div>
</body>
</html>