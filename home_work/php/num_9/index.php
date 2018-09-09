 <?php
    require_once 'db.php';

    function search($name1, $name2, $name3, $get, $db)
        {
            $values = [];
            $values[$name1] = (!empty($get[$name1])) ? $get[$name1] : '';
            $values[$name2] = (!empty($get[$name2])) ? $get[$name2] : '';
            $values[$name3] = (!empty($get[$name3])) ? $get[$name3] : '';
            $sql = "SELECT * FROM books WHERE `$name1` LIKE '%{$values[$name1]}%' AND `$name2` LIKE '%{$values[$name2]}%' AND `$name3` LIKE '%{$values[$name3]}%'";
            $preSql = $db->prepare($sql);
            $preSql->execute();
            return ($preSql->fetchALL(PDO::FETCH_ASSOC));  
        }
    
        function dbPrint($db)
        {
            $dbAll = $db->prepare('SELECT * from books');
            $dbAll->execute();
            return ($dbAll->fetchALL(PDO::FETCH_ASSOC));
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
        <input type="text" name="isbn" placeholder="ISBN" value="<?php echo $_GET['isbn'];?>">
        <input type="text" name="name" placeholder="Название книги" value="<?php echo $_GET['name'];?>">
        <input type="text" name="author" placeholder="Автор книги" value="<?php echo $_GET['author'];?>">
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
            $searchAll = search('name', 'author', 'isbn', $_GET, $db);
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