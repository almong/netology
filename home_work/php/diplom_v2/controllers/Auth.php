<?php
session_start();
include '../models/Admin.php';

if (!empty($_SESSION['login'])) {
    include '../views/admin.php';
    exit;
}

if (!empty($_POST)) {
    $auth = new Auth($_POST);


    if ($auth->checkLogin() == $auth->verificationPassword() && $auth->checkLogin() != null) {
        $_SESSION['login'] = $_POST['login'];
        include '../views/admin.php';
        exit;
    }
}

 include '../views/auth.php';