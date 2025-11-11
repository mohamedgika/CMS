<?php
namespace App\Model;

require_once 'config/database.php';
use Config\Database;

class User
{
    private $connection;
    private $table = 'users';

    private $id;
    private $f_name;
    private $l_name;
    private $email;
    private $password;
    private $role = 'guest';
    private $is_admin = 0;

    public function __construct()
    {
        $database = new Database();
        $this->connection = $database->connect();
    }

    // Read Data
    public function login($email, $password)
    {
        $query = "SELECT * FROM $this->table WHERE email = :email AND password = :password";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $result;
    }

    public function register($f_name, $l_name, $email, $password)
    {
        $query = "INSERT INTO $this->table (f_name, l_name, email, password) VALUES (:f_name, :l_name, :email, :password)";
        $stmt = $this->connection->prepare($query);
        $pass = password_hash($password, PASSWORD_DEFAULT);
        $stmt->bindParam(':f_name', $f_name);
        $stmt->bindParam(':l_name', $l_name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $pass);
        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $result;
    }

    public function getAll()
    {
        $query = "SELECT * FROM $this->table";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }

    public function create($fname, $lname, $email, $password, $role)
    {
        $query = "INSERT INTO $this->table (f_name, l_name, email, password, role) VALUES (:fname, :lname, :email, :password, :role)";
        $stmt = $this->connection->prepare($query);
        $pass = password_hash($password, PASSWORD_DEFAULT);
        $stmt->bindParam(':fname', $fname);
        $stmt->bindParam(':lname', $lname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $pass);
        $stmt->bindParam(':role', $role);
        $stmt->execute();
        return true;
    }

    public function getById($id)
    {
        $query = "SELECT * FROM $this->table WHERE id = :id";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $result;
    }

    public function update($id, $fname, $lname, $email, $password, $role)
    {
        $query = "UPDATE $this->table SET f_name = :fname, l_name = :lname, email = :email, password = :password, role = :role WHERE id = :id";
        $stmt = $this->connection->prepare($query);
        $pass = password_hash($password, PASSWORD_DEFAULT);
        $stmt->bindParam(':fname', $fname);
        $stmt->bindParam(':lname', $lname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $pass);
        $stmt->bindParam(':role', $role);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return true;
    }

    public function delete($id)
    {
        $query = "DELETE FROM $this->table WHERE id = :id";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return true;
    }

    //hasMany
    public function hasMany($tableHasRelations, $foreignKeyID, $localKeyID)
    {
        // select * from categories where user_id = 32
        $query = "SELECT * FROM $tableHasRelations WHERE $foreignKeyID = :localKeyID";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':localKeyID', $localKeyID);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result;

    }

    public function categories($id){
        return $this->hasMany('categories', 'user_id', $id);
    }
}