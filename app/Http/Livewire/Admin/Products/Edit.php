<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Edit extends Component
{
    use WithFileUploads;

    public $product_id;
    public $product;
    public $categories;
    public $category_id;
    public $name;
    public $description;
    public $newImage;
    public $price;

    public function mount($id)
    {
        $this->product_id = $id;
        $this->product = Product::find($id);
        $this->categories = Category::all();
        $this->name = $this->product->name;
        $this->description = $this->product->description;
        $this->price = $this->product->price;
        $this->category_id = $this->product->category_id;
    }
    public function updateProduct()
    {
        $this->validate([
            'name' => 'required|min:3',
            'description' => 'required|min:3',
            'newImage' => 'nullable',
            'price' => 'required|numeric',
            'category_id' => 'required|numeric',
        ]);

        $data = [
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'category_id' => $this->category_id,
        ];

        if ($this->newImage) {
            // Delete previous image if it exists
            if ($this->product->image) {
                Storage::delete($this->product->image);
            }
            // Store new image
            $data['image'] = $this->newImage->store('public/products');
        }

        $this->product->update($data);
        $this->reset(['name', 'description', 'newImage', 'price', 'category_id']);
        $message = 'Category Successfully Updated.';
        $this->emit('flash', $message);
        $this->emit('refreshPage');
    }
    public function refresh()
    {
        $this->emit('refreshPage');
    }
    public function render()
    {
        return view('livewire.admin.products.edit');
    }
}
