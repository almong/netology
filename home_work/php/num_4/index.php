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
        <?php foreach ($obj as $arr) { ?>
                <tr>
                    <td><? echo $arr['firstName'];?></td>
                    <td><? echo $arr['lastName'];?></td>
                    <td> 
                        <?$addres = implode(", ", $arr['address']);
                        echo $addres;?>
                    </td>
                    <td><? foreach($arr['phoneNumber'] as $phone){
                        echo "$phone <br />";}?></td>
                </tr>
            <?php }?>
    </table>
</body>
</html>