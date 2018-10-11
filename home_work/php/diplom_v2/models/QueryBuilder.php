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
    public function showOne(string $table, $id)
    {
        $query = "SELECT * FROM `$table` WHERE `id` = :id";
        $id = strip_tags($id);
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
        $id = strip_tags($id);
        $query = "DELETE FROM `$table` WHERE `id` = :id";
        $statement = $this->db->prepare($query);
        $statement->execute(['id' => $id]);
    }

    /**
     * @param string $table
     * @param string $col
     * @param array $data
     */
    public function add(string $table, string $col, array $data)
    {
        if (count($data) == 1){
            $query = "INSERT INTO $table ($col) VALUES (:name)";
            $param = ['name' => strip_tags($data[0])];
        } elseif (count($data) == 2){
            $query = "INSERT INTO $table ($col) VALUES (:login, :password)";
            $param = ['login' => strip_tags($data[0]), 'password' => strip_tags($data[1])];
        } elseif (count($data) == 4){
            $query = "INSERT INTO $table ($col) VALUES (:category, :question, :user, :status)";
            $param = ['category' => strip_tags($data[0]), 'question' => strip_tags($data[1]), 'user' => strip_tags($data[2]), 'status' => strip_tags($data[3])];
        }
        $statement = $this->db->prepare($query);
        $statement->execute($param);
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
     * @param array $data
     * @param int $id
     */
    public function update(string $table, array $data, $id)
    {
        if (count($data) == 1){
            $query = "UPDATE `$table` SET `name`=:name WHERE `id`=:id";
            $param = ['name' => strip_tags($data[0]), 'id' => strip_tags($id)];
        } elseif (count($data) == 2){
            $query = "UPDATE `$table` SET `login`=:login, `password`=:password WHERE `id`=:id";
            $param = ['login' => strip_tags($data[0]), 'password' => strip_tags($data[1]), 'id' => strip_tags($id)];
        } elseif (count($data) == 5){
            $query = "UPDATE `$table` SET `category_id`=:category, `question`=:question, `answer`=:answer, `user_id`=:user, `status`=:status WHERE `id`=:id";
            $param = ['category' => strip_tags($data[0]), 'question' => strip_tags($data[1]), 'answer' => strip_tags($data[2]), 'user' => strip_tags($data[3]), 'status' => strip_tags($data[4]), 'id' => strip_tags($id)];
        }
        $statement = $this->db->prepare($query);
        $statement->execute($param);
    }
}
