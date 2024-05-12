<?php

namespace App\Http\Controllers\Api\Website;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Api\ApiResponseTrait;

class ShopController extends Controller
{
    use ApiResponseTrait;
    public function categories(Request $request)
    {
        $categories = Category::all();
        return $this->ApiResponse($categories, 'Categories returned Successfully', 200);
    }
    public function products(Request $request)
    {
        $products = Product::all();
        return $this->ApiResponse($products, 'Products returned Successfully', 200);
    }
    public function addToFavorite(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|numeric|exists:products,id',
        ]);

        if ($validator->fails()) {
            return $this->ApiResponse(null, $validator->errors(), 422);
        }
        $userId = Auth::id();
        $user = User::find($userId);

        if (
            $user
                ->favorites()
                ->where('product_id', $request->product_id)
                ->exists()
        ) {
            return $this->ApiResponse(null, 'Product is already in favorites', 409);
        }

        $favorite = $user->favorites()->create([
            'product_id' => $request->product_id,
        ]);

        if ($favorite) {
            return $this->ApiResponse($favorite, 'Product Added To Favorites Successfully', 200);
        } else {
            return $this->ApiResponse(null, 'Failed to add product to favorites', 500);
        }
    }
    public function addToCart(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|numeric|exists:products,id',
            'quantity' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return $this->ApiResponse(null, $validator->errors(), 422);
        }
        $userId = Auth::id();
        $user = User::find($userId);

        if (
            $user
                ->carts()
                ->where('product_id', $request->product_id)
                ->exists()
        ) {
            return $this->ApiResponse(null, 'Product is already in cart', 409);
        }

        $product = Product::find($request->product_id);
        if (!$product) {
            return $this->ApiResponse(null, 'Product Not Found', 409);
        }

        $cart = $user->carts()->create([
            'product_id' => $request->product_id,
            'product_name' => $product->name,
            'quantity' => $request->quantity,
            'price' => $product->price,
            'image' => $product->image,
            'total' => $product->price * $request->quantity,
        ]);

        if ($cart) {
            return $this->ApiResponse($cart, 'Product Added To Cart Successfully', 200);
        } else {
            return $this->ApiResponse(null, 'Failed to add Cart', 500);
        }
    }
}
