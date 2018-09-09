<?php
    require "includes/db.php";
    if (isset($_SESSION['logged_user'])) {
        echo 'Пользователь ' . $_SESSION['logged_user']->login . ' успешно авторизован!<br/>';?>
    <a href="logout.php">Выйти</a>
    <?php    
    } else {
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="auth">
    <p><a href="/login.php">Авторизация</a></p>
    <p><a href="/signup.php">Регистрация</a></p>   
</div>
</body>
</html>

    <?php }?>