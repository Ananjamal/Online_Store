<?php

namespace App\Http\Controllers\Api\Website;

use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Api\ApiResponseTrait;

class OrderController extends Controller
{
    use ApiResponseTrait;
    public function show(Request $request)
    {
        $userId = Auth::id(); 

        $userOrder = Order::where('user_id', $userId)->get();

        return $this->ApiResponse($userOrder, 'Orders retrieved successfully', 200);
    }

    public function orderProducts(Request $request, $id)
    {
        $orderDetails = OrderProduct::where('order_id', $id)->get();
        if ($orderDetails->isEmpty()) {
            return $this->ApiResponse(null, 'Order Not Found', 404);
        }
        return $this->ApiResponse($orderDetails, 'Order Details Retrieved Successfully', 200);
    }
    public function cancelOrder(Request $request, $id)
    {
        $order = Order::find($id);
        if (!$order) {
            return $this->ApiResponse(null, 'Order Not Found', 401);
        }
        if($order->order_status === 'canceled'){
            return $this->ApiResponse(null,'The Order Is Already Canceled',400);
        }
        $order->update([
            'order_status' => 'canceled',
        ]);
        return $this->ApiResponse($order, 'Order Canceled Successfully', 200);
    }
}
