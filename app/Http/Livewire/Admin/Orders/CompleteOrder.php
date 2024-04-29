<?php

namespace App\Http\Livewire\Admin\Orders;

use App\Models\Order;
use Livewire\Component;

class CompleteOrder extends Component
{
    protected $listeners = [
        'flash' => 'flash',
    ];
    public $order_id;
    public function mount($id){
        $complete =Order::find($id);
        $this->order_id  = $complete->id;
    }
    public function completeOrder(){
        $complete = Order::find($this->order_id);
        $completeorder = $complete->update([
            'order_status' => "delivered"
        ]);
        $message = 'Order has been successfully delivered';
        $this->emit('flash', $message);
        $this->emit('refresh');

    }
    // #[On('flash')]
    public function flash($message)
    {
        session()->flash('success', $message);
    }
    public function render()
    {
        return view('livewire.admin.orders.complete-order');
    }
}
