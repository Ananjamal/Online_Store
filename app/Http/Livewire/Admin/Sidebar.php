<?php

namespace App\Http\Livewire\Admin;
use Livewire\Attributes\On;

use Livewire\Component;

class Sidebar extends Component
{
    public function cat()
    {
        $this->emit('categ');
    }
    public function prod()
    {
        $this->emit('product');
    }
    public function order()
    {
        $this->emit('order');
    }
    public function messages()
    {
        $this->emit('messages');
    }
    public function render()
    {
        return view('livewire.admin.sidebar');
    }
}
