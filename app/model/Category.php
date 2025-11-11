<?php
namespace App\Model;

require_once 'config/database.php';
use Config\Database;

class Category
{
    private $connection;
    private $table = 'categories';

    private $id;
    private $name;
    public $user_id;

    public function __construct()
    {
        $database = new Database();
        $this->connection = $database->connect();
    }


    //Create
    public function create($name, $user_id)
    {
        $query = "INSERT INTO $this->table (name, user_id) VALUES (:name, :user_id)";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':user_id', $this->user_id);
        $stmt->execute();
    }

    //Read
    public function getAll()
    {
        $query = "SELECT * FROM $this->table";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }

    //Update 
    public function update($id, $namem, $user_id)
    {
        $query = "UPDATE $this->table SET name = :name, user_id = :user_id WHERE id = :id";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }


    //Delete
    public function delete($id)
    {
        $query = "DELETE FROM $this->table WHERE id = :id";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }



    // BaseModel
    public function belongsTo($tableHasRelations, $foreignKeyID, $localKeyID = 'id')
    {
        // select * from users where id = 32
        $query = "SELECT * FROM $tableHasRelations WHERE $localKeyID = :foreignKeyID";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':foreignKeyID', $foreignKeyID);
        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $result;

    }

    //User
    public function user($user_id)
    {
        return $this->belongsTo('users', $user_id, 'id');
    }


}