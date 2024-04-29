<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\On;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    protected $rules = [
        'category_id' => 'required',
        'name' => 'required|min:3',
        'description' => 'required|min:3',
        'image' => 'required',
        'price' => 'numeric|required',
    ];
    public $name;
    public $image;
    public $description;
    public $category_id;
    public $product_id;

    public $price;

    public function store()
    {
        sleep(1);
        $validatedData = $this->validate();
        if ($this->image) {
            $validatedData['image'] = $this->image->store('public/products');
        }

        $product = Product::create($validatedData);
        $this->reset(['name', 'category_id', 'description', 'image', 'price']);
        $message = 'Product Successfully Created.';
        $this->emit('flash', $message);
        $this->emit('refreshPage');
    }
    public function refresh()
    {
        $this->emit('refreshPage');
    }

    public function render()
    {
        return view('livewire.admin.products.create', [
            'categories' => Category::all(),
        ]);
    }
}
