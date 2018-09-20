<?php
    function delete($post, $db)
    {
        $sql = "ALTER TABLE {$post['table']} DROP {$post['name']};";
        $preSql = $db->prepare($sql);
        $preSql->execute();
    }