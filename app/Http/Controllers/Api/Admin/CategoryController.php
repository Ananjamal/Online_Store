<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
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
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|image',
        ]);

        if ($validator->fails()) {
            return $this->ApiResponse(null, $validator->errors(), 400);
        }

        $imagePath = $request->file('image')->store('public/categories');
        $category = Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        if ($category) {
            return $this->ApiResponse(new CategoryResource($category), 'Category Created Successfully', 201);
        } else {
            return $this->ApiResponse(null, 'Category Not created', 422);
        }
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'string',
            'description' => 'string',
            'image' => 'image|mimes:jpeg,png',
        ]);

        if ($validator->fails()) {
            return $this->ApiResponse(null, $validator->errors(), 400);
        }

        $category = Category::find($id);

        if (!$category) {
            return $this->ApiResponse(null, 'Category not found', 404);
        }

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/categories');

            // Delete old image if exists
            if ($category->image) {
                Storage::delete($category->image);
            }

            $category->image = $imagePath;
        }

        if ($request->filled('name')) {
            $category->name = $request->name;
        }

        if ($request->filled('description')) {
            $category->description = $request->description;
        }

        $category->save();

        if ($category->wasChanged()) {
            return $this->ApiResponse(new CategoryResource($category), 'Category updated successfully', 200);
        } else {
            return $this->ApiResponse(null, 'Category not updated', 422);
        }
    }
    public function destroy($id)
    {
        $category = Category::find($id);
        if (!$category) {
            return $this->ApiResponse(null, 'Category not found', 404);
        }
        Storage::delete($category->image);
        $category->delete();
        if ($category) {
            return $this->ApiResponse(new CategoryResource($category), 'Category Deleted successfully', 200);
        }
    }
}
