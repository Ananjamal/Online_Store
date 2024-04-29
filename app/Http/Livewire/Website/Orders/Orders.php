<?php

namespace App\Http\Livewire\Website\Orders;

use App\Models\Order;
use Livewire\Component;
use Livewire\Attributes\On;

class Orders extends Component
{
    public $orders;
    public $order_id;
    protected $listeners = [
        'flash' => 'flash',
        'refreshPage' => 'mount',
    ];
    // #[On('refreshPage')]
    public function mount()
    {
        $this->orders = Order::where('user_id', auth()->id())->get();
        $this->order_id = null;
    }
    public function cancelOrder($id)
    {
        $this->order_id = $id;
    }
    // #[On('flash')]
    public function flash($message)
    {
        session()->flash('success', $message);
    }

    public function render()
    {
        return view('livewire.website.orders.orders')->layout('layout.website.app');
    }
}
