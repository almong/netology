<?php

class ConnectionDb
{
    private $database;

    public function __construct()
    {
        $this->database = include '../config/db.php';
    }

    public function connect()
    {
        return new PDO('mysql:host=localhost;dbname=faq;charset=utf8', 'root', '1234');

    }
}