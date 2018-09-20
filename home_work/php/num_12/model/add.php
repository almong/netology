<?php
    function addTable($nameTable, $db)
    {
        $sql = "CREATE TABLE $nameTable (id INT(11), name VARCHAR(20))";
        $preSql = $db->prepare($sql);
        $preSql->execute(); 
        $err = $preSql->errorInfo();
        if (!empty($err[2])){
            echo 'Некорректное имя таблицы или таблица с таким именем существует';
        } 
    }