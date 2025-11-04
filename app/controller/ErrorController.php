<?php
namespace App\Controller;
class ErrorController{
    
    public function error_403(){
        require_once 'app/view/Error/403.php';

    }
}