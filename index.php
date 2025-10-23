<?php

require_once "config/database.php";
use ConfigDB\Database;



$database = new Database();

$users = $database->getAll("users");
echo "<pre>";
print_r($users);

$categories = $database->getAll("categories");
echo "<pre>";
print_r($categories);




?>