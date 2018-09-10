<?php
    require 'db.php';

    function countTask($id, $db)
    {
        $sql = "SELECT COUNT id FROM task";
    }

    function listTask($id, $db)
    {
        $sql = "SELECT * FROM task WHERE `user_id` = '$id' ORDER BY `date_added`";
        $preSql = $db->prepare($sql);
        $preSql->execute();
        return $preSql->fetchALL(PDO::FETCH_ASSOC);
    }

    function tableTemlate($row)
    { print_r($row);
        ?>
        <tr>
            <td><?php echo $row['id'];?></td>
            <td><?php echo $row['description'];?></td>
            <td><?php echo $row['date_added'];?></td>
            <td><?php echo $row['user_id'];?></td>
            <td><?php echo $row['assigned_user_id'];?></td>
            <td><?php echo $row['is_done'];?></td>
            <td><a href="task.php?del=<?php echo $row['id']?>">Удалить</a></td>
        </tr>
    <?php }

    function addTask($task, $id, $db)
    {
        $date = date('Y-m-d h:m:s');
        echo $date;
        $sql = "INSERT INTO task(description, date_added, user_id, assigned_user_id, is_done) 
        VALUE ('$task', '$date', '$id', '$id', '0')";
        $preSql = $db->prepare($sql);
        $preSql->execute();
    }

    function deleteTask($id, $idTask, $db)
    {
        $sql = "DELETE FROM task WHERE user_id='$id' AND id='$idTask' LIMIT 1";
        $preSql = $db->prepare($sql);
        $preSql->execute();
    }


    if (empty($_SESSION['logged_user'])){
            http_response_code(403);
        die;
    } else {
        if (!empty($_GET)){
            if ($_GET['add'] == 1){
                addTask($_GET['task'], $_SESSION['logged_user']['id'], $db);
            }
            if (!empty($_GET['del'])){
                deleteTask($_SESSION['logged_user']['id'], $_GET['del'], $db);
            }
        }    
        
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
        <button type="submit" name="add" value="1">Добавить</button>
    </form>
    <form method="get">
        <p>Сортировать по: </p>
        <select name="sortby">
            <option value="date">По дате</option>
            <option value="status">По статусу</option>
            <option value="description">По описанию</option>
        </select>
        <button type="submit" name="sort" value="1">Сортировать</button>
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

<?php } 
    $db = null;
?>