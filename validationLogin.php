<?php

$emailError = '';
$passError = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (empty($_POST['email'])) {
        $emailError = "Email is required";
    } 
    
    if (empty($_POST['pass'])) {
        $passError = "Password is required";
    }


} else {
    echo 'Error that isnot accepted';
}
?>