<?php

require_once 'app/model/user.php';
use App\Model\User;

$email = $_POST['email'];
$pass = $_POST['pass'];

$user = new User();

$fetch_user = $user->login($email, $pass);

if (isset($fetch_user['email']) && isset($fetch_user['password']) && $fetch_user['is_admin'] == 0) {
    session_start();
    $_SESSION['email'] = $fetch_user['email'];
    $_SESSION['role'] = $fetch_user['role'];
    header("Location: home.php");
} else {
    session_start();
    $_SESSION['error'] = "Invalid email or password";
    header("Location: login.php");
}

?>