<?php
    function change($post, $db)
    {
        if ($post['type'] == 'varchar'){
            $post['type'] = 'varchar(50)';
        }
        $sql = "ALTER TABLE {$post['table']} CHANGE {$post['name']} {$post['newName']} {$post['type']}";
        $preSql = $db->prepare($sql);
        $preSql->execute();
    }