<?php

namespace App\Http\Livewire\Website\Details;

use App\Models\Cart;
use App\Models\Product;
use Livewire\Component;

class ProductDetails extends Component
{
    public $product_id;
    public $quantity = 1;
    public $product;
    public $user_id;
    public $device_id;

    public function mount($id)
    {
        $this->product = Product::FindOrFail($id);
    }
    public function addToCart($id)
    {
        $product = Product::find($id);
        if (auth()->check()) {
            $this->user_id = auth()->id();
        } else {
            $this->device_id = session()->getId();
        }

        $existingItem = null;
        if (auth()->check()) {
            $this->user_id = auth()->id();
            $existingItem = Cart::where('user_id', $this->user_id)
                ->where('product_id', $product->id) // Change this line
                ->first();
        } elseif ($this->device_id) {
            $existingItem = Cart::where('device_id', $this->device_id)
                ->where('product_id', $product->id) // Change this line
                ->first();
        }

        if ($existingItem) {
            // Display a flash message if the product is already in favorites
            session()->flash('error', 'Product is already in your Cart.');
        } else {
            // Product is not in the favorites, so add it
            Cart::create([
                'user_id' => $this->user_id,
                'device_id' => $this->device_id,
                'product_id' => $product->id,
                'product_name' => $product->name,
                'quantity' => $this->quantity,
                'price' => $product->price,
                'image' => $product->image,
                'total' => $product->price * $this->quantity,
            ]);
            session()->flash('success', 'Product Added In Your Cart Successfully.');
            $this->emit('refreshcount');
        }
    }
    public function render()
    {
        return view('livewire.website.details.product-details')->layout('layout.website.app');
    }
}
