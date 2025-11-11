<?php
namespace App\Model;

require_once 'config/database.php';
use Config\Database;

class BaseModel
{
    private $connection;

    public function __construct()
    {
        $database = new Database();
        $this->connection = $database->connect();
    }

    //hasMany
    public function hasMany($tableHasRelations, $foreignKeyID, $localKeyID = 'id')
    {
        // select * from categories where user_id = 32
        $query = "SELECT * FROM $tableHasRelations WHERE $foreignKeyID = :localKeyID";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':localKeyID', $localKeyID);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result;

    }

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


}