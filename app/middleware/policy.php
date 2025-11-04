<?php
namespace App\Middleware;
require_once 'app/middleware/auth.php';
use App\Middleware\Auth;

class Policy
{
   public function handle()
    {
        $auth = new Auth();

        if ($auth->handle() == "true") {
            if ($_SESSION['is_admin'] == 1) {
                return "admin";
            } else {
                return "guest";
            }
        }else{
            return "notauth";
        }
    }
}