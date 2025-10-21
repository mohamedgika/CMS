<?php
function connectionDB()
{
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "cms";
    $connection = mysqli_connect($server, $username, $password, $database);
    return $connection;
}