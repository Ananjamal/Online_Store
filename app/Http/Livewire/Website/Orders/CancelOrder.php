<?php

namespace App\Http\Livewire\Website\Orders;

use App\Models\Order;
use Livewire\Component;

class CancelOrder extends Component
{
    public $order_id;
    public function mount($id){
        $cancel =Order::find($id);
        $this->order_id  = $cancel->id;
    }
    public function cancelorder(){
        $cancel = Order::find($this->order_id);
        $cancelorder = $cancel->update([
            'order_status' => "cancelled"
        ]);
        $message = 'your order has been successfully canceled';
        $this->emit('flash', $message);
        $this->emit('refreshPage');

    }
    public function refresh(){
        $this->emit('refreshPage');
    }
    public function render()
    {
        return view('livewire.website.orders.cancel-order');
    }
}
