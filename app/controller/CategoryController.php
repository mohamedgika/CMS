<?php

namespace App\Controller;

use App\Model\Category;

class CategoryController{
    private $categoryModel;

    public function __construct(){
        $this->categoryModel = new Category();
    }

    public function index(){
        $categories = $this->categoryModel;
        require_once 'app/view/dashboard/category/index.php';
    }
}