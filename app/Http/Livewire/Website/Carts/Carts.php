<?php

namespace App\Http\Livewire\Website\Carts;

use App\Models\Cart;
use App\Models\Product;
use Livewire\Component;

class Carts extends Component
{
    public $cartItem;
    public $subtotal;
    public $totalprice;
    public $shippingCost = 10; // Define the shipping cost here

    public function mount()
    {
        if (auth()->check()) {
            $user = auth()->user();
            $userId = $user->id;
            $this->cartItem = Cart::where('user_id', $userId)->get();
        } else {
            $deviceId = session()->getId();
            $userId = $deviceId;
            $this->cartItem = Cart::where('device_id', $userId)->get();
        }
        $this->calculateSubtotal();
        $this->calculateTotal();


    }
    public function increaseQuantity($id)
    {
        $cartItem = Cart::findOrFail($id); // Fetch the cart item based on the provided ID
        $cartItem->update([
            'quantity' => ++$cartItem->quantity,
            'total' => $cartItem->product->price * $cartItem->quantity,
        ]);

        $this->mount();
    }
    public function decreaseQuantity($id)
    {
        $cartItem = Cart::findOrFail($id); // Fetch the cart item based on the provided ID
        if ($cartItem->quantity > 1) {
            $cartItem->update([
                'quantity' => --$cartItem->quantity,
                'total' => $cartItem->product->price * $cartItem->quantity,
            ]);
            $this->mount();
        }
    }

    public function remove_product_from_cart($id)
    {
        Cart::where('product_id', $id)->delete();
        session()->flash('success', 'Product Removed From Cart Successfully');
        $this->emit('refreshcount');
        $this->mount();
    }
    public function calculateSubtotal()
    {
        $subtotal = 0;

        foreach ($this->cartItem as $item) {
            $subtotal += $item->product->price * $item->quantity;
        }

        $this->subtotal = $subtotal;
    }
    public function calculateTotal()
    {
        $this->totalprice = $this->subtotal + $this->shippingCost;
    }
    public function render()
    {
        return view('livewire.website.carts.carts')->layout('layout.website.app');
    }
}
