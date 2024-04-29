<?php

namespace App\Http\Livewire\Admin\Orders;

use App\Models\User;
use App\Models\Order;
use Livewire\Component;
use App\Models\OrderProduct;

class OrderDetails extends Component
{
    public $orderproducts;
    public $username;
    public $counter =1;
    public function mount($id){
        $this->username = Order::find($id)->user->name;
        $this->orderproducts = OrderProduct::where('order_id', $id)->get();
    }
    public function render()
    {
        return view('livewire.admin.orders.order-details')->layout('layout.admin.app');
    }
}
