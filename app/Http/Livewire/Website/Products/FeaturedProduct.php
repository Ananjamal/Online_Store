<?php

namespace App\Http\Livewire\Website\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class FeaturedProduct extends Component
{
    use WithPagination;

    public function render()
    {
        $products = Product::inRandomOrder()->paginate(6);

        return view('livewire.website.products.featured-product',[
            'products'=>$products,
        ])->layout('layout.website.app');
    }
}
