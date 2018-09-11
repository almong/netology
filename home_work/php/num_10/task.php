<?php
    require 'db.php';
    require 'function.php';
    
    if (empty($_SESSION['logged_user'])){
            http_response_code(403);
        die;
    } else {
        if (!empty($_GET || !empty($_POST))){
            if ($_GET['add'] == 1){
                addTask($_GET['task'], $_SESSION['logged_user']['id'], $db);
            }
            if (!empty($_GET['del'])){
                deleteTask($_SESSION['logged_user']['id'], $_GET['del'], $db);
            }
            if ($_POST['assign'] > 0){
                changeAssignedUser($_POST['assigned_user'], $_POST['assign'], $db);
            }
            if (isset($_GET['state'])){
                changeState($_GET['state'], $_GET['task'], $_GET['user_id'], $db);
            }
        }    
        require 'taskhtml.php';
    } 
    $db = null;
?>