<?php

namespace App\Http\Livewire\Website;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Slider extends Component
{
    protected $paginationTheme = 'bootstrap'; // Assuming you're using Bootstrap pagination style.

    use WithPagination;
    // Method to navigate to the previous slide
    public function previousSlide()
    {
        $this->previousPage();
    }

    // Method to navigate to the next slide
    public function nextSlide()
    {
        $this->nextPage();
    }
    public function render()
    {
        $products = Product::inRandomOrder()->paginate(1);

        return view('livewire.website.slider', [
            'products' => $products,
        ])->layout('layout.website.app');
    }
}
