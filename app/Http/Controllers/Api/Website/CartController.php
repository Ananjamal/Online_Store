<?php

namespace App\Http\Controllers\Api\Website;

use App\Models\Cart;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Api\ApiResponseTrait;

class CartController extends Controller
{
    use ApiResponseTrait;
    public function index(Request $request, $id)
    {
        $user = User::find($id);
        if (!$user) {
            return $this->ApiResponse(null, 'User Not Found', 401);
        }
        $cart = Cart::where('user_id', $id)->get();

        if ($cart->isEmpty()) {
            return $this->ApiResponse(null, 'There Is No Product In Cart', 401);
        }
        return $this->ApiResponse($cart, 'Cart retrieved successfully', 200);
    }

    public function deleteFromCart(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|numeric|exists:products,id',
        ]);

        if ($validator->fails()) {
            return $this->ApiResponse(null, $validator->errors(), 422);
        }
        $user = User::find($id);
        if (!$user) {
            return $this->ApiResponse(null, 'User Not Found', 404);
        }

        $cart = $user
            ->carts()
            ->where('product_id', $request->product_id)
            ->first();

        if (!$cart) {
            return $this->ApiResponse(null, 'cart Product Not found', 404);
        }

        $cart->delete();
        return $this->ApiResponse($cart, 'Product Deleted From cart Successfully', 200);
    }
    public function UpdateQuantity(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|numeric|exists:products,id',
            'quantity' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return $this->ApiResponse(null, $validator->errors(), 422);
        }
        $user = User::find($id);
        if (!$user) {
            return $this->ApiResponse(null, 'User Not Found', 404);
        }

        $cart = $user
            ->carts()
            ->where('product_id', $request->product_id)
            ->first();

        if (!$cart) {
            return $this->ApiResponse(null, 'cart Product Not found', 404);
        }

        if ($request->quantity >= 1) {
            $cart->update([
                'quantity' => $request->quantity,
                'total' => $cart->product->price * $request->quantity,
            ]);
            return $this->ApiResponse($cart, 'Product Quantity Updated Successfully', 200);
        } else {
            return $this->ApiResponse(null, 'The Quantity Must Be 1 Or More', 409);
        }
    }
}