<?php
$_1 = 1;
$_2 = $_1;

if (!empty($_POST)) {
    $in = $_POST['input'];
    if (is_numeric($in)) {
        echo " Вы ввели: $in <br />";
        while ($in >= $_1) {
            if ($_1 == $in){
                echo 'Задуманное число входит в числовой ряд Фибоначчи!'; 
                break; 
            }else {
                $_3 = $_1;
                $_1 += $_2;
                $_2 = $_3; 
            } 
        }
        if ($_1 > $in || $in <= 0) {
            echo 'Задуманное число НЕ входит в числовой ряд Фибоначчи!';
        }
    } else {
    echo 'Вы ввели не число !!!';
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Дополнительное задание "Введение в PHP"</title>
</head>
<body>
    <form action="index.php" method="POST">
        <p>Введите число</p>
        <input type="text" name="input">
        <input type="submit" value="Ввод">
    </form>
</body>
</html>