<?php
include 'ConnectionDb.php';

/**
 * Class QueryBuilder
 */
class QueryBuilder
{
    public $db;

    /**
     * QueryBuilder constructor.
     */
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

    /**
     * @param string $table
     *
     * @return array
     */
    public function showAll(string $table)
    {
        $query = "SELECT * FROM $table";
        $statement = $this->db->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @param string $table
     * @param int $id
     *
     * @return mixed
     */
    public function showOne(string $table, int $id)
    {
        $query = "SELECT * FROM `$table` WHERE `id` = :id";
        $statement = $this->db->prepare($query);
        $statement->execute(['id' => $id]);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * @param string $table
     * @param int $id
     */
    public function delete(string $table, int $id)
    {
        $query = "DELETE FROM `$table` WHERE `id` = :id";
        $statement = $this->db->prepare($query);
        $statement->execute(['id' => $id]);
    }

    /**
     * @param string $table
     * @param string $col
     * @param string $data
     */
    public function add(string $table, string $col, string $data)
    {
        $data = htmlspecialchars($data);
        $query = "INSERT INTO `$table`($col) VALUES (:data)";
        $statement = $this->db->prepare($query);
        $statement->execute(['data' => $data]);
    }

    /**
     * @param string $table
     * @param string $col
     * @param string $value
     *
     * @return mixed
     */
    public function getId(string $table, string $col, string $value)
    {
        $value = htmlspecialchars($value);
        $query = "SELECT id FROM `$table` WHERE `$col` = :value";
        $statement = $this->db->prepare($query);
        $statement->execute(['value' => $value]);
        $id = $statement->fetch()[0];
        return $id;
    }

    /**
     * @param string $table
     * @param int $id
     *
     * @return mixed
     */
    public function getName(string $table, int $id)
    {
        $query = "SELECT `name` FROM `$table` WHERE `id`=:id";
        $statement = $this->db->prepare($query);
        $statement->execute(['id' => $id]);
        return $statement->fetch();
    }

    /**
     * @param string $table
     * @param string $updateParam
     * @param int $id
     */
    public function update(string $table, string $updateParam, int $id)
    {
        $updateParam = htmlspecialchars($updateParam);
        $query = "UPDATE `$table` SET :updateParam WHERE `id`=:id";
        $statement = $this->db->prepare($query);
        $statement->execute(['updateParam' => $updateParam, 'id' => $id]);
    }

}