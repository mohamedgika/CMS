<?php
 
 namespace App\Controller;
 
 use App\Model\User;
 
 class UserController{
    private $userModel;

    public function __construct(){
        $this->userModel = new User();
    }
    public function index(){
        $users = $this->userModel->getAll();
        $_SESSION['users'] = $users;
        require_once 'app/view/dashboard/user/index.php';
    }
 }