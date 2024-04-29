<?php

namespace App\Http\Livewire\Admin\Orders;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;

class Orders extends Component
{
    use WithPagination;
    public $counter = 1;
    public $order_id;
    protected $listeners = [
        'search' => 'search',
        'flash' => 'flash',
        'refresh' => 'mount',
    ];


    // #[On('refresh')]
    public function mount()
    {
        $this->counter;
        $this->order_id = null;
    }
    // #[On('search')]
    public function search($search)
    {
        $this->search = $search;
    }
    public function completeOrder($id)
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
        $orders = Order::latest()->paginate(10);
        return view('livewire.admin.orders.orders', [
            'orders' => $orders,
        ])->layout('layout.admin.app');
    }
}
