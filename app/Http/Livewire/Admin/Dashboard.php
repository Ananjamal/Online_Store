<?php

namespace App\Http\Livewire\Admin;
use Livewire\Attributes\On;

use Livewire\Component;

class Dashboard extends Component
{
    public $categories = false;
    public $products = false;
    public $orders = false;
    public $messages = false;
    protected $listeners = [
        'categ' => 'expandCategories',
        'product' => 'expandProduct',
        'order' => 'expandOrder',
        'messages' => 'expandMessages'

    ];

    // #[On('categ')]
    public function expandCategories()
    {
        $this->categories = true;
        $this->products = false;
        $this->orders = false;
        $this->messages = false;
    }
    // #[On('product')]
    public function expandProduct()
    {
        $this->categories = false;
        $this->products = true;
        $this->orders = false;
        $this->messages = false;
    }
    // #[On('order')]
    public function expandOrder()
    {
        $this->orders = true;
        $this->categories = false;
        $this->products = false;
        $this->messages = false;
    }
    // #[On('messages')]
    public function expandMessages()
    {
        $this->orders = false;
        $this->categories = false;
        $this->products = false;
        $this->messages = true;
    }

    public function render()
    {
        return view('livewire.admin.dashboard')->layout('layout.admin.app');
    }
}
