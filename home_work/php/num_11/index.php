<?php
    require 'db.php';
 
    function showDb($db)
    {
        $sql = "SHOW TABLES";
        $preSql = $db->prepare($sql);
        $preSql->executr();
        return $preSql->fetchALL(PDO::FETCH_ASSOC);
    }

    print_r(showDb($db));
?>
