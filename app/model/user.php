<?php

function getUsers($connection)
{
    $data = mysqli_query($connection, "SELECT * FROM users");
    return $data;
}