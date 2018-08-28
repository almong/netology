<?php
    if (!empty($_FILES)){
        if (array_key_exists('files', $_FILES)){
            if (move_uploaded_file($_FILES['files']['tmp_name'], $_FILES['files']['name'])){
                //Перенаправляем на страницу списка тестов
                header('Location: /list.php');
            } else {
                echo 'Ошибка загрузки';
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Добавление тестов</title>
</head>
<body>
    <form action="admin.php" method="POST" enctype="multipart/form-data">
    <p>Выберете файл для добавления:</p>
    <input type="file" name="files">
    <input type="submit">
    </form>
</body>
</html>