<?php

require_once 'config/Database.php';
require_once 'config/Config.php';
require_once 'app/model/User.php';
require_once 'app/controller/AuthController.php';

//Clean URI
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = str_replace('/cms/', '', $uri);
$uri = trim($uri, '/');

// /
if (empty($uri)) {
    header("Location: " . BASE_URL . "login");
} elseif ($uri == 'login') {
    // Login Page
    $AuthController = new AuthController();
    $AuthController->login();
} elseif($uri == 'register') {
    $AuthController = new AuthController();
    $AuthController->register();
}
elseif ($uri == 'admin') {
    require_once 'app/view/dashboard/admin.php';
} elseif ($uri == "golden-news") {
    require_once 'app/view/website/home.php';
}



?>