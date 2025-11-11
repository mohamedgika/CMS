<?php

namespace App\Controller;

use App\Model\User;

class UserController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }
    public function index()
    {
        $users = $this->userModel->getAll();
        // $_SESSION['users'] = $users;
        require_once 'app/view/dashboard/user/index.php';
    }

    public function create()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $role = $_POST['role'];

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
                $userCreated = $this->userModel->create($fname, $lname, $email, $password, $role);
                if ($userCreated) {
                    $_SESSION['success'] = "Registration successful";
                    header("Location: " . BASE_URL . "admin/users");
                } else {
                    $_SESSION['error'] = "Registration failed";
                }
            }
        }
        require_once 'app/view/dashboard/user/create.php';
    }

    public function edit($id)
    {
        $user = $this->userModel->getById($id);
        $_SESSION['user_edit'] = $user;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $user['id'];
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $role = $_POST['role'];

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
                $userUpdated = $this->userModel->update($id, $fname, $lname, $email, $password, $role);
                if ($userUpdated) {
                    $_SESSION['success'] = $_SESSION['user_edit']['f_name'] . ' ' . $_SESSION['user_edit']['l_name'] . " updated successfully";
                    header("Location: " . BASE_URL . "admin/users");
                } else {
                    $_SESSION['error'] = "Update failed";
                }
            }

        }
        require_once 'app/view/dashboard/user/edit.php';
    }

    public function delete($id)
    {
        $userDeleted = $this->userModel->getById($id);
        if ($userDeleted['id'] == $id) {
            $result_delete = $this->userModel->delete(id: $id);
            if ($result_delete) {
                $_SESSION['success'] = $_SESSION['user_edit']['f_name'] . ' ' . $_SESSION['user_edit']['l_name'] . " deleted successfully";
                header("Location: " . BASE_URL . "admin/users");
            }
        } else {
            $_SESSION['error'] = "Delete failed";
        }
    }

    public function showCategory($id)
    {
        $categories = $this->userModel->categories($id);

        require_once 'app/view/dashboard/user/mycategories.php';
    }


}