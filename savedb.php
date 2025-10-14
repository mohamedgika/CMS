<?php
session_start();
$_SESSION['email'] = $_POST['email'];
header('Location: home.php');
// echo "Session Done"
