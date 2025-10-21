<?php
include ("config/database.php");
include ("app/model/user.php");

$connection = connectionDB();

if (!$connection) {
    echo "Connection failed";
} else {
    // echo "Connection successful";
    //SQL => Structured Query Language
    // $get_user_table = "SELECT * FROM users";
    // $result = mysqli_query($connection, $get_user_table);
    $data = getUsers($connection);

    //Count number of rows
    $num_of_rows = mysqli_num_rows($result);


    if ($num_of_rows > 0) {

        $user_data = [];
        //Data
        $data = mysqli_fetch_assoc($result);
        $user_data[] = $data;

        // while ($data) {
        //     $user_data[] = $data;
        // }
        echo "<pre>";
        print_r($user_data);
    } else {
        echo "No data found";
    }



}

?>