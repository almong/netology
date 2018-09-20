<?php
    function showDb($db)
    {
        $sql = "SHOW TABLES";
        $preSql = $db->prepare($sql);
        $preSql->execute();
        return $preSql->fetchALL(PDO::FETCH_ASSOC);
    }

    function infoTable($nameTable, $db)
    {
        $sql = "DESCRIBE $nameTable";
        $preSql = $db->prepare($sql);
        $preSql->execute();
        return $preSql->fetchALL(PDO::FETCH_ASSOC);
    }