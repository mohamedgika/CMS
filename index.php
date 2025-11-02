<?php
session_start();
require_once 'config/Database.php';
require_once 'config/Config.php';
require_once 'app/model/User.php';
require_once 'app/controller/AuthController.php';
require_once 'app/controller/AdminController.php';
require_once 'app/middleware/auth.php';

use App\Middleware\Auth;


//Clean URI
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = str_replace('/cms/', '', $uri);
$uri = trim($uri, '/');

$auth = new Auth();

// /
if ($auth->handle() == "true") {
    if (empty($uri)) {
        header("Location: " . BASE_URL . "login");
    } elseif ($uri == 'login') {
        // Login Page
        $AuthController = new AuthController();
        $AuthController->login();
    } elseif ($uri == 'register') {
        $AuthController = new AuthController();
        $AuthController->register();
    } elseif ($uri == 'admin') {
        $AdminController = new AdminController();
        $AdminController->index();
    } elseif ($uri == "golden-news") {
        require_once 'app/view/website/home.php';
    }
} else {
    if (empty($uri)) {
        header("Location: " . BASE_URL . "login");
    } elseif ($uri == 'login') {
        // Login Page
        $AuthController = new AuthController();
        $AuthController->login();
    } elseif ($uri == 'register') {
        $AuthController = new AuthController();
        $AuthController->register();
    } elseif ($uri == 'admin') {
        header("Location: " . BASE_URL . "login");
    } elseif ($uri == "golden-news") {
        header("Location: " . BASE_URL . "login");
    }
}

?>