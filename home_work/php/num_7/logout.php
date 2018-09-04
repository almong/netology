<?php
    session_set_cookie_params(3600);
    session_start();
    if (!empty($_SESSION['user_login']) || !empty($_SESSION['guest'])){
        session_destroy();
        header('Location: /');
        exit;
    } else {

    }
    http_response_code(403);
    echo 'Доступ закрыт';
    exit;
?>