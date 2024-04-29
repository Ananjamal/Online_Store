<?php

namespace App\Http\Livewire\Website\Orders;

use App\Models\User;
use Livewire\Component;
use App\Models\OrderProduct;

class OrdersDetalis extends Component
{
    public $orderproducts;
    public $username;
    public $totalPrice;
    public $counter = 1;

    public function mount($id)
    {
        $user_id = auth()->id();
        $this->username = User::find($user_id)->name;
        $this->orderproducts = OrderProduct::where('order_id', $id)->get();
    }
    public function render()
    {
        return view('livewire.website.orders.orders-detalis')->layout('layout.website.app');
    }
}
