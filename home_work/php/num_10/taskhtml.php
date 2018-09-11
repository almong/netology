<?php 
    if (empty($_SESSION['logged_user'])){
        http_response_code(403);
    die;
    } else {
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>task</title>
</head>
<body>
    <h1>Привет <?php echo $_SESSION['logged_user']['login'];?></h1>
    <h2>Колличество текущих дел: <?php echo countTask($_SESSION['logged_user']['id'], $db);?></h2>
    <p><a href="logout.php">Выйти</a></p>
    <form action="task.php" method="get">
        <input type="text" placeholder="Описание задачи" name="task">
        <button type="submit" name="add" value="1">Добавить</button>
    </form>
        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>Описание задачи</th>
                    <th>Дата добавления</th>
                    <th>Автор</th>
                    <th>Ответственный</th>
                    <th>Статус</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $list = listTask($_SESSION['logged_user']['id'], $db);
                    foreach ($list as $row){
                        tableTemlate($row, $db);
                    }
                ?>
            </tbody>
        </table>
</body>
</html>
<?php } ?>