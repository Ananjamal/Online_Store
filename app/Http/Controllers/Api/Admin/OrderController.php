<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\OrderResource;
use App\Http\Controllers\Api\ApiResponseTrait;
use App\Http\Resources\Admin\OrderProductResource;

class OrderController extends Controller
{
    use ApiResponseTrait;
    public function index(Request $request)
    {
        $orders = OrderResource::Collection(Order::all());
        return $this->ApiResponse($orders, 'Done', 200);
    }
    public function show(Request $request, $id)
    {
        $orderDetails = OrderProduct::where('order_id', $id)->get();
        if ($orderDetails->isEmpty()) {
            return $this->ApiResponse(null, 'Order Not Found', 404);
        }
        return $this->ApiResponse(OrderProductResource::collection($orderDetails), 'Order Details Retrieved Successfully', 200);
    }
    public function completeOrder(Request $request, $id)
    {
        $order = Order::find($id);
        if (!$order) {
            return $this->ApiResponse(null, 'Order Not Found', 401);
        }
        if($order->order_status === 'delivered'){
            return $this->ApiResponse(null,'The Order Is Already Delivered',400);
        }
        $order->update([
            'order_status' => 'delivered',
        ]);
        return $this->ApiResponse($order, 'Order Delivered Successfully', 200);
    }
}
