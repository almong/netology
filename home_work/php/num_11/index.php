<?php
    require 'db.php';
 
    function change($post, $db)
    {
        print_r($post);
        if ($post['type'] == 'varchar'){
            $post['type'] = 'varchar(50)';
        }
        $sql = "ALTER TABLE {$post['table']} CHANGE {$post['name']} {$post['newName']} {$post['type']}";
        $preSql = $db->prepare($sql);
        $preSql->execute();
        $err = $preSql->errorInfo();
        print_r($err);
    }

    function delete($post, $db)
    {
        $sql = "ALTER TABLE {$post['table']} DROP {$post['name']};";
        $preSql = $db->prepare($sql);
        $preSql->execute();
    }

    function showDb($db)
    {
        $sql = "SHOW TABLES";
        $preSql = $db->prepare($sql);
        $preSql->execute();
        return $preSql->fetchALL(PDO::FETCH_ASSOC);
    }

    function addTable($nameTable, $db)
    {
        $sql = "CREATE TABLE $nameTable (id INT(11), name VARCHAR(20))";
        $preSql = $db->prepare($sql);
        $preSql->execute(); 
        $err = $preSql->errorInfo();
        if (!empty($err)){
            echo 'Некорректное имя таблицы или таблица с таким именем существует';
        } 
    }

    function infoTable($nameTable, $db)
    {
        $sql = "DESCRIBE $nameTable";
        $preSql = $db->prepare($sql);
        $preSql->execute();
        return $preSql->fetchALL(PDO::FETCH_ASSOC);
    }

    if (isset($_POST)){
        if ($_POST['delete'] == 1){
            delete($_POST, $db);
        }
        if ($_POST['save'] == 1){
            change($_POST, $db);
        }
    }

    if (isset($_GET['nameTable'])){
        addTable($_GET['nameTable'], $db);   
    }
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>phpMyAdmin (ver. 0.001)</h1>
    <h3>Добавить таблицу:</h3>
        <form method="get">
            <input type="text" name="nameTable">
            <button type="submit">Создать</button>
        </form>
    <h3>Список таблиц:</h3>
    <ul>
    <?php 
        $listTables = showDb($db);
        if (!empty($listTables)){
            foreach ($listTables as $tables){?>
                <li><a href="index.php?show=<? echo $tables['Tables_in_testdb']?>"><? echo $tables['Tables_in_testdb']?></a></li>
            <?php }
        } else {
            echo 'Список таблиц пуст';
        }
        if (!empty($_GET) && !isset($_GET['nameTable'])){
    ?>
    </ul>
    <table>
        <thead>
            <tr>
                <th>Имя</th>
                <th>Тип</th>
                <th>Изменить</th>
            </tr>
        </thead>
        <tbody>
        <?php }
    if (isset($_GET['show'])){
        $info = infoTable($_GET['show'], $db);
        foreach ($info as $row){
            $type = strstr ($row['Type'], '(' , true);
                if ($type == ''){
                    $type = $row['Type'];
                }
            ?>
            <tr>
                <td><? echo $row['Field']?></td>
                <td><? echo $type?></td>
                <td><a href="index.php?edit=<? echo $row['Field']?>&table=<? echo $_GET['show']?>">Изменить</a></td>
            </tr>
        <?php }
    }
    if (isset(($_GET['edit']))){
        $info = infoTable($_GET['table'], $db);
        foreach ($info as $row){
            if ($row['Field'] == $_GET['edit']){
                $type = strstr ($row['Type'], '(' , true);
                if ($type == ''){
                    $type = $row['Type'];
                }
                $typeArr = ['int', 'varchar', 'float'];
                ?>
                <form method="post">
                    <tr>
                        <td><input type="text" name="newName" value="<? echo $row['Field']?>"></td>
                        <td><select name="type">
                            <option value="<? echo $type?>"><? echo $type?></option>
                            <?php 
                                foreach ($typeArr as $t){
                                    if ($t != $type){?>
                                        <option value="<? echo $t?>"><? echo $t?></option>
                                    <?php }
                                }
                            ?>
                        </select></td>
                        <td>
                            <input type="hidden" name="table" value="<? echo $_GET['table']?>">
                            <input type="hidden" name="name" value="<? echo $row['Field']?>">
                            <button type="submit" name="save" value="1">Сохранить</button>
                            <button type="submit" name="delete" value="1">Удалить</button>
                        </td>
                    </tr>
                </form>
            <?php }
        }
    }
$db = null;
?>
        </tbody>
    </table>
</body>
</html>