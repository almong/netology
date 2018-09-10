<?php
    session_start();
    if (isset($_SESSION['logged_user'])) {
        unset($_SESSION['logged_user']);
        header('Location: /');
    } else {
        http_response_code(403);
    }
?>