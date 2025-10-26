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
}