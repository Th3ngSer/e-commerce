<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getCategories(){
        return ["message" => "This is a placeholder for category listing"];
    }

    public function createCategory(){
        return ["message" => "For Creating a new category"];
    }

    // RENAMED THIS TO "getCategory" (Singular)
    public function getCategory($categoryId){
        return ["message" => "This is a placeholder for getting category with ID: $categoryId"];
    }

    public function updateCategory($categoryId){
        return ["message" => "For updating category with ID: $categoryId"];
    }

    public function deleteCategory($categoryId){
        return ["message" => "For deleting category with ID: $categoryId"];
    }
}
