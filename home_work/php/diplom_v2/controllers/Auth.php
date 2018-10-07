<?php
session_start();
include '../models/Admin.php';

if (!empty($_POST)) {
    $auth = new Auth($_POST);


    if ($auth->checkLogin() == $auth->verificationPassword() && $auth->checkLogin() != null) {
        $_SESSION['login'] = $post['login'];
        include '../views/admin.php';
        exit;
    }
}

 include '../views/auth.php';