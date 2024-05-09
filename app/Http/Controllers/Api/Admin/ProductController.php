<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Admin\ProductResource;
use App\Http\Controllers\Api\ApiResponseTrait;

class ProductController extends Controller
{
    use ApiResponseTrait;
    public function index()
    {
        $products = ProductResource::collection(Product::all());
        return $this->ApiResponse($products, 'Done', 200);
    }
    public function show(Request $request, $id)
    {
        $product = Product::find($id);
        if ($product) {
            return $this->ApiResponse(new ProductResource($product), 'Done', 200);
        } else {
            return $this->ApiResponse(null, 'Product Not Found', 401);
        }
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'category_id' => 'required|string',
            'price'=>'required|numeric',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png',
        ]);

        if ($validator->fails()) {
            return $this->ApiResponse(null, $validator->errors(), 400);
        }
        $imagePath = $request->file('image')->store('public/products');
        $product = Product::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'price'=>$request->price,
            'description' => $request->description,
            'image' => $imagePath,
        ]);
        if ($product) {
            return $this->ApiResponse(new ProductResource($product), 'Product Created SuSuccessfully', 200);
        }else{
            return $this->ApiResponse(null, 'Product Not created', 422);

        }
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'string',
            'category_id' => 'string',
            'price'=>'numeric',
            'description' => 'string',
            'image' => 'image|mimes:jpeg,png',
        ]);

        if ($validator->fails()) {
            return $this->ApiResponse(null, $validator->errors(), 400);
        }

        $product = Product::find($id);

        if (!$product) {
            return $this->ApiResponse(null, 'Product not found', 404);
        }

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/products');

            // Delete old image if exists
            if ($product->image) {
                Storage::delete($product->image);
            }

            $product->image = $imagePath;
        }

        // if ($request->filled('name')) {
        //     $product->name = $request->name;
        // }
        // if ($request->filled('category_id')) {
        //     $product->category_id = $request->category_id;
        // }
        // if ($request->filled('price')) {
        //     $product->price = $request->price;
        // }
        // if ($request->filled('description')) {
        //     $product->description = $request->description;
        // }
        $product->fill($request->only(['name', 'category_id', 'price', 'description']));

        $product->save();

        if ($product->wasChanged()) {
            return $this->ApiResponse(new ProductResource($product), 'Product updated successfully', 200);
        } else {
            return $this->ApiResponse(null, 'Product not updated', 422);
        }
    }
    public function destroy($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return $this->ApiResponse(null, 'Product not found', 404);
        }
        Storage::delete($product->image);
        $product->delete();
        if ($product) {
            return $this->ApiResponse(new ProductResource($product), 'Product Deleted successfully', 200);
        }
    }
}
