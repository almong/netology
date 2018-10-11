<?php

/**
 * Class ConnectionDb
 */
class ConnectionDb
{
    private $database;

    /**
     * ConnectionDb constructor.
     */
    public function __construct()
    {
        $this->database = include '../config/db.php';
    }

    /**
     * @return PDO
     */
    public function connect()
    {
        return new PDO($this->database['dsn'].';charset='.$this->database['charset'], $this->database['username'], $this->database['password']);
    }
}
