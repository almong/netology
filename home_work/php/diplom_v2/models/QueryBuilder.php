<?php
include 'ConnectionDb.php';

class QueryBuilder
{
    public $db;

    public function __construct()
    {
        $connect = new ConnectionDb();
        $this->db = $connect->connect();
    }

    public function connectDb()
    {
        $connect = new ConnectionDb();
        $this->db = $connect->connect();
    }

    public function showAll($table)
    {
        $query = "SELECT * FROM $table";
        $statement = $this->db->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function showOne($table, $id)
    {
        $query = "SELECT * FROM `$table` WHERE `id` = $id";
        $statement = $this->db->prepare($query);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function delete($table, $id)
    {
        $query = "DELETE FROM `$table` WHERE `id` = $id";
        $statement = $this->db->prepare($query);
        $statement->execute();
    }

    public function add($table, $col, $data)
    {
        $query = "INSERT INTO `$table`($col) VALUES ($data)";
        $statement = $this->db->prepare($query);
        $statement->execute();
    }

    public function getId($table, $col, $value)
    {
        $query = "SELECT id FROM `$table` WHERE `$col` = '$value'";
        $statement = $this->db->prepare($query);
        $statement->execute();
        $id = $statement->fetch()[0];
        return $id;
    }

    public function getName($table, $id)
    {
        $query = "SELECT `name` FROM `$table` WHERE `id`=$id";
        $statement = $this->db->prepare($query);
        $statement->execute();
        return $statement->fetch();
    }

    public function update($table, $updateParam, $id)
    {
        $query = "UPDATE `$table` SET $updateParam WHERE `id`='$id'";
        $statement = $this->db->prepare($query);
        $statement->execute();
    }

}