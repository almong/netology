 <?php
    require_once 'db.php';

    $values = [];
    $values['name'] = (!empty($_GET['name'])) ? $_GET['name'] : '';
    $values['author'] = (!empty($_GET['author'])) ? $_GET['author'] : '';
    $values['isbn'] = (!empty($_GET['isbn'])) ? $_GET['isbn'] : '';

    function search($values, $get, $db)
        {
            $sql = "SELECT * FROM books WHERE `name` LIKE '%{$values['name']}%' AND `author` LIKE '%{$values['author']}%' AND `isbn` LIKE '%{$values['isbn']}%'";
            $preSql = $db->prepare($sql);
            $preSql->execute();
            return ($preSql->fetchALL(PDO::FETCH_ASSOC));  
        }

        function table($row){?>
           <tr>
                <td><?php echo $row['name'];?></td>
                <td><?php echo $row['author'];?></td>
                <td><?php echo $row['year'];?></td>
                <td><?php echo $row['isbn'];?></td>
                <td><?php echo $row['genre'];?></td>
            </tr>  
        <?php } ?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Реляционные базы данных и SQL</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Библиотека успешного человека</h1>
    <form method="GET">
        <input type="text" name="isbn" placeholder="ISBN" value="<?php echo $values['isbn'];?>">
        <input type="text" name="name" placeholder="Название книги" value="<?php echo $values['name'];?>">
        <input type="text" name="author" placeholder="Автор книги" value="<?php echo $values['author'];?>">
        <input type="submit" value="Поиск" />
    </form>
    <table>
        <thead>
            <tr>
                <th>Название</th>
                <th>Автор</th>
                <th>Год выпуска</th>
                <th>Жанр</th>
                <th>ISBN</th>
            </tr>
        </thead>
        <tbody>
        <?php 
            $searchAll = search($values, $_GET, $db);
            if (!empty($searchAll)){
                foreach ($searchAll as $row){
                    table($row);               
                } 
            }
        $db = null;
        ?>
        </tbody>
    </table>
</body>
</html>