<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\ApiResponseTrait;
use App\Http\Resources\Admin\CategoryResource;

class CategoryController extends Controller
{
    use ApiResponseTrait;
    public function index()
    {
        $categories = CategoryResource::collection(Category::all());
        return $this->ApiResponse($categories, 'Done', 200);
    }
    public function show($id)
    {
         $category = Category::find($id);
        if ($category) {
            return $this->ApiResponse(new CategoryResource($category), 'Done', 200);
        } else {
            return $this->ApiResponse(null, 'Category Not Found', 401);
        }
    }
}
