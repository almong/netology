<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../style.css">
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
        if (!empty($listTables)){
            foreach ($listTables as $tables){?>
                <li><a href="index.php?show=<?= $tables['Tables_in_testdb']?>"><?= $tables['Tables_in_testdb']?></a></li>
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
        if (!empty($info)){
        foreach ($info as $row){
            $type = strstr ($row['Type'], '(' , true);
                if ($type == ''){
                    $type = $row['Type'];
                }
            ?>
            <tr>
                <td><?= $row['Field']?></td>
                <td><?= $type?></td>
                <td><a href="index.php?edit=<?= $row['Field']?>&table=<?= $_GET['show']?>">Изменить</a></td>
            </tr>
        <?php } } 
        if (!empty($infoE)){
        foreach ($infoE as $row){
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
                <?php } } } ?>
        </tbody>
    </table>
</body>
</html>