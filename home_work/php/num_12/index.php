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
        $infoE = infoTable($_GET['table'], $db); 
    }
    
    include 'view/view.php';

    $db = null;