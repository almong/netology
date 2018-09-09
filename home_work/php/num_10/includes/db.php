<?php
    require "./libs/rb.php";

    R::setup( 'mysql:host=localhost;dbname=todo',
    'admin', '' );

    session_start();
