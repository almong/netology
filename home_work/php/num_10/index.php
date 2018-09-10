<?php
    session_start();

    if (isset($_SESSION['logged_user'])) {
        header('LOCATION: task.php'); 
        die; 
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

    <?php 
        }
    ?>