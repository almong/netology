<?php
    $file = file_get_contents(__DIR__.'/phonebook.json');
    $obj = json_decode($file,true);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Установка и настройка веб-сервера</title>
</head>
<body>
    <table border="1px solid #FFFFFF" cellspacing=0>
        <tr>
            <td>Имя</td>
            <td>Фамилия</td>
            <td>Адрес</td>
            <td>Телефон</td>
        </tr>
        <?php 
            for ($i=0; $i<count($obj);$i++){
                $arr = $obj[$i];
                echo "<tr>
                    <td>".$arr['firstName']."</td>
                    <td>".$arr['lastName']."</td>
                    <td>".$arr['address']."</td>
                    <td>".$arr['phoneNumber']."</td>
                </tr>"; 
            }
        ?>
    </table>
</body>
</html>