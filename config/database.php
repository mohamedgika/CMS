<?php

namespace Config;
class Database
{
    private $server = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "cms";
    private $dns;
    private $connection;

    public function connect()
    {
        try {
            $this->dns = "mysql:host=$this->server;dbname=$this->database";
            $this->connection = new \PDO($this->dns, $this->username, $this->password);
            $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
        return $this->connection;
    }

}
