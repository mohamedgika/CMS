<?php

namespace ConfigDB;
class Database
{
    private $server = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "cms";
    private $connection;

    function __construct()
    {
        $connection = mysqli_connect($this->server, $this->username, $this->password, $this->database);
        $this->connection = $connection;
    }

    public function getAll($table)
    {
        $data = mysqli_query($this->connection, "SELECT * FROM $table");
        $data = mysqli_fetch_all($data);
        return $data;
    }

    function __destruct()
    {
        mysqli_close($this->connection);
    }

}
