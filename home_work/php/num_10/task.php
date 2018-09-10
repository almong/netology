<?php
    require 'db.php';

    function countTask($id, $db)
    {
        $sql = "SELECT COUNT id FROM task";
    }

    function listTask($id, $db)
    {
        $sql = "SELECT * FROM task WHERE `id` = '$id'";
        $preSql = $db->prepare($sql);
        $preSql->execute();
        return $preSql->fetchALL(PDO::FETCH_ASSOC);
    }

    function tableTemlate($row)
    { ?>
        <tr>
            <td><?php echo $row['id'];?></td>
            <td><?php echo $row['description'];?></td>
            <td><?php echo $row['date'];?></td>
            <td><?php echo $row['user_id'];?></td>
            <td><?php echo $row['assigned_user_id'];?></td>
            <td><?php echo $row['is_done'];?></td>
            <td><a href="<?php deleteTask($row['id']);?>">Удалить</a></td>
        </tr>
    <?php }

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
    <h2>Колличество текущих дел: <?php echo '123';?></h2>
    <a href="logout.php">Выйти</a>
    <form method="get">
        <input type="text" placeholder="Описание задачи" name="task">
        <button type="submit">Добавить</button>
    </form>
    <form method="get">
        <p>Сортировать по: </p>
        <select name="sortby">
            <option value="date">По дате</option>
            <option value="status">По статусу</option>
            <option value="description">По описанию</option>
        </select>
        <button type="submit">Сортировать</button>
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
                </tr>
            </thead>
            <tbody>
                <?php 
                    $list = listTask($_SESSION['logged_user']['id'], $db);
                    foreach ($list as $row){
                        tableTemlate($row);
                    }
                ?>
            </tbody>
        </table>
</body>
</html>

<?php } ?>