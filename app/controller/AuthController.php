<?php
require_once 'app/model/user.php';
use App\Model\User;

class AuthController
{
    private $UserModel;

    public function __construct()
    {
        $this->UserModel = new User();
    }

    // View //CRUD
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['pass'];

            if (empty($email)) {
                $_SESSION['emailError'] = "Email is required";
            } else {
                //Majic Mehod
                unset($_SESSION['emailError']);
            }

            if (empty($password)) {
                $_SESSION['passError'] = "Password is required";
            } else {
                //Majic Mehod
                unset($_SESSION['passError']);
            }

            $user = $this->UserModel->login($email, $password);

            if ($user) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['role'] = $user['role'];
                $_SESSION['is_admin'] = $user['is_admin'];
                if ($_SESSION['is_admin'] == 1) {
                    header("Location: " . BASE_URL . "admin");
                } else {
                    header("Location: " . BASE_URL . "golden-news");
                }
            } else {
                $_SESSION['error'] = "Invalid email or password";
            }

        }
        require_once 'app/view/auth/login.php';
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $email = $_POST['email'];
            $password = $_POST['pass'];

            if (empty($fname)) {
                $_SESSION['fnameError'] = "First name is required";
            } else {
                //Majic Mehod
                unset($_SESSION['fnameError']);
            }

            if (empty($lname)) {
                $_SESSION['lnameError'] = "Last name is required";
            } else {
                //Majic Mehod
                unset($_SESSION['lnameError']);
            }

            if (empty($email)) {
                $_SESSION['emailError'] = "Email is required";
            } else {
                //Majic Mehod
                unset($_SESSION['emailError']);
            }

            if (empty($password)) {
                $_SESSION['passError'] = "Password is required";
            } else {
                //Majic Mehod
                unset($_SESSION['passError']);
            }

            if (!empty($fname) && !empty($lname) && !empty($email) && !empty($password)) {
                $user = $this->UserModel->register($fname, $lname, $email, $password);
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['role'] = $user['role'];
                $_SESSION['is_admin'] = $user['is_admin'];
                $_SESSION['success_msg_reg'] = "Registration successful";
                header("Location: " . BASE_URL . "login");
            } else {
                $_SESSION['error'] = "Registration failed";
            }
        }
        require_once 'app/view/auth/register.php';
    }

}