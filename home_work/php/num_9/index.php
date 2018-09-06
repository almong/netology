 <?php
    require_once 'db.php';

    function search($name1, $name2, $name3, $get, $db)
        {
            $sql = "SELECT * FROM books WHERE `$name1` LIKE '%{$get['name']}%' AND `$name2` LIKE '%{$get[author]}%' AND `$name3` LIKE '%{$get['isbn']}%'";
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
    <style type="text/css">
    table { 
        margin-top: 20px;
        border-spacing: 0;
        border-collapse: collapse;
    }

    table td, table th {
        border: 1px solid #ccc;
        padding: 5px;
    }
    
    table th {
        background: #eee;
    }
</style>
</head>
<body>
    <h1>Библиотека успешного человека</h1>
    <form method="GET">
        <input type="text" name="isbn" placeholder="ISBN" value="" />
        <input type="text" name="name" placeholder="Название книги" value="" />
        <input type="text" name="author" placeholder="Автор книги" value="" />
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
            if (empty($_GET)){
                $result = dbPrint($db);
                foreach($result as $row){ 
                    table($row);
                }
        } else {
                if (!empty($_GET)){
                    $searchAll = search('name', 'author', 'isbn', $_GET, $db);
                }
                if (!empty($searchAll)){
                    foreach ($searchAll as $row){
                        table($row);               
                    } 
                }
            }
        $db = null;
        ?>
        </tbody>
    </table>
</body>
</html>