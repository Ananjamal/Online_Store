<?php

namespace App\Http\Livewire\Website\Shop;

use Livewire\Component;
use App\Models\Category;

class Categories extends Component
{
    public $categories;
    public function mount(){
        $this->categories = Category::all();
    }
    public function showProducts($category_id){
        $this->emit('category_Products',$category_id);
    }
    public function render()
    {
        return view('livewire.website.shop.categories');
    }
}
