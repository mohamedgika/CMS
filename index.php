<?php
session_start();
require_once 'config/Database.php';
require_once 'config/Config.php';
require_once 'app/model/User.php';
require_once 'app/controller/AuthController.php';
require_once 'app/controller/AdminController.php';
require_once 'app/controller/ErrorController.php';
require_once 'app/controller/HomeController.php';
require_once 'app/controller/UserController.php';
require_once 'app/middleware/policy.php';

use App\Middleware\Policy;
use App\Controller\AuthController;
use App\Controller\AdminController;
use App\Controller\ErrorController;
use App\Controller\HomeController;
use App\Controller\UserController;

//Clean URI
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = str_replace('/cms/', '', $uri);
$uri = trim($uri, '/');

// // Check if user is logged in
// $auth = new Auth();
// if ($auth->handle() == "true") {

// } else {
//     if (empty($uri)) {
//         header("Location: " . BASE_URL . "login");
//     } elseif ($uri == 'login') {
//         // Login Page
//         $AuthController = new AuthController();
//         $AuthController->login();
//     } elseif ($uri == 'register') {
//         $AuthController = new AuthController();
//         $AuthController->register();
//     } elseif ($uri == 'admin') {
//         header("Location: " . BASE_URL . "login");
//     } elseif ($uri == "golden-news") {
//         header("Location: " . BASE_URL . "login");
//     }
// }

$policy = new Policy();
$errors = new ErrorController();
$website = new HomeController();

if ($policy->handle() == "admin") {
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
        $website->index();
    } elseif ($uri == 'admin/users') {
        $user = new UserController();
        $user->index();
    } elseif ($uri == 'admin/users/create') {
        $user = new UserController();
        $user->create();
    } elseif (preg_match('/admin\/users\/edit\/(\d+)$/', $uri, $matches)) {
        $user = new UserController();
        $user->edit($matches[1]);
    } elseif (preg_match('/admin\/users\/delete\/(\d+)$/', $uri, $matches)) {
        $user = new UserController();
        $user->delete($matches[1]);
    }
} elseif ($policy->handle() == "guest") {
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
        $errors->error_403();
    } elseif ($uri == "golden-news") {
        $website->index();
    }
} elseif ($policy->handle() == "notauth") {
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



// if($uri == '403'){
//     require_once 'app/view/Error/403.php';
// }


?>