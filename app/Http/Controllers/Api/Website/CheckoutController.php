<?php

namespace App\Http\Controllers\Api\Website;

use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Adresses;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Api\ApiResponseTrait;

class CheckoutController extends Controller
{
    use ApiResponseTrait;
    public $shipping = 10;
    public $totalprice;
    public $user_cart;

    public function placeOrder(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'address_line1' => 'required|string',
            'address_line2' => 'required|string',
            'country' => 'required|string',
            'state' => 'required|string',
            'city' => 'required|string',
            'zip_code' => 'required|integer',
            'paymentMethod' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->ApiResponse(null, $validator->errors(), 400);
        }

        $userId = Auth::id();
        $user = User::find($userId);
        $this->user_cart = Cart::where('user_id', $userId)->get();
        if ($this->user_cart->isEmpty()) {
            return $this->ApiResponse(null, 'No Products Found In Your Cart', 422);
        }
        $this->calculateTotalPrice();

        // Create the order
        $order = new Order();
        $order->user_id = $user->id;
        $order->shipping_price = $this->shipping;
        $order->total_price = $this->totalprice;
        $order->payment_method = $request->paymentMethod;
        $order->save();
        // Create the user address
        $userAddress = new Adresses();
        $userAddress->user_id = $user->id;
        $userAddress->order_id = $order->id;
        $userAddress->firstname = $request->firstname;
        $userAddress->lastname = $request->lastname;
        $userAddress->email = $request->email;
        $userAddress->phone = $request->phone;
        $userAddress->address_line1 = $request->address_line1;
        $userAddress->address_line2 = $request->address_line2;
        $userAddress->country = $request->country;
        $userAddress->city = $request->city;
        $userAddress->state = $request->state;
        $userAddress->zip_code = $request->zip_code;
        $userAddress->save();
        // Loop through cart items and create order products
        foreach ($this->user_cart as $cart) {
            $orderProduct = new OrderProduct();
            $orderProduct->order_id = $order->id;
            $orderProduct->product_id = $cart->product->id;
            $orderProduct->quantity = $cart->quantity;
            $orderProduct->price = $cart->product->price;
            $orderProduct->total = $cart->total;
            $orderProduct->save();
        }
        // Remove all cart items from database
        Cart::where('user_id', $user->id)->delete();
        // Return response
        return $this->ApiResponse($order, 'Order Placed Successfully', 200);
    }

    public function calculateTotalPrice()
    {
        $subtotal = 0;
        foreach ($this->user_cart as $item) {
            $subtotal += $item->product->price * $item->quantity;
        }
        $this->totalprice = $subtotal + $this->shipping;
    }
}
