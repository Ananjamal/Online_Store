<?php

namespace App\Http\Livewire\Website\Shop;

use App\Models\Cart;
use App\Models\Product;
use Livewire\Component;
use App\Models\Favorite;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination;

    public $category_id;
    public $user_id;
    public $device_id;
    public $quantity = 1;
    protected $listeners = [
        'category_Products' => 'ShowProducts',
        'refresh_product' => 'render',
    ];
    // #[On('category_Products')]
    public function ShowProducts($category_id)
    {
        $this->category_id = $category_id;
    }

    public function addToFavorite($id)
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
            $existingItem = Favorite::where('user_id', $this->user_id)
                ->where('product_id', $product->id) // Change this line
                ->first();
        } elseif ($this->device_id) {
            $existingItem = Favorite::where('device_id', $this->device_id)
                ->where('product_id', $product->id) // Change this line
                ->first();
        }

        if ($existingItem) {
            // Display a flash message if the product is already in favorites
            session()->flash('error', 'Product is already in your favorites.');
        } else {
            // Product is not in the favorites, so add it
            Favorite::create([
                'user_id' => $this->user_id,
                'device_id' => $this->device_id,
                'product_id' => $product->id,
            ]);
            session()->flash('success', 'Product Added In Your Favorites Successfully.');
            $this->emit('refreshcount');
        }
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

    // #[On('refresh_product')]
    public function render()
    {
        if ($this->category_id) {
            $products = Product::where(['category_id' => $this->category_id])->paginate(6);
        } else {
            $products = Product::paginate(9);
        }

        return view('livewire.website.shop.Products', [
            'products' => $products,
        ]);
    }
}
