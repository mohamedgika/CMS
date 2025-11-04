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

    public function register($f_name, $l_name, $email, $password){
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

    public function getAll(){
        $query = "SELECT * FROM $this->table";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }
}