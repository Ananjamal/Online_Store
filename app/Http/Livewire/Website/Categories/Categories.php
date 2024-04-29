<?php

namespace App\Http\Livewire\Website\Categories;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class Categories extends Component
{
    use WithPagination;

    public function render()
    {
        $categories = Category::paginate(6);

        return view('livewire.website.categories.categories',[
            'categories'=>$categories,
        ])->layout('layout.website.app');
    }
}
