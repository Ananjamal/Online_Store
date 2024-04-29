<?php

namespace App\Http\Livewire\Website;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;

class Search extends Component
{
    public $search;
    public $results;

    public function mount()
    {
        $this->search = '';
        $this->results = null;
    }

    public function submit()
    {
        $this->results = Product::where('name', 'like', '%' . $this->search . '%')
            ->orWhereHas('category', function ($search) {
                $search->where('name', 'like', '%' . $this->search . '%');
            })
            ->get();
    }

    public function render()
    {
        return view('livewire.website.search')->layout('layout.website.app');
    }
}
