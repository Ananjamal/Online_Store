<?php

namespace App\Http\Livewire\Website\Shop;

use Livewire\Component;
use App\Models\Category;

class Shop extends Component
{
    
    public function render()
    {
        return view('livewire.website.shop.shop')->layout('layout.website.app');
    }
}
