<?php
    require 'db.php';
    require 'view/showdb.php';

    if (isset($_POST)){
        if ($_POST['delete'] == 1){
            include '/model/delete.php';
            delete($_POST, $db);
        }
        if ($_POST['save'] == 1){
            include 'model/change.php';
            change($_POST, $db);
        }
    }

    if (isset($_GET['nameTable'])){
        include 'model/add.php';
        addTable($_GET['nameTable'], $db);   
    }

        
    $listTables = showDb($db);

    if (isset($_GET['show'])){
        $info = infoTable($_GET['show'], $db);
    }

    if (isset(($_GET['edit']))){
        $info = infoTable($_GET['table'], $db);
        foreach ($info as $row){
            if ($row['Field'] == $_GET['edit']){
                $type = strstr ($row['Type'], '(' , true);
                if ($type == ''){
                    $type = $row['Type'];
                }
            }
        }
    }
                $typeArr = ['int', 'varchar', 'float'];
    include 'view/view.php';

    $db = null;

